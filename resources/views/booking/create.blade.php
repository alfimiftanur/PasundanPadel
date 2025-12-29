<x-layout>
    <x-slot:title>Booking - {{ $lapangan->nama_lapangan }}</x-slot:title>

    <section class="bg-amber-50 py-10">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">
        <div class="mb-6 -mx-8 -mt-8 bg-white">
            <div class="flex flex-col md:flex-row gap-4 p-6 border-b">
            
                <div class="md:w-1/3">
                    @if($lapangan->foto)
                        <img src="{{ asset('storage/' . $lapangan->foto) }}" 
                             alt="{{ $lapangan->nama_lapangan }}"
                             class="w-full h-40 object-cover rounded-lg">
                    @else
                        <img src="https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=400" 
                             alt="{{ $lapangan->nama_lapangan }}"
                             class="w-full h-40 object-cover rounded-lg">
                    @endif
                </div>
                
                {{-- Info Lapangan --}}
                <div class="md:w-2/3">
                    <h2 class="text-xl font-bold text-gray-800">{{ $lapangan->nama_lapangan }}</h2>
                    <p class="text-gray-500 text-sm mt-1 flex items-center gap-2">
                        <span>{{ $lapangan->lokasi }}</span>
                        <span class="px-2 py-0.5 
                            @if($lapangan->tipe_lapangan === 'Indoor') bg-teal-100 text-teal-700 
                            @else bg-emerald-100 text-emerald-700 
                            @endif 
                            rounded-full text-xs font-semibold">
                            {{ $lapangan->tipe_lapangan }}
                        </span>
                    </p>
                    <p class="text-2xl font-bold text-teal-600 mt-2">
                        Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }} 
                        <span class="text-sm font-normal text-gray-500">/h</span>
                    </p>
                    <p class="text-gray-600 text-sm mt-2">
                        {{ \Str::limit($lapangan->deskripsi, 80) }}
                    </p>
                    <p class="text-gray-500 text-sm mt-2">
                        <span class="font-medium">Capacity:</span> {{ $lapangan->kapasitas }} players
                    </p>
                </div>
            </div>
        </div>

        <h1 class="text-2xl font-bold mb-6">Booking Details</h1>

        {{-- Error Messages --}}
        @if($errors->booking->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <div class="font-semibold mb-2">Something went wrong:</div>
                <ul class="list-disc list-inside">
                    @foreach($errors->booking->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-6" action="{{ route('pemesanan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="court_id" value="{{ $lapangan->id }}">

            {{-- Pilih Lapangan --}}
            <div>
                <label class="font-medium">
                    Selected Court <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       value="{{ $lapangan->nama_lapangan }} - {{ $lapangan->tipe_lapangan }} - Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}/h"
                       class="w-full mt-2 border rounded-lg px-4 py-2 bg-gray-100 cursor-not-allowed"
                       readonly>
            </div>

            {{-- Tanggal & Jam --}}
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="font-medium">
                        Booking Date <span class="text-red-500">*</span>
                    </label>
                    <input type="date"
                           name="date"
                           class="w-full mt-2 border rounded-lg px-4 py-2"
                           min="{{ now()->format('Y-m-d') }}"
                           value="{{ old('date', $date ?? now()->format('Y-m-d')) }}"
                           required>
                </div>

                <div>
                    <label class="font-medium">
                        Start Time <span class="text-red-500">*</span>
                    </label>
                    <select name="start_time" class="w-full mt-2 border rounded-lg px-4 py-2" required>
                        <option value="">Select time</option>
                        @for($hour = 8; $hour < 22; $hour++)
                            @php
                                $timeSlot = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
                            @endphp
                            <option value="{{ $timeSlot }}" 
                                {{ (old('start_time', $startTime ?? '') === $timeSlot) ? 'selected' : '' }}>
                                {{ $timeSlot }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            {{-- Durasi --}}
            <div>
                <label class="font-medium">
                    How long do you want to play? <span class="text-red-500">*</span>
                </label>
                <select name="duration" id="duration" class="w-full mt-2 border rounded-lg px-4 py-2" required>
                    <option value="1">1 hour - Rp {{ number_format($lapangan->harga_per_jam * 1, 0, ',', '.') }}</option>
                    <option value="2">2 hours - Rp {{ number_format($lapangan->harga_per_jam * 2, 0, ',', '.') }}</option>
                    <option value="3">3 hours - Rp {{ number_format($lapangan->harga_per_jam * 3, 0, ',', '.') }}</option>
                </select>
            </div>

            
            <div>

                <div class="space-y-4">
                    <div>
                        <label class="font-medium">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        @auth
                            <input type="text"
                                   name="name"
                                   value="{{ auth()->user()->name }}"
                                   class="w-full mt-2 border rounded-lg px-4 py-2 bg-gray-100 cursor-not-allowed"
                                   readonly
                                   required>
                        @else
                            <input type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="w-full mt-2 border rounded-lg px-4 py-2"
                                   placeholder="Enter name"
                                   required>
                        @endauth
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium">
                                Email <span class="text-red-500">*</span>
                            </label>
                            @auth
                                <input type="email"
                                       name="email"
                                       value="{{ auth()->user()->email }}"
                                       class="w-full mt-2 border rounded-lg px-4 py-2 bg-gray-100 cursor-not-allowed"
                                       readonly
                                       required>
                            @else
                                <input type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       class="w-full mt-2 border rounded-lg px-4 py-2"
                                       placeholder="Enter email"
                                       required>
                            @endauth
                        </div>

                        <div>
                            <label class="font-medium">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   class="w-full mt-2 border rounded-lg px-4 py-2"
                                   placeholder="e.g 08123456789"
                                   required>
                        </div>
                    </div>

                    <div>
                        <label class="font-medium">
                            Note (Optional)
                        </label>
                        <textarea
                            name="notes"
                            rows="4"
                            class="w-full mt-2 border rounded-lg px-4 py-2"
                            placeholder="Any special requests or notes?">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>

       
            <div class="bg-gray-50 p-4 rounded-lg border">
                <h3 class="font-semibold mb-2">Booking Summary</h3>
                <div class="flex justify-between text-gray-600 text-sm">
                    <span>{{ $lapangan->nama_lapangan }}</span>
                    <span>Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }} x <span id="duration-display">1</span>h</span>
                </div>
                <div class="border-t mt-2 pt-2 flex justify-between font-bold text-lg">
                    <span>Total Amount</span>
                    <span class="text-teal-600" id="total-price">Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}</span>
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-4">
                <button
                    type="submit"
                    class="w-full bg-teal-700 text-white py-3 rounded-lg hover:bg-teal-600 transition">
                    Confirm Booking
                </button>
            </div>
        </form>

    </div>
</section>

<script>
    
    const pricePerHour = {{ $lapangan->harga_per_jam }};
    const durationSelect = document.getElementById('duration');
    const durationDisplay = document.getElementById('duration-display');
    const totalPrice = document.getElementById('total-price');
    
    durationSelect.addEventListener('change', function() {
        const duration = parseInt(this.value);
        durationDisplay.textContent = duration;
        const total = pricePerHour * duration;
        totalPrice.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
    });
</script>
</x-layout>