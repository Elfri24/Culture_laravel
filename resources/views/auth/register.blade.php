<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 px-4 py-6">
        <div
            class="relative bg-white/90 backdrop-blur-xl shadow-2xl rounded-2xl w-full max-w-lg p-10 
                   border border-indigo-100 transform transition-all duration-500 hover:scale-[1.02]">

            <!-- Glow animé -->
            <div
                class="absolute inset-0 rounded-2xl bg-gradient-to-r from-indigo-400 to-blue-400 opacity-20 blur-3xl -z-10 animate-pulse">
            </div>

            <h2 class="text-3xl font-extrabold text-center text-indigo-700 mb-6 tracking-tight">
                Création de compte
            </h2>

            <!-- Validation Errors Globale -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <!-- Nom -->
                <div class="mb-5">
                    <label for="nom" class="block text-sm font-semibold text-gray-700 mb-1">Nom</label>
                    <input id="nom" type="text" name="nom" value="{{ old('nom') }}" required autofocus
                        autocomplete="name"
                        class="w-full rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('nom')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Prénom -->
                <div class="mb-5">
                    <label for="prenom" class="block text-sm font-semibold text-gray-700 mb-1">Prénom</label>
                    <input id="prenom" type="text" name="prenom" value="{{ old('prenom') }}" required
                        autocomplete="given-name"
                        class="w-full rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('prenom')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Adresse Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        autocomplete="username"
                        class="w-full rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Mot de passe -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Mot de passe</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Confirmer
                        le mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="w-full rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Sexe -->
                <select id="sexe" name="sexe" required
                    class="w-full rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled {{ old('sexe') ? '' : 'selected' }}>-- Choisissez --</option>
                    <option value="H" {{ old('sexe') === 'H' ? 'selected' : '' }}>H</option>
                    <option value="F" {{ old('sexe') === 'F' ? 'selected' : '' }}>F</option>
                </select>


                <!-- Rôle -->
                <div class="mb-5">
                    <label for="role_id" class="block text-sm font-semibold text-gray-700 mb-1">Rôle</label>
                    <select id="role_id" name="role_id" required
                        class="w-full rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled {{ old('role_id') ? '' : 'selected' }}>-- Choisissez un rôle --
                        </option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->nom_role ?? $role->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('role_id')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Langue -->
                <div class="mb-6">
                    <label for="langue_id" class="block text-sm font-semibold text-gray-700 mb-1">Langue</label>
                    <select id="langue_id" name="langue_id" required
                        class="w-full rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled {{ old('langue_id') ? '' : 'selected' }}>-- Choisissez une
                            langue --</option>
                        @foreach ($langues as $langue)
                            <option value="{{ $langue->id }}"
                                {{ old('langue_id') == $langue->id ? 'selected' : '' }}>
                                {{ $langue->nom_langue ?? $langue->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('langue_id')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Bouton soumission -->
                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg shadow-md
                           hover:bg-indigo-700 transition-all duration-300 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-400">
                    Créer mon compte
                </button>

                <!-- Lien vers login -->
                <p class="text-center mt-6 text-gray-700 text-sm">
                    Vous avez déjà un compte ?
                    <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline transition">
                        Se connecter
                    </a>
                </p>
            </form>

        </div>
    </div>
</x-guest-layout>
