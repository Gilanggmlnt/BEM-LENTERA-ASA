@extends('admin.layout')
@section('title', 'Manajemen Program Kerja')
@section('content')

<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-3xl font-bold text-dark">Manajemen Program Kerja</h1>
        <p class="text-gray-500">Kelola Proker BEM KBM POLINES</p>
    </div>
    <div class="flex items-center gap-4">
        <form action="{{ route('admin.proker.index') }}" method="GET" class="flex items-center gap-2">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tampilkan</span>
            <select name="per_page" onchange="this.form.submit()" class="bg-white border border-gray-200 rounded-lg text-xs font-bold px-2 py-2 focus:border-primary outline-none transition-all">
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
            </select>
        </form>
        <a href="{{ route('admin.proker.create') }}" class="px-6 py-3 bg-primary text-dark font-bold rounded-xl shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all">
            + Tambah Proker
        </a>
    </div>
</div>

{{-- Table --}}
<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Nama Proker</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Kementerian</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Ketuplak</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Tanggal</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($prokers as $proker)
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-4">
                    <p class="font-bold text-dark text-sm">{{ $proker->nama_proker }}</p>
                </td>
                <td class="px-6 py-4 text-sm font-medium text-gray-600">{{ $proker->kementerian->nama_kementerian ?? '-' }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $proker->nama_ketuplak }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($proker->tanggal_pelaksanaan)->format('d M Y') }}</td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.proker.edit', $proker->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                        </a>
                        <form action="{{ route('admin.proker.destroy', $proker->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proker ini?')">
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
                <td colspan="5" class="px-6 py-20 text-center text-gray-400 italic">
                    Belum ada program kerja.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="mt-6">
    {{ $prokers->links() }}
</div>

@endsection
