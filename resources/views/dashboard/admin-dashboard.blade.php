<x-layout>
 <x-slot:title>Admin's Panel</x-slot:title>
   <section class="min-h-screen bg-[#dfe6db]">
    <div class="max-w-7xl mx-auto p-6">

            <div class="mb-8">
                <h2 class="text-4xl italic font-semibold font-serif text-teal-900 text-center mb-2">
                Admin's Panel
            </h2>
                <p class="text-teal-900 text-center mt-1">“All set! Things running smoothly.”</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 mb-2">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Total Courts</p>
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

                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
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

                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Total Bookings</p>
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

                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
                <div class="bg-gradient-to-r from-teal-500 to-teal-600 rounded-xl shadow-sm p-6 text-white">
                    <p class="text-teal-100 text-sm">Today's Revenue</p>
                    <p class="text-3xl font-bold mt-2">Rp {{ number_format($todayRevenue ?? 0, 0, ',', '.') }}</p>
                </div>

                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-sm p-6 text-white">
                    <p class="text-blue-100 text-sm">Monthly Revenue</p>
                    <p class="text-3xl font-bold mt-2">Rp {{ number_format($monthRevenue ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 mb-4">
                <a href="{{ route('lapangan.index') }}"
                    class="bg-white rounded-xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-2">
                    <div class="bg-blue-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Courts</p>

                    </div>
                </a>

                <a href="/booking-list"
                    class="bg-white rounded-xl shadow-sm p-4 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-2">
                    <div class="bg-green-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Bookings</p>

                    </div>
                </a>

                <a href="/jadwal"
                    class="bg-white rounded-xl shadow-sm p-4 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-2">

                    <div class="bg-purple-50 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                            <circle cx="12" cy="12" r="9" stroke-width="2" />
                        </svg>
                        <!-- input -->
                        <input type="text" name="search" placeholder="Cari berdasarkan user atau lapangan"
                            value="{{ request('search') }}"
                            class="w-full border border-slate-200 rounded-xl
                   pl-11 pr-10 py-2
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                        <!-- clear -->
                        <button type="button"
                            onclick="this.previousElementSibling.value=''; this.previousElementSibling.focus();"
                            class="absolute right-4 top-1/2 -translate-y-1/2
           text-slate-400 hover:text-slate-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>

                    <div>
                        <p class="font-semibold text-gray-900">Schedule</p>
                    </div>

                    <!-- status booking-->
                    <select name="status_booking" class="border border-slate-200 rounded-xl px-4 py-2">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status_booking') === 'pending' ? 'selected' : '' }}>Pending
                        </option>
                        <option value="confirmed" {{ request('status_booking') === 'confirmed' ? 'selected' : '' }}>
                            Confirmed</option>
                        <option value="cancelled" {{ request('status_booking') === 'cancelled' ? 'selected' : '' }}>
                            Cancelled</option>
                        <option value="completed" {{ request('status_booking') === 'completed' ? 'selected' : '' }}>
                            Completed</option>
                    </select>

                    <!-- payment status-->
                    <select name="status_pembayaran" class="border border-slate-200 rounded-xl px-4 py-2">
                        <option value="">All Payment Status</option>
                        <option value="paid" {{ request('status_pembayaran') === 'paid' ? 'selected' : '' }}>Paid
                        </option>
                        <option value="unpaid" {{ request('status_pembayaran') === 'unpaid' ? 'selected' : '' }}>Unpaid
                        </option>
                        <option value="pending" {{ request('status_pembayaran') === 'pending' ? 'selected' : '' }}>
                            Pending</option>
                    </select>

                    <!-- button -->
                    <button
                        class="bg-[#508162] hover:bg-[#4a7a5d] text-white
               rounded-xl font-semibold py-2">
                        Apply
                    </button>
                </form>

<<<<<<< Updated upstream
                <!-- export PDF -->
                <a href="#"
=======
                <a href="{{ route('bookings.pdf') }}"
>>>>>>> Stashed changes
                    class="bg-white rounded-xl shadow-sm p-4 border border-gray-100 hover:shadow-md transition-shadow flex items-center gap-4">
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

            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center p-4 border-b border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900">Recent Bookings</h2>
                    <a href="/booking-list" class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                        View all
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
                                <th class="px-6 py-4 font-medium">User</th>
                                <th class="px-6 py-4 font-medium">Court</th>
                                <th class="px-6 py-4 font-medium">Schedule</th>
                                <th class="px-6 py-4 font-medium">Price</th>
                                <th class="px-6 py-4 font-medium">Status</th>
                                <th class="px-6 py-4 font-medium">Payment</th>
                                <th class="px-6 py-4 font-medium">Action</th>
                            </tr>
<<<<<<< Updated upstream
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-8 text-center text-slate-500">
                                    Tidak ada data booking
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
=======
                        </thead>
                        <tbody>
                            @forelse($recentBookings ?? [] as $booking)
                                <tr class="border-b border-gray-50 hover:bg-gray-50">
                                    <td class="px-6 py-4 text-gray-900">#{{ $booking->id }}</td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="text-gray-900 font-medium">
                                                {{ $booking->customer_name }}</p>
                                            <p class="text-gray-400 text-sm">
                                                {{ $booking->customer_email }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900">
                                        {{ $booking->lapangan->nama_lapangan }}</td>
                                    <td class="px-6 py-4">
                                        <p class="text-gray-900">{{ \Carbon\Carbon::parse($booking->jadwal->date)->format('d M Y') }}</p>
                                        <p class="text-gray-400 text-sm">{{ $booking->jadwal->start_time }} - {{ $booking->jadwal->end_time }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900">Rp
                                        {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        @if ($booking->status == 'confirmed')
                                            <span class="text-green-500">Confirmed</span>
                                        @elseif($booking->status == 'pending')
                                            <span class="text-yellow-500">Pending</span>
                                        @elseif($booking->status == 'completed')
                                            <span class="text-blue-500">Completed</span>
                                        @else
                                            <span class="text-red-500">Cancelled</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($booking->status == 'cancelled')
                                            <span class="text-red-500">Cancelled</span>
                                        @elseif($booking->payment_status == 'paid')
                                            <span class="text-green-500">Paid</span>
                                        @elseif($booking->payment_status == 'pending')
                                            <span class="text-yellow-500">Pending</span>
                                        @elseif($booking->payment_status == 'failed')
                                            <span class="text-red-500">Failed</span>
                                        @else
                                            <span class="text-gray-500">Unpaid</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('pemesanan.show', $booking->id) }}" class="text-gray-600 hover:text-gray-900">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b border-gray-50">
                                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                        Tidak ada data booking
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
>>>>>>> Stashed changes
            </div>

            </d>
</x-layout>
