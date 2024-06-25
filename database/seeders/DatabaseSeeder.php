<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'fullname' => 'Master Admin',
            'username' => 'master_kemudi',
            'password' => bcrypt('12345'),
            'role' => "sys_admin"
        ]);
        User::create([
            'fullname' => 'General User',
            'username' => 'general_user',
            'password' => bcrypt('sayauser'),
            'role' => "user"
        ]);
        User::create([
            'fullname' => 'Instruktur',
            'username' => 'instruktur_kursus',
            'password' => bcrypt('sayainstruktur'),
            'role' => "instructor"
        ]);
        User::create([
            'fullname' => 'Pemilik / Admin',
            'username' => 'pemilik_kursus',
            'password' => bcrypt('sayapemilik'),
            'role' => "admin"
        ]);
    }
}
