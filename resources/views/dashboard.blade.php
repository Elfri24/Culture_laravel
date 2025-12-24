<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - Plateforme Culture Bénin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#D97706',
                        'primary-dark': '#B45309',
                        secondary: '#059669',
                        accent: '#7C3AED',
                        cultural: '#DC2626'
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --color-primary: #D97706;
            --color-primary-dark: #B45309;
        }

        .sidebar {
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
                height: 100vh;
                top: 0;
                left: 0;
                width: 280px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }

            .overlay.active {
                display: block;
            }
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            background-color: #E5E7EB;
        }

        .progress-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .flag-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
        }

        .lang-fon {
            background-color: #059669;
        }

        .lang-yoruba {
            background-color: #7C3AED;
        }

        .lang-dendi {
            background-color: #DC2626;
        }

        .lang-goun {
            background-color: #D97706;
        }

        .lang-fr {
            background-color: #3B82F6;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Overlay pour mobile -->
    <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

    <!-- Conteneur principal flex -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar bg-white dark:bg-gray-800 w-64 shadow-lg flex flex-col">
            <!-- Sidebar -->
            <!-- Logo -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center">
                        <i class="fas fa-landmark text-white"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-lg text-gray-900 dark:text-white">Culture Bénin</h1>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Plateforme Culturelle</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#dashboard"
                            class="nav-link active flex items-center space-x-3 p-3 rounded-lg bg-primary/10 text-primary dark:bg-primary/20">
                            <i class="fas fa-home w-5"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="#contributions"
                            class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-pen-nib w-5"></i>
                            <span>Mes contributions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#traductions"
                            class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-language w-5"></i>
                            <span>Mes traductions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#favoris"
                            class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-heart w-5"></i>
                            <span>Favoris</span>
                            <span
                                class="ml-auto bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 text-xs px-2 py-1 rounded-full">12</span>
                        </a>
                    </li>
                    <li>
                        <a href="#notifications"
                            class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-bell w-5"></i>
                            <span>Notifications</span>
                            <span class="ml-auto bg-primary text-white text-xs px-2 py-1 rounded-full">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#profil"
                            class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-user w-5"></i>
                            <span>Mon profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#parametres"
                            class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-cog w-5"></i>
                            <span>Paramètres</span>
                        </a>
                    </li>
                </ul>

                <!-- Langue préférée -->
                <div class="mt-8 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <h3 class="font-semibold text-sm text-gray-700 dark:text-gray-300 mb-2">Langue d'affichage</h3>
                    <select
                        class="w-full bg-white dark:bg-gray-600 border border-gray-300 dark:border-gray-500 rounded-lg px-3 py-2 text-sm">
                        <option value="fr">Français</option>
                        <option value="fon">Fon</option>
                        <option value="yoruba">Yoruba</option>
                        <option value="dendi">Dendi</option>
                        <option value="goun">Goun</option>
                    </select>
                </div>
            </nav>

            <!-- Footer Sidebar -->
            <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <button id="themeToggle" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-moon text-gray-600 dark:text-gray-300"></i>
                    </button>
                    {{-- Dans votre template --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center space-x-2 text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="text-sm">Déconnexion</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="content-area flex-1 ml-0 lg:ml-0 min-h-screen">
            <!-- Header -->
            <header
                class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 p-4 sticky top-0 z-30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="menuToggle"
                            class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-bars text-gray-600 dark:text-gray-300"></i>
                        </button>
                        <div>
                            <h1 class="text-xl font-bold text-gray-900 dark:text-white">Bienvenue, Koffi</h1>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Contributeur culturel</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Recherche -->
                        <div class="relative hidden md:block">
                            <input type="text" placeholder="Rechercher un contenu culturel..."
                                class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 w-64 focus:outline-none focus:ring-2 focus:ring-primary">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>

                        <!-- Nouvelle contribution -->
                        <button
                            class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg font-semibold flex items-center space-x-2">
                            <i class="fas fa-plus"></i>
                            <span>Nouvelle contribution</span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Section: Statistiques -->
            <section id="dashboard">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Tableau de bord culturel</h2>

                    <!-- Cartes de statistiques -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Contenus publiés</p>
                                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">24</p>
                                </div>
                                <div
                                    class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                    <i class="fas fa-book text-green-600 dark:text-green-300 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="progress-bar">
                                    <div class="progress-fill bg-green-500" style="width: 80%"></div>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Objectif: 30 contenus</p>
                            </div>
                        </div>

                        <div class="card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Traductions</p>
                                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">42</p>
                                </div>
                                <div
                                    class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                    <i class="fas fa-language text-purple-600 dark:text-purple-300 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400">5 langues utilisées</p>
                                <div class="flex space-x-1 mt-2">
                                    <div class="flag-icon lang-fon" title="Fon">F</div>
                                    <div class="flag-icon lang-yoruba" title="Yoruba">Y</div>
                                    <div class="flag-icon lang-dendi" title="Dendi">D</div>
                                    <div class="flag-icon lang-goun" title="Goun">G</div>
                                    <div class="flag-icon lang-fr" title="Français">FR</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Contenus en attente</p>
                                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">3</p>
                                </div>
                                <div
                                    class="w-12 h-12 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center">
                                    <i class="fas fa-clock text-yellow-600 dark:text-yellow-300 text-xl"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-4">En cours de modération</p>
                        </div>

                        <div class="card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Points culturels</p>
                                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">1,540</p>
                                </div>
                                <div
                                    class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center">
                                    <i class="fas fa-star text-red-600 dark:text-red-300 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Top 15% des contributeurs</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Mes contributions récentes -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Mes contributions récentes</h3>
                        <a href="#contributions" class="text-primary hover:text-primary-dark font-medium">Voir
                            tout</a>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Carte contribution 1 -->
                        <div class="card-hover bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <span
                                            class="inline-block px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 rounded-full text-xs font-semibold">
                                            Contes
                                        </span>
                                        <h4 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                            La légende de Sègèlè
                                        </h4>
                                    </div>
                                    <div class="flex space-x-2">
                                        <span class="flag-icon lang-fon" title="Fon">F</span>
                                        <span class="flag-icon lang-fr" title="Français">FR</span>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 mt-3 text-sm">
                                    Conte traditionnel du peuple Fon racontant l'histoire d'un héros légendaire...
                                </p>
                                <div class="flex items-center justify-between mt-6">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                                            <span class="text-sm text-gray-600 dark:text-gray-400">Zou</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-eye text-gray-400"></i>
                                            <span class="text-sm text-gray-600 dark:text-gray-400">1.2k</span>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        Publié le 15/03/2024
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Carte contribution 2 -->
                        <div class="card-hover bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <span
                                            class="inline-block px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 rounded-full text-xs font-semibold">
                                            Recettes
                                        </span>
                                        <h4 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                            Recette d'Amiwo traditionnel
                                        </h4>
                                    </div>
                                    <div class="flex space-x-2">
                                        <span class="flag-icon lang-goun" title="Goun">G</span>
                                        <span class="flag-icon lang-fr" title="Français">FR</span>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 mt-3 text-sm">
                                    Préparation traditionnelle du plat emblématique du sud Bénin avec ses épices...
                                </p>
                                <div class="flex items-center justify-between mt-6">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                                            <span class="text-sm text-gray-600 dark:text-gray-400">Atlantique</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-heart text-red-400"></i>
                                            <span class="text-sm text-gray-600 dark:text-gray-400">89</span>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        Modéré le 10/03/2024
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Régions couvertes -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Régions couvertes</h3>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                            <div class="text-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                <div
                                    class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-mountain text-primary"></i>
                                </div>
                                <p class="font-semibold">Atacora</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">5 contenus</p>
                            </div>
                            <div class="text-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-water text-green-600 dark:text-green-300"></i>
                                </div>
                                <p class="font-semibold">Zou</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">8 contenus</p>
                            </div>
                            <div class="text-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                <div
                                    class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-tree text-purple-600 dark:text-purple-300"></i>
                                </div>
                                <p class="font-semibold">Collines</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">4 contenus</p>
                            </div>
                            <div class="text-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                <div
                                    class="w-10 h-10 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-sun text-yellow-600 dark:text-yellow-300"></i>
                                </div>
                                <p class="font-semibold">Mono</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">3 contenus</p>
                            </div>
                            <div class="text-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                <div
                                    class="w-10 h-10 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-landmark text-red-600 dark:text-red-300"></i>
                                </div>
                                <p class="font-semibold">Abomey</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">6 contenus</p>
                            </div>
                            <div class="text-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-plus text-blue-600 dark:text-blue-300"></i>
                                </div>
                                <p class="font-semibold text-gray-400">Ajouter</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nouvelle région</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Activité récente -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Activité récente</h3>
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Activité 1 -->
                            <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-750">
                                <div class="flex items-start space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-check text-green-600 dark:text-green-300"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-900 dark:text-white">
                                            Votre traduction en <strong>Yoruba</strong> de "La danse Zinli" a été
                                            approuvée
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Il y a 2 heures</p>
                                    </div>
                                    <span class="flag-icon lang-yoruba">Y</span>
                                </div>
                            </div>

                            <!-- Activité 2 -->
                            <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-750">
                                <div class="flex items-start space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-comment text-blue-600 dark:text-blue-300"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-900 dark:text-white">
                                            <strong>Mariam</strong> a commenté votre recette "Sauce feuille"
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Il y a 1 jour</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Activité 3 -->
                            <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-750">
                                <div class="flex items-start space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-clock text-yellow-600 dark:text-yellow-300"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-900 dark:text-white">
                                            Votre conte "L'araignée et la sagesse" est en cours de modération
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Il y a 2 jours</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Activité 4 -->
                            <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-750">
                                <div class="flex items-start space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-star text-purple-600 dark:text-purple-300"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-900 dark:text-white">
                                            Vous avez reçu 50 points pour votre contribution sur les rites Vodun
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Il y a 3 jours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: Suggestions de contribution -->
            <section class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Suggestions de contribution</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
                        <div class="flex items-center space-x-3 mb-4">
                            <div
                                class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center">
                                <i class="fas fa-utensils text-red-600 dark:text-red-300 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white">Recettes manquantes</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Région de l'Atacora</p>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                            Aidez-nous à documenter les plats traditionnels de l'Atacora
                        </p>
                        <button
                            class="w-full bg-red-100 dark:bg-red-900 hover:bg-red-200 dark:hover:bg-red-800 text-red-700 dark:text-red-300 py-2 rounded-lg font-medium">
                            Contribuer une recette
                        </button>
                    </div>

                    <div class="card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
                        <div class="flex items-center space-x-3 mb-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                <i class="fas fa-language text-blue-600 dark:text-blue-300 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white">Traductions nécessaires</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Vers le Dendi</p>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                            15 contes attendent une traduction en langue Dendi
                        </p>
                        <button
                            class="w-full bg-blue-100 dark:bg-blue-900 hover:bg-blue-200 dark:hover:bg-blue-800 text-blue-700 dark:text-blue-300 py-2 rounded-lg font-medium">
                            Proposer une traduction
                        </button>
                    </div>

                    <div class="card-hover bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
                        <div class="flex items-center space-x-3 mb-4">
                            <div
                                class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                <i class="fas fa-microphone text-green-600 dark:text-green-300 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white">Enregistrements audio</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Contes en Fon</p>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                            Ajoutez des enregistrements audio pour enrichir les contes
                        </p>
                        <button
                            class="w-full bg-green-100 dark:bg-green-900 hover:bg-green-200 dark:hover:bg-green-800 text-green-700 dark:text-green-300 py-2 rounded-lg font-medium">
                            Ajouter un audio
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        // Initialisation au chargement
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion du thème
            initTheme();

            // Gestion du menu mobile
            initMobileMenu();

            // Gestion de la navigation
            initNavigation();

            // Simulation de données
            simulateData();
        });

        // Gestion du thème sombre/clair
        function initTheme() {
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = themeToggle?.querySelector('i');

            // Vérifier la préférence stockée
            const storedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            // Appliquer le thème initial
            if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
                if (themeIcon) themeIcon.className = 'fas fa-sun';
            }

            // Gérer le clic sur le bouton
            themeToggle?.addEventListener('click', () => {
                const isDark = document.documentElement.classList.contains('dark');

                if (isDark) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    if (themeIcon) themeIcon.className = 'fas fa-moon';
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    if (themeIcon) themeIcon.className = 'fas fa-sun';
                }
            });
        }

        // Gestion du menu mobile
        function initMobileMenu() {
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
            }

            menuToggle?.addEventListener('click', toggleSidebar);
            overlay?.addEventListener('click', toggleSidebar);

            // Exposer la fonction globalement
            window.toggleSidebar = toggleSidebar;
        }

        // Gestion de la navigation
        function initNavigation() {
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Retirer la classe active de tous les liens
                    navLinks.forEach(l => l.classList.remove('active', 'bg-primary/10', 'text-primary',
                        'dark:bg-primary/20'));
                    navLinks.forEach(l => l.classList.add('hover:bg-gray-100', 'dark:hover:bg-gray-700'));

                    // Ajouter la classe active au lien cliqué
                    this.classList.remove('hover:bg-gray-100', 'dark:hover:bg-gray-700');
                    this.classList.add('active', 'bg-primary/10', 'text-primary', 'dark:bg-primary/20');

                    // Si sur mobile, fermer le sidebar après clic
                    if (window.innerWidth < 768) {
                        window.toggleSidebar();
                    }

                    // Récupérer la cible du lien
                    const targetId = this.getAttribute('href');
                    if (targetId.startsWith('#')) {
                        e.preventDefault();
                        const targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });
        }

        // Simulation de données et interactions
        function simulateData() {
            // Simuler le chargement des progress bars
            setTimeout(() => {
                document.querySelectorAll('.progress-fill').forEach(bar => {
                    bar.style.transition = 'width 1.5s ease-in-out';
                });
            }, 500);

            // Gérer les boutons de contribution
            document.querySelectorAll('button').forEach(btn => {
                if (btn.textContent.includes('Contribuer') || btn.textContent.includes('Proposer')) {
                    btn.addEventListener('click', function() {
                        alert('Redirection vers le formulaire de contribution...');
                    });
                }
            });

            // Gestion du changement de langue
            const langSelect = document.querySelector('select');
            langSelect?.addEventListener('change', function() {
                const selectedLang = this.options[this.selectedIndex].text;
                alert(`Langue d'affichage changée en : ${selectedLang}`);
            });
        }

        // Fonction pour ajouter une nouvelle contribution
        function addNewContribution() {
            alert(
                'Ouverture du formulaire de nouvelle contribution...\n\nVous pourrez :\n1. Choisir le type de contenu (conte, recette, article)\n2. Sélectionner la région\n3. Choisir la langue principale\n4. Ajouter du texte et des médias\n5. Soumettre pour modération'
            );
        }

        // Exposer la fonction globalement
        window.addNewContribution = addNewContribution;

        // Attacher l'événement au bouton "Nouvelle contribution"
        document.querySelector('button.bg-primary')?.addEventListener('click', addNewContribution);
    </script>
</body>

</html>
