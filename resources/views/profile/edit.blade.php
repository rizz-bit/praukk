@extends('main-home.home')
@section('content')
<div class="max-w-xl mx-auto p-8">
    <h1 class="text-2xl font-semibold mb-2">Edit profile</h1>
    <p class="text-sm text-gray-600 mb-6">Keep your personal details private. Information you add here is visible to anyone who can view your profile.</p>
    
    <div class="flex items-center mb-6">
        <div class="w-16 h-16 text-white flex items-center justify-center text-2xl overflow-hidden">
            <img src="{{ auth()->user()->profile_picture ? asset('images/' . auth()->user()->profile_picture) : asset('images/default_pict.jpg') }}" class="rounded-full flex-shrink-0 min-w-full min-h-full object-cover" id="previewImage" style="">
        </div>
        <button onclick="openModalChange()" class="ml-4 px-4 py-2 bg-gray-200 text-gray-800 rounded-full">Change</button>
    </div>
    <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden" onclick="closeModal(event)">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <h2 class="text-xl font-semibold mb-6">Change your picture</h2>
            <label for="imageInput" class="bg-red-600 text-white py-2 px-4 rounded-full cursor-pointer">
                Choose photo
            </label>
            <input id="imageInput" name="profile_picture" type="file" class="hidden" />
        </div>
    </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ auth()->user()->username }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ auth()->user()->nama_lengkap }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="alamat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ auth()->user()->alamat }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ auth()->user()->email }}">
        </div>

        <div class="flex justify-end mt-6">
            <button type="reset" class="px-4 py-2 bg-gray-200 text-gray-800 rounded mr-2">Reset</button>
            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded">Save</button>
        </div>
    </form>
</div>
@endsection
@push('scripts')

<script>
    function openModalChange() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal(event) {
        if (event.target === event.currentTarget) {
            document.getElementById('modal').classList.add('hidden');
        }
    }

    const previewImage = document.getElementById('previewImage');
const imageInput = document.getElementById('imageInput');

// Tambahkan event listener untuk input file
imageInput.addEventListener('change', function(event) {
    const file = event.target.files[0]; // Ambil file yang diunggah

    if (file) {
        const reader = new FileReader(); // Buat FileReader untuk membaca file

        // Ketika file selesai dibaca
        reader.onload = function(e) {
            previewImage.src = e.target.result; // Ubah src gambar dengan data file
        };

        reader.readAsDataURL(file); // Baca file sebagai URL data
    }
});
</script>
@endpush
