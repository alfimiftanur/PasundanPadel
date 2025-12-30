<x-layout>
 <x-slot:title>Booking Information</x-slot:title>
    <section class="bg-[#dfe6db]">
        <div id="booking-list" class="max-w-7xl mx-auto py-6 px-4">


            <!-- heder -->
            <div class="mb-10">
                <h2 class="text-4xl italic font-semibold font-serif text-teal-900 text-center mb-4">
                    Booking Information
                    </h1>
            </div>


            <!-- stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2 mb-2">
                <div class="bg-white p-5 rounded-xl shadow">
                    <p class="text-sm text-slate-500">Total Booking</p>
                    <p class="text-2xl font-bold">{{ $stats['total'] }}</p>
                </div>

                <div class="bg-white p-5 rounded-xl shadow">
                    <p class="text-sm text-slate-500">Pending</p>
                    <p class="text-2xl font-bold text-yellow-500">{{ $stats['pending'] }}</p>
                </div>

                <div class="bg-white p-5 rounded-xl shadow">
                    <p class="text-sm text-slate-500">Confirmed</p>
                    <p class="text-2xl font-bold text-green-600">{{ $stats['confirmed'] }}</p>
                </div>

                <div class="bg-white p-5 rounded-xl shadow">
                    <p class="text-sm text-slate-500">Cancelled</p>
                    <p class="text-2xl font-bold text-red-600">{{ $stats['cancelled'] }}</p>
                </div>

                <div class="bg-white p-5 rounded-xl shadow">
                    <p class="text-sm text-slate-500">Completed</p>
                    <p class="text-2xl font-bold text-blue-500">{{ $stats['completed'] }}</p>
                </div>
            </div>

            <!-- filter -->
            <div class="bg-white p-6 rounded-xl shadow mb-2">
                <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center">

                    <!-- search-->
                    <div class="md:col-span-2 relative group">
                        <!-- icon search-->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5
                   text-slate-400 group-focus-within:text-gray-500 transition">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
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


            </div>
            <!-- Alert Success -->
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- table -->
            <div class="bg-white rounded-xl shadow overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-[#6bbb97d7] text-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">User</th>
                            <th class="px-4 py-3 text-left">Court</th>
                            <th class="px-4 py-3 text-left">Date</th>
                            <th class="px-4 py-3 text-left">Time</th>
                            <th class="px-4 py-3 text-left">Amount</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Payment</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse($pemesanans as $pemesanan)
                            <tr>
                                <td class="px-4 py-3">#{{ $pemesanan->id }}</td>
                                <td class="px-4 py-3">
                                    <div class="font-semibold">{{ $pemesanan->user?->name }}</div>
                                    <div class="text-xs text-slate-500">
                                        {{ $pemesanan->user?->email }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-semibold">{{ $pemesanan->lapangan->nama_lapangan }}</div>
                                    <div class="text-xs text-slate-500">
                                        {{ $pemesanan->lapangan->lokasi ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($pemesanan->jadwal->date)->format('d M Y') }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $pemesanan->jadwal->start_time }} – {{ \Carbon\Carbon::parse($pemesanan->jadwal->start_time)->addHours($pemesanan->duration)->format('H:i') }}
                                </td>
                                <td class="px-4 py-3">Rp {{ number_format($pemesanan->total_price, 0, ',', '.') }}</td>
                                <td class="px-4 py-3">
                                    @if ($pemesanan->status === 'pending')
                                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                            Pending
                                        </span>
                                    @elseif($pemesanan->status === 'confirmed')
                                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                            Confirmed
                                        </span>
                                    @elseif($pemesanan->status === 'cancelled')
                                        <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                            Cancelled
                                        </span>
                                    @elseif($pemesanan->status === 'completed')
                                        <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                                            Completed
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($pemesanan->payment_status === 'paid')
                                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                            Paid
                                        </span>
                                    @elseif($pemesanan->payment_status === 'pending')
                                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                            Pending
                                        </span>
                                    @elseif($pemesanan->payment_status === 'unpaid')
                                        <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                            Unpaid
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-semibold">
                                    <a href="{{ route('pemesanan.show', $pemesanan->id) }}"
                                        class="text-blue-600 hover:underline">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-8 text-center text-slate-500">
                                    Tidak ada data booking
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            </d>
</x-layout>