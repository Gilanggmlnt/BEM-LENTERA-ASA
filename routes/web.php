<?php

use Illuminate\Support\Facades\Route;
use App\Models\Fungsionaris;
use App\Models\Jabatan;
use App\Models\Kementerian;
use App\Models\Proker;
use App\Http\Controllers\KementerianController;
use Illuminate\Support\Str; // Import Str facade

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk halaman Beranda
Route::get('/', function () {
    // Fetch Presiden Mahasiswa
    $presiden = Fungsionaris::whereHas('jabatan', function ($query) {
        $query->where('nama_jabatan', 'Presiden Mahasiswa');
    })->with('jabatan')->first();

    // Fetch Wakil Presiden Mahasiswa
    $wakilPresiden = Fungsionaris::whereHas('jabatan', function ($query) {
        $query->where('nama_jabatan', 'Wakil Presiden Mahasiswa');
    })->with('jabatan')->first();

    // Fetch Sekretaris Kabinet
    $sekretarisKabinet = Fungsionaris::whereHas('jabatan', function ($query) {
        $query->where('nama_jabatan', 'Sekretaris Kabinet');
    })->with('jabatan')->first();

    // Fetch Menteri Koordinator
    $menko = Fungsionaris::whereHas('jabatan', function ($query) {
        $query->whereIn('nama_jabatan', [
            'Menteri Koordinator Internal',
            'Menteri Koordinator Kemahasiswaan',
            'Menteri Koordinator Kemasyarakatan',
            'Menteri Koordinator Relasi dan Pergerakan'
        ]);
    })->with('jabatan')->get();

    // Combine top officials into a collection and key by slugged job title
    $topOfficials = collect([
        $presiden,
        $wakilPresiden,
        $sekretarisKabinet
    ])->filter()->merge($menko)->keyBy(function ($item) {
        return Str::slug($item->jabatan->nama_jabatan); // Use slug as key for easy access
    });

    // Fetch 3 closest upcoming Prokers
    $upcomingProkers = Proker::where('tanggal_pelaksanaan', '>=', now())
        ->orderBy('tanggal_pelaksanaan', 'asc')
        ->take(3)
        ->with('kementerian')
        ->get();

    // Fetch all prokers for calendar
    $allProkers = Proker::with('kementerian')->get();

    return view('pages.beranda', compact('presiden', 'topOfficials', 'upcomingProkers', 'allProkers'));
});

// Route baru untuk halaman Profil (keeping existing functionality for now, might be unused or for a different profile)
Route::get('/profile', function () {
    // Cari jabatan 'Presiden Mahasiswa' (jika diperlukan di halaman profil)
    $jabatanPresma = Jabatan::where('nama_jabatan', 'Presiden Mahasiswa')->first();
    
    $presma = null;
    if ($jabatanPresma) {
        $presma = Fungsionaris::where('id_jabatan', $jabatanPresma->id)->first();
    }

    // New data for info cards
    $totalFungsionaris = Fungsionaris::count();
    $totalKementerian = Kementerian::count();
    $totalProker = Proker::count(); // Assuming Proker model exists
    $periode = "2025/2026";

    // Mengembalikan view 'pages.profile' dengan data $presma
    return view('pages.profile', compact('presma', 'totalFungsionaris', 'totalKementerian', 'totalProker', 'periode'));
});

// Route for Kementerian Detail Page
Route::get('/kementerian/{slug}', [KementerianController::class, 'show'])->name('kementerian.show');

// Route for Proker Detail Page
use App\Http\Controllers\ProkerController;
Route::get('/proker/{slug}', [ProkerController::class, 'show'])->name('proker.show');