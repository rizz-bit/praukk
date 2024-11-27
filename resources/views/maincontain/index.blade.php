@extends('main-home.home')
@section('content')
<div class="grid grid-cols-6 gap-4">
    @foreach ($photo as $photos)

    <a href="{{ route('foto' , $photos->id) }}" class="bg-white rounded-lg overflow-hidden shadow-md block relative group hover:cursor-pointer">
        <img alt="" class="w-full" height="100" src="{{ asset('storage/' . $photos->lokasi_file) }}" width="150"/>
        <button class="opacity-0 group-hover:opacity-100 absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded-full transition-opacity duration-150 ease-in-out">
            Save
        </button>
    </a>
    @endforeach
</div>
  @endsection
