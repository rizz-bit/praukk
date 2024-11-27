<div class="w-16 bg-white h-screen flex flex-col items-center py-6">
    <a class="mb-5" href="#">
     <!-- <img alt="Pinterest logo" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/enkfp7dduxsiTEL4yWQMb7LjGpEMV8SxRLCp4moziFMZl2uTA.jpg" width="24"/> -->
    </a>
    <a class="mb-5 hover:bg-gray-600/30 rounded p-2" href="{{route('home')}}">
     <i class="fas fa-compass text-gray-600 text-xl ">
     </i>
    </a>
    {{-- <a class="mb-5 hover:bg-gray-600/30 rounded p-2" href="{{route('add.foto')}}">
     <i class="fas fa-plus text-gray-600 text-xl">
     </i>
    </a> --}}
    {{-- <a class="mb-5 hover:bg-gray-600/30 rounded p-2" href="{{route('album')}}">
     <i class="fa-solid fa-folder text-gray-600 text-xl"></i>
    </a> --}}
    <a class="relative mb-5 hover:bg-gray-600/30 rounded p-2" href="#">
     <i class="fas fa-bell text-gray-600 text-xl">
     </i>
     <!-- <span class="absolute top-0 right-0 bg-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
      20
     </span> -->
    </a>
    <a href="#" class="hover:bg-gray-600/30 rounded p-2 mb-5">
     <i class="fas fa-comment-dots text-gray-600 text-xl">
     </i>
    </a>
    @if(auth()->user())
    <div class="relative" x-data="{ open: false }">
        <!-- Button -->
        <button @click="open = !open" class="px-4 py-2 rounded focus:outline-none">
            <img src="{{ auth()->user()->profile_picture ? asset('images/' . auth()->user()->profile_picture) : asset('images/default_pict.jpg') }}"
            alt="Foto Profil"
            class="profile-picture"
            style="width: 30; height: 30; border-radius: 50%;">
        </button>

        <!-- Dropdown Content -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="absolute z-[99] left-12 mt-0 w-48 bg-white border rounded-lg shadow-lg origin-top-left">
            <a href="{{ route('profile' , auth()->user()->id )}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile Saya</a>
            {{-- <button class="block px-4 py-2 text-gray-700 hover:bg-gray-100 w-full ">asdas</button> --}}
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            {{-- <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Option 3</a> --}}
        </div>
    </div>


    @else
    <button class="mb-4 hover:bg-gray-600/30 rounded p-2" onclick="openModal('loginModal')">
        <i class="fa-solid fa-user text-gray-600 text-xl"></i>
    </button>
    @endif

   </div>
