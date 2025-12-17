<div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4">Login</h2>

        <form method="POST" action="/login">
            @csrf

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

            <button class="w-full bg-teal-600 text-white py-2 rounded-full">
                Login
            </button>
        </form>

        <p class="text-sm text-center mt-4">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-teal-600 font-semibold">
                Register here
            </a>
        </p>

        <a href="{{ url()->previous() }}" class="block text-center mt-4 text-gray-500">
            Close
        </a>
    </div>
</div>
