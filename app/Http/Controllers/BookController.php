<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Book::query();

        $books = $query->paginate(10);

        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storebooks()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'description' => 'nullable',
        'publication_date' => 'nullable|date',
        'isbn' => 'nullable|max:255',
        'genre' => 'nullable|max:255',
        'price' => 'nullable|numeric|min:0',
        // 'image' => 'nullable|image|max:1024',
        ]);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        //     $path = $image->storeAs('public/images', $filename);
        //     $validatedData['image_url'] = Storage::url($path);
        // }

        Book::create($validatedData);

        return redirect('storebooks')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('book', compact('book'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'publication_date' => 'nullable|date',
            'isbn' => 'nullable|max:255',
            'genre' => 'nullable|max:255',
            'price' => 'nullable|numeric',
            'image_url' => 'nullable|url',
        ]);

        $book->update($validatedData);

        return redirect('books')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('books')->with('success', 'Book deleted successfully!');
    }


    /***
     * Search the specified resource with filters
     */
    // public function search(Request $request)
    // {
    //     $title = $request->input('title');
    //     $author = $request->input('author');
    //     $publication_date = $request->input('publication_date');
    //     $isbn = $request->input('isbn');
    //     $genre = $request->input('genre');

    //     $books = Book::query();

    //     if ($title) {
    //         $books->where('title', 'LIKE', '%' . $title . '%');
    //     }

    //     if ($author) {
    //         $books->where('author', 'LIKE', '%' . $author . '%');
    //     }

    //     if ($publication_date) {
    //         $books->where('publication_date', '=', $publication_date);
    //     }

    //     if ($isbn) {
    //         $books->where('isbn', '=', $isbn);
    //     }

    //     if ($genre) {
    //         $books->where('genre', '=', $genre);
    //     }

    //     $books = $books->paginate(10);

    //     return view('books.index', ['books' => $books]);
    // }
    public function searchbooks()
    {
        return view('search');
    }
    public function search(Request $request)
    {
        $query = Book::query();

        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%'.$request->input('title').'%');
        }

        if ($request->filled('author')) {
            $query->where('author', 'LIKE', '%'.$request->input('author').'%');
        }

        if ($request->filled('publication_date')) {
            $query->where('publication_date', '=', $request->input('publication_date'));
        }

        if ($request->filled('isbn')) {
            $query->where('isbn', '=', $request->input('isbn'));
        }

        if ($request->filled('genre')) {
            $query->where('genre', 'LIKE', '%'.$request->input('genre').'%');
        }

        $books = $query->paginate(10);
        //dd($books);

        return view('index', compact('books'));
    }



}
