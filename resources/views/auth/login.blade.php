<div class="modal" id="loginModal">
    <div class="modal-content w-96">
        <div class="flex justify-center mb-4">
            <img alt="Pinterest logo" class="h-10" height="40" src="https://storage.googleapis.com/a1aa/image/eD1qfqsa50rgS0gZ0vbcvmsiPpnJrX6ylcdwdMnUfcnePuBPB.jpg" width="40"/>
        </div>
        <h1 class="text-2xl font-semibold text-center mb-6">Welcome to Pinterest</h1>
        <form action="{{ route('login.post') }}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                <input name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="email" placeholder="Email" type="email"/>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                <div class="relative">
                    <input name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="password" placeholder="Password" type="password"/>
                    <i class="fas fa-eye absolute right-3 top-3 text-gray-500 cursor-pointer" id="togglePassword" onclick="togglePasswordVisibility('password', 'togglePassword')"></i>
                </div>
            </div>
            <div class="mb-4 text-right">
                <a class="text-sm text-gray-600" href="#">Forgot your password?</a>
            </div>
            <button class="w-full bg-red-600 text-white py-2 rounded-md text-lg font-semibold mb-4" type="submit">Log in</button>
        </form>
        <div class="flex items-center mb-4">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="mx-2 text-gray-500">OR</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>
        {{-- <button class="w-full bg-blue-600 text-white py-2 rounded-md text-lg font-semibold flex items-center justify-center mb-4">
            <i class="fab fa-facebook-f mr-2"></i> Continue with Facebook
        </button> --}}
        {{-- <button class="w-full bg-white border border-gray-300 text-gray-700 py-2 rounded-md text-lg font-semibold flex items-center justify-center mb-4">
            <img alt="User avatar" class="h-5 w-5 rounded-full mr-2" height="20" src="https://storage.googleapis.com/a1aa/image/e4nasBpVVdUJLSfsvdSAQw6CrWhNkXBxNdvj8MTBNkkAkbwTA.jpg" width="20"/>
            <span class="flex-grow text-left">Continue as 36_rizki</span>
            <img alt="Google logo" class="h-5 w-5 ml-2" height="20" src="https://storage.googleapis.com/a1aa/image/44iUtRUxo46TPF6UOTVAxSaFMRQMeGrQXGAIvhNaeDyBkbwTA.jpg" width="20"/>
        </button> --}}
        <p class="text-xs text-gray-600 text-center mb-4">
            By continuing, you agree to Pinterest's <a class="text-blue-600" href="#">Terms of Service</a> and acknowledge you've read our <a class="text-blue-600" href="#">Privacy Policy</a>. <a class="text-blue-600" href="#">Notice at collection.</a>
        </p>
        <p class="text-sm text-gray-600 text-center">
            Not on Pinterest yet? <a class="text-blue-600 cursor-pointer" id="showSignUp" onclick="showSignUpModal()">Sign up</a>
        </p>
        <p class="text-sm text-gray-600 text-center">
            Are you a business? <a class="text-blue-600" href="#">Get started here!</a>
        </p>
        <button class="absolute top-4 right-4 text-gray-500" id="closeLoginModal" onclick="closeModal('loginModal')">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>