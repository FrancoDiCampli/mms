<div
  class="fixed z-30 inset-y-0 left-0 md:w-24 transition duration-300 transform bg-white overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 h-screen shadow-sm">
  <div class="flex items-center justify-center p-2">
    <div class="flex items-center">
      <img src="{{asset('img/logo-basic.png')}}" alt="" class="w-16 h-16">
    </div>
  </div>

  <nav class="mt-6">
    <div class="mb-2 py-3 text-center bg-hover text-text-300 border-r-4 border-primary-200">
      <a href="/dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-primary-300" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        </span>
        <p class="text-sm text-primary-300 mt-1">Dashboard</p>
      </a>
    </div>

    <div class="mb-2 w-full text-center hover:bg-hover py-3 transition duration-400 ease-in-out">
      <a href="{{route('patients.index')}}">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-text-300" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <p class="text-sm text-text-base">Pacientes</p>
        </span>
      </a>
    </div>

    <div class="mb-2 w-full text-center hover:bg-hover py-3 transition duration-400 ease-in-out">
      <a href="#">
        <svg aria-hidden="true" data-prefix="fas" data-icon="user-md"
          class="svg-inline--fa fa-user-md fa-w-14 h-5 w-5 mx-auto text-text-300"
          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path fill="currentColor"
            d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zM104 424c0 13.3 10.7 24 24 24s24-10.7 24-24-10.7-24-24-24-24 10.7-24 24zm216-135.4v49c36.5 7.4 64 39.8 64 78.4v41.7c0 7.6-5.4 14.2-12.9 15.7l-32.2 6.4c-4.3.9-8.5-1.9-9.4-6.3l-3.1-15.7c-.9-4.3 1.9-8.6 6.3-9.4l19.3-3.9V416c0-62.8-96-65.1-96 1.9v26.7l19.3 3.9c4.3.9 7.1 5.1 6.3 9.4l-3.1 15.7c-.9 4.3-5.1 7.1-9.4 6.3l-31.2-4.2c-7.9-1.1-13.8-7.8-13.8-15.9V416c0-38.6 27.5-70.9 64-78.4v-45.2c-2.2.7-4.4 1.1-6.6 1.9-18 6.3-37.3 9.8-57.4 9.8s-39.4-3.5-57.4-9.8c-7.4-2.6-14.9-4.2-22.6-5.2v81.6c23.1 6.9 40 28.1 40 53.4 0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.3 16.9-46.5 40-53.4v-80.4C48.5 301 0 355.8 0 422.4v44.8C0 491.9 20.1 512 44.8 512h358.4c24.7 0 44.8-20.1 44.8-44.8v-44.8c0-72-56.8-130.3-128-133.8z" />
        </svg>
        <p class="text-sm text-text-base">Usuarios</p>
        </span>
      </a>
    </div>
  </nav>
</div>