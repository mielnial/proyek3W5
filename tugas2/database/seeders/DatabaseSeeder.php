<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Buku Tulis',      'harga' => 5000,  'stok' => 100],
            ['nama' => 'Pulpen',          'harga' => 3000,  'stok' => 200],
            ['nama' => 'Pensil 2B',       'harga' => 2500,  'stok' => 150],
            ['nama' => 'Penghapus',       'harga' => 2000,  'stok' => 120],
            ['nama' => 'Penggaris 30 cm', 'harga' => 4000,  'stok' => 80],
            ['nama' => 'Tas Ransel',      'harga' => 85000, 'stok' => 20],
        ];

        foreach ($data as $item) {
            Barang::create($item);
        }
    }
}