<x-layout>
    <x-slot:title>Booking Berhasil</x-slot:title>

    <section class="bg-slate-50 min-h-screen flex items-center justify-center py-10">
        <div class="max-w-md mx-auto px-6 text-center">
            
            {{-- Success Icon --}}
            <div class="w-32 h-32 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            {{-- Message --}}
            <h1 class="text-2xl font-bold text-gray-800 mb-2">
                Booking successful! Please make payment.
            </h1>

            {{-- Buttons --}}
            <div class="flex gap-4 mt-8">
                <a href="{{ route('home') }}"
                   class="flex-1 bg-white border-2 border-teal-600 text-teal-600 py-3 rounded-lg hover:bg-teal-50 transition font-semibold text-center">
                    Back to Home
                </a>
                
                <a href="{{ route('booking.orders-history') }}"
                   class="flex-1 bg-teal-600 text-white py-3 rounded-lg hover:bg-teal-700 transition font-semibold text-center">
                    Make Payment
                </a>
            </div>
        </div>
    </section>
</x-layout>