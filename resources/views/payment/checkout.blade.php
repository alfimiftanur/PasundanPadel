<x-layout>
    <x-slot:title>Payment Checkout - PasundanPadel</x-slot:title>
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Payment Checkout</h1>
                <p class="text-gray-600">Complete the payment to confirm your booking.</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Details</h2>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Order ID:</span>
                        <span class="font-semibold">{{ $pemesanan->order_id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Court:</span>
                        <span class="font-semibold">{{ $pemesanan->lapangan->nama_lapangan }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date:</span>
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($pemesanan->jadwal->date)->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Time:</span>
                        <span class="font-semibold">{{ $pemesanan->jadwal->start_time }} - {{ \Carbon\Carbon::parse($pemesanan->jadwal->start_time)->addHours($pemesanan->duration)->format('H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Duration:</span>
                        <span class="font-semibold">{{ $pemesanan->duration }} Hour</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Name:</span>
                        <span class="font-semibold">{{ $pemesanan->customer_name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Email:</span>
                        <span class="font-semibold">{{ $pemesanan->customer_email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">No Handphone:</span>
                        <span class="font-semibold">{{ $pemesanan->customer_phone }}</span>
                    </div>
                    
                    @if($pemesanan->notes)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Notes:</span>
                        <span class="font-semibold">{{ $pemesanan->notes }}</span>
                    </div>
                    @endif

                    <hr class="my-4">

                    <div class="flex justify-between text-lg">
                        <span class="font-bold text-gray-800">Total payment:</span>
                        <span class="font-bold text-blue-600">Rp {{ number_format($pemesanan->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button id="pay-button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <i class="fas fa-credit-card mr-2"></i> Pay Now
                </button>
                
                <p class="text-gray-500 text-sm mt-4">
                    By making a payment, you agree to the applicable terms and conditions.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ $clientKey }}"></script>

<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log('Pembayaran berhasil:', result);
                window.location.href = "{{ route('pembayaran.sukses', $pemesanan->id) }}";
            },
            onPending: function(result) {
                console.log('Pembayaran pending:', result);
                window.location.href = "{{ route('pembayaran.pending', $pemesanan->id) }}";
            },
            onError: function(result) {
                console.log('Pembayaran error:', result);
                window.location.href = "{{ route('pembayaran.gagal', $pemesanan->id) }}";
            },
            onClose: function() {
                alert('Anda menutup pembayaran tanpa menyelesaikannya. Silakan coba lagi.');
            }
        });
    });
</script>
</x-layout>
