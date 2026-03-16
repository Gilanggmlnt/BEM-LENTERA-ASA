<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KementerianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kementerianList = [
            'Kesekretariatan','Keuangan','Komunikasi dan Informasi','Dalam Negeri',
            'Pengembangan Sumber Daya Mahasiswa','Agama','Advokasi dan Kesejahteraan Mahasiswa',
            'Minat dan Bakat','Riset dan Keilmuan','Ekonomi Kreatif','Sosial Masyarakat',
            'Lingkungan Hidup','Sosial Politik','Luar Negeri'
        ];

        foreach ($kementerianList as $nama) {
            Kementerian::create(['nama_kementerian' => $nama]);
        }
    }
}