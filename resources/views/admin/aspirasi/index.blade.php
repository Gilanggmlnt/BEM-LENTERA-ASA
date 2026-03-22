@extends('layouts.app')
@section('title', 'Daftar Aspirasi')

@section('content')
<div class="min-h-screen bg-gray-50 pt-24 pb-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-dark">Kritik, Saran & Aspirasi</h1>
                <span class="bg-primary/10 text-primary px-4 py-1 rounded-full text-sm font-medium">
                    Total: {{ $aspirasis->total() }}
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-500 text-sm uppercase">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Pengirim</th>
                            <th class="px-6 py-4 font-semibold">Kategori</th>
                            <th class="px-6 py-4 font-semibold">Pesan</th>
                            <th class="px-6 py-4 font-semibold">Tanggal</th>
                            <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse($aspirasis as $item)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-medium text-dark">{{ $item->nama_pengirim ?? 'Anonim' }}</div>
                                <div class="text-gray-400 text-xs">{{ $item->email_pengirim ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium 
                                    @if($item->kategori == 'Kritik') bg-red-50 text-red-600 
                                    @elseif($item->kategori == 'Saran') bg-blue-50 text-blue-600 
                                    @else bg-green-50 text-green-600 @endif">
                                    {{ $item->kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4 max-w-xs">
                                <p class="text-gray-600 line-clamp-2 truncate">{{ $item->pesan }}</p>
                            </td>
                            <td class="px-6 py-4 text-gray-400">
                                {{ $item->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.aspirasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus aspirasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-600 transition-colors">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                <div class="flex flex-col items-center">
                                    <i data-lucide="message-square" class="w-12 h-12 mb-4 opacity-20"></i>
                                    <p>Belum ada aspirasi yang masuk.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t border-gray-100">
                {{ $aspirasis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
