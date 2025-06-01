@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h1 class="display-5 fw-bold mb-4">Conditions Générales d'Utilisation</h1>
                        <p class="text-muted mb-5">En vigueur depuis le {{ date('d/m/Y') }}</p>

                        <article class="terms-content">
                            <section class="mb-5">
                                <h2 class="h4 mb-3">1. Acceptation des conditions</h2>
                                <p>L'utilisation de nos services implique l'acceptation pleine et entière des présentes conditions générales.</p>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">2. Services proposés</h2>
                                <p>Le Groupe ISI propose des services de formation professionnelle et continue dans divers domaines d'activité.</p>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">3. Inscriptions</h2>
                                <p>Les inscriptions sont soumises à :</p>
                                <ul>
                                    <li>La complétude du dossier d'inscription</li>
                                    <li>Le paiement des frais requis</li>
                                    <li>L'acceptation par notre commission pédagogique</li>
                                </ul>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">4. Paiements</h2>
                                <p>Les modalités de paiement sont les suivantes :</p>
                                <ul>
                                    <li>30% à l'inscription</li>
                                    <li>70% échelonnés selon le calendrier fourni</li>
                                    <li>Frais de dossier non remboursables</li>
                                </ul>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">5. Annulation et remboursement</h2>
                                <p>Les demandes d'annulation doivent être formulées par écrit :</p>
                                <ul>
                                    <li>Plus de 30 jours avant le début : remboursement à 80%</li>
                                    <li>Entre 15 et 30 jours : remboursement à 50%</li>
                                    <li>Moins de 15 jours : pas de remboursement</li>
                                </ul>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">6. Propriété intellectuelle</h2>
                                <p>Tous les contenus pédagogiques sont la propriété exclusive du Groupe ISI. Toute reproduction est interdite sans autorisation.</p>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">7. Responsabilité</h2>
                                <p>Nous ne sommes pas responsables :</p>
                                <ul>
                                    <li>Des échecs aux examens</li>
                                    <li>Des problèmes techniques indépendants de notre volonté</li>
                                    <li>De l'utilisation frauduleuse des identifiants</li>
                                </ul>
                            </section>

                            <section class="mb-5">
                                <h2 class="h4 mb-3">8. Modification des conditions</h2>
                                <p>Nous nous réservons le droit de modifier ces conditions. Les utilisateurs seront informés des changements majeurs.</p>
                            </section>

                            <section>
                                <h2 class="h4 mb-3">9. Loi applicable</h2>
                                <p>Les présentes conditions sont régies par la loi ivoirienne. Tout litige sera soumis aux tribunaux compétents d'Abidjan.</p>
                            </section>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
