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
    // When "Add Book" button is clicked → open modal via AJAX
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
                // Inject the returned form HTML into modal body
                $("#basicModal .modal-body").html(response);

                // Show the Bootstrap modal
                const modal = new bootstrap.Modal(
                    document.getElementById("basicModal")
                );
                modal.show();

                // --------------------------------------------------------
                // 🟢 Load categories dynamically
                // --------------------------------------------------------
                $.ajax({
                    url: "/categories/all",
                    type: "GET",
                    success: function (categories) {
                        const $categorySelect = $("#basicModal #categoryID");
                        $categorySelect.empty();
                        $categorySelect.append('<option value="">-- Select Category --</option>');

                        categories.forEach(c => {
                            $categorySelect.append(
                                `<option value="${c.categoryID}">${c.category_type}</option>`
                            );
                        });
                    },
                    error: function () {
                        toastError("Failed to load categories.");
                    },
                });

                // --------------------------------------------------------
                // 🟢 Initialize Select2 for author search
                // --------------------------------------------------------
                const $authorSelect = $("#basicModal #authorID");
                if ($authorSelect.length) {
                    $authorSelect.select2({
                        placeholder: "Select or search author...",
                        dropdownParent: $("#basicModal"),
                        ajax: {
                            url: "/authors/search", // Laravel route for author search
                            dataType: "json",
                            delay: 250,
                            data: function (params) {
                                return { q: params.term };
                            },
                            processResults: function (data) {
                                return data; // Expect { results: [...] }
                            },
                            cache: true,
                        },
                        width: "100%",
                    });
                }

                // --------------------------------------------------------
                // 🟡 When "Add Author" button inside book form is clicked
                // --------------------------------------------------------
                $("#basicModal")
                    .off("click", "#btnAddAuthor")
                    .on("click", "#btnAddAuthor", function () {
                        // Load genders dynamically before showing modal
                        $.ajax({
                            url: "/genders/all",
                            type: "GET",
                            success: function (genders) {
                                const $genderSelect = $("#genderID");
                                $genderSelect.empty();
                                $genderSelect.append('<option value="">-- Select Gender --</option>');

                                genders.forEach(g => {
                                    $genderSelect.append(
                                        `<option value="${g.genderID}">${g.gender_type}</option>`
                                    );
                                });

                                // Show Add Author modal
                                const addAuthorModal = new bootstrap.Modal(
                                    document.getElementById("addAuthorModal")
                                );
                                addAuthorModal.show();
                            },
                            error: function () {
                                toastError("Failed to load gender list.");
                            },
                        });
                    });
            },
            error: function () {
                toastError("Failed to load form. Please try again.");
            },
        });
    });

    // --------------------------------------------------------
    // 🟢 Handle Add Author form submission (AJAX + SweetAlert)
    // --------------------------------------------------------
    $(document).on("submit", "#addAuthorForm", function (e) {
        e.preventDefault();

        $.ajax({
            url: "/authors/store-ajax",
            type: "POST",
            data: $(this).serialize(),
            success: function (author) {
                // Add new author to Select2 dropdown in Add Book form
                const $authorSelect = $("#basicModal #authorID");
                if ($authorSelect.length) {
                    const newOption = new Option(
                        author.author_name,
                        author.authorID,
                        true,
                        true
                    );
                    $authorSelect.append(newOption).trigger("change");
                }

                // Properly close Add Author modal using Bootstrap 5 API
                const modalEl = document.getElementById("addAuthorModal");
                const modalInstance = bootstrap.Modal.getInstance(modalEl);
                if (modalInstance) modalInstance.hide();

                // Reset form
                $("#addAuthorForm")[0].reset();

                // SweetAlert2 Success popup
                toastSuccess(`Author "${author.author_name}" added successfully!`);
            },
            error: function (xhr) {
                const msg =
                    xhr.responseJSON?.message ||
                    "Error adding author. Please try again.";
                toastError(msg);
            },
        });
    });

    // --------------------------------------------------------
    // Cleanup leftover backdrop when Add Author modal closes
    // --------------------------------------------------------
    $(document).on("hidden.bs.modal", "#addAuthorModal", function () {
        $(".modal-backdrop").remove();
        $("body").removeClass("modal-open").css("padding-right", "");
    });
    

});
