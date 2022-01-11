<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Multistore</title>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet">

    <livewire:styles />
</head>
<body class="flex min-h-screen">
    <div class="app flex flex-col flex-grow w-full">
        <div class="flex flex-grow w-full">
            <aside class="app-aside flex-shrink-0 h-full w-64">
                <div class="app-logo">
                    <a href="/" title="Multistore">Multistore | LW</a>
                </div>
                <div class="aside-menu">
                    <x-admin.main-menu />
                </div>
            </aside>
            <main class="w-full">
                <div class="bg-[#f8f9fb]">
                    <div class="md:container md:mx-auto">
                        <div class="flex items-center justify-between h-12 w-full">
                            <div class="global-search flex-grow">Search</div>
                            <div class="user-block flex-shrink-0">User</div>
                        </div>

                        @hasSection('content-header')
                            <div class="pt-12">
                                @yield('content-header')
                            </div>
                        @endif
                    </div>
                </div>

                <div class="pt-12">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <livewire:scripts />
    @stack('js')
</body>
</html>
