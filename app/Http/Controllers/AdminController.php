<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Berita;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $beritas = Berita::orderBy('date', 'desc')->get();
        return view('admin.dashboard', compact('beritas'));
    }

    // CRUD Berita
    public function create()
    {
        return view('admin.news_form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'date' => 'required|date',
            'excerpt' => 'nullable',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/berita'), $imageName);
            $data['image'] = $imageName;
        }

        Berita::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.news_form', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'date' => 'required|date',
            'excerpt' => 'nullable',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($berita->image && file_exists(public_path('images/berita/' . $berita->image))) {
                unlink(public_path('images/berita/' . $berita->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/berita'), $imageName);
            $data['image'] = $imageName;
        }

        $berita->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image && file_exists(public_path('images/berita/' . $berita->image))) {
            unlink(public_path('images/berita/' . $berita->image));
        }
        
        $berita->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil dihapus!');
    }
}
