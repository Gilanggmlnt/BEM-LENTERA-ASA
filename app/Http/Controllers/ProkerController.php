<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use App\Models\Fungsionaris;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProkerController extends Controller
{
    public function show($slug)
    {
        $proker = Proker::where('slug', $slug)->with('kementerian')->firstOrFail();
        
        // Find ketuplak from Fungsionaris table by name
        $ketuplak = Fungsionaris::where('nama_fungsionaris', 'like', '%' . $proker->nama_ketuplak . '%')->first();
        
        // Determine status
        $today = Carbon::today();
        $tanggalPelaksanaan = Carbon::parse($proker->tanggal_pelaksanaan);
        
        $status = $today->greaterThanOrEqualTo($tanggalPelaksanaan) ? 'Terlaksana' : 'Belum Terlaksana';
        $statusColor = $today->greaterThanOrEqualTo($tanggalPelaksanaan) ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800';

        return view('pages.proker_detail', compact('proker', 'ketuplak', 'status', 'statusColor'));
    }
}
