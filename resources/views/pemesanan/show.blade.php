<x-layout>
    <x-slot:title>Detail Booking</x-slot:title>

    <section class="bg-[#dfe6db]">
        <div id="detail-booking" class="max-w-7xl mx-auto px-6 py-8">

            <a href="{{ route('pemesanan.index') }}" class="text-slate-600 hover:underline flex items-center gap-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 bg-white rounded-2xl shadow overflow-hidden">

                    <div class="bg-[#6bbb97d7] text-white p-6 flex justify-between items-center">
                        <div>
                            <h1 class="text-xl font-bold">
                                Detail Booking #{{ $pemesanan->id }}
                            </h1>
                            <p class="text-sm opacity-90">
                                {{ $pemesanan->created_at->format('d M Y H:i') }}
                            </p>
                        </div>

                        <span
                            class="px-4 py-1 rounded-full text-sm font-semibold 
                        @if ($pemesanan->status === 'pending') bg-yellow-400 text-yellow-900
                        @elseif($pemesanan->status === 'confirmed') bg-green-400 text-green-900
                        @elseif($pemesanan->status === 'cancelled') bg-red-400 text-red-900
                        @elseif($pemesanan->status === 'completed') bg-blue-400 text-blue-900 @endif">
                            {{ ucfirst($pemesanan->status) }}
                        </span>
                    </div>

                    <div class="p-6 space-y-2">

                        <div>
                            <h2 class="font-semibold text-lg flex items-center gap-2 mb-3">
                                Customer Information
                            </h2>

                            <div class="bg-slate-50 rounded-xl p-4 space-y-3">
                                <div>
                                    <p class="text-sm text-slate-500">Name</p>
                                    <p class="font-semibold">{{ $pemesanan->customer_name }}</p>
                                    <p class="font-semibold">{{ $pemesanan->user?->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500">Email</p>
                                    <p class="font-semibold">{{ $pemesanan->customer_email }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-500">Phone</p>
                                    <p class="font-semibold">{{ $pemesanan->customer_phone }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <h2 class="font-semibold text-lg flex items-center gap-2 mb-3">
                                    Court
                                </h2>

                                <div class="bg-slate-50 rounded-xl p-4 space-y-2">
                                    <p class="font-semibold">{{ $pemesanan->lapangan->nama_lapangan }}</p>

                                    <span
                                        class="inline-block px-3 py-1 text-xs rounded-full 
                                    @if ($pemesanan->lapangan->jenis_lapangan === 'indoor') bg-emerald-100 text-emerald-700
                                    @else bg-blue-100 text-blue-700 @endif">
                                        {{ ucfirst($pemesanan->lapangan->jenis_lapangan) }}
                                    </span>

                                    <p class="text-sm text-slate-600">
                                        {{ $pemesanan->lapangan->lokasi ?? 'Hall 3' }}
                                    </p>
                                </div>
                            </div>

                            <div>
                                <h2 class="font-semibold text-lg flex items-center gap-2 mb-3">
                                    Schedule
                                </h2>

                                <div class="bg-slate-50 rounded-xl p-4 space-y-2">
                                    <p>
                                        <span class="text-slate-500 text-sm">Date</span><br>
                                        <span
                                            class="font-semibold">{{ \Carbon\Carbon::parse($pemesanan->jadwal->date)->format('d F Y') }}</span>
                                    </p>

                                    <p>
                                        <span class="text-slate-500 text-sm">Time</span><br>
                                        <span class="font-semibold">
                                            {{ $pemesanan->jadwal->start_time }} –
                                            {{ \Carbon\Carbon::parse($pemesanan->jadwal->start_time)->addHours($pemesanan->duration)->format('H:i') }}
                                            WIB
                                        </span>
                                    </p>


                                    <p>
                                        <span class="text-slate-500 text-sm">Duration</span><br>
                                        <span class="font-semibold">{{ $pemesanan->duration }}
                                            {{ $pemesanan->duration > 1 ? 'Hours' : 'Hour' }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h2 class="font-semibold text-lg flex items-center gap-2 mb-3">
                                Pembayaran
                            </h2>

                            <div class="bg-slate-50 rounded-xl p-4 space-y-3">
                                <div class="flex justify-between">
                                    <span>Price/hour</span>
                                    <span class="font-semibold">Rp
                                        {{ number_format($pemesanan->total_price / $pemesanan->duration, 0, ',', '.') }}</span>
                                </div>

                                <div class="flex justify-between">
                                    <span>Duration</span>
                                    <span class="font-semibold">{{ $pemesanan->duration }}
                                        {{ $pemesanan->duration > 1 ? 'hours' : 'hour' }}</span>
                                </div>

                                <hr>

                                <div class="flex justify-between text-lg font-bold">
                                    <span>Total</span>
                                    <span
                                        class="text-blue-600">Rp{{ number_format($pemesanan->total_price, 0, ',', '.') }}</span>
                                </div>

                                <div class="flex justify-between items-center pt-2">
                                    <span>Payment Status</span>
                                    <span
                                        class="px-3 py-1 text-xs rounded-full 
                                    @if ($pemesanan->status === 'cancelled') bg-red-100 text-red-700
                                    @elseif($pemesanan->payment_status === 'paid') bg-green-100 text-green-700
                                    @elseif($pemesanan->payment_status === 'pending') bg-yellow-100 text-yellow-700
                                    @else bg-gray-100 text-gray-700 @endif">
                                        @if ($pemesanan->status === 'cancelled')
                                            Cancelled
                                        @else
                                            {{ ucfirst($pemesanan->payment_status) }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if($pemesanan->status !== 'cancelled')
                        <div class="pt-4">
                            <form action="{{ route('booking.cancel', $pemesanan->id) }}" method="POST" id="cancel-form-admin" class="inline-block">
                                @csrf
                                <button type="button" 
                                    onclick="confirmCancelAdmin()"
                                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-200 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                    Cancel Booking
                                </button>
                            </form>
                        </div>
                        @else
                        <div class="pt-4">
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded">
                                <p class="text-red-700 font-semibold">This booking has been cancelled</p>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6 h-fit">
                    <h3 class="font-bold text-yellow-800 mb-2">
                        No Evidence Yet
                    </h3>
                    <p class="text-sm text-yellow-700">
                        Customer has not uploaded proof of payment.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <script>
        function confirmCancelAdmin() {
            if (confirm('Are you sure you want to cancel this booking? The status will be changed to "Cancelled" and the schedule will be available again.')) {
                document.getElementById('cancel-form-admin').submit();
            }
        }
    </script>
</x-layout>