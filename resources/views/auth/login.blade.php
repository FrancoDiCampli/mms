<x-guest-layout>
  <div class="">
    
    <div class=" min-h-full w-auto mt-3 lg:my-6 md:w-6/12 mx-auto px-7 justify-center py-20 lg:bg-white lg:rounded-lg lg:shadow-md">    
      
      <div class="flex justify-center">
        <img src="{{asset('img/logo-basic.png')}}" alt="" class="w-40 h-40">
      </div>
      
      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      {{-- Form --}}
      <form method="POST" action="{{ route('login') }}">
      @csrf            
        <div class="w-full md:w-10/12 lg:w-1/2 mx-auto mt-10 md:mt-14">   
            
          {{-- User --}}
          <div class="mt-5">
            <label for="" class="text-base text-text-300">Usuario</label>

            <div class="relative mt-1">
                <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-text-200">                  
                  <svg class="w-6 h-6" aria-hidden="true" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" class="input-icon" placeholder="Usuario" required autofocus>
            </div>
          </div>

          {{-- Password --}}
          <div class="mt-5">
            <label for="" class="text-base text-text-300">Contraseña</label>

            <div class="relative mt-1">
                <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-text-200">
                  <svg class="w-6 h-6" aria-hidden="true" data-prefix="fas" data-icon="lock" class="svg-inline--fa fa-lock fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
                </div>

                <div class="" x-data="{ show: true }">
                  <input class="input-icon" placeholder="Contraseña" id="password" name="password" :type="show ? 'password' : 'text'">

                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">       
                  
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-text-300" fill="none" @click="show = !show"
                    :class="{'hidden': !show, 'block':show }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-text-300" fill="none" @click="show = !show"
                    :class="{'block': !show, 'hidden':show }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
            
                  </div>
                </div>
                
            </div>
          </div>

          <!-- Remember Me -->
          <div class="block md:flex items-center justify-between mt-5">
            <div>
              <label for="remember_me" class="inline-flex items-center">
                  <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                  <span class="ml-2 text-sm text-text-300">{{ __('Recordarme') }}</span>
              </label>
            </div>

            {{-- Button --}}
            <div class="mt-6 md:mt-0">
              <button class="btn btn-primary w-full" type="submit">  
                Ingresar
                <svg class="w-5 h-5 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>              
              </button>
            </div>
          </div>
        </div>
      </form>
  </div>
</x-guest-layout>
