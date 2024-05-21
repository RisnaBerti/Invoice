<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id_user' => '2',
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'jabatan' => 'Admin',
            'is_aktif' => 1,
            'id_role' => 2,
        ]);

        User::create([
            'id_user' => '1',
            'nama' => 'direktur',
            'email' => 'direktur@gmail.com',
            'password' => bcrypt('123'),
            'jabatan' => 'Direktur',
            'is_aktif' => 1,
            'id_role' => 1,
        ]);
    }
}
