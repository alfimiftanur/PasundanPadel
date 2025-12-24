<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PasundanPadel' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
</head>

<body class="bg-amber-50 text-slate-900 scroll-smooth flex flex-col min-h-screen">

    <!-- navbar -->
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
                    <a href="/#us" class="text-white hover:text-teal-200">Experience</a>
                    <a href="{{ route('court.index') }}" class="text-white hover:text-teal-200">
                        Court
                    </a>
                    <a href="/schedule" class="text-white hover:text-teal-200">Schedule</a>

                </div>

                <!-- auth button-->
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
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                                class="bg-amber-500 text-white px-6 py-2 rounded-full hover:bg-amber-600 font-semibold">
                                Admin Dashboard
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700">
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

            <!-- mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden bg-teal-600 px-2 pt-2 pb-3 space-y-1">
                <a href="/#hero" class="block px-3 py-2 text-white">Home</a>
                <a href="{{ route('court.index') }}" class="block px-3 py-2 text-white hover:text-teal-200"> Court</a>
                <a href="/#us" class="block px-3 py-2 text-white">Experience</a>
                

                @guest
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-white">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 text-white">
                        Register
                    </a>
                @endguest

                @auth
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="block px-3 py-2 text-white bg-amber-500 rounded font-semibold">
                            Admin Dashboard
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="block w-full text-left px-3 py-2 text-white bg-red-600 rounded hover:bg-red-700">
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
        
        document.querySelectorAll('#mobile-menu a, #mobile-menu button').forEach(el => {
            el.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>

    
    @if (session('success'))
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg w-full max-w-sm text-center">
                <div class="flex justify-center mb-4">
                    <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Sukses!</h3>
                <p class="text-gray-600 mb-6">{{ session('success') }}</p>
                <button onclick="this.closest('.fixed').remove()" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg">
                    Tutup
                </button>
            </div>
        </div>
    @endif

    @if (session('popup_message'))
        <div id="notification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center gap-3 animate-fadeIn">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('popup_message') }}</span>
        </div>
        <script>
            setTimeout(() => {
                const notif = document.getElementById('notification');
                if (notif) {
                    notif.style.animation = 'fadeOut 0.5s ease-out forwards';
                    setTimeout(() => notif.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    @if (session('error'))
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg w-full max-w-sm text-center">
                <div class="flex justify-center mb-4">
                    <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Gagal!</h3>
                <p class="text-gray-600 mb-6">{{ session('error') }}</p>
                <button onclick="window.location.href='{{ url()->previous() }}'" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-lg">
                    Tutup
                </button>
            </div>
        </div>
    @endif

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(100px);
            }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
    </style>

    @if (session('showLogin'))
        @include('auth.login')
    @endif

    @if (session('showRegister')|| $errors-> any()) 
        @include('auth.register')
    @endif

</body>

</html>
