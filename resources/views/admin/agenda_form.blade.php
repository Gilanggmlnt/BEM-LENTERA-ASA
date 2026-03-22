@extends('admin.layout')
@section('title', (isset($agenda) ? 'Edit' : 'Tambah') . ' Agenda')
@section('content')

<div class="mb-10">
    <a href="{{ route('admin.agenda.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-primary transition-all mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        Kembali ke Daftar Agenda
    </a>
    <h1 class="text-3xl font-bold text-dark">{{ isset($agenda) ? 'Edit' : 'Tambah' }} Agenda</h1>
    <p class="text-gray-500">Lengkapi informasi agenda kementerian BEM KBM POLINES.</p>
</div>

<form action="{{ isset($agenda) ? route('admin.agenda.update', $agenda->id) : route('admin.agenda.store') }}" 
      method="POST"
      class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 space-y-6 max-w-2xl">
    @csrf
    @if(isset($agenda))
        @method('PUT')
    @endif

    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Agenda</label>
            <input type="text" name="nama_agenda" value="{{ old('nama_agenda', $agenda->nama_agenda ?? '') }}" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kementerian Penanggung Jawab</label>
            <select name="kementerian_id" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all bg-white text-sm">
                <option value="">Pilih Kementerian</option>
                @foreach($kementerians as $kementerian)
                    <option value="{{ $kementerian->id }}" {{ (old('kementerian_id', $agenda->kementerian_id ?? '') == $kementerian->id) ? 'selected' : '' }}>
                        {{ $kementerian->nama_kementerian }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pelaksanaan Agenda</label>
            <input type="text" name="pelaksanaan_agenda" value="{{ old('pelaksanaan_agenda', $agenda->pelaksanaan_agenda ?? '') }}" required placeholder="Contoh: Setiap Jumat / 25 Oktober 2025"
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Agenda <span class="text-xs text-gray-400 font-normal">(Opsional)</span></label>
            <textarea name="deskripsi_agenda" rows="4" 
                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('deskripsi_agenda', $agenda->deskripsi_agenda ?? '') }}</textarea>
        </div>
    </div>

    <div class="pt-4">
        <button type="submit" 
                class="w-full md:w-auto px-10 py-4 bg-primary text-dark font-bold rounded-2xl shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all">
            {{ isset($agenda) ? 'Simpan Perubahan' : 'Tambah Agenda' }}
        </button>
    </div>
</form>

@endsection
