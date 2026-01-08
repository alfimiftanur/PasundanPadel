<x-layout>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $existingJadwal ? 'Ubah Status Jadwal' : 'Tambah Jadwal Baru' }}
            </h1>
            <p class="text-gray-600 mt-1">
                {{ $existingJadwal ? 'Edit status ketersediaan lapangan' : 'Buat jadwal ketersediaan lapangan' }}
            </p>
        </div>

        <!-- Alert Error -->
        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6 shadow">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $existingJadwal ? route('jadwal.updateStatus', $existingJadwal->id) : route('jadwal.store') }}" 
              method="POST" 
              class="bg-white shadow-lg rounded-lg p-8">
            @csrf

            <!-- INFO JADWAL (READ-ONLY) -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-6 rounded">
                <h3 class="font-bold text-blue-900 mb-4">Informasi Jadwal</h3>
                
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-blue-700 font-semibold">Lapangan:</p>
                        <p class="text-blue-900">
                            {{ $lapangans->find($prefilledData['court_id'])->nama_lapangan ?? 'Pilih lapangan' }}
                            ({{ $lapangans->find($prefilledData['court_id'])->tipe_lapangan ?? '-' }})
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-blue-700 font-semibold">Tanggal:</p>
                        <p class="text-blue-900">
                            {{ $prefilledData['date'] ? \Carbon\Carbon::parse($prefilledData['date'])->format('d M Y') : 'Pilih tanggal' }}
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-blue-700 font-semibold">Waktu Mulai:</p>
                        <p class="text-blue-900">{{ $prefilledData['start_time'] ?? '-' }}</p>
                    </div>
                    
                    <div>
                        <p class="text-blue-700 font-semibold">Waktu Selesai:</p>
                        <p class="text-blue-900">{{ $prefilledData['end_time'] ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- HIDDEN FIELDS (AUTO-FILLED) -->
            <input type="hidden" name="court_id" value="{{ old('court_id', $prefilledData['court_id']) }}">
            <input type="hidden" name="date" value="{{ old('date', $prefilledData['date']) }}">
            <input type="hidden" name="start_time" value="{{ old('start_time', $prefilledData['start_time']) }}">
            <input type="hidden" name="end_time" value="{{ old('end_time', $prefilledData['end_time']) }}">

            <!-- STATUS (ONLY EDITABLE FIELD) -->
    <div class="mb-6">
        <label class="block text-gray-700 font-semibold mb-3 text-lg">
        {{ $existingJadwal ? 'Ubah Status Jadwal' : 'Pilih Status Jadwal' }} <span class="text-red-500">*</span>
        </label>
    
        <div class="grid grid-cols-2 gap-4">
        <!-- Option: Tersedia (DEFAULT CHECKED) -->
          <label class="relative cursor-pointer">
            <input type="radio" 
                   name="status" 
                   value="tersedia" 
                   class="peer sr-only" 
                   {{ old('status', $existingJadwal->status ?? 'tersedia') === 'tersedia' ? 'checked' : '' }}>
            <div class="border-2 border-gray-300 rounded-lg p-6 text-center transition 
                        peer-checked:border-green-500 peer-checked:bg-green-50 
                        hover:border-green-400">
                <div class="w-12 h-12 bg-green-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <p class="font-bold text-green-800">Tersedia</p>
                <p class="text-xs text-gray-600 mt-1">Lapangan bisa dibooking</p>
            </div>
        </label>

        <!-- Option: Terboking -->
        <label class="relative cursor-pointer">
            <input type="radio" 
                   name="status" 
                   value="terboking" 
                   class="peer sr-only"
                   {{ old('status', $existingJadwal->status ?? '') === 'terboking' ? 'checked' : '' }}>
            <div class="border-2 border-gray-300 rounded-lg p-6 text-center transition 
                        peer-checked:border-red-500 peer-checked:bg-red-50 
                        hover:border-red-400">
                <div class="w-12 h-12 bg-red-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <p class="font-bold text-red-800">Terboking</p>
                <p class="text-xs text-gray-600 mt-1">Lapangan sudah dibooking</p>
            </div>
        </label>
    </div>
</div>


            <!-- Info Box -->
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-6 rounded">
                <p class="text-sm text-yellow-800">
                    <strong>{{ $existingJadwal ? 'Info:' : 'Catatan:' }}</strong> 
                    {{ $existingJadwal 
                        ? 'Anda sedang mengubah status jadwal yang sudah ada.' 
                        : 'Jadwal akan dibuat untuk slot waktu 1 jam. Sistem akan otomatis mengecek jadwal bentrok.' 
                    }}
                </p>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold shadow-md transition duration-200">
                    {{ $existingJadwal ? 'Simpan Perubahan' : 'Simpan Jadwal' }}
                </button>
                <a href="{{ route('jadwal.index', ['date' => $prefilledData['date']]) }}" 
                   class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 px-8 py-3 rounded-lg font-semibold shadow-md transition duration-200 text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-layout>
