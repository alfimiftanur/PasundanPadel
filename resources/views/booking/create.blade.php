<x-layout>
    <x-slot:title>Booking</x-slot:title>

    <section class="bg-slate-50 py-10">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">

        <h1 class="text-2xl font-bold mb-6">Form Booking</h1>

        <form class="space-y-6">
            {{-- Pilih Lapangan --}}
            <div>
                <label class="font-medium">
                    Pilih Lapangan <span class="text-red-500">*</span>
                </label>
                <select class="w-full mt-2 border rounded-lg px-4 py-2">
                    <option>
                        Elite Padel Center - Indoor - Rp180.000/jam
                    </option>
                </select>
            </div>

            {{-- Tanggal & Jam --}}
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="font-medium">
                        Tanggal Main <span class="text-red-500">*</span>
                    </label>
                    <input type="date"
                           class="w-full mt-2 border rounded-lg px-4 py-2"
                           value="{{ now()->format('Y-m-d') }}">
                </div>

                <div>
                    <label class="font-medium">
                        Jam Mulai <span class="text-red-500">*</span>
                    </label>
                    <select class="w-full mt-2 border rounded-lg px-4 py-2">
                        <option>Pilih jam...</option>
                        <option>07:00</option>
                        <option>08:00</option>
                        <option>09:00</option>
                        <option>10:00</option>
                    </select>
                </div>
            </div>

            {{-- Durasi --}}
            <div>
                <label class="font-medium">
                    Durasi <span class="text-red-500">*</span>
                </label>
                <select class="w-full mt-2 border rounded-lg px-4 py-2">
                    <option>1 Jam</option>
                    <option>2 Jam</option>
                    <option>3 Jam</option>
                </select>
            </div>

            {{-- Informasi Kontak --}}
            <div>
                <h2 class="text-lg font-semibold mb-3">
                    Informasi Kontak
                </h2>

                <div class="space-y-4">
                    <div>
                        <label class="font-medium">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               value="Admin"
                               class="w-full mt-2 border rounded-lg px-4 py-2">
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email"
                                   value="admin@padelcourt.com"
                                   class="w-full mt-2 border rounded-lg px-4 py-2">
                        </div>

                        <div>
                            <label class="font-medium">
                                No. Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   class="w-full mt-2 border rounded-lg px-4 py-2">
                        </div>
                    </div>

                    <div>
                        <label class="font-medium">
                            Catatan (Opsional)
                        </label>
                        <textarea
                            rows="4"
                            class="w-full mt-2 border rounded-lg px-4 py-2">
                        </textarea>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-4">
                <button
                    type="submit"
                    class="w-full bg-black text-white py-3 rounded-lg hover:bg-slate-800 transition">
                    Konfirmasi Booking
                </button>
            </div>
        </form>

    </div>
</section>
</x-layout>