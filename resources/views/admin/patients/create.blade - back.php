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

<strong>Crear Paciente</strong>

<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6 lg:flex lg:justify-center">
            <div class="mt-5 md:mt-0 md:col-span-2">

                <form action="{{route('patients.store')}}" method="POST" enctype="multipart/form-data"
                    onsubmit="storePatient.disabled = true; send.hidden = false; textSend.hidden = true;">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="dni"
                                        class="block text-sm font-medium leading-5 text-gray-700">DNI</label>
                                    <input id="dni" name="dni" minlength="7" max="8"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('dni')}}">
                                    @error('dni')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="social_work_id"
                                        class="block text-sm font-medium leading-5 text-gray-700">Obra
                                        Social</label>
                                    <select name="social_work_id" id="social_work_id"
                                        class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        @foreach ($socialworks as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('social_work_id')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="num_affiliate"
                                        class="block text-sm font-medium leading-5 text-gray-700">N??
                                        Afiliado</label>
                                    <input name="num_affiliate" id="num_affiliate" placeholder="N?? Afiliado" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm
                                                focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out
                                                sm:text-sm sm:leading-5" value="{{old('num_affiliate')}}">
                                    @error('num_affiliate')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="surname"
                                        class="block text-sm font-medium leading-5 text-gray-700">Apellido</label>
                                    <input id="surname" name="surname"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('surname')}}">
                                    @error('surname')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name"
                                        class="block text-sm font-medium leading-5 text-gray-700">Nombre</label>
                                    <input id="name" name="name"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('name')}}">
                                    @error('name')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fnac" class="block text-sm font-medium leading-5 text-gray-700">Fecha
                                        Nacimiento</label>
                                    <input id="fnac" name="fnac" type="date" max="{{now()->format('Y-m-d')}}"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('fnac')}}">
                                    @error('fnac')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="age"
                                        class="block text-sm font-medium leading-5 text-gray-700">Edad</label>
                                    <input id="age" name="age"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('age')}}">
                                    @error('age')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email"
                                        class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                                    <input id="email" name="email" type="email"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('email')}}">
                                    @error('email')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone"
                                        class="block text-sm font-medium leading-5 text-gray-700">Tel??fono</label>
                                    <input id="phone" name="phone" type="tel"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('phone')}}">
                                    @error('phone')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="address"
                                        class="block text-sm font-medium leading-5 text-gray-700">Direcci??n</label>
                                    <input id="address" name="address"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('address')}}">
                                    @error('address')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="city"
                                        class="block text-sm font-medium leading-5 text-gray-700">Localidad</label>
                                    <input id="city" name="city"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('city')}}">
                                    @error('city')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="province"
                                        class="block text-sm font-medium leading-5 text-gray-700">Provincia</label>
                                    <input id="province" name="province"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{old('province')}}">
                                    @error('province')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="ant_medical"
                                        class="block text-sm font-medium leading-5 text-gray-700">Antecedentes
                                        M??dicos</label>
                                    <textarea name="ant_medical" id="ant_medical" cols="30" rows="5"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{old('ant_medical')}}</textarea>
                                    @error('ant_medical')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="ant_surgical"
                                        class="block text-sm font-medium leading-5 text-gray-700">Antecedentes
                                        Quir??rgicos</label>
                                    <textarea name="ant_surgical" id="ant_surgical" cols="30" rows="5"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{old('ant_surgical')}}</textarea>
                                    @error('ant_surgical')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="observations"
                                        class="block text-sm font-medium leading-5 text-gray-700">Observaciones</label>
                                    <textarea name="observations" id="observations" cols="30" rows="5"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{old('observations')}}</textarea>
                                    @error('observations')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" id="storePatient"
                                class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                                <p id="textSend">Guardar</p>
                                <div id="send" hidden>
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

@endsection