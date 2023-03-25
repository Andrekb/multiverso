<x-app-layout>
    <x-slot name="header">
        <h2> {{ __('perfil') }}</h2>
    </x-slot>
    <div class="flex-column list-content">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
    </div>
</x-app-layout>