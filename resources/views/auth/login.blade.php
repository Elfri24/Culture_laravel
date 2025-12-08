<x-guest-layout>


    <!-- Glow animé -->
    <div
        class="absolute inset-0 rounded-2xl bg-gradient-to-r from-indigo-400 to-blue-400 opacity-20 blur-3xl -z-10 animate-pulse">
    </div>

    <h2 class="text-3xl font-extrabold text-center text-indigo-700 mb-6 tracking-tight">
        Connexion
    </h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-green-600" :status="session('status')" />

    <!-- Validation Errors -->
    <x-input-error :messages="$errors->all()" class="mb-4 text-red-500" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-5">
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" autocomplete="email" required autofocus
                class="w-full rounded-lg border-gray-300 shadow-sm 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('email') }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Mot de passe</label>
            <input id="password" type="password" name="password" autocomplete="current-password" required
                class="w-full rounded-lg border-gray-300 shadow-sm 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center text-sm text-gray-600">
                <input type="checkbox" name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <span class="ml-2">Se souvenir de moi</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition">
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg shadow-md
                           hover:bg-indigo-700 transition-all duration-300 hover:shadow-xl">
            Connexion
        </button>

        <!-- Register Link -->
        <p class="text-center mt-6 text-gray-700 text-sm">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline transition">
                S’inscrire
            </a>
        </p>
    </form>


</x-guest-layout>
