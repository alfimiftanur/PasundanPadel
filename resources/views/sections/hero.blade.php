
    {{-- hero sec --}}
    <section id="hero" class="relative min-h-[90vh] flex items-center"
        style="background-image: url('https://images.unsplash.com/photo-1622668460389-f92e9ed21616?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r 
                from-amber-50/100 via-amber-50/50 to-transparent">
        </div>

        {{-- <!-- Content --> --}}
        <div class="relative z-10 max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

            <!-- Text -->
            <div>
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight text-slate-900">
                    Book Your<br>
                    <span class="text-teal-700">Padel Court</span><br>
                    Easily
                </h1>

                <p class="mt-5 text-slate-700 max-w-md">
                    Pengalaman booking lapangan padel yang cepat, nyaman, dan modern.
                    Cocok untuk pemula hingga profesional.
                </p>

                <div class="mt-8 flex gap-4">
                    <a href="/court"
                        class="bg-teal-600 hover:bg-teal-500 text-white
                    px-8 py-3 rounded-full font-semibold transition">
                        Book Now
                    </a>
                </div>
            </div>
            <!-- Booking Card -->
            <div class="hidden md:block">
                <div class="bg-white/40 backdrop-blur-md rounded-3xl p-6
           border border-white/60 shadow-lg">

                    <div class="space-y-3">

                        <!-- Location -->
                        <select name="location"
                            class="w-full px-4 py-3 rounded-xl border bg-white/70
               focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <option value="">Select Court</option>
                            <option value="bandung">Court A</option>
                            <option value="jakarta">Court B</option>
                            <option value="yogyakarta">Court C</option>
                        </select>

                        <!-- Date -->
                        <input type="date" name="date"
                            class="w-full px-4 py-3 rounded-xl border
               focus:outline-none focus:ring-2 focus:ring-teal-500">

                     
                        <!-- Button -->
                        <button
                            class="w-full bg-teal-600 hover:bg-teal-500
               text-white py-3 rounded-full font-semibold transition">
                            Check Availability
                        </button>

                    </div>
                </div>
            </div>


        </div>
    </section>
