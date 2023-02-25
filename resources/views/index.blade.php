@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <h1>Books</h1>
           <h1><a href="{{ route('searchbooks') }}">Looking for a specific book Search here</a></h1>
        </div>
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                            <p class="card-text">{{ $book->description }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="card-link">View details</a>
                        </div>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>
@endsection
