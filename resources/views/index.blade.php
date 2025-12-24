{{-- resources/views/culture.blade.php --}}
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>CULTURE BENIN — Refonte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        :root {
            --color-primary: #f97316;
            --color-primary-dark: #ea580c;
            --color-text: #1f2937;
            --color-text-light: #6b7280;
            --color-bg: #ffffff;
            --color-bg-alt: #f9fafb;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dark {
            --color-text: #f9fafb;
            --color-text-light: #d1d5db;
            --color-bg: #111827;
            --color-bg-alt: #1f2937;
        }

        /* Animations */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            opacity: 0;
        }

        .fade-up.animated {
            animation: fadeUp 0.6s ease-out forwards;
        }

        .stagger>* {
            opacity: 0;
        }

        .stagger>.animated:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stagger>.animated:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stagger>.animated:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stagger>.animated:nth-child(4) {
            animation-delay: 0.4s;
        }

        /* Styles globaux */
        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            transition: var(--transition);
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dark .glass {
            background: rgba(17, 24, 39, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-hover {
            transition: var(--transition);
            box-shadow: var(--shadow-md);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .section-padding {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        @media (min-width: 768px) {
            .section-padding {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }
        }

        /* Timeline */
        .timeline-item {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 2rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--color-primary);
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 1.7rem;
            width: 2px;
            height: calc(100% + 1rem);
            background-color: var(--color-primary);
        }

        .timeline-item:last-child::after {
            display: none;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
            z-index: 50;
            opacity: 0;
            transition: opacity 0.3s ease-out;
            pointer-events: none;
        }

        .modal-overlay.open {
            opacity: 1;
            pointer-events: all;
        }

        .modal-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.95);
            max-width: 90%;
            width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            background: var(--color-bg);
            border-radius: 1rem;
            box-shadow: var(--shadow-xl);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 51;
            pointer-events: none;
        }

        .modal-content.open {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            pointer-events: all;
        }

        /* Slider */
        .carousel {
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .carousel::-webkit-scrollbar {
            display: none;
        }

        .snap-x {
            scroll-snap-type: x mandatory;
        }

        .snap-start {
            scroll-snap-align: start;
        }

        /* Styles pour l'icône de thème */
        #themeToggle svg {
            transition: transform 0.3s ease;
        }

        #themeToggle:hover svg {
            transform: rotate(30deg);
        }

        /* Assurer que les couleurs s'inversent correctement */
        .dark img {
            filter: brightness(0.9);
        }

        /* Correction pour les arrière-plans des boutons */
        button.tab-btn.bg-orange-500 {
            background-color: #f97316 !important;
            color: white !important;
        }

        .dark button.tab-btn.bg-orange-500 {
            background-color: #ea580c !important;
        }

        button.tab-btn:not(.bg-orange-500) {
            background-color: white;
            color: #374151;
        }

        .dark button.tab-btn:not(.bg-orange-500) {
            background-color: #374151;
            color: #d1d5db;
        }
    </style>
</head>

<body class="antialiased bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    <!-- Header -->
    <header
        class="fixed w-full z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm border-b border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 rounded-lg bg-orange-500 flex items-center justify-center text-white font-extrabold tracking-wider shadow-lg">
                    CB
                </div>
                <div>
                    <div class="text-lg font-extrabold tracking-wide text-gray-900 dark:text-white">CULTURE BENIN</div>
                    <div class="text-xs text-gray-600 dark:text-gray-300">Héritage • Arts • Gastronomie</div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex gap-8 items-center">
                <a href="#catalogue"
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-orange-500 dark:hover:text-orange-400 transition-colors uppercase tracking-wider">
                    Catalogue
                </a>
                <a href="#gastronomie"
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-orange-500 dark:hover:text-orange-400 transition-colors uppercase tracking-wider">
                    Gastronomie
                </a>
                <a href="#galerie"
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-orange-500 dark:hover:text-orange-400 transition-colors uppercase tracking-wider">
                    Galerie
                </a>
            </nav>

            <!-- Actions -->
            <div class="flex items-center gap-3">
                <a href="/login"
                    class="bg-orange-500 hover:bg-orange-600 transition-colors text-white font-semibold px-6 py-2 rounded-lg shadow-md">
                    Connexion
                </a>

                <button id="themeToggle" aria-label="Basculer thème"
                    class="p-2 rounded-lg border border-gray-300 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-400 transition-colors">
                    <svg id="iconMoon" class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-16">
        <!-- Hero Section - CONTENU CENTRÉ -->
        <section
            class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-white dark:bg-gray-900">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('img/hero.webp') }}" alt="Patrimoine culturel béninois"
                    class="w-full h-full object-cover opacity-100 dark:opacity-40">
                <div class="absolute inset-0 bg-white/40 dark:bg-gray-900/60"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 w-full text-center">
                <div class="max-w-4xl mx-auto fade-up">
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-900 dark:text-white leading-tight">
                        Plongez au cœur de <span class="text-orange-500 dark:text-orange-400">l'héritage culturel</span>
                        béninois
                    </h1>
                    <p class="text-xl text-gray-700 dark:text-gray-300 mb-8 leading-relaxed max-w-3xl mx-auto">
                        Rythmes, arts, contes et gastronomie — une expérience immersive qui honore la diversité et la
                        mémoire du Bénin.
                        Découvrez la richesse d'une culture millénaire à travers des expériences narratives uniques.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center">
                        <a href="#catalogue"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-8 py-3 rounded-lg shadow-lg transition-all hover:shadow-xl">
                            Explorer le catalogue
                        </a>
                        <a href="#gastronomie"
                            class="border-2 border-gray-300 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-400 text-gray-700 dark:text-gray-300 font-bold px-8 py-3 rounded-lg transition-colors">
                            Découvrir la gastronomie
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CATALOGUE ENRICHI -->
        <section id="catalogue" class="section-padding bg-white dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12 fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Catalogue des richesses culturelles
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                        Naviguez à travers les différentes facettes de la culture béninoise.
                        Chaque onglet vous offre une immersion complète avec contexte historique,
                        significations culturelles et importance contemporaine.
                    </p>
                </div>

                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Onglets latéraux -->
                    <div class="lg:w-64">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-4 shadow-md sticky top-24">
                            <ul id="tabs" class="space-y-2">
                                <li>
                                    <button data-tab="arts"
                                        class="tab-btn w-full text-left px-4 py-3 rounded-lg font-medium bg-orange-500 text-white shadow-sm transition-all">
                                        Arts & Sculptures
                                    </button>
                                </li>
                                <li>
                                    <button data-tab="danses"
                                        class="tab-btn w-full text-left px-4 py-3 rounded-lg font-medium bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-sm transition-all">
                                        Danses & Musique
                                    </button>
                                </li>
                                <li>
                                    <button data-tab="spiritualite"
                                        class="tab-btn w-full text-left px-4 py-3 rounded-lg font-medium bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-sm transition-all">
                                        Spiritualité (Vodun)
                                    </button>
                                </li>
                                <li>
                                    <button data-tab="histoire"
                                        class="tab-btn w-full text-left px-4 py-3 rounded-lg font-medium bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 shadow-sm transition-all">
                                        Royaumes & Histoire
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contenu des onglets -->
                    <div class="flex-1">
                        <div id="tabContents">
                            <!-- ARTS & SCULPTURES -->
                            <article data-content="arts" class="tab-content fade-up">
                                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 shadow-xl">
                                    <div class="mb-8">
                                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4">
                                            Arts & Sculptures : L'expression matérielle de l'âme béninoise
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                            L'art béninois est une chronique visuelle de l'histoire, des croyances et
                                            des valeurs sociales.
                                            Chaque sculpture, chaque masque, chaque tissage raconte une histoire qui
                                            transcende les générations.
                                            Des bronzes royaux du Dahomey aux textiles complexes d'Abomey, l'artisanat
                                            béninois témoigne
                                            d'une maîtrise technique et d'une richesse symbolique exceptionnelles.
                                        </p>

                                        <div
                                            class="bg-orange-50 dark:bg-orange-900/20 border-l-4 border-orange-500 p-5 rounded-r-lg mb-8">
                                            <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">
                                                🎨 Pourquoi c'est important
                                            </h4>
                                            <p class="text-gray-700 dark:text-gray-300">
                                                Les arts traditionnels ne sont pas que décoratifs ; ils sont des outils
                                                pédagogiques,
                                                des supports rituels et des marqueurs d'identité. Ils préservent la
                                                mémoire collective
                                                et transmettent des savoirs ancestraux. Les techniques de fonte à la
                                                cire perdue,
                                                classées au patrimoine mondial de l'UNESCO, sont un exemple vivant de
                                                cette transmission.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Mini-timeline -->
                                    <div class="mb-10">
                                        <h4 class="font-bold text-xl text-gray-900 dark:text-white mb-6">📜 Chronologie
                                            historique</h4>
                                        <div class="space-y-6">
                                            <div class="flex items-start gap-4">
                                                <div class="flex-shrink-0 w-20 text-center">
                                                    <div
                                                        class="bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-300 font-bold py-1 px-3 rounded-full text-sm">
                                                        XIIe s.
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-gray-900 dark:text-white">Origines des
                                                        techniques de fonte</h5>
                                                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                                                        Développement des techniques de fonte à la cire perdue par les
                                                        royaumes d'Ife et du Bénin
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-4">
                                                <div class="flex-shrink-0 w-20 text-center">
                                                    <div
                                                        class="bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-300 font-bold py-1 px-3 rounded-full text-sm">
                                                        XVIIe s.
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-gray-900 dark:text-white">Apogée des
                                                        ateliers royaux</h5>
                                                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                                                        Sous le règne du roi Ewuare, les ateliers royaux produisent des
                                                        œuvres d'une complexité inégalée
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-4">
                                                <div class="flex-shrink-0 w-20 text-center">
                                                    <div
                                                        class="bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-300 font-bold py-1 px-3 rounded-full text-sm">
                                                        Aujourd'hui
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-gray-900 dark:text-white">Renaissance
                                                        artistique</h5>
                                                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                                                        Nouvelle génération d'artistes mêlant techniques ancestrales et
                                                        expressions contemporaines
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Galerie d'images -->
                                    <div>
                                        <h4 class="font-bold text-xl text-gray-900 dark:text-white mb-6">🖼️ Galerie
                                            représentative</h4>
                                        <div class="grid md:grid-cols-3 gap-6">
                                            <div
                                                class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                                <img src="{{ asset('img/art-vaudou.jpeg') }}"
                                                    alt="Masques cérémoniels"
                                                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                    <button
                                                        class="story-btn w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg transition-colors"
                                                        data-story="masques">
                                                        Découvrir l'histoire
                                                    </button>
                                                </div>
                                                <div
                                                    class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                    <div class="font-semibold text-white">Masques cérémoniels</div>
                                                    <div class="text-xs text-gray-200">Symboles rituels et techniques
                                                        ancestrales</div>
                                                </div>
                                            </div>

                                            <div
                                                class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                                <img src="{{ asset('img/sculpture_benin.webp') }}"
                                                    alt="Bronzes du Bénin"
                                                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                    <button
                                                        class="story-btn w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg transition-colors"
                                                        data-story="bronzes">
                                                        Découvrir l'histoire
                                                    </button>
                                                </div>
                                                <div
                                                    class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                    <div class="font-semibold text-white">Bronzes du Bénin</div>
                                                    <div class="text-xs text-gray-200">Patrimoine mondial UNESCO</div>
                                                </div>
                                            </div>

                                            <div
                                                class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                                <img src="{{ asset('img/tissage.webp') }}"
                                                    alt="Textiles traditionnels"
                                                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                    <button
                                                        class="story-btn w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg transition-colors"
                                                        data-story="textiles">
                                                        Découvrir l'histoire
                                                    </button>
                                                </div>
                                                <div
                                                    class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                    <div class="font-semibold text-white">Tissages & textiles</div>
                                                    <div class="text-xs text-gray-200">Motifs, couleurs et techniques
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- DANSES & MUSIQUE -->
                            <article data-content="danses" class="tab-content hidden">
                                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 shadow-xl">
                                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4">
                                        Danses & Musique : Le rythme de l'âme béninoise
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                        La musique et la danse sont le cœur battant de la culture béninoise. Elles
                                        rythment les cérémonies,
                                        accompagnent les travaux quotidiens et célèbrent les moments importants de la
                                        vie. Du Tchinkoumé sacré
                                        aux rythmes populaires, chaque expression chorégraphique et musicale raconte une
                                        histoire.
                                    </p>

                                    <div
                                        class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-5 rounded-r-lg mb-8">
                                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">
                                            🎵 Pourquoi c'est important
                                        </h4>
                                        <p class="text-gray-700 dark:text-gray-300">
                                            La musique et la danse sont des langages universels qui transcendent les
                                            barrières linguistiques.
                                            Elles préservent l'histoire orale, transmettent les valeurs sociales et
                                            maintiennent la cohésion
                                            communautaire. Les rythmes traditionnels sont une véritable encyclopédie
                                            vivante.
                                        </p>
                                    </div>

                                    <div class="grid md:grid-cols-3 gap-6">
                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/danse_traditionnelle.webp') }}"
                                                alt="Danse Tchinkoumé"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="tchinkoume">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Tchinkoumé</div>
                                                <div class="text-xs text-gray-200">Danse sacrée des initiés</div>
                                            </div>
                                        </div>

                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/tambour.webp') }}" alt="Tambours traditionnels"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="tambours">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Tambours traditionnels</div>
                                                <div class="text-xs text-gray-200">Technique et transmission</div>
                                            </div>
                                        </div>

                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/costume_danse.webp') }}" alt="Costumes de danse"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="costumes">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Costumes traditionnels</div>
                                                <div class="text-xs text-gray-200">Tissus, couleurs et symboles</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- SPIRITUALITÉ (VODUN) -->
                            <article data-content="spiritualite" class="tab-content hidden">
                                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 shadow-xl">
                                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4">
                                        Spiritualité Vodun : La connexion entre visible et invisible
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                        Le Vodun est bien plus qu'une religion ; c'est un système complet de pensée, une
                                        philosophie de vie
                                        et une compréhension du monde. Originaire du Bénin, il a influencé des cultures
                                        à travers le monde,
                                        notamment dans les Amériques via la traite transatlantique.
                                    </p>

                                    <div
                                        class="bg-purple-50 dark:bg-purple-900/20 border-l-4 border-purple-500 p-5 rounded-r-lg mb-8">
                                        <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">
                                            🙏 Pourquoi c'est important
                                        </h4>
                                        <p class="text-gray-700 dark:text-gray-300">
                                            Le Vodun structure la cosmogonie béninoise, influence l'art, la médecine
                                            traditionnelle et
                                            l'organisation sociale. Il représente un patrimoine immatériel essentiel
                                            pour comprendre
                                            l'identité culturelle béninoise au-delà des clichés.
                                        </p>
                                    </div>

                                    <div class="grid md:grid-cols-3 gap-6">
                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/rituel.webp') }}" alt="Rituels Vodun"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-purple-500 hover:bg-purple-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="rituels">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Rituels</div>
                                                <div class="text-xs text-gray-200">Significations et contextes</div>
                                            </div>
                                        </div>

                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/objet_rituel.webp') }}" alt="Objets sacrés"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-purple-500 hover:bg-purple-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="objets">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Objets sacrés</div>
                                                <div class="text-xs text-gray-200">Masques, statues, amulettes</div>
                                            </div>
                                        </div>

                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/celebration.webp') }}" alt="Célébrations"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-purple-500 hover:bg-purple-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="celebrations">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Célébrations</div>
                                                <div class="text-xs text-gray-200">Fêtes locales et rites</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- ROYAUMES & HISTOIRE -->
                            <article data-content="histoire" class="tab-content hidden">
                                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 shadow-xl">
                                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4">
                                        Royaumes & Histoire : La mémoire collective du Bénin
                                    </h3>

                                    <div class="mb-8">
                                        <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                            Le Bénin contemporain est le fruit d'une riche histoire marquée par des
                                            royaumes puissants,
                                            des échanges culturels complexes et une résilience remarquable. Du royaume
                                            du Dahomey
                                            aux villes-États Yoruba, chaque période a façonné l'identité culturelle
                                            actuelle.
                                        </p>

                                        <div
                                            class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-5 rounded-r-lg mb-8">
                                            <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">
                                                📚 Contexte historique essentiel
                                            </h4>
                                            <p class="text-gray-700 dark:text-gray-300">
                                                Comprendre l'histoire béninoise, c'est saisir les fondements de sa
                                                diversité culturelle.
                                                Les interactions entre les différents royaumes, l'influence des routes
                                                commerciales
                                                transsahariennes et la période coloniale ont créé un tissu culturel
                                                unique en Afrique.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Galerie historique -->
                                    <div class="grid md:grid-cols-3 gap-6">
                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/dahomey.webp') }}" alt="Royaume du Dahomey"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="dahomey">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Royaume du Dahomey</div>
                                                <div class="text-xs text-gray-200">1600-1904 • Puissance régionale
                                                </div>
                                            </div>
                                        </div>

                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/carte_ancienne.webp') }}"
                                                alt="Routes commerciales"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="routes">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Routes commerciales</div>
                                                <div class="text-xs text-gray-200">Échanges transsahariens</div>
                                            </div>
                                        </div>

                                        <div class="group relative overflow-hidden rounded-xl shadow-lg card-hover">
                                            <img src="{{ asset('img/archives.webp') }}" alt="Archives historiques"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                                <button
                                                    class="story-btn w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors"
                                                    data-story="archives">
                                                    Découvrir l'histoire
                                                </button>
                                            </div>
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-white">Archives historiques</div>
                                                <div class="text-xs text-gray-200">Documents et récits</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SLIDER DE CARTES -->
        <section id="slider" class="py-16 bg-gray-50 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex items-center justify-between mb-8 fade-up">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Instantanés culturels</h2>
                        <p class="text-gray-600 dark:text-gray-300">Glissez pour découvrir des scènes de la vie
                            culturelle béninoise</p>
                    </div>
                    <div class="flex gap-2">
                        <button id="prevBtn"
                            class="p-3 rounded-full bg-white dark:bg-gray-700 hover:bg-orange-500 hover:text-white transition-colors shadow-md">
                            ‹
                        </button>
                        <button id="nextBtn"
                            class="p-3 rounded-full bg-white dark:bg-gray-700 hover:bg-orange-500 hover:text-white transition-colors shadow-md">
                            ›
                        </button>
                    </div>
                </div>

                <div id="carousel" class="carousel flex gap-6 overflow-x-auto snap-x snap-mandatory p-2 pb-6">
                    <div class="min-w-[280px] md:min-w-[320px] snap-start">
                        <div class="card-hover bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl h-full">
                            <img src="{{ asset('img/gal1.jpg') }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="font-bold text-lg text-orange-500 dark:text-orange-400">Festival local
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Célébrations et costumes
                                    traditionnels dans une ambiance festive.</p>
                            </div>
                        </div>
                    </div>

                    <div class="min-w-[280px] md:min-w-[320px] snap-start">
                        <div class="card-hover bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl h-full">
                            <img src="{{ asset('img/gal2.webp') }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="font-bold text-lg text-orange-500 dark:text-orange-400">Atelier d'art</div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Sculpture et apprentissage
                                    intergénérationnel.</p>
                            </div>
                        </div>
                    </div>

                    <div class="min-w-[280px] md:min-w-[320px] snap-start">
                        <div class="card-hover bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl h-full">
                            <img src="{{ asset('img/tambour.webp') }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="font-bold text-lg text-orange-500 dark:text-orange-400">Tambours
                                    traditionnels</div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Rythmes et transmissions
                                    ancestrales.</p>
                            </div>
                        </div>
                    </div>

                    <div class="min-w-[280px] md:min-w-[320px] snap-start">
                        <div class="card-hover bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl h-full">
                            <img src="{{ asset('img/Cuisine_de_rue.webp') }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="font-bold text-lg text-orange-500 dark:text-orange-400">Cuisine de rue
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Saveurs locales et marché
                                    animé.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- GASTRONOMIE -->
        <section id="gastronomie" class="py-20 bg-white dark:bg-gray-900">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-orange-500 dark:text-orange-400 mb-6">
                        Gastronomie béninoise</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">Trois plats emblématiques
                        présentés avec images, description et ingrédients clés.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('img/amiwo.webp') }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl text-center font-bold text-orange-500  dark:text-orange-400">Amiwo</h3>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">Plat rouge parfumé, populaire lors des
                                cérémonies.</p>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 mt-3 space-y-1">
                                <li>• Maïs moulu</li>
                                <li>• Sauce tomate épicée</li>
                                <li>• Poisson fumé / viande</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('img/akassa.webp') }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-center text-orange-500  dark:text-orange-400">Akassa</h3>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">Pâte fermentée, souvent accompagnée de
                                soupes riches.</p>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 mt-3 space-y-1">
                                <li>• Maïs fermenté</li>
                                <li>• Soupe de poisson ou légumes</li>
                                <li>• Accompagnement local</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('img/wassa_wassa.webp') }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-center text-orange-500 dark:text-orange-400 ">Wassa-Wassa
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">Plat traditionnel souvent servi lors
                                d'occasions.</p>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 mt-3 space-y-1">
                                <li>• Ingrédients locaux</li>
                                <li>• Sauce épicée</li>
                                <li>• Accompagnement varié</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- GALERIE -->
        <section id="galerie" class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 text-center">Galerie photographique
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <img src="{{ asset('img/gal1.jpg') }}"
                        class="w-full h-44 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300 cursor-pointer">
                    <img src="{{ asset('img/gal2.webp') }}"
                        class="w-full h-44 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300 cursor-pointer">
                    <img src="{{ asset('img/gal3.jpg') }}"
                        class="w-full h-44 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300 cursor-pointer">
                    <img src="{{ asset('img/gal4.jpg') }}"
                        class="w-full h-44 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300 cursor-pointer">
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="py-8 border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center">
                    <p class="text-orange-500 dark:text-orange-400 font-bold text-lg">
                        © {{ date('Y') }} CULTURE BENIN — Héritage. Identité. Fierté.
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Développé par Elfrieda AVALIGBE
                    </p>
                </div>
            </div>
        </footer>
    </main>

    <!-- Modal pour les histoires -->
    <div id="storyModal" class="modal-overlay" onclick="closeModal()">
        <div class="modal-content" onclick="event.stopPropagation()">
            <div class="p-8">
                <button onclick="closeModal()"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div id="modalContent">
                    <!-- Contenu chargé dynamiquement -->
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Initialisation au chargement
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser le thème en premier
            initTheme();

            // Initialiser les onglets
            initTabs();

            // Initialiser la navigation
            initNavigation();

            // Initialiser le carousel
            initCarousel();

            // Initialiser les animations au scroll
            initScrollAnimations();

            // Initialiser les modales
            initModals();
        });

        // Gestion du thème sombre/clair - CORRIGÉ
        function initTheme() {
            const themeToggle = document.getElementById('themeToggle');
            const iconMoon = document.getElementById('iconMoon');

            if (!themeToggle) return;

            // Vérifier la préférence stockée
            const storedTheme = localStorage.getItem('theme');

            // Vérifier la préférence système
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            // Appliquer le thème initial
            if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
                updateThemeIcon(true);
            } else {
                document.documentElement.classList.remove('dark');
                updateThemeIcon(false);
            }

            // Gérer le clic sur le bouton
            themeToggle.addEventListener('click', () => {
                const isDark = document.documentElement.classList.contains('dark');

                if (isDark) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    updateThemeIcon(false);
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    updateThemeIcon(true);
                }
            });

            // Écouter les changements de préférence système
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                // Seulement si l'utilisateur n'a pas explicitement choisi un thème
                if (!localStorage.getItem('theme')) {
                    if (e.matches) {
                        document.documentElement.classList.add('dark');
                        updateThemeIcon(true);
                    } else {
                        document.documentElement.classList.remove('dark');
                        updateThemeIcon(false);
                    }
                }
            });

            function updateThemeIcon(isDark) {
                if (!iconMoon) return;

                if (isDark) {
                    // Icône soleil pour le mode clair
                    iconMoon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                              d="M12 3v1m0 16v1m8.66-10.66l-.71.71M3.05 4.05l.71.71M21 12h-1M4 12H3m15.66 4.66l-.71-.71M6.76 6.76l-.71-.71"/>
                    `;
                } else {
                    // Icône lune pour le mode sombre
                    iconMoon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                              d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    `;
                }
            }
        }

        // Gestion des onglets
        function initTabs() {
            const tabs = document.querySelectorAll('.tab-btn');
            const contents = document.querySelectorAll('.tab-content');

            function activateTab(tabName) {
                // Masquer tous les contenus
                contents.forEach(content => {
                    content.classList.add('hidden');
                    if (content.dataset.content === tabName) {
                        content.classList.remove('hidden');
                    }
                });

                // Mettre à jour les boutons
                tabs.forEach(tab => {
                    if (tab.dataset.tab === tabName) {
                        tab.classList.remove('bg-white', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
                        tab.classList.add('bg-orange-500', 'text-white');
                    } else {
                        tab.classList.remove('bg-orange-500', 'text-white');
                        tab.classList.add('bg-white', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
                    }
                });
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    activateTab(tab.dataset.tab);
                });
            });

            // Activer le premier onglet par défaut
            if (tabs.length > 0) {
                activateTab(tabs[0].dataset.tab);
            }
        }

        // Gestion de la navigation
        function initNavigation() {
            // Sélectionner tous les liens de navigation
            const navLinks = document.querySelectorAll('nav a[href^="#"]');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        // Scroll doux vers la cible
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Gestion spéciale des liens dans le héros
            document.querySelectorAll('a[href^="#"]').forEach(link => {
                if (!link.closest('nav')) {
                    link.addEventListener('click', function(e) {
                        const targetId = this.getAttribute('href');
                        if (targetId.startsWith('#')) {
                            e.preventDefault();
                            const targetElement = document.querySelector(targetId);
                            if (targetElement) {
                                targetElement.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'start'
                                });
                            }
                        }
                    });
                }
            });
        }

        // Carousel
        function initCarousel() {
            const carousel = document.getElementById('carousel');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            if (!carousel) return;

            const scrollAmount = carousel.clientWidth * 0.8;

            nextBtn?.addEventListener('click', () => {
                carousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });

            prevBtn?.addEventListener('click', () => {
                carousel.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });

            // Autoplay
            let autoplay = setInterval(() => {
                carousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }, 4000);

            carousel.addEventListener('mouseenter', () => clearInterval(autoplay));
            carousel.addEventListener('mouseleave', () => {
                autoplay = setInterval(() => {
                    carousel.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                }, 4000);
            });
        }

        // Animations au scroll
        function initScrollAnimations() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer tous les éléments avec la classe fade-up
            document.querySelectorAll('.fade-up').forEach(el => {
                observer.observe(el);
            });
        }

        // Modales
        function initModals() {
            const stories = {
                masques: {
                    title: "Les Masques Cérémoniels",
                    content: `
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Les Masques Cérémoniels : Portails vers l'Invisible</h3>
                        <img src="{{ asset('img/art-vaudou.jpeg') }}" alt="Masques" class="w-full h-64 object-cover rounded-lg mb-6">
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="mb-4 text-gray-600 dark:text-gray-300">Les masques cérémoniels ne sont pas de simples objets décoratifs. Ils incarnent des entités spirituelles, des ancêtres ou des forces naturelles. Portés lors de cérémonies spécifiques, ils permettent aux initiés de communiquer avec le monde invisible.</p>
                            
                            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg mb-4">
                                <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">Symbolique</h4>
                                <p class="text-gray-700 dark:text-gray-300">Chaque couleur, chaque forme, chaque matériau a une signification précise. Le bois représente la connexion avec la terre, les couleurs vives évoquent la vitalité, et les motifs géométriques racontent des histoires ancestrales.</p>
                            </div>
                            
                            <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">Transmission</h4>
                            <p class="text-gray-600 dark:text-gray-300">La fabrication des masques est un savoir ancestral transmis de génération en génération. Seuls certains artisans initiés peuvent créer ces objets sacrés, suivant des règles strictes et des rituels précis.</p>
                        </div>
                    `
                },
                bronzes: {
                    title: "Les Bronzes du Bénin",
                    content: `
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Les Bronzes du Bénin : Un Héritage Millénaire</h3>
                        <img src="{{ asset('img/sculpture_benin.webp') }}" alt="Bronzes" class="w-full h-64 object-cover rounded-lg mb-6">
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="mb-4 text-gray-600 dark:text-gray-300">Les bronzes du Bénin sont reconnus comme patrimoine mondial de l'UNESCO. Créés avec la technique de la cire perdue, ces œuvres d'art racontent l'histoire des royaumes et des souverains.</p>
                            
                            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg mb-4">
                                <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">Technique de la cire perdue</h4>
                                <p class="text-gray-700 dark:text-gray-300">Une technique complexe qui nécessite une grande maîtrise. L'objet est d'abord modelé en cire, puis recouvert d'argile. Après cuisson, la cire fond et est remplacée par du bronze fondu.</p>
                            </div>
                        </div>
                    `
                },
                // Ajouter d'autres histoires ici...
            };

            document.querySelectorAll('.story-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const storyId = this.dataset.story;
                    if (stories[storyId]) {
                        openModal(stories[storyId]);
                    } else {
                        openModal({
                            title: "Histoire culturelle",
                            content: `<h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Histoire culturelle béninoise</h3><p class="text-gray-600 dark:text-gray-300">Découvrez la richesse de cette tradition...</p>`
                        });
                    }
                });
            });
        }

        function openModal(content) {
            const modal = document.getElementById('storyModal');
            const modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = content.content;
            modal.classList.add('open');
            document.querySelector('.modal-content').classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('storyModal');
            modal.classList.remove('open');
            document.querySelector('.modal-content').classList.remove('open');
            document.body.style.overflow = 'auto';
        }

        // Fermer la modale avec ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>

</html>
