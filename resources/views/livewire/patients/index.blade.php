<div id="component">
    <div class="card">
        <div class="flex items-center">   
            <svg class="w-6 h-6 text-text-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-text-500 text-2xl m-1 font-medium">Pacientes</p>
        </div>

        <div class="mt-3 mb-4 flex items-center">

            <div class="w-full md:w-1/2 flex items-center">       
                {{-- Search --}}
                <div class="w-full items-center select-none">
                    <div class="relative mr-0 md:mr-5">
                        <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-text-200">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input class="input-icon" placeholder="Buscar paciente" wire:model.debounce.500ms="search" type="search" id="paciente" name="paciente">
                    </div>
                </div>

                <button class="btn btn-default shadow-none hidden md:flex mr-1">
                    <svg class="w-5 h-5 mr-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Exportar
                </button>
            </div>

            <div class="w-1/2 hidden md:flex items-center justify-end">            
                <div class="flex items-center select-none">
                    <a href="{{route('patients.create')}}" class="btn btn-primary">
                        <svg class="w-5 h-5 mr-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Agregar Paciente
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- card table --}} 
    <div class="card mt-5">

        {{-- Info notfication offline --}}
        <div wire:offline class="text-lg text-center py-2 mb-6 md:flex items-center card bg-gradient-to-r from-white to-notification-info">                            
            <div class="flex items-center w-full">
                <svg  class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" style=";background:0 0" width="251" height="251" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" display="block"><circle cx="28" cy="75" r="11" fill="#93dbe9"><animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="0s"/></circle><path d="M28 47a28 28 0 0128 28" fill="none" stroke="#689cc5" stroke-width="10"><animate attributeName="stroke-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="0.1s"/></path><path d="M28 25a50 50 0 0150 50" fill="none" stroke="#5e6fa3" stroke-width="10"><animate attributeName="stroke-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="0.2s"/></path></svg>    
                <div class="ml-3 md:flex items-center text-left">
                    <p class="text-base font-medium ">¡Sin conexión!</p>
                    <p class="text-sm tracking-wide text-text-400 md:ml-4 ">Verifica tu conexion a Internet.</p>
                </div>
            </div>                           
        </div>

            
        <!-- Table  -->    
        <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden border-b border-gray-200 rounded">
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-table-header">
                    <tr>
                        <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                        >
                        Paciente
                        </th>
                        <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                        >
                        DNI
                        </th>
                        <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                        >
                        TELÉFONO
                        </th>
                        <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                        >
                        ACCIONES
                        </th>
                    </tr>
                    </thead>
                    
                    <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($patients ?? [] as $patient)
                        <tr class="transition-all hover:bg-hover hover:shadow">
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="flex items-center">                       
                            <div class="">
                                <div class="text-sm font-medium text-gray-900">{{$patient->full_name}}</div>
                                <div class="text-sm text-gray-500">{{$patient->num_affiliate}}</div>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$patient->dni}}</div>
                            
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$patient->phone}}</div>
                            
                        </td>
                        
                        <td class="flex items-center px-6 py-4">
                            <a title="Ver Más" href="{{route('patients.show', $patient->id)}}" class="btn-action-light">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>      
    
                            <a href="#" class="btn-action-light">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>                                            
                        
                            <a href="javascript:void(0)" class="btn-action-light" wire:click="showModal('{{$patient->id}}')">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="p-4 overflow-auto w-full">
            <div class="w-full mx-auto text-lg text-center py-2 mb-3">
                <svg wire:loading class="w-16 h-16" xmlns="http://www.w3.org/2000/svg" style="margin:auto;background:0 0" width="200" height="200" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" display="block"><g transform="translate(80 50)"><circle r="6" fill="#93dbe9"><animateTransform attributeName="transform" type="scale" begin="-0.875s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.875s"/></circle></g><g transform="rotate(45 -50.355 121.569)"><circle r="6" fill="#93dbe9" fill-opacity=".875"><animateTransform attributeName="transform" type="scale" begin="-0.75s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.75s"/></circle></g><g transform="rotate(90 -15 65)"><circle r="6" fill="#93dbe9" fill-opacity=".75"><animateTransform attributeName="transform" type="scale" begin="-0.625s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.625s"/></circle></g><g transform="rotate(135 -.355 41.569)"><circle r="6" fill="#93dbe9" fill-opacity=".625"><animateTransform attributeName="transform" type="scale" begin="-0.5s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.5s"/></circle></g><g transform="rotate(180 10 25)"><circle r="6" fill="#93dbe9" fill-opacity=".5"><animateTransform attributeName="transform" type="scale" begin="-0.375s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.375s"/></circle></g><g transform="rotate(-135 20.355 8.431)"><circle r="6" fill="#93dbe9" fill-opacity=".375"><animateTransform attributeName="transform" type="scale" begin="-0.25s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.25s"/></circle></g><g transform="rotate(-90 35 -15)"><circle r="6" fill="#93dbe9" fill-opacity=".25"><animateTransform attributeName="transform" type="scale" begin="-0.125s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.125s"/></circle></g><g transform="rotate(-45 70.355 -71.569)"><circle r="6" fill="#93dbe9" fill-opacity=".125"><animateTransform attributeName="transform" type="scale" begin="0s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="0s"/></circle></g></svg>        
            </div>
            <div class="my-2">
                {{$patients->links()}}        
            </div>
        </div>
    </div>
</div>

@livewire('patients.show')
