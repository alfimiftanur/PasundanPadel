<div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">

        <h2 class="text-2xl font-bold mb-4">Register</h2>

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
        </form>

        <a href="{{ url()->previous() }}" class="block text-center mt-4 text-gray-500">
            Close
        </a>
    </div>
</div>
