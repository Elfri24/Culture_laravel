<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 px-4 py-8">

        <div class="bg-white/95 backdrop-blur-lg shadow-xl rounded-xl p-10 
                    w-full max-w-xl border border-gray-100
                    transition-transform duration-300 hover:shadow-2xl hover:scale-[1.02]">

            <div class="mb-6 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" 
                                   class="block text-sm font-semibold text-gray-700" />

                    <x-text-input id="email" 
                                  class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm
                                         focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                  type="email" name="email" :value="old('email')" required autofocus />

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <div class="flex items-center justify-end">
                    <x-primary-button
                        class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500
                               text-white font-semibold py-3 px-8 rounded-lg shadow-lg
                               transition-colors transition-transform duration-300 hover:scale-105">
                        {{ __('Send Password Reset Link') }}
                    </x-primary-button>
                </div>

            </form>
        </div>

    </div>

</x-guest-layout>
