<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div id="detail-booking" class=" bg-[#dfe6db] max-w-7xl mx-auto px-6 py-8">

        <!-- back -->
        <a href="/booking-list"
            class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
            List Booking
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- main class -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow overflow-hidden">

                <!-- header -->
                <div class="bg-[#489dc5d7] text-white p-6 flex justify-between items-center">
                    <div>
                        <h1 class="text-xl font-bold">
                            Detail Booking #ID
                        </h1>
                        <p class="text-sm opacity-90">
                            23 Dec 2025 14:45
                        </p>
                    </div>

                    <span
                        class="px-4 py-1 rounded-full text-sm font-semibold bg-yellow-400 text-yellow-900">
                        Pending
                    </span>
                </div>

                <!-- content -->
                <div class="p-6 space-y-8">

                    <!-- customer -->
                    <div>
                        <h2 class="font-semibold text-lg flex items-center gap-2 mb-3">
                            Informasi Customer
                        </h2>

                        <div class="bg-slate-50 rounded-xl p-4 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-slate-500">Nama</p>
                                <p class="font-semibold">User Demo</p>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500">Email</p>
                                <p class="font-semibold">user@padelcourt.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- lapang n jadwal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- lapangan -->
                        <div>
                            <h2 class="font-semibold text-lg flex items-center gap-2 mb-3">
                                Lapangan
                            </h2>

                            <div class="bg-slate-50 rounded-xl p-4 space-y-2">
                                <p class="font-semibold">Padel Court A</p>

                                <span
                                    class="inline-block px-3 py-1 text-xs rounded-full bg-emerald-100 text-emerald-700">
                                    Indoor
                                </span>

                                <p class="text-sm text-slate-600">
                                    Jakarta Selatan
                                </p>
                            </div>
                        </div>

                        <!-- jadwal -->
                        <div>
                            <h2 class="font-semibold text-lg flex items-center gap-2 mb-3">
                                Jadwal
                            </h2>

                            <div class="bg-slate-50 rounded-xl p-4 space-y-2">
                                <p>
                                    <span class="text-slate-500 text-sm">Tanggal</span><br>
                                    <span class="font-semibold">24 December 2025</span>
                                </p>

                                <p>
                                    <span class="text-slate-500 text-sm">Waktu</span><br>
                                    <span class="font-semibold">15:00 – 16:00 WIB</span>
                                </p>

                                <p>
                                    <span class="text-slate-500 text-sm">Durasi</span><br>
                                    <span class="font-semibold">1 Jam</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- payment -->
                    <div>
                        <h2 class="font-semibold text-lg flex items-center gap-2 mb-3">
                            Pembayaran
                        </h2>

                        <div class="bg-slate-50 rounded-xl p-4 space-y-3">
                            <div class="flex justify-between">
                                <span>Harga per Jam</span>
                                <span class="font-semibold">Rp 150.000</span>
                            </div>

                            <div class="flex justify-between">
                                <span>Durasi</span>
                                <span class="font-semibold">1 Jam</span>
                            </div>

                            <hr>

                            <div class="flex justify-between text-lg font-bold">
                                <span>Total</span>
                                <span class="text-blue-600">Rp 150.000</span>
                            </div>

                            <div class="flex justify-between items-center pt-2">
                                <span>Status Pembayaran</span>
                                <span
                                    class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- proof -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6 h-fit">
                <h3 class="font-bold text-yellow-800 mb-2">
                    Belum Ada Bukti
                </h3>
                <p class="text-sm text-yellow-700">
                    Customer belum upload bukti pembayaran.
                </p>
            </div>

        </div>
    </div>
</x-layout>
