<?php

use Illuminate\Support\Facades\Route;
use App\Models\Fungsionaris;
use App\Models\Jabatan;
use App\Models\Berita;
use App\Models\Kementerian;
use App\Models\Proker;
use App\Http\Controllers\KementerianController;
use Illuminate\Support\Str;

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

    // Fetch latest 3 news items
    $newsItems = Berita::orderBy('date', 'desc')->take(3)->get();

    return view('pages.beranda', compact('presiden', 'topOfficials', 'upcomingProkers', 'allProkers', 'newsItems'));
});

// Route baru untuk halaman Profil
Route::get('/profile', function () {
    // Fetch Leadership Team
    $leaders = Fungsionaris::whereHas('jabatan', function ($query) {
        $query->whereIn('nama_jabatan', [
            'Presiden Mahasiswa',
            'Wakil Presiden Mahasiswa',
            'Sekretaris Kabinet',
            'Menteri Koordinator Internal',
            'Menteri Koordinator Kemahasiswaan',
            'Menteri Koordinator Kemasyarakatan',
            'Menteri Koordinator Relasi dan Pergerakan'
        ]);
    })->with('jabatan')->get()->keyBy(function($item) {
        return Str::slug($item->jabatan->nama_jabatan);
    });

    // New data for info cards
    $totalFungsionaris = Fungsionaris::count();
    $totalKementerian = Kementerian::count();
    $totalProker = Proker::count();
    $periode = "2025/2026";

    return view('pages.profile', compact('leaders', 'totalFungsionaris', 'totalKementerian', 'totalProker', 'periode'));
});

// Route for Kementerian Detail Page
Route::get('/kementerian/{slug}', [KementerianController::class, 'show'])->name('kementerian.show');

// Route for Proker Detail Page
use App\Http\Controllers\ProkerController;
Route::get('/proker/{slug}', [ProkerController::class, 'show'])->name('proker.show');

use App\Http\Controllers\AdminController;

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Dashboard Routes (Protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/news/create', [AdminController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [AdminController::class, 'store'])->name('admin.news.store');
    Route::get('/news/{berita}/edit', [AdminController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/{berita}', [AdminController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{berita}', [AdminController::class, 'destroy'])->name('admin.news.destroy');
});

// Route for News Detail Page
Route::get('/berita/{slug}', function ($slug) {
    $berita = Berita::where('slug', $slug)->firstOrFail();
    return view('pages.berita_detail', compact('berita'));
})->name('berita.show');