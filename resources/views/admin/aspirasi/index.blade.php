@extends('admin.layout')
@section('title', 'Suara Mahasiswa')
@section('content')

<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-3xl font-bold text-dark">Suara Mahasiswa</h1>
        <p class="text-gray-500">Daftar kritik, saran, dan aspirasi mahasiswa</p>
    </div>
    <div class="flex items-center gap-4">
        <form action="{{ route('admin.aspirasi.index') }}" method="GET" class="flex items-center gap-2">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tampilkan</span>
            <select name="per_page" onchange="this.form.submit()" class="bg-white border border-gray-200 rounded-lg text-xs font-bold px-2 py-2 focus:border-primary outline-none transition-all">
                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </form>
    </div>
</div>

{{-- Table --}}
<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Pengirim</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Kategori</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Pesan</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($aspirasis as $item)
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-4">
                    <div>
                        <p class="font-bold text-dark text-sm">{{ $item->nama_pengirim ?? 'Anonim' }}</p>
                        <p class="text-[10px] text-gray-400">{{ $item->email_pengirim ?? '-' }}</p>
                        <p class="text-[10px] text-gray-400">{{ $item->created_at->translatedFormat('d F Y, H:i') }} WIB</p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-[10px] font-bold rounded-md uppercase 
                        @if($item->kategori == 'Kritik') bg-red-100 text-red-600 
                        @elseif($item->kategori == 'Saran') bg-blue-100 text-blue-600 
                        @else bg-green-100 text-green-600 @endif">
                        {{ $item->kategori }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="max-w-xs md:max-w-md">
                        <p class="text-sm text-gray-600 truncate">{{ $item->pesan }}</p>
                        <button 
                            onclick="showDetail(
                                '{{ $item->nama_pengirim ?? 'Anonim' }}', 
                                '{{ $item->kategori }}', 
                                @js($item->pesan), 
                                '{{ $item->created_at->translatedFormat('d F Y, H:i') }}'
                            )" 
                            class="text-[10px] font-bold text-primary hover:underline mt-1 uppercase tracking-wider">
                            Lihat Detail
                        </button>
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-2">
                        <form action="{{ route('admin.aspirasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aspirasi ini?')">
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
                    Belum ada aspirasi yang masuk.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="mt-6">
    {{ $aspirasis->appends(request()->query())->links() }}
</div>

{{-- Modal Detail --}}
<div id="modalDetail" class="fixed inset-0 z-[100] hidden">
    <div class="absolute inset-0 bg-dark/80 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4 pointer-events-none">
        <div class="bg-white rounded-3xl w-full max-w-lg shadow-2xl pointer-events-auto overflow-hidden animate-in fade-in zoom-in duration-200 flex flex-col max-h-[90vh]">
            {{-- Modal Header --}}
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50 shrink-0">
                <h3 class="font-bold text-dark text-lg">Detail Aspirasi</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-dark transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="p-8 overflow-y-auto flex-1">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-3-3.87"/><path d="M4 21v-2a4 4 0 0 1 3-3.87"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div class="overflow-hidden">
                        <p id="detailNama" class="font-bold text-dark truncate"></p>
                        <p id="detailWaktu" class="text-xs text-gray-400"></p>
                    </div>
                    <span id="detailKategori" class="ml-auto px-3 py-1 text-[10px] font-bold rounded-full uppercase shrink-0"></span>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Isi Pesan:</p>
                    <div class="max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                        <p id="detailPesan" class="text-gray-600 leading-relaxed whitespace-pre-line text-sm"></p>
                    </div>
                </div>
            </div>

            {{-- Modal Footer --}}
            <div class="p-6 bg-gray-50 border-t border-gray-100 flex justify-end shrink-0">
                <button onclick="closeModal()" class="px-6 py-2 bg-dark text-white font-bold rounded-xl hover:bg-dark/90 transition-all">Tutup</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Scrollbar for the message box */
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #FFC900;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #e6b500;
    }
</style>

<script>
    function showDetail(nama, kategori, pesan, waktu) {
        const modal = document.getElementById('modalDetail');
        document.getElementById('detailNama').textContent = nama;
        document.getElementById('detailWaktu').textContent = waktu + ' WIB';
        document.getElementById('detailPesan').textContent = pesan;
        
        const katElem = document.getElementById('detailKategori');
        katElem.textContent = kategori;
        katElem.className = 'ml-auto px-3 py-1 text-[10px] font-bold rounded-full uppercase ';
        
        if (kategori === 'Kritik') katElem.classList.add('bg-red-100', 'text-red-600');
        else if (kategori === 'Saran') katElem.classList.add('bg-blue-100', 'text-blue-600');
        else katElem.classList.add('bg-green-100', 'text-green-600');
        
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('modalDetail').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>

@endsection
