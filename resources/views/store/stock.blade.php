<x-app-layout>
    <x-slot name="header">
        <h2>estoque</h2>
    </x-slot>
    <div class="flex-column list-content">
        @foreach($stores as $store)
        @if($store->products->count() > 0)
        <div class="show-product flex-row">
            @foreach($store->products as $product)
            <x-card-image>            
                <x-slot name="image"></x-slot>
                <x-slot name="itemName">{{ $product->name }}</x-slot>     
                <x-slot name="itemValue">{{ number_format($product->price, 2, ',', '.') }}</x-slot>     
                <h2>
                    <span>unidades</span>
                    <strong>{{ $product->pivot->stock }}</strong>
                </h2>
                
            </x-card-image>
            @endforeach
        </div>
        @else
            <h2 class="no-stock">Nesta loja não há itens em estoque.</h2>
        @endif
        @endforeach
    </div>
</x-app-layout>