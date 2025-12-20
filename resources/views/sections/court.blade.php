{{-- Our Courts Section --}}
<section id="court" class="bg-amber-50 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900">
                Our Padel Courts
            </h2>
            <p class="mt-2 text-slate-600">
                Lapangan pilihan dengan fasilitas terbaik
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <!-- CARD 1 -->
            <div class="rounded-3xl overflow-hidden bg-white shadow-md hover:shadow-xl transition group">

                <!-- Image -->
                <div class="relative h-52 bg-slate-200 overflow-hidden">

                    <!-- Badge -->
                    <span
                        class="absolute top-4 left-4
                               bg-teal-600 text-white
                               text-xs font-semibold
                               px-3 py-1 rounded-full z-10">
                        Indoor
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=800"
                        alt="Pasundan Court A"
                        class="w-full h-full object-cover
                               group-hover:scale-105
                               transition duration-500">
                </div>

                <!-- Content -->
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-slate-900">
                        Pasundan Court A
                    </h3>
                    <p class="text-slate-500 text-sm mb-4">
                        Bandung, Indonesia
                    </p>

                    <div class="flex flex-col items-center gap-4">
                        <span
                            class="bg-teal-100 text-teal-700
                                   px-4 py-1 rounded-full
                                   text-sm font-semibold">
                            Rp 250.000 / hr
                        </span>

                        <a href="{{ route('court.detail', 1) }}"
                            class="bg-teal-600 hover:bg-teal-500
                                   text-white px-6 py-2
                                   rounded-full text-sm
                                   font-semibold transition">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="rounded-3xl overflow-hidden bg-white shadow-md hover:shadow-xl transition group">

                <div class="relative h-52 bg-slate-200 overflow-hidden">
                    <span
                        class="absolute top-4 left-4
                               bg-emerald-600 text-white
                               text-xs font-semibold
                               px-3 py-1 rounded-full z-10">
                        Outdoor
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=800"
                        alt="Pasundan Court B"
                        class="w-full h-full object-cover
                               group-hover:scale-105
                               transition duration-500">
                </div>

                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-slate-900">
                        Pasundan Court B
                    </h3>
                    <p class="text-slate-500 text-sm mb-4">
                        Bandung, Indonesia
                    </p>

                    <div class="flex flex-col items-center gap-4">
                        <span
                            class="bg-teal-100 text-teal-700
                                   px-4 py-1 rounded-full
                                   text-sm font-semibold">
                            Rp 300.000 / hr
                        </span>

                        <a href="{{ route('court.detail', 1) }}"
                            class="bg-teal-600 hover:bg-teal-500
                                   text-white px-6 py-2
                                   rounded-full text-sm
                                   font-semibold transition">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
      <!-- CARD 1 -->
            <div class="rounded-3xl overflow-hidden bg-white shadow-md hover:shadow-xl transition group">

                <!-- Image -->
                <div class="relative h-52 bg-slate-200 overflow-hidden">

                    <!-- Badge -->
                    <span
                        class="absolute top-4 left-4
                               bg-teal-600 text-white
                               text-xs font-semibold
                               px-3 py-1 rounded-full z-10">
                        Indoor
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=800"
                        alt="Pasundan Court A"
                        class="w-full h-full object-cover
                               group-hover:scale-105
                               transition duration-500">
                </div>

                <!-- Content -->
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-slate-900">
                        Pasundan Court A
                    </h3>
                    <p class="text-slate-500 text-sm mb-4">
                        Bandung, Indonesia
                    </p>

                    <div class="flex flex-col items-center gap-4">
                        <span
                            class="bg-teal-100 text-teal-700
                                   px-4 py-1 rounded-full
                                   text-sm font-semibold">
                            Rp 250.000 / hr
                        </span>

                        <a href="/court"
                            class="bg-teal-600 hover:bg-teal-500
                                   text-white px-6 py-2
                                   rounded-full text-sm
                                   font-semibold transition">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

        </div>

         <!-- CTA -->
        <div class="text-center mt-12">
            <a href="/court"
               class="inline-flex items-center gap-2
                      bg-slate-900 hover:bg-slate-800
                      text-amber-50 px-10 py-3
                      rounded-full text-sm
                      font-semibold tracking-wide transition">
                View All Courts →
            </a>
        </div>
    </div>
</section>
