<nav class="generalize flex-row">
    <!-- Primary Navigation Menu -->
    <!-- Logo -->
    <a href="/">
        <x-application-logo class="fill-gray logo-head" />
    </a>
    <!-- Settings Dropdown -->
    <div class="top-menu flex-row">
        <a class="menu-item" href="{{ route('dashboard.show') }}">Dashboard</a>
        <a class="menu-item" href="{{ route('produtos.index') }}">Produtos</a>
        <a class="menu-item" href="{{ route('cidades.index') }}">Cidades</a>
        <a class="menu-item" href="{{ route('lojas.index') }}">Lojas</a>
        <x-dropdown>
            <x-slot name="trigger">
                <button id="user-btn" class="user-btn">
                    <svg class="fill-gray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 29.99">
                        <path d="m29.77,12.42c-.84-4.49-3.23-7.92-7.12-10.3C20.65.88,18.45.21,16.11.05c-.08,0-.15-.03-.23-.05h-1.76c-.57.08-1.14.13-1.71.23-3.45.61-6.34,2.24-8.66,4.86C1.64,7.49.42,10.3.08,13.48c-.26,2.44.08,4.81,1.01,7.08,1.28,3.15,3.37,5.61,6.3,7.35,1.99,1.18,4.14,1.86,6.44,2.03,3.33.25,6.41-.52,9.23-2.31,2.17-1.37,3.86-3.21,5.09-5.47,1.04-1.89,1.64-3.91,1.79-6.07,0-.08.03-.15.05-.22v-1.76c-.08-.57-.13-1.14-.23-1.7Zm-4.3,11.86c-2.37,2.61-5.29,4.17-8.79,4.61-.56.07-1.13.09-1.55.13-4.27-.1-7.76-1.64-10.55-4.7-.13-.14-.17-.27-.11-.46,1.14-3.51,3.43-5.92,6.89-7.22.18-.07.32-.06.49.04,2.11,1.11,4.22,1.1,6.33,0,.13-.07.32-.09.46-.04,3.48,1.28,5.78,3.7,6.91,7.23.05.16.05.28-.07.42Zm-15.97-13.3c0-3.01,2.49-5.48,5.51-5.48,3.02,0,5.52,2.51,5.49,5.5-.03,3.05-2.48,5.48-5.51,5.47-3.04-.01-5.49-2.46-5.49-5.49Zm16.86,12.14c-1.28-3.46-3.6-5.87-7-7.3,1.74-1.72,2.47-3.77,1.98-6.18-.34-1.67-1.26-2.98-2.64-3.98-2.5-1.8-6.11-1.45-8.32.75-2.15,2.14-2.91,6.44.24,9.41-3.38,1.42-5.71,3.83-6.98,7.27C.42,18.91-.48,11.31,4.63,5.61,9.62.05,18.26-.56,23.94,4.23c6,5.06,6.44,13.37,2.42,18.89Z"/>
                    </svg>
                </button>
            </x-slot>
            <x-slot name="content">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <x-dropdown-link :href="route('profile.edit')">{{ __('Perfil') }}</x-dropdown-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>
