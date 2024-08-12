<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mitra')->insert([
            [
                'id' => 1,
                'namamitra' => 'UDINUS',
                'created_at' => '2024-07-19 07:45:01',
                'updated_at' => '2024-07-24 03:54:14',
                'image' => null,
                'detail' => 'Universitas Dian Nuswantoro adalah salah satu perguruan tinggi swasta di Indonesia.',
                'contact_person' => null
            ],
            [
                'id' => 4,
                'namamitra' => 'PSIS Semarang',
                'created_at' => '2024-07-24 03:28:43',
                'updated_at' => '2024-07-24 03:54:55',
                'image' => null,
                'detail' => 'Persatuan Sepak Bola Indonesia Semarang adalah klub sepak bola profesional yang bermarkas di Semarang.',
                'contact_person' => null
            ],
            [
                'id' => 5,
                'namamitra' => 'INDOSPORT.COM',
                'created_at' => '2024-07-24 03:33:34',
                'updated_at' => '2024-07-24 03:56:09',
                'image' => null,
                'detail' => 'Mengusung slogan We Are Sport!! INDOSPORT berambisi menjadi sumber informasi olahraga terpercaya.',
                'contact_person' => null
            ],
            [
                'id' => 6,
                'namamitra' => 'SUARAMERDEKA.COM',
                'created_at' => '2024-07-24 03:34:55',
                'updated_at' => '2024-07-24 03:56:27',
                'image' => null,
                'detail' => 'Suara Merdeka adalah adalah sebuah surat kabar harian yang terbit di Semarang.',
                'contact_person' => null
            ],
            [
                'id' => 7,
                'namamitra' => 'PORSIK',
                'created_at' => '2024-07-24 03:37:54',
                'updated_at' => '2024-07-24 03:57:35',
                'image' => null,
                'detail' => 'Persekutuan Siswa Kristen Perkantas Semarang adalah organisasi yang bergerak dalam pembinaan rohani siswa.',
                'contact_person' => null
            ],
            [
                'id' => 8,
                'namamitra' => 'Dinus Badminton Club',
                'created_at' => '2024-07-24 03:40:41',
                'updated_at' => '2024-07-24 03:58:00',
                'image' => null,
                'detail' => 'UKM Badminton Universitas Dian Nuswantoro.',
                'contact_person' => null
            ],
            [
                'id' => 9,
                'namamitra' => 'ORMAWA UDINUS',
                'created_at' => '2024-07-24 03:41:54',
                'updated_at' => '2024-07-24 03:58:28',
                'image' => null,
                'detail' => 'BEM FIK, HMTI UDINUS, DKV UDINUS adalah beberapa organisasi mahasiswa di Universitas Dian Nuswantoro.',
                'contact_person' => null
            ]
        ]);
    }
}
