<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Library System</title>
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <nav>
            <a href="/dashboard">Dashboard</a> | 
            <a href="{{ route('books.index') }}">Books</a> | 
            <a href="#">Categories</a> | 
            <a href="#">Members</a>
        </nav>

        <!-- Form Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" onclick="return confirm('Yakin ingin logout?')">Logout</button>
        </form>
    </div>

    <hr>

    <h1>Daftar Buku</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <p><a href="{{ route('books.create') }}">+ Tambah Buku Baru</a></p>

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
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
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name ?? 'Belum ada kategori' }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">Detail</a> | 
                        <a href="{{ route('books.edit', $book->id) }}">Edit</a> | 
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center">Data buku masih kosong.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>