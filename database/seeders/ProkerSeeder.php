<?php

namespace Database\Seeders;

use App\Models\Proker;
use App\Models\Kementerian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data to prevent duplicates on re-seeding
        Proker::query()->delete();

        $kementerians = Kementerian::all()->keyBy('nama_kementerian');

        $prokers = [
            [
                'kementerian' => 'Lingkungan Hidup',
                'nama_proker' => 'World Clean Up Day',
                'nama_ketuplak' => 'Rini Rohyati',
                'deskripsi_proker' => 'World Cleanup Day yaitu suatu kegiatan bersih-bersih yang diselenggarakan dalam rangka memperingati Hari Bersih-Bersih Sedunia yang diperingati setiap tanggal 20 September, yang diselenggarakan Kementerian Lingkungan Hidup BEM KBM Polines di Pantai Maron, Kota Semarang serta didukung oleh DLH Kota Semarang dan Lanumad Ahmad Yani. Bertujuan untuk mengajak masyarakat serta mahasiswa ikut berkontribusi dalam menjaga kelestarian lingkungan dengan aksi berupa tindakan nyata.',
                'pamflet' => '/images/flyer_proker/wcd_2026.png',
                'tanggal_pelaksanaan' => '2025-09-20',
                'dokumentasi' => '/images/foto_proker/wcd_2026_1.png, /images/foto_proker/wcd_2026_2.png, /images/foto_proker/wcd_2026_3.png'
            ],
            [
                'kementerian' => 'Pengembangan Sumber Daya Mahasiswa',
                'nama_proker' => 'Makrab Internal',
                'nama_ketuplak' => 'Archibald Amanullah Aryapati',
                'deskripsi_proker' => 'Makrab Internal merupakan salah satu progam agenda dari PSDM adanya makrab untuk membuat keakraban satu sama lain, dengan konsepan game, fgd, dan sarasehan',
                'pamflet' => '/images/flyer_proker/makrab_internal.png',
                'tanggal_pelaksanaan' => '2025-09-27',
                'dokumentasi' => '/images/foto_proker/makrab_internal_1.png, /images/foto_proker/makrab_internal_2.png, /images/foto_proker/makrab_internal_3.png'
            ],
            [
                'kementerian' => 'Pengembangan Sumber Daya Mahasiswa',
                'nama_proker' => 'Sekolah Staff Muda',
                'nama_ketuplak' => 'Rahmalia Anugrah Jovinanda',
                'deskripsi_proker' => 'Sekolah Staff Muda merupakan program kerja dari kementerian psdm dimana staff muda ini adalah kader tetap dari badan eksekutif mahasiswa, program kerja ini memiliki inovasi setiap tahunnya dan memberikan ilmu atau bekal bagi staff muda nantinya',
                'pamflet' => '/images/flyer_proker/staff_muda.png',
                'tanggal_pelaksanaan' => '2025-11-10',
                'dokumentasi' => '/images/foto_proker/staff_muda_1.png, /images/foto_proker/staff_muda_2.png, /images/foto_proker/staff_muda_3.png'
            ],
            [
                'kementerian' => 'Sosial Masyarakat',
                'nama_proker' => 'Polines Mengajar',
                'nama_ketuplak' => 'Dea Aulia Sahra',
                'deskripsi_proker' => 'Polines Mengajar adalah salah satu program kerja dari BEM Sosial Masyarakat Politeknik Negeri Semarang yang bekerjasama dengan OKM Polines Mengabdi. Kegiatan ini berfokus pada pengajaran kreatif dan edukatif kepada siswa SD, Komunitas, serta Panti Asuhan. Program kerja ini bergerak dalam bidang pendidikan yang bertujuan untuk menginspirasi peserta didik agar tetap semangat dalam belajar, mengenali diri dan lingkungannya, serta menumbuhkan rasa percaya diri.',
                'pamflet' => '/images/flyer_proker/polines_mengajar.png',
                'tanggal_pelaksanaan' => '2025-12-10',
                'dokumentasi' => '/images/foto_proker/polines_mengajar_1.png, /images/foto_proker/polines_mengajar_2.png, /images/foto_proker/polines_mengajar_3.png'
            ],
            [
                'kementerian' => 'Riset dan Keilmuan',
                'nama_proker' => 'Sekolah PKM 2026',
                'nama_ketuplak' => 'Melinda Yulandika Putri',
                'deskripsi_proker' => 'Program Kreativitas Mahasiswa (PKM) adalah program pemerintah Indonesia (Kemendikbudristek) yang bertujuan meningkatkan kreativitas, inovasi, and kemampuan penalaran ilmiah mahasiswa. Di lingkungan Politeknik Negeri Semarang masih terdapat banyak mahasiswa yang belum mengetahui program tersebut, beberapa diantaranya merasa belum tahu mengenai teknis beserta alur pelaksanaannya. Sekolah PKM 2026 hadir untuk menjawab permasalahan tersebut, program ini bertujuan untuk menjadi wadah bagi mahasiswa yang berminat mengikuti PKM serta menarik minat mahasiswa untuk mengikuti program tersebut.',
                'pamflet' => '/images/flyer_proker/sekolah_pkm.png',
                'tanggal_pelaksanaan' => '2025-02-11',
                'dokumentasi' => '/images/foto_proker/sekolah_pkm_1.png, /images/foto_proker/sekolah_pkm_2.png, /images/foto_proker/sekolah_pkm_3.png'
            ],
            [
                'kementerian' => 'Luar Negeri',
                'nama_proker' => 'Studi Banding BEM KBM Polines X BEM Unsoed',
                'nama_ketuplak' => 'Dyah Ajeng Palupi',
                'deskripsi_proker' => 'Studi banding BEM KBM Polines dengan BEM Unsoed merupakan kegiatan pertukaran wawasan and pengalaman organisasi kemahasiswaan. Kegiatan ini bertujuan untuk saling berbagi program kerja, sistem organisasi, serta strategi pengembangan BEM and dilaksanakan pada hari Minggu, 23 November 2025, bertempat di Universitas Jenderal Soedirman. Melalui studi banding ini, diharapkan mendapat inovasi yang bermanfaat bagi kedua belah pihak.',
                'pamflet' => '/images/flyer_proker/studi_banding.png',
                'tanggal_pelaksanaan' => '2025-11-23',
                'dokumentasi' => '/images/foto_proker/studi_banding_1.png, /images/foto_proker/studi_banding_2.png, /images/foto_proker/studi_banding_3.png'
            ],
            [
                'kementerian' => 'Lingkungan Hidup',
                'nama_proker' => 'Diskusi Lingkungan x Aksi Tanam Mangrove',
                'nama_ketuplak' => 'Tinka Rahma Tasbihta',
                'deskripsi_proker' => 'Diskusi Lingkungan x Aksi Tanam Mangrove:',
                'pamflet' => '/images/flyer_proker/diskusi_lingkungan.png',
                'tanggal_pelaksanaan' => '2025-12-14',
                'dokumentasi' => '/images/foto_proker/diskusi_lingkungan_1.png, /images/foto_proker/diskusi_lingkungan_2.png, /images/foto_proker/diskusi_lingkungan_3.png'
            ],
            [
                'kementerian' => 'Sosial Masyarakat',
                'nama_proker' => 'Desa Mitra',
                'nama_ketuplak' => 'Ikhza Iflakhul Haqi',
                'deskripsi_proker' => 'Desa Mitra adalah program kerja kementerian sosial masyarakat yang membawakan 3 bidang yaitu pendidikan, lingkungan, ekonomi kreatif. dilaksanakan pada tanggal 8 November, 6 Desember, 23-24 januari',
                'pamflet' => '/images/flyer_proker/desa_mitra.png',
                'tanggal_pelaksanaan' => '2026-01-03',
                'dokumentasi' => '/images/foto_proker/desa_mitra_1.png, /images/foto_proker/desa_mitra_2.png, /images/foto_proker/desa_mitra_3.png'
            ],
            [
                'kementerian' => 'Minat dan Bakat',
                'nama_proker' => 'ORMAWA CUP 2026',
                'nama_ketuplak' => 'Berliansyah Fellano',
                'deskripsi_proker' => 'Ormawa Cup 2026 dilaksanakan berdasarkan kebutuhan untuk memperkuat solidaritas and kolaborasi antar-organisasi mahasiswa dalam satu lingkungan besar di Politeknik Negeri Semarang. Kegiatan ini bertujuan menyatukan seluruh ormawa dalam ruang kebersamaan melalui kompetisi olahraga supaya membentuk mahasiswa yang berprestasi, berintegritas, and memiliki kemampuan bersaing secara sehat.Ormawa Cup 2026 menjadi aktivitas yang tidak hanya bersifat kompetisi, tetapi juga sarana membangun solidaritas, kerja sama, serta pengembangan soft skill mahasiswa. Kegiatan ini juga merupakan implementasi dari program kerja Kementerian Minat and Bakat BEM KBM POLINES.',
                'pamflet' => '/images/flyer_proker/ormawa_cup.png',
                'tanggal_pelaksanaan' => '2026-01-24',
                'dokumentasi' => '/images/foto_proker/ormawa_cup_1.png, /images/foto_proker/ormawa_cup_2.png, /images/foto_proker/ormawa_cup_3.png'
            ],
            [
                'kementerian' => 'Pengembangan Sumber Daya Mahasiswa',
                'nama_proker' => 'LKMM Madya 2026',
                'nama_ketuplak' => 'Tahta Nida\'il',
                'deskripsi_proker' => 'LKMM Madya merupakan pelatihan manajamen mahasiswa yang bertujuan untuk membentuk karakter sebagai seorang pemimpin, pada kegiatan ini mahasiswa di bekali ilmu tentang kedisiplinan, berpikir strategis and keterampilan manajerial',
                'pamflet' => '/images/flyer_proker/lkmm_madya.png',
                'tanggal_pelaksanaan' => '2026-01-27',
                'dokumentasi' => '/images/foto_proker/lkmm_madya_1.png, /images/foto_proker/lkmm_madya_2.png, /images/foto_proker/lkmm_madya_3.png'
            ],
            [
                'kementerian' => 'Riset dan Keilmuan',
                'nama_proker' => 'Sosialisasi PPKO 2026',
                'nama_ketuplak' => 'Putik Syaibatun Nafia',
                'deskripsi_proker' => 'Sosialisasi Program Penguatan Kapasitas Organisasi Mahasiswa (PPKO) merupakan proker untuk memperkenalkan apa itu PPKO kepada mahasiswa ormawa. Benefit mengikuti PPKO dapat memperoleh pendanaan, ikut serta memberdayakan masyarakat, meningkatkan value dari ormawa itu sendiri, and bagi mahasiswa ormawa dapat memperoleh sertifikat',
                'pamflet' => '/images/flyer_proker/sosialisasi_ppko.png',
                'tanggal_pelaksanaan' => '2026-01-31',
                'dokumentasi' => '/images/foto_proker/sosialisasi_ppko_1.png, /images/foto_proker/sosialisasi_ppko_2.png, /images/foto_proker/sosialisasi_ppko_3.png'
            ],
            [
                'kementerian' => 'Riset dan Keilmuan',
                'nama_proker' => 'Seminar Tematik',
                'nama_ketuplak' => 'Anisa Farcha Noviani',
                'deskripsi_proker' => 'Seminar tematik merupakan seminar yang membahas 1 tema khusus secara fokus and mendalam. Jadi, fokus pembahasannya tidak melebar kemana mana, namun benar-benar terarah pada satu topik utama',
                'pamflet' => '/images/flyer_proker/seminar_tematik.png',
                'tanggal_pelaksanaan' => '2026-03-07',
                'dokumentasi' => '/images/foto_proker/seminar_tematik_1.png, /images/foto_proker/seminar_tematik_2.png, /images/foto_proker/seminar_tematik_3.png'
            ],
            [
                'kementerian' => 'Sosial Politik',
                'nama_proker' => 'Nyala Dialektika',
                'nama_ketuplak' => 'Ovi Permata Wulandari',
                'deskripsi_proker' => 'Nyala dialektika merupakan program kerja yang berisi tentang seminar and panggung rakyat mengenai isu ketenagakerjaan pada saat ini',
                'pamflet' => 'images/flyer_proker/nyala_dialektika.png',
                'tanggal_pelaksanaan' => '2026-05-08',
                'dokumentasi' => 'images/foto_proker/nyala_dialektika_1.png, images/foto_proker/nyala_dialektika_2.png, images/foto_proker/nyala_dialektika_3.png'
            ],
            [
                'kementerian' => 'BEM KBM POLINES',
                'nama_proker' => 'Lentera Asa Festival',
                'nama_ketuplak' => 'Hafiidh Ahmad Imam Saputra',
                'deskripsi_proker' => 'Lentera Asa Festival 2026 merupakan kolaborasi strategis antara Kementerian Advokesma, Luar Negeri, Minat dan Bakat dan Ekonomi Kreatif yang dirancang sebagai malam apresiasi bagi seluruh mahasiswa. Kegiatan ini menjadi ruang untuk merayakan pencapaian serta kreativitas mahasiswa dalam suasana yang penuh kehangatan dan inspirasi. Melalui festival ini, diharapkan tercipta sinergi yang lebih kuat serta semangat baru bagi mahasiswa untuk terus berkarya di masa depan.',
                'pamflet' => 'images/flyer_proker/lentera_asa_festival.png',
                'tanggal_pelaksanaan' => '2026-04-25',
                'dokumentasi' => 'images/foto_proker/lentera_asa_festival_1.png, images/foto_proker/lentera_asa_festival_2.png, images/foto_proker/lentera_asa_festival_3.png'
            ],
            [
                'kementerian' => 'Dewan Pimpinan',
                'nama_proker' => 'Upgrading',
                'nama_ketuplak' => 'Auliya Putra',
                'deskripsi_proker' => 'Kegiatan untuk meningkatkan mutu, pengetahuan, ilmu regenerasi, dan menumbuhkan kembali semangat berorganisasi serta mengenalkan dan mempererat satu sama lain antar fungsionaris. Selain itu, kegiatan ini juga dapat meningkatkan kualitas dan kapabilitas para fungsionaris dalam memahami perannya sebagai bagian dari organisasi yang memiliki dinamika secara normatif.',
                'pamflet' => 'images/flyer_proker/upgrading.png',
                'tanggal_pelaksanaan' => '2025-09-07',
                'dokumentasi' => 'images/foto_proker/upgrading_1.png, images/foto_proker/upgrading_2.png, images/foto_proker/upgrading_3.png'
            ],
            [
                'kementerian' => 'BEM KBM POLINES',
                'nama_proker' => 'Musyawarah Nasional BEM SI XIX',
                'nama_ketuplak' => 'Belum Ditentukan',
                'deskripsi_proker' => 'MUNAS BEM SI XIX merupakan forum musyawarah tertinggi mahasiswa nasional yang diselenggarakan di Politeknik Negeri Semarang sebagai sarana strategis untuk memperkuat sinergi dalam merespons berbagai isu nasional. Agenda utama kegiatan ini adalah pengambilan keputusan kolektif yang meliputi perumusan arah gerak, penyusunan rekomendasi kebijakan, serta penetapan struktur kepemimpinan aliansi periode mendatang. Melalui pelaksanaan sidang ini, mahasiswa mempertegas komitmennya terhadap nilai demokrasi dan keadilan sekaligus memperkuat perannya sebagai mitra-poros pembangunan bangsa Indonesia.',
                'pamflet' => 'images/flyer_proker/munas_bem_si_xix.png',
                'tanggal_pelaksanaan' => '2026-06-22',
                'dokumentasi' => 'images/foto_proker/munas_bem_si_xix_1.png, images/foto_proker/munas_bem_si_xix_2.png, images/foto_proker/munas_bem_si_xix_3.png'
            ],
        ];

        foreach ($prokers as $data) {
            $kementerian = $kementerians[$data['kementerian']] ?? null;
            if ($kementerian) {
                Proker::create([
                    'kementerian_id' => $kementerian->id,
                    'nama_proker' => $data['nama_proker'],
                    'slug' => Str::slug($data['nama_proker']),
                    'nama_ketuplak' => $data['nama_ketuplak'],
                    'deskripsi_proker' => $data['deskripsi_proker'],
                    'pamflet' => $data['pamflet'],
                    'tanggal_pelaksanaan' => $data['tanggal_pelaksanaan'],
                    'dokumentasi' => $data['dokumentasi'],
                ]);
            }
        }
    }
}
