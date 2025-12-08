<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 px-4 py-8">

        <div class="bg-white/95 backdrop-blur-lg shadow-xl rounded-xl p-10 w-full max-w-md border border-gray-100
                    transition-transform duration-300 hover:shadow-2xl hover:scale-[1.02]">

            <div class="mb-6 text-sm text-gray-600">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-semibold text-gray-700" />

                    <x-text-input id="password" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm
                                    focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                  type="password" name="password" required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <div class="flex justify-end items-center gap-4">

                    <a href="{{ route('password.request') }}"
                       class="text-sm text-indigo-600 hover:text-indigo-800 underline rounded-md
                              focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Forgot your password?') }}
                    </a>

                    <x-primary-button
                        class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500
                               text-white font-semibold py-3 px-8 rounded-lg shadow-lg
                               transition-colors transition-transform duration-300 hover:scale-105">
                        {{ __('Confirm') }}
                    </x-primary-button>

                </div>

            </form>
        </div>
    </div>

</x-guest-layout>
