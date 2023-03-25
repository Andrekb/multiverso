<x-app-layout>
    <x-slot name="header">
        <h2>dashboard</h2>
    </x-slot>
    <div class="flex-row dash-content">
        <x-card-link :href="route('produtos.index')">
            <x-slot name="header">produtos</x-slot>
            <x-slot name="itemsCount">{{ $products }}</x-slot>
            <x-slot name="items">cadastrados</x-slot>
        </x-card-link>
        <x-card-link :href="route('cidades.index')">
            <x-slot name="header">cidades</x-slot>
            <x-slot name="itemsCount">{{ $cities }}</x-slot>
            <x-slot name="items">cadastradas</x-slot>
        </x-card-link>
        <x-card-link :href="route('lojas.index')">
            <x-slot name="header">lojas</x-slot>
            <x-slot name="itemsCount">{{ $stores }}</x-slot>
            <x-slot name="items">cadastrados</x-slot>
        </x-card-link>
        <x-card-link :href="route('lojas.stock')">
            <x-slot name="header">alterar estoque</x-slot>
            <x-slot name="itemsCount">{{ $stock }}</x-slot>
            <x-slot name="items">produtos em estoque</x-slot>
        </x-card-link>
    </div>
</x-app-layout>