<?php

namespace App\Http\Controllers;

use App\Models\Kementerian;
use App\Models\Fungsionaris;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KementerianController extends Controller
{
    public function show($slug)
    {
        // Convert slug back to the full ministry name for database lookup
        $ministryName = str_replace('-', ' ', $slug);

        // Map short names/acronyms to full names if necessary
        $ministryNameMapping = [
            'kesekretariatan' => 'Kesekretariatan',
            'keuangan' => 'Keuangan',
            'komunikasi-dan-informasi' => 'Komunikasi dan Informasi',
            'dalam-negeri' => 'Dalam Negeri',
            'psdm' => 'Pengembangan Sumber Daya Mahasiswa',
            'agama' => 'Agama',
            'advokasi-dan-kesejahteraan-mahasiswa' => 'Advokasi dan Kesejahteraan Mahasiswa',
            'minat-dan-bakat' => 'Minat dan Bakat',
            'riset-dan-keilmuan' => 'Riset dan Keilmuan',
            'ekonomi-kreatif' => 'Ekonomi Kreatif',
            'sosial-masyarakat' => 'Sosial Masyarakat',
            'lingkungan-hidup' => 'Lingkungan Hidup',
            'sosial-politik' => 'Sosial Politik',
            'luar-negeri' => 'Luar Negeri',
        ];

        // Try to get the full ministry name from the mapping, default to slug-converted name
        // The keys in ministryNameMapping should match the slugs, not the raw converted ministryName
        $fullMinistryName = $ministryNameMapping[$slug] ?? ucwords(str_replace('-', ' ', $slug));

        $kementerian = Kementerian::with(['prokers', 'agendas'])->where('nama_kementerian', $fullMinistryName)->first();

        if (!$kementerian) {
            abort(404); // Ministry not found
        }
        
        // Get Fungsionaris for this kementerian
        $members = Fungsionaris::where('kementerian_id', $kementerian->id)
                                ->with('jabatan') // Eager load jabatan relationship
                                ->get();
        
        // Determine the Minister
        $minister = $members->where('jabatan.nama_jabatan', 'Menteri')->first();

        // Mock data for programs (as it's not in the CSV)
        $programs = $this->getProgramsByMinistrySlug($slug);

        // Ministry descriptions (adapted from the provided TSX)
        $description = $this->getMinistryDescription($slug);
        
        return view('pages.kementerian_detail', compact('kementerian', 'members', 'minister', 'programs', 'description', 'slug'));
    }

    private function getProgramsByMinistrySlug(string $slug): array
    {
        $programs = [
            'kesekretariatan' => [
                ['name' => 'Rapat Koordinasi Bulanan', 'date' => 'Setiap Bulan', 'description' => 'Koordinasi internal kabinet'],
                ['name' => 'Arsip Digital', 'date' => 'Semester 1', 'description' => 'Digitalisasi arsip organisasi'],
            ],
            'keuangan' => [
                ['name' => 'Audit Keuangan', 'date' => 'Akhir Semester', 'description' => 'Audit transparansi keuangan'],
                ['name' => 'Workshop Anggaran', 'date' => 'Maret 2025', 'description' => 'Pelatihan pengelolaan anggaran'],
            ],
            'komunikasi-dan-informasi' => [
                ['name' => 'Media Campaign', 'date' => 'Sepanjang Tahun', 'description' => 'Kampanye media sosial'],
                ['name' => 'Website Resmi', 'date' => 'Februari 2025', 'description' => 'Peluncuran website BEM'],
            ],
            'dalam-negeri' => [
                ['name' => 'Mubes', 'date' => 'April 2025', 'description' => 'Musyawarah Besar Mahasiswa'],
                ['name' => 'Pemilu Raya', 'date' => 'Mei 2025', 'description' => 'Pemilihan umum mahasiswa'],
            ],
            'psdm' => [ // Using 'psdm' as slug for 'Pengembangan Sumber Daya Mahasiswa'
                ['name' => 'Upgrading Fungsionaris', 'date' => 'Maret 2025', 'description' => 'Pelatihan pengembangan diri'],
                ['name' => 'Leadership Camp', 'date' => 'April 2025', 'description' => 'Kemah kepemimpinan'],
            ],
            'agama' => [
                ['name' => 'Kajian Rutin', 'date' => 'Setiap Jumat', 'description' => 'Kajian keagamaan rutin'],
                ['name' => 'Safari Ramadhan', 'date' => 'Ramadhan', 'description' => 'Kegiatan ramadhan bersama'],
            ],
            'advokasi-dan-kesejahteraan-mahasiswa' => [
                ['name' => 'Posko Aspirasi', 'date' => 'Sepanjang Tahun', 'description' => 'Penerimaan aspirasi mahasiswa'],
                ['name' => 'Hearing DPRD', 'date' => 'Semester 1', 'description' => 'Audiensi dengan DPRD'],
            ],
            'minat-dan-bakat' => [
                ['name' => 'POLINES Got Talent', 'date' => 'April 2025', 'description' => 'Kompetisi bakat mahasiswa'],
                ['name' => 'Festival Seni', 'date' => 'Mei 2025', 'description' => 'Festival kesenian kampus'],
            ],
            'riset-dan-keilmuan' => [
                ['name' => 'Kompetisi Karya Ilmiah', 'date' => 'Maret 2025', 'description' => 'Lomba karya tulis ilmiah'],
                ['name' => 'Seminar Nasional', 'date' => 'April 2025', 'description' => 'Seminar riset dan inovasi'],
            ],
            'ekonomi-kreatif' => [
                ['name' => 'Bazar UMKM', 'date' => 'Setiap Bulan', 'description' => 'Bazar produk mahasiswa'],
                ['name' => 'Pelatihan Kewirausahaan', 'date' => 'Maret 2025', 'description' => 'Workshop bisnis'],
            ],
            'sosial-masyarakat' => [
                ['name' => 'Bakti Sosial', 'date' => 'Maret 2025', 'description' => 'Kegiatan sosial masyarakat'],
                ['name' => 'Donor Darah', 'date' => 'Setiap 3 Bulan', 'description' => 'Aksi donor darah rutin'],
            ],
            'lingkungan-hidup' => [
                ['name' => 'Green Campus', 'date' => 'Sepanjang Tahun', 'description' => 'Program kampus hijau'],
                ['name' => 'Penanaman Pohon', 'date' => 'April 2025', 'description' => 'Aksi tanam 1000 pohon'],
            ],
            'sosial-politik' => [
                ['name' => 'Diskusi Politik', 'date' => 'Setiap Bulan', 'description' => 'Forum diskusi isu politik'],
                ['name' => 'Sosialisasi Pemilu', 'date' => 'Februari 2025', 'description' => 'Edukasi pemilu mahasiswa'],
            ],
            'luar-negeri' => [
                ['name' => 'Student Exchange', 'date' => 'Semester 2', 'description' => 'Program pertukaran pelajar'],
                ['name' => 'Kerjasama Internasional', 'date' => 'Sepanjang Tahun', 'description' => 'Jalin kerjasama luar negeri'],
            ],
        ];
        
        return $programs[$slug] ?? [
            ['name' => 'Program Kerja 1', 'date' => '2025', 'description' => 'Deskripsi program kerja'],
            ['name' => 'Program Kerja 2', 'date' => '2025', 'description' => 'Deskripsi program kerja'],
        ];
    }

    private function getMinistryDescription(string $slug): string
    {
        $descriptions = [
            'kesekretariatan' => "Kesekretariatan Kabinet (KSK) bertanggung jawab atas administrasi, dokumentasi, dan kesekretariatan seluruh kegiatan BEM KBM. KSK memastikan kelancaran koordinasi internal dan pengelolaan arsip organisasi.",
            'keuangan' => "Kementerian Keuangan mengelola seluruh aspek keuangan organisasi, termasuk penganggaran, pelaporan, dan transparansi keuangan BEM KBM Politeknik Negeri Semarang.",
            'komunikasi-dan-informasi' => "Kementerian Komunikasi dan Informasi berperan sebagai jembatan informasi antara BEM KBM dengan seluruh sivitas akademika melalui berbagai platform media dan publikasi.",
            'dalam-negeri' => "Kementerian Dalam Negeri mengkoordinasikan hubungan internal antar organisasi kemahasiswaan dan bertanggung jawab atas pelaksanaan pemilihan umum mahasiswa.",
            'psdm' => "Kementerian Pengembangan SDM fokus pada peningkatan kualitas dan kapasitas fungsionaris melalui berbagai program pelatihan dan pengembangan diri.",
            'agama' => "Kementerian Agama membina kehidupan beragama mahasiswa dan menyelenggarakan kegiatan keagamaan yang memperkuat nilai-nilai spiritual.",
            'advokasi-dan-kesejahteraan-mahasiswa' => "Kementerian Advokasi menjadi wadah aspirasi mahasiswa dan memperjuangkan hak-hak mahasiswa melalui berbagai aksi advokasi dan dialog konstruktif.",
            'minat-dan-bakat' => "Kementerian Minat dan Bakat mengembangkan potensi non-akademik mahasiswa melalui berbagai kegiatan seni, budaya, dan olahraga.",
            'riset-dan-keilmuan' => "Kementerian Riset dan Keilmuan mendorong budaya riset dan pengembangan ilmu pengetahuan di kalangan mahasiswa Politeknik Negeri Semarang.",
            'ekonomi-kreatif' => "Kementerian Ekonomi Kreatif memfasilitasi pengembangan jiwa kewirausahaan dan ekonomi kreatif mahasiswa.",
            'sosial-masyarakat' => "Kementerian Sosial Masyarakat menggerakkan kepedulian sosial mahasiswa melalui berbagai program pengabdian kepada masyarakat.",
            'lingkungan-hidup' => "Kementerian Lingkungan Hidup berkomitmen pada pelestarian lingkungan dan pembangunan berkelanjutan di lingkungan kampus dan sekitarnya.",
            'sosial-politik' => "Kementerian Sosial Politik menumbuhkan kesadaran politik mahasiswa dan mengkaji berbagai isu sosial politik yang relevan.",
            'luar-negeri' => "Kementerian Luar Negeri membangun kerjasama dan jejaring dengan organisasi mahasiswa dari berbagai institusi, baik nasional maupun internasional.",
        ];
        
        return $descriptions[$slug] ?? "Kementerian ini berperan penting dalam struktur BEM KBM Politeknik Negeri Semarang.";
    }
}