<div>
    <form wire:submit.prevent="store">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <label for="paciente" class="block text-sm font-medium leading-5 text-gray-700">Buscar
                            Paciente</label>
                        <input wire:model.debounce.1000ms="buscarPaciente" type="search" id="paciente" name="paciente"
                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @if (count($pacientes ?? [])>0)
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            DNI
                                        </th>
                                        <th
                                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Paciente
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($pacientes ?? [] as $paciente)
                                    <tr class="cursor.pointer" wire:click="selectedPaciente({{ $paciente }})">
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                            {{$paciente->dni}}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                            {{$paciente->surname}} {{$paciente->name}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>

                    <input value="{{$paciente ?? ''}}" wire:model="patient_id" type="hidden">

                    <div class="col-span-6 sm:col-span-3">
                        <label for="dni" class="block text-sm font-medium leading-5 text-gray-700">DNI</label>
                        <input id="dni" name="dni" minlength="11" max="11"
                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                            value="{{$paciente->dni ?? ''}}" disabled>
                        @error('patient_id')
                        <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="apellido_nombre"
                            class="block text-sm font-medium leading-5 text-gray-700">Paciente</label>
                        <input id="apellido_nombre" name="apellido_nombre"
                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                            value="{{$paciente->surname  ?? ''}} {{$paciente->name  ?? ''}}" disabled>
                    </div>

                    <div class="col-span-6">
                        <label for="consulta" class="block text-sm font-medium leading-5 text-gray-700">Consulta</label>
                        <textarea wire:model="consulta" name="consulta" id="consulta" cols="30" rows="10"
                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                        @error('consulta')
                        <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button wire:loading.attr="disabled" type="submit"
                    class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                    <p wire:loading.class="hidden">Guardar</p>
                    <div wire:loading.attr.remove="hidden" hidden>
                        <div class="flex items-center">
                            Espere...
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
        </div>
    </form>
</div>