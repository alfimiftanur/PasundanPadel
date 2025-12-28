<x-layout>
    <x-slot:title>Checkout Pembayaran - PasundanPadel</x-slot:title>
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Checkout Pembayaran</h1>
                <p class="text-gray-600">Selesaikan pembayaran untuk konfirmasi booking Anda</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Pemesanan</h2>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Order ID:</span>
                        <span class="font-semibold">{{ $pemesanan->order_id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Lapangan:</span>
                        <span class="font-semibold">{{ $pemesanan->lapangan->nama_lapangan }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tanggal:</span>
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($pemesanan->jadwal->date)->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Waktu:</span>
                        <span class="font-semibold">{{ $pemesanan->jadwal->start_time }} - {{ \Carbon\Carbon::parse($pemesanan->jadwal->start_time)->addHours($pemesanan->duration)->format('H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Durasi:</span>
                        <span class="font-semibold">{{ $pemesanan->duration }} Jam</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nama:</span>
                        <span class="font-semibold">{{ $pemesanan->customer_name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Email:</span>
                        <span class="font-semibold">{{ $pemesanan->customer_email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Telepon:</span>
                        <span class="font-semibold">{{ $pemesanan->customer_phone }}</span>
                    </div>
                    
                    @if($pemesanan->notes)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Catatan:</span>
                        <span class="font-semibold">{{ $pemesanan->notes }}</span>
                    </div>
                    @endif

                    <hr class="my-4">

                    <div class="flex justify-between text-lg">
                        <span class="font-bold text-gray-800">Total Pembayaran:</span>
                        <span class="font-bold text-blue-600">Rp {{ number_format($pemesanan->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button id="pay-button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                    <i class="fas fa-credit-card mr-2"></i> Bayar Sekarang
                </button>
                
                <p class="text-gray-500 text-sm mt-4">
                    Dengan melakukan pembayaran, Anda menyetujui syarat dan ketentuan yang berlaku
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
