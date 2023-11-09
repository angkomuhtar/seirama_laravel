<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'type' => 'agama',
                'kode' => 'I',
                'value' => 'Islam',
                'urut' => '1',
            ], [
                'type' => 'agama',
                'kode' => 'K',
                'value' => 'Katolik',
                'urut' => '2',
            ], [
                'type' => 'agama',
                'kode' => 'P',
                'value' => 'Protestan',
                'urut' => '3',
            ], [
                'type' => 'agama',
                'kode' => 'H',
                'value' => 'Hindu',
                'urut' => '4',
            ], [
                'type' => 'agama',
                'kode' => 'B',
                'value' => 'Buddha',
                'urut' => '5',
            ], [
                'type' => 'agama',
                'kode' => 'Kh',
                'value' => 'Khonghucu',
                'urut' => '6',
            ], [
                'type' => 'pendidikan',
                'kode' => 'SD',
                'value' => 'Sekolah Dasar',
                'urut' => '1',
            ], [
                'type' => 'pendidikan',
                'kode' => 'SMP',
                'value' => 'Sekolah Menengah Pertama',
                'urut' => '2',
            ], [
                'type' => 'pendidikan',
                'kode' => 'SMA',
                'value' => 'Sekolah Menengah Atas',
                'urut' => '3',
            ], [
                'type' => 'pendidikan',
                'kode' => 'DIII',
                'value' => 'Diploma 3',
                'urut' => '4',
            ], [
                'type' => 'pendidikan',
                'kode' => 'DIV',
                'value' => 'Diploma 4',
                'urut' => '5',
            ], [
                'type' => 'pendidikan',
                'kode' => 'S1',
                'value' => 'Strata 1',
                'urut' => '6',
            ], [
                'type' => 'pendidikan',
                'kode' => 'S1',
                'value' => 'Strata 2',
                'urut' => '7',
            ], [
                'type' => 'pendidikan',
                'kode' => 'S3',
                'value' => 'Strata 3',
                'urut' => '8',
            ], [
                'type' => 'sts_nikah',
                'kode' => 'TK',
                'value' => 'Belum Menikah',
                'urut' => '1',
            ], [
                'type' => 'sts_nikah',
                'kode' => 'K',
                'value' => 'Menikah',
                'urut' => '2',
            ], [
                'type' => 'golongan',
                'kode' => 'I/A',
                'value' => 'I/A',
                'urut' => '1',
            ], [
                'type' => 'golongan',
                'kode' => 'I/B',
                'value' => 'I/B',
                'urut' => '1',
            ], [
                'type' => 'golongan',
                'kode' => 'I/C',
                'value' => 'I/C',
                'urut' => '1',
            ], [
                'type' => 'golongan',
                'kode' => 'I/D',
                'value' => 'I/D',
                'urut' => '1',
            ], [
                'type' => 'golongan',
                'kode' => 'II/A',
                'value' => 'II/A',
                'urut' => '2',
            ], [
                'type' => 'golongan',
                'kode' => 'II/B',
                'value' => 'II/B',
                'urut' => '2',
            ], [
                'type' => 'golongan',
                'kode' => 'II/C',
                'value' => 'II/C',
                'urut' => '2',
            ], [
                'type' => 'golongan',
                'kode' => 'II/D',
                'value' => 'II/D',
                'urut' => '2',
            ], [
                'type' => 'golongan',
                'kode' => 'III/A',
                'value' => 'III/A',
                'urut' => '3',
            ], [
                'type' => 'golongan',
                'kode' => 'III/B',
                'value' => 'III/B',
                'urut' => '3',
            ], [
                'type' => 'golongan',
                'kode' => 'III/C',
                'value' => 'III/C',
                'urut' => '3',
            ], [
                'type' => 'golongan',
                'kode' => 'III/D',
                'value' => 'III/D',
                'urut' => '3',
            ], [
                'type' => 'golongan',
                'kode' => 'IV/A',
                'value' => 'IV/A',
                'urut' => '4',
            ], [
                'type' => 'golongan',
                'kode' => 'IV/B',
                'value' => 'IV/B',
                'urut' => '4',
            ], [
                'type' => 'golongan',
                'kode' => 'IV/C',
                'value' => 'IV/C',
                'urut' => '4',
            ], [
                'type' => 'golongan',
                'kode' => 'IV/D',
                'value' => 'IV/D',
                'urut' => '4',
            ], [
                'type' => 'golongan',
                'kode' => 'IV/E',
                'value' => 'IV/E',
                'urut' => '4',
            ], [
                'type' => 'golongan_jabatan',
                'kode' => 'Struktural',
                'value' => 'Struktural',
                'urut' => '1',
            ], [
                'type' => 'golongan_jabatan',
                'kode' => 'Fungsional',
                'value' => 'Fungsional',
                'urut' => '1',
            ], [
                'type' => 'golongan_jabatan',
                'kode' => 'THL',
                'value' => 'THL',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Sekjen',
                'value' => 'Sekjen',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Itjen',
                'value' => 'Itjen',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Ditjen TP',
                'value' => 'Ditjen TP',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Ditjen Horti',
                'value' => 'Ditjen Horti',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Ditjen PSP',
                'value' => 'Ditjen PSP',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Ditjen P2HP',
                'value' => 'Ditjen P2HP',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Ditjen Nak',
                'value' => 'Ditjen Nak',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Ditjen Bun',
                'value' => 'Ditjen Bun',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'BKP',
                'value' => 'BKP',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'BPPSDM',
                'value' => 'BPPSDM',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Balitbang',
                'value' => 'Balitbang',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Barantan',
                'value' => 'Barantan',
                'urut' => '1',
            ], [
                'type' => 'unit_eselon',
                'kode' => 'Pemda',
                'value' => 'Pemda',
                'urut' => '1',
            ],
        ];
        DB::table('options')->insert($data);

        $kerjasama = [
            [
                'nama' => 'kerjasama instansi',
                'deskripsi' => 'Lorem, ipsum doLorem, ipsum dolor sit amet consectetur adipisicing elit. Ad voluptatem quaerat recusandae unde iusto quos necessitatibus lor sit',
                'image' => 'kerjasama/kerjasama.svg',
            ],[
                'nama' => 'Tenaga Penmgajar',
                'deskripsi' => 'Lorem, ipsum doLorem, ipsum dolor sit amet consectetur adipisicing elit. Ad voluptatem quaerat recusandae unde iusto quos necessitatibus lor sit',
                'image' => 'kerjasama/penagajar.svg',
            ],[
                'nama' => 'Teknologi Informasi',
                'deskripsi' => 'Lorem, ipsum doLorem, ipsum dolor sit amet consectetur adipisicing elit. Ad voluptatem quaerat recusandae unde iusto quos necessitatibus lor sit',
                'image' => 'kerjasama/teknologi.svg',
            ],[
                'nama' => 'Sarana dan Prasarana',
                'deskripsi' => 'Lorem, ipsum doLorem, ipsum dolor sit amet consectetur adipisicing elit. Ad voluptatem quaerat recusandae unde iusto quos necessitatibus lor sit',
                'image' => 'kerjasama/sarana.svg',
            ],[
                'nama' => 'Pelatihan',
                'deskripsi' => 'Lorem, ipsum doLorem, ipsum dolor sit amet consectetur adipisicing elit. Ad voluptatem quaerat recusandae unde iusto quos necessitatibus lor sit',
                'image' => 'kerjasama/pelatihan.svg',
            ]
        ];
        DB::table('jenis_kerjasama')->insert($kerjasama);
        DB::table('users')->insert([
            'email' => 'Admin@seirama.com',
            'username' => 'Admin',
            'roles' => 'superadmin',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);


    }
}
