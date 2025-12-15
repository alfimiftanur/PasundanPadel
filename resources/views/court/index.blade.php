{{-- ini buat page court list --}}
<x-layout>
    <x-slot:title>
        Pasundan Padel - Court List
    </x-slot:title>

    <section id="courtlist" class="bg-amber-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 py-10">

            <!-- Page Title -->
            <h1 class="text-3xl font-bold text-slate-900 mb-8">
                Ours Padel Courts
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

                <!-- FILTER SIDEBAR -->
                <aside
                    class="md:col-span-1 bg-teal-900/90 backdrop-blur
                           rounded-3xl p-6 text-white shadow-lg">

                    <h2 class="text-xl font-semibold mb-6">Filters</h2>

                    <!-- Date -->
                    <div class="mb-6">
                        <label class="block text-sm mb-2 text-white/80">Date</label>
                        <input type="date"
                            class="w-full px-4 py-2 rounded-xl bg-white/90
                                   text-slate-900 focus:outline-none
                                   focus:ring-2 focus:ring-teal-400">
                    </div>

                    <!-- Price -->
                    <div class="mb-6">
                        <label class="block text-sm mb-3 text-white/80">
                            Price per Hour
                        </label>
                        <input type="range" class="w-full accent-teal-400">
                        <div class="flex justify-between text-xs mt-2 text-white/70">
                            <span>Rp 50.000</span>
                            <span>Rp 500.000</span>
                        </div>
                    </div>

                    <!-- Environment -->
                    <div class="mb-6">
                        <label class="block text-sm mb-3 text-white/80">
                            Environment
                        </label>
                        <div class="flex gap-3 text-sm">
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
                </aside>

                <!-- COURT LIST -->
                <div class="md:col-span-3">

                    <!-- 1 CARD COURT -->
                    <div
                        class="relative rounded-3xl overflow-hidden
                               bg-white shadow-lg hover:shadow-xl
                               transition group max-w-sm">

                        <!-- Image -->
                        <div class="h-56 bg-slate-200">
                            <img
                                src="https://images.unsplash.com/photo-1604014237744-1b4d2b0d1c07"
                                alt="Pasundan Court A"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-900">
                                Pasundan Court A
                            </h3>
                            <p class="text-slate-500 text-sm mb-4">
                                Bandung, Indonesia
                            </p>

                            <div class="flex items-center justify-between">
                                <span
                                    class="inline-block bg-teal-100 text-teal-700
                                           px-4 py-1 rounded-full text-sm font-semibold">
                                    Rp 250.000 / hr
                                </span>

                                <button
                                    class="bg-teal-600 hover:bg-teal-500
                                           text-white px-5 py-2
                                           rounded-full font-semibold transition">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</x-layout>
