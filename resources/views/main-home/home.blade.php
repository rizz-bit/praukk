<html>
 <head>
  <title>
   Pinterest Clone
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"/>
  <style>
    .modal {
      transition: opacity 0.3s ease, visibility 0.3s ease;
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
    function openModal() {
      document.getElementById('loginModal').classList.remove('modal-hidden');
      document.getElementById('loginModal').classList.add('modal-visible');
    }
 
    function closeModal() {
      document.getElementById('loginModal').classList.remove('modal-visible');
      document.getElementById('loginModal').classList.add('modal-hidden');
    }

    function togglePasswordVisibility() {
     const passwordInput = document.getElementById('password');
     const passwordIcon = document.getElementById('passwordIcon');
     if (passwordInput.type === 'password') {
       passwordInput.type = 'text';
       passwordIcon.classList.remove('fa-eye-slash');
       passwordIcon.classList.add('fa-eye');
     } else {
       passwordInput.type = 'password';
       passwordIcon.classList.remove('fa-eye');
       passwordIcon.classList.add('fa-eye-slash');
     }
   }
            
   </script>
 </head>
 <body class="bg-gray-100">
  <div class="flex">
   <!-- Sidebar -->
   @include('partials.sidebar_left')
   <!-- Main Content -->
   <div class="flex-1 p-4">
    <!-- Search Bar -->
    <div class="flex items-center bg-gray-200 rounded-full px-4 py-2 mb-4">
        <i class="fas fa-search text-gray-500"></i>
        <input type="text" placeholder="Search" class="bg-gray-200 outline-none ml-2 w-full">
    </div>
    
    @yield('content')
    
    @include('partials.sidebar_right')
   <!-- User Profile -->
  </div>
@include('auth.login')
 
 </body>
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
</html>

