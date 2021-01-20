@extends('dashboard')

@section('content')

<div class="flex justify-end -mt-8 -mb-4"><a title="Inicio" href="{{route('patients.index')}}" class="rounded p-2">
        <svg aria-hidden="true" data-prefix="fas" data-icon="chevron-circle-left"
            class="w-8 text-indigo-400 hover:text-indigo-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z" />
        </svg>
    </a>
</div>

<div class="max-w-7xl pt-2 mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{$patient->full_name}}
            </h3>
            <div class="flex justify-end -mt-10">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="text-sm text-indigo-400 hover:text-indigo-700" title="Ver Más">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="ellipsis-v" class="w-2"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                                <path fill="currentColor"
                                    d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <ul class="space-y-2">
                            <li class="hover:bg-gray-200 rounded p-2"><a href="{{route('patients.edit', $patient->id)}}"
                                    class="block">Editar</a>
                            </li>
                            <li class="hover:bg-gray-200 rounded p-2">
                                <form action="{{route('patients.destroy', $patient->id)}}" method="POST"
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
        <div>
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        DNI
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$patient->dni}}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Obra Social
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if ($patient->social_work_id)
                        {{$patient->socialwork->name}}
                        @else
                        Particular
                        @endif
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Nº Afiliado
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$patient->affiliate}}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Fecha Nacimiento
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        @if ($patient->fnac)
                        {{$patient->fnac->format('d-m-Y')}}
                        @endif
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Edad
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$patient->age}}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Email
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$patient->email}}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Teléfono
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$patient->phone}}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Dirección
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$patient->address}} - {{$patient->city}} -
                        {{$patient->province}}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Observaciones
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$patient->observations}}
                    </dd>
                </div>
            </dl>
        </div>

        <div>
            Consultas
            <dl>
                @foreach ($patient->queries as $item)
                <hr>
                <div>
                    <dt>
                        Fecha: {{$item->created_at->format('d-m-Y')}} Hora: {{$item->created_at->format('H:s')}}
                    </dt>
                    <dd>
                        Consulta: {{$item->query}}
                    </dd>
                </div>
                <hr>
                @endforeach
            </dl>
        </div>
    </div>
</div>
@endsection