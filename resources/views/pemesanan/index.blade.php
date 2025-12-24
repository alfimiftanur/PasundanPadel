<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div id="booking-list" class=" bg-[#dfe6db] max-w-7xl mx-auto py-6 px-4">


        <!-- HEADER -->
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">
                Booking Information
            </h1>
        </div>


        <!-- stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2 mb-2">
            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-slate-500">Total Booking</p>
                <p class="text-2xl font-bold">11</p>
            </div>

            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-slate-500">Pending</p>
                <p class="text-2xl font-bold text-yellow-500">2</p>
            </div>

            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-slate-500">Confirmed</p>
                <p class="text-2xl font-bold text-green-600">6</p>
            </div>

            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-slate-500">Cancelled</p>
                <p class="text-2xl font-bold text-red-600">3</p>
            </div>

            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-slate-500">Waiting</p>
                <p class="text-2xl font-bold text-blue-500">2</p>
            </div>
        </div>

        <!-- filter -->
        <div class="bg-white p-6 rounded-xl shadow mb-2">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center">

                <!-- search-->
                <div class="md:col-span-2 relative group">
                    <!-- icon search-->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5
                   text-slate-400 group-focus-within:text-gray-500 transition">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <!-- input -->
                    <input type="text" name="search" placeholder="Cari berdasarkan user atau lapangan"
                        class="w-full border border-slate-200 rounded-xl
                   pl-11 pr-10 py-2
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    <!-- clear -->
                    <button type="button"
                        onclick="this.previousElementSibling.value=''; this.previousElementSibling.focus();"
                        class="absolute right-4 top-1/2 -translate-y-1/2
           text-slate-400 hover:text-slate-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>

                <!-- status booking-->
                <select name="status_booking" class="border border-slate-200 rounded-xl px-4 py-2">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <!-- payment status-->
                <select name="status_pembayaran" class="border border-slate-200 rounded-xl px-4 py-2">
                    <option value="">All Payment Status</option>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                </select>

                <!-- button -->
                <button
                    class="bg-[#619b76] hover:bg-[#4a7a5d] text-white
               rounded-xl font-semibold py-2">
                    Apply
                </button>
            </form>


        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-xl shadow overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-slate-600">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">User</th>
                        <th class="px-4 py-3 text-left">Lapangan</th>
                        <th class="px-4 py-3 text-left">Tanggal & Jam</th>
                        <th class="px-4 py-3 text-left">Total</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Pembayaran</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <tr>
                        <td class="px-4 py-3">#11</td>
                        <td class="px-4 py-3">
                            <div class="font-semibold">User Demo</div>
                            <div class="text-xs text-slate-500">
                                user@padelcourt.com
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="font-semibold">Padel court A</div>
                            <div class="text-xs text-slate-500">
                                lt.1 hall A
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            21 Dec 2025<br>
                            18:00 - 19:00
                        </td>
                        <td class="px-4 py-3">Rp 150.000</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                Confirmed
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                Paid
                            </span>
                        </td>
                        <td class="px-4 py-3 font-semibold">
                            <a href="/detail-booking" class="text-blue-600 hover:underline">
                                Detail
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        </d>
</x-layout>
