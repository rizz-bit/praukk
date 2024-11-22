@extends('main-home.home')
@section('content')

<div class="flex-1 flex flex-col items-center">
    <div class="w-24 h-24 text-white flex items-center justify-center text-4xl mb-4">
     <img src="{{ auth()->user()->profile_picture ? asset('images/' . auth()->user()->profile_picture) : asset('images/default_pict.jpg') }}" class="rounded-full">
    </div>
    <div class="text-2xl font-semibold mb-1">
     {{auth()->user()->username}}
    </div>
    <div class="text-gray-500 mb-4">
     {{auth()->user()->email}}
    </div>
    {{-- <div class="text-gray-500 mb-4">
     0 following
    </div> --}}
    <div class="flex space-x-4 mb-4">
     <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">
      Share
     </button>
     <a href="{{ route('profile.edit' , auth()->user()->id) }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">
      Edit profile
     </a>
    </div>
    <div class="flex space-x-8 mb-4">
     <button class="border-b-2 border-black pb-1">
      Created
     </button>
     <button class="text-gray-500">
      Album
     </button>
    </div>
    <div class="flex space-x-4">
     <div class="w-1/4">
      <img alt="Screenshot of a web page" class="w-full" height="100" src="https://storage.googleapis.com/a1aa/image/WhWIixmZ3yIjBt7r3HCbq3ovhcqNeLliif77eZrJNjPozKinA.jpg" width="150"/>
     </div>
     <div class="w-1/4">
      <img alt="Another screenshot of a web page" class="w-full" height="100" src="https://storage.googleapis.com/a1aa/image/X7HZDG3OXbLgKRvzPuVEVZM6znf8mqTAx9gyxq0IdCDuti4JA.jpg" width="150"/>
     </div>
    </div>
   </div>
@endsection
@push('scripts')
@if(@session('success'))
<script>
    Swal.fire({
        title: 'Sukses!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
@endpush