@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>

    {{-- Penggunaan Blade Conditional --}}
    @if($stock > 0)
        <p><em>Status Stok Umum: Buku tersedia (Stok: {{ $stock }})</em></p>
    @else
        <p><em>Status Stok Umum: Buku sedang habis.</em></p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book['id'] }}</td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['author'] }}</td>
                    <td>{{ $book['year'] }}</td>
                    <td><a href="/books/{{ $book['id'] }}">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection