{{-- Court List Page --}}
<x-layout>
    <x-slot:title>
        Pasundan Padel – Court List
    </x-slot:title>

    <section id="courtlist" class="bg-amber-50 min-h-screen" x-data="{ openFilter: false }">

        <div class="max-w-7xl mx-auto px-6 py-12">

            <!-- Page Title -->
            <h1 class="text-3xl text-center md:text-4xl font-bold text-slate-900 mb-10">
                Our Padel Courts
            </h1>

            <!-- Mobile Filter Button -->
            <div class="md:hidden mb-6">
                <button @click="openFilter = !openFilter"
                    class="w-full bg-teal-700 text-white py-3 rounded-full
                           font-semibold flex items-center justify-center gap-2">
                    <span x-text="openFilter ? 'Hide Filters' : 'Show Filters'"></span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 min-h-[calc(100vh-160px)]"
                 x-data="courtFilter()">

                {{-- Filter Sidebar --}}
                <aside x-show="openFilter || window.innerWidth >= 768" x-transition @click.outside="openFilter = false"
                    class="md:col-span-1 md:sticky md:top-16 md:-mt-24 bg-teal-900/90 backdrop-blur rounded-3xl p-6 text-white shadow-lg
                           min-h-[calc(100vh-220px)] md:block">

                    <h2 class="text-xl font-semibold mb-6">Filters</h2>

                    <!-- Search -->
                    <div class="mb-8">
                        <label class="block text-sm mb-2 text-white/80">
                            Search Court
                        </label>

                        <!-- Input -->
                        <div class="relative">
                            <input type="text" 
                                x-model="filters.keyword" 
                                @input="handleSearch()"
                                placeholder="Court name or price..."
                                class="w-full px-4 py-2 pl-11 rounded-xl bg-white text-slate-900 focus:outline-none 
                                focus:ring-2 focus:ring-teal-400" />

                            <!-- Search Icon -->
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 text-slate-600"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>

                            <!-- Search Results Dropdown -->
                            <div x-show="showSearchResults && searchResults.length > 0" x-transition
                                class="absolute mt-2 w-full bg-white rounded-xl shadow-lg overflow-hidden z-30 max-h-64 overflow-y-auto">
                                <template x-for="court in searchResults" :key="court.id">
                                    <div @click="selectCourt(court)" 
                                        class="px-4 py-2 text-black text-sm hover:bg-slate-100 cursor-pointer border-b border-slate-100 last:border-b-0">
                                        <p class="font-semibold" x-text="court.nama_lapangan"></p>
                                        <p class="text-xs text-slate-500" x-text="court.lokasi"></p>
                                    </div>
                                </template>
                            </div>
                            
                            <!-- No Results -->
                            <div x-show="showSearchResults && searchResults.length === 0 && filters.keyword.length > 0" x-transition
                                class="absolute mt-2 w-full bg-white rounded-xl shadow-lg z-30">
                                <div class="px-4 py-3 text-black text-sm text-center text-slate-500">
                                    No courts found
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="mb-6">
                        <label class="block text-sm mb-2 text-white/80">
                            Date
                        </label>
                        <input type="date" x-model="filters.date"
                            class="w-full px-4 py-2 rounded-xl bg-white text-slate-900
                               focus:outline-none focus:ring-2 focus:ring-teal-400">
                    </div>

                    <!-- Price Range -->
                    <div class="mb-6">
                        <label class="block text-sm mb-3 text-white/80">
                            Price per Hour
                        </label>
                        <div class="space-y-3">
                            <div>
                                <label class="text-xs text-white/70">Min Price</label>
                                <input type="number" x-model.number="filters.min_price" placeholder="Rp 0"
                                    class="w-full px-3 py-2 rounded-lg bg-white text-slate-900
                                       focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-white/70">Max Price</label>
                                <input type="number" x-model.number="filters.max_price" placeholder="Rp 1.500.000"
                                    class="w-full px-3 py-2 rounded-lg bg-white text-slate-900
                                       focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm">
                            </div>
                            <div class="text-xs text-white/60 flex justify-between pt-2">
                                <span x-text="'Min: Rp ' + formatPrice(filters.min_price || 0)"></span>
                                <span x-text="'Max: Rp ' + formatPrice(filters.max_price || 1500000)"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Environment -->
                    <div class="mb-8">
                        <label class="block text-sm mb-3 text-white/80">
                            Environment
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" x-model="filters.tipe" value="Indoor" 
                                    class="accent-teal-400 w-4 h-4">
                                <span>Indoor</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" x-model="filters.tipe" value="Outdoor" 
                                    class="accent-teal-400 w-4 h-4">
                                <span>Outdoor</span>
                            </label>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="space-y-3">
                        <button @click="applyFilters()"
                            class="w-full bg-teal-500 hover:bg-teal-400
                               text-slate-900 py-3 rounded-full
                               font-semibold transition">
                            Apply
                        </button>

                        <button @click="resetFilters()"
                            class="w-full border border-white/40
                               hover:bg-white/10 py-3
                               rounded-full font-semibold transition">
                            Reset
                        </button>
                    </div>

                    <p class="text-xs text-white/40 mt-10 text-center">
                        Showing <span x-text="totalResults"></span> court(s)
                    </p>
                </aside>



                {{-- Court List --}}
                <div class="md:col-span-3">

                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8
                               max-h-[calc(100vh-200px)] overflow-y-auto pr-2"
                        id="courtContainer">

                        @forelse ($lapangans as $lapangan)
                            <div class="court-item rounded-3xl overflow-hidden bg-white shadow-md hover:shadow-xl transition group"
                                data-court-id="{{ $lapangan->id }}"
                                data-name="{{ strtolower($lapangan->nama_lapangan) }}"
                                data-location="{{ strtolower($lapangan->lokasi ?? '') }}"
                                data-type="{{ $lapangan->tipe_lapangan }}"
                                data-price="{{ $lapangan->harga_per_jam }}">

                                <!-- Image -->
                                <div class="h-52 bg-slate-200 overflow-hidden">

                                    <!-- Badge -->
                                    <span
                                        class="absolute top-4 left-4
                                               bg-teal-600 text-white
                                               font-semibold px-2.5 py-1
                                               text-[11px] rounded-full z-10">
                                        {{ $lapangan->tipe_lapangan }}
                                    </span>

                                    @if ($lapangan->foto)
                                        <img src="{{ asset('storage/' . $lapangan->foto) }}"
                                            alt="{{ $lapangan->nama_lapangan }}"
                                            class="w-full h-full object-cover
                                                   group-hover:scale-105
                                                   transition duration-500">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-slate-300 to-slate-400 flex items-center justify-center">
                                            <span class="text-white text-sm">Tidak ada foto</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="p-6 text-center">
                                    <h3 class="text-lg font-semibold text-slate-900">
                                        {{ $lapangan->nama_lapangan }}
                                    </h3>

                                    <p class="text-slate-500 text-sm mb-2">
                                        {{ $lapangan->lokasi ?? 'Bandung, Indonesia' }}
                                    </p>

                                    @if ($lapangan->deskripsi)
                                        <p class="text-slate-400 text-xs mb-4 line-clamp-2">
                                            {{ $lapangan->deskripsi }}
                                        </p>
                                    @endif

                                    <div class="flex flex-col items-center gap-4">
                                        <span
                                            class="bg-teal-100 text-teal-700
                                                   px-4 py-1 rounded-full
                                                   text-sm font-semibold">
                                            Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }} / jam
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
                            <div class="col-span-3 text-center py-12">
                                <p class="text-slate-500 text-lg">Belum ada lapangan tersedia saat ini.</p>
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        function courtFilter() {
            return {
                filters: {
                    keyword: '',
                    date: '',
                    min_price: null,
                    max_price: null,
                    tipe: []
                },
                searchResults: [],
                showSearchResults: false,
                totalResults: {{ count($lapangans) }},
                allCourts: @json($lapangans->toArray()),

                formatPrice(price) {
                    return new Intl.NumberFormat('id-ID').format(price);
                },

                async handleSearch() {
                    if (this.filters.keyword.length > 0) {
                        const keyword = this.filters.keyword.toLowerCase();
                        this.searchResults = this.allCourts.filter(court => 
                            court.nama_lapangan.toLowerCase().includes(keyword) ||
                            court.lokasi.toLowerCase().includes(keyword) ||
                            court.deskripsi.toLowerCase().includes(keyword)
                        );
                        this.showSearchResults = true;
                    } else {
                        this.searchResults = [];
                        this.showSearchResults = false;
                    }
                },

                selectCourt(court) {
                    this.filters.keyword = court.nama_lapangan;
                    this.showSearchResults = false;
                    this.applyFilters();
                },

                applyFilters() {
                    // Build query parameters
                    const params = new URLSearchParams();
                    
                    if (this.filters.keyword) params.append('keyword', this.filters.keyword);
                    if (this.filters.min_price) params.append('min_price', this.filters.min_price);
                    if (this.filters.max_price) params.append('max_price', this.filters.max_price);
                    
                    // For multiple types
                    if (this.filters.tipe.length > 0) {
                        this.filters.tipe.forEach(type => params.append('tipe[]', type));
                    }

                    // Fetch filtered results
                    fetch(`{{ route('court.index') }}?${params.toString()}`, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.updateCourtList(data.courts);
                        this.totalResults = data.total;
                    })
                    .catch(error => console.error('Filter error:', error));
                },

                updateCourtList(courts) {
                    const container = document.getElementById('courtContainer');
                    
                    if (courts.length === 0) {
                        container.innerHTML = `
                            <div class="col-span-3 text-center py-12">
                                <p class="text-slate-500 text-lg">No courts match your filters.</p>
                            </div>
                        `;
                        return;
                    }

                    container.innerHTML = courts.map(court => `
                        <div class="rounded-3xl overflow-hidden bg-white shadow-md hover:shadow-xl transition group">
                            <div class="h-52 bg-slate-200 overflow-hidden relative">
                                <span class="absolute top-4 left-4 bg-teal-600 text-white font-semibold px-2.5 py-1 text-[11px] rounded-full z-10">
                                    ${court.tipe_lapangan}
                                </span>
                                <img src="${court.foto ? '/storage/' + court.foto : 'https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=800'}" 
                                    alt="${court.nama_lapangan}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-lg font-semibold text-slate-900">${court.nama_lapangan}</h3>
                                <p class="text-slate-500 text-sm mb-2">${court.lokasi || 'Bandung, Indonesia'}</p>
                                ${court.deskripsi ? `<p class="text-slate-400 text-xs mb-4">${court.deskripsi.substring(0, 50)}...</p>` : ''}
                                <div class="flex flex-col items-center gap-4">
                                    <span class="bg-teal-100 text-teal-700 px-4 py-1 rounded-full text-sm font-semibold">
                                        Rp ${new Intl.NumberFormat('id-ID').format(court.harga_per_jam)} / jam
                                    </span>
                                    <a href="/court/${court.id}" class="bg-teal-600 hover:bg-teal-500 text-white px-6 py-2 rounded-full text-sm font-semibold transition">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    `).join('');
                },

                resetFilters() {
                    this.filters = {
                        keyword: '',
                        date: '',
                        min_price: null,
                        max_price: null,
                        tipe: []
                    };
                    this.searchResults = [];
                    this.showSearchResults = false;
                    this.totalResults = this.allCourts.length;
                    
                    // Reset court list to show all
                    fetch('{{ route("court.index") }}', {
                        headers: { 'Accept': 'application/json' }
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.updateCourtList(data.courts);
                    });
                }
            }
        }
    </script>
</x-layout>