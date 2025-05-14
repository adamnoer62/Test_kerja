<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama_depan'    => 'Admin',
            'nama_belakang' => 'Pegawai',
            'email'         => 'admin@example.com',
            'password'      => Hash::make('password'),
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'L',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);


    }
}
