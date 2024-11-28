@extends('profile.index')
@section('profile')
{{-- <a href="{{ route('add.foto' , auth()->user()->id ) }}" class="absolute right-0">
    <i class="fas fa-plus text-2xl mr-8">
    </i>
</a> --}}

<div class="grid grid-cols-3 gap-4">
    @foreach ($foto as $fotos)
    <div class="bg-white rounded-lg overflow-hidden shadow-md">
            <a href="#" class="cursor-pointer w-full" onclick="openDeleteModal({{ $fotos->id }})">
                <img alt="" class="w-full h-64 object-cover rounded-lg shadow-lg transition duration-200 ease-in-out group-hover:scale-110" height="100" src="{{ asset('storage/' . $fotos->lokasi_file) }}" width="150" />
            </a>
        
            <form id="delete-form-{{ $fotos->id }}" action="{{ route('images.destroy', $fotos->id) }}" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>

            <div id="delete-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-6 rounded shadow-lg w-96">
                    <h2 class="text-xl mb-4">Are you sure you want to delete this image?</h2>
                    <div class="flex justify-between">
                        <button id="cancel-btn" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                        <button id="confirm-btn" type="submit " class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
                    </div>
                </div>
            </div>

    </div>
    @endforeach

    <script>
        // Fungsi untuk membuka modal
        function openDeleteModal(imageId) {
            // Menyimpan id gambar yang akan dihapus
            const deleteForm = document.getElementById('delete-form-' + imageId);
            const modal = document.getElementById('delete-modal');
            const confirmBtn = document.getElementById('confirm-btn');
    
            // Tampilkan modal
            modal.classList.remove('hidden');
    
            // Konfirmasi penghapusan
            confirmBtn.onclick = function () {
                deleteForm.submit(); // Kirim form penghapusan
            };
    
            // Menutup modal jika klik tombol cancel
            document.getElementById('cancel-btn').onclick = function () {
                modal.classList.add('hidden');
            };
    
            // Menutup modal jika klik di luar modal
            modal.onclick = function (e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            };
        }
    </script>
</div>
@endsection
