<x-app-layout>
    <x-slot name="header">
        <h2>estoque - {{ $store->name }}</h2>
    </x-slot>
    <div class="flex-column list-content">
        @if(session('status') === 'stock-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="success">Estoque alterado com sucesso</p>
        @endif
        <x-line-link>
            <x-slot name="name">{{ $store->name }}</x-slot> 
        </x-line-link>
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
            <div class="crud-buttons flex-row">                
                <form method="post" action="{{ route('lojas.updateStock', [$store->id, $product->id]) }}" class="flex-row">                        
                    @csrf
                    @method('put')
                    <div class="flex-column input-block">
                        <x-text-input id="stock" type="number" name="stock" placeholder="estoque"  :value="$product->pivot->stock"  autofocus autocomplete="cep" />
                        <x-input-error :messages="$errors->get('stock')" />
                    </div>
                    <button type="submit" class="primary-button bg-secondary">                    
                        <svg class="fill-gray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48.5 48.5">
                            <path d="m26.31,3.62c-.19-.04-.43-.05-.68-.04-6.91,0-13.77,0-20.64,0-.22,0-.43,0-.65.02-1.93.1-3.59,1.4-4.15,3.25-.05.18-.1.36-.15.54l-.05.17v36.84c.02.06.05.13.06.21.48,2.44,2.25,3.9,4.74,3.9,10.58,0,21.15,0,31.73,0,.47,0,.9-.04,1.28-.13,2.15-.51,3.54-2.31,3.55-4.58.01-5.08,0-10.16,0-15.24v-2.29c0-.18-.02-.35-.06-.5-.11-.43-.48-.74-.93-.76-.46-.03-.87.25-.99.64-.06.2-.1.46-.1.77,0,4.53,0,9.06,0,13.59v3.4c0,.31,0,.53-.02.75-.1,1.16-1.01,2.09-2.16,2.23-.26.03-.51.03-.77.03H5.03c-.26,0-.52,0-.77-.04-1.1-.13-2-1.02-2.14-2.11-.04-.27-.04-.55-.04-.83v-16.38c0-6.14,0-12.28,0-18.42,0-.34,0-.75.11-1.16.3-1.15,1.31-1.84,2.68-1.84h20.84c.16,0,.31,0,.46-.01.48-.05.86-.47.88-.97.03-.48-.3-.94-.74-1.04Z"/>
                            <path d="m13.41,37.29c2.97-1,5.94-1.99,8.92-2.97.47-.15.85-.39,1.21-.75,5.33-5.33,10.66-10.67,15.99-16l6.79-6.79c.22-.22.44-.45.65-.68,1.2-1.34,1.73-3.14,1.45-4.96-.28-1.78-1.3-3.31-2.81-4.19-.51-.3-1.11-.49-1.74-.68-.27-.08-.54-.17-.81-.26h-1.17s-.24.05-.24.05c-1.46.18-2.71.88-4.09,2.26l-1.04,1.04c-6.55,6.58-13.31,13.38-20.04,20-1.57,1.55-2.5,3.05-3.02,4.87-.53,1.87-1.17,3.72-1.79,5.52-.28.82-.57,1.64-.84,2.47-.31.93.16,1.27.31,1.38.23.16.53.28,1.19.06l1.06-.36Zm.46-3.6c.17-.51.34-1.01.51-1.51.39-1.12.75-2.18,1.05-3.26.41-1.49,1.2-2.79,2.5-4.07,5.79-5.73,11.63-11.58,17.29-17.25l4.13-4.13c1.29-1.29,2.76-1.69,4.35-1.16,1.22.4,2.17,1.38,2.55,2.64.37,1.26.11,2.61-.69,3.61-.18.22-.37.44-.58.64-7.54,7.54-15.07,15.08-22.61,22.61-.19.19-.43.43-.78.55-1.77.6-3.55,1.19-5.38,1.8l-2.81.94.47-1.42Z"/>
                        </svg>                  
                    </button>
                </form>
            </div>    
        </x-card-image>
            @endforeach
        </div>
        @else
            <h2 class="no-stock">Nesta loja não há itens em estoque.</h2>
        @endif
    </div>
</x-app-layout>