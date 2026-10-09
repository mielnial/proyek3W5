<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </header>

    <main>
        <h2>Selamat datang, {{ Auth::user()->nama_lengkap }}!</h2>
        <p>Halaman ini hanya bisa dibuka setelah login.</p>
        <p>Username: {{ Auth::user()->username }}</p>
    </main>
</body>
</html>