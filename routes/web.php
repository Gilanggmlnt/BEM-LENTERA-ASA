<?php

use Illuminate\Support\Facades\Route;
use App\Models\Fungsionaris;
use App\Models\Jabatan;
use App\Models\Berita;
use App\Models\Kementerian;
use App\Models\Proker;
use App\Models\Agenda;
use App\Http\Controllers\KementerianController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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
})->name('beranda');

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
    $totalFungsionaris = Fungsionaris::whereHas('jabatan', function ($query) {
        $query->where('nama_jabatan', '!=', 'Staff Muda');
    })->count();
    $totalStaffMuda = Fungsionaris::whereHas('jabatan', function ($query) {
        $query->where('nama_jabatan', 'Staff Muda');
    })->count();
    $totalKementerian = Kementerian::count();
    $totalProker = Proker::count();
    $totalAgenda = Agenda::count();

    return view('pages.profile', compact('leaders', 'totalFungsionaris', 'totalStaffMuda', 'totalKementerian', 'totalProker', 'totalAgenda'));
})->name('profile');

// Route for Kementerian Index
Route::get('/kementerian', function () {
    $kementerians = Kementerian::with('jabatan')->get();
    return view('pages.kementerian', compact('kementerians'));
})->name('kementerian');

// Route for Agenda Page
Route::get('/agenda', function () {
    $agendas = Agenda::orderBy('tanggal', 'desc')->get();
    return view('pages.agenda', compact('agendas'));
})->name('agenda');

// Route for News Index Page
Route::get('/berita', function () {
    $newsItems = Berita::orderBy('date', 'desc')->paginate(9);
    return view('pages.berita_index', compact('newsItems'));
})->name('berita.index');

// Route for News Detail Page
Route::get('/berita/{slug}', function ($slug) {
    $berita = Berita::where('slug', $slug)->firstOrFail();
    
    // Fetch 3 other news items for preview (excluding current)
    $otherNews = Berita::where('slug', '!=', $slug)
        ->orderBy('date', 'desc')
        ->take(3)
        ->get();
        
    return view('pages.berita_detail', compact('berita', 'otherNews'));
})->name('berita.show');

// Route for Kementerian Detail Page
Route::get('/kementerian/{slug}', [KementerianController::class, 'show'])->name('kementerian.show');

// Route for Proker Detail Page
Route::get('/proker/{slug}', [ProkerController::class, 'show'])->name('proker.show');

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

use App\Http\Controllers\AspirasiController;

// ... (other imports)

// Route untuk pengiriman Aspirasi (Public)
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');

// Admin Dashboard Routes (Protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Berita Management
    Route::get('/news', [AdminController::class, 'newsIndex'])->name('news.index');
    Route::get('/news/create', [AdminController::class, 'newsCreate'])->name('news.create');
    Route::post('/news', [AdminController::class, 'newsStore'])->name('news.store');
    Route::get('/news/{berita}/edit', [AdminController::class, 'newsEdit'])->name('news.edit');
    // Using put/patch for update is standard, but looking at controller it's usually just a post or match
    Route::put('/news/{berita}', [AdminController::class, 'newsUpdate'])->name('news.update');
    Route::delete('/news/{berita}', [AdminController::class, 'newsDestroy'])->name('news.destroy');

    // Fungsionaris Management
    Route::get('/fungsionaris', [AdminController::class, 'fungsionarisIndex'])->name('fungsionaris.index');
    Route::get('/fungsionaris/create', [AdminController::class, 'fungsionarisCreate'])->name('fungsionaris.create');
    Route::post('/fungsionaris', [AdminController::class, 'fungsionarisStore'])->name('fungsionaris.store');
    Route::get('/fungsionaris/{fungsionaris}/edit', [AdminController::class, 'fungsionarisEdit'])->name('fungsionaris.edit');
    Route::put('/fungsionaris/{fungsionaris}', [AdminController::class, 'fungsionarisUpdate'])->name('fungsionaris.update');
    Route::delete('/fungsionaris/{fungsionaris}', [AdminController::class, 'fungsionarisDestroy'])->name('fungsionaris.destroy');

    // Proker Management
    Route::get('/proker', [AdminController::class, 'prokerIndex'])->name('proker.index');
    Route::get('/proker/create', [AdminController::class, 'prokerCreate'])->name('proker.create');
    Route::post('/proker', [AdminController::class, 'prokerStore'])->name('proker.store');
    Route::get('/proker/{proker}/edit', [AdminController::class, 'prokerEdit'])->name('proker.edit');
    Route::put('/proker/{proker}', [AdminController::class, 'prokerUpdate'])->name('proker.update');
    Route::delete('/proker/{proker}', [AdminController::class, 'prokerDestroy'])->name('proker.destroy');

    // Agenda Management
    Route::get('/agenda', [AdminController::class, 'agendaIndex'])->name('agenda.index');
    Route::get('/agenda/create', [AdminController::class, 'agendaCreate'])->name('agenda.create');
    Route::post('/agenda', [AdminController::class, 'agendaStore'])->name('agenda.store');
    Route::get('/agenda/{agenda}/edit', [AdminController::class, 'agendaEdit'])->name('agenda.edit');
    Route::put('/agenda/{agenda}', [AdminController::class, 'agendaUpdate'])->name('agenda.update');
    Route::delete('/agenda/{agenda}', [AdminController::class, 'agendaDestroy'])->name('agenda.destroy');

    // Aspirasi Management
    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
    Route::delete('/aspirasi/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
});
