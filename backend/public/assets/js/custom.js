// ========================================================
// SweetAlert2 helper functions
// ========================================================
function toastSuccess(msg) {
    Swal.fire({
        icon: "success",
        title: msg || "Success!",
        timer: 1500,
        showConfirmButton: false,
        toast: true,
        position: "top-end",
    });
}

function toastError(msg) {
    Swal.fire({
        icon: "error",
        title: "Error!",
        text: msg || "Something went wrong.",
        confirmButtonColor: "#d33",
    });
}

// ========================================================
// Main Script
// ========================================================
$(document).ready(function () {

    // --------------------------------------------------------
    // Open modal (Add or Edit Book)
    // --------------------------------------------------------
    $(document).on("click", 'button[data-action="show"]', function (e) {
        e.preventDefault();

        const url = $(this).data("url");
        const title = $(this).data("modal-title");

        $("#basicModal .modal-title").text(title);

        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {

                $("#basicModal .modal-body").html(response);
                const modal = new bootstrap.Modal(document.getElementById("basicModal"));
                modal.show();

                setupTempFileUpload();       // Front & Back Cover
                loadCategories();            // Categories dropdown
                setupSelect2Author();        // Author search
                setupAddAuthorButton();      // Add Author modal
            },
            error: function () {
                toastError("Failed to load form. Please try again.");
            },
        });
    });

    // ====================================================
    // TEMP FILE UPLOAD: FRONT & BACK COVER
    // ====================================================
    function setupTempFileUpload() {
        $("input[type='file'][id$='_cover']").off("change").on("change", function () {
            let inputId = $(this).attr('id'); // front_cover or back_cover
            let formData = new FormData();
            formData.append(inputId, this.files[0]);

            $.ajax({
                url: "/upload-file",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')},
                success: function (tempPath) {
                    $("#" + inputId + "_path").val(tempPath);
                    $("#show-" + inputId.replace('_', '-')).attr('src', "/" + tempPath);
                },
                error: function () {
                    toastError("Failed to upload file.");
                }
            });
        });
    }

    // ====================================================
    // LOAD CATEGORIES (only if dropdown is nearly empty)
    // ====================================================
    function loadCategories() {
        const $categorySelect = $("#basicModal #categoryID");
        if ($categorySelect.length) {
            const optionCount = $categorySelect.find('option').length;
            // Only load via AJAX if we have 1 or fewer options (just placeholder or empty)
            if (optionCount <= 1) {
                $.ajax({
                    url: "/categories/all",
                    type: "GET",
                    success: function (categories) {
                        $categorySelect.empty();
                        $categorySelect.append('<option value="">-- Select Category --</option>');
                        categories.forEach(c => {
                            $categorySelect.append(`<option value="${c.categoryID}">${c.category_type}</option>`);
                        });
                    },
                    error: function () {
                        toastError("Failed to load categories.");
                    }
                });
            }
            // If categories already exist (like in edit form), don't reload
        }
    }

    // ====================================================
    // SELECT2 AUTHOR SEARCH (Local data, not AJAX)
    // ====================================================
    function setupSelect2Author() {
        const $authorSelect = $("#basicModal #authorID");
        if ($authorSelect.length) {
            // Use local data (authors already loaded from blade foreach)
            $authorSelect.select2({
                placeholder: "Select or search author...",
                dropdownParent: $("#basicModal"),
                width: "100%",
            });
        }
    }

    // ====================================================
    // ADD AUTHOR BUTTON
    // ====================================================
    function setupAddAuthorButton() {
        $("#basicModal #btnAddAuthor").off("click").on("click", function () {
            $.ajax({
                url: "/genders/all",
                type: "GET",
                success: function (genders) {
                    const $genderSelect = $("#genderID");
                    $genderSelect.empty();
                    $genderSelect.append('<option value="">-- Select Gender --</option>');
                    genders.forEach(g => {
                        $genderSelect.append(`<option value="${g.genderID}">${g.gender_type}</option>`);
                    });
                    const addAuthorModal = new bootstrap.Modal(document.getElementById("addAuthorModal"));
                    addAuthorModal.show();
                },
                error: function () {
                    toastError("Failed to load gender list.");
                },
            });
        });
    }

    // ====================================================
    // ADD AUTHOR FORM SUBMIT
    // ====================================================
    $(document).on("submit", "#addAuthorForm", function (e) {
        e.preventDefault();

        $.ajax({
            url: "/authors/store-ajax",
            type: "POST",
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')},
            success: function (author) {
                const $authorSelect = $("#basicModal #authorID");

                if ($authorSelect.length) {
                    // Add new option and select it
                    const newOption = new Option(author.author_name, author.authorID, true, true);
                    $authorSelect.append(newOption).trigger('change');
                }

                // Close the add author modal
                $("#addAuthorModal").modal('hide');

                // Reset form
                $("#addAuthorForm")[0].reset();

                // Show success message
                toastSuccess(`Author "${author.author_name}" added successfully!`);
            },
            error: function (xhr) {
                toastError(xhr.responseJSON?.message || "Error adding author.");
            },
        });
    });

    // ====================================================
    // ADD/UPDATE BOOK FORM SUBMIT
    // ====================================================
    $(document).on("submit", "#addBookForm", function (e) {
        e.preventDefault();
        const $form = $(this);
        const isUpdate = $form.attr("action").includes("/update");
        const actionText = isUpdate ? "Updating" : "Saving";
        const successText = isUpdate ? "Book updated successfully!" : "Book added successfully!";

        $.ajax({
            url: $form.attr("action"),
            type: $form.attr("method") || "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            timeout: 60000, // 60 seconds timeout
            headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')},
            beforeSend: () => Swal.fire({title: `${actionText} book...`, allowOutsideClick: false, didOpen: () => Swal.showLoading()}),
            success: function (res) {
                Swal.close();
                toastSuccess(res.message || successText);
                bootstrap.Modal.getInstance(document.getElementById("basicModal")).hide();
                setTimeout(() => (window.location.href = "/books"), 800);
            },
            error: function (xhr, status, error) {
                Swal.close();
                
                if (status === 'timeout') {
                    return toastError("Request timeout! The file might be too large or server is slow.");
                }
                
                if (xhr.status === 419) return toastError("Session expired. Please reload.");
                if (xhr.status === 422 && xhr.responseJSON) {
                    const messages = Object.values(xhr.responseJSON.errors).flat().join("\n");
                    return toastError(messages);
                }
                
                console.error("Book form error:", xhr);
                toastError(xhr.responseJSON?.message || "Something went wrong.");
            },
        });
    });

    // ====================================================
    // CLEAR TEMP FOLDER WHEN MODAL CLOSE
    // ====================================================
    $(document).on("hidden.bs.modal", "#basicModal", function () {
        $.post("/clear-temp-folder", {_token: $("meta[name='csrf-token']").attr('content')});
    });

    // Cleanup leftover backdrop on Add Author Modal close
    $(document).on("hidden.bs.modal", "#addAuthorModal", function () {
        $(".modal-backdrop").remove();
        $("body").removeClass("modal-open").css("padding-right", "");
    });
});

