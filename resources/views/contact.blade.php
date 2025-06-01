@extends('layouts.public')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Contactez-nous</h1>
            <p class="lead">Nous sommes à votre écoute pour répondre à toutes vos questions</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h2 class="h4 card-title mb-4">Informations de contact</h2>

                        <div class="d-flex mb-4">
                            <div class="me-4 text-primary">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="h5">Adresse</h3>
                                <p class="mb-0">123 Avenue des Écoles<br>Plateau, Abidjan<br>Côte d'Ivoire</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="me-4 text-primary">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="h5">Téléphone</h3>
                                <p class="mb-0">+225 XX XX XX XX<br>Lundi - Vendredi, 8h - 18h</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="me-4 text-primary">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="h5">Email</h3>
                                <p class="mb-0">contact@groupe-isi.ci<br>info@groupe-isi.ci</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="me-4 text-primary">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="h5">Horaires d'ouverture</h3>
                                <p class="mb-0">Lundi - Vendredi : 8h - 18h<br>Samedi : 9h - 13h</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h2 class="h4 card-title mb-4">Envoyez-nous un message</h2>

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom complet</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="col-12">
                                    <label for="subject" class="form-label">Sujet</label>
                                    <select class="form-select" id="subject" name="subject" required>
                                        <option value="" selected disabled>Sélectionnez un sujet</option>
                                        <option value="information">Demande d'information</option>
                                        <option value="registration">Inscription</option>
                                        <option value="partnership">Partenariat</option>
                                        <option value="other">Autre</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="consent" required>
                                        <label class="form-check-label" for="consent">
                                            J'accepte la politique de confidentialité
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-paper-plane me-2"></i> Envoyer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.234944557372!2d-4.0089039240189!3d5.320502394680242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eb43f7f62f61%3A0x9e3a9b7e1a1b3b4b!2sAbidjan!5e0!3m2!1sfr!2sci!4v1620000000000!5m2!1sfr!2sci"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
