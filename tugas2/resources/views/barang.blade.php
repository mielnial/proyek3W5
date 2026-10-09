<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <p><a href="{{ route('keranjang.index') }}">Lihat Keranjang ({{ count(session('keranjang', [])) }} jenis)</a></p>

    @if (session('sukses')) <p style="color:green">{{ session('sukses') }}</p> @endif
    @if (session('error')) <p style="color:red">{{ session('error') }}</p> @endif

    <table border="1" cellpadding="6" cellspacing="0">
        <tr><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
        @foreach ($barang as $b)
            <tr>
                <td>{{ $b->nama }}</td>
                <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                <td>{{ $b->stok }}</td>
                <td>
                    <form action="{{ route('keranjang.tambah', $b->id) }}" method="POST">
                        @csrf
                        <button type="submit">Tambah ke Keranjang</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>