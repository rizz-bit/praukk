@extends('profile.index')
@section('profile')
<div class="container mx-auto mt-10">
    <a href="{{ route('album') }}" class="absolute right-0">
        <i class="fas fa-plus text-2xl mr-8">
        </i>
    </a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($albums as $album)
        <a href="{{ route('album.foto', $album->id) }}">
            <div class="max-w-sm rounded overflow-hidden shadow-lg group relative transition-all transform hover:scale-105">
                <!-- Gambar -->
                <img class="w-full h-48 object-cover transition duration-300" src="{{ asset('storage/' . $album->photo) }}" alt="Image">
              
                <!-- Konten (Nama dan Deskripsi) -->
                <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 group-hover:h-full transition-all duration-300">
                  <i class="fa-solid fa-folder text-white text-4xl mb-2"></i>
                  <h2 class="text-xl font-bold text-white mb-2">{{$album->nama_album}}</h2>
                  <p class="text-white text-center">{{ $album->deskripsi }}</p>
                </div>
              </div>
              
              
        </a>
            {{-- <div class="album-card bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('album.show', $album->id) }}">
                    <img src="{{ asset('storage/' . $album->photo) }}" class="w-full h-48 object-cover" alt="{{ $album->title }}">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ $album->nama_album }}</h2>
                        <p class="text-gray-600">{{ $album->deskripsi }}</p>
                    </div>
                </a>
                <a href="{{ route('album.foto', $album->id) }}" class="block p-4 text-center text-white bg-blue-500 hover:bg-blue-600 rounded-b-lg">
                    Lihat Album
                </a>
            </div>--}}
        @endforeach 
    </div>
</div>
@endsection
