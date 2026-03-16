<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatanList = [
            'Presiden Mahasiswa','Wakil Presiden Mahasiswa','Sekretaris Kabinet',
            'Menteri Koordinator Internal','Menteri Koordinator Kemasyarakatan',
            'Menteri Koordinator Kemahasiswaan','Menteri Koordinator Relasi dan Pergerakan',
            'Menteri','Wakil Menteri','Deputi','Staff Muda'
        ];

        foreach ($jabatanList as $jabatan) {
            Jabatan::create(['nama_jabatan' => $jabatan]);
        }
    }
}
