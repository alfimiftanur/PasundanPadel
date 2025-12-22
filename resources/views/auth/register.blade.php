<div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">

        <h2 class="text-2xl font-bold mb-4">Register</h2>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="mb-4">
                <label>Full Name</label>
                <input type="text" name="name"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label>Re-Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <button class="w-full bg-teal-600 text-white py-2 rounded-full">
                Register
            </button>
            <!-- Divider -->
                <div class="flex items-center my-6">
                    <hr class="flex-1 border-gray-300">
                    <span class="px-3 text-sm text-gray-400">
                        OR
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
                </div>
            </form>
        </form>

        <a href="{{ url()->previous() }}" class="block text-center mt-4 text-gray-500">
            Close
        </a>
    </div>
</div>
