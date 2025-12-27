<x-layout :title="$lapangan->nama_lapangan . ' - PasundanPadel'">
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('lapangan.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">← Kembali ke Daftar</a>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if ($lapangan->foto)
                <img src="{{ asset('storage/' . $lapangan->foto) }}" alt="{{ $lapangan->nama_lapangan }}" class="w-full h-96 object-cover">
            @else
                <div class="w-full h-96 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-500 text-lg">Tidak ada foto</span>
                </div>
            @endif

            <div class="p-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $lapangan->nama_lapangan }}</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <p class="text-gray-600">
                            <strong>Tipe Lapangan:</strong><br>
                            <span class="text-lg">{{ $lapangan->tipe_lapangan }}</span>
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600">
                            <strong>Kapasitas Pemain:</strong><br>
                            <span class="text-lg">{{ $lapangan->kapasitas }} pemain</span>
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600">
                            <strong>Harga Per Jam:</strong><br>
                            <span class="text-lg font-semibold text-green-600">Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}</span>
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600">
                            <strong>Status:</strong><br>
                            <span class="inline-block px-3 py-1 rounded text-white font-semibold
                                @if ($lapangan->status === 'tersedia') bg-green-500
                                @elseif ($lapangan->status === 'tidak tersedia') bg-red-500
                                @else bg-yellow-500
                                @endif">
                                {{ ucfirst($lapangan->status) }}
                            </span>
                        </p>
                    </div>
                </div>

                @if ($lapangan->deskripsi)
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Deskripsi</h2>
                        <p class="text-gray-600 leading-relaxed">{{ $lapangan->deskripsi }}</p>
                    </div>
                @endif

                @if ($lapangan->lokasi)
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Lokasi</h2>
                        <p class="text-gray-600 whitespace-pre-wrap">{{ $lapangan->lokasi }}</p>
                    </div>
                @endif

                <div class="text-gray-500 text-sm mb-6">
                    <p>Dibuat pada: {{ $lapangan->created_at->format('d M Y H:i') }}</p>
                    <p>Diperbarui pada: {{ $lapangan->updated_at->format('d M Y H:i') }}</p>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('lapangan.edit', $lapangan) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                        Edit
                    </a>
                    <form action="{{ route('lapangan.destroy', $lapangan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lapangan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</x-layout>