
@extends('master')

@section('content')
    <div class="card-body">
        {{-- Header for Book Page --}}
    <div class="d-md-flex align-items-center">
        <div>
            <h3>Book</h3>
            <p class="card-subtitle">
                Manage book list.
            </p>
            <button type="button"
                class="btn btn-primary"
                data-action="show"
                data-url="{{ route('books.create') }}"
                data-modal-title="Add New Book">
                <i class="bi bi-journal-plus"></i> Add Book
            </button>
        </div>
        <div class="ms-auto">
            <form class="d-flex" role="search">
                <input class="form-control me-2 outline-4 border border-2 border-info-subtle" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-info" type="submit"> <i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
    <div class="table-responsive mt-5">

    </div>
</div>
@endsection
