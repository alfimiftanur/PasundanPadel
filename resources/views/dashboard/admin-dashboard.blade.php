<x-layout title="Admin Dashboard - PasundanPadel">
    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
                <p class="text-gray-500 mt-1">Kelola sistem PasundanPadel</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Lapangan -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Total Lapangan</p>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalCourts ?? 6 }}</p>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Total Users</p>
                            <p class="text-4xl font-bold text-blue-600 mt-2">{{ $totalUsers ?? 1 }}</p>
                        </div>
                        <div class="bg-purple-50 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Booking -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Total Booking</p>
                            <p class="text-4xl font-bold text-red-500 mt-2">{{ $totalBookings ?? 1 }}</p>
                            <div class="flex gap-2 mt-2 text-xs">
                                <span class="text-green-500">{{ $pendingBookings ?? 0 }} Pending</span>
                                <span class="text-green-500">{{ $confirmedBookings ?? 0 }} Confirmed</span>
                            </div>
                        </div>
                        <div class="bg-red-50 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Cancelled -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Cancelled</p>
                            <p class="text-4xl font-bold text-blue-600 mt-2">{{ $cancelledBookings ?? 1 }}</p>
                        </div>
                        <div class="bg-red-50 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Total Pendapatan Hari Ini -->
                <div class="bg-gradient-to-r from-teal-500 to-teal-600 rounded-xl shadow-sm p-6 text-white">
                    <p class="text-teal-100 text-sm">Total Pendapatan Hari Ini</p>
                    <p class="text-3xl font-bold mt-2">Rp {{ number_format($todayRevenue ?? 0, 0, ',', '.') }}</p>
                </div>

                <!-- Total Pendapatan Bulan Ini -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-sm p-6 text-white">
                    <p class="text-blue-100 text-sm">Total Pendapatan Bulan Ini</p>
                    <p class="text-3xl font-bold mt-2">Rp {{ number_format($monthRevenue ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <!-- Kelola Lapangan -->
                <a href="{{ route('lapangan.index') }}" class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">
                    <div class="bg-blue-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Kelola Lapangan</p>
                        <p class="text-gray-400 text-sm">CRUD lapangan</p>
                    </div>
                </a>

                <!-- Kelola Booking -->
                <a href="#" class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">
                    <div class="bg-green-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Kelola Booking</p>
                        <p class="text-gray-400 text-sm">Approve/Reject</p>
                    </div>
                </a>

                <!-- Tambah Lapangan -->
                <a href="{{ route('lapangan.create') }}" class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">
                    <div class="bg-purple-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Tambah Lapangan</p>
                        <p class="text-gray-400 text-sm">Buat baru</p>
                    </div>
                </a>

                <!-- Laporan PDF -->
                <a href="#" class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">
                    <div class="bg-red-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Laporan PDF</p>
                        <p class="text-gray-400 text-sm">Export data</p>
                    </div>
                </a>
            </div>

            <!-- Recent Bookings Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center p-6 border-b border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900">Daftar Lapangan</h2>
                    <a href="{{ route('lapangan.index') }}" class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                        Kelola Semua 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                @if ($lapangans->isEmpty())
                    <div class="p-6 text-center text-gray-500">
                        <p>Belum ada lapangan. <a href="{{ route('lapangan.create') }}" class="text-blue-600 hover:underline">Buat lapangan baru</a></p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                        @foreach ($lapangans as $lapangan)
                            <div class="rounded-lg overflow-hidden bg-white border border-gray-200 hover:shadow-lg transition-shadow">
                                <!-- Image -->
                                @if ($lapangan->foto)
                                    <img src="{{ asset('storage/' . $lapangan->foto) }}" alt="{{ $lapangan->nama_lapangan }}" class="w-full h-40 object-cover">
                                @else
                                    <div class="w-full h-40 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                        <span class="text-white text-sm">Tidak ada foto</span>
                                    </div>
                                @endif

                                <!-- Content -->
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $lapangan->nama_lapangan }}</h3>
                                        <span class="text-xs px-2 py-1 rounded text-white
                                            @if ($lapangan->status === 'tersedia') bg-green-500
                                            @elseif ($lapangan->status === 'tidak tersedia') bg-red-500
                                            @else bg-yellow-500
                                            @endif">
                                            {{ ucfirst($lapangan->status) }}
                                        </span>
                                    </div>

                                    <div class="text-sm text-gray-600 mb-3 space-y-1">
                                        <p><strong>Tipe:</strong> {{ $lapangan->tipe_lapangan }}</p>
                                        <p><strong>Harga:</strong> Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}/jam</p>
                                        <p><strong>Kapasitas:</strong> {{ $lapangan->kapasitas }} pemain</p>
                                    </div>

                                    <div class="flex gap-2">
                                        <a href="{{ route('lapangan.show', $lapangan) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold py-2 px-2 rounded text-center">
                                            Lihat
                                        </a>
                                        <a href="{{ route('lapangan.edit', $lapangan) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-semibold py-2 px-2 rounded text-center">
                                            Edit
                                        </a>
                                        <form action="{{ route('lapangan.destroy', $lapangan) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-xs font-semibold py-2 px-2 rounded">
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
        </div>
    </div>
</x-layout>