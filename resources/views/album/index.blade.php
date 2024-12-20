@extends('main-home.home')
@section('content')
<form action="{{ route('album.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">
         Create Folder
        </h1>
        <div class="flex items-center space-x-4">
         {{-- <span class="text-gray-500">
          Changes stored!
         </span> --}}
         <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-full">
          Publish
         </button>
        </div>
       </div>
            <div class="flex">
                <!-- Upload Section -->
                <div id="dropZone" class="w-1/2 p-4 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center">
                    <i class="fas fa-upload text-2xl text-gray-500 mb-4"></i>
                    <p class="text-gray-500 mb-4">Choose a file or drag and drop it here</p>
                    <input type="file" name="photo" id="fileInput" class="hidden" onchange="handleFileSelect(event)">
                    <label for="fileInput" class="cursor-pointer bg-gray-200 text-gray-600 rounded-lg p-2">Select File</label>
                    <p id="fileName" class="text-gray-400 text-sm text-center mt-2"></p>
                    <img id="previewImage" class="hidden mt-4 max-w-full h-auto rounded-lg" alt="Preview Image">
                    <p class="text-gray-400 text-sm text-center mt-2">We recommend using high quality .jpg files less than 20 MB or .mp4 files less than 200 MB.</p>
                </div>

                <!-- Form Section -->
                <div class="w-1/2 pl-8">
                    <div class="mb-4">
                        <label class="block text-gray-600">Nama Album</label>
                        <input type="text" name="nama_album" placeholder="Tambah Nama Album" class="w-full border border-gray-300 rounded-lg p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600">Deskripsi</label>
                        <textarea placeholder="Tambah Deskripsi" name="deskripsi" class="w-full border border-gray-300 rounded-lg p-2 h-24"></textarea>
                    </div>
                    <div class="mb-4">
                        {{-- <label class="block text-gray-600">Tanggal</label> --}}
                        <input type="date" name="tanggal_dibuat" class="hidden w-full border border-gray-300 rounded-lg p-2" value="{{ now()->format('Y-m-d') }}">
                    </div>
                    {{-- <div class="mb-4">
                        <label class="block text-gray-600">Link</label>
                        <input type="text" placeholder="Add a link" class="w-full border border-gray-300 rounded-lg p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600">Board</label>
                        <select class="w-full border border-gray-300 rounded-lg p-2">
                            <option>Choose a board</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600">Tagged topics (0)</label>
                        <input type="text" placeholder="Search for a tag" class="w-full border border-gray-300 rounded-lg p-2">
                        <p class="text-gray-400 text-sm mt-1">Don't worry, people won't see your tags</p>
                    </div>
                    <div class="mb-4">
                        <button class="w-full bg-gray-200 text-gray-600 rounded-lg p-2">Save from URL</button>
                    </div>
                    <div class="text-gray-600 cursor-pointer">More options <i class="fas fa-chevron-down"></i></div> --}}
                </div>
            </div>
        </div>
    </form>
@endsection