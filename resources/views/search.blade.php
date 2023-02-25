@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Books</h1>

        <div class="row">
           <form action="{{ route('search') }}" method="GET">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" name="author" id="author" class="form-control">
                </div>

                <div class="form-group">
                    <label for="publication_date">Publication Date:</label>
                    <input type="date" name="publication_date" id="publication_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" name="isbn" id="isbn" class="form-control">
                </div>

                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" class="form-control" value="{{ request('genre') }}">
                </div>

                <button type="submit" class="btn btn-primary">Search</button>
            </form>

        </div>
    </div>
@endsection
