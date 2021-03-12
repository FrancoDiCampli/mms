<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6 lg:flex lg:justify-center">
            <div class="mt-5 md:mt-0 md:col-span-2">

                <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <input value="{{$paciente->id}}" name="patient_id" type="hidden">

                                <div class="col-span-6">
                                    <label for=""
                                        class="block text-sm font-medium leading-5 text-gray-700">Plantilla</label>
                                    <select wire:model="template_id" wire:change="selectTemplate"
                                        class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        <option value="{{null}}">Por Defecto</option>
                                        @foreach ($templates as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="dni"
                                        class="block text-sm font-medium leading-5 text-gray-700">DNI</label>
                                    <input id="dni" name="dni" minlength="11" max="11"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$paciente->dni}}" disabled>
                                    @error('patient_id')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="apellido_nombre"
                                        class="block text-sm font-medium leading-5 text-gray-700">Paciente</label>
                                    <input id="apellido_nombre" name="apellido_nombre"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$paciente->full_name}}" disabled>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="height"
                                        class="block text-sm font-medium leading-5 text-gray-700">Altura</label>
                                    <input wire:model="height" id="height" name="height" type="number" step="0.01"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('height')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="weight"
                                        class="block text-sm font-medium leading-5 text-gray-700">Peso</label>
                                    <input wire:model="weight" id="weight" name="weight" type="number" step="0.01"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('weight')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                {{--  --}}
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="ant_medical"
                                        class="block text-sm font-medium leading-5 text-gray-700">Antecedentes
                                        Médicos</label>
                                    <input wire:model.defer="ant_medical" id="ant_medical" name="ant_medical"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('ant_medical')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="ant_surgical"
                                        class="block text-sm font-medium leading-5 text-gray-700">Antecedentes
                                        Quirúrgicos</label>
                                    <input wire:model.defer="ant_surgical" id="ant_surgical" name="ant_surgical"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('ant_surgical')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="button" wire:click="updatePatient" wire:loading.attr="disabled"
                                    class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                                    <p wire:loading.class="hidden">Actualizar</p>
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
                                {{--  --}}

                                <div class="col-span-6">
                                    <label for="reason_consult"
                                        class="block text-sm font-medium leading-5 text-gray-700">Motivo de
                                        Consulta</label>
                                    <input wire:model.defer="plantilla.reason_consult" id="reason_consult"
                                        name="reason_consult"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('plantilla.reason_consult')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="col-span-6">
                                    <label for="current_disease_history"
                                        class="block text-sm font-medium leading-5 text-gray-700">AEA</label>
                                    <textarea wire:model.defer="plantilla.current_disease_history"
                                        name="current_disease_history" id="current_disease_history" cols="30" rows="5"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                                    @error('plantilla.current_disease_history')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="overall_status"
                                        class="block text-sm font-medium leading-5 text-gray-700">Estado General</label>
                                    <input wire:model.defer="plantilla.overall_status" id="overall_status"
                                        name="overall_status"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('plantilla.overall_status')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="respiratory_system"
                                        class="block text-sm font-medium leading-5 text-gray-700">Aparato
                                        Respiratorio</label>
                                    <input wire:model.defer="plantilla.respiratory_system" id="respiratory_system"
                                        name="respiratory_system"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('plantilla.respiratory_system')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="cardiovascular_system"
                                        class="block text-sm font-medium leading-5 text-gray-700">Aparato
                                        Cardiovascular</label>
                                    <input wire:model.defer="plantilla.cardiovascular_system" id="cardiovascular_system"
                                        name="cardiovascular_system"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('plantilla.cardiovascular_system')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="abdomen"
                                        class="block text-sm font-medium leading-5 text-gray-700">Abdomen</label>
                                    <input wire:model.defer="plantilla.abdomen" id="abdomen" name="abdomen"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('plantilla.abdomen')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">

                                    <input type="hidden" wire:model="diagnostic">

                                    <label for="diagnostic"
                                        class="block text-sm font-medium leading-5 text-gray-700">Diagnostico</label>
                                    <div class="relative flex items-center">
                                        <input wire:model="inputDiagnostic" wire:keyup="searchDiagnostic"
                                            id="diagnostic" name="diagnostic"
                                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">

                                        @if (count($auxDiagnostic)<1) <span class="absolute right-0">
                                            <button wire:click="createDiagnostic" type="button"
                                                wire:loading.attr="disabled"
                                                class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                                                <p wire:loading.class="hidden">Crear</p>
                                                <div wire:loading.attr.remove="hidden" hidden>
                                                    <div class="flex items-center">
                                                        Espere...
                                                        <svg aria-hidden="true" data-prefix="fas"
                                                            data-icon="circle-notch"
                                                            class="svg-inline--fa fa-circle-notch fa-w-16 w-5 h-5 ml-3 animate-spin"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor"
                                                                d="M288 39.056v16.659c0 10.804 7.281 20.159 17.686 23.066C383.204 100.434 440 171.518 440 256c0 101.689-82.295 184-184 184-101.689 0-184-82.295-184-184 0-84.47 56.786-155.564 134.312-177.219C216.719 75.874 224 66.517 224 55.712V39.064c0-15.709-14.834-27.153-30.046-23.234C86.603 43.482 7.394 141.206 8.003 257.332c.72 137.052 111.477 246.956 248.531 246.667C393.255 503.711 504 392.788 504 256c0-115.633-79.14-212.779-186.211-240.236C302.678 11.889 288 23.456 288 39.056z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </button>
                                            </span>
                                            @endif
                                    </div>
                                    @error('plantilla.diagnostic')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror

                                    {{-- <select name="" id=""
                                        class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        @foreach ($auxDiagnostic ?? [] as $item)
                                        <option wire:click="addDiagnostic({{$item}})" value="{{$item->id}}">
                                    {{$item->diagnostic}}</option>
                                    @endforeach
                                    </select> --}}
                                    @foreach ($auxDiagnostic ?? [] as $item)
                                    <li wire:click="addDiagnostic({{$item}})" class="cursor-pointer">
                                        <strong>{{$item->code}} - {{$item->diagnostic}}</strong></li>
                                    @endforeach
                                    <div wire:click.prevent>
                                        {{$auxDiagnostic->links()}}
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    @foreach ($arrayDiagnostic ?? [] as $item)
                                    <span class="bg-green-500 rounded-lg m-2">{{$item['diagnostic']}} <button
                                            wire:click="deleteDiagnostic({{$loop->index}})" type="button">
                                            <svg class="fill-current h-4 w-4 " role="button" viewBox="0 0 20 20">
                                                <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                     c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                     l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                     C14.817,13.62,14.817,14.38,14.348,14.849z"></path>
                                            </svg>
                                        </button></span>

                                    @endforeach
                                </div>

                                <div class="col-span-6">
                                    <label for="study_plan"
                                        class="block text-sm font-medium leading-5 text-gray-700">Plan de
                                        estudio</label>

                                    <textarea wire:model="plantilla.study_plan" name="study_plan" id="study_plan"
                                        cols="30" rows="5"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                                    @error('plantilla.study_plan')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="treatment"
                                        class="block text-sm font-medium leading-5 text-gray-700">Tratamiento</label>

                                    <input wire:model="plantilla.treatment" id="treatment" name="treatment"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('plantilla.treatment')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="hospitalization_date"
                                        class="block text-sm font-medium leading-5 text-gray-700">Fecha de
                                        Internación</label>
                                    <input wire:model.defer="hospitalization_date" id="hospitalization_date"
                                        name="hospitalization_date" type="date"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('hospitalization_date')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="discharge_date"
                                        class="block text-sm font-medium leading-5 text-gray-700">Fecha de
                                        Externación</label>
                                    <input wire:model.defer="discharge_date" id="discharge_date" name="discharge_date"
                                        type="date"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('discharge_date')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button wire:loading.attr="disabled"
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
        </div>
    </div>
</div>