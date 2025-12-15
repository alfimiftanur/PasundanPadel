<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-50 text-slate-900 scroll-smooth flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-teal-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <div class="flex items-center">
                    <a href="#" class="text-xl font-bold text-white">PasundanPadel</a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="/#hero" class="text-white hover:text-teal-200">Home</a>
                    <a href="/#court" class="text-white hover:text-teal-200">Court</a>
                    <a href="/us" class="text-white hover:text-teal-200">Us</a>
                    <a href="/contact" class="text-white hover:text-teal-200">Contact</a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <button id="login-btn" class="bg-rose-400 text-slate-900 px-6 py-2 rounded-full hover:bg-rose-500">
                        Login
                    </button>
                    <button id="register-btn"
                        class="bg-rose-400 text-slate-900 px-6 py-2 rounded-full hover:bg-rose-500">
                        Register
                    </button>
                </div>

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
                <a href="/#court" class="block px-3 py-2 text-white">Court</a>
                <a href="/us" class="block px-3 py-2 text-white">Us</a>
                <a href="/contact" class="block px-3 py-2 text-white">Contact</a>

                <button id="login-btn-mobile" class="block w-full text-left px-3 py-2 text-white">
                    Login
                </button>
                <button id="register-btn-mobile" class="block w-full text-left px-3 py-2 text-white">
                    Register
                </button>
            </div>
        </div>
    </nav>

    <!-- LOGIN MODAL -->
    <div id="login-modal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Login</h2>

            <form>
                <div class="mb-4">
                    <label>Email</label>
                    <input type="email" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" class="w-full border rounded px-3 py-2">
                </div>

                <button class="w-full bg-teal-600 text-white py-2 rounded-full">
                    Login
                </button>
            </form>

            <p class="text-sm text-center mt-4 text-gray-500">
                Don’t have an account?
                <button id="to-register" class="text-teal-600 font-semibold hover:underline">
                    Register here
                </button>
            </p>

            <button id="close-login" class="mt-4 text-gray-500 hover:underline">Tutup</button>
        </div>
    </div>

    <!-- Modal Login -->
    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Login</h2>

            <form id="login-form">
                <div class="mb-4">
                    <label class="block text-slate-700">Email</label>
                    <input type="email" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-slate-700">Password</label>
                    <input type="password" class="w-full px-3 py-2 border rounded" required>
                </div>

                <button type="submit" class="w-full bg-teal-600 text-white py-2 rounded-full hover:bg-teal-500">
                    Login
                </button>
            </form>

            <button id="close-login" class="mt-4 text-slate-500 hover:text-slate-700">Tutup</button>
        </div>
    </div>

    <!-- Modal Register -->
    <div id="register-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Register</h2>

            <form id="register-form">
                <div class="mb-4">
                    <label class="block text-slate-700">Nama Lengkap</label>
                    <input type="text" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-slate-700">Email</label>
                    <input type="email" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-slate-700">Password</label>
                    <input type="password" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-slate-700">Konfirmasi Password</label>
                    <input type="password" class="w-full px-3 py-2 border rounded" required>
                </div>


                <!-- Button Register -->
                <button type="submit"
                    class="w-full bg-teal-600 text-white py-3 rounded-full font-semibold hover:bg-teal-700 transition">
                    Register
                </button>

                <!-- Divider -->
                <div class="flex items-center my-6">
                    <hr class="flex-1 border-gray-300">
                    <span class="px-3 text-sm text-gray-400">
                        Register with
                    </span>
                    <hr class="flex-1 border-gray-300">
                </div>

                <div class="flex justify-center gap-6">
                    <!-- Google -->
                    <button class="p-3 rounded-full border border-gray-300 hover:bg-gray-100 transition">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                            class="w-6 h-6">
                    </button>

                    <!-- Facebook -->
                    <button class="p-3 rounded-full border border-gray-300 hover:bg-gray-100 transition">
                        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook"
                            class="w-6 h-6">
                    </button>
                </div>


            </form>

            <button id="close-register" class="mt-4 text-slate-500 hover:text-slate-700">Tutup</button>
        </div>
    </div>
    
    <!-- CONTENT -->
    <main class="flex-1">
        {{ $slot }}
    </main>


    <footer class="bg-teal-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="font-semibold mb-3">About PasundanPadel</h3>
                <p class="text-teal-200">
                    Kami menyediakan lapangan padel terbaik dengan fasilitas modern
                    untuk pemain pemula hingga profesional.
                </p>
            </div>

            <div>
                <h3 class="font-semibold mb-3">Link Cepat</h3>
                <ul class="space-y-2 text-teal-200">
                    <li><a href="/#hero">Home</a></li>
                    <li><a href="/#court">Court</a></li>
                    <li><a href="/us">Us</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-3">Kontak</h3>
                <p class="text-teal-200">Jl. Padel No. 123, Bandung</p>
                <p class="text-teal-200">info@pasundanpadel.com</p>
            </div>
        </div>

        <div class="border-t border-teal-800 text-center py-4 text-teal-300">
            &copy; NEEDSCRYT. The Ball on Your Court.
        </div>
    </footer>

    <!-- SCRIPT -->
    <script>
        const loginModal = document.getElementById('login-modal');
        const registerModal = document.getElementById('register-modal');

        const openLogin = () => {
            loginModal.classList.remove('hidden');
            registerModal.classList.add('hidden');
        };

        const openRegister = () => {
            registerModal.classList.remove('hidden');
            loginModal.classList.add('hidden');
        };

        document.getElementById('login-btn').onclick = openLogin;
        document.getElementById('register-btn').onclick = openRegister;
        document.getElementById('login-btn-mobile').onclick = openLogin;
        document.getElementById('register-btn-mobile').onclick = openRegister;

        document.getElementById('close-login').onclick = () => loginModal.classList.add('hidden');
        document.getElementById('close-register').onclick = () => registerModal.classList.add('hidden');

        document.getElementById('to-register').onclick = openRegister;
        document.getElementById('to-login').onclick = openLogin;

        window.onclick = (e) => {
            if (e.target === loginModal) loginModal.classList.add('hidden');
            if (e.target === registerModal) registerModal.classList.add('hidden');
        };

        document.getElementById('menu-toggle').onclick = () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        };
    </script>

</body>

</html>
