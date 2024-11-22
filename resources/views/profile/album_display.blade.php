@extends('profile.index')
@section('profile')
<div class="container mx-auto mt-10">
    <a href="{{ route('album') }}" class="absolute right-0">
        <i class="fas fa-plus text-2xl mr-8">
        </i>
    </a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($albums as $album)
            <div class="album-card bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('album.show', $album->id) }}">
                    <img src="{{ asset('storage/' . $album->photo) }}" class="w-full h-48 object-cover" alt="{{ $album->title }}">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ $album->nama_album }}</h2>
                        <p class="text-gray-600">{{ $album->deskripsi }}</p>
                    </div>
                </a>
                <a href="{{ route('album.show', $album->id) }}" class="block p-4 text-center text-white bg-blue-500 hover:bg-blue-600 rounded-b-lg">
                    Lihat Album
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection