@extends('main-home.home')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="col-span-2">
     <div class="bg-white shadow rounded-lg p-4">
      <div class="flex justify-between items-center">
       <div class="flex items-center space-x-2">
        <a href="{{route('home')}}">
            <i class="fas fa-arrow-left text-gray-700">
            </i>
        </a>
        <div class="text-gray-700">
            <img src="{{ $photo->user->profile_picture ? asset('images/' . $photo->user->profile_picture) : asset('images/default_pict.jpg') }}"
            alt="Foto Profil"
            class="profile-picture"
            style="width: 30; height: 30; border-radius: 50%;">
        </div>
        <div class="text-gray-700">
            {{$photo->user->username}}
        </div>
       </div>
       <div class="flex items-center space-x-2">
        <button class="bg-red-600 text-white px-4 py-1 rounded-full">
         Simpan
        </button>
        {{-- <div class="relative">
         <button class="text-gray-700">
          Profil
          <i class="fas fa-caret-down">
          </i>
         </button>
         <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden">
          <a class="block px-4 py-2 text-gray-700" href="#">
           Option 1
          </a>
          <a class="block px-4 py-2 text-gray-700" href="#">
           Option 2
          </a>
         </div>
        </div> --}}
       </div>
      </div>
      <div class="mt-4">
       <img alt="Comic style VS image with two blank panels and speech bubbles" class="w-full rounded-lg" height="400" src="{{ asset('storage/' . $photo->lokasi_file) }}" width="600"/>
      </div>
      <div class="mt-4 flex items-center space-x-2">
        <form action="{{ route('like.toggle', $photo->id) }}" method="POST" class="inline">
            @csrf
            @php
                $liked = $photo->likes->contains('user_id', auth()->id());
            @endphp

            <!-- Tombol Like -->
            <button type="submit">
                @if ($liked)
                    <i class="fas fa-heart text-red-500 text-2xl"></i> <!-- Heart Solid -->
                @else
                    <i class="far fa-heart text-gray-500 text-2xl"></i> <!-- Heart Regular -->
                @endif
            </button>
           
                {{-- <label class="block text-gray-600">Tanggal</label> --}}
                <input type="date" name="tanggal_dibuat" class="hidden w-full border border-gray-300 rounded-lg p-2" value="{{ now()->format('Y-m-d') }}">

        </form>

        <!-- Jumlah Like -->
        <span class="ml-2 mb-4 text-gray-600">
            {{ $photo->likes->count() }} Like
        </span> 

    </div>
    <div x-data="{ open: false }" class="relative flex content-center w-full">
        <button 
            @click="open = !open"
            class=""
        >
        <i class="fas fa-comment text-gray-500 text-2xl">
        </i>
        <span class="text-gray-600 ml-1 mb-4">
           {{$photo->komentar->count()}} Komentar
        </span>
        </button>
    
        <!-- Comments Section -->
        <div 
            x-show="open" 
            @click.away="open = false" 
            x-transition 
            class="absolute bg-white border rounded shadow-lg mt-10 w-full p-4"
        >
            <h2 class="text-lg font-bold mb-4">Comments</h2>
    
            <!-- List Comments -->
            <div class="space-y-4">
                @foreach ($photo->komentar as $comment)
                    <div class="border-b pb-2 flex flex-col space-x-2">
                        <div class="flex flex-row items-center mb-2">
                            <img src="{{ $comment->user->profile_picture ? asset('images/' . $comment->user->profile_picture) : asset('images/default_pict.jpg') }}" class="rounded-full mb-2 h-8 w-8 object-cover">
                            <strong class="text-blue-600 ml-2 ">{{ $comment->user->username }}</strong>
                        </div>
                        <p>{{ $comment->isi_komentar }}</p>
                        <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>
    
            <!-- Add Comment Form -->
            @auth
            <form action="{{ route('komentar' , $photo->id) }}" method="POST" class="mt-4">
                @csrf
                <textarea 
                    name="isi_komentar" 
                    rows="2" 
                    class="w-full border rounded p-2" 
                    placeholder="Write a comment..." 
                    required></textarea>
                    <div class="mb-4">
                        {{-- <label class="block text-gray-600">Tanggal</label> --}}
                        <input type="date" name="tanggal_dibuat" class="hidden w-full border border-gray-300 rounded-lg p-2" value="{{ now()->format('Y-m-d') }}">
                    </div>
                <button 
                    type="submit" 
                    class="bg-red-500 text-white px-4 py-2 rounded mt-2"
                >
                    Post
                </button>
            </form>
            @endauth
        </div>
    </div>
      </div>
      <div class="mt-4">
        
      </div>
     </div>
    </div>
@endsection