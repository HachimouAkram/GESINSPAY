@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Nos Formations</h1>
            <p class="lead">Découvrez notre catalogue complet de formations professionnelles</p>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control border-start-0" id="searchInput" placeholder="Rechercher...">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <select class="form-select" id="domainFilter">
                    <option value="">Tous les domaines</option>
                    <option value="informatique">Informatique</option>
                    <option value="management">Management</option>
                    <option value="marketing">Marketing Digital</option>
                    <option value="finance">Finance</option>
                </select>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <select class="form-select" id="levelFilter">
                    <option value="">Tous les niveaux</option>
                    <option value="1">Licence 1</option>
                    <option value="2">Licence 2</option>
                    <option value="3">Licence 3</option>
                    <option value="4">Master 1</option>
                    <option value="5">Master 2</option>
                </select>
            </div>
        </div>

        <div class="row g-4" id="formationsContainer">
            @foreach($formations as $formation)
            <div class="col-md-6 col-lg-4 formation-card"
                 data-domain="{{ strtolower($formation->domaine) }}"
                 data-level="{{ $formation->niveau }}">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-img-top overflow-hidden" style="height: 180px;">
                        <img src="{{ asset('storage/' . $formation->image) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $formation->nom }}">
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary">{{ $formation->domaine }}</span>
                            <span class="badge bg-secondary">
                                @if($formation->niveau == 1) Licence 1
                                @elseif($formation->niveau == 2) Licence 2
                                @elseif($formation->niveau == 3) Licence 3
                                @elseif($formation->niveau == 4) Master 1
                                @elseif($formation->niveau == 5) Master 2
                                @endif
                            </span>
                        </div>
                        <h3 class="h5 card-title">{{ $formation->nom }}</h3>
                        <p class="card-text text-muted">{{ Str::limit($formation->description, 100) }}</p>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                <span class="text-primary fw-bold">{{ $formation->duree }} mois</span>
                                <span class="text-muted">de formation</span>
                            </div>
                            <a href="{{ route('formation.show', $formation->id) }}" class="btn btn-sm btn-outline-primary">
                                Voir détails <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const domainFilter = document.getElementById('domainFilter');
        const levelFilter = document.getElementById('levelFilter');
        const formationCards = document.querySelectorAll('.formation-card');

        function filterFormations() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedDomain = domainFilter.value;
            const selectedLevel = levelFilter.value;

            formationCards.forEach(card => {
                const domain = card.dataset.domain;
                const level = card.dataset.level;
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                const description = card.querySelector('.card-text').textContent.toLowerCase();

                const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                const matchesDomain = !selectedDomain || domain === selectedDomain;
                const matchesLevel = !selectedLevel || level === selectedLevel;

                if (matchesSearch && matchesDomain && matchesLevel) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterFormations);
        domainFilter.addEventListener('change', filterFormations);
        levelFilter.addEventListener('change', filterFormations);
    });
</script>
@endpush
