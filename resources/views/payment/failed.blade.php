@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 to-rose-100 flex items-center justify-center py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-red-500 rounded-full">
                    <i class="fas fa-times text-white text-5xl"></i>
                </div>
            </div>

            <h1 class="text-4xl font-bold text-gray-800 mb-4">Pembayaran Gagal</h1>
            <p class="text-lg text-gray-600 mb-8">
                Maaf, pembayaran Anda tidak dapat diproses. Silakan coba lagi atau hubungi customer service.
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
                        <span class="font-semibold text-red-600">Rp {{ number_format($pemesanan->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="font-semibold text-red-600">
                            <i class="fas fa-times-circle mr-1"></i> Pembayaran Gagal
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8">
                <div class="text-left">
                    <p class="text-red-800 font-semibold mb-2">
                        <i class="fas fa-info-circle mr-2"></i> Kemungkinan Penyebab:
                    </p>
                    <ul class="text-red-700 text-sm space-y-1 ml-8 list-disc">
                        <li>Saldo tidak mencukupi</li>
                        <li>Pembayaran dibatalkan</li>
                        <li>Kartu ditolak oleh bank</li>
                        <li>Waktu pembayaran habis</li>
                        <li>Koneksi terputus</li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('pembayaran.checkout', $pemesanan->id) }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                    <i class="fas fa-redo mr-2"></i> Coba Bayar Lagi
                </a>
                
                <a href="{{ route('home') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                    <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                </a>
            </div>

            <div class="mt-8 text-gray-600">
                <p>Butuh bantuan?</p>
                <p class="mt-2">
                    <i class="fas fa-phone mr-2"></i> Hubungi Customer Service: 
                    <a href="tel:+628123456789" class="text-blue-600 hover:underline">+62 812-3456-789</a>
                </p>
                <p class="mt-1">
                    <i class="fas fa-envelope mr-2"></i> Email: 
                    <a href="mailto:support@pasundanpadel.com" class="text-blue-600 hover:underline">support@pasundanpadel.com</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
