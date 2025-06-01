@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 text-center bg-light position-relative">
        <div class="container position-relative z-index-1">
            <h1 class="display-4 fw-bold mb-4">Formez-vous aux métiers de demain</h1>
            <p class="lead mb-4">Découvrez notre institut de formation professionnelle qui vous offre des compétences recherchées sur le marché de l'emploi.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4">S'inscrire maintenant</a>
                <a href="#formations" class="btn btn-outline-primary btn-lg px-4">Nos formations</a>
            </div>
        </div>
        <div class="position-absolute top-0 end-0 bottom-0 start-0 bg-gradient opacity-10"></div>
    </section>

    <!-- A propos -->
    <section class="py-5" id="apropos">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="mb-4">Qui sommes-nous ?</h2>
                    <p class="lead">Notre institut de formation est un acteur majeur dans le domaine de l'éducation professionnelle depuis plus de 15 ans.</p>
                    <p>Fondé en 2008, nous avons formé plus de 10 000 étudiants qui occupent aujourd'hui des postes à responsabilité dans divers secteurs d'activité.</p>
                    <p>Notre mission est de fournir une éducation accessible, de qualité et orientée vers les besoins réels du marché du travail.</p>
                    <a href="{{ route('about') }}" class="btn btn-outline-primary mt-3">En savoir plus</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/about-us.jpg') }}" alt="Notre institut" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Formations phares -->
    <section class="py-5 bg-light" id="formations">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Nos Formations Stars</h2>
                <p class="lead">Découvrez nos programmes phares conçus pour répondre aux besoins des entreprises</p>
            </div>
            <div class="row g-4">
                @foreach($formationsGroupees as $nom => $formations)
                    @php
                        $formationDefault = $formations[0];
                    @endphp
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <div class="badge bg-primary mb-3">Nouveauté</div>
                                <h5 class="card-title">{{ $nom }}</h5>
                                <p class="card-text text-muted">Formation complète avec certification reconnue par l'État</p>

                                <div class="mb-3">
                                    <label for="niveau_{{ Str::slug($nom) }}" class="form-label">Niveau</label>
                                    <select class="form-select niveau-select" data-nom="{{ Str::slug($nom) }}">
                                        @foreach($formations as $formation)
                                            @php
                                                $niveau = $formation->niveau;
                                                if ($niveau == 1) {
                                                    $label = 'Licence 1';
                                                } elseif ($niveau == 2) {
                                                    $label = 'Licence 2';
                                                } elseif ($niveau == 3) {
                                                    $label = 'Licence 3';
                                                } elseif ($niveau == 4) {
                                                    $label = 'Master 1';
                                                } elseif ($niveau == 5) {
                                                    $label = 'Master 2';
                                                } else {
                                                    $label = 'Niveau ' . $niveau;
                                                }
                                            @endphp
                                            <option value="{{ $formation->id }}"
                                                data-prix-inscription="{{ $formation->prix_inscription }}"
                                                data-prix-mensuel="{{ $formation->prix_mensuel }}"
                                                data-date-debut="{{ $formation->date_debut }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <ul class="list-unstyled info-formation" id="info-{{ Str::slug($nom) }}">
                                    <li class="mb-2"><i class="fas fa-euro-sign text-primary me-2"></i> Frais d'inscription : <span class="inscription fw-bold">{{ $formationDefault->prix_inscription }} FCFA</span></li>
                                    <li class="mb-2"><i class="fas fa-euro-sign text-primary me-2"></i> Frais mensuel : <span class="mensuel fw-bold">{{ $formationDefault->prix_mensuel }} FCFA</span></li>
                                    <li class="mb-3"><i class="fas fa-calendar text-primary me-2"></i> Date de début : <span class="debut fw-bold">{{ \Carbon\Carbon::parse($formationDefault->date_debut)->format('d/m/Y') }}</span></li>
                                </ul>
                                <a href="{{ route('formation.details', $formationDefault->id) }}" class="btn btn-outline-primary w-100">Détails</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('formations') }}" class="btn btn-primary">Voir toutes nos formations</a>
            </div>
        </div>
    </section>

    <!-- Historique et chiffres -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Notre impact en chiffres</h2>
            <div class="row text-center">
                <div class="col-md-3 mb-4">
                    <div class="display-4 fw-bold text-primary">15+</div>
                    <p class="text-muted">Années d'expérience</p>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="display-4 fw-bold text-primary">10K+</div>
                    <p class="text-muted">Étudiants formés</p>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="display-4 fw-bold text-primary">95%</div>
                    <p class="text-muted">Taux d'insertion professionnelle</p>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="display-4 fw-bold text-primary">50+</div>
                    <p class="text-muted">Partenaires entreprises</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Ils parlent de nous</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text">"La formation en développement web m'a permis de décrocher un CDI avant même la fin de mon cursus. Les enseignants sont vraiment à l'écoute."</p>
                            <div class="d-flex align-items-center mt-3">
                                <img src="{{ asset('images/avatar1.jpg') }}" alt="Étudiant" class="rounded-circle me-3" width="50">
                                <div>
                                    <h6 class="mb-0">Jean Koffi</h6>
                                    <small class="text-muted">Développeur Fullstack</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text">"Le programme de marketing digital est très complet et actualisé. J'ai pu créer mon agence juste après l'obtention de mon diplôme."</p>
                            <div class="d-flex align-items-center mt-3">
                                <img src="{{ asset('images/avatar2.jpg') }}" alt="Étudiant" class="rounded-circle me-3" width="50">
                                <div>
                                    <h6 class="mb-0">Amina Diallo</h6>
                                    <small class="text-muted">Fondatrice de Mali Digital</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="card-text">"Les formateurs experts et les travaux pratiques m'ont donné confiance en mes compétences en cybersécurité. Je recommande vivement !"</p>
                            <div class="d-flex align-items-center mt-3">
                                <img src="{{ asset('images/avatar3.jpg') }}" alt="Étudiant" class="rounded-circle me-3" width="50">
                                <div>
                                    <h6 class="mb-0">Paul Yao</h6>
                                    <small class="text-muted">Consultant en sécurité</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Inscription -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">Prêt à transformer votre avenir professionnel ?</h2>
            <p class="lead mb-4">Rejoignez notre communauté d'apprenants et bénéficiez d'un accompagnement personnalisé.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">Inscrivez-vous dès maintenant</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4">Nous contacter</a>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="mb-4">Contactez-nous</h2>
                    <p>Vous avez des questions sur nos formations ? Notre équipe est à votre disposition pour vous conseiller.</p>

                    <div class="mb-4">
                        <h5><i class="fas fa-map-marker-alt text-primary me-2"></i> Adresse</h5>
                        <p>123 Avenue de la Formation, Plateau, Abidjan, Côte d'Ivoire</p>
                    </div>

                    <div class="mb-4">
                        <h5><i class="fas fa-phone-alt text-primary me-2"></i> Téléphone</h5>
                        <p>+225 XX XX XX XX</p>
                    </div>

                    <div class="mb-4">
                        <h5><i class="fas fa-envelope text-primary me-2"></i> Email</h5>
                        <p>contact@institut-formation.ci</p>
                    </div>

                    <div class="mb-4">
                        <h5><i class="fas fa-clock text-primary me-2"></i> Horaires</h5>
                        <p>Lundi - Vendredi : 8h - 18h<br>Samedi : 9h - 13h</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Envoyez-nous un message</h5>
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Votre nom">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Votre email">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Sujet">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="4" placeholder="Votre message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selects = document.querySelectorAll('.niveau-select');

            selects.forEach(select => {
                select.addEventListener('change', function () {
                    const selectedOption = this.options[this.selectedIndex];
                    const prixInscription = selectedOption.dataset.prixInscription;
                    const prixMensuel = selectedOption.dataset.prixMensuel;
                    const dateDebut = selectedOption.dataset.dateDebut;
                    const nom = this.dataset.nom;

                    const infoContainer = document.getElementById(`info-${nom}`);
                    infoContainer.querySelector('.inscription').textContent = prixInscription + ' FCFA';
                    infoContainer.querySelector('.mensuel').textContent = prixMensuel + ' FCFA';
                    infoContainer.querySelector('.debut').textContent = new Date(dateDebut).toLocaleDateString('fr-FR');
                });
            });
        });
    </script>
    @endpush
@endsection
