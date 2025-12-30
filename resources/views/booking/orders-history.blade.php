<x-layout>
    <x-slot:title>My Order</x-slot:title>

    <section class="max-w-6xl mx-auto mt-10 mb-10">

        <div class="mb-8">

            <h2 class="text-5xl italic font-semibold font-serif text-teal-900 mb-4">
                Order History
            </h2>

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

            <div class="flex gap-4 items-center">
                <div class="relative flex-1 md:flex-initial md:w-80">
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
                
              
                <button onclick="window.location.reload()" 
                    class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Refresh
                </button>
            </div>

        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

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
                                @if($pemesanan->status === 'cancelled') text-red-600
                                @elseif($pemesanan->payment_status === 'paid') text-green-600
                                @elseif($pemesanan->payment_status === 'pending' || $pemesanan->payment_status === 'unpaid') text-yellow-600
                                @elseif($pemesanan->payment_status === 'failed') text-red-600
                                @endif">
                                @if($pemesanan->status === 'cancelled')
                                    Cancelled
                                @elseif($pemesanan->payment_status === 'paid')
                                    PAID
                                @elseif($pemesanan->payment_status === 'pending' || $pemesanan->payment_status === 'unpaid')
                                    Pending
                                @elseif($pemesanan->payment_status === 'failed')
                                    Failed
                                @else
                                    {{ ucfirst($pemesanan->status) }}
                                @endif
                            </td>
                            <td class="px-6 py-4">Rp{{ number_format($pemesanan->total_price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex gap-2 justify-center">
                                    @if(($pemesanan->payment_status === 'pending' || $pemesanan->payment_status === 'unpaid') && $pemesanan->status !== 'cancelled')
                                        <a href="{{ route('pembayaran.checkout', $pemesanan->id) }}" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-xs font-semibold transition duration-200"
                                            title="Lanjutkan Pembayaran">
                                            <i class="fas fa-credit-card mr-1"></i> Bayar
                                        </a>
                                        
                                        <button onclick="refreshStatus({{ $pemesanan->id }})" 
                                            id="refresh-btn-{{ $pemesanan->id }}"
                                            class="p-2 border rounded hover:bg-green-50 focus:outline-none text-green-700"
                                            title="Refresh Status">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                            </svg>
                                        </button>

                                        <!-- Tombol Cancel -->
                                        <form action="{{ route('booking.cancel', $pemesanan->id) }}" method="POST" id="cancel-form-{{ $pemesanan->id }}" class="inline-block">
                                            @csrf
                                            <button type="button" 
                                                onclick="confirmCancel({{ $pemesanan->id }})"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-xs font-semibold transition duration-200 flex items-center gap-1"
                                                title="Cancel Booking">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                                Cancel
                                            </button>
                                        </form>

                                    @endif
                                    
                                    @if($pemesanan->payment_status === 'paid' && $pemesanan->status !== 'cancelled')
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
                                    @endif
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

    <script>
        function refreshStatus(pemesananId) {
            const btn = document.getElementById('refresh-btn-' + pemesananId);
            const svg = btn.querySelector('svg');
            
            svg.classList.add('animate-spin');
            btn.disabled = true;
            
            fetch(`/pembayaran/${pemesananId}/cek-status`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    svg.classList.remove('animate-spin');
                    btn.disabled = false;
                    
                    console.log('Status response:', data);
                    
                    if (data.payment_status === 'paid') {
                        window.location.reload();
                    } else if (data.payment_status === 'failed' || data.status === 'cancelled') {
                        window.location.reload();
                    } else {
                        alert('Status masih pending. Silakan tunggu beberapa saat dan coba lagi.');
                    }
                })
                .catch(error => {
                    svg.classList.remove('animate-spin');
                    btn.disabled = false;
                    console.error('Error:', error);
                    alert('Gagal memeriksa status: ' + error.message);
                });
        }

        function confirmCancel(pemesananId) {
            if (confirm('Are you sure you want to cancel this booking? This action cannot be undone.')) {
                document.getElementById('cancel-form-' + pemesananId).submit();
            }
        }
    </script>
</x-layout>
