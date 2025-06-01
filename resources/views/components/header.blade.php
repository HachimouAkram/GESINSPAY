@props(['user'])

<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Logo + Nom de l'institut -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="40" height="40" class="me-2">
            <span class="fs-5 fw-bold">Institut Supérieur</span>
        </a>

        <!-- Dropdown utilisateur -->
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle fw-bold" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $user->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.show') }}">👤 Profil</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">🚪 Se déconnecter</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
