@extends('profile.index')
@section('profile')
{{-- <a href="{{ route('add.foto' , auth()->user()->id ) }}" class="absolute right-0">
    <i class="fas fa-plus text-2xl mr-8">
    </i>
</a> --}}
@foreach ($foto as $fotos)

<div class="w-1/4">
     <img alt="" class="w-full" height="100" src="{{ asset('storage/' . $fotos->lokasi_file) }}" width="150"/>
    </div>
@endforeach
@endsection
