<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking Detail - Pasundan Padel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
    </style>
</head>

<body class="bg-slate-200 text-slate-800 text-[11px]">

    <div class="w-[210mm] min-h-[297mm] mx-auto bg-white p-[22mm]">


        <div class="flex justify-between items-start border-b-2 border-teal-700 pb-4 mb-7">
            <div>
                <h1 class="text-[22px] font-bold text-teal-700 tracking-wide">
                    Booking Detail
                </h1>
                <span
                    class="inline-block mt-2 px-4 py-1 rounded-full text-[10px] font-semibold
                             bg-blue-100 text-blue-800">
                    Completed
                </span>
            </div>

            <div class="text-right text-[10px] text-slate-500 leading-relaxed">
                Booking #002<br>
                Printed on December 29, 2025 · 11:03
            </div>
        </div>


        <div class="mb-7">
            <h2 class="text-sm font-semibold text-teal-700 mb-3">
                Customer Information
            </h2>

            <div class="border rounded-xl bg-slate-50 p-4 space-y-2">
                <div class="flex justify-between">
                    <span class="text-[10px] text-slate-500">Name</span>
                    <span class="font-semibold">menbehave</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-[10px] text-slate-500">Email</span>
                    <span class="font-semibold">jay@mail.com</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-[10px] text-slate-500">Phone</span>
                    <span class="font-semibold">087705991787</span>
                </div>
            </div>
        </div>


        <div class="mb-7 grid grid-cols-2 gap-5">

            <div class="border rounded-xl bg-slate-50 p-4">
                <h2 class="text-sm font-semibold text-teal-700 mb-3">Court</h2>
                <div class="flex justify-between mb-2">
                    <span class="text-[10px] text-slate-500">Court Name</span>
                    <span class="font-semibold">Philanthropy</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-[10px] text-slate-500">Notes</span>
                    <span class="font-semibold">cj</span>
                </div>
            </div>

            <div class="border rounded-xl bg-slate-50 p-4">
                <h2 class="text-sm font-semibold text-teal-700 mb-3">Schedule</h2>
                <div class="flex justify-between mb-2">
                    <span class="text-[10px] text-slate-500">Date</span>
                    <span class="font-semibold">29 December 2025</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-[10px] text-slate-500">Time</span>
                    <span class="font-semibold">18:00 – 19:00 WIB</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-[10px] text-slate-500">Duration</span>
                    <span class="font-semibold">1 Hour</span>
                </div>
            </div>

        </div>


        <div>
            <h2 class="text-sm font-semibold text-teal-700 mb-3">
                Payment Summary
            </h2>

            <div class="border rounded-xl bg-slate-50 p-4 space-y-2">
                <div class="flex justify-between">
                    <span>Price / Hour</span>
                    <span class="font-semibold">Rp 10,000</span>
                </div>
                <div class="flex justify-between">
                    <span>Duration</span>
                    <span class="font-semibold">1 Hour</span>
                </div>

                <div class="border-t border-dashed my-3"></div>

                <div class="flex justify-between text-[15px] font-bold text-blue-600">
                    <span>Total</span>
                    <span>Rp 10,000</span>
                </div>

                <div class="flex justify-between items-center mt-3">
                    <span>Payment Status</span>
                    <span
                        class="px-4 py-1 rounded-full text-[10px] font-semibold
                                 bg-green-100 text-green-800">
                        Paid
                    </span>
                </div>
            </div>
        </div>


        <div class="mt-8 pt-4 border-t text-center text-[9px] text-slate-400">
            This booking detail was generated automatically by Pasundan Padel Management System<br>
            © 2025 Pasundan Padel
        </div>

    </div>

</body>

</html>
