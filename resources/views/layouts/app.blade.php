<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Library System</title>
    <style>
        body { font-family: sans-serif; margin: 30px; background-color: #f9f9f9; color: #333; }
        header { background: #ffffff; padding: 15px 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        nav a { font-weight: bold; color: #007bff; text-decoration: none; margin: 0 5px; }
        nav a:hover { text-decoration: underline; }
        main { background: #ffffff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <header>
        <h1>📚 Library System</h1>
        <nav>
            <a href="/dashboard">Dashboard</a> | 
            <a href="/books">Books</a> | 
            <a href="/categories">Categories</a> | 
            <a href="/members">Members</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; Library System - Pemrograman Web Framework</p>
    </footer>
</body>
</html>