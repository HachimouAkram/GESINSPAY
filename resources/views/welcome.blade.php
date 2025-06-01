<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Découvrez nos services professionnels et formations de qualité pour répondre à tous vos besoins">

        <title>APRO Consulting - Solutions professionnelles</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                /* [Previous CSS content remains the same] */
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen">
        <!-- Header/Navigation -->
        <header class="w-full lg:max-w-7xl mx-auto px-6 py-4 lg:px-8 lg:py-6">
            <div class="flex items-center justify-between">
                <div class="text-xl font-semibold dark:text-[#EDEDEC]">APRO Consulting</div>

                @if (Route::has('login'))
                    <nav class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                                Connexion
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                    Inscription
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            <!-- Hero Section -->
            <section class="bg-white dark:bg-[#161615] py-12 lg:py-20">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <div class="text-center">
                        <h1 class="text-4xl lg:text-5xl font-bold mb-6 dark:text-[#EDEDEC]">Solutions professionnelles sur mesure</h1>
                        <p class="text-xl text-[#706f6c] dark:text-[#A1A09A] max-w-3xl mx-auto">
                            Nous accompagnons les entreprises dans leur transformation digitale avec des solutions innovantes et des formations adaptées.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Services Section -->
            <section class="py-12 lg:py-20 bg-[#FDFDFC] dark:bg-[#0a0a0a]">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <h2 class="text-3xl font-bold mb-12 text-center dark:text-[#EDEDEC]">Nos Services</h2>

                    <div class="grid md:grid-cols-3 gap-8">
                        <!-- Service 1 -->
                        <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-sm">
                            <h3 class="text-xl font-semibold mb-3 dark:text-[#EDEDEC]">Consulting Digital</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                                Audit complet de votre infrastructure digitale et recommandations stratégiques pour optimiser vos processus.
                            </p>
                        </div>

                        <!-- Service 2 -->
                        <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-sm">
                            <h3 class="text-xl font-semibold mb-3 dark:text-[#EDEDEC]">Développement Web</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                                Création de sites web et applications sur mesure avec les dernières technologies du marché.
                            </p>
                        </div>

                        <!-- Service 3 -->
                        <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-sm">
                            <h3 class="text-xl font-semibold mb-3 dark:text-[#EDEDEC]">Formations</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                                Programmes de formation adaptés à vos besoins pour monter en compétences sur les outils digitaux.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section class="py-12 lg:py-20 bg-white dark:bg-[#161615]">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <div class="flex flex-col lg:flex-row gap-12 items-center">
                        <div class="lg:w-1/2">
                            <h2 class="text-3xl font-bold mb-6 dark:text-[#EDEDEC]">Notre Histoire</h2>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4">
                                Fondée en 2010, APRO Consulting s'est rapidement imposée comme un acteur clé dans le domaine du conseil digital.
                                Notre équipe d'experts accompagne les entreprises dans leur transformation numérique.
                            </p>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                                Avec plus de 200 projets réalisés et 50 clients satisfaits, nous avons développé une expertise reconnue dans
                                divers secteurs d'activité.
                            </p>
                        </div>
                        <div class="lg:w-1/2">
                            <div class="bg-[#fff2f2] dark:bg-[#1D0002] aspect-video rounded-lg overflow-hidden relative">
                                <!-- Placeholder for image/video -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-lg dark:text-[#EDEDEC]">Image/Video de présentation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Training Section -->
            <section class="py-12 lg:py-20 bg-[#FDFDFC] dark:bg-[#0a0a0a]">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <h2 class="text-3xl font-bold mb-12 text-center dark:text-[#EDEDEC]">Nos Formations</h2>

                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Formation 1 -->
                        <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-2 dark:text-[#EDEDEC]">Laravel Avancé</h3>
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-3">3 jours - 2100€</p>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">
                                Maîtrisez les concepts avancés de Laravel pour développer des applications robustes.
                            </p>
                        </div>

                        <!-- Formation 2 -->
                        <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-2 dark:text-[#EDEDEC]">Vue.js</h3>
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-3">2 jours - 1500€</p>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">
                                Créez des interfaces utilisateur réactives avec le framework Vue.js.
                            </p>
                        </div>

                        <!-- Formation 3 -->
                        <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-2 dark:text-[#EDEDEC]">DevOps</h3>
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-3">4 jours - 2800€</p>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">
                                Automatisez vos déploiements et optimisez votre workflow de développement.
                            </p>
                        </div>

                        <!-- Formation 4 -->
                        <div class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-2 dark:text-[#EDEDEC]">UI/UX Design</h3>
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-3">3 jours - 2200€</p>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">
                                Concevez des interfaces utilisateur intuitives et esthétiques.
                            </p>
                        </div>
                    </div>

                    <div class="text-center mt-12">
                        <a href="#" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-8 py-3 bg-[#1b1b18] rounded-sm border border-black text-white">
                            Voir toutes nos formations
                        </a>
                    </div>
                </div>
            </section>

            <!-- Testimonials -->
            <section class="py-12 lg:py-20 bg-white dark:bg-[#161615]">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <h2 class="text-3xl font-bold mb-12 text-center dark:text-[#EDEDEC]">Ils nous font confiance</h2>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Témoignage 1 -->
                        <div class="bg-[#FDFDFC] dark:bg-[#0a0a0a] p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] mr-4"></div>
                                <div>
                                    <h4 class="font-medium dark:text-[#EDEDEC]">Marie Dupont</h4>
                                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Directrice Technique, TechCorp</p>
                                </div>
                            </div>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                                "APRO Consulting a complètement transformé notre infrastructure digitale. Leur expertise et leur professionnalisme ont dépassé nos attentes."
                            </p>
                        </div>

                        <!-- Témoignage 2 -->
                        <div class="bg-[#FDFDFC] dark:bg-[#0a0a0a] p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] mr-4"></div>
                                <div>
                                    <h4 class="font-medium dark:text-[#EDEDEC]">Jean Martin</h4>
                                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">CEO, StartupXYZ</p>
                                </div>
                            </div>
                            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                                "Les formations de APRO Consulting ont permis à toute notre équipe de monter en compétences rapidement. Un partenaire de confiance !"
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section class="py-12 lg:py-20 bg-[#FDFDFC] dark:bg-[#0a0a0a]">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <div class="bg-white dark:bg-[#161615] p-8 lg:p-12 rounded-lg shadow-sm">
                        <div class="flex flex-col lg:flex-row gap-12">
                            <div class="lg:w-1/2">
                                <h2 class="text-3xl font-bold mb-6 dark:text-[#EDEDEC]">Contactez-nous</h2>
                                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-8">
                                    Vous avez un projet ou souhaitez en savoir plus sur nos services ? Notre équipe est à votre écoute pour répondre à toutes vos questions.
                                </p>

                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mr-4 text-[#706f6c] dark:text-[#A1A09A]">
                                            📍
                                        </div>
                                        <div>
                                            <h4 class="font-medium dark:text-[#EDEDEC]">Adresse</h4>
                                            <p class="text-[#706f6c] dark:text-[#A1A09A]">123 Rue de la Technologie, 75000 Paris</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mr-4 text-[#706f6c] dark:text-[#A1A09A]">
                                            📞
                                        </div>
                                        <div>
                                            <h4 class="font-medium dark:text-[#EDEDEC]">Téléphone</h4>
                                            <p class="text-[#706f6c] dark:text-[#A1A09A]">+33 1 23 45 67 89</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mr-4 text-[#706f6c] dark:text-[#A1A09A]">
                                            ✉️
                                        </div>
                                        <div>
                                            <h4 class="font-medium dark:text-[#EDEDEC]">Email</h4>
                                            <p class="text-[#706f6c] dark:text-[#A1A09A]">contact@apro-consulting.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:w-1/2">
                                <form class="space-y-4">
                                    <div>
                                        <label for="name" class="block text-sm font-medium dark:text-[#EDEDEC] mb-1">Nom</label>
                                        <input type="text" id="name" class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615]">
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium dark:text-[#EDEDEC] mb-1">Email</label>
                                        <input type="email" id="email" class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615]">
                                    </div>

                                    <div>
                                        <label for="message" class="block text-sm font-medium dark:text-[#EDEDEC] mb-1">Message</label>
                                        <textarea id="message" rows="4" class="w-full px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-sm bg-white dark:bg-[#161615]"></textarea>
                                    </div>

                                    <button type="submit" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-8 py-3 bg-[#1b1b18] rounded-sm border border-black text-white">
                                        Envoyer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-[#1b1b18] dark:bg-[#161615] text-white py-12">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">APRO Consulting</h3>
                        <p class="text-[#A1A09A]">
                            Votre partenaire pour la transformation digitale et l'excellence technologique.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Services</h3>
                        <ul class="space-y-2 text-[#A1A09A]">
                            <li><a href="#" class="hover:text-white">Consulting</a></li>
                            <li><a href="#" class="hover:text-white">Développement</a></li>
                            <li><a href="#" class="hover:text-white">Formations</a></li>
                            <li><a href="#" class="hover:text-white">Maintenance</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Liens utiles</h3>
                        <ul class="space-y-2 text-[#A1A09A]">
                            <li><a href="#" class="hover:text-white">Blog</a></li>
                            <li><a href="#" class="hover:text-white">Carrières</a></li>
                            <li><a href="#" class="hover:text-white">Mentions légales</a></li>
                            <li><a href="#" class="hover:text-white">Politique de confidentialité</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Réseaux sociaux</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-[#A1A09A] hover:text-white">Twitter</a>
                            <a href="#" class="text-[#A1A09A] hover:text-white">LinkedIn</a>
                            <a href="#" class="text-[#A1A09A] hover:text-white">Facebook</a>
                        </div>
                    </div>
                </div>

                <div class="border-t border-[#3E3E3A] mt-12 pt-8 text-center text-[#A1A09A]">
                    <p>© 2023 APRO Consulting. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
