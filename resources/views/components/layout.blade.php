<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PasundanPadel' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-50 text-slate-900 scroll-smooth flex flex-col min-h-screen">

    <!-- ================= NAVBAR ================= -->
    <nav class="bg-teal-700 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-white">
                        PasundanPadel
                    </a>
                </div>

                <!-- Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/#hero" class="text-white hover:text-teal-200">Home</a>
                    <a href="{{ route('court.index') }}" class="text-white hover:text-teal-200">
                        Court
                    </a>
                    <a href="/us" class="text-white hover:text-teal-200">Us</a>
                    <a href="/contact" class="text-white hover:text-teal-200">Contact</a>
                </div>

                <!-- AUTH BUTTON -->
                <div class="hidden md:flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}"
                            class="bg-teal-600 text-slate-900 px-6 py-2 rounded-full hover:bg-teal-500">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="bg-teal-600 text-slate-900 px-6 py-2 rounded-full hover:bg-teal-500">
                            Register
                        </a>
                    @endguest

                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="bg-teal-600 text-slate-900 px-6 py-2 rounded-full hover:bg-teal-500">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>

                <!-- HAMBURGER -->
                <div class="md:hidden flex items-center">
                    <button id="menu-toggle" class="text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>

            <!-- MOBILE MENU -->
            <div id="mobile-menu" class="hidden md:hidden bg-teal-600 px-2 pt-2 pb-3 space-y-1">
                <a href="/#hero" class="block px-3 py-2 text-white">Home</a>
                <a href="{{ route('court.index') }}" class="block px-3 py-2 text-white hover:text-teal-200"> Court</a>
                <a href="/us" class="block px-3 py-2 text-white">Us</a>
                <a href="/contact" class="block px-3 py-2 text-white">Contact</a>

                @guest
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-white">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 text-white">
                        Register
                    </a>
                @endguest

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="block w-full text-left px-3 py-2 text-white">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- ================= CONTENT ================= -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-teal-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">

            <div>
                <h3 class="font-semibold mb-3">About</h3>
                <p class="text-teal-200">
                    Kami menyediakan lapangan padel terbaik dengan fasilitas modern
                    untuk pemula hingga profesional.
                </p>
            </div>

            <div>
                <h3 class="font-semibold mb-3">Link</h3>
                <ul class="space-y-2 text-teal-200">
                    <li><a href="/#hero">Home</a></li>
                    <li><a href="/#court">Court</a></li>
                    <li><a href="/us">Us</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-3">Catch Us</h3>
                <p class="text-teal-200">Jl. Padel No. 123, Bandung</p>
                <p class="text-teal-200">info@pasundanpadel.com</p>
                <p class="text-teal-200">+62 812-3304-2025</p>
                <div class="flex items-center gap-4 mt-3"> <!-- Instagram --> <a
                        href="https://instagram.com/pasundanpadel" target="_blank"
                        class="text-teal-200 hover:text-teal-100 transition" aria-label="Instagram"> <svg
                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" />
                            <path d="M16 11.37a4 4 0 1 1-7.9 1.26 4 4 0 0 1 7.9-1.26z" />
                            <line x1="17.5" y1="6.5" x2="17.5" y2="6.5" />
                        </svg> </a> <!-- Facebook --> <a href="https://facebook.com/pasundanpadel" target="_blank"
                        class="text-teal-200 hover:text-teal-100 transition" aria-label="Facebook"> <svg
                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-2.9h2V9.8c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2v1.9h2.3l-.4 2.9h-1.9v7A10 10 0 0 0 22 12z" />
                        </svg> </a> <!-- TikTok --> <a href="https://tiktok.com/@pasundanpadel" target="_blank"
                        class="text-teal-200 hover:text-teal-100 transition" aria-label="TikTok"> <svg
                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M12.5 3v10.2a3.3 3.3 0 1 1-2.3-3.1V7.6a6.4 6.4 0 1 0 4.6 6.1V8.8c1.2.9 2.6 1.4 4.1 1.5V7.9a4.9 4.9 0 0 1-4.1-4.9h-2.3z" />
                        </svg> </a> </div> </a>
            </div>
        </div>

        <div class="border-t border-teal-800 text-center py-4 text-teal-300">
            &copy; NEEDSCRYPT. The Ball on Your Court.
        </div>
    </footer>
    
<script>
    const toggleBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    toggleBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // auto close kalau klik menu
    document.querySelectorAll('#mobile-menu a, #mobile-menu button').forEach(el => {
        el.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });
</script>
</body>

</html>
