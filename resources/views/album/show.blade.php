@extends('profile.index')
@section('profile')
{{-- <a href="{{ route('add.foto' , auth()->user()->id ) }}" class="absolute right-0">
    <i class="fas fa-plus text-2xl mr-8">
    </i>
</a> --}}

<div class="grid grid-cols-3 gap-4">
    @foreach ($foto as $fotos)
    <div class="bg-white rounded-lg overflow-hidden shadow-md">
        <a href="">

            <img alt="" class="w-full rounded" height="100" src="{{ asset('storage/' . $fotos->lokasi_file) }}" width="150"/>
        </a>

    </div>
    @endforeach
</div>
@endsection
