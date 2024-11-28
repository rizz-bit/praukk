@extends('main-home.home')
@section('content')

<div class="flex-1 flex flex-col items-center mt-10">
    <div class="w-24 h-24 rounded-full text-white flex overflow-hidden items-center justify-center text-4xl mb-4">
     <img src="{{ auth()->user()->profile_picture ? asset('images/' . auth()->user()->profile_picture) : asset('images/default_pict.jpg') }}" class="w-full h-full object-cover" style="">
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
     {{-- <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">
      Share
     </button> --}}
     <a href="{{ route('profile.edit' , auth()->user()->id) }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">
      Edit profile
     </a>
    </div>
    <div class="">
        <div x-data="{ activeTab: '{{ request('tab', 'created') }}' }" class="flex space-x-8 mb-4">
            <a href="{{ route('profile', auth()->user()->id , ['tab' => 'created']) }}"
               @click="activeTab = 'created'"
               :class="{'border-b-2 border-black pb-1': activeTab === 'created', 'text-black': activeTab === 'created', 'text-gray-500': activeTab !== 'created'}"
               class="transition duration-300">
                Foto
            </a>
            <a href="{{ route('album.show', ['id' => auth()->user()->id, 'tab' => 'album']) }}"
               @click="activeTab = 'album'"
               :class="{'border-b-2 border-black pb-1': activeTab === 'album', 'text-black': activeTab === 'album', 'text-gray-500': activeTab !== 'album'}"
               class="transition duration-300">
                Album
            </a>
        </div>
    </div>
    <div class="flex space-x-4">
        @yield('profile')
     {{-- <div class="w-1/4">
      <img alt="Screenshot of a web page" class="w-full" height="100" src="https://storage.googleapis.com/a1aa/image/WhWIixmZ3yIjBt7r3HCbq3ovhcqNeLliif77eZrJNjPozKinA.jpg" width="150"/>
     </div>
     <div class="w-1/4">
      <img alt="Another screenshot of a web page" class="w-full" height="100" src="https://storage.googleapis.com/a1aa/image/X7HZDG3OXbLgKRvzPuVEVZM6znf8mqTAx9gyxq0IdCDuti4JA.jpg" width="150"/>
     </div>
    </div> --}}
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
