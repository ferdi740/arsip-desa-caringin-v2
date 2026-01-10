<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Arsip Desa</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        
        @include('partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            
            @include('partials.navbar')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>

        <div x-show="sidebarOpen" @click="sidebarOpen = false" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-50"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-50"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-20 bg-black opacity-50 lg:hidden" style="display: none;">
        </div>
    </div>

    @stack('scripts')

</body>
</html>