<form id="addBookForm" method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
     @csrf

     <div class="row">

         <!-- Book title -->
         <div class="col-6">
             <label for="title" class="form-label">Book Title</label>
             <input type="text" class="form-control" id="title" name="title" required>
         </div>

        <!-- Category -->
         <div class="col-6">
             <label for="categoryID" class="form-label">Category</label>
             <select class="form-select" id="categoryID" name="categoryID" required>
                <option value="">-- Select a Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->categoryID }}">{{ $category->category_type }}</option>
                    @endforeach
                </select>
            </select>
         </div>

        <!-- Author -->
        <div class="col-12">
            <label for="authorID" class="form-label">Author</label>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select flex-grow-1" id="authorID" name="authorID" required>
                    <option value="">Select or search author...</option>
                </select>

                <button type="button"
                        class="btn btn-primary d-flex align-items-center gap-2"
                        id="btnAddAuthor"
                        data-bs-toggle="modal"
                        data-bs-target="#addAuthorModal">
                    <i class="bi bi-person-plus"></i> Add Author
                </button>
            </div>
        </div>

     </div>

    <!-- Description -->
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>

    <!-- Stock Quantity -->
    <div class="mb-3">
        <label for="stockQTY" class="form-label">Stock Quantity</label>
        <input type="number" class="form-control" id="stockQTY" name="stockQTY" min="0" required>
    </div>

     <!-- Is Available for Borrow -->
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="is_available_for_borrow" name="is_available_for_borrow" value="1" checked>
        <label class="form-check-label" for="is_available_for_borrow">Available for Borrow</label>
    </div>

    <div class="row g-4 d-flex justify-center align-items-center">
        <div class="col mb-2">
            <label>Front Cover Book:</label>

            <div class="preview-front-cover border border-dark m-lg-auto"
                data-target-file="front_cover"
                style="width: fit-content; cursor: pointer;">
                <img src="{{ asset('assets/books/placeholder/front_cover.png') }}"
                    id="show-front-cover" style="width:300px">
            </div>

            <input type="file" name="front_cover" id="front_cover" hidden>
            <input type="text" id="front_cover_name" class="form-control mt-2" placeholder="No file chosen" readonly>
            <input type="hidden" name="front_cover_path" id="front_cover_path">
        </div>

        {{-- <div class="col mb-2">
            <label for="">Back Cover Book: </label>
            <div class="preview-back-cover border  border-dark m-lg-auto" style="width: fit-content; cursor: pointer;">
                <img src="{{ asset('assets/books/placeholder/back_cover.png') }}" id="show-back-cover" alt=""
                style="width:300px">
            </div>
            <input type="file" name="profile" class="form-control" id="profile">
            <input type="hidden" name="profile_name" class="form-control my-2" id="profile_name">
        </div> --}}
    </div>

    {{-- Book pdf file upload --}}
    <div class="mb-3">
        <label for="file_path" class="form-label">Upload PDF File</label>
        <input type="file" class="form-control" id="file_path" name="file_path" accept="application/pdf">
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Save Book</button>
    </div>
</form>


