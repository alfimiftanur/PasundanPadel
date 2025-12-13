<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{ $title }}</title>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">
    <!-- Navbar -->
    <nav class="bg-red-900 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="text-xl font-bold text-white">PasundanPadel</a>
                </div>
                
                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/home" class="text-white hover:text-red-200">Home</a>
                    <a href="/court" class="text-white hover:text-red-200">Court</a>
                    <a href="/us" class="text-white hover:text-red-200">Us</a>
                    <a href="/contact" class="text-white hover:text-red-200">Contact</a>
                </div>

                <!-- Tombol Login/Register Desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    <button id="login-btn" class="bg-white text-red-900 px-4 py-2 rounded hover:bg-gray-100">Login</button>
                    <button id="register-btn" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-200">Register</button>
                </div>
                
                <!-- Hamburger Menu untuk Mobile -->
                <div class="md:hidden flex items-center">
                    <button id="menu-toggle" class="text-white hover:text-red-200 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Menu Mobile (Hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-red-800">
                    <a href="/home" class="block px-3 py-2 text-white hover:text-red-200">Home</a>
                    <a href="/court" class="block px-3 py-2 text-white hover:text-red-200">Court</a>
                    <a href="/us" class="block px-3 py-2 text-white hover:text-red-200">Us</a>
                    <a href="/contact" class="block px-3 py-2 text-white hover:text-red-200">Contact</a>
                   <!-- Tombol Login/Register Mobile -->
                    <button id="login-btn-mobile" class="block w-full text-left px-3 py-2 text-white hover:text-red-200">Login</button>
                    <button id="register-btn-mobile" class="block w-full text-left px-3 py-2 text-white hover:text-red-200">Register</button>
                </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama (Placeholder) -->
    <main class="p-4">
        <h1 class="text-3xl font-bold text-center mb-4">Welcome PasundanPadel!</h1>
        <p class="text-center">Tempat terbaik untuk bermain padel di daerah Pasundan. Nikmati lapangan berkualitas dan komunitas yang ramah.</p>
       
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Kolom 1: Tentang -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tentang PasundanPadel</h3>
                    <p class="text-gray-400">Kami menyediakan lapangan padel terbaik dengan fasilitas modern untuk pemain pemula hingga profesional. Bergabunglah dengan komunitas kami!</p>
                </div>
                
                <!-- Kolom 2: Link Cepat -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Cacth Us</h3>
                    <ul class="space-y-2">
                        <li><a href="/home" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="/court" class="text-gray-400 hover:text-white">Court</a></li>
                        <li><a href="/us" class="text-gray-400 hover:text-white">Us</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Kolom 3: Kontak dan Sosial -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Catch Us</h3>
                    <p class="text-gray-400 mb-2">Alamat: Jl. Padel No. 123, Bandung, Indonesia</p>
                    <p class="text-gray-400 mb-2">Telepon: +62 812-3156-7890</p>
                    <p class="text-gray-400 mb-4">Email: info@pasundanpadel.com</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-white">Instagram</a>
                        <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-4 text-center">
                <p> PasundanPadel. - The Ball on Your Court</p>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript untuk toggle menu mobile
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
