<form id="addBookForm" method="POST" action="{{ route('books.update', $book->bookID) }}" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <!-- Book title -->
        <div class="col-6">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <!-- Category -->
        <div class="col-6">
            <label for="categoryID" class="form-label">Category</label>
            <select class="form-select" id="categoryID" name="categoryID" required>
                <option value="">-- Select a Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->categoryID }}" {{ $book->categoryID == $category->categoryID ? 'selected' : '' }}>
                        {{ $category->category_type }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Author -->
        <div class="col-12">
            <label for="authorID" class="form-label">Author</label>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select flex-grow-1" id="authorID" name="authorID" required>
                    <option value="">Select or search author...</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->authorID }}" {{ $book->authorID == $author->authorID ? 'selected' : '' }}>
                            {{ $author->author_name }}
                        </option>
                    @endforeach
                </select>

                <button type="button" class="btn btn-primary d-flex align-items-center gap-2" id="btnAddAuthor"
                    data-bs-toggle="modal" data-bs-target="#addAuthorModal">
                    <i class="bi bi-person-plus"></i> Add Author
                </button>
            </div>
        </div>

    </div>

    <!-- Description -->
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $book->description }}</textarea>
    </div>

    <!-- Stock Quantity -->
    <div class="mb-3">
        <label for="stockQTY" class="form-label">Stock Quantity</label>
        <input type="number" name="stockQTY" id="stockQTY" class="form-control" min="0" value="{{ $book->stockQTY }}" required>
    </div>

    <!-- Is Available for Borrow -->
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="is_available_for_borrow" name="is_available_for_borrow"
            value="1" {{ $book->is_available_for_borrow ? 'checked' : '' }}>
        <label class="form-check-label" for="is_available_for_borrow">Available for Borrow</label>
    </div>

    <div class="row g-4 d-flex justify-center align-items-center">
        <div class="col mb-2">
            <label>Front Cover Book:</label>

            <div class="preview-front-cover border border-dark m-lg-auto" data-target-file="front_cover"
                style="width: fit-content; cursor: pointer;">
                <img src="{{ $book->front_cover ? asset($book->front_cover) : asset('assets/books/placeholder/image.png') }}"
                     id="show-front-cover" style="width:300px">
            </div>

            <input type="file" name="front_cover" class="form-control" id="front_cover">
            <input type="hidden" name="front_cover_path" id="front_cover_path" value="{{ $book->front_cover }}">
        </div>

        <div class="col mb-2">
            <label>Back Cover Book: </label>
            <div class="preview-back-cover border border-dark m-lg-auto" data-target-file="back_cover"
                style="width: fit-content; cursor: pointer;">
                <img src="{{ $book->back_cover ? asset($book->back_cover) : asset('assets/books/placeholder/image.png') }}"
                     id="show-back-cover" style="width:300px">
            </div>

            <input type="file" name="back_cover" class="form-control" id="back_cover">
            <input type="hidden" name="back_cover_path" id="back_cover_path" value="{{ $book->back_cover }}">
        </div>
    </div>

    {{-- Book pdf file upload --}}
    <div class="mb-3">
        <label for="file_path" class="form-label">Upload PDF File</label>
        <input type="file" class="form-control" id="file_path" name="file_path" accept="application/pdf">
        @if($book->file_path)
            <small class="text-muted">Current file: {{ basename($book->file_path) }}</small>
        @endif
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Update Book</button>
    </div>
</form>
