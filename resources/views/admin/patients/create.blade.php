@extends('dashboard')

@section('content')

<div class="card py-2">
    <div class="flex items-center justify-between">
        <div class="w-auto flex items-center">
            <a href="{{route('patients.index')}}"
                class="rounded-full p-1 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-100 hover:bg-gray-100 mr-5">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <p class="text-text-500 text-lg md:text-xl m-1 font-medium">Nuevo Paciente</p>
            </a>
        </div>

        <div class="w-auto hidden md:flex items-center justify-end">

        </div>
    </div>
</div>

<div class="md:px-0 lg:px-28 pb-4">
    <form action="{{route('patients.store')}}" method="POST" enctype="multipart/form-data"
        onsubmit="storePatient.disabled = true; send.hidden = false; textSend.hidden = true; svgSend.hidden = true;">
        @csrf
        <div class="card">
            {{-- Datos del paciente --}}
            <section class="mb-8 mt-3">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Datos del
                            Paciente</p>
                        {{-- <span class="border-b border-primary-100 w-9/12"></span> --}}
                    </div>

                    {{-- Grid datos paciente --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
                        <div class="">
                            <label for="" class="text-base text-text-300">DNI</label>
                            <input class="input-base" placeholder="DNI del paciente" id="dni" name="dni"
                                value="{{ old('dni') }}">
                            @error('dni')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="" class="text-base text-text-300">Obra Social</label>
                            <Select class="input-base" placeholder="Obra social" id="social_work_id"
                                name="social_work_id" value="{{ old('social_work_id') }}">
                                @foreach ($socialworks as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('social_work_id')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="" class="text-base text-text-300">N° Afiliado</label>
                            <input class="input-base" placeholder="N° de afiliado" id="num_affiliate"
                                name="num_affiliate" value="{{ old('num_affiliate') }}">
                            @error('num_affiliate')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div class="">
                            <label for="" class="text-base text-text-300">Apellido</label>
                            <input class="input-base" placeholder="Apellido del paciente" id="surname" name="surname"
                                value="{{ old('surname') }}">
                            @error('surname')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="" class="text-base text-text-300">Nombre</label>
                            <input class="input-base" placeholder="Nombre del paciente" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="" class="text-base text-text-300">Teléfono</label>
                            <input class="input-base" placeholder="Teléfono del paciente" id="phone" name="phone"
                                value="{{ old('phone') }}">
                            @error('phone')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div class="">
                            <label for="" class="text-base text-text-300">Fecha Nacimiento</label>
                            <input class="input-base" id="fnac" name="fnac" type="date" max="{{now()->format('Y-m-d')}}"
                                value="{{old('fnac')}}" onchange="calcularEdad(value)">
                            @error('fnac')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="" class="text-base text-text-300">Edad</label>
                            <input class="input-base cursor-not-allowed" placeholder="Edad" id="age" name="age"
                                value="{{old('age')}}" disabled>
                            @error('age')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>

            {{-- Datos domicilio --}}
            <section class="mb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Domicilio</p>
                        {{-- <span class="border-b border-primary-100 w-9/12"></span> --}}
                    </div>

                    <div class="grid grid-cols-1 gap-4 mt-5">
                        <div class="">
                            <label for="" class="text-base text-text-300">Drección</label>
                            <input class="input-base" placeholder="Dirección del paciente" id="address" name="address"
                                value="{{ old('address') }}">
                            @error('address')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                        <div class="">
                            <label for="" class="text-base text-text-300">Localida</label>
                            <input class="input-base" placeholder="Localida" id="city" name="city" value="Villa Ángela">
                            @error('city')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="" class="text-base text-text-300">Provinca</label>
                            <input class="input-base" placeholder="Provinca" id="province" name="province"
                                value="Chaco">
                            @error('province')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>

            {{-- Antecedentes --}}
            <section class="mb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Antecedentes
                            del Paciente</p>
                    </div>

                    <div class="w-full mt-5">
                        <div class="w-full md:flex items-center">
                            <div class="w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Ant. Médico</label>
                                <textarea cols="30" rows="2" class="input-base"
                                    placeholder="Antecedentes médico del paciente" name="ant_medical"
                                    id="ant_medical">{{ old('ant_medical') }}</textarea>
                                @error('ant_medical')
                                <span class="text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:flex items-center">
                            <div class="mt-5  w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Ant. Quirúrigico</label>
                                <textarea cols="30" rows="2" class="input-base"
                                    placeholder="Antecedentes quirúrgico del paciente" name="ant_surgical"
                                    id="ant_surgical" value="{{ old('ant_surgical') }}"></textarea>
                                @error('ant_surgical')
                                <span class="text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:flex items-center">
                            <div class="mt-5  w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Observaciones</label>
                                <textarea cols="30" rows="1" class="input-base" placeholder="Observaciones del paciente"
                                    name="observations" id="observations" value="{{ old('observations') }}"></textarea>
                                @error('observations')
                                <span class="text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Consulta --}}
            <section class="mb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Nueva consulta
                        </p>
                    </div>
                    <div class="w-full mt-5">
                        <div class="w-full md:flex items-center">
                            <div class="w-full md:mx-2">
                                <label for="consulta" class="text-base text-text-300">Consulta del día</label>
                                <textarea cols="30" rows="2" class="input-base"
                                    placeholder="Ingresar los datos de la consulta" name="consulta"
                                    id="consulta">{{ old('consulta') }}</textarea>
                                @error('consulta')
                                <span class="text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <div class="px-3 w-full text-right mt-10 md:mt-5">
            <button class="w-full md:w-auto btn btn-primary" id="storePatient">
                <div class="flex items-center">
                    <div id="svgSend">
                        <svg class="w-5 h-5 mr-1 hidden md:inline-block" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p id="textSend">Guardar</p>
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

@endsection

<script>
    function calcularEdad(fecha) {
        var hoy = new Date();
        var cumpleanos = new Date(fecha);
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }
        
        const age = document.querySelector('#age');
       
        mostrarEdad(edad);
    }


    function mostrarEdad(edad) {
        if(edad){
            age.value = edad;
            
        } else{
            age.value = '';
        }
    }
</script>