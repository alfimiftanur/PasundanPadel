<x-layout title="Edit Lapangan - PasundanPadel">
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Lapangan</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Terjadi kesalahan:</strong>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lapangan.update', $lapangan) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_lapangan" class="block text-gray-700 font-semibold mb-2">Nama Lapangan *</label>
                <input type="text" id="nama_lapangan" name="nama_lapangan" value="{{ old('nama_lapangan', $lapangan->nama_lapangan) }}" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 @error('nama_lapangan') border-red-500 @enderror">
                @error('nama_lapangan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tipe_lapangan" class="block text-gray-700 font-semibold mb-2">Tipe Lapangan *</label>
                <select id="tipe_lapangan" name="tipe_lapangan" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 @error('tipe_lapangan') border-red-500 @enderror">
                    <option value="">-- Pilih Tipe --</option>
                    <option value="Indoor" {{ old('tipe_lapangan', $lapangan->tipe_lapangan) === 'Indoor' ? 'selected' : '' }}>Indoor</option>
                    <option value="Outdoor" {{ old('tipe_lapangan', $lapangan->tipe_lapangan) === 'Outdoor' ? 'selected' : '' }}>Outdoor</option>
                </select>
                @error('tipe_lapangan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kapasitas" class="block text-gray-700 font-semibold mb-2">Kapasitas Pemain *</label>
                <input type="number" id="kapasitas" name="kapasitas" value="{{ old('kapasitas', $lapangan->kapasitas) }}" min="1" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 @error('kapasitas') border-red-500 @enderror">
                @error('kapasitas')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="harga_per_jam" class="block text-gray-700 font-semibold mb-2">Harga Per Jam (Rp) *</label>
                <input type="number" id="harga_per_jam" name="harga_per_jam" value="{{ old('harga_per_jam', $lapangan->harga_per_jam) }}" step="0.01" min="0" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 @error('harga_per_jam') border-red-500 @enderror">
                @error('harga_per_jam')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status *</label>
                <select id="status" name="status" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 @error('status') border-red-500 @enderror">
                    <option value="">-- Pilih Status --</option>
                    <option value="tersedia" {{ old('status', $lapangan->status) === 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="tidak tersedia" {{ old('status', $lapangan->status) === 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                    <option value="pemeliharaan" {{ old('status', $lapangan->status) === 'pemeliharaan' ? 'selected' : '' }}>Pemeliharaan</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi *</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 resize-none @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $lapangan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="lokasi" class="block text-gray-700 font-semibold mb-2">Lokasi *</label>
                <textarea id="lokasi" name="lokasi" rows="2" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 resize-none @error('lokasi') border-red-500 @enderror">{{ old('lokasi', $lapangan->lokasi) }}</textarea>
                @error('lokasi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="foto" class="block text-gray-700 font-semibold mb-2">Foto</label>
                
                @if ($lapangan->foto)
                    <div class="mb-3" id="foto_lama">
                        <div class="flex items-start gap-4">
                            <div class="flex-1">
                                <img id="foto_lama_img" src="{{ asset('storage/' . $lapangan->foto) }}" alt="{{ $lapangan->nama_lapangan }}" class="h-40 w-auto rounded border border-gray-300">
                                <p class="text-sm text-gray-500 mt-2">Foto saat ini</p>
                            </div>
                            <button type="button" id="hapus_foto_lama_btn" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded h-fit">
                                Hapus
                            </button>
                        </div>
                        <input type="hidden" id="hapus_foto_lama_flag" name="hapus_foto_lama" value="0">
                    </div>
                @endif
                
                <input type="file" id="foto" name="foto" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500 @error('foto') border-red-500 @enderror">
                <p class="text-sm text-gray-500 mt-1">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB (Kosongkan jika tidak ingin mengubah)</p>
                
                <!-- Preview Foto Baru -->
                <div id="foto_preview" class="mt-4 hidden">
                    <div class="flex items-start gap-4">
                        <div class="flex-1">
                            <img id="foto_preview_img" src="" alt="Preview" class="h-40 w-auto rounded border border-gray-300">
                            <p class="text-sm text-gray-500 mt-2">Foto baru</p>
                        </div>
                        <button type="button" id="hapus_foto_baru_btn" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded h-fit">
                            Hapus
                        </button>
                    </div>
                </div>
                
                @error('foto')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Perbarui Lapangan
                </button>
                <a href="{{ route('lapangan.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk preview dan hapus foto -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fotoInput = document.getElementById('foto');
        const fotoPreview = document.getElementById('foto_preview');
        const fotoPreviewImg = document.getElementById('foto_preview_img');
        const hapusFotoBaru = document.getElementById('hapus_foto_baru_btn');
        const hapusFotoLama = document.getElementById('hapus_foto_lama_btn');
        const hapusFotoLamaFlag = document.getElementById('hapus_foto_lama_flag');
        const fotoLamaDiv = document.getElementById('foto_lama');
        
        // Handle file input change
        fotoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    fotoPreviewImg.src = event.target.result;
                    fotoPreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                fotoPreview.classList.add('hidden');
            }
        });
        
        // Handle delete foto baru button
        if (hapusFotoBaru) {
            hapusFotoBaru.addEventListener('click', function(e) {
                e.preventDefault();
                fotoInput.value = '';
                fotoPreview.classList.add('hidden');
                fotoPreviewImg.src = '';
            });
        }
        
        // Handle delete foto lama button
        if (hapusFotoLama) {
            hapusFotoLama.addEventListener('click', function(e) {
                e.preventDefault();
                hapusFotoLamaFlag.value = '1';
                fotoLamaDiv.style.display = 'none';
            });
        }
    });
</script>
</x-layout>
