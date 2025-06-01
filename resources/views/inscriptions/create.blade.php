@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container bg-white rounded p-4 shadow" style="max-width: 700px;">
        <h2 class="text-center mb-4">Demande d'inscription</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="inscriptionForm" class="row g-3 needs-validation" novalidate>
            @csrf

            <!-- Nom de la formation -->
            <div class="col-md-12">
                <label class="form-label fw-bold">Nom de la formation</label>
                <select name="nom_formation" id="nomFormation" class="form-select" required>
                    <option value="">Sélectionnez une formation</option>
                    @foreach($formations->pluck('nom')->unique() as $nom)
                        <option value="{{ $nom }}">{{ $nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Niveau (dépend du nom) -->
            <div class="col-md-12">
                <label class="form-label fw-bold">Niveau</label>
                <select name="formation_id" id="niveauFormation" class="form-select" required disabled>
                    <option value="">Sélectionnez un niveau</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Demander une inscription</button>
                <a href="{{ route('etudiant.dashboard') }}" class="btn btn-secondary">Annuler</a>
            </div>

            <!-- Message de réponse dynamique -->
            <div id="responseMessage" class="mt-4"></div>
        </form>
    </div>
</div>

<script>
    const formations = @json($formations);

    // Gérer le changement de nom
    document.getElementById('nomFormation').addEventListener('change', function () {
        const nom = this.value;
        const niveauSelect = document.getElementById('niveauFormation');
        niveauSelect.innerHTML = '<option value="">Sélectionnez un niveau</option>';

        if (!nom) {
            niveauSelect.disabled = true;
            return;
        }

        const filtered = formations.filter(f => f.nom === nom);

        filtered.forEach(f => {
            let niveauLabel = '';
            if (f.niveau <= 3) {
                niveauLabel = `Licence ${f.niveau}`;
            } else {
                niveauLabel = `Master ${f.niveau - 3}`;
            }

            const option = document.createElement('option');
            option.value = f.id;
            option.textContent = niveauLabel;
            niveauSelect.appendChild(option);
        });

        niveauSelect.disabled = false;
    });

    // Soumission de la demande
    document.getElementById('inscriptionForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const messageDiv = document.getElementById("responseMessage");

        // Champs ajoutés côté JS
        formData.append('date', new Date().toISOString().split('T')[0]);
        formData.append('statut', 'en_attente');
        formData.append('utilisateur_id', "{{ auth()->user()->id }}");

        try {
            const response = await fetch("{{ url('/api/inscriptions') }}", {
                method: "POST",
                body: formData
            });

            const result = await response.json();

            if (response.ok) {
                messageDiv.innerHTML = `
                    <div class="alert alert-success text-center">
                        Votre demande d'inscription a été envoyée avec succès. <br>
                        Pour compléter votre dossier, souhaitez-vous ajouter vos documents maintenant ?
                        <div class="mt-3 d-flex justify-content-center gap-3">
                            <button class="btn btn-info" onclick="window.location.href='{{ route('documents.create') }}'">Oui</button>
                            <button class="btn btn-secondary" onclick="window.location.href='{{ route('etudiant.dashboard') }}'">Plus tard</button>
                        </div>
                    </div>
                `;
                // Facultatif : désactiver le bouton de soumission pour éviter les doubles envois
                this.querySelector("button[type='submit']").disabled = true;

            } else {
                messageDiv.innerHTML = `<div class="alert alert-danger">Erreur : ${result.status_message || result.error || 'Une erreur est survenue.'}</div>`;
            }

        } catch (error) {
            messageDiv.innerHTML = `<div class="alert alert-danger">Erreur réseau : ${error.message}</div>`;
        }
    });
</script>
@endsection
