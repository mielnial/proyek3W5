<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang</title>
</head>
<body>
    <h1>Keranjang Belanja</h1>
    <p><a href="{{ route('barang.index') }}">&larr; Lanjut belanja</a></p>

    @if (session('sukses')) <p style="color:green">{{ session('sukses') }}</p> @endif
    @if (session('error')) <p style="color:red">{{ session('error') }}</p> @endif

    @if (count($items) === 0)
        <p>Keranjang masih kosong.</p>
    @else
        <table border="1" cellpadding="6" cellspacing="0">
            <tr><th>Nama</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item['barang']->nama }}</td>
                    <td>Rp {{ number_format($item['barang']->harga, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('keranjang.kurang', $item['barang']->id) }}" method="POST" style="display:inline">
                            @csrf <button type="submit">-</button>
                        </form>
                        {{ $item['jumlah'] }}
                        <form action="{{ route('keranjang.tambah', $item['barang']->id) }}" method="POST" style="display:inline">
                            @csrf <button type="submit">+</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('keranjang.hapus', $item['barang']->id) }}" method="POST">
                            @csrf <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr><td colspan="3"><b>Total</b></td><td colspan="2"><b>Rp {{ number_format($total, 0, ',', '.') }}</b></td></tr>
        </table>

        <form action="{{ route('keranjang.kosongkan') }}" method="POST" style="margin-top:10px">
            @csrf
            <button type="submit">Kosongkan Keranjang</button>
        </form>
    @endif
</body>
</html>