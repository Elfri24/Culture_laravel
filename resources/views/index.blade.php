{{-- resources/views/culture.blade.php --}}
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>CULTURE BENIN — Refonte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* petites améliorations visuelles */
        .glass {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.04), rgba(0, 0, 0, 0.06));
            backdrop-filter: blur(6px);
        }

        /* slider cards */
        .carousel {
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .carousel::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-slate-400 text-gray-50 antialiased transition-colors duration-300">

    <!-- header -->
    <header class="fixed w-full z-40 bg-black/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Logo simple -->
                <div class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 rounded-lg bg-orange-300 flex items-center justify-center text-black font-extrabold tracking-wider">
                        CB
                    </div>
                    <div>
                        <div class="text-lg font-extrabold tracking-wide">CULTURE BENIN</div>
                        <div class="text-xs text-gray-300">Héritage • Arts • Gastronomie</div>
                    </div>
                </div>
            </div>

            <nav class="hidden md:flex gap-8 items-center text-sm uppercase tracking-wider">

                <a href="#catalogue" class="hover:bg-orange-400">Catalogue</a>
                <a href="#gastronomie" class="hover:bg-orange-400">Gastronomie</a>
                <a href="#galerie" class="hover:bg-orange-400">Galerie</a>

            </nav>

            <div class="flex items-center gap-3">
                <!-- dark mode toggle -->
                <a href="/login"
                    class="w-full bg-orange-400 hover:bg-orange-500 transition-colors text-white font-semibold py-3 rounded-lg shadow-lg inline-block text-center">
                    Connexion
                </a>

                <button id="themeToggle" aria-label="Basculer thème" class="p-2 rounded-md glass">
                    <svg id="iconMoon" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- MAIN -->
    <main class="pt-24">

        <!-- HERO -->
        <section id="hero" class="relative h-[72vh] md:h-screen flex items-center">
            <img src="{{ asset('img/hero.webp') }}" alt="Bénin"
                class="absolute inset-0 w-full h-full object-cover opacity-80">
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/60 to-black"></div>

            <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">Plongez au cœur de l’héritage
                    culturel béninois</h1>
                <p class="text-gray-300 max-w-2xl mx-auto">Rythmes, arts, contes et gastronomie — une expérience
                    immersive qui honore la diversité et la mémoire du Bénin.</p>
                <div class="mt-8 flex justify-center gap-4">
                    <a href="#catalogue"
                        class="bg-orange-300 hover:bg-orange-400 text-black font-bold px-6 py-3 rounded-full shadow-lg">Explorer
                        le catalogue</a>
                    <a href="#gastronomie" class="border border-white/10 px-5 py-3 rounded-full">Découvrir la
                        gastronomie</a>
                </div>
            </div>
        </section>

        <!-- CATALOGUE (ONGLETS) -->
        <section id="catalogue" class="py-20">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-extrabold text-orange-300 mb-6">Catalogue des richesses</h2>
                <p class="text-gray-300 mb-8 max-w-3xl">Navigue par onglets pour explorer les catégories : arts, danses,
                    spiritualité et histoire.</p>

                <div class="flex flex-col md:flex-row gap-6">
                    <!-- tabs -->
                    <div class="md:w-64  bg-slate-400 rounded-xl p-4 glass">
                        <ul id="tabs" class="space-y-2">
                            <li><button data-tab="arts"
                                    class="tab-btn w-full text-left px-3 py-2 rounded-md font-medium">Arts &
                                    Sculptures</button></li>
                            <li><button data-tab="danses"
                                    class="tab-btn w-full text-left px-3 py-2 rounded-md font-medium">Danses &
                                    Musique</button></li>
                            <li><button data-tab="spiritualite"
                                    class="tab-btn w-full text-left px-3 py-2 rounded-md font-medium">Spiritualité
                                    (Vodun)</button></li>
                            <li><button data-tab="histoire"
                                    class="tab-btn w-full text-left px-3 py-2 rounded-md font-medium">Royaumes &
                                    Histoire</button></li>
                        </ul>
                    </div>

                    <!-- contenu onglets -->
                    <div class="flex-1 bg-white/3 rounded-xl p-6 glass">
                        <div id="tabContents">
                            <article data-content="arts" class="tab-content">
                                <h3 class="text-2xl font-bold mb-3">Arts & Sculptures</h3>
                                <p class="text-gray-300 mb-4">Masques, statues royales, travaux sur bois et bronze —
                                    héritage matériel transmis de génération en génération.</p>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/art-vaudou.jpeg') }}" class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-300">Masques cérémoniels</div>
                                            <div class="text-xs text-gray-300">Symboles rituels et techniques
                                                ancestrales.</div>
                                        </div>
                                    </div>
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/sculpture_benin.webp') }}"
                                            class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-300">Bronzes du Bénin</div>
                                            <div class="text-xs text-gray-300">Patrimoine mondial reconnu.</div>
                                        </div>
                                    </div>
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/tissage.webp') }}" class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-300">Tissages & textiles</div>
                                            <div class="text-xs text-gray-300">Motifs, couleurs et techniques.</div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article data-content="danses" class="tab-content hidden">
                                <h3 class="text-2xl font-bold mb-3">Danses & Musique</h3>
                                <p class="text-gray-300 mb-4">Rythmes, percussions, pas et costumes — héritage vivant et
                                    spectacle collectif.</p>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/danse_traditionnelle.webp') }}"
                                            class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-300">Tchinkoumé</div>
                                            <div class="text-xs text-gray-300">Rythmes sacrés et populaires.</div>
                                        </div>
                                    </div>
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/tambour.webp') }}" class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-400">Tambours traditionnels
                                            </div>
                                            <div class="text-xs text-gray-300">Technique et transmission.</div>
                                        </div>
                                    </div>
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/costume_danse.webp') }}"
                                            class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-400">Costumes</div>
                                            <div class="text-xs text-gray-300">Tissus, couleurs et symboles.</div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article data-content="spiritualite" class="tab-content hidden">
                                <h3 class="text-2xl font-bold mb-3">Spiritualité (Vodun)</h3>
                                <p class="text-gray-300 mb-4">Pratiques, cérémonies et objets sacrés — comprendre le
                                    vodun au-delà des clichés.</p>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/rituel.webp') }}" class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-400">Rituels</div>
                                            <div class="text-xs text-gray-300">Significations et contextes.</div>
                                        </div>
                                    </div>
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/objet_rituel.webp') }}"
                                            class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-400">Objets sacrés</div>
                                            <div class="text-xs text-gray-300">Masques, statues, amulettes.</div>
                                        </div>
                                    </div>
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/celebration.webp') }}"
                                            class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-400">Célébrations</div>
                                            <div class="text-xs text-gray-300">Fêtes locales et rites.</div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article data-content="histoire" class="tab-content hidden">
                                <h3 class="text-2xl font-bold mb-3">Royaumes & Histoire</h3>
                                <p class="text-gray-300 mb-4">Du royaume du Dahomey aux échanges commerciaux, une
                                    histoire complexe et riche.</p>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/dahomey.webp') }}" class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-400">Dahomey</div>
                                            <div class="text-xs text-gray-300">Chroniques et figures.</div>
                                        </div>
                                    </div>
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/carte_ancienne.webp') }}"
                                            class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-400">Cartes & échanges</div>
                                            <div class="text-xs text-gray-300">Routes, ports et influences.</div>
                                        </div>
                                    </div>
                                    <div class="rounded-xl overflow-hidden shadow-lg">
                                        <img src="{{ asset('img/archives.webp') }}" class="w-full h-40 object-cover">
                                        <div class="p-3 bg-gradient-to-t from-black/60 to-transparent">
                                            <div class="text-sm font-semibold text-orange-400">Archives</div>
                                            <div class="text-xs text-gray-300">Documents et récits.</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SLIDER DE CARTES (cards slider) -->
        <section id="slider" class="py-16 bg-gradient-to-b  bg-black/50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-3xl font-bold text-orange-400">Instantanés culturels</h2>
                    <div class="flex gap-2 items-center">
                        <button id="prevBtn" class="p-2 rounded-md glass">‹</button>
                        <button id="nextBtn" class="p-2 rounded-md glass">›</button>
                    </div>
                </div>

                <div id="carousel" class="carousel flex gap-6 overflow-x-auto snap-x snap-mandatory p-2">
                    <!-- card -->
                    <div
                        class="min-w-[280px] md:min-w-[320px] snap-start bg-white/5 rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('img/gal1.jpg') }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="font-bold text-lg text-orange-400">Festival local</div>
                            <p class="text-sm text-gray-300 mt-2">Célébrations et costumes traditionnels.</p>
                        </div>
                    </div>

                    <div
                        class="min-w-[280px] md:min-w-[320px] snap-start bg-white/5 rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('img/gal2.webp') }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="font-bold text-lg text-orange-400">Atelier d’art</div>
                            <p class="text-sm text-gray-300 mt-2">Sculpture et apprentissage intergénérationnel.</p>
                        </div>
                    </div>

                    <div
                        class="min-w-[280px] md:min-w-[320px] snap-start bg-white/5 rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('img/tambour.webp') }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="font-bold text-lg text-orange-400">Tambours</div>
                            <p class="text-sm text-gray-300 mt-2">Rythmes et transmissions.</p>
                        </div>
                    </div>

                    <div
                        class="min-w-[280px] md:min-w-[320px] snap-start bg-white/5 rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('img/Cuisine_de_rue.webp') }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="font-bold text-lg text-orange-400">Cuisine de rue</div>
                            <p class="text-sm text-gray-300 mt-2">Saveurs locales et marché.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- GASTRONOMIE (3 cards) -->
        <section id="gastronomie" class="py-20">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-orange-400 mb-6">Gastronomie béninoise</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Trois plats emblématiques présentés avec images,
                    description et ingrédients clés.</p>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white/5 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('img/amiwo.webp') }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-orange-400">Amiwo</h3>
                            <p class="text-gray-300 mt-2">Plat rouge parfumé, populaire lors des cérémonies.</p>
                            <ul class="text-sm text-gray-300 mt-3 space-y-1">
                                <li>• Maïs moulu</li>
                                <li>• Sauce tomate épicée</li>
                                <li>• Poisson fumé / viande</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white/5 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('img/akassa.webp') }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-orange-400">Akassa</h3>
                            <p class="text-gray-300 mt-2">Pâte fermentée, souvent accompagnée de soupes riches.</p>
                            <ul class="text-sm text-gray-300 mt-3 space-y-1">
                                <li>• Maïs fermenté</li>
                                <li>• Soupe de poisson ou légumes</li>
                                <li>• Accompagnement local</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white/5 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('img/wassa_wassa.webp') }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-orange-400">Wassa-Wassa</h3>
                            <p class="text-gray-300 mt-2">Plat traditionnel souvent servi lors d’occasions.</p>
                            <ul class="text-sm text-gray-300 mt-3 space-y-1">
                                <li>• Ingrédients locaux</li>
                                <li>• Sauce épicée</li>
                                <li>• Accompagnement varié</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- GALERIE simple -->
        <section id="galerie" class="py-12 bg-gradient-to-t  bg-black/50">
            <div class="max-w-7xl mx-auto px-6">
                <h3 class="text-2xl font-bold text-orange-400 mb-6">Galerie</h3>
                <div class="grid md:grid-cols-4 gap-4">
                    <img src="{{ asset('img/gal1.jpg') }}" class="w-full h-44 object-cover rounded-lg shadow-md">
                    <img src="{{ asset('img/gal2.webp') }}" class="w-full h-44 object-cover rounded-lg shadow-md">
                    <img src="{{ asset('img/gal3.jpg') }}" class="w-full h-44 object-cover rounded-lg shadow-md">
                    <img src="{{ asset('img/gal4.jpg') }}" class="w-full h-44 object-cover rounded-lg shadow-md">
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="py-8 text-center text-bold text-orange-400">
            © {{ date('Y') }} CULTURE BENIN — Héritage. Identité. Fierté. Développé par Elfrieda AVALIGBE
        </footer>
    </main>

    <!-- Scripts: tabs, carousel, dark mode -->
    <script>
        /* Tabs */
        (function() {
            const tabs = document.querySelectorAll('.tab-btn');
            const contents = document.querySelectorAll('.tab-content');

            function activate(tabName) {
                contents.forEach(c => c.dataset.content === tabName ? c.classList.remove('hidden') : c.classList.add(
                    'hidden'));
                tabs.forEach(t => t.dataset.tab === tabName ? t.classList.add('bg-orange-400/10', 'text-orange-400') : t
                    .classList.remove('bg-orange-400/10', 'text-orange-400'));
            }

            tabs.forEach(t => t.addEventListener('click', () => activate(t.dataset.tab)));
            // default
            activate(tabs[0]?.dataset.tab || 'arts');
        })();

        /* Carousel (slider of cards) */
        (function() {
            const carousel = document.getElementById('carousel');
            const prev = document.getElementById('prevBtn');
            const next = document.getElementById('nextBtn');

            if (!carousel) return;

            const step = () => {
                const width = carousel.clientWidth;
                carousel.scrollBy({
                    left: width * 0.6,
                    behavior: 'smooth'
                });
            };

            next.addEventListener('click', () => carousel.scrollBy({
                left: carousel.clientWidth * 0.6,
                behavior: 'smooth'
            }));
            prev.addEventListener('click', () => carousel.scrollBy({
                left: -carousel.clientWidth * 0.6,
                behavior: 'smooth'
            }));

            // autoplay
            let autoplay = setInterval(step, 3500);
            carousel.addEventListener('mouseenter', () => clearInterval(autoplay));
            carousel.addEventListener('mouseleave', () => autoplay = setInterval(step, 3500));
        })();

        /* Dark mode toggle (manual + persist) */
        (function() {
            const html = document.documentElement;
            const toggle = document.getElementById('themeToggle');
            const iconMoon = document.getElementById('iconMoon');

            function setDark(isDark) {
                if (isDark) {
                    html.classList.add('dark');
                    document.body.classList.add('bg-black');
                    localStorage.setItem('cb-theme', 'dark');
                    iconMoon.innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m8.66-10.66l-.71.71M3.05 4.05l.71.71M21 12h-1M4 12H3m15.66 4.66l-.71-.71M6.76 6.76l-.71-.71"/>';
                } else {
                    html.classList.remove('dark');
                    document.body.classList.remove('bg-black');
                    localStorage.setItem('cb-theme', 'light');
                    iconMoon.innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>';
                }
            }

            // init from localStorage or default to light
            const stored = localStorage.getItem('cb-theme');
            setDark(stored === 'dark');

            toggle.addEventListener('click', () => setDark(!document.documentElement.classList.contains('dark')));
        })();
    </script>
</body>

</html>
