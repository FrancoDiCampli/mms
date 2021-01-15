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
    
</head>

<body class="">

    <div id="app">    
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed w-full h-full z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
                
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
                @include('partials.headerMenu')

                {{-- Main --}}
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200" @click="sidebarOpen = false">                
                    <div class="container mx-auto px-6 md:px-10 py-8 min-h-full">
                        <p>Dashboard MMS</p>
                        <div class="p-4 w-full md:w-3/12 transition-shadow border rounded-lg shadow-sm hover:shadow-lg bg-white">
                            <div class="flex items-start justify-between">
                              <div class="flex flex-col space-y-2">
                                <span class="text-gray-400">Total Pacientes</span>
                                <span class="text-lg font-semibold">100</span>
                              </div>
                              <div class="p-10 bg-gray-200 rounded-md"></div>
                            </div>
                            <div>
                              <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
                              <span>from 2021</span>
                            </div>
                          </div>                       

                        @yield('content')
                    </div>
                </main>
            </div>       
            
        </div>
    </div>

    @stack('js')
</body>

</html>