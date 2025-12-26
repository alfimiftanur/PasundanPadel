{{-- Our Courts Section --}}
<section id="court" class="bg-amber-50 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center mb-10">
           <h4 class="italic font-serif text-teal-900 text-4xl mb-4">Explore Our Courts</h4>
            <p class="mt-2 text-slate-600">
                Every court is built to support your best performance.
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($lapangans as $lapangan)
                <!-- CARD -->
                <div class="rounded-3xl overflow-hidden bg-white shadow-md hover:shadow-xl transition group">

                    <!-- Image -->
                    <div class="relative h-52 bg-slate-200 overflow-hidden">

                        <!-- Badge -->
                        <span
                            class="absolute top-4 left-4
                                   @if ($lapangan->tipe_lapangan === 'Indoor') bg-teal-600 @else bg-emerald-600 @endif
                                   text-white
                                   text-xs font-semibold
                                   px-3 py-1 rounded-full z-10">
                            {{ $lapangan->tipe_lapangan }}
                        </span>

                        @if ($lapangan->foto)
                            <img
                                src="{{ asset('storage/' . $lapangan->foto) }}"
                                alt="{{ $lapangan->nama_lapangan }}"
                                class="w-full h-full object-cover
                                       group-hover:scale-105
                                       transition duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-300 to-slate-400 flex items-center justify-center">
                                <img
                                    src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=800"
                                    alt="{{ $lapangan->nama_lapangan }}"
                                    class="w-full h-full object-cover
                                           group-hover:scale-105
                                           transition duration-500">
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-semibold text-slate-900">
                            {{ $lapangan->nama_lapangan }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-4">
                            {{ $lapangan->lokasi ?? 'Bandung, Indonesia' }}
                        </p>

                        @if ($lapangan->deskripsi && $lapangan->deskripsi !== '-')
                            <p class="text-slate-400 text-xs mb-4 line-clamp-2">
                                {{ $lapangan->deskripsi }}
                            </p>
                        @endif

                        <div class="flex flex-col items-center gap-4">
                            <span
                                class="bg-teal-100 text-teal-700
                                       px-4 py-1 rounded-full
                                       text-sm font-semibold">
                                Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }} / hr
                            </span>

                            <a href="{{ route('court.detail', $lapangan->id) }}"
                                class="bg-teal-600 hover:bg-teal-500
                                       text-white px-6 py-2
                                       rounded-full text-sm
                                       font-semibold transition">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-slate-500">
                    Tidak ada lapangan tersedia saat ini.
                </p>
            @endforelse

        </div>

         <!-- CTA -->
        <div class="text-center mt-12">
            <a href="{{ route('court.index') }}"
                    class="inline-block mt-4 text-sm font-sans uppercase tracking-wide border-b border-slate-900 pb-1">
            View All Courts
                </a>
        </div>
    </div>
</section>