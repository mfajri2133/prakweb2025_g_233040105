<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FWeb' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#181a1b] text-white">
    <nav class="sticky top-0 z-50 bg-[#181a1b]/80 backdrop-blur-md border-b border-white/10">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

            <a href="/" class="text-2xl font-bold tracking-wide">
                FWeb
            </a>

            <div class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-[#007bff] transition">Home</a>
                <a href="/about" class="hover:text-[#007bff] transition">About</a>
                <a href="/blog" class="hover:text-[#007bff] transition">Blog</a>
                <a href="/contact" class="hover:text-[#007bff] transition">Contact</a>
            </div>

        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="border-t border-white/10 mt-10">
        <div class="max-w-6xl mx-auto py-6 text-center text-gray-400 text-sm">
            &copy; 2024 FWeb — All Rights Reserved.
        </div>
    </footer>

</body>
</html>
