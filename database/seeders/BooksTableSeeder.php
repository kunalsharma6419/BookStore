<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $response = Http::get('https://fakerapi.it/api/v1/books?_quantity=100');

        $books = json_decode($response->getBody());

        foreach ($books->data as $book) {
            \App\Models\Book::create([
                'title' => $book->title,
                'author' => $book->author,
                'description' => $book->description,
                'isbn' => $book->isbn,
                'genre' => $book->genre,
                'publication_date' => $book->published,
                'image_url' => $book->image,
                //'price' => $book->price,
            ]);
        }
    }
}
