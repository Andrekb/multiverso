<x-app-layout>
    <x-slot name="header">
        <h2>editar produto: {{ $product->name }}</h2>
        <x-secondary-button class="bg-secondary" :href="route('produtos.index')">voltar</x-secondary-button>
    </x-slot>
    <div class="flex-column list-content">
        @if(session('status') === 'image-destroyed')
            <p class="success">Imagem deletada com sucesso</p>
        @endif       
        @if($product->images->count() > 0)
            <div class="list-images flex-row">
            @foreach($product->images as $image)
                <div class="rm-image flex-column">
                    <img src="{{ url('images/products/' . $image->path) }}">
                    <form method="post" action="{{ route('produtos.destroyImage', $image->id) }}">                        
                        @csrf
                        @method('delete')
                        <button type="submit" class="primary-button bg-danger rm-button">                    
                            <svg class="fill-gray rm-button-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.1 49.5">
                                <path d="m39.75,11.97c.45-1.04.46-2.2.04-3.19-.76-1.79-2.13-2.68-4.18-2.7-1.16-.01-2.32,0-3.48,0h-2.49s0-.71,0-.71c0-.27,0-.53,0-.78-.01-1.67-.63-2.93-1.83-3.73-.41-.27-.88-.44-1.39-.62-.22-.08-.44-.15-.65-.24h-11.45c-.06.03-.13.06-.2.07-1.95.33-3.39,1.85-3.59,3.79-.05.44-.06.88-.08,1.35,0,.21-.02.42-.03.63v.24s-.84,0-.84,0c-.41,0-.81,0-1.2,0-.45,0-.9,0-1.35,0h-.28c-.97,0-1.97,0-2.94.07-1.92.12-3.51,1.66-3.77,3.66-.25,1.87.9,3.76,2.68,4.41.45.16.62.41.62.89-.01,5.89-.01,11.77,0,17.65v2.21c0,.86,0,1.71,0,2.57,0,2-.02,4.08.02,6.11.07,3.35,2.59,5.85,5.88,5.85h.07c3.93-.04,7.92-.03,11.78-.02,2.17,0,4.33,0,6.5.01,1.19,0,2.39.01,3.58-.01,1.89-.03,3.41-.84,4.52-2.41.75-1.06,1.12-2.34,1.12-3.91v-7.26c0-6.88,0-13.77-.01-20.66,0-.48.12-.85.72-1.07.99-.37,1.81-1.18,2.25-2.21ZM12.53,3.36c.42-.96,1.21-1.5,2.21-1.5,3.46-.02,7.04-.03,10.65,0,1.25,0,2.25.93,2.38,2.19.04.4.03.79.02,1.2,0,.18,0,.37,0,.56v.25h-15.46v-.26c.01-.21,0-.42,0-.64-.02-.59-.04-1.2.22-1.8Zm22.42,39.78c0,1.53-.42,2.64-1.33,3.5-.71.66-1.57,1-2.56,1-3.97,0-7.95,0-11.92,0-3.35,0-6.7,0-10.05,0-1.98,0-3.52-1.36-3.83-3.37-.05-.33-.08-.67-.08-1.01,0-7.8,0-15.59,0-23.39v-5.35h29.78v28.62Zm1.2-30.53c-.25.03-.5.03-.76.03h-17.89c-.87,0-1.73,0-2.6,0-3.4,0-6.81,0-10.21,0-.33,0-.71,0-1.08-.09-1.04-.25-1.81-1.29-1.75-2.36.06-1.13.88-2.04,1.98-2.21.23-.04.48-.05.77-.05,10.3,0,20.6,0,30.89,0,1.58,0,2.59.82,2.71,2.18.11,1.27-.8,2.37-2.07,2.5Z"/>
                                <path d="m14.06,19.06c-.03-.54-.35-.89-.85-.92-.02,0-.05,0-.07,0-.24,0-.43.07-.58.21-.22.21-.33.57-.33,1.05,0,7.14,0,14.28,0,21.41,0,.2.01.35.04.48.1.49.48.79.94.78.47-.04.81-.39.85-.9.01-.12,0-.23,0-.35v-.12s0-10.58,0-10.58v-9.85s0-.35,0-.35c0-.29,0-.57,0-.86Z"/>
                                <path d="m19.14,40.75c0,.23,0,.44.05.62.09.41.45.7.86.7h.02c.41,0,.75-.29.85-.69.04-.19.06-.4.06-.67,0-7.07,0-14.15,0-21.22,0-.3-.02-.52-.07-.71-.07-.27-.26-.48-.52-.59-.11-.04-.22-.06-.33-.06-.17,0-.34.05-.49.14-.36.23-.44.58-.44,1.06,0,2.75,0,5.5,0,8.25v4.61c0,2.85,0,5.7,0,8.55Z"/>
                                <path d="m26.05,19.43v13.3s0,8.01,0,8.01c0,.51.11.9.33,1.11.15.14.35.22.6.21.61-.01.91-.45.91-1.31v-21.32c0-.5-.11-.88-.33-1.09-.15-.14-.35-.22-.59-.22h-.02c-.22,0-.9.01-.9,1.3Z"/>
                            </svg>                    
                        </button>
                    </form>
                </div>
            @endforeach
            </div>
        @endif
        <form class="form-block flex-column" method="POST" action="{{ route('produtos.update', $product->id) }}">
            @csrf
            @method('put')
            <!-- Nome -->
            <div class="flex-column input-block">
                <x-text-input id="name" type="text" name="name" placeholder="nome do produto"  :value="$product->name"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>
            <!-- Descrição -->
            <div class="flex-column input-block">
                <x-text-textarea id="description" type="text" name="description" rows="5" placeholder="descrição" autofocus autocomplete="name">
                    {{ $product->description }}
                </x-text-textarea>
                <x-input-error :messages="$errors->get('description')" />
            </div>
            <!-- Texto de chamada -->
            <div class="flex-column input-block">
                <x-text-input id="headline" type="text" name="headline" placeholder="chamada"  :value="$product->headline"  autofocus autocomplete="headline" />
                <x-input-error :messages="$errors->get('headline')" />
            </div>
            <!-- Preço -->
            <div class="flex-column input-block">
                <x-text-input id="price" type="text" name="price" placeholder="valor"  :value="$product->price"  autofocus autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" />
            </div>
            <!-- Peso -->
            <div class="flex-column input-block">
                <x-text-input id="weight" type="text" name="weight" placeholder="peso"  :value="$product->weight"  autofocus autocomplete="weight" />
                <x-input-error :messages="$errors->get('weight')" />
            </div>
            <!-- Altura -->
            <div class="flex-column input-block">
                <x-text-input id="height" type="text" name="height" placeholder="altura"  :value="$product->height"  autofocus autocomplete="height" />
                <x-input-error :messages="$errors->get('height')" />
            </div>
            <!-- Largua -->
            <div class="flex-column input-block">
                <x-text-input id="width" type="text" name="width" placeholder="largura"  :value="$product->width"  autofocus autocomplete="width" />
                <x-input-error :messages="$errors->get('width')" />
            </div>
            <!-- Comprimento -->
            <div class="flex-column input-block">
                <x-text-input id="lenght" type="text" name="lenght" placeholder="comprimento"  :value="$product->lenght"  autofocus autocomplete="lenght" />
                <x-input-error :messages="$errors->get('lenght')" />
            </div>
            <div class="flex-row flex-end">
                <x-primary-button class="bg-wood">alterar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>