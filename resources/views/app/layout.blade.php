<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-500 dark:text-cyan-300 leading-tight">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Barre de navigation à gauche -->
        <div class="w-1/4 bg-gray-800 p-4 text-white">
            <ul class="space-y-4">
                <li>
                    <a href="#dashboard" class="block px-4 py-2 hover:bg-cyan-500" onclick="showSection('dashboard')">Tableau de Bord</a>
                </li>
                <li>
                    <a href="#notifications" class="block px-4 py-2 hover:bg-cyan-500" onclick="showSection('notifications')">Notifications</a>
                </li>
                <li>
                    <a href="#echeances" class="block px-4 py-2 hover:bg-cyan-500" onclick="showSection('echeances')">Échéances</a>
                </li>
                <li>
                    <a href="#inscription" class="block px-4 py-2 hover:bg-cyan-500" onclick="showSection('inscription')">Faire une Inscription</a>
                </li>
                <li>
                    <a href="#recu" class="block px-4 py-2 hover:bg-cyan-500" onclick="showSection('recu')">Voir Reçu</a>
                </li>
            </ul>
        </div>

        <!-- Contenu central -->
        <div class="w-3/4 p-6 text-gray-900 dark:text-gray-100">
            <!-- Section dynamique -->
            <div id="welcome-text" class="block">
                <h3 class="text-xl font-semibold">Bienvenue sur le site de gestion scolaire</h3>
                <p class="mt-4">Groupe ISI - Institut Supérieur de l'Informatique. Ce site permet de gérer les inscriptions, les paiements, et les reçus de manière facile et rapide.</p>
            </div>

            <div id="notifications" class="hidden">
                <h3 class="text-xl font-semibold">Notifications</h3>
                <!-- Afficher ici la liste des notifications -->
            </div>

            <div id="echeances" class="hidden">
                <h3 class="text-xl font-semibold">Échéances de Mensualité</h3>
                <!-- Afficher ici la liste des échéances -->
            </div>

            <div id="inscription" class="hidden">
                <h3 class="text-xl font-semibold">Faire une Inscription</h3>
                <!-- Afficher ici le formulaire ou la liste des inscriptions -->
            </div>

            <div id="recu" class="hidden">
                <h3 class="text-xl font-semibold">Voir Reçu</h3>
                <!-- Afficher ici la liste des reçus -->
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Cacher toutes les sections
            const sections = document.querySelectorAll('[id]');
            sections.forEach(function (section) {
                section.classList.add('hidden');
            });

            // Afficher la section demandée
            document.getElementById(sectionId).classList.remove('hidden');

            // Afficher le texte d'accueil si nécessaire
            if (sectionId === 'dashboard') {
                document.getElementById('welcome-text').classList.remove('hidden');
            } else {
                document.getElementById('welcome-text').classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
