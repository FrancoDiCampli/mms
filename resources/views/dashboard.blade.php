<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,500,600">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="{{ mix('js/app.js') }}" defer></script>

    @livewireStyles
</head>

<body class="">

    <div id="app">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed w-full h-full z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            {{-- Sidebar menu mobile--}}
            <div class="block lg:hidden">
                @include('partials.sidebarMobile')
            </div>

            {{-- Sidebar menu desktop--}}
            <div class="hidden lg:block">
                @include('partials.sidebarDesktop')
            </div>

            <div class="flex-1 flex flex-col overflow-hidden">
                {{-- Header menu --}}
                <div @click.away="sidebarOpen = false">
                    @include('partials.headerMenu')
                </div>

                {{-- Main --}}
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200" @click="sidebarOpen = false">
                    <div class="container mx-auto px-6 md:px-10 py-8 min-h-full">
                        
                        @yield('content')
                    </div>
                </main>
            </div>

        </div>
    </div>

    @stack('js')

    @livewireScripts
</body>

</html>