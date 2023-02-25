@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $book->title }}</h1>
                <h4>by {{ $book->author }}</h4>
                <hr>
                <p>{{ $book->description }}</p>
                <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                <p><strong>Genre:</strong> {{ $book->genre }}</p>
                <p><strong>Publication Date:</strong> {{ $book->publication_date }}</p>
                <p><strong>Price:</strong> {{ $book->price }}</p>
            </div>
            <div class="col-md-4">
                <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="img-fluid">
            </div>
        </div>
    </div>
@endsection
