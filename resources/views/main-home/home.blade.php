<html>
 <head>
  <title>
   Pinterest Clone
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100">
  <div class="flex">
   <!-- Sidebar -->
   @include('partials.sidebar_left')
   <!-- Main Content -->
   <div class="flex-1 p-4">
    <!-- Search Bar -->
    <div class="flex items-center bg-white p-2 rounded-full shadow-md mb-4">
     <i class="fas fa-search text-gray-600 ml-2">
     </i>
     <input class="ml-2 w-full outline-none" placeholder="Search" type="text"/>
    </div>
    <!-- Pins Grid -->
    <div class="grid grid-cols-6 gap-4">
     <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img alt="Apple logo with water droplets" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/JB16XfpIBE0kAiOCm7Xmz7uPwTbpePbq8KAWwMDln5Zbl2uTA.jpg" width="200"/>
     </div>
     <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img alt="It's okay to not be okay text" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/dlvjFsGb9MJ5Lpe2MY52JmMNWfPDexfqyRwTY43HewMWq02dC.jpg" width="200"/>
     </div>
     <a href="#" class="bg-white rounded-lg overflow-hidden shadow-md block relative group hover:cursor-pointer">
      <img alt="Cozy bedroom with green blanket" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/FmKSqyrsn4IkK1qFmYF3D6S0bQGPVzobxktA4EtS3OUVpt7E.jpg" width="200"/>
      <button class="opacity-0 group-hover:opacity-100 absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded-full transition-opacity duration-150 ease-in-out">
       Save
      </button>
     </a>
     <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img alt="Cherry pattern" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/gne7RpJQ9LXMQas98pfqHLGemGDcMI0nX4LQKJoiqjc1KtdnA.jpg" width="200"/>
     </div>
     <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img alt="Porsche car from top view" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/grv2jn2a4trdCBG5fxkbCgffD1C13pfHYq3QoQeIc5TAq02dC.jpg" width="200"/>
     </div>
     <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img alt="Palm tree and blue sky" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/BEeEZsTwKoy7cCFSbpUA3LjhfxsSxQSyNNQz0R5w6vudl2uTA.jpg" width="200"/>
     </div>
     <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img alt="Arabic text" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/eY21kUfqtIrFcUPx7VcdcLh7sxk4TxstFqGTQFh8w79fKtdnA.jpg" width="200"/>
     </div>
     <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img alt="Spiderman comic cover" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/oolFHlJD4xqdPJtPctfUzAhIkGt3ToVfrQwkdjZ3LEFTl2uTA.jpg" width="200"/>
     </div>
     <div class="bg-white rounded-lg overflow-hidden shadow-md">
      <img alt="Vintage camera and flowers" class="w-full h-auto" height="300" src="https://storage.googleapis.com/a1aa/image/eawFETe1VBmc2ELxyciXb4J62ViKIswUdvlv15FHlRwXl2uTA.jpg" width="200"/>
     </div>
    </div>
   </div>
   <!-- User Profile -->
   @include('partials.sidebar_right')
  </div>
 </body>
</html>
