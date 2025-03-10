<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Laravel App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Vite support --}}
</head>
<body class="bg-gray-100">

    <x-header />
    
    <main class="p-6">
        {{ $slot }}
    </main>

</body>
</html>
