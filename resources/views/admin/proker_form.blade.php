@extends('admin.layout')
@section('title', (isset($proker) ? 'Edit' : 'Tambah') . ' Program Kerja')
@section('content')

<div class="mb-10">
    <a href="{{ route('admin.proker.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-primary transition-all mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        Kembali ke Daftar Proker
    </a>
    <h1 class="text-3xl font-bold text-dark">{{ isset($proker) ? 'Edit' : 'Tambah' }} Proker</h1>
    <p class="text-gray-500">Lengkapi informasi program kerja BEM KBM POLINES.</p>
</div>

<form action="{{ isset($proker) ? route('admin.proker.update', $proker->id) : route('admin.proker.store') }}" 
      method="POST" enctype="multipart/form-data" 
      class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 space-y-6 max-w-4xl">
    @csrf
    @if(isset($proker))
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Program Kerja</label>
            <input type="text" name="nama_proker" value="{{ old('nama_proker', $proker->nama_proker ?? '') }}" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kementerian Penanggung Jawab</label>
            <select name="kementerian_id" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all bg-white text-sm">
                <option value="">Pilih Kementerian</option>
                @foreach($kementerians as $kementerian)
                    <option value="{{ $kementerian->id }}" {{ (old('kementerian_id', $proker->kementerian_id ?? '') == $kementerian->id) ? 'selected' : '' }}>
                        {{ $kementerian->nama_kementerian }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Ketua Pelaksana</label>
            <input type="text" name="nama_ketuplak" value="{{ old('nama_ketuplak', $proker->nama_ketuplak ?? '') }}" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pelaksanaan</label>
            <input type="date" name="tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan', isset($proker) ? \Carbon\Carbon::parse($proker->tanggal_pelaksanaan)->format('Y-m-d') : '') }}" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pamflet / Flyer Proker</label>
            @if(isset($proker) && $proker->pamflet)
                <div class="mb-4">
                    <img src="{{ asset($proker->pamflet) }}" class="w-48 rounded-xl border border-gray-100 shadow-sm">
                </div>
            @endif
            <input type="file" name="pamflet_file"
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
            <p class="text-[10px] text-gray-400 mt-1">Format: JPG, PNG. Maks: 2MB.</p>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Program Kerja</label>
            <textarea name="deskripsi_proker" rows="6" required
                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('deskripsi_proker', $proker->deskripsi_proker ?? '') }}</textarea>
        </div>
    </div>

    <div class="pt-4">
        <button type="submit" 
                class="w-full md:w-auto px-10 py-4 bg-primary text-dark font-bold rounded-2xl shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all">
            {{ isset($proker) ? 'Simpan Perubahan' : 'Tambah Proker' }}
        </button>
    </div>
</form>

@endsection
