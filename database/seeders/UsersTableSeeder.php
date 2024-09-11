<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'khaira',
            'password' => Hash::make('12345678'),
            'email' => 'khaira@gmail.com',
            'nama_lengkap' => 'khaira zahrani',
            'alamat' => 'Pertanian',
            'role' => 'Peminjam'
        ]);
        
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'email' => 'admin@gmail.com',
            'nama_lengkap' => 'khaira zahrani',
            'alamat' => 'Pertanian',
            'role' => 'Administrator'
        ]);
    }
}
