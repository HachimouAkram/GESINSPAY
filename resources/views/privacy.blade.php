@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h1 class="display-5 fw-bold mb-4">Politique de Confidentialité</h1>
                        <p class="text-muted mb-5">Dernière mise à jour : {{ date('d/m/Y') }}</p>

                        <article class="privacy-content">
                            <section class="mb-5">
                                <h2 class="h4 mb-3">1. Introduction</h2>
                                <p>Le Groupe ISI ("nous", "notre", "nos") s'engage à protéger la vie privée de ses utilisateurs. Cette politique explique comment nous collectons, utilisons et protégeons vos informations personnelles.</p>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">2. Informations collectées</h2>
                                <p>Nous pouvons collecter les types d'informations suivants :</p>
                                <ul>
                                    <li>Informations d'identification (nom, prénom, email, etc.)</li>
                                    <li>Informations de contact (adresse, téléphone, etc.)</li>
                                    <li>Informations académiques (diplômes, parcours, etc.)</li>
                                    <li>Données de navigation (adresse IP, cookies, etc.)</li>
                                </ul>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">3. Utilisation des informations</h2>
                                <p>Vos informations sont utilisées pour :</p>
                                <ul>
                                    <li>Fournir et personnaliser nos services</li>
                                    <li>Traiter vos inscriptions et demandes</li>
                                    <li>Améliorer notre site et services</li>
                                    <li>Vous envoyer des informations pertinentes</li>
                                    <li>Remplir nos obligations légales</li>
                                </ul>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">4. Partage des informations</h2>
                                <p>Nous ne vendons pas vos informations personnelles. Nous pouvons les partager avec :</p>
                                <ul>
                                    <li>Prestataires de services agissant en notre nom</li>
                                    <li>Autorités légales si requis par la loi</li>
                                    <li>Partenaires académiques dans le cadre de votre formation</li>
                                </ul>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">5. Protection des données</h2>
                                <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre tout accès non autorisé, altération ou destruction.</p>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">6. Vos droits</h2>
                                <p>Conformément à la réglementation en vigueur, vous avez le droit :</p>
                                <ul>
                                    <li>D'accéder à vos données personnelles</li>
                                    <li>De les rectifier ou compléter</li>
                                    <li>De demander leur effacement</li>
                                    <li>De limiter leur traitement</li>
                                    <li>De vous opposer à leur traitement</li>
                                    <li>À la portabilité des données</li>
                                </ul>
                                <p>Pour exercer ces droits, contactez-nous à <a href="mailto:privacy@groupe-isi.ci">privacy@groupe-isi.ci</a>.</p>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">7. Cookies</h2>
                                <p>Notre site utilise des cookies pour améliorer l'expérience utilisateur. Vous pouvez configurer votre navigateur pour refuser les cookies.</p>
                            </section>

                            <section>
                                <h2 class="h4 mb-3">8. Modifications</h2>
                                <p>Nous pouvons mettre à jour cette politique occasionnellement. La version mise à jour sera publiée sur notre site avec une nouvelle date de révision.</p>
                            </section>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
