<?php

namespace Database\Seeders;

use App\Models\Fungsionaris;
use App\Models\Jabatan;
use App\Models\Kementerian;
use Illuminate\Database\Seeder;

class FungsionarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data to prevent duplicates on re-seeding
        Fungsionaris::truncate();

        // Pre-load all jabatans and kementerians for efficient lookup
        $jabatans = Jabatan::all()->keyBy('nama_jabatan');
        $kementerians = Kementerian::all()->keyBy('nama_kementerian');

        $fungsionarisData = [
            // Ketua
            ['nama' => 'Kevin Kurnia Priambodo', 'kementerian' => null, 'jabatan' => 'Presiden Mahasiswa', 'foto' => 'Foto_Presma_Kevin.png'],
            ['nama' => 'Anggara Yudha Pratama', 'kementerian' => null, 'jabatan' => 'Wakil Presiden Mahasiswa', 'foto' => 'Foto_Wapresma_Anggara.png'],
            ['nama' => 'Fazila Banyulangit P.', 'kementerian' => null, 'jabatan' => 'Sekretaris Kabinet', 'foto' => 'Foto_SekretarisKabinet_Fazila.png'],

            // Menko
            ['nama' => 'Muhammad Hammam Shidqi', 'kementerian' => null, 'jabatan' => 'Menteri Koordinator Internal', 'foto' => 'Foto_MenkoInternal_Muhammad.png'],
            ['nama' => 'Aditya Rizal Pramudya', 'kementerian' => null, 'jabatan' => 'Menteri Koordinator Kemahasiswaan', 'foto' => 'Foto_MenkoKemahasiswaan_Aditya.png'],
            ['nama' => 'Auliya Putra', 'kementerian' => null, 'jabatan' => 'Menteri Koordinator Kemasyarakatan', 'foto' => 'Foto_MenkoKemasyarakatan_Auliya.png'],
            ['nama' => 'Revanza Dhimas Erudita', 'kementerian' => null, 'jabatan' => 'Menteri Koordinator Relasi dan Pergerakan', 'foto' => 'Foto_MenkoRelasidanPegerakan_Revanza.png'],

            // Kementerian Kesekretariatan
            ['nama' => 'Fanisa Dwi Rahmawati', 'kementerian' => 'Kementerian Kesekretariatan', 'jabatan' => 'Menteri', 'foto' => 'Foto_KSK_Fanisa.png'],
            ['nama' => 'Alisa Nofa Tri Astuti', 'kementerian' => 'Kementerian Kesekretariatan', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_KSK_Alisa.png'],
            ['nama' => 'Aliyya Zahira', 'kementerian' => 'Kementerian Kesekretariatan', 'jabatan' => 'Deputi', 'foto' => 'Foto_KSK_Aliyya.png'],
            ['nama' => 'Geisya Calya', 'kementerian' => 'Kementerian Kesekretariatan', 'jabatan' => 'Deputi', 'foto' => 'Foto_KSK_Geisya.png'],
            ['nama' => 'Ovi Malisa', 'kementerian' => 'Kementerian Kesekretariatan', 'jabatan' => 'Deputi', 'foto' => 'Foto_KSK_Ovi.png'],
            ['nama' => 'Rivellia Auliansyah', 'kementerian' => 'Kementerian Kesekretariatan', 'jabatan' => 'Deputi', 'foto' => 'Foto_KSK_Rivellia.png'],
            ['nama' => 'Alviona Agustin Saizabilla', 'kementerian' => 'Kementerian Kesekretariatan', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_KSK_Alviona.png'],
            ['nama' => 'Nadjwa Lintang Ismoyo Putri', 'kementerian' => 'Kementerian Kesekretariatan', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_KSK_Nadjwa.png'],

            // Kementerian Keuangan
            ['nama' => 'Adelia Nasywa Adiansya', 'kementerian' => 'Kementerian Keuangan', 'jabatan' => 'Menteri', 'foto' => 'Foto_Keu_Adelia.png'],
            ['nama' => 'Carissa Atha Salsabilla', 'kementerian' => 'Kementerian Keuangan', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Keu_Carissa.png'],
            ['nama' => 'Dela Dea Rahmawati', 'kementerian' => 'Kementerian Keuangan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Keu_Dela.png'],
            ['nama' => 'Hanina Zafira Hadi', 'kementerian' => 'Kementerian Keuangan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Keu_Hanina.png'],
            ['nama' => 'Nabila Mulya Rahmayanti', 'kementerian' => 'Kementerian Keuangan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Keu_Nabila.png'],
            ['nama' => 'Tri Wulansari', 'kementerian' => 'Kementerian Keuangan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Keu_Tri.png'],
            ['nama' => 'Alisa', 'kementerian' => 'Kementerian Keuangan', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Keu_Alisa.png'],
            ['nama' => 'Tyas Ayu Novitasari', 'kementerian' => 'Kementerian Keuangan', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Keu_Tyas.png'],

            // Kementerian Komunikasi dan Informasi
            ['nama' => 'Gilang Maulanata Pramudya', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Menteri', 'foto' => 'Foto_Kominfo_Gilang.png'],
            ['nama' => 'Alfi Fauziyyah Larasati', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Kominfo_Alfi.png'],
            ['nama' => 'Muhammad Naufal Dzakizaidaa', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Deputi', 'foto' => 'Foto_Kominfo_Muhammad.png'],
            ['nama' => 'Shahirul Yasykur Najib', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Deputi', 'foto' => 'Foto_Kominfo_Shahirul.png'],
            ['nama' => 'Zulfi Riyadi', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Deputi', 'foto' => 'Foto_Kominfo_Zulfi.png'],
            ['nama' => 'Mahendra Adiyatma Firmansyah', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Deputi', 'foto' => 'Foto_Kominfo_Mahendra.png'],
            ['nama' => 'Rahma Dian Arsanti', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Deputi', 'foto' => 'Foto_Kominfo_Rahma.png'],
            ['nama' => 'Adinda Faradila Jarwanto', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Deputi', 'foto' => 'Foto_Kominfo_Adinda.png'],
            ['nama' => 'Zanetha Ardelia Widyafinanta', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Deputi', 'foto' => 'Foto_Kominfo_Zanetha.png'],
            ['nama' => 'Halima Hadi Alfina', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Kominfo_Halima.png'],
            ['nama' => 'Eiren Wibi Hidayat', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Kominfo_Eiren.png'],
            ['nama' => 'Cinta Secondania Patrasty', 'kementerian' => 'Kementerian Komunikasi dan Informasi', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Kominfo_Cinta.png'],

            // Kementerian Dalam Negeri
            ['nama' => 'Satrio Aji Wibowo', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Menteri', 'foto' => 'Foto_Dagri_Satrio.png'],
            ['nama' => 'Alya Bintang Maharani', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Dagri_Alya.png'],
            ['nama' => 'Muhammad Fatwa Syaikhoni', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_Dagri_MuhammadFatwa.png'],
            ['nama' => 'Siskha Syaharani', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_Dagri_Siskha.png'],
            ['nama' => 'Rinten Amorita Azzah', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_Dagri_Rinten.png'],
            ['nama' => 'Muhamad Za\'im Setyawan', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_Dagri_MuhamadZaim.png'],
            ['nama' => 'Farah Khalisa Putri', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_Dagri_Farah.png'],
            ['nama' => 'Arie Ika Saputra', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_Dagri_Arie.png'],
            ['nama' => 'Raeshard Rakeen Shaquilla Nabiel', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_Dagri_Raeshard.png'],
            ['nama' => 'Grace Gabriella Purba', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_Dagri_Grace.png'],
            ['nama' => 'Queen Isabel Bahtiar', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Dagri_Queen.png'],
            ['nama' => 'Haffiyan Ajriya Faza Akbar Afandi', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Dagri_Haffiyan.png'],
            ['nama' => 'Hutama Wira Yudha', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Dagri_Hutama.png'],
            ['nama' => 'Marissa Athia Shabrina', 'kementerian' => 'Kementerian Dalam Negeri', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Dagri_Marissa.png'],

            // Kementerian Pengembangan Sumber Daya Mahasiswa
            ['nama' => 'Muhammad Fauzan. A', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Menteri', 'foto' => 'Foto_PSDM_MuhammadFauzan.png'],
            ['nama' => 'Angesti Naia Dewi Suciyani', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_PSDM_Angesti.png'],
            ['nama' => 'Archibald Amanullah Aryapati', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_PSDM_Archibald.png'],
            ['nama' => 'Rahmalia Anugrah Jovinanda', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_PSDM_Rahmalia.png'],
            ['nama' => "Tahta Nida'il", 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_PSDM_Tahta.png'],
            ['nama' => 'Denyssa Soraya', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_PSDM_Denyssa.png'],
            ['nama' => 'El Zafran Mohammad Syah', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_PSDM_El.png'],
            ['nama' => 'Adiyatma', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_PSDM_Adiyatma.png'],
            ['nama' => 'Kencana ikhsanun Nadja', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_PSDM_Kencana.png'],
            ['nama' => 'Bianca Shafa S', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_PSDM_Bianca.png'],
            ['nama' => 'Kinanthi Cahyaning Jati', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_PSDM_Kinanthi.png'],
            ['nama' => 'Nayla Ramadhani', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_PSDM_Nayla.png'],
            ['nama' => 'Hani Chalimatus Sadiyah', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_PSDM_Hani.png'],
            ['nama' => 'Mezzaluna Ardya Pramesti', 'kementerian' => 'Kementerian Pengembangan Sumber Daya Mahasiswa', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_PSDM_Mezzaluna.png'],

            // Kementerian Agama
            ['nama' => 'Fadhilla Maulana Putra Pratama', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Menteri', 'foto' => 'Foto_Agama_Fadhilla.png'],
            ['nama' => 'Muafaturrohmah Devy Maulidha', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Agama_Muafaturrohmah.png'],
            ['nama' => 'Salwa Salsabila Daffa\'atulhaq', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Deputi', 'foto' => 'Foto_Agama_Salwa.png'],
            ['nama' => 'Amanda Oktofiani', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Deputi', 'foto' => 'Foto_Agama_Amanda.png'],
            ['nama' => 'Rizqi Robbani Auliya Darussalam', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Deputi', 'foto' => 'Foto_Agama_Rizqi.png'],
            ['nama' => 'Aditya Rian Putra Pratama', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Deputi', 'foto' => 'Foto_Agama_Aditya.png'],
            ['nama' => 'Cahya Putra Rusdianto', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Deputi', 'foto' => 'Foto_Agama_Cahya.png'],
            ['nama' => 'Krisna Suryaningsih', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Deputi', 'foto' => 'Foto_Agama_Krisna.png'],
            ['nama' => 'Jonathan Edward Sinaga', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Deputi', 'foto' => 'Foto_Agama_Jonathan.png'],
            ['nama' => 'Sulaiman Abdurrozaq', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Deputi', 'foto' => 'Foto_Agama_Sulaiman.png'],
            ['nama' => 'Eu Kharistia Banurea', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Agama_Eu.png'],
            ['nama' => 'Nabila Rizky Rahmadani', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Agama_Nabila.png'],
            ['nama' => 'Aniq Faiqoh', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Agama_Aniq.png'],
            ['nama' => 'Syafa Radithya Maharani', 'kementerian' => 'Kementerian Agama', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Agama_Syafa.png'],

            // Kementerian Advokasi dan Kesejahteraan Mahasiswa
            ['nama' => 'Tohar Fatchur Rozaq', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Menteri', 'foto' => 'Foto_Advokesma_Tohar.png'],
            ['nama' => 'Faiz Risam Ramadhan', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Advokesma_Faiz.png'],
            ['nama' => 'Melinda Tri Utami', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_Advokesma_Melinda.png'],
            ['nama' => 'Tifaniya Alamanda', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_Advokesma_Tifaniya.png'],
            ['nama' => 'Dewi Fitriana Rahmadhani', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_Advokesma_Dewi.png'],
            ['nama' => 'Widya Baby Valentina', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_Advokesma_Widya.png'],
            ['nama' => 'Atfhala Dhamara', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_Advokesma_Atfhala.png'],
            ['nama' => 'Hafiidh Ahmad Imam Saputra', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_Advokesma_Hafiidh.png'],
            ['nama' => 'Tiara Nur Fadilah', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_Advokesma_Tiara.png'],
            ['nama' => 'Nasywa arfi auliyana zahra', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Deputi', 'foto' => 'Foto_Advokesma_Nasywa.png'],
            ['nama' => 'Salman Nuril Anwar', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Advokesma_Salman.png'],
            ['nama' => 'Rhesa Dwi Arif Werdiansyah', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Advokesma_Rhesa.png'],
            ['nama' => 'Katarina Isabel Taniasari', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Advokesma_Katarina.png'],
            ['nama' => 'Juliana Tiara Putri', 'kementerian' => 'Kementerian Advokasi dan Kesejahteraan Mahasiswa', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Advokesma_Juliana.png'],

            // Kementerian Minat dan Bakat
            ['nama' => 'Muhammad Ferdian Nugroho', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Menteri', 'foto' => 'Foto_Minbak_MuhammadFerdian.png'],
            ['nama' => 'Imelia Putri Ayu Agatha', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Minbak_Imelia.png'],
            ['nama' => 'Dimas Raditya Ananda Nimpoeno', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Minbak_Dimas.png'],
            ['nama' => 'Berliansyah Fellano', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Minbak_Berliansyah.png'],
            ['nama' => 'Nava Angelica Neicylla', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Minbak_Nava.png'],
            ['nama' => 'Talitha Fara Azzahra', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Minbak_Talitha.png'],
            ['nama' => 'Farah Nawalisa', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Minbak_Farah.png'],
            ['nama' => 'Aisyah Dwi Fitriyani', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Minbak_Aisyah.png'],
            ['nama' => 'Flavia Adira Anjani', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Minbak_Flavia.png'],
            ['nama' => 'Almaas Mim Ka\'ab', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Minbak_Almaas.png'],
            ['nama' => 'Rakha Danar Ramiro', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Minbak_Rakha.png'],
            ['nama' => 'Muhammad Akmal Ibnu Rusta', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Minbak_MuhammadAkmal.png'],
            ['nama' => 'Arina Azkia', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Minbak_Arina.png'],
            ['nama' => 'Nia Selvia mahdalena', 'kementerian' => 'Kementerian Minat dan Bakat', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Minbak_Nia.png'],

            // Kementerian Riset dan Keilmuan
            ['nama' => 'Akmal Eka Fakhrudin', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Menteri', 'foto' => 'Foto_Riskel_Akmal.png'],
            ['nama' => 'Zirilda Syafira Salfa Zahidah', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Riskel_Zirilda.png'],
            ['nama' => 'Anisa Farcha Noviani', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Anisa.png'],
            ['nama' => 'Putik Syaibatun Nafia', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Putik.png'],
            ['nama' => 'Moh Syamsa Rojikul Ibat', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Moh.png'],
            ['nama' => 'Melinda Yulandika Putri', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Melinda.png'],
            ['nama' => 'Ragil Setiawan', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Ragil.png'],
            ['nama' => 'Kukuh Widodo Jat', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Kukuh.png'],
            ['nama' => 'Kevin Pramuduta Boni', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Kevin.png'],
            ['nama' => 'Wafia Aquila Zulfa', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Wafia.png'],
            ['nama' => 'Rashif Rosyad Anugrah Wicaksono', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Deputi', 'foto' => 'Foto_Riskel_Rashif.png'],
            ['nama' => 'Lina Asmarani', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Riskel_Lina.png'],
            ['nama' => 'Muhammad Fais Said Attaulah', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Riskel_MuhammadFais.png'],
            ['nama' => 'Ika Nuraini', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Riskel_Ika.png'],
            ['nama' => 'Salsa Febrilia Tiasmita', 'kementerian' => 'Kementerian Riset dan Keilmuan', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Riskel_Salsa.png'],

            // Kementerian Ekonomi Kreatif
            ['nama' => 'Naufal Shidqi Darmawan', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Menteri', 'foto' => 'Foto_Ekraf_Naufal.png'],
            ['nama' => 'Nansia Salindri Ayu Astiti', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Ekraf_Nansia.png'],
            ['nama' => 'Nisrina Firdausy Azzahra', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Deputi', 'foto' => 'Foto_Ekraf_Nisrina.png'],
            ['nama' => 'Faradila Putri Nurmalasar', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Deputi', 'foto' => 'Foto_Ekraf_Faradila.png'],
            ['nama' => 'Marshanda Dhifa Khalisha', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Deputi', 'foto' => 'Foto_Ekraf_Marshanda.png'],
            ['nama' => 'Rachmadhani Aji Kurniawan', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Deputi', 'foto' => 'Foto_Ekraf_Rachmadhani.png'],
            ['nama' => 'Putri Maldini', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Deputi', 'foto' => 'Foto_Ekraf_Putri.png'],
            ['nama' => 'Alfariska Adelia Nahridhotun Nahla', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Deputi', 'foto' => 'Foto_Ekraf_Alfariska.png'],
            ['nama' => 'Defa Tri Aolia', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Deputi', 'foto' => 'Foto_Ekraf_Defa.png'],
            ['nama' => 'Lea Kharisma Wesley', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Deputi', 'foto' => 'Foto_Ekraf_Lea.png'],
            ['nama' => 'Rajwa Nailati Rosadi', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Ekraf_Rajwa.png'],
            ['nama' => 'Mazayasyifa Waddaytza Kania', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Ekraf_Mazayasyifa.png'],
            ['nama' => 'Cicha Olivia Nauri', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Ekraf_Cicha.png'],
            ['nama' => 'Faisal Rahman Alfarisi', 'kementerian' => 'Kementerian Ekonomi Kreatif', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Ekraf_Faisal.png'],

            // Kementerian Sosial Masyarakat
            ['nama' => 'Novansyah Eka Ramadani', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Menteri', 'foto' => 'Foto_Sosmas_Novansyah.png'],
            ['nama' => 'Nanda Oktavia Ramadhani', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Sosmas_Nanda.png'],
            ['nama' => 'Radendriza wibawa', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Radendriza.png'],
            ['nama' => 'Dea Aulia Zahra', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Dea.png'],
            ['nama' => 'Ikhza Iflakhul Haqi', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Ikhza.png'],
            ['nama' => 'Yusuf As\'adi Wibowo', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Yusuf.png'],
            ['nama' => 'Devi Nurmawati Setiani', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Devi.png'],
            ['nama' => 'Antoniete Anyas Masenki Fabain', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Antoniete.png'],
            ['nama' => 'Muhammad Jizdan Mumtaz', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Muhammad.png'],
            ['nama' => 'Luthfia Naurah Pendra', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Luthfia.png'],
            ['nama' => 'Indri Mailani', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Indri.png'],
            ['nama' => 'Dita Puspitasari', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sosmas_Dita.png'],
            ['nama' => 'Anandita Chairunnisa', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Sosmas_Anandita.png'],
            ['nama' => 'Adil Sherly Melodi', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Sosmas_Adil.png'],
            ['nama' => 'M. Haris Zufar', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Sosmas_M.Haris.png'],
            ['nama' => 'Galang Harly Ramadhan', 'kementerian' => 'Kementerian Sosial Masyarakat', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Sosmas_Galang.png'],

            // Kementerian Lingkungan Hidup
            ['nama' => 'Arya Yuda Fahrizal Yustiarsa', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Menteri', 'foto' => 'Foto_LH_Arya.png'],
            ['nama' => 'Nafala Ighfirani', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_LH_Nafala.png'],
            ['nama' => 'Tinka Rahma Tasbihta', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Tinka.png'],
            ['nama' => 'Farid Adib Pratama', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Farid.png'],
            ['nama' => 'Rini Rohyati', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Rini.png'],
            ['nama' => 'Tata Febri Alicia', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Tata.png'],
            ['nama' => 'Gufron Al Safi\'i', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Gufron.png'],
            ['nama' => 'Meutia Jaladewi Filaili Qodari', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Meutia.png'],
            ['nama' => 'Muhammad Farrel Zaki F', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_MuhammadFarrel.png'],
            ['nama' => 'Febrian Rizky Fauzy', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Febrian.png'],
            ['nama' => 'Malven Falih Nurhaidar', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Malven.png'],
            ['nama' => 'Herlina Febriyanti', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Deputi', 'foto' => 'Foto_LH_Herlina.png'],
            ['nama' => 'Revyco Farrel Julionzo', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_LH_Revyco.png'],
            ['nama' => 'Muhammad Septiano', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_LH_MuhammadSeptiano.png'],
            ['nama' => 'Sheva Maida Vasthi', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_LH_Sheva.png'],
            ['nama' => 'Happy Cantika Putri', 'kementerian' => 'Kementerian Lingkungan Hidup', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_LH_Happy.png'],

            // Kementerian Luar Negeri
            ['nama' => 'Faizah Nabila Fatimah', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Menteri', 'foto' => 'Foto_LN_Faizah.png'],
            ['nama' => 'Meisya Ayulistya Rahmadani', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_LN_Meisya.png'],
            ['nama' => 'Jonathan Bayu Kristiawan Nadeak', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_LN_Jonathan.png'],
            ['nama' => 'Dhevina Chintya Aldianova', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_LN_Dhevina.png'],
            ['nama' => 'Wika Dwi Aprilia', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_LN_Wika.png'],
            ['nama' => 'Aprila Inggita Dewi', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_LN_Aprila.png'],
            ['nama' => 'Dyah Ajeng Palupi', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_LN_Dyah.png'],
            ['nama' => 'Ananda Karazkani', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_LN_Ananda.png'],
            ['nama' => 'Rakha Indra Kumara', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Deputi', 'foto' => 'Foto_LN_Rakha.png'],
            ['nama' => 'Fitria Ramadhani', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_LN_Fitria.png'],
            ['nama' => 'Michelle Aderia Dewanto', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_LN_Michelle.png'],
            ['nama' => 'Muhammad Farid Annazar', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_LN_MuhammadFarid.png'],
            ['nama' => 'Nathania Nasyilla Aristyani', 'kementerian' => 'Kementerian Luar Negeri', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_LN_Nathania.png'],

            // Kementerian Sosial Politik
            ['nama' => 'Athaya Pandu Mareno', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Menteri', 'foto' => 'Foto_Sospol_Athaya.png'],
            ['nama' => 'Muhammad Raihan Bintang Ramadhan', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Wakil Menteri', 'foto' => 'Foto_Sospol_MuhammadRaihan.png'],
            ['nama' => 'Atha Nadiah Arsanti', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sospol_Atha.png'],
            ['nama' => 'Rohimatun Nurin Nadhifah', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sospol_Rohimatun.png'],
            ['nama' => 'Adila Dimaz', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sospol_Adila.png'],
            ['nama' => 'Patria Maheswara Rifqiano', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sospol_Patria.png'],
            ['nama' => 'Ovi Permata Wulandari', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sospol_Ovi.png'],
            ['nama' => 'Malida Naufalina Sinta Dewi', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sospol_Malida.png'],
            ['nama' => 'Purwoko Samirudin', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sospol_Purwoko.png'],
            ['nama' => 'Muhammad Ibrahim', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Deputi', 'foto' => 'Foto_Sospol_MuhammadIbrahim.png'],
            ['nama' => 'Tama Jering Eno Travis', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Sospol_Tama.png'],
            ['nama' => 'Muhammad Farell Aditya Hermawan', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Sospol_MuhammadFarell.png'],
            ['nama' => 'Aisyah Adinda Tsabita', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Sospol_Aisyah.png'],
            ['nama' => 'Muhammad Bintang Satrio Utomo', 'kementerian' => 'Kementerian Sosial Politik', 'jabatan' => 'Staff Muda', 'foto' => 'Foto_Sospol_MuhammadBintang.png'],

        ];

        foreach ($fungsionarisData as $data) {
            $jabatanId = $jabatans[trim($data['jabatan'])]->id ?? null;
            $kementerianNameForLookup = $data['kementerian'] ? str_replace('Kementerian ', '', trim($data['kementerian'])) : null;
            $kementerianId = $kementerianNameForLookup ? ($kementerians[$kementerianNameForLookup]->id ?? null) : null;

            Fungsionaris::create([
                'nama_fungsionaris' => trim($data['nama']),
                'photo_path' => trim($data['foto']),
                'jabatan_id' => $jabatanId,
                'kementerian_id' => $kementerianId,
            ]);
        }
    }
}