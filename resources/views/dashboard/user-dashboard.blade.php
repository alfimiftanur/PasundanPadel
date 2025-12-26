<x-layout title="Dashboard - PasundanPadel">
    <div class="min-h-screen bg-gray-50">
        <!-- Dashboard Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-gray-500 mt-1">Selamat datang, {{ Auth::user()->name ?? 'Admin' }}!</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Booking -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Total Booking</p>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalBookings ?? 0 }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Pending -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Pending</p>
                            <p class="text-4xl font-bold text-yellow-500 mt-2">{{ $pendingBookings ?? 0 }}</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Confirmed -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Confirmed</p>
                            <p class="text-4xl font-bold text-green-500 mt-2">{{ $confirmedBookings ?? 0 }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Cancelled -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Cancelled</p>
                            <p class="text-4xl font-bold text-red-500 mt-2">{{ $cancelledBookings ?? 0 }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Booking Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900">Riwayat Booking</h2>
                </div>
                
                @if(($bookings ?? collect())->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-gray-500 text-sm border-b border-gray-100">
                                    <th class="px-6 py-4 font-medium">Lapangan</th>
                                    <th class="px-6 py-4 font-medium">Tanggal</th>
                                    <th class="px-6 py-4 font-medium">Waktu</th>
                                    <th class="px-6 py-4 font-medium">Harga</th>
                                    <th class="px-6 py-4 font-medium">Status</th>
                                    <th class="px-6 py-4 font-medium">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr class="border-b border-gray-50 hover:bg-gray-50">
                                    <td class="px-6 py-4 text-gray-900">{{ $booking->court->name ?? 'Lapangan' }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $booking->date ?? '-' }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $booking->time ?? '-' }}</td>
                                    <td class="px-6 py-4 text-gray-900">Rp {{ number_format($booking->price ?? 0, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        @if($booking->status == 'confirmed')
                                            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">Confirmed</span>
                                        @elseif($booking->status == 'pending')
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">Pending</span>
                                        @else
                                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Cancelled</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="text-blue-600 hover:text-blue-700">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center py-16">
                        <div class="bg-gray-100 p-6 rounded-full mb-4">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-lg mb-6">Belum ada booking</p>
                        <a href="{{ route('court.index') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                            Mulai Booking Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>