@if (session('status') === 'profile-updated')
    <p class="success">{{ __('perfil alterado.') }}</p>
@endif
<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form class="form-block flex-column" method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        <div class="flex-column input-block">
            <x-text-input id="name" name="name" type="text" placeholder="nome" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div class="flex-column input-block">
            <x-text-input id="email" name="email" type="email" placeholder="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        <div class="flex-row flex-end">
            <x-primary-button class="bg-wood">alterar</x-primary-button>
        </div>
    </form>
</section>
