<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    // STORE dengan Validasi (Min 2010, Max 2026)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'year'   => 'required|integer|min:2010|max:2026',
            'stock'  => 'required|integer|min:0',
        ], [
            'title.required'  => 'Judul buku wajib diisi.',
            'title.unique'    => 'Judul buku sudah terdaftar.',
            'title.max'       => 'Judul buku maksimal 255 karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'year.required'   => 'Tahun terbit wajib diisi.',
            'year.min'        => 'Tahun terbit minimal tahun 2010.',
            'year.max'        => 'Tahun terbit tidak boleh lebih dari tahun 2026.',
            'stock.required'  => 'Stok buku wajib diisi.',
            'stock.min'       => 'Stok buku tidak boleh kurang dari 0.',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE dengan Validasi (Min 2010, Max 2026)
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255|unique:books,title,' . $book->id,
            'author' => 'required|string|max:255',
            'year'   => 'required|integer|min:2010|max:2026',
            'stock'  => 'required|integer|min:0',
        ], [
            'title.required'  => 'Judul buku wajib diisi.',
            'title.unique'    => 'Judul buku sudah digunakan.',
            'author.required' => 'Nama penulis wajib diisi.',
            'year.required'   => 'Tahun terbit wajib diisi.',
            'year.min'        => 'Tahun terbit minimal tahun 2010.',
            'year.max'        => 'Tahun terbit tidak boleh lebih dari tahun 2026.',
            'stock.required'  => 'Stok buku wajib diisi.',
            'stock.min'       => 'Stok buku tidak boleh kurang dari 0.',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Data buku berhasil dihapus.');
    }
}