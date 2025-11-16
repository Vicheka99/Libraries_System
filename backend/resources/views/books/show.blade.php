@extends('master')

@section('content')
<div class="container mt-4">

    <a href="{{ route('books.index') }}" class="btn btn-secondary mb-3">← Back to Books</a>

    <h2 class="mb-3">{{ $book->title }}</h2>

    <div class="row">
        <!-- Covers -->
        <div class="col-md-6">
            <h5>Front Cover:</h5>
            @if($book->front_cover)
                <img src="{{ asset($book->front_cover) }}" class="img-fluid rounded mb-3">
            @else
                <p>No front cover uploaded.</p>
            @endif
        </div>

        <div class="col-md-6">
            <h5>Back Cover:</h5>
            @if($book->back_cover)
                <img src="{{ asset($book->back_cover) }}" class="img-fluid rounded mb-3">
            @else
                <p>No back cover uploaded.</p>
            @endif
        </div>
    </div>

    <hr>

    <!-- Book Info -->
    <p><strong>Author:</strong> {{ $book->author->author_name }}</p>
    <p><strong>Category:</strong> {{ $book->category->category_type }}</p>
    <p><strong>Description:</strong> {{ $book->description ?? 'No description.' }}</p>
    <p><strong>Stock:</strong> {{ $book->stockQTY }}</p>

    <!-- PDF Link -->
    <h5 class="mt-4">PDF File:</h5>
    @if($book->file_path)
        <a href="{{ asset($book->file_path) }}" target="_blank" class="btn btn-success">
            Open PDF File
        </a>
    @else
        <p>No PDF file uploaded.</p>
    @endif
</div>
@endsection
