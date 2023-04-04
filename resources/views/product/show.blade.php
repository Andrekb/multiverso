<x-app-layout>
    <x-slot name="header">
        <h2>{{ $product->name }}</h2>
        <x-secondary-button class="bg-secondary" :href="route('produtos.edit', $product->id)">editar</x-secondary-button>
    </x-slot>
    <div class="flex-column list-content">
        <div class="show-product flex-row">
        @if($product->images->count() > 0)
            <div class="list-images flex-row">
            @foreach($product->images as $image)
                <div class="rm-image flex-column">
                    <img src="{{ url('images/products/' . $image->path) }}">
                </div>
            @endforeach
            </div>
        @endif
            <h2><span>descrição</span>{{ $product->description }}</h2>
            <h2><span>chamada</span>{{ $product->headline }}</h2>
            <h2><span>preço</span>R$ {{ number_format($product->price, 2, ',', '.') }}</h2>
            <h2>
                <span>peso</span><strong>{{ $product->weight }}</strong>
                <span>altura</span><strong>{{ $product->height }}</strong>
                <span>largura</span><strong>{{ $product->width }}</strong>
                <span>comprimento</span><strong>{{ $product->lenght }}</strong>
            </h2>
        </div>
        <h1 class="stock">Estoque</h1>
        <div class="show">
            @foreach($product->stores as $store)
                <h2>{{ $store->name }} <strong>{{ $store->pivot->stock }}</strong><span>- unidades</span>
                <a class="primary-button bg-wood" href="{{ route('lojas.editStock', $store->id) }}">editar estoque</a>
                </h2>
            @endforeach
        </div>
    </div>
</x-app-layout>