<x-layout>
    <x-slot:title>Pembayaran Menunggu - PasundanPadel</x-slot:title>
<div class="min-h-screen bg-gradient-to-br from-yellow-50 to-orange-100 flex items-center justify-center py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-yellow-500 rounded-full">
                    <i class="fas fa-clock text-white text-5xl"></i>
                </div>
            </div>

            <h1 class="text-4xl font-bold text-gray-800 mb-4">Pembayaran Menunggu</h1>
            <p class="text-lg text-gray-600 mb-8">
                Pembayaran Anda sedang dalam proses. Silakan selesaikan pembayaran sesuai instruksi yang diberikan.
            </p>

            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Booking</h2>
                
                <div class="space-y-3 text-left">
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
                        <span class="text-gray-600">Total Pembayaran:</span>
                        <span class="font-semibold text-yellow-600">Rp {{ number_format($pemesanan->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="font-semibold text-yellow-600">
                            <i class="fas fa-hourglass-half mr-1"></i> Menunggu Pembayaran
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-8">
                <p class="text-yellow-800">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    Silakan selesaikan pembayaran Anda dalam 24 jam. Setelah itu booking akan otomatis dibatalkan.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('pembayaran.checkout', $pemesanan->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                    <i class="fas fa-redo mr-2"></i> Lanjutkan Pembayaran
                </a>
                
                <a href="{{ route('home') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                    <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                </a>
            </div>

            <div class="mt-8">
                <button id="cek-status" class="text-blue-600 hover:text-blue-800 underline">
                    <i class="fas fa-sync-alt mr-2" id="sync-icon"></i> Cek Status Pembayaran
                </button>
                <p class="text-sm text-gray-500 mt-2">
                    <i class="fas fa-info-circle mr-1"></i> Status akan dicek otomatis setiap 5 detik
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    let isChecking = false;

    function checkPaymentStatus() {
        if (isChecking) return;
        
        isChecking = true;
        const syncIcon = document.getElementById('sync-icon');
        syncIcon.classList.add('fa-spin');
        
        fetch("{{ route('pembayaran.cek-status', $pemesanan->id) }}")
            .then(response => response.json())
            .then(data => {
                if (data.payment_status === 'paid') {
                    window.location.href = "{{ route('pembayaran.sukses', $pemesanan->id) }}";
                } else if (data.payment_status === 'failed') {
                    window.location.href = "{{ route('pembayaran.gagal', $pemesanan->id) }}";
                } else {
                    syncIcon.classList.remove('fa-spin');
                    isChecking = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                syncIcon.classList.remove('fa-spin');
                isChecking = false;
            });
    }

    document.getElementById('cek-status').addEventListener('click', function() {
        checkPaymentStatus();
    });

    setInterval(function() {
        checkPaymentStatus();
    }, 30000); 
    
    setTimeout(function() {
        checkPaymentStatus();
    }, 2000);
</script>
</x-layout>
