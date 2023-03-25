<x-app-layout>
    <x-slot name="header">
        <h2>{{ $store->name }}</h2>
        <x-secondary-button class="bg-secondary" :href="route('lojas.edit', $store->id)">editar</x-secondary-button>
    </x-slot>
    <div class="flex-column list-content">
        <div class="show flex-row">
            <h2><span>endereço</span>{{ $store->address }}</h2>
            <h2><span>telefone</span>{{ $store->phone }}</h2>
            <h2><span>cidade</span>{{ $store->city->name }}</h2>
            <h2><span>latitude: {{ $store->lat }}</span></h2>
            <h2><span>longitude: {{ $store->long }}</span></h2>
        </div>
        
        <h1 class="stock">Estoque</h1>
        @if($store->products->count() > 0)
        <div class="show-product flex-row">
            @foreach($store->products as $product)
            <x-card-image>            
                <x-slot name="image">
                @if($product->images->count() > 0)
                    <img src="{{ url('images/products/' . $product->images()->first()->path) }}">
                @else
                    <img src="{{ url('images/products/default.png') }}">
                @endif
                </x-slot>
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
    </div>
</x-app-layout>