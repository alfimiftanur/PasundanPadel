<x-layout title="Daftar Lapangan - PasundanPadel">
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Lapangan</h1>
        <a href="{{ route('lapangan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Tambah Lapangan
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($lapangans->isEmpty())
        <div class="text-center py-8 bg-gray-100 rounded">
            <p class="text-gray-600">Belum ada lapangan. <a href="{{ route('lapangan.create') }}" class="text-blue-600 hover:underline">Buat lapangan baru</a></p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($lapangans as $lapangan)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if ($lapangan->foto)
                        <img src="{{ asset('storage/' . $lapangan->foto) }}" alt="{{ $lapangan->nama_lapangan }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">Tidak ada foto</span>
                        </div>
                    @endif
                    
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $lapangan->nama_lapangan }}</h2>
                        
                        <div class="mb-3 space-y-1 text-sm text-gray-600">
                            <p><strong>Tipe:</strong> {{ $lapangan->tipe_lapangan }}</p>
                            <p><strong>Kapasitas:</strong> {{ $lapangan->kapasitas }} pemain</p>
                            <p><strong>Harga:</strong> Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}/jam</p>
                            <p>
                                <strong>Status:</strong> 
                                <span class="px-2 py-1 rounded text-white text-xs
                                    @if ($lapangan->status === 'tersedia') bg-green-500
                                    @elseif ($lapangan->status === 'tidak tersedia') bg-red-500
                                    @else bg-yellow-500
                                    @endif">
                                    {{ ucfirst($lapangan->status) }}
                                </span>
                            </p>
                        </div>

                        @if ($lapangan->deskripsi)
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $lapangan->deskripsi }}</p>
                        @endif

                        <div class="flex gap-2">
                            <a href="{{ route('lapangan.edit', $lapangan) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-3 rounded text-center text-sm">
                                Edit
                            </a>
                            <form action="{{ route('lapangan.destroy', $lapangan) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus lapangan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
</x-layout>
