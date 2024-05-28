<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Product A',
                'harga_produk' => 10000,
                'stok_produk' => 50,
                'deskripsi_produk' => 'Description for Product A',
            ],
            [
                'nama_produk' => 'Product B',
                'harga_produk' => 20000,
                'stok_produk' => 30,
                'deskripsi_produk' => 'Description for Product B',
            ],
            [
                'nama_produk' => 'Product C',
                'harga_produk' => 30000,
                'stok_produk' => 20,
                'deskripsi_produk' => 'Description for Product C',
            ],
            [
                'nama_produk' => 'Product D',
                'harga_produk' => 40000,
                'stok_produk' => 10,
                'deskripsi_produk' => 'Description for Product D',
            ],
        ]);
    }
}
