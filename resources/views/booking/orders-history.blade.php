<x-layout>
    <x-slot:title>My Order</x-slot:title>

    <section class="max-w-6xl mx-auto mt-10 mb-10">

        <!-- header -->
        <div class="mb-8">

            <!-- title -->
            <h2 class="text-5xl italic font-semibold font-serif text-teal-900 mb-4">
                Order History
            </h2>

            <!-- tabs -->
            <div class="flex gap-8 text-sm font-medium border-b mb-6">
                <button class="pb-3 border-b-2 border-teal-600 text-teal-600">
                    All Order
                </button>
                <button class="pb-3 text-gray-500 hover:text-gray-700">
                    Upcoming
                </button>
                <button class="pb-3 text-gray-500 hover:text-gray-700">
                    Completed
                </button>
                <button class="pb-3 text-gray-500 hover:text-gray-700">
                    Cancelled
                </button>
            </div>

            <!-- Search -->
            <div class="relative w-full md:w-80">
                <input type="text" placeholder="Search..."
                    class="w-full rounded-full border px-10 py-2 text-sm
                   focus:outline-none focus:ring-2 focus:ring-teal-500">

                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>
            </div>

        </div>


        <!-- table -->
        <div class="bg-white rounded-xl border shadow-sm overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-teal-500 text-slate-700">
                    <tr>
                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Date</th>
                        <th class="px-6 py-4 text-left">Time</th>
                        <th class="px-6 py-4 text-left">Court</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Amount</th>
                        <th class="px-6 py-4 text-center">Invoice</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    <!-- 1 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-teal-600">
                            001
                        </td>
                        <td class="px-6 py-4">2025-07-20</td>
                        <td class="px-6 py-4">18:00 - 19:00</td>
                        <td class="px-6 py-4">Court A</td>
                        <td class="px-6 py-4 text-yellow-600 font-medium">
                            Upcoming
                        </td>
                        <td class="px-6 py-4">Rp500.000</td>
                        <td class="px-6 py-4 text-center">
                            <div x-data="{ open: false }" class="relative inline-block">
                                <button @click="open = !open"
                                    class="p-2 border rounded hover:bg-gray-100 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </button>

                                <div x-show="open" x-transition @click.outside="open = false"
                                    class="absolute right-0 mt-2 w-36 bg-white border rounded-lg shadow-lg z-[9999]">
                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 text-left">
                                        Export PDF
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- 2 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-teal-600">
                            002
                        </td>
                        <td class="px-6 py-4">2025-07-18</td>
                        <td class="px-6 py-4">10:00 - 11:00</td>
                        <td class="px-6 py-4">Court C</td>
                        <td class="px-6 py-4 text-green-600 font-medium">
                            Completed
                        </td>
                        <td class="px-6 py-4">Rp350.000</td>
                        <td class="px-6 py-4 text-center">
                            <div x-data="{ open: false }" class="relative inline-block">
                                <button @click="open = !open"
                                    class="p-2 border rounded hover:bg-gray-100 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </button>

                                <div x-show="open" x-transition @click.outside="open = false"
                                    class="absolute right-0 mt-2 w-36 bg-white border rounded-lg shadow-lg z-[9999]">
                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 text-left">
                                        Export PDF
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- 3 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-teal-600">
                            003
                        </td>
                        <td class="px-6 py-4">2025-07-15</td>
                        <td class="px-6 py-4">20:00 - 21:00</td>
                        <td class="px-6 py-4">Court B</td>
                        <td class="px-6 py-4 text-red-600 font-medium">
                            Cancelled
                        </td>
                        <td class="px-6 py-4">Rp500.000</td>
                        <td class="px-6 py-4 text-center">
                            <div x-data="{ open: false }" class="relative inline-block">
                                <button @click="open = !open"
                                    class="p-2 border rounded hover:bg-gray-100 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </button>

                                <div x-show="open" x-transition @click.outside="open = false"
                                    class="absolute right-0 mt-2 w-36 bg-white border rounded-lg shadow-lg z-[9999]">
                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 text-left">
                                        Export PDF
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </section>
</x-layout>
