<x-app-layout>
    <x-slot name="header">
        <h2>estoque</h2>
    </x-slot>
    <div class="flex-column list-content">
        @foreach($stores as $store)
        <x-line-link>
            <x-slot name="name">{{ $store->name }}</x-slot>
            <div class="crud-buttons flex-row">
                <a class="primary-button bg-olive" href="{{ route('lojas.editStock', $store->id) }}">
                    alterar estoque
                </a>
            </div>   
        </x-line-link>
        @if($store->products->count() > 0)
        <div class="show-product-stock flex-row">
            @foreach($store->products as $product)
            <x-card-stock>            
                <x-slot name="image"></x-slot>
                <x-slot name="itemName">{{ $product->name }}</x-slot>     
                <x-slot name="itemValue">{{ $product->pivot->stock }} und</x-slot>
            </x-card-stock>
            @endforeach
        </div>
        @else
            <h2 class="no-stock">Nesta loja não há itens em estoque.</h2>
        @endif
        @endforeach
    </div>
</x-app-layout>