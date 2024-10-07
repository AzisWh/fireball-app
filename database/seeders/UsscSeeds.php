<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsscSeeds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ussc_lapangans')->insert([
            'nama_lapangan' => 'USSC Udinus',
            'jumlah_lapangan' => 1,
            'harga_lapangan_per_jamnya' => 0,
            'lokasi_lapangan' => 'Udinus',
            'mitra' => 'Universitas Dian Nuswantoro',
        ]);
    }
}
