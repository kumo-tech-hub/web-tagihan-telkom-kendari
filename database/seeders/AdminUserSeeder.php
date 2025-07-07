<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Cek apakah sudah ada
            [
                'name' => 'Administrator',
                'email' => 'admin@telkom.com',
                'password' => Hash::make('admin123'), // Ganti dengan password aman
                'role' => 'admin',
                'company_id' => null, // Sesuaikan jika perlu, pastikan ID 1 ada di tabel companies
            ]
        );
    }
}
