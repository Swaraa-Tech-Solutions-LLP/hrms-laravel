<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Vite support --}}
</head>
<body class="bg-gray-100">
<main class="p-6">
    <div class="h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-96">
            <div class="auth-logo text-center mb-4">
                <img src="https://13.250.98.91/assets/images/logo.png" alt="Logo" class="mx-auto" style="width: 140px; height: auto;">
            </div>
            <h1 class="mb-3 text-[18px] text-[#03060a] tracking-[0.3px] leading-[1.6]">Sign In</h1>
            <form action="{{route('login.post')}}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="email" class="text-[12px] text-[#1b406c] tracking-[0.3px] leading-[1.6] mb-2">Email</label>
                    <input id="email" type="email" class="w-full rounded-[20px] bg-[#f8f9fa] border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none transition-all duration-200 pt-0.5 pb-0.5 pl-3 focus:shadow-md" name="email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="text-[12px] text-[#1b406c] tracking-[0.3px] leading-[1.6] mb-2">Password</label>
                    <input id="password" type="password" class="w-full rounded-[20px] bg-[#f8f9fa] border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none transition-all duration-200 pt-0.5 pb-0.5 pl-3 focus:shadow-md" name="password" required>
                </div>
                <button class="w-full bg-[#003473] text-white text-[12px] rounded-[40px] mt-2 border border-transparent py-1.5 px-3 tracking-[0.3px] leading-[1.6] hover:bg-[#002A57] transition-colors duration-300 shadow-md">Sign In</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
