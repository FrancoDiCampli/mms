@extends('dashboard')

@section('content')

<div class="card py-2">
    <div class="flex items-center justify-between">   
        <div class="w-auto flex items-center">
            <a href="{{route('patients.index')}}" class="rounded-full p-1 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-100 hover:bg-gray-100 mr-5">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <p class="text-text-500 text-lg md:text-xl m-1 font-medium">Nuevo Paciente</p>
            </a>
        </div>

        <div class="w-auto hidden md:flex items-center justify-end">            
            
        </div>
    </div>    
</div>

<div class="md:px-0 lg:px-28 pb-10">

    <div class="card">        
            {{-- Datos personales --}}
            <section class="mb-6 mt-3 pb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Datos Personales</p>
                        {{-- <span class="border-b border-primary-100 w-9/12"></span> --}}
                    </div>
                    
                    <div class="w-full mt-5">            
                        <div class="w-full md:flex items-center">
                            <div class="w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Nombre</label>
                                <input class="input-base" placeholder="Nombre del paciente">
                            </div>  
                            <div class="mt-5 md:mt-0 w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Apellido</label>
                                <input class="input-base" placeholder="Apellido del paciente">
                            </div>
                        </div> 

                        <div class="w-full md:flex items-center">
                            <div class="mt-5 w-full md:mx-2">
                                <label for="" class="text-base text-text-300">DNI</label>
                                <input class="input-base" placeholder="DNI del paciente">
                            </div>  
                            <div class="mt-5 w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Fecha Nac.</label>
                                <input class="input-base" placeholder="Fecha nacimiento">
                            </div>  
                            <div class="mt-5 w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Edad</label>
                                <input class="input-base" placeholder="Edad">
                            </div>  
                        </div> 
                            
                    </div>
                </div>

            </section>

            {{-- Datos domicilio --}}
            <section class="mb-6 mt-3 pb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Domicilio</p>
                        {{-- <span class="border-b border-primary-100 w-9/12"></span> --}}
                    </div>
                    
                    <div class="w-full mt-5">            
                        <div class="w-full md:flex items-center">
                            <div class="w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Dirección</label>
                                <input class="input-base" placeholder="DIrección del paciente">
                            </div>  
                            <div class="mt-5 md:mt-0 w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Localidad</label>
                                <input class="input-base" placeholder="Localidad del paciente">
                            </div>
                        </div> 

                        <div class="w-full md:flex items-center">
                            <div class="mt-5 w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Provincia</label>
                                <input class="input-base" placeholder="Provincia del paciente">
                            </div>  
                        </div>                 
                    </div>
                </div>
            </section>

            {{-- Datos Contacto --}}
            <section class="mb-6 mt-3 pb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Datos de Contacto</p>
                        {{-- <span class="border-b border-primary-100 w-9/12"></span> --}}
                    </div>
                    
                    <div class="w-full mt-5">             
                        <div class="w-full md:flex items-center">
                            <div class="w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Teléfono</label>
                                <input class="input-base" placeholder="Teléfono del paciente">
                            </div>  
                            <div class="mt-5 md:mt-0 w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Email</label>
                                <input class="input-base" placeholder="Email del paciente">
                            </div>
                        </div>                
                    </div>
                </div>

            </section>

            {{-- Obra social --}}
            <section class="mb-6 mt-3 pb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Datos Filiatorios</p>
                        {{-- <span class="border-b border-primary-100 w-9/12"></span> --}}
                    </div>
                    
                    <div class="w-full mt-5">          
                        <div class="w-full md:flex items-center">
                            <div class="w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Obra Social</label>
                                <input class="input-base" placeholder="Obra Social del paciente">
                            </div>  
                            <div class="mt-5 md:mt-0 w-full md:mx-2">
                                <label for="" class="text-base text-text-300">N° Afiliado</label>
                                <input class="input-base" placeholder="N° Afiliado del paciente">
                            </div>
                        </div>                
                    </div>
                </div>

            </section>

            {{-- Antecedentes --}}
            <section class="mb-6 mt-3 pb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Antecedentes del Paciente</p>
                        {{-- <span class="border-b border-primary-100 w-9/12"></span> --}}
                    </div>
                    
                    <div class="w-full mt-5">       
                        <div class="w-full md:flex items-center">
                            <div class="w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Ant. Médico</label>
                                <textarea name="" id="" cols="30" rows="2" class="input-base" placeholder="Antecedentes médico del paciente"></textarea>
                            </div>                
                        </div> 
                        <div class="w-full md:flex items-center">
                            <div class="mt-5  w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Ant. Quirúrigico</label>
                                <textarea name="" id="" cols="30" rows="2" class="input-base" placeholder="Antecedentes médico del quirúrgico"></textarea>
                            </div>                
                        </div>                
                    </div>
                </div>
            </section>

            {{-- Antecedentes --}}
            <section class="mb-6 mt-3 pb-8">
                <div class="container px-3 md:px-6">
                    <div class="w-full flex items-center">
                        <p class="text-text-500 text-lg font-medium w-full border-b-2 border-primary-100">Observaciones</p>
                        {{-- <span class="border-b border-primary-100 w-9/12"></span> --}}
                    </div>
                    
                    <div class="w-full mt-5">        
                        <div class="w-full md:flex items-center">
                            <div class="w-full md:mx-2">
                                <label for="" class="text-base text-text-300">Observaciones</label>
                                <textarea name="" id="" cols="30" rows="2" class="input-base" placeholder="Observaciones"></textarea>
                            </div>                
                        </div>             
                    </div>
                </div>
            </section>
    </div>

    <div class="px-3 w-full text-right mt-10 md:mt-5">
        <button class="w-full md:w-auto btn btn-primary">
            <svg class="w-5 h-5 mr-1 hidden md:inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Guardar
        </button>
    </div>

</div>

@endsection