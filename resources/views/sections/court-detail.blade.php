{{-- Court Detail Page --}}
<section id="court-detail" class="bg-slate-50 py-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- LEFT CONTENT --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Breadcrumb --}}
            <nav class="text-sm text-slate-500">
                <a href="/" class="hover:text-teal-600">Beranda</a> /
                <a href="/court" class="hover:text-teal-600">Lapangan</a> /
                <span class="text-slate-700 font-medium">Padel Arena Bandung</span>
            </nav>

            {{-- Image --}}
            <div class="rounded-3xl overflow-hidden shadow">
                <img src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=1200"
                     alt="Padel Arena Bandung"
                     class="w-full h-[420px] object-cover">
            </div>

            {{-- Title & Rating --}}
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Padel Arena Bandung</h1>
                    <p class="text-slate-500 mt-1 flex items-center gap-2">
                        <span>📍 Bandung </span>
                        <span class="px-2 py-0.5 bg-teal-100 text-teal-700 rounded-full text-xs">Indoor</span>
                    </p>
                </div>
                <div class="text-right">
                    <div class="flex items-center gap-1 text-amber-400">
                        ★ ★ ★ ★ ★
                    </div>
                    <p class="text-sm text-slate-500">4.8 (124 ulasan)</p>
                </div>
            </div>

            {{-- Description --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h2 class="font-semibold text-lg mb-2">Deskripsi</h2>
                <p class="text-slate-600 leading-relaxed">
                    Lapangan padel indoor berkualitas tinggi dengan sistem pencahayaan modern
                    dan permukaan lantai profesional. Cocok untuk pemula hingga atlet profesional.
                </p>
            </div>

            {{-- Facilities --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h2 class="font-semibold text-lg mb-4">Fasilitas</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-slate-600">
                    <span>✔ WiFi Gratis</span>
                    <span>✔ Parkir Luas</span>
                    <span>✔ Kamar Mandi</span>
                    <span>✔ Locker</span>
                    <span>✔ Cafe</span>
                    <span>✔ AC</span>
                </div>
            </div>

            {{-- Reviews --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h2 class="font-semibold text-lg mb-4">Ulasan Pelanggan</h2>

                @foreach ([1,2,3] as $user)
                <div class="border-b last:border-none py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-slate-200"></div>
                        <div>
                            <p class="font-medium">Pengguna {{ $user }}</p>
                            <div class="text-amber-400 text-sm">★ ★ ★ ★ ★</div>
                        </div>
                        <span class="ml-auto text-xs text-slate-400">2 hari lalu</span>
                    </div>
                    <p class="mt-2 text-slate-600">
                        Lapangan sangat bagus dan bersih. Fasilitas lengkap dan pelayanannya ramah.
                        Recommended!
                    </p>
                </div>
                @endforeach

                <a href="#" class="inline-block mt-4 text-teal-600 font-medium">
                    Lihat Semua Ulasan →
                </a>
            </div>
        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="space-y-6">

            {{-- Price Card --}}
            <div class="bg-white rounded-3xl p-6 shadow-lg sticky top-24">
                <div class="text-center">
                    <p class="text-3xl font-bold text-teal-600">Rp 150.000</p>
                    <p class="text-slate-500">per jam</p>
                </div>

                {{-- Weather --}}
                <div class="mt-6 bg-slate-50 rounded-2xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Cuaca Hari Ini</p>
                        <p class="text-xl font-semibold">28°C</p>
                        <p class="text-slate-500 text-sm">Cerah Berawan</p>
                    </div>
                    <span class="text-3xl">☀️</span>
                </div>

                {{-- Buttons --}}
                <div class="mt-6 space-y-3">
                    <a href="{{ route('booking.create', 1) }}"
                       class="block text-center bg-teal-600 hover:bg-teal-500
                              text-white py-3 rounded-full font-semibold transition">
                        Booking Sekarang
                    </a>

                    <a href="#"
                       class="block text-center border border-teal-600
                              text-teal-600 py-3 rounded-full font-semibold hover:bg-teal-50 transition">
                        Lihat Jadwal Lengkap
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>