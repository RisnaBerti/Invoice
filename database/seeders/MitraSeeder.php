<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mitra')->insert([
            [
                'id_mitra' => 1,
                'nama_mitra' => 'PT Sukses Bersama',
                'alamat_mitra' => 'Jl. Merdeka No. 123, Jakarta',
                'no_telp_mitra' => '021-12345678',
                'email_mitra' => 'info@suksesbersama.com',
            ],
            [
                'id_mitra' => 2,
                'nama_mitra' => 'CV Maju Jaya',
                'alamat_mitra' => 'Jl. Jaya Raya No. 456, Bandung',
                'no_telp_mitra' => '022-87654321',
                'email_mitra' => 'contact@majuhaya.com',
            ],
            [
                'id_mitra' => 3,
                'nama_mitra' => 'UD Sentosa Abadi',
                'alamat_mitra' => 'Jl. Sentosa No. 789, Surabaya',
                'no_telp_mitra' => '031-11223344',
                'email_mitra' => 'support@sentosaabadi.com',
            ],
            [
                'id_mitra' => 4,
                'nama_mitra' => 'PT Amanah Sejahtera',
                'alamat_mitra' => 'Jl. Sejahtera No. 101, Yogyakarta',
                'no_telp_mitra' => '0274-33445566',
                'email_mitra' => 'info@amanahsejahtera.com',
            ],
            [
                'id_mitra' => 5,
                'nama_mitra' => 'CV Karya Mandiri',
                'alamat_mitra' => 'Jl. Karya No. 202, Semarang',
                'no_telp_mitra' => '024-55667788',
                'email_mitra' => 'contact@karyamandiri.com',
            ],
            [
                'id_mitra' => 6,
                'nama_mitra' => 'PT Inspirasi Bangsa',
                'alamat_mitra' => 'Jl. Inspirasi No. 303, Medan',
                'no_telp_mitra' => '061-77889900',
                'email_mitra' => 'info@inspirasibangsa.com',
            ],
            [
                'id_mitra' => 7,
                'nama_mitra' => 'CV Solusi Teknologi',
                'alamat_mitra' => 'Jl. Teknologi No. 404, Malang',
                'no_telp_mitra' => '0341-99887766',
                'email_mitra' => 'support@solusiteknologi.com',
            ],
            [
                'id_mitra' => 8,
                'nama_mitra' => 'UD Pangan Sejahtera',
                'alamat_mitra' => 'Jl. Pangan No. 505, Palembang',
                'no_telp_mitra' => '0711-66554433',
                'email_mitra' => 'contact@pangansejahtera.com',
            ],
            [
                'id_mitra' => 9,
                'nama_mitra' => 'PT Energi Nusantara',
                'alamat_mitra' => 'Jl. Energi No. 606, Makassar',
                'no_telp_mitra' => '0411-55667788',
                'email_mitra' => 'info@energinusantara.com',
            ],
            [
                'id_mitra' => 10,
                'nama_mitra' => 'CV Kreatif Inovasi',
                'alamat_mitra' => 'Jl. Kreatif No. 707, Bali',
                'no_telp_mitra' => '0361-77889900',
                'email_mitra' => 'support@kreatifinovasi.com',
            ],
        ]);

    }
}
