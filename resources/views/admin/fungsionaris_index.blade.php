@extends('admin.layout')
@section('title', 'Manajemen Fungsionaris')
@section('content')

<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-3xl font-bold text-dark">Manajemen Fungsionaris</h1>
        <p class="text-gray-500">Kelola data pengurus BEM KBM POLINES</p>
    </div>
    <div class="flex items-center gap-4">
        <form action="{{ route('admin.fungsionaris.index') }}" method="GET" class="flex items-center gap-2">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tampilkan</span>
            <select name="per_page" onchange="this.form.submit()" class="bg-white border border-gray-200 rounded-lg text-xs font-bold px-2 py-2 focus:border-primary outline-none transition-all">
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
            </select>
        </form>
        <a href="{{ route('admin.fungsionaris.create') }}" class="px-6 py-3 bg-primary text-dark font-bold rounded-xl shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all">
            + Tambah Fungsionaris
        </a>
    </div>
</div>

{{-- Table --}}
<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Nama</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Jabatan</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Kementerian</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($members as $member)
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-4">
                        @if($member->photo_path)
                            <img src="{{ asset('images/' . $member->photo_path) }}" class="w-10 h-10 rounded-full object-cover border border-gray-100">
                        @else
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            </div>
                        @endif
                        <p class="font-bold text-dark text-sm">{{ $member->nama_fungsionaris }}</p>
                    </div>
                </td>
                <td class="px-6 py-4 text-sm font-medium text-gray-600">{{ $member->jabatan->nama_jabatan ?? '-' }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $member->kementerian->nama_kementerian ?? 'BEM KBM POLINES' }}</td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.fungsionaris.edit', $member->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                        </a>
                        <form action="{{ route('admin.fungsionaris.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data fungsionaris ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-20 text-center text-gray-400 italic">
                    Belum ada data fungsionaris.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="mt-6">
    {{ $members->links() }}
</div>

@endsection
