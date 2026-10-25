@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>

    @if(session('success'))
        <div style="color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('books.create') }}">+ Tambah Buku Baru</a>
    </p>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category?->name ?? 'Belum ada kategori' }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">Detail</a> |
                        <a href="{{ route('books.edit', $book->id) }}">Edit</a> |
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection