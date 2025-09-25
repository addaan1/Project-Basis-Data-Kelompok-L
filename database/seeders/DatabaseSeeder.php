<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Baris ini memastikan hanya UserSeeder kita yang dijalankan.
        $this->call([
            UserSeeder::class,
        ]);

        // Pastikan tidak ada kode lain di sini seperti \App\Models\User::factory(10)->create();
    }
}