<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255|unique:books,title',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:2010|max:2026',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required'       => 'Judul buku wajib diisi.',
            'title.unique'         => 'Judul buku sudah terdaftar.',
            'author.required'      => 'Nama penulis wajib diisi.',
            'year.required'        => 'Tahun terbit wajib diisi.',
            'year.min'             => 'Tahun terbit minimal tahun 2010.',
            'year.max'             => 'Tahun terbit tidak boleh lebih dari tahun 2026.',
            'stock.required'       => 'Stok buku wajib diisi.',
            'stock.min'            => 'Stok buku tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
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
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255|unique:books,title,' . $book->id,
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:2010|max:2026',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required'       => 'Judul buku wajib diisi.',
            'title.unique'         => 'Judul buku sudah digunakan.',
            'author.required'      => 'Nama penulis wajib diisi.',
            'year.required'        => 'Tahun terbit wajib diisi.',
            'year.min'             => 'Tahun terbit minimal tahun 2010.',
            'year.max'             => 'Tahun terbit tidak boleh lebih dari tahun 2026.',
            'stock.required'       => 'Stok buku wajib diisi.',
            'stock.min'            => 'Stok buku tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
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