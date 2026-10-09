<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    <div class="kotak">
        <h1>Login</h1>
        <p class="sub">Masuk untuk membuka dashboard</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>