<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    /**
     * Store feedback from users.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengirim' => 'nullable|string|max:100',
            'email_pengirim' => 'nullable|email|max:100',
            'kategori' => 'required|string',
            'pesan' => 'required|string|min:10'
        ]);

        try {
            Aspirasi::create($validated);
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Aspirasi Anda berhasil terkirim. Terima kasih!'
                ]);
            }

            return back()->with('success', 'Aspirasi Anda berhasil terkirim. Terima kasih!');
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal mengirim aspirasi. Silakan coba lagi.'
                ], 500);
            }
            
            return back()->with('error', 'Gagal mengirim aspirasi. Silakan coba lagi.');
        }
    }

    /**
     * Display listing for admin.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $aspirasis = Aspirasi::orderBy('created_at', 'desc')->paginate($perPage);
        
        return view('admin.aspirasi.index', compact('aspirasis', 'perPage'));
    }

    /**
     * Delete a feedback item.
     */
    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();
        return back()->with('success', 'Aspirasi berhasil dihapus.');
    }
}
