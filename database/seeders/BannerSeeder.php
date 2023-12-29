<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banner')->insert([
            'title' => 'SEIRAMA',
            'subtitle' => '(Sistem Informasi Kerjasama)',
            'second_title' => 'BBPP Batangkaluku',
            'desc' => 'Menjadi Lembaga Pelatihan Terpercaya dan Berdaya Saing untuk Menghasilkan SDM Pertanian yang Kreatif, Inovatif dan Profesional.',
        ]);
    }
}
