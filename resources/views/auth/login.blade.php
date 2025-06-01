<x-guest-layout>
    <!-- Statut de la session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Adresse e-mail -->
        <div>
            <x-input-label for="email" :value="'Adresse e-mail'" class="text-dark" />
            <x-text-input id="email" class="block mt-1 w-full text-primary border border-secondary" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <!-- Mot de passe -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Mot de passe'" class="text-dark" />
            <x-text-input id="password" class="block mt-1 w-full text-primary border border-secondary"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Se souvenir de moi -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-dark">
                <input id="remember_me" type="checkbox" class="form-check-input me-2" name="remember">
                <span class="text-sm">Se souvenir de moi</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-primary hover:text-decoration-underline" href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            @endif

            <x-primary-button class="ms-3 btn text-white" style="background-color: #007bff; border-color: #007bff;"
                onmouseover="this.style.backgroundColor='#0056b3';"
                onmouseout="this.style.backgroundColor='#007bff';"
                onmousedown="this.style.backgroundColor='#004080';"
                onmouseup="this.style.backgroundColor='#0056b3';">
                Se connecter
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
