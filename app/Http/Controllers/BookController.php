<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            ['id' => 1, 'title' => 'Pemrograman PHP', 'author' => 'Rian Hidayat', 'year' => 2021],
            ['id' => 2, 'title' => 'Laravel untuk Pemula', 'author' => 'Budi Raharjo', 'year' => 2023],
            ['id' => 3, 'title' => 'Basis Data Modern', 'author' => 'Siti Aminah', 'year' => 2020],
            ['id' => 4, 'title' => 'Algoritma dan Pemrograman', 'author' => 'Eko Kurniawan', 'year' => 2019],
            ['id' => 5, 'title' => 'Pemrograman Berorientasi Objek', 'author' => 'Dedi Wijaya', 'year' => 2022],
            ['id' => 6, 'title' => 'Mastering Vue.js', 'author' => 'Andi Pratama', 'year' => 2024],
            ['id' => 7, 'title' => 'Keamanan Jaringan', 'author' => 'Lestari Suci', 'year' => 2018],
            ['id' => 8, 'title' => 'Kecerdasan Buatan Dasar', 'author' => 'Agus Santoso', 'year' => 2023]
        ];

        $stock = 7; // Untuk syarat directive @if di modul latihan

        return view('books.index', compact('books', 'stock'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}