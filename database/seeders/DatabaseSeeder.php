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
            'phone_number' => '999999999999',
            'password' => bcrypt('12345'),
            'role' => "sys_admin"
        ]);
        User::create([
            'fullname' => 'General User',
            'username' => 'general_user',
            'phone_number' => '+6282145649388',
            'password' => bcrypt('sayauser'),
            'role' => "user",
            'age' => 27,
            'description' => 'Driven to achieve excellence in all that I do'
        ]);
        User::create([
            'fullname' => 'Instruktur',
            'username' => 'instruktur_kursus',
            'phone_number' => '+6282145549388',
            'password' => bcrypt('sayainstruktur'),
            'role' => "instructor",
            'age' => 36,
            'description' => 'Teaching 4Lyfe'
        ]);
        User::create([
            'fullname' => 'Pemilik / Admin',
            'username' => 'pemilik_kursus',
            'phone_number' => '+6282145749388',
            'password' => bcrypt('sayapemilik'),
            'role' => "admin",
            'description' => 'House of Surabaya Driving School'
        ]);
    }
}
