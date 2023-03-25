<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <form class="form-block flex-column" method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div class="flex-column input-block">
            <x-text-input id="email" type="email" name="email" :placeholder="__('Email')"  :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="flex-column input-block">
            <x-text-input id="password" type="password" name="password" :placeholder="__('Senha')" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="flex-row flex-end">
            @if (Route::has('password.request'))
                <a class="forgot" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif

            <x-primary-button class="bg-wood">
                {{ __('Logar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>