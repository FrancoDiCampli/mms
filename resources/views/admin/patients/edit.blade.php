@extends('dashboard')

@section('content')

<div class="flex justify-end -mt-8 -mb-4"><a title="Volver" href="{{route('patients.show', $patient->id)}}"
        class="rounded p-2">
        <svg aria-hidden="true" data-prefix="fas" data-icon="chevron-circle-left"
            class="w-8 text-indigo-400 hover:text-indigo-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z" />
        </svg>
    </a>
</div>

<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6 lg:flex lg:justify-center">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{route('patients.update', $patient->id)}}" method="POST" enctype="multipart/form-data"
                    onsubmit="updatePatient.disabled = true; send.hidden = false; textSend.hidden = true;">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="dni"
                                        class="block text-sm font-medium leading-5 text-gray-700">DNI</label>
                                    <input id="dni" name="dni" minlength="7" max="8"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->dni}}">
                                    @error('dni')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="social_works"
                                        class="block text-sm font-medium leading-5 text-gray-700">Obra Social</label>
                                    @foreach ($patient->obras as $value)
                                    <ul>
                                        <li><input type="checkbox" name="social_works[]" id="" @if ($value->check)
                                            checked
                                            @endif value="{{$value->id}}">{{$value->name}}</li>
                                    </ul>
                                    @endforeach
                                    @error('social_works')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="affiliate" class="block text-sm font-medium leading-5 text-gray-700">Nº
                                        Afiliado</label>
                                    <input id="affiliate" name="affiliate"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->affiliate}}">
                                    @error('affiliate')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="surname"
                                        class="block text-sm font-medium leading-5 text-gray-700">Apellido</label>
                                    <input id="surname" name="surname"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->surname}}">
                                    @error('surname')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name"
                                        class="block text-sm font-medium leading-5 text-gray-700">Nombre</label>
                                    <input id="name" name="name"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->name}}">
                                    @error('name')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fnac" class="block text-sm font-medium leading-5 text-gray-700">Fecha
                                        Nacimiento</label>
                                    <input id="fnac" name="fnac" type="date"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->fnac}}">
                                    @error('fnac')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="age"
                                        class="block text-sm font-medium leading-5 text-gray-700">Edad</label>
                                    <input id="age" name="age"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->age}}">
                                    @error('age')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email"
                                        class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                                    <input id="email" name="email" type="email"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->email}}">
                                    @error('email')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone"
                                        class="block text-sm font-medium leading-5 text-gray-700">Teléfono</label>
                                    <input id="phone" name="phone" type="tel"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->phone}}">
                                    @error('phone')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="address"
                                        class="block text-sm font-medium leading-5 text-gray-700">Dirección</label>
                                    <input id="address" name="address"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->address}}">
                                    @error('address')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="city"
                                        class="block text-sm font-medium leading-5 text-gray-700">Localidad</label>
                                    <input id="city" name="city"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->city}}">
                                    @error('city')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="province"
                                        class="block text-sm font-medium leading-5 text-gray-700">Provincia</label>
                                    <input id="province" name="province"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        value="{{$patient->province}}">
                                    @error('province')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="observations"
                                        class="block text-sm font-medium leading-5 text-gray-700">Observaciones</label>
                                    <textarea name="observations" id="observations" cols="30" rows="5"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{$patient->observations}}</textarea>
                                    @error('observations')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button id="updatePatient"
                                class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                                <p id="textSend">Actualizar</p>
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