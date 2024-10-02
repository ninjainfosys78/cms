<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="px-4 mx-auto max-w-7xl sm:px-6 ">
            <div class="relative max-w-md mx-auto md:mt-8">
                <div class="overflow-hidden rounded-md shadow-lg">
                    <div class="px-2 py-4 sm:px-8 sm:py-7">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="space-y-5">
                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" class="text-base font-medium text-gray-900"/>
                                    <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                            </svg>
                                        </div>
                                        <x-text-input id="email" class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600"
                                                      type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div>
                                    <div class="flex items-center justify-between">
                                        <x-input-label for="password" :value="__('Password')" class="text-base font-medium text-gray-900"/>
                                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-orange-500 transition-all duration-200 hover:text-orange-600 focus:text-orange-600 hover:underline">
                                            {{ __('Forgot password?') }}
                                        </a>
                                    </div>
                                    <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                                            </svg>
                                        </div>

                                        <!-- Password input field -->
                                        <x-text-input id="password" class="block w-full py-4 pl-10 pr-10 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600"
                                                      type="password" name="password" required autocomplete="current-password"/>

                                        <!-- View/Hide password button -->
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <button type="button" onclick="togglePasswordVisibility()" class="focus:outline-none text-gray-500 hover:text-gray-700">
                                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    <!-- Script to toggle password visibility -->



                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>



                                <!-- Submit Button -->
                                <div>
                                    <x-primary-button class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>

                                <!-- Register Link -->
                                <div class="text-center">
                                    <p class="text-base text-gray-600">Don’t have an account? <a href="{{ route('register') }}" title="" class="font-medium text-orange-500 transition-all duration-200 hover:text-orange-600 hover:underline">Create a New account</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script>
            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.getElementById('eyeIcon');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825a12.045 12.045 0 01-1.875.175c-4.476 0-8.267-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7 1.47 0 2.89.264 4.228.75m1.619 1.37a8.977 8.977 0 013.695 4.88c-1.273 4.057-5.064 7-9.541 7a12.045 12.045 0 01-4.228-.75m-4.673-4.14c-.808 2.57-3.352 4.14-6.174 4.14-1.573 0-3.02-.46-4.278-1.26"/>`;
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
                }
            }
        </script>

</x-guest-layout>
