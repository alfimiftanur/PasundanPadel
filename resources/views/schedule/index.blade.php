<x-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Kalender Jadwal</h1>
            <p class="text-gray-600">Pilih jadwal tersedia untuk melakukan booking</p>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6 shadow-md flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Alert Error -->
        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6 shadow-md">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <strong>Terjadi kesalahan:</strong>
                </div>
                <ul class="list-disc list-inside ml-7">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Filter Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <form action="{{ route('user.schedule') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Pilih Lapangan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Lapangan</label>
                        <select name="court_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            <option value="">Semua Lapangan</option>
                            @foreach($lapangans as $lapangan)
                                <option value="{{ $lapangan->id }}" {{ $selectedCourtId == $lapangan->id ? 'selected' : '' }}>
                                    {{ $lapangan->nama_lapangan }} - {{ $lapangan->tipe_lapangan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Tanggal -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Tanggal</label>
                        <input type="date"
                               name="date"
                               value="{{ $selectedDate }}"
                               min="{{ date('Y-m-d') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>

                    <!-- Button Cari -->
                    <div class="flex items-end">
                        <button type="submit"
                                class="w-full px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200 font-semibold shadow-md">
                            Cari Jadwal
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Legend -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="font-semibold text-gray-800 mb-3">Keterangan:</h3>
            <div class="flex flex-wrap gap-6">
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-green-500 rounded mr-2"></div>
                    <span class="text-sm text-gray-700">Tersedia</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-yellow-500 rounded mr-2"></div>
                    <span class="text-sm text-gray-700">Pending</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-red-500 rounded mr-2"></div>
                    <span class="text-sm text-gray-700">Terboking</span>
                </div>
            </div>
        </div>

        <!-- Schedule Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sticky left-0 bg-gray-50 z-10">
                                JAM
                            </th>
                            @foreach($displayedLapangans as $lapangan)
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $lapangan->nama_lapangan }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($timeSlots as $timeSlot)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <!-- Time Slot -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 sticky left-0 bg-white border-r border-gray-200">
                                    {{ $timeSlot }} - {{ date('H:i', strtotime($timeSlot . ' +1 hour')) }}
                                </td>

                                <!-- Court Cells -->
                                @foreach($displayedLapangans as $lapangan)
                                    @php
                                        $jadwalForSlot = null;
                                        $status = null;

                                        if (isset($jadwals[$lapangan->id])) {
                                            foreach ($jadwals[$lapangan->id] as $jadwal) {
                                                $startTime = \Carbon\Carbon::parse($jadwal->start_time)->format('H:i');
                                                
                                                if ($startTime === $timeSlot) {
                                                    $jadwalForSlot = $jadwal;
                                                    $status = $jadwal->status;
                                                    break;
                                                }
                                            }
                                        }

                                        if ($status === 'terboking') {
                                            $bgColor = 'bg-red-100';
                                            $textColor = 'text-red-800';
                                            $statusText = 'Terboking';
                                            $hoverBg = '';
                                            $clickable = false;
                                        } elseif ($status === 'pending') {
                                            $bgColor = 'bg-yellow-100';
                                            $textColor = 'text-yellow-800';
                                            $statusText = 'Pending';
                                            $hoverBg = '';
                                            $clickable = false;
                                        } else {
                                            $bgColor = 'bg-green-100';
                                            $textColor = 'text-green-800';
                                            $statusText = 'Tersedia';
                                            $hoverBg = 'hover:bg-green-200';
                                            $clickable = true;
                                        }
                                    @endphp

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($clickable)
                                            <!-- Tersedia: klik untuk booking -->
                                            <a href="{{ route('booking.create', $lapangan->id) }}?date={{ $selectedDate }}&start_time={{ $timeSlot }}" 
                                            class="block w-full px-4 py-2 {{ $bgColor }} {{ $textColor }} rounded-lg text-sm font-semibold text-center {{ $hoverBg }} transition duration-200 cursor-pointer">
                                                {{ $statusText }}
                                            </a>
                                        @else
                                            <!-- Pending atau Terboking: tidak bisa diklik -->
                                            <div class="block w-full px-4 py-2 {{ $bgColor }} {{ $textColor }} rounded-lg text-sm font-semibold text-center">
                                                {{ $statusText }}
                                            </div>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
