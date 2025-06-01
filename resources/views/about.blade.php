@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4">À propos du Groupe ISI</h1>
                <p class="lead">Notre institut de formation est un leader dans l'éducation professionnelle depuis plus de 15 ans.</p>

                <div class="mt-4">
                    <h3 class="h4">Notre mission</h3>
                    <p>Offrir des formations de qualité adaptées aux besoins du marché pour favoriser l'insertion professionnelle.</p>

                    <h3 class="h4 mt-4">Notre vision</h3>
                    <p>Devenir le référent en formation professionnelle en Afrique francophone d'ici 2030.</p>

                    <h3 class="h4 mt-4">Nos valeurs</h3>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-primary me-2"></i> Excellence académique</li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i> Innovation pédagogique</li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i> Équité et accessibilité</li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i> Professionnalisme</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <img src="{{ asset('images/about-us.jpg') }}" class="card-img-top" alt="Équipe du Groupe ISI">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rencontrez notre équipe</h5>
                        <p class="card-text">Des formateurs experts avec une expérience terrain</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Nous contacter</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Notre histoire</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-year">2008</div>
                        <div class="timeline-content">
                            <h3>Fondation</h3>
                            <p>Création du Groupe ISI avec une première promotion de 50 étudiants en informatique.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2012</div>
                        <div class="timeline-content">
                            <h3>Agrément ministériel</h3>
                            <p>Obtention de l'agrément du Ministère de l'Éducation pour nos formations.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2020</div>
                        <div class="timeline-content">
                            <h3>Expansion régionale</h3>
                            <p>Ouverture de 3 nouveaux campus dans la sous-région.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2023</div>
                        <div class="timeline-content">
                            <h3>10 000 diplômés</h3>
                            <p>Franchissement du cap des 10 000 étudiants formés avec un taux d'insertion de 95%.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .timeline {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
    }

    .timeline::after {
        content: '';
        position: absolute;
        width: 6px;
        background-color: #0d6efd;
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -3px;
        border-radius: 10px;
    }

    .timeline-item {
        padding: 10px 40px;
        position: relative;
        width: 50%;
        box-sizing: border-box;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        width: 25px;
        height: 25px;
        background-color: white;
        border: 4px solid #0d6efd;
        top: 15px;
        border-radius: 50%;
        z-index: 1;
    }

    .left {
        left: 0;
        text-align: right;
    }

    .right {
        left: 50%;
        text-align: left;
    }

    .left::after {
        right: -12px;
    }

    .right::after {
        left: -12px;
    }

    .timeline-content {
        padding: 20px 30px;
        background-color: white;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .timeline-year {
        font-weight: bold;
        font-size: 1.2rem;
        color: #0d6efd;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .timeline::after {
            left: 31px;
        }

        .timeline-item {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
        }

        .timeline-item::after {
            left: 18px;
        }

        .left, .right {
            left: 0;
            text-align: left;
        }
    }
</style>
@endpush
