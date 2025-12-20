{{-- Court List Page --}}
<x-layout>
    <x-slot:title>
        Pasundan Padel – Court List
    </x-slot:title>

    {{-- Alpine --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <section id="courtlist"
        class="bg-amber-50 min-h-screen"
        x-data="{ openFilter: false }">

        <div class="max-w-7xl mx-auto px-6 py-12">

            <!-- Page Title -->
            <h1 class="text-3xl text-center md:text-4xl font-bold text-slate-900 mb-10">
                Our Padel Courts
            </h1>

            <!-- Mobile Filter Button -->
            <div class="md:hidden mb-6">
                <button
                    @click="openFilter = !openFilter"
                    class="w-full bg-teal-700 text-white py-3 rounded-full
                           font-semibold flex items-center justify-center gap-2">
                    <span x-text="openFilter ? 'Hide Filters' : 'Show Filters'"></span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 min-h-[calc(100vh-160px)]">

                <!-- ================= FILTER SIDEBAR ================= -->
                <aside
                    x-show="openFilter || window.innerWidth >= 768"
                    x-transition
                    @click.outside="openFilter = false"
                    class="md:col-span-1
                           md:sticky md:top-16 md:-mt-24
                           bg-teal-900/90 backdrop-blur
                           rounded-3xl p-6 text-white shadow-lg
                           min-h-[calc(100vh-220px)]
                           md:block">

                    <h2 class="text-xl font-semibold mb-6">Filters</h2>

                    <!-- Date -->
                    <div class="mb-6">
                        <label class="block text-sm mb-2 text-white/80">
                            Date
                        </label>
                        <input type="date"
                            class="w-full px-4 py-2 rounded-xl bg-white text-slate-900
                                   focus:outline-none focus:ring-2 focus:ring-teal-400">
                    </div>

                    <!-- Price -->
                    <div class="mb-6">
                        <label class="block text-sm mb-3 text-white/80">
                            Price per Hour
                        </label>
                        <input type="range" class="w-full accent-teal-400">
                        <div class="flex justify-between text-xs mt-2 text-white/70">
                            <span>Rp 250.000</span>
                            <span>Rp 1.500.000</span>
                        </div>
                    </div>

                    <!-- Environment -->
                    <div class="mb-8">
                        <label class="block text-sm mb-3 text-white/80">
                            Environment
                        </label>
                        <div class="flex gap-4 text-sm">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="accent-teal-400">
                                Indoor
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="accent-teal-400">
                                Outdoor
                            </label>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="space-y-3">
                        <button
                            @click="openFilter = false"
                            class="w-full bg-teal-500 hover:bg-teal-400
                                   text-slate-900 py-3 rounded-full
                                   font-semibold transition">
                            Apply Filters
                        </button>

                        <button
                            class="w-full border border-white/40
                                   hover:bg-white/10 py-3
                                   rounded-full font-semibold transition">
                            Reset Filters
                        </button>
                    </div>

                    <p class="text-xs text-white/40 mt-10 text-center">
                        Adjust filters to find your perfect court
                    </p>
                </aside>

                <!-- ================= COURT LIST ================= -->
                <div class="md:col-span-3">

                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8
                               max-h-[calc(100vh-200px)] overflow-y-auto pr-2">

                        @foreach ([
                            'Pasundan Court A',
                            'Pasundan Court B',
                            'Pasundan Court C',
                            'Pasundan Court D',
                            'Pasundan Court E',
                            'Pasundan Court F'
                        ] as $court)
                            <div
                                class="relative rounded-3xl overflow-hidden
                                       bg-white shadow-md hover:shadow-xl
                                       transition group">

                                <!-- Image -->
                                <div class="h-52 bg-slate-200 overflow-hidden">

                                    <!-- Badge -->
                                    <span
                                        class="absolute top-4 left-4
                                               bg-teal-600 text-white
                                               font-semibold px-2.5 py-1
                                               text-[11px] rounded-full z-10">
                                        Outdoor
                                    </span>

                                    <img
                                        src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=800"
                                        alt="{{ $court }}"
                                        class="w-full h-full object-cover
                                               group-hover:scale-105
                                               transition duration-500">
                                </div>

                                <!-- Content -->
                                <div class="p-6 text-center">
                                    <h3 class="text-lg font-semibold text-slate-900">
                                        {{ $court }}
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
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
</x-layout>
