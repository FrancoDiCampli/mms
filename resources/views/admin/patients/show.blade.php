@extends('dashboard')

@section('content')

<div class="card py-2">
    <div class="flex items-center justify-between">   
        <div class="w-auto flex items-center">
            <a href="{{route('patients.index')}}" class="rounded-full text-gray-600 p-1 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-100 hover:bg-gray-100 mr-5">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <p class="text-text-500 text-lg md:text-xl m-1 font-medium">Ficha Paciente</p>
            </a>
        </div>

        <div class="w-auto hidden md:flex items-center justify-end">            
            
        </div>
    </div>    
</div>

{{-- Section datos del paciente --}}
<div class="card">
    <div class="flex items-center">   
        <div class="flex-1 flex items-center">
            <svg class="w-6 h-6 text-text-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-text-500 text-2xl m-1 font-medium">Paciente: {{$patient->full_name}}</p>
        </div>

        <div class="flex justify-end">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="text-gray-500 rounded-full p-1 hover:bg-gray-100 focus:outline-none" title="Ver Más">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                          </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <ul class="space-y-2 p-2">
                        <li class="hover:bg-gray-100 rounded p-2 font"><a href="{{route('patients.edit', $patient)}}"
                                class="block">Editar</a>
                        </li>
                        <li class="hover:bg-gray-100 rounded p-2">
                            <form action="{{route('patients.destroy', $patient)}}" method="POST"
                                onsubmit="return confirm('¿Desea Continuar? Se eliminará de forma permanente el paciente.')">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Eliminar</button>
                            </form>
                        </li>
                    </ul>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <a class="text-blue-500" href="{{route('clinicalhistory.create', $patient)}}" class="" title="Historia Clinica">
        Nueva Historia Clinica
    </a>
    <a class="text-green-500" href="{{route('queries.create', $patient)}}">
        Nueva Consulta
        </span>
    </a>
    <div x-data="{selected:null}">
        {{-- Datos del paciente --}}
        <div class="grid md:grid-cols-5 gap-4 mt-3 px-2">
            <div class="">
                <p class="text-text-500 text-base font-medium">DNI:</p>
                <p class="text-text-400 text-base font-normal">{{$patient->dni}}</p>
            </div>
            <div class="">
                <p class="text-text-500 text-base font-medium">Fecha Nac.:</p>
                <p class="text-text-400 text-base font-normal">{{$patient->fnac->format('d/m/Y')}}</p>
            </div>       
            <div class="">
                <p class="text-text-500 text-base font-medium">Edad</p>
                <p class="text-text-400 text-base font-normal">{{$patient->age}}</p>
            </div>        
            <div class="">
                <p class="text-text-500 text-base font-medium">Obra Social</p>
                <p class="text-text-400 text-base font-normal">{{$patient->social_work->name}}</p>
            </div>  
            <div class="">
                <p class="text-text-500 text-base font-medium">N° Afiliado</p>
                <div class="flex">
                    <p class="text-text-400 text-base font-normal">{{$patient->num_affiliate}}</p>
                    {{-- Button accordion --}}
                    <div class="w-full text-right"> 
                        <button class="focus:outline-none" href="" @click="selected !== 0 ? selected = 0 : selected = null">
                            <svg x-show="selected !== 0" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg x-show="selected == 0" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>  
        </div>



        {{-- Información desplegable --}}
        <div x-show="selected == 0" 
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                >
                <div class="grid md:grid-cols-5 gap-4 mt-3 px-2">
                    <div class="">
                        <p class="text-text-500 text-base font-medium">Teléfono</p>
                        <p class="text-text-400 text-base font-normal">{{$patient->phone}}</p>
                    </div>
                    <div class="">
                        <p class="text-text-500 text-base font-medium">Email</p>
                        <p class="text-text-400 text-base font-normal">{{$patient->email}}</p>
                    </div>       
                    <div class="">
                        <p class="text-text-500 text-base font-medium">Dirección</p>
                        <p class="text-text-400 text-base font-normal">{{$patient->address}}</p>
                    </div>        
                    <div class="">
                        <p class="text-text-500 text-base font-medium">Localidad</p>
                        <p class="text-text-400 text-base font-normal">{{$patient->city}}</p>
                    </div>  
                    <div class="">
                        <p class="text-text-500 text-base font-medium">Provincia</p>
                        <p class="text-text-400 text-base font-normal">{{$patient->province}}</p>
                    </div>  
                </div>

                 {{-- Observaciones --}}
                <div class="w-full p-2">
                    <div class="">
                        <p class="text-text-500 text-base font-medium">Observaciones:</p>
                        <p class="text-text-400 text-base font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque delectus corporis velit earum minima illum culpa, suscipit nisi voluptates optio!</p>
                    </div>
                </div>
        </div>

        {{-- Antecedentes --}}
        <div class="grid md:grid-cols-2 gap-4 mt-2 border-t pt-4">
            <div class="">
                <p class="text-text-500 text-base font-medium">Antecedentes Médico:</p>
                <p class="text-text-400 text-base font-normal"> {{$patient->ant_medical}}</p>
            </div>
            <div class="">
                <p class="text-text-500 text-base font-medium">Antecedentes Quirúrgico:</p>
                <p class="text-text-400 text-base font-normal">{{$patient->ant_surgical}}</p>
            </div> 
        </div>
    </div>

    


</div>

{{-- Section historial médico --}}
<div class="card">
    <div class="flex-1 flex items-center">
        <p class="text-text-500 text-xl m-1 font-medium">Historial Médico</p>
    </div>

    <!-- Table Historial -->    
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
                        Fecha
                        </th>
                        <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                        >
                        Tipo
                        </th>
                        <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase"
                        >
                        Detalle
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
                    @foreach ($patient->clinicalhistories as $item)
                    {{-- @foreach ($item->getAttributes() as $key => $value) --}}
                        <tr class="transition-all hover:bg-hover hover:shadow">
                        <td class="px-6 py-2 ">
                            <div class="text-sm text-gray-900">{{$patient->created_at->format('d/m/Y')}}</div>                            
                        </td>
                        <td class="px-6 py-2">
                            <div class="text-sm text-gray-900">HC</div>                                         
                        </td>
                        <td class="px-6 py-2">
                            <div class="text-sm text-gray-900">{{$patient->ant_medical}}</div>                            
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
                    {{-- @endforeach --}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    {{-- End table --}}
</div>

{{-- Consulta --}}
<div class="card">
    <div class="flex-1 flex items-center">
        <p class="text-text-500 text-xl m-1 font-medium">Nueva consulta</p>
    </div>

    <div class="mt-2 m-1">
        <label for="" class="text-base text-text-300">Consulta del día</label>
        <textarea name="" id="" cols="30" rows="3" class="input-base" placeholder="Ingresar los datos de la consulta"></textarea>
    </div>
    
    <div class="px-1 w-full text-right mt-3 md:mt-2">
        <button class="w-full md:w-auto btn btn-primary">
            <svg class="w-5 h-5 mr-1 hidden md:inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Guardar
        </button>
    </div>
</div>

@endsection