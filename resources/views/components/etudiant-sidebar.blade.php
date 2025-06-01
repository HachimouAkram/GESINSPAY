<!-- resources/views/components/sidebar.blade.php -->
<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white vh-100" style="width: 250px;">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="fas fa-graduation-cap me-2"></i>
        <span class="fs-4">Mon Espace</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('etudiant.inscriptions') }}" class="nav-link text-white">
                <i class="fas fa-user-plus me-2"></i>
                Inscriptions
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white disabled">
                <i class="fas fa-credit-card me-2"></i>
                Paiements
            </a>
        </li>
        <li>
            <a href="{{ route('etudiant.notifications') }}" class="nav-link text-white">
                <i class="fas fa-bell me-2"></i>
                Notifications
            </a>
        </li>
        <li>
            <a href="{{ route('mensualites.index') }}" class="nav-link text-white">
                <i class="fas fa-calendar-alt me-2"></i>
                Échéances
            </a>
        </li>
    </ul>
    <hr>
    <div>
        <span class="text-white">👋 Bonjour {{ Auth::user()->name }}</span>
    </div>
</div>
