<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-50 text-slate-900 scroll-smooth flex flex-col min-h-screen">

    <!-- ================= NAVBAR ================= -->
    <nav class="bg-teal-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-white">PasundanPadel</a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="/#hero" class="text-white hover:text-teal-200">Home</a>
                    <a href="/#court" class="text-white hover:text-teal-200">Court</a>
                    <a href="/us" class="text-white hover:text-teal-200">Us</a>
                    <a href="/contact" class="text-white hover:text-teal-200">Contact</a>
                </div>

                <!-- DESKTOP AUTH -->
                <div class="hidden md:flex items-center space-x-4">
                    <button id="login-btn" class="bg-teal-600 text-slate-900 px-6 py-2 rounded-full hover:bg-teal-500">
                        Login
                    </button>

                    <button id="register-btn"
                        class="bg-teal-600 text-slate-900 px-6 py-2 rounded-full hover:bg-teal-500">
                        Register
                    </button>

                    <button id="logout-btn"
                        class="hidden bg-teal-600 text-slate-900 px-6 py-2 rounded-full hover:bg-teal-500">
                        Logout
                    </button>
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
                <a href="/#court" class="block px-3 py-2 text-white">Court</a>
                <a href="/us" class="block px-3 py-2 text-white">Us</a>
                <a href="/contact" class="block px-3 py-2 text-white">Contact</a>

                <button id="login-btn-mobile" class="block w-full text-left px-3 py-2 text-white">
                    Login
                </button>
                <button id="register-btn-mobile" class="block w-full text-left px-3 py-2 text-white">
                    Register
                </button>
                <button id="logout-btn-mobile" class="hidden block w-full text-left px-3 py-2 text-white">
                    Logout
                </button>
            </div>
        </div>
    </nav>

    <!-- ================= LOGIN MODAL ================= -->
    <div id="login-modal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Login</h2>

            <form id="login-form">
                <div class="mb-4">
                    <label>Email</label>
                    <input type="email" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" class="w-full border rounded px-3 py-2" required>
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

            <button id="close-login" class="mt-4 text-gray-500 hover:underline">Close</button>
        </div>
    </div>

    <!-- ================= REGISTER MODAL ================= -->
    <div id="register-modal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Register</h2>

            <form>
                <div class="mb-4">
                    <label class="block text-slate-700">Full Name</label>
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
                    <label class="block text-slate-700">Re-Password</label>
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

                <!-- Social Login -->
                <div class="flex justify-center gap-6">
                    <!-- Google -->
                    <button type="button" class="p-3 rounded-full border border-gray-300 hover:bg-gray-100 transition">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                            class="w-6 h-6">
                    </button>

                    <!-- Facebook -->
                    <button type="button"
                        class="p-3 rounded-full border border-gray-300 hover:bg-gray-100 transition">
                        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook"
                            class="w-6 h-6">
                    </button>
                </div>
            </form>

            <button id="close-register" class="mt-4 text-slate-500 hover:text-slate-700">
                Close
            </button>
        </div>
    </div>


    <!-- ================= CONTENT ================= -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-teal-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="font-semibold mb-3">About</h3>
                <p class="text-teal-200"> Kami menyediakan lapangan padel terbaik dengan fasilitas modern untuk pemula
                    hingga profesional. </p>
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
                <div class="flex items-center gap-4 mt-3">
                    <!-- Instagram --> <a href="https://instagram.com/pasundanpadel" target="_blank"
                        class="text-teal-200 hover:text-teal-100 transition" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" />
                            <path d="M16 11.37a4 4 0 1 1-7.9 1.26 4 4 0 0 1 7.9-1.26z" />
                            <line x1="17.5" y1="6.5" x2="17.5" y2="6.5" />
                        </svg> </a>
                    <!-- Facebook --> <a href="https://facebook.com/pasundanpadel" target="_blank"
                        class="text-teal-200 hover:text-teal-100 transition" aria-label="Facebook"> <svg
                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-2.9h2V9.8c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2v1.9h2.3l-.4 2.9h-1.9v7A10 10 0 0 0 22 12z" />
                        </svg>
                    </a>
                    <!-- TikTok -->
                    <a href="https://tiktok.com/@pasundanpadel" target="_blank"
                        class="text-teal-200 hover:text-teal-100 transition" aria-label="TikTok">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M12.5 3v10.2a3.3 3.3 0 1 1-2.3-3.1V7.6a6.4 6.4 0 1 0 4.6 6.1V8.8c1.2.9 2.6 1.4 4.1 1.5V7.9a4.9 4.9 0 0 1-4.1-4.9h-2.3z" />
                        </svg>
                    </a>
                </div>
                </a>
            </div>
        </div>
        <div class="border-t border-teal-800 text-center py-4 text-teal-300"> &copy; NEEDSCRYPT. The Ball on Your
            Court. </div>
    </footer>

    <!-- ================= SCRIPT ================= -->
    <script>
        const loginModal = document.getElementById('login-modal');
        const registerModal = document.getElementById('register-modal');

        const loginBtn = document.getElementById('login-btn');
        const registerBtn = document.getElementById('register-btn');
        const logoutBtn = document.getElementById('logout-btn');

        const loginBtnMobile = document.getElementById('login-btn-mobile');
        const registerBtnMobile = document.getElementById('register-btn-mobile');
        const logoutBtnMobile = document.getElementById('logout-btn-mobile');

        const openLogin = () => {
            loginModal.classList.remove('hidden');
            registerModal.classList.add('hidden');
        };

        const openRegister = () => {
            registerModal.classList.remove('hidden');
            loginModal.classList.add('hidden');
        };

        const afterLogin = () => {
            loginModal.classList.add('hidden');

            loginBtn.classList.add('hidden');
            registerBtn.classList.add('hidden');
            loginBtnMobile.classList.add('hidden');
            registerBtnMobile.classList.add('hidden');

            logoutBtn.classList.remove('hidden');
            logoutBtnMobile.classList.remove('hidden');
        };

        const logout = () => {
            logoutBtn.classList.add('hidden');
            logoutBtnMobile.classList.add('hidden');

            loginBtn.classList.remove('hidden');
            registerBtn.classList.remove('hidden');
            loginBtnMobile.classList.remove('hidden');
            registerBtnMobile.classList.remove('hidden');
        };

        loginBtn.onclick = openLogin;
        registerBtn.onclick = openRegister;
        loginBtnMobile.onclick = openLogin;
        registerBtnMobile.onclick = openRegister;

        logoutBtn.onclick = logout;
        logoutBtnMobile.onclick = logout;

        document.getElementById('close-login').onclick = () => loginModal.classList.add('hidden');
        document.getElementById('close-register').onclick = () => registerModal.classList.add('hidden');

        document.getElementById('to-register').onclick = openRegister;

        document.getElementById('login-form').onsubmit = (e) => {
            e.preventDefault();
            afterLogin();
        };

        document.getElementById('menu-toggle').onclick = () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        };
    </script>

</body>

</html>
