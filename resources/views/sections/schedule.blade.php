{{-- Schedule Section --}}
<section class="bg-[#dfe6db] py-12">
    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Header -->
        <h1 class="italic text-3xl font-bold text-center text-slate-800">
            Time to Play</h1>
        <p class="italic text-slate-500 mt-1 text-center">
            Check the availability schedule of your favorite padel courts
        </p>

        <!-- Filter -->
        <div class="bg-white rounded-xl shadow p-6 mt-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Court
                    </label>
                    <select class="w-full border rounded-lg px-4 py-2">
                        <option>All Courts</option>
                        <option>Court A</option>
                        <option>Court B</option>
                        <option>Court C</option>
                        <option>Court D</option>
                        <option>Court E</option>
                        <option>Court F</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Date
                    </label>
                    <input type="date" class="w-full border rounded-lg px-4 py-2" value="2025-12-18">
                </div>

                <div class="md:col-span-2">
                    <button class="w-full bg-[#08675f86] hover:bg-teal-700 text-white font-semibold py-3 rounded-lg">
                        Check
                    </button>
                </div>

            </div>
        </div>

        <!-- Legend -->
        <div class="bg-white rounded-xl shadow p-4 mt-6 flex gap-6 items-center">
            <span class="font-semibold text-slate-700">Legend:</span>

            <div class="flex items-center gap-2">
                <span class="w-4 h-4 rounded bg-green-500"></span>
                <span class="text-sm">Available</span>
            </div>

            <div class="flex items-center gap-2">
                <span class="w-4 h-4 rounded bg-red-500"></span>
                <span class="text-sm">Booked</span>
            </div>

            <div class="flex items-center gap-2">
                <span class="w-4 h-4 rounded bg-yellow-400"></span>
                <span class="text-sm">Pending</span>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow mt-6 overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="p-4 text-left text-sm font-semibold text-slate-600">
                            Time Slot
                        </th>
                        <th class="p-4 text-sm">Court A</th>
                        <th class="p-4 text-sm">Court B</th>
                        <th class="p-4 text-sm">Court C</th>
                        <th class="p-4 text-sm">Court D</th>
                        <th class="p-4 text-sm">Court E</th>
                        <th class="p-4 text-sm">Court F</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- ROW -->
                    <tr class="border-t">
                        <td class="p-4 font-medium">09:00 - 10:00</td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                    </tr>

                    <tr class="border-t">
                        <td class="p-4 font-medium">11:00 - 12:00</td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                    </tr>

                    <tr class="border-t">
                        <td class="p-4 font-medium">13:00 - 14:00</td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-4 font-medium">15:00 - 16:00</td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-4 font-medium">17:00 - 18:00</td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-4 font-medium">19:00 - 20:00</td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-4 font-medium">21:00 - 22:00</td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                        <td class="p-4">
                            <Status />
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</section>

<!-- Status Badge Component (dummy) -->
<script>
    document.querySelectorAll('Status').forEach(el => {
        el.outerHTML = `
            <span class="inline-block w-full text-center 
                         bg-green-100 text-green-700 
                         font-semibold text-sm py-2 rounded-lg">
                Tersedia
            </span>
        `;
    });
</script>
