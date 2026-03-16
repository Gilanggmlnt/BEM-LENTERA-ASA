<?php

namespace App\Http\Controllers;

use App\Models\Fungsionaris;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $presma = Fungsionaris::with('jabatan')->whereHas('jabatan', function ($query) {
            $query->where('nama_jabatan', 'Presiden Mahasiswa');
        })->first();
        return view('pages.beranda', compact('presma'));
    }
}
