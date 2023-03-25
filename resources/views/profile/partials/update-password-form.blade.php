@if (session('status') === 'password-updated')
    <p class="success">{{ __('senha alterada.') }}</p>
@endif
<section>
    <header>
        <div class="generalize title-head">
            <h2>{{ __('alterar senha') }}</h2>
        </div>
    </header>
    <form class="form-block flex-column" method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <div class="flex-column input-block">
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" placeholder="senha atual" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="flex-column input-block">
            <x-text-input id="password" name="password" type="password" placeholder="nova senha" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="flex-column input-block">
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" placeholder="confirme sua senha" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>
        <div class="flex-row flex-end">
            <x-primary-button class="bg-wood">alterar</x-primary-button>
        </div>
    </form>
</section>