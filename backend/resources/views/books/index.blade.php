@extends('master')

@section('content')

<div class="card-body">

    {{-- ===================== Header Section ===================== --}}
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h3>Book</h3>
            <p class="card-subtitle mb-2">Manage book list.</p>

            <!-- Category Filter -->
            <form method="GET" action="{{ route('books.index') }}" class="d-inline-block">
                <select name="category" class="form-select w-auto d-inline-block"
                        onchange="this.form.submit()">
                    <option value="">All Categories</option>

                    @foreach ($categories as $cat)
                        <option value="{{ $cat->categoryID }}"
                            {{ $categoryID == $cat->categoryID ? 'selected' : '' }}>
                            {{ $cat->category_type }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <button type="button" class="btn btn-primary"
                data-action="show"
                data-url="{{ route('books.create') }}"
                data-modal-title="Add New Book">
            <i class="bi bi-journal-plus"></i> Add Book
        </button>
    </div>


    {{-- ===================== Book Cards Grid ===================== --}}
    <div class="row row-cols-1 row-cols-md-4 g-4">

        @foreach ($books as $book)
        <div class="col">
            <div class="card h-100 shadow-sm">

                <!-- Front Cover -->
                @if ($book->front_cover)
                    <img src="{{ asset($book->front_cover) }}" class="card-img-top"
                         style="height:250px;object-fit:cover;">
                @else
                    <img src="{{ asset('assets/books/placeholder/front_cover.png') }}"
                         class="card-img-top">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="text-muted small m-0">{{ $book->author->author_name }}</p>
                    <p class="small">{{ $book->category->category_type }}</p>
                </div>

                <div class="card-footer d-flex justify-content-between">

                    <!-- Read PDF -->
                    @if ($book->file_path)
                        <a href="{{ route('books.read', $book->bookID) }}" target="_blank" class="btn btn-sm btn-success">
                            <i class="bi bi-book-half"></i> Read Online
                        </a>
                    @endif

                    <!-- Update -->
                    <button class="btn btn-sm btn-warning"
                            data-action="show"
                            data-url="{{ route('books.edit', $book->bookID) }}"
                            data-modal-title="Update Book">
                        Edit
                    </button>

                    <!-- Delete -->
                    <button class="btn btn-sm btn-danger"
                            onclick="deleteBook({{ $book->bookID }})">
                        Delete
                    </button>

                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>



{{-- ===================== Book Form Modal (for custom.js) ===================== --}}
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Book Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Form content will be loaded here by custom.js -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Delete Book
    function deleteBook(bookId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/books/${bookId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted Successfully!',
                            text: 'Book has been deleted.',
                            confirmButtonColor: '#28a745',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to delete book.',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                });
            }
        });
    }
</script>
@endsection
