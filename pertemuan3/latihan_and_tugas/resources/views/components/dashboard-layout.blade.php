<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard - FWeb' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900">
    <div class="flex h-screen overflow-hidden">
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform transition-transform duration-300 lg:translate-x-0 -translate-x-full">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">
                    <a href="/" class="flex items-center space-x-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-[#007bff] to-[#0056d2] rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                            <span class="text-xl font-bold text-white">F</span>
                        </div>
                        <span class="text-xl font-bold text-gray-900">FWeb</span>
                    </a>
                    <button id="closeSidebar" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <a href="/dashboard"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors {{ request()->is('dashboard*') ? 'bg-blue-50 text-[#007bff]' : 'text-gray-700' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <a href="/categories"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-100 transition-colors {{ request()->is('categories*') ? 'bg-blue-50 text-[#007bff]' : 'text-gray-700' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <span class="font-medium">Categories</span>
                    </a>
                </nav>

                <div class="p-4 border-t border-gray-200">
                    <div
                        class="flex items-center space-x-3 px-3 py-3 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center text-white font-semibold">
                            A
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col lg:ml-64">
            <header class="sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="openSidebar" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <h1 class="text-2xl font-bold text-gray-900">{{ $title ?? 'Dashboard' }}</h1>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const overlay = document.getElementById('overlay');

        openSidebar?.addEventListener('click', () => {
            sidebar?.classList.remove('-translate-x-full');
            overlay?.classList.remove('hidden');
        });

        closeSidebar?.addEventListener('click', () => {
            sidebar?.classList.add('-translate-x-full');
            overlay?.classList.add('hidden');
        });

        overlay?.addEventListener('click', () => {
            sidebar?.classList.add('-translate-x-full');
            overlay?.classList.add('hidden');
        });
    </script>
</body>

</html>
