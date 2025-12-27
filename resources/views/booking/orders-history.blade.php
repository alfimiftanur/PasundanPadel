<x-layout>
    <x-slot:title>My Order</x-slot:title>

    <section class="max-w-6xl mx-auto mt-10 mb-10">

        <!-- header -->
        <div class="mb-8">

            <!-- title -->
            <h2 class="text-5xl italic font-semibold font-serif text-teal-900 mb-4">
                Order History
            </h2>

            <!-- tabs -->
            <div class="flex gap-8 text-sm font-medium border-b mb-6">
                <button class="pb-3 border-b-2 border-teal-600 text-teal-600">
                    All Order
                </button>
                <button class="pb-3 text-gray-500 hover:text-gray-700">
                    Upcoming
                </button>
                <button class="pb-3 text-gray-500 hover:text-gray-700">
                    Completed
                </button>
                <button class="pb-3 text-gray-500 hover:text-gray-700">
                    Cancelled
                </button>
            </div>

            <!-- Search -->
            <div class="relative w-full md:w-80">
                <input type="text" placeholder="Search..."
                    class="w-full rounded-full border px-10 py-2 text-sm
                   focus:outline-none focus:ring-2 focus:ring-teal-500">

                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>
            </div>

        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- table -->
        <div class="bg-white rounded-xl border shadow-sm overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-teal-500 text-slate-700">
                    <tr>
                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Date</th>
                        <th class="px-6 py-4 text-left">Time</th>
                        <th class="px-6 py-4 text-left">Court</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Amount</th>
                        <th class="px-6 py-4 text-center">Invoice</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($pemesanans as $pemesanan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-teal-600">
                                {{ str_pad($pemesanan->id, 3, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pemesanan->jadwal->date)->format('Y-m-d') }}</td>
                            <td class="px-6 py-4">{{ $pemesanan->jadwal->start_time }} - {{ $pemesanan->jadwal->end_time }}</td>
                            <td class="px-6 py-4">{{ $pemesanan->lapangan->nama_lapangan }}</td>
                            <td class="px-6 py-4 font-medium
                                @if($pemesanan->status === 'pending') text-yellow-600
                                @elseif($pemesanan->status === 'confirmed') text-green-600
                                @elseif($pemesanan->status === 'completed') text-green-600
                                @elseif($pemesanan->status === 'cancelled') text-red-600
                                @endif">
                                {{ ucfirst($pemesanan->status) }}
                            </td>
                            <td class="px-6 py-4">Rp{{ number_format($pemesanan->total_price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-center">
                                <div x-data="{ open: false }" class="relative inline-block">
                                    <button @click="open = !open"
                                        class="p-2 border rounded hover:bg-gray-100 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </button>

                                    <div x-show="open" x-transition @click.outside="open = false"
                                        class="absolute right-0 mt-2 w-36 bg-white border rounded-lg shadow-lg z-[9999]">
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 text-left">
                                            Export PDF
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <p class="mb-4">Belum ada riwayat booking</p>
                                <a href="{{ route('user.schedule') }}" 
                                   class="inline-block bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-200">
                                    Booking Sekarang
                                </a>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </section>
</x-layout>
