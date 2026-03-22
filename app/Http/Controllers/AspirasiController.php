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
            return back()->with('success', 'Aspirasi Anda berhasil terkirim. Terima kasih!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim aspirasi. Silakan coba lagi.');
        }
    }

    /**
     * Display listing for admin.
     */
    public function index()
    {
        $aspirasis = Aspirasi::orderBy('created_at', 'desc')->paginate(10);
        
        // Mark all as read when admin visits the list (optional)
        // Aspirasi::where('is_read', false)->update(['is_read' => true]);

        return view('admin.aspirasi.index', compact('aspirasis'));
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
