<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-4">

        <!-- Logo -->
        <div class="mb-4">
            <img src="{{ asset('asset/logo-smpn2.png') }}" alt="Logo" class="w-20 sm:w-32 mx-auto h-auto">
        </div>

        <!-- Kalimat sambutan -->
        <p class="text-center text-gray-700 dark:text-gray-300 text-lg sm:text-xl font-medium mb-6">
            Selamat Datang di SI-Absensi <br> SMP Negeri 2 Cigalontang!
        </p>

        <!-- Form dengan transisi -->
        <div class="w-full max-w-md transition-all duration-700 ease-out opacity-0 translate-y-5 p-8" id="login-form-wrapper">
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-center mt-4">
                    {{-- @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif --}}

                    <x-primary-button class="ms-3 hover:bg-indigo-700 transition-colors duration-300">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script untuk transisi -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const wrapper = document.getElementById('login-form-wrapper');
            wrapper.classList.remove('opacity-0', 'translate-y-5');
            wrapper.classList.add('opacity-100', 'translate-y-0');
        });
    </script>
</x-guest-layout>