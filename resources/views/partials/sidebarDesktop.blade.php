<div
  class="fixed z-30 inset-y-0 left-0 md:w-24 transition duration-300 transform bg-white overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 h-screen shadow-sm">
  <div class="flex items-center justify-center mt-8">
    <div class="flex items-center">
      <svg aria-hidden="true" data-prefix="fas" data-icon="laptop-medical"
        class="svg-inline--fa fa-laptop-medical fa-w-20 w-8 h-8 text-green-300" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 640 512">
        <path fill="currentColor"
          d="M232 224h56v56a8 8 0 008 8h48a8 8 0 008-8v-56h56a8 8 0 008-8v-48a8 8 0 00-8-8h-56v-56a8 8 0 00-8-8h-48a8 8 0 00-8 8v56h-56a8 8 0 00-8 8v48a8 8 0 008 8zM576 48a48.14 48.14 0 00-48-48H112a48.14 48.14 0 00-48 48v336h512zm-64 272H128V64h384zm112 96H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33-17.47-32.77-32H16a16 16 0 00-16 16v16a64.19 64.19 0 0064 64h512a64.19 64.19 0 0064-64v-16a16 16 0 00-16-16z" />
      </svg>
    </div>
  </div>

  <nav class="mt-10">
    <div class="mb-6 py-3 text-center bg-gray-100 text-gray-700 border-r-4 border-gray-600">
      <a href="/dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto text-gray-700 hover:text-green-500" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        </span>
        <p class="text-sm text-gray-700">Dashboard</p>
      </a>
    </div>

    <div class="mb-6 w-full text-center">
      <a href="{{route('patients.index')}}">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-700 hover:text-green-500" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <p class="text-sm text-gray-700">Pacientes</p>
        </span>
      </a>
    </div>

    <div class="mb-6 w-full text-center">
      <a href="{{route('queries.index')}}">
        <svg aria-hidden="true" data-prefix="fas" data-icon="stethoscope"
          class="svg-inline--fa fa-stethoscope fa-w-16 h-5 w-5 mx-auto text-gray-700 hover:text-green-500"
          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor"
            d="M447.1 112c-34.2.5-62.3 28.4-63 62.6-.5 24.3 12.5 45.6 32 56.8V344c0 57.3-50.2 104-112 104-60 0-109.2-44.1-111.9-99.2C265 333.8 320 269.2 320 192V36.6c0-11.4-8.1-21.3-19.3-23.5L237.8.5c-13-2.6-25.6 5.8-28.2 18.8L206.4 35c-2.6 13 5.8 25.6 18.8 28.2l30.7 6.1v121.4c0 52.9-42.2 96.7-95.1 97.2-53.4.5-96.9-42.7-96.9-96V69.4l30.7-6.1c13-2.6 21.4-15.2 18.8-28.2l-3.1-15.7C107.7 6.4 95.1-2 82.1.6L19.3 13C8.1 15.3 0 25.1 0 36.6V192c0 77.3 55.1 142 128.1 156.8C130.7 439.2 208.6 512 304 512c97 0 176-75.4 176-168V231.4c19.1-11.1 32-31.7 32-55.4 0-35.7-29.2-64.5-64.9-64zm.9 80c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16-7.2 16-16 16z" />
        </svg>
        <p class="text-sm text-gray-700">Consultas</p>
        </span>
      </a>
    </div>

    <div class="mb-6 w-full text-center">
      <a href="#">
        <svg aria-hidden="true" data-prefix="fas" data-icon="user-md"
          class="svg-inline--fa fa-user-md fa-w-14 h-5 w-5 mx-auto text-gray-700 hover:text-green-500"
          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path fill="currentColor"
            d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zM104 424c0 13.3 10.7 24 24 24s24-10.7 24-24-10.7-24-24-24-24 10.7-24 24zm216-135.4v49c36.5 7.4 64 39.8 64 78.4v41.7c0 7.6-5.4 14.2-12.9 15.7l-32.2 6.4c-4.3.9-8.5-1.9-9.4-6.3l-3.1-15.7c-.9-4.3 1.9-8.6 6.3-9.4l19.3-3.9V416c0-62.8-96-65.1-96 1.9v26.7l19.3 3.9c4.3.9 7.1 5.1 6.3 9.4l-3.1 15.7c-.9 4.3-5.1 7.1-9.4 6.3l-31.2-4.2c-7.9-1.1-13.8-7.8-13.8-15.9V416c0-38.6 27.5-70.9 64-78.4v-45.2c-2.2.7-4.4 1.1-6.6 1.9-18 6.3-37.3 9.8-57.4 9.8s-39.4-3.5-57.4-9.8c-7.4-2.6-14.9-4.2-22.6-5.2v81.6c23.1 6.9 40 28.1 40 53.4 0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.3 16.9-46.5 40-53.4v-80.4C48.5 301 0 355.8 0 422.4v44.8C0 491.9 20.1 512 44.8 512h358.4c24.7 0 44.8-20.1 44.8-44.8v-44.8c0-72-56.8-130.3-128-133.8z" />
        </svg>
        <p class="text-sm text-gray-700">Usuarios</p>
        </span>
      </a>
    </div>
  </nav>
</div>