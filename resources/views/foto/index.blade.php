@extends('main-home.home')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 absolute left-[18%] top-[10%] w-full">
    <div class="flex col-span-3 md:col-span-2 justify-center w-full">
        <div class="bg-white shadow rounded-lg p-4 w-full flex flex-row relative">
            
            <div class="mr-5">
                <a href="{{ route('home') }}" class="text-gray-700">
                    <i class="fas fa-arrow-left text-2xl"></i>
                </a>
            </div>

            <div class="w-1/3">
                <img alt="Comic style VS image with two blank panels and speech bubbles" class="w-full rounded-lg" height="400" src="{{ asset('storage/' . $photo->lokasi_file) }}" width="400"/>
            </div>

            <div class="w-2/3 pl-5">
                <div class="flex mb-5 items-center space-x-2">
                    <div class="text-gray-700">
                        <img src="{{ $photo->user->profile_picture ? asset('images/' . $photo->user->profile_picture) : asset('images/default_pict.jpg') }}"
                            alt="Foto Profil"
                            class="profile-picture"
                            style="width: 40px; height: 40px; border-radius: 50%;">
                    </div>
                    <div class="text-gray-700 text-xl font-semibold">
                        {{$photo->user->username}}
                    </div>
                </div>

                <div class="text-gray-700 mb-10">
                    <h1 class="text-md font-semibold">Deskripsi</h1>
                    <p>{{ $photo->deskripsi_foto }}</p>
                </div>

                <!-- Interaksi Like dan Komentar -->
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

                    </form>

                    <!-- Jumlah Like -->
                    <span class="ml-2 mb-4 text-gray-600">
                        {{ $photo->likes->count() }} Like
                    </span>
                </div>

                <div x-data="{ open: false }" class="relative flex content-center w-full">
                    <button @click="open = !open" class="">
                        <i class="fas fa-comment text-gray-500 text-2xl"></i>
                        <span class="text-gray-600 ml-1 mb-4">{{ $photo->komentar->count() }} Komentar</span>
                    </button>

                    <!-- Comments Section -->
                    <div x-show="open" @click.away="open = false" x-transition class="absolute bg-white border rounded shadow-lg mt-10 w-full p-4">
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
                            <textarea name="isi_komentar" rows="2" class="w-full border rounded p-2" placeholder="Write a comment..." required></textarea>
                            <div class="mb-4">
                                <input type="date" name="tanggal_dibuat" class="hidden w-full border border-gray-300 rounded-lg p-2" value="{{ now()->format('Y-m-d') }}">
                            </div>
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mt-2">Post</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection