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
                <div >
                    @include('partials.headerMenu')
                </div>

                {{-- Main --}}
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-background" @click="sidebarOpen = false">
                    <div class=" mx-auto px-6 md:px-10 py-8 min-h-full">
                        
                        @yield('content')

                        <div class="">
                            <p class="text-text-500 text-2xl m-3 font-medium">UI Kit Concept</p>
                        </div>

                        <div class="md:flex w-full">                            
                            {{-- card typography --}}
                            <div class="w-full md:w-6/12 card">
                                <div>
                                    <p class="text-text-400 text-xl my-1 font-medium border-b border-text-100">UI Typography</p>
                                </div>

                                <div class="mt-6">              
                                    <p class="text-text-400 text-3xl font-black">AaBbCcDd (Header)</p>
                                    <p class="text-text-400 text-2xl text- font-extrabold">AaBbCcDd (Header)</p>                                
                                    <p class="text-text-400 text-2xl font-bold">AaBbCcDd (Título)</p>
                                    <p class="text-text-400 text-xl font-semibold">AaBbCcDd (Subtítulo)</p>
                                    <p class="text-text-400 text-lg font-medium">AaBbCcDd (Subtítulo)</p>
                                    <p class="text-text-400 text-base font-normal">AaBbCcDd (Párrafo)</p>                                
                                    <p class="text-text-400 text-base font-light">AaBbCcDd (Párrafo)</p>
                                </div>                          
                            </div>

                            {{-- card buttons --}}
                            <div class="w-full md:w-6/12 card">
                                <div>
                                    <p class="text-text-400 text-xl my-1 font-medium border-b border-text-100">UI Buttons</p>
                                </div>                            
                                
                                <div class="mt-6">

                                        {{-- primary button --}}
                                        <button class="btn btn-primary">
                                            <svg class="w-5 h-5 mr-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Primary
                                        </button>

                                        {{-- secondary button --}}                                        
                                        <button class="btn btn-secondary">
                                            <svg class="w-5 h-5 mr-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Secondary
                                        </button>
                                        
                                        {{-- secondary default --}}                                        
                                        <button class="btn btn-default">
                                            <svg class="w-5 h-5 mr-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Default
                                        </button>
                                    
                                </div>

                                {{-- button action --}}
                                <div class="mt-6">

                                    <button class="btn-action">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    
                                    <button class="btn-action mx-1">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                    <button class="btn-action-light">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                    <button class="btn-action-light">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>



                        <div class="w-full md:w-6/12 card"> 
                            <div>
                                <p class="text-text-400 text-xl my-1 font-medium border-b border-text-100">UI Inputs</p>
                            </div>                      
                            {{-- input standard --}}                           
                            <div class="mt-5">
                                <label for="" class="text-base text-text-300">Email</label>
                                <input autofocus class="input-base" placeholder="E-Mail">
                            </div>                           
                            
                            {{-- input standard error --}}                           
                            <div class="mt-5">
                                <label for="" class="text-base text-text-300">Email Error</label>
                                <input autofocus class="input-error" placeholder="E-Mail">
                            </div>                           

                            {{-- input icon --}}
                            <div class="mt-5">
                                <label for="" class="text-base text-text-300">Email (Disabled)</label>

                                <div class="relative mt-1">
                                    <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-text-200">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    <input class="input-icon cursor-not-allowed" placeholder="E-Mail" disabled>
                                </div>
                            </div>                        
                        </div>


                        {{-- card table --}}
                        <div class="w-full md:w-12/12 card">
                            <div>
                                <p class="text-text-400 text-xl my-1 font-medium border-b border-text-100">UI Table</p>
                            </div>
                        <!-- Table  -->
                            
                            <div class="flex flex-col mt-6">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                                        <thead class="bg-table-header">
                                        <tr>
                                            <th
                                            scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                                            >
                                            Name
                                            </th>
                                            <th
                                            scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                                            >
                                            Title
                                            </th>
                                            <th
                                            scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                                            >
                                            Status
                                            </th>
                                            <th
                                            scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                                            >
                                            Role
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                        <template x-for="i in 10" :key="i">
                                            <tr class="transition-all hover:bg-hover hover:shadow">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img
                                                    class="w-10 h-10 rounded-full"
                                                    src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                                    alt=""
                                                    />
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Ahmed Kamel</div>
                                                    <div class="text-sm text-gray-500">ahmed.kamel@example.com</div>
                                                </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                                <div class="text-sm text-gray-500">Optimization</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                                                >
                                                Active
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Admin</td>
                                            <td class="flex items-center px-6 py-6">
                                                <a href="#" class="btn-action-light">
                                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>                                            
                                         
                                                <a href="#" class="btn-action-light">
                                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </td>
                                            </tr>
                                        </template>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
            </div>

        </div>

        

        
    </div>

    @stack('js')

    @livewireScripts
</body>

</html>