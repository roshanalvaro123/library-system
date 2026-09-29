<?php

namespace App\Http\Controllers;

use App\Models\Book; // Pastikan import Model Book ini ada di atas
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Mengambil seluruh data dari tabel books via Eloquent
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
}