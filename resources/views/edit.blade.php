@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $book->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="publication_date">Publication Date</label>
                <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ old('publication_date', $book->publication_date) }}" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $book->genre) }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $book->price) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
@endsection
