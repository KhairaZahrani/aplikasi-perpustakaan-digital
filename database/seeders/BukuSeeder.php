<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buku')->insert([
            'Judul' => 'Laskar Pelangi',
            'Penulis' => 'Hiraya Hinata',
            'Penerbit' => 'Khaira Zahrani',
            'TahunTerbit' => '2021',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('buku')->insert([
            'Judul' => 'Married-Zone',
            'Penulis' => 'Aimemy',
            'Penerbit' => 'Khaira Zahrani',
            'TahunTerbit' => '2019',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
