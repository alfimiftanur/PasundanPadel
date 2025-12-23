{{-- Our Courts Section --}}
<section id="court" class="bg-amber-50 py-12 md:py-14">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center mb-8">
            <h2 class="italic text-3xl md:text-4xl font-bold text-slate-900">
                Explore Our Courts
            </h2>
            <p class="mt-2 italic text-slate-600 text-sm md:text-base">
                Every court is built to support your best performance.
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">

            <!-- CARD -->
            <div class="rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-lg transition group">

                <!-- Image -->
                <div class="relative h-44 bg-slate-200 overflow-hidden">

                    <span
                        class="absolute top-3 left-3
                               bg-teal-600 text-white
                               text-[11px] font-semibold
                               px-3 py-0.5 rounded-full z-10">
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
                <div class="p-5 text-center">
                    <h3 class="text-base font-semibold text-slate-900">
                        Pasundan Court A
                    </h3>
                    <p class="text-slate-500 text-sm mb-3">
                        Bandung, Indonesia
                    </p>

                    <div class="flex flex-col items-center gap-3">
                        <span
                            class="bg-teal-100 text-teal-700
                                   px-4 py-1 rounded-full
                                   text-sm font-semibold">
                            Rp 250.000 / hr
                        </span>

                        <a href="{{ route('court.detail', 1) }}"
                            class="bg-teal-600 hover:bg-teal-500
                                   text-white px-5 py-2
                                   rounded-full text-sm
                                   font-semibold transition">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-lg transition group">
                <div class="relative h-44 bg-slate-200 overflow-hidden">
                    <span
                        class="absolute top-3 left-3
                               bg-emerald-600 text-white
                               text-[11px] font-semibold
                               px-3 py-0.5 rounded-full z-10">
                        Outdoor
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=800"
                        alt="Pasundan Court B"
                        class="w-full h-full object-cover
                               group-hover:scale-105
                               transition duration-500">
                </div>

                <div class="p-5 text-center">
                    <h3 class="text-base font-semibold text-slate-900">
                        Pasundan Court B
                    </h3>
                    <p class="text-slate-500 text-sm mb-3">
                        Bandung, Indonesia
                    </p>

                    <div class="flex flex-col items-center gap-3">
                        <span
                            class="bg-teal-100 text-teal-700
                                   px-4 py-1 rounded-full
                                   text-sm font-semibold">
                            Rp 300.000 / hr
                        </span>

                        <a href="/court"
                            class="bg-teal-600 hover:bg-teal-500
                                   text-white px-5 py-2
                                   rounded-full text-sm
                                   font-semibold transition">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-lg transition group">
                <div class="relative h-44 bg-slate-200 overflow-hidden">
                    <span
                        class="absolute top-3 left-3
                               bg-teal-600 text-white
                               text-[11px] font-semibold
                               px-3 py-0.5 rounded-full z-10">
                        Indoor
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=800"
                        alt="Pasundan Court A"
                        class="w-full h-full object-cover
                               group-hover:scale-105
                               transition duration-500">
                </div>

                <div class="p-5 text-center">
                    <h3 class="text-base font-semibold text-slate-900">
                        Pasundan Court C
                    </h3>
                    <p class="text-slate-500 text-sm mb-3">
                        Bandung, Indonesia
                    </p>

                    <div class="flex flex-col items-center gap-3">
                        <span
                            class="bg-teal-100 text-teal-700
                                   px-4 py-1 rounded-full
                                   text-sm font-semibold">
                            Rp 250.000 / hr
                        </span>

                        <a href="/court"
                            class="bg-teal-600 hover:bg-teal-500
                                   text-white px-5 py-2
                                   rounded-full text-sm
                                   font-semibold transition">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="flex justify-center mt-8">
            <a href="/court"
                class="inline-block text-sm uppercase tracking-wide
                       border-b border-slate-900 pb-1">
                View All Courts
            </a>
        </div>

    </div>
</section>
