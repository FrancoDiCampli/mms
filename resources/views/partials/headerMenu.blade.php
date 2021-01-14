<header class="flex justify-between items-center py-3 px-6 bg-white shadow-sm z-30">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </button>    
    </div>

    <div class="relative flex items-center space-x-3">      

        <div class="items-center hidden space-x-3 md:flex">
          <!-- Notification Button -->
          <div class="relative" x-data="{ isOpen: false }">
            <!-- red dot -->
            <div class="absolute right-0 p-1 bg-red-400 rounded-full animate-ping"></div>
            <div class="absolute right-0 p-1 bg-red-400 border rounded-full"></div>
            <button @click="isOpen = !isOpen" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring">
              <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
              </svg>
            </button>

            <!-- Dropdown card -->
            <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute w-48 max-w-md mt-3 transform bg-white rounded-md shadow-lg -translate-x-40 min-w-max" style="display: none;">
              <div class="p-4 font-medium border-b">
                <span class="text-gray-800">Notification</span>
              </div>
              <ul class="flex flex-col p-2 my-2 space-y-1">
                <li>
                  <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                </li>
                <li>
                  <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                </li>
              </ul>
              <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                <a href="#">See All</a>
              </div>
            </div>
          </div>

        </div>

        <!-- avatar button -->
        <div class="relative" x-data="{ isOpen: false }">
          <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
            <img class="object-cover w-8 h-8 rounded-full" src="https://avatars0.githubusercontent.com/u/57622665?s=460&amp;u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&amp;v=4" alt="Ahmed Kamel">
          </button>
          <!-- green dot -->
          <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
          <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

          <!-- Dropdown card -->
          <div @click.away="isOpen = false" x-show.transition.opacity="isOpen" class="absolute mt-3 transform -translate-x-48 bg-white rounded-md shadow-lg min-w-max w-56" style="display: none;">
            <div class="flex flex-col p-4 space-y-1 font-medium border-b">
              <span class="text-gray-800">{{Auth::user()->name}}</span>
              <span class="text-sm text-gray-400">{{Auth::user()->email}}</span>
            </div>
            <ul class="flex flex-col p-2 my-2 space-y-1">
              <li>
                <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Mi Perfil</a>
              </li>              
            </ul>
            <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
              <a class="block px-4 py-2 mt-2 text-sm bg-transparent rounded-md dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
              </form>  
            </div>
          </div>
        </div>
      </div>
</header>