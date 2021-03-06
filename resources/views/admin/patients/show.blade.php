@extends('dashboard')

@section('content')

<div class="card py-2">
    <div class="flex items-center justify-between">
        <div class="w-auto flex items-center">
            <a href="{{route('patients.index')}}"
                class="rounded-full text-gray-600 p-1 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-100 hover:bg-gray-100 mr-5">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
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
            <svg class="w-6 h-6 text-text-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-text-500 text-xl lg:text-2xl m-1 font-medium">Paciente: {{$patient->full_name}}</p>
        </div>

        <a href="{{route('clinicalhistory.create', $patient)}}" class="btn btn-default shadow-none hidden md:flex mr-2">
            <svg class="w-5 h-5 mr-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <P class="hidden lg:flex">H. C.</P>
        </a>
        <button class="btn btn-default shadow-none hidden md:flex mr-2">
            <svg class="w-5 h-5 mr-1 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <P class="hidden lg:flex">Ambulatorio</P>
        </button>

        <div class="flex justify-end">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="text-gray-500 rounded-full p-1 hover:bg-gray-100 focus:outline-none" title="Ver M??s">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
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
                                onsubmit="return confirm('??Desea Continuar? Se eliminar?? de forma permanente el paciente.')">
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

    <div x-data="{selected:null}">
        {{-- Datos del paciente --}}
        <div class="grid md:grid-cols-5 gap-4 mt-3 px-2">
            <div class="">
                <p class="text-text-500 text-base font-medium">DNI:</p>
                <p class="text-text-400 text-base font-normal">{{$patient->dni}}</p>
            </div>
            <div class="">
                <p class="text-text-500 text-base font-medium">Fecha Nac.:</p>
                <p class="text-text-400 text-base font-normal">
                    {{$patient->fnac ? $patient->fnac->format('d/m/Y') : 's/i'}}</p>
            </div>
            <div class="">
                <p class="text-text-500 text-base font-medium">Edad</p>
                <p class="text-text-400 text-base font-normal">{{$patient->age ?? 's/i'}}</p>
            </div>
            <div class="">
                <p class="text-text-500 text-base font-medium">Obra Social</p>
                <p class="text-text-400 text-base font-normal">{{$patient->social_work->name}}</p>
            </div>
            <div class="">
                <p class="text-text-500 text-base font-medium">N?? Afiliado</p>
                <div class="flex">
                    <p class="text-text-400 text-base font-normal">{{$patient->num_affiliate ?? 's/i'}}</p>
                    {{-- Button accordion --}}
                    <div class="w-full text-right">
                        <button class="focus:outline-none" href=""
                            @click="selected !== 0 ? selected = 0 : selected = null">
                            <svg x-show="selected !== 0" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg x-show="selected == 0" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Informaci??n desplegable --}}
        <div x-show="selected == 0" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95">
            <div class="grid md:grid-cols-5 gap-4 mt-3 px-2">
                <div class="">
                    <p class="text-text-500 text-base font-medium">Tel??fono</p>
                    <p class="text-text-400 text-base font-normal">{{$patient->phone ?? 's/i'}}</p>
                </div>
                <div class="">
                    <p class="text-text-500 text-base font-medium">Direcci??n</p>
                    <p class="text-text-400 text-base font-normal">{{$patient->address ?? 's/i'}}</p>
                </div>
                <div class="">
                    <p class="text-text-500 text-base font-medium">Localidad</p>
                    <p class="text-text-400 text-base font-normal">{{$patient->city ?? 's/i'}}</p>
                </div>
                <div class="">
                    <p class="text-text-500 text-base font-medium">Provincia</p>
                    <p class="text-text-400 text-base font-normal">{{$patient->province ?? 's/i'}}</p>
                </div>
            </div>

            {{-- Observaciones --}}
            <div class="w-full p-2">
                <div class="">
                    <p class="text-text-500 text-base font-medium">Observaciones:</p>
                    <p class="text-text-400 text-base font-normal">{{$patient->observations ?? 'Sin observaci??n.'}}
                    </p>
                </div>
            </div>
        </div>

        {{-- Antecedentes --}}
        <div class="mt-2 border-t pt-4">
            <form action="{{route('patients.updateAntecedentes', $patient->id)}}" method="POST"
                enctype="multipart/form-data"
                onsubmit="updateAnt.disabled = true; send.hidden = false; textSend.hidden = true; svgSend.hidden = true;">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="">
                        <p class="text-text-500 text-base font-medium">Antecedentes M??dico:</p>
                        {{-- <p class="text-text-400 text-base font-normal"> {{$patient->ant_medical}}</p> --}}
                        <div class="mt-2 m-1">
                            <textarea name="ant_medical" id="ant_medical" cols="30" rows="3" class="input-base"
                                placeholder="Ingresar los datos antecedentes m??dicos">{{$patient->ant_medical}}</textarea>
                            @error('ant_medical')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <p class="text-text-500 text-base font-medium">Antecedentes Quir??rgico:</p>
                        <div class="mt-2 m-1">
                            <textarea name="ant_surgical" id="ant_surgical" cols="30" rows="3" class="input-base"
                                placeholder="Ingresar los datos de antecedentes quir??rgicos">{{$patient->ant_surgical}}</textarea>
                            @error('ant_surgical')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="px-1 w-full text-right mt-3 md:mt-2">
                    <button class="w-24 md:w-auto btn btn-primary" id="updateAnt">
                        <div class="flex items-center">
                            <div id="svgSend">
                                <svg class="w-5 h-5 mr-1 hidden md:inline-block" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p id="textSend">Actualizar</p>
                        </div>
                        <div id="send" hidden>
                            <div class="flex items-center">
                                Espere
                                <svg aria-hidden="true" data-prefix="fas" data-icon="circle-notch"
                                    class="svg-inline--fa fa-circle-notch fa-w-16 w-5 h-5 ml-3 animate-spin"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M288 39.056v16.659c0 10.804 7.281 20.159 17.686 23.066C383.204 100.434 440 171.518 440 256c0 101.689-82.295 184-184 184-101.689 0-184-82.295-184-184 0-84.47 56.786-155.564 134.312-177.219C216.719 75.874 224 66.517 224 55.712V39.064c0-15.709-14.834-27.153-30.046-23.234C86.603 43.482 7.394 141.206 8.003 257.332c.72 137.052 111.477 246.956 248.531 246.667C393.255 503.711 504 392.788 504 256c0-115.633-79.14-212.779-186.211-240.236C302.678 11.889 288 23.456 288 39.056z" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>

{{-- Section historial m??dico --}}
<div class="card">
    <div class="flex-1 flex items-center">
        <p class="text-text-500 text-lg lg:text-xl m-1 font-medium">Historial M??dico</p>
    </div>

    <!-- Table Historial -->
    <div class="flex flex-col mt-2">
        <div class="-my-2 overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden border-b border-gray-200 rounded">
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-table-header">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase">
                                    Fecha
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase">
                                    Tipo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase">
                                    Detalle
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-text-500 uppercase">
                                    ACCIONES
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100 overflow-y-auto h-8">
                            @foreach ($mezcla as $item)
                            <tr class="transition-all hover:bg-hover hover:shadow">
                                <td class="px-6 py-2 ">
                                    <div class="text-sm text-gray-900">{{$item->created_at->format('d/m/Y H:i')}}</div>
                                </td>
                                <td class="px-6 py-2">
                                    @if (get_class($item) == App\Models\ClinicalHistory::class)
                                    <div class="text-sm text-gray-900">Historia Clinica</div>
                                    @else
                                    <div class="text-sm text-gray-900">Consulta</div>
                                    @endif
                                </td>
                                <td class="px-6 py-2">
                                    <div class="text-sm text-gray-900">{{$item->query}}</div>
                                </td>

                                <td class="flex items-center px-6 py-4">
                                    {{-- <a title="Ver M??s" href="{{route('patients.show', $patient->id)}}"
                                    class="btn-action-light">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    </a>

                                    <a href="#" class="btn-action-light">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <a href="javascript:void(0)" class="btn-action-light"
                                        wire:click="showModal('{{$patient->id}}')">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a> --}}
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
        <p class="text-text-500 text-lg lg:text-xl m-1 font-medium">Nueva consulta</p>
    </div>

    <form action="{{route('queries.store')}}" method="POST" enctype="multipart/form-data"
        onsubmit="storeQuery.disabled = true; sendQuery.hidden = false; textSendQuery.hidden = true; svgSendQuery.hidden = true;">
        @csrf

        <input value="{{$patient->id}}" name="patient_id" type="hidden">

        <div class="mt-2 m-1">
            <label for="consulta" class="text-base text-text-300">Consulta del d??a</label>
            <textarea name="consulta" id="consulta" cols="30" rows="3" class="input-base"
                placeholder="Ingresar los datos de la consulta"></textarea>
            @error('consulta')
            <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="px-1 w-full text-right mt-3 md:mt-2">
            <button class="w-24 md:w-auto btn btn-primary" id="storeQuery">
                <div class="flex items-center">
                    <div id="svgSendQuery">
                        <svg class="w-5 h-5 mr-1 hidden md:inline-block" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p id="textSendQuery">Guardar</p>
                </div>
                <div id="sendQuery" hidden>
                    <div class="flex items-center">
                        Espere
                        <svg aria-hidden="true" data-prefix="fas" data-icon="circle-notch"
                            class="svg-inline--fa fa-circle-notch fa-w-16 w-5 h-5 ml-3 animate-spin"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M288 39.056v16.659c0 10.804 7.281 20.159 17.686 23.066C383.204 100.434 440 171.518 440 256c0 101.689-82.295 184-184 184-101.689 0-184-82.295-184-184 0-84.47 56.786-155.564 134.312-177.219C216.719 75.874 224 66.517 224 55.712V39.064c0-15.709-14.834-27.153-30.046-23.234C86.603 43.482 7.394 141.206 8.003 257.332c.72 137.052 111.477 246.956 248.531 246.667C393.255 503.711 504 392.788 504 256c0-115.633-79.14-212.779-186.211-240.236C302.678 11.889 288 23.456 288 39.056z" />
                        </svg>
                    </div>
                </div>
            </button>
        </div>

    </form>
</div>

@endsection