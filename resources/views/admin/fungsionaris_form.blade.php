@extends('admin.layout')
@section('title', (isset($fungsionaris) ? 'Edit' : 'Tambah') . ' Fungsionaris')
@section('content')

<div class="mb-10">
    <a href="{{ route('admin.fungsionaris.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-primary transition-all mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        Kembali ke Daftar Fungsionaris
    </a>
    <h1 class="text-3xl font-bold text-dark">{{ isset($fungsionaris) ? 'Edit' : 'Tambah' }} Fungsionaris</h1>
    <p class="text-gray-500">Lengkapi data fungsionaris BEM KBM POLINES di bawah ini.</p>
</div>

<form action="{{ isset($fungsionaris) ? route('admin.fungsionaris.update', $fungsionaris->id) : route('admin.fungsionaris.store') }}" 
      method="POST" enctype="multipart/form-data" 
      class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 space-y-6 max-w-2xl">
    @csrf
    @if(isset($fungsionaris))
        @method('PUT')
    @endif

    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama_fungsionaris" value="{{ old('nama_fungsionaris', $fungsionaris->nama_fungsionaris ?? '') }}" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                <select name="jabatan_id" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all bg-white text-sm">
                    <option value="">Pilih Jabatan</option>
                    @foreach($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}" {{ (old('jabatan_id', $fungsionaris->jabatan_id ?? '') == $jabatan->id) ? 'selected' : '' }}>
                            {{ $jabatan->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kementerian <span class="text-xs text-gray-400 font-normal">(Opsional)</span></label>
                <select name="kementerian_id"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all bg-white text-sm">
                    <option value="">Tidak Ada / Dewan Pimpinan</option>
                    @foreach($kementerians as $kementerian)
                        <option value="{{ $kementerian->id }}" {{ (old('kementerian_id', $fungsionaris->kementerian_id ?? '') == $kementerian->id) ? 'selected' : '' }}>
                            {{ $kementerian->nama_kementerian }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Formal</label>
            @if(isset($fungsionaris) && $fungsionaris->photo_path)
                <div class="mb-4">
                    <img src="{{ asset('images/' . $fungsionaris->photo_path) }}" class="w-32 h-40 object-cover rounded-xl border border-gray-100">
                </div>
            @endif
            <input type="file" name="photo" {{ isset($fungsionaris) ? '' : 'required' }}
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
            <p class="text-[10px] text-gray-400 mt-1">Format: JPG, PNG. Rekomendasi 3:4 atau formal. Maks: 2MB.</p>
        </div>
    </div>

    <div class="pt-4">
        <button type="submit" 
                class="w-full md:w-auto px-10 py-4 bg-primary text-dark font-bold rounded-2xl shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all">
            {{ isset($fungsionaris) ? 'Simpan Perubahan' : 'Tambah Fungsionaris' }}
        </button>
    </div>
</form>

@endsection
