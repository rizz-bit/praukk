<html>
 <head>
  <title>
   Pinterest Clone
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.10/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="//unpkg.com/alpinejs" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css">

  <style>
    .modal {
      transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 50;
        }
        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            position: relative;
        }
 
    .modal-hidden {
      opacity: 0;
      visibility: hidden;
    }
 
    .modal-visible {
      opacity: 1;
      visibility: visible;
    }
   </style>
    <script>
        
        // Toggle password visibility
        function togglePasswordVisibility(passwordFieldId, toggleIconId) {
            const passwordField = document.getElementById(passwordFieldId);
            const toggleIcon = document.getElementById(toggleIconId);
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            toggleIcon.classList.toggle('fa-eye-slash');
        }

        // Show and hide modals
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }

        function showSignUpModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('signUpModal').style.display = 'flex';
        }

        function showLoginModal() {
            document.getElementById('signUpModal').style.display = 'none';
            document.getElementById('loginModal').style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Show login modal on page load
        document.getElementById('loginModal').style.display = 'flex';

        document.addEventListener("DOMContentLoaded", function() {
    let modal = @json(session('modal'));
    console.log("Session modal:", modal); // Debug untuk cek apakah session diterima

    if (modal === 'register') {
        console.log("Showing register modal"); // Debug tambahan
        showModal('registerModal');
    } else if (modal === 'login') {
        console.log("Showing login modal"); // Debug tambahan
        showModal('loginModal');
    }
});
    </script>
 </head>
 <body class="bg-gray-100">
    
  <div class="flex">
   <!-- Sidebar -->
   @include('partials.sidebar_left')
   <!-- Main Content -->
   <div class="flex-1 p-4">
    <!-- Search Bar -->
    <form action="{{ route('home') }}" method="GET" class="flex flex-row items-center mb-4">

        <div class="flex items-center bg-gray-200 rounded-full w-full px-4 py-2 ">
            <i class="fas fa-search text-gray-500"></i>
            <input type="text" name="search" placeholder="Search" value="{{ request('search') }}" class="bg-gray-200 outline-none ml-2 w-full">
        </div>
        <button type="submit" class="bg-gray-800 text-white rounded-full px-4 py-2 ml-2">Search</button>
        
    </form>
    @yield('content')
    
    @include('partials.sidebar_right')
   <!-- User Profile -->
  </div>
@include('auth.login')
@include('auth.signin')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.10/dist/sweetalert2.all.min.js"></script>
 </body>
 @stack('scripts')
 <script>
    function handleFileSelect(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        const fileName = file.name;
        document.getElementById('fileName').textContent = fileName;

        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImage = document.getElementById('previewImage');
            previewImage.src = e.target.result;
            previewImage.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }

    const dropZone = document.getElementById('dropZone');

    dropZone.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropZone.classList.add('bg-gray-200');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('bg-gray-200');
    });

    dropZone.addEventListener('drop', (event) => {
        event.preventDefault();
        dropZone.classList.remove('bg-gray-200');
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('fileInput').files = files;
            handleFileSelect({ target: { files: files } });
        }
    });
    
</script>
    <script>
    function toggleLike(postId) {
        fetch(`/like/${postId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(response => response.json())
        .then(data => {
            // Update Icon
            let button = document.getElementById(`like-button-${postId}`);
            let countElement = document.getElementById(`like-count-${postId}`);
            if (data.status === 'liked') {
                button.innerHTML = `<i class="fas fa-heart text-red-500 text-2xl"></i>`;
                countElement.textContent = parseInt(countElement.textContent) + 1;
            } else {
                button.innerHTML = `<i class="far fa-heart text-gray-500 text-2xl"></i>`;
                countElement.textContent = parseInt(countElement.textContent) - 1;
            }
        });
    }
</script>



</html>

