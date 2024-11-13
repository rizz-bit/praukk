<div class="modal" id="signUpModal">
    <div class="modal-content w-96">
        <div class="flex justify-center mb-4">
            <img alt="Pinterest logo" class="h-10" height="40" src="https://storage.googleapis.com/a1aa/image/eD1qfqsa50rgS0gZ0vbcvmsiPpnJrX6ylcdwdMnUfcnePuBPB.jpg" width="40"/>
        </div>
        <h1 class="text-2xl font-semibold text-center mb-6">Sign Up for Pinterest</h1>
        <form>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="signupUsername">Username</label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="signupUsername" placeholder="USername" type="text"/>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="signupEmail">Email</label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="signupEmail" placeholder="Email" type="email"/>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="signupPassword">Password</label>
                <div class="relative">
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="signupPassword" placeholder="Password" type="password"/>
                    <i class="fas fa-eye absolute right-3 top-3 text-gray-500 cursor-pointer" id="toggleSignUpPassword" onclick="togglePasswordVisibility('signupPassword', 'toggleSignUpPassword')"></i>
                </div>
            </div>
            <button class="w-full bg-red-600 text-white py-2 rounded-md text-lg font-semibold mb-4" type="submit">Sign Up</button>
        </form>
        <p class="text-sm text-gray-600 text-center">
            Already have an account? <a class="text-blue-600 cursor-pointer" id="showLogin" onclick="showLoginModal()">Log in</a>
        </p>
        <button class="absolute top-4 right-4 text-gray-500" id="closeSignUpModal" onclick="closeModal('signUpModal')">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>