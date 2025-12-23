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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
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
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                <a href="{{ route('court.index') }}"
                    class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">
                    <div class="bg-blue-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Kelola Lapangan</p>

                    </div>
                </a>

                <!-- Kelola Booking -->
                <a href="#"
                    class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">
                    <div class="bg-green-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Kelola Booking</p>

                    </div>
                </a>

                <a href="/jadwal"
                    class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">

                    <div class="bg-purple-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                            <circle cx="12" cy="12" r="9" stroke-width="2" />
                        </svg>
                    </div>

                    <div>
                        <p class="font-semibold text-gray-900">Kelola Jadwal</p>
                    </div>
                </a>


                <!-- export PDF -->
                <a href="#"
                    class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">
                    <div class="bg-red-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Export PDF</p>
                        
                    </div>
                </a>
            </div>

            <!-- Recent Bookings Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center p-6 border-b border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900">Recent Bookings</h2>
    {{-- nanti href ini diisi ke pemesanan>>index --}}
                    <a href="#" class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                        Lihat Semua
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-500 text-sm border-b border-gray-100">
                                <th class="px-6 py-4 font-medium">ID</th>
                                <th class="px-6 py-4 font-medium">USER</th>
                                <th class="px-6 py-4 font-medium">LAPANGAN</th>
                                <th class="px-6 py-4 font-medium">JADWAL</th>
                                <th class="px-6 py-4 font-medium">HARGA</th>
                                <th class="px-6 py-4 font-medium">STATUS</th>
                                <th class="px-6 py-4 font-medium">PAYMENT</th>
                                <th class="px-6 py-4 font-medium">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBookings ?? [] as $booking)
                                <tr class="border-b border-gray-50 hover:bg-gray-50">
                                    <td class="px-6 py-4 text-gray-900">#{{ $booking->id }}</td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="text-gray-900 font-medium">
                                                {{ $booking->user->name ?? 'User Demo' }}</p>
                                            <p class="text-gray-400 text-sm">
                                                {{ $booking->user->email ?? 'user@padelcourt.com' }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900">
                                        {{ $booking->court->name ?? 'Grand Padel Club' }}</td>
                                    <td class="px-6 py-4">
                                        <p class="text-gray-900">{{ $booking->date ?? '17 Dec 2025' }}</p>
                                        <p class="text-gray-400 text-sm">{{ $booking->time ?? '18:00 - 19:00' }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900">Rp
                                        {{ number_format($booking->price ?? 120000, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        @if (($booking->status ?? 'cancelled') == 'confirmed')
                                            <span class="text-green-500">Confirmed</span>
                                        @elseif(($booking->status ?? 'cancelled') == 'pending')
                                            <span class="text-yellow-500">Pending</span>
                                        @else
                                            <span class="text-red-500">Cancelled</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if (($booking->payment_status ?? 'rejected') == 'paid')
                                            <span class="text-green-500">Paid</span>
                                        @elseif(($booking->payment_status ?? 'rejected') == 'pending')
                                            <span class="text-yellow-500">Pending</span>
                                        @else
                                            <span class="text-red-500">Rejected</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="text-gray-600 hover:text-gray-900">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b border-gray-50">
                                    <td class="px-6 py-4 text-gray-900">#1</td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="text-gray-900 font-medium">User Demo</p>
                                            <p class="text-gray-400 text-sm">user@padelcourt.com</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900">Grand Padel Club</td>
                                    <td class="px-6 py-4">
                                        <p class="text-gray-900">17 Dec 2025</p>
                                        <p class="text-gray-400 text-sm">18:00 - 19:00</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900">Rp 120.000</td>
                                    <td class="px-6 py-4">
                                        <span class="text-red-500">Cancelled</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-red-500">Rejected</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="text-gray-600 hover:text-gray-900">Detail</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
