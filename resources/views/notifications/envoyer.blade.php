@extends('layouts.app') <!-- ou ton layout principal -->

@section('content')
<div class="container">
    <h2>Envoyer une notification</h2>

    <form method="POST" action="{{ route('notifications.envoyer') }}">
        @csrf

        <label>Message :</label>
        <textarea name="message" class="form-control" required></textarea>

        <label>Type :</label>
        <input type="text" name="type_message" class="form-control" required />

        <label class="mt-2">Destinataires :</label>

        <!-- ✅ Checkbox pour tout sélectionner -->
        <div class="form-check mb-2">
            <input type="checkbox" id="selectAll" class="form-check-input">
            <label for="selectAll" class="form-check-label">Tout sélectionner</label>
        </div>

        <select id="usersSelect" name="utilisateur_ids[]" class="form-control" multiple size="10" required>
            @foreach(\App\Models\User::all() as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <button class="btn btn-success mt-3">Envoyer</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    // ✅ Script JS pour gérer le bouton "Tout sélectionner"
    document.getElementById('selectAll').addEventListener('change', function () {
        let options = document.getElementById('usersSelect').options;
        for (let i = 0; i < options.length; i++) {
            options[i].selected = this.checked;
        }
    });
</script>
@endsection
