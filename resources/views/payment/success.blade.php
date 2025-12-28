<x-layout>
    <x-slot:title>Pembayaran Berhasil - PasundanPadel</x-slot:title>
<div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 flex items-center justify-center py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-green-500 rounded-full">
                    <i class="fas fa-check text-white text-5xl"></i>
                </div>
            </div>

            <h1 class="text-4xl font-bold text-gray-800 mb-4">Pembayaran Berhasil!</h1>
            <p class="text-lg text-gray-600 mb-8">
                Terima kasih, pembayaran Anda telah berhasil diproses dan booking Anda sudah dikonfirmasi.
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
                        <span class="text-gray-600">Durasi:</span>
                        <span class="font-semibold">{{ $pemesanan->duration }} Jam</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Dibayar:</span>
                        <span class="font-semibold text-green-600">Rp {{ number_format($pemesanan->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Metode Pembayaran:</span>
                        <span class="font-semibold">{{ ucfirst($pemesanan->payment_method ?? 'N/A') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Waktu Pembayaran:</span>
                        <span class="font-semibold">{{ $pemesanan->paid_at ? $pemesanan->paid_at->format('d M Y H:i') : 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="font-semibold text-green-600">
                            <i class="fas fa-check-circle mr-1"></i> Terkonfirmasi
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-8">
                <p class="text-blue-800">
                    <i class="fas fa-info-circle mr-2"></i>
                    Konfirmasi booking telah dikirim ke email <strong>{{ $pemesanan->customer_email }}</strong>
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                    <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                </a>
                
                @auth
                <a href="{{ route('booking.orders-history') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                    <i class="fas fa-history mr-2"></i> Lihat Riwayat Booking
                </a>
                @endauth
            </div>
        </div>
    </div>
</div>
</x-layout>
