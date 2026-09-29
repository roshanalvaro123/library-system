<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Pemrograman PHP untuk Pemula',
                'author' => 'Andi Wijaya',
                'year' => 2022,
                'stock' => 10,
            ],
            [
                'title' => 'Mastering Laravel Framework',
                'author' => 'Budi Santoso',
                'year' => 2023,
                'stock' => 7,
            ],
            [
                'title' => 'Basis Data Relasional',
                'author' => 'Citra Dewi',
                'year' => 2021,
                'stock' => 5,
            ],
            [
                'title' => 'Algoritma dan Struktur Data',
                'author' => 'Dedi Kurniawan',
                'year' => 2020,
                'stock' => 12,
            ],
            [
                'title' => 'Clean Code & Refactoring',
                'author' => 'Eka Prasetya',
                'year' => 2024,
                'stock' => 8,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}