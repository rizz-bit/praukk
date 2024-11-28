@extends('main-home.home')
@section('content')
{{-- <div class="grid grid-cols-6 gap-4">
    @foreach ($photo as $photos)

    <a href="{{ route('foto' , $photos->id) }}" class="bg-white rounded-lg overflow-hidden shadow-md block relative group hover:cursor-pointer">
        <img alt="" class="w-full" height="100" src="{{ asset('storage/' . $photos->lokasi_file) }}" width="150"/>
        <button class="opacity-0 group-hover:opacity-100 absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded-full transition-opacity duration-150 ease-in-out">
            Save
        </button>
    </a>
    @endforeach
</div> --}}

<div class="grid grid-cols-6 gap-4">
    <!-- Example Photos -->
    @if ($photo->isNotEmpty())

    @foreach ($photo as $photos)
        
    <a href="{{route('foto' , $photos->id)}}">
        <div class="relative group">
            <img src="{{ asset('storage/' . $photos->lokasi_file) }}" alt="{{ $photos->judul_foto }}" class="w-full h-64 object-cover rounded-lg shadow-lg transition duration-200 ease-in-out group-hover:scale-110">
        </div>
    </a>
    @endforeach
    
    @else
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'No Photos Found',
                text: 'There were no photos found matching your search.',
                confirmButtonText: 'OK'
            });
        });
    </script>
        <div class="flex">
            <p class="text-2xl text-gray-600 font-semibold ">Not Found.</p>
        </div>
        

    @endif

    {{-- {{ $photo->links() }} --}}
</div>
  @endsection
