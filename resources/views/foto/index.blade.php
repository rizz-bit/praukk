@extends('main-home.home')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="col-span-2">
     <div class="bg-white shadow rounded-lg p-4">
      <div class="flex justify-between items-center">
       <div class="flex items-center space-x-2">
        <i class="fas fa-arrow-left text-gray-700">
        </i>
        <div class="text-gray-700">
         Nandho Aryuda
        </div>
       </div>
       <div class="flex items-center space-x-2">
        <button class="bg-red-600 text-white px-4 py-1 rounded-full">
         Simpan
        </button>
        <div class="relative">
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
        </div>
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
        <span class="ml-2 text-gray-600">
            {{ $photo->likes->count() }}
        </span> likes
    </div>
       <i class="fas fa-comment text-gray-700">
       </i>
       <span class="text-gray-700">
        1 Komentar
       </span>
      </div>
      <div class="mt-4">
       <input class="w-full border rounded-full px-4 py-2" placeholder="Tambahkan komentar" type="text"/>
      </div>
     </div>
    </div>
@endsection