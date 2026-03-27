<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Berita;
use App\Models\Fungsionaris;
use App\Models\Proker;
use App\Models\Agenda;
use App\Models\Kementerian;
use App\Models\Jabatan;
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
        $beritasCount = Berita::count();
        $fungsionarisCount = Fungsionaris::count();
        $agendasCount = Agenda::count();
        $prokersCount = Proker::count();

        $beritas = Berita::orderBy('date', 'desc')->take(5)->get();
        return view('admin.dashboard', compact('beritas', 'beritasCount', 'fungsionarisCount', 'agendasCount', 'prokersCount'));
    }

    // === CRUD BERITA ===
    public function newsIndex(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $beritas = Berita::orderBy('date', 'desc')->paginate($perPage)->withQueryString();
        return view('admin.news_index', compact('beritas', 'perPage'));
    }

    public function newsCreate()
    {
        return view('admin.news_form');
    }

    public function newsStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'date' => 'required|date',
            'excerpt' => 'nullable',
            'description' => 'required',
            'link' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/berita'), $imageName);
            $data['image'] = $imageName;
        }

        Berita::create($data);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function newsEdit(Berita $berita)
    {
        return view('admin.news_form', compact('berita'));
    }

    public function newsUpdate(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'date' => 'required|date',
            'excerpt' => 'nullable',
            'description' => 'required',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($berita->image && file_exists(public_path('images/berita/' . $berita->image))) {
                unlink(public_path('images/berita/' . $berita->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/berita'), $imageName);
            $data['image'] = $imageName;
        }

        $berita->update($data);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function newsDestroy(Berita $berita)
    {
        if ($berita->image && file_exists(public_path('images/berita/' . $berita->image))) {
            unlink(public_path('images/berita/' . $berita->image));
        }
        $berita->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }

    // === CRUD FUNGSIONARIS ===
    public function fungsionarisIndex(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $members = Fungsionaris::with(['jabatan', 'kementerian'])->paginate($perPage)->withQueryString();
        return view('admin.fungsionaris_index', compact('members', 'perPage'));
    }

    public function fungsionarisCreate()
    {
        $jabatans = Jabatan::all();
        $kementerians = Kementerian::all();
        return view('admin.fungsionaris_form', compact('jabatans', 'kementerians'));
    }

    public function fungsionarisStore(Request $request)
    {
        $data = $request->validate([
            'nama_fungsionaris' => 'required|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
            'kementerian_id' => 'nullable|exists:kementerians,id',
            'photo' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . Str::slug($data['nama_fungsionaris']) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/foto_fungsionaris'), $photoName);
            $data['photo_path'] = $photoName;
        }

        Fungsionaris::create($data);
        return redirect()->route('admin.fungsionaris.index')->with('success', 'Fungsionaris berhasil ditambahkan!');
    }

    public function fungsionarisEdit(Fungsionaris $fungsionaris)
    {
        $jabatans = Jabatan::all();
        $kementerians = Kementerian::all();
        return view('admin.fungsionaris_form', compact('fungsionaris', 'jabatans', 'kementerians'));
    }

    public function fungsionarisUpdate(Request $request, Fungsionaris $fungsionaris)
    {
        $data = $request->validate([
            'nama_fungsionaris' => 'required|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
            'kementerian_id' => 'nullable|exists:kementerians,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($fungsionaris->photo_path && file_exists(public_path('images/foto_fungsionaris/' . $fungsionaris->photo_path))) {
                unlink(public_path('images/foto_fungsionaris/' . $fungsionaris->photo_path));
            } elseif ($fungsionaris->photo_path && file_exists(public_path('images/' . $fungsionaris->photo_path))) {
                unlink(public_path('images/' . $fungsionaris->photo_path));
            }
            $photo = $request->file('photo');
            $photoName = time() . '_' . Str::slug($data['nama_fungsionaris']) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/foto_fungsionaris'), $photoName);
            $data['photo_path'] = $photoName;
        }

        $fungsionaris->update($data);
        return redirect()->route('admin.fungsionaris.index')->with('success', 'Fungsionaris berhasil diperbarui!');
    }

    public function fungsionarisDestroy(Fungsionaris $fungsionaris)
    {
        if ($fungsionaris->photo_path && file_exists(public_path('images/foto_fungsionaris/' . $fungsionaris->photo_path))) {
            unlink(public_path('images/foto_fungsionaris/' . $fungsionaris->photo_path));
        } elseif ($fungsionaris->photo_path && file_exists(public_path('images/' . $fungsionaris->photo_path))) {
            unlink(public_path('images/' . $fungsionaris->photo_path));
        }
        $fungsionaris->delete();
        return redirect()->route('admin.fungsionaris.index')->with('success', 'Fungsionaris berhasil dihapus!');
    }

    // === CRUD PROKER ===
    public function prokerIndex(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $prokers = Proker::with('kementerian')->paginate($perPage)->withQueryString();
        return view('admin.proker_index', compact('prokers', 'perPage'));
    }

    public function prokerCreate()
    {
        $kementerians = Kementerian::all();
        return view('admin.proker_form', compact('kementerians'));
    }

    public function prokerStore(Request $request)
    {
        $data = $request->validate([
            'nama_proker' => 'required|max:255',
            'kementerian_id' => 'required|exists:kementerians,id',
            'nama_ketuplak' => 'required|max:255',
            'deskripsi_proker' => 'required',
            'tanggal_pelaksanaan' => 'required|date',
            'pamflet_file' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($data['nama_proker']);

        if ($request->hasFile('pamflet_file')) {
            $file = $request->file('pamflet_file');
            $fileName = time() . '_pamflet_' . $data['slug'] . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/flyer_proker'), $fileName);
            $data['pamflet'] = 'images/flyer_proker/' . $fileName;
        }

        Proker::create($data);
        return redirect()->route('admin.proker.index')->with('success', 'Proker berhasil ditambahkan!');
    }

    public function prokerEdit(Proker $proker)
    {
        $kementerians = Kementerian::all();
        return view('admin.proker_form', compact('proker', 'kementerians'));
    }

    public function prokerUpdate(Request $request, Proker $proker)
    {
        $data = $request->validate([
            'nama_proker' => 'required|max:255',
            'kementerian_id' => 'required|exists:kementerians,id',
            'nama_ketuplak' => 'required|max:255',
            'deskripsi_proker' => 'required',
            'tanggal_pelaksanaan' => 'required|date',
            'pamflet_file' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($data['nama_proker']);

        if ($request->hasFile('pamflet_file')) {
            if ($proker->pamflet && file_exists(public_path($proker->pamflet))) {
                unlink(public_path($proker->pamflet));
            }
            $file = $request->file('pamflet_file');
            $fileName = time() . '_pamflet_' . $data['slug'] . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/flyer_proker'), $fileName);
            $data['pamflet'] = 'images/flyer_proker/' . $fileName;
        }

        $proker->update($data);
        return redirect()->route('admin.proker.index')->with('success', 'Proker berhasil diperbarui!');
    }

    public function prokerDestroy(Proker $proker)
    {
        if ($proker->pamflet && file_exists(public_path($proker->pamflet))) {
            unlink(public_path($proker->pamflet));
        }
        $proker->delete();
        return redirect()->route('admin.proker.index')->with('success', 'Proker berhasil dihapus!');
    }

    // === CRUD AGENDA ===
    public function agendaIndex(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $agendas = Agenda::with('kementerian')->paginate($perPage)->withQueryString();
        return view('admin.agenda_index', compact('agendas', 'perPage'));
    }

    public function agendaCreate()
    {
        $kementerians = Kementerian::all();
        return view('admin.agenda_form', compact('kementerians'));
    }

    public function agendaStore(Request $request)
    {
        $data = $request->validate([
            'nama_agenda' => 'required|max:255',
            'kementerian_id' => 'required|exists:kementerians,id',
            'pelaksanaan_agenda' => 'required|max:255',
            'deskripsi_agenda' => 'nullable',
        ]);

        Agenda::create($data);
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function agendaEdit(Agenda $agenda)
    {
        $kementerians = Kementerian::all();
        return view('admin.agenda_form', compact('agenda', 'kementerians'));
    }

    public function agendaUpdate(Request $request, Agenda $agenda)
    {
        $data = $request->validate([
            'nama_agenda' => 'required|max:255',
            'kementerian_id' => 'required|exists:kementerians,id',
            'pelaksanaan_agenda' => 'required|max:255',
            'deskripsi_agenda' => 'nullable',
        ]);

        $agenda->update($data);
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui!');
    }

    public function agendaDestroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }
}
