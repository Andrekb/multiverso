<x-app-layout>
    <x-slot name="header">
        <h2>produtos</h2>
        <x-secondary-button class="bg-secondary" :href="route('produtos.create')">criar</x-secondary-button>
    </x-slot>
    <div class="flex-row cards-content">
        @if (session('status') === 'product-created')
            <p class="success">Produto cadastrado com sucesso</p>
        @elseif(session('status') === 'product-updated')
            <p class="success">Produto alterado com sucesso</p>
        @elseif(session('status') === 'product-not-destroyed')
            <p class="not-success">Produto possui estoque vinculado a lojas, não é possível excluir</p>
        @elseif(session('status') === 'product-destroyed')
            <p class="success">Produto deletado com sucesso</p>
        @endif
        @foreach($products as $product)
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
                <a class="primary-button bg-wood" href="{{ route('produtos.images', $product->id) }}">
                    <svg class="fill-gray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 30.64">
                        <path d="m0,1.56c.04-.09.09-.18.13-.27C.44.51,1.13.02,1.96,0c.18,0,.36,0,.55,0,11.74,0,23.49,0,35.23,0,1.48,0,2.26.78,2.26,2.26,0,8.7,0,17.39,0,26.09,0,1.48-.78,2.26-2.26,2.26-11.73,0-23.46,0-35.19.01-1.24,0-2.12-.36-2.55-1.57C0,19.89,0,10.73,0,1.56Zm20.02-.08c-5.9,0-11.8,0-17.69,0-.74,0-.84.1-.84.82,0,8.67,0,17.34,0,26.01,0,.71.11.82.8.82,11.81,0,23.62,0,35.43,0,.69,0,.81-.12.81-.82,0-8.67,0-17.34,0-26.01,0-.72-.11-.82-.84-.82-5.88,0-11.77,0-17.65,0Z"/>
                        <path d="m15.29,20.09c.64-.77,1.27-1.52,1.89-2.26,1.61-1.93,3.22-3.86,4.82-5.79.49-.59.93-.59,1.41,0,3.54,4.35,7.09,8.7,10.63,13.04.24.3.36.61.16.96-.16.29-.44.44-.76.35-.21-.06-.42-.22-.56-.38-3.31-4.05-6.62-8.11-9.92-12.16-.08-.1-.17-.2-.27-.33-.45.54-.88,1.05-1.31,1.56-1.79,2.15-3.58,4.3-5.37,6.45-.51.61-.92.6-1.44,0-.89-1.02-1.78-2.04-2.71-3.1-.14.16-.26.3-.38.45-1.95,2.37-3.9,4.74-5.86,7.11-.13.15-.29.31-.48.38-.32.12-.62.01-.82-.28-.21-.3-.18-.62.05-.9.59-.73,1.19-1.45,1.78-2.17,1.65-2.01,3.31-4.02,4.96-6.03.49-.59.91-.61,1.41-.04.91,1.03,1.82,2.07,2.75,3.14Z"/>
                        <path d="m34.56,8.39c0,1.9-1.53,3.45-3.43,3.47-1.89.01-3.46-1.54-3.47-3.43,0-1.92,1.55-3.49,3.46-3.49,1.9,0,3.44,1.55,3.45,3.45Zm-5.42,0c0,1.08.87,1.96,1.95,1.98,1.09.01,1.99-.88,1.99-1.98,0-1.08-.87-1.97-1.95-1.98-1.09-.01-1.99.89-1.99,1.98Z"/>
                    </svg>
                </a>
                <a class="primary-button bg-wood" href="{{ route('produtos.show', $product->id) }}">
                    <svg class="fill-gray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 31.82">
                        <path d="m60,16.26c-1.39,1.57-2.7,3.23-4.19,4.7-5.4,5.38-11.84,8.89-19.35,10.25-9.05,1.63-17.54-.03-25.4-4.82-4.2-2.56-7.73-5.87-10.73-9.75-.45-.58-.45-.89,0-1.46C4.8,9.4,10.34,5.02,17.19,2.39,22.35.4,27.7-.38,33.22.17c10.8,1.07,19.35,6.18,26.08,14.55.23.28.47.56.7.84,0,.23,0,.47,0,.7Zm-57.95-.35c14.71,19.18,41.93,18.52,55.9-.02-14.91-19.15-41.74-18.47-55.9.02Z"/>
                        <path d="m15.96,15.83c-.05-6.74,5.14-12.78,11.89-13.77,2.93-.43,5.71.02,8.36,1.29.59.28.81.72.59,1.21-.22.49-.7.67-1.28.4-1.5-.7-3.05-1.16-4.71-1.26-3.21-.2-6.07.69-8.54,2.72-3,2.46-4.55,5.69-4.53,9.56.02,5.8,3.94,10.57,9.64,11.92,6.71,1.58,13.7-3.17,14.71-9.98.55-3.71-.36-7-2.72-9.9-.07-.09-.15-.18-.22-.28-.31-.46-.25-.96.12-1.26.38-.3.92-.27,1.24.19.76,1.08,1.61,2.14,2.16,3.32,3.34,7.29.27,15.58-7.11,18.76-5.33,2.3-10.38,1.44-14.81-2.33-3.19-2.72-4.69-6.3-4.8-10.58Z"/>
                        <path d="m30.32,21.44c-2.75.26-5.52-2.03-5.83-4.72-.4-3.41,1.98-5.93,4.67-6.31,3.44-.48,5.96,1.98,6.34,4.68.48,3.41-2.12,6.24-5.18,6.35Zm3.48-5.68c-.13-2.14-1.88-3.77-3.92-3.66-2.17.12-3.81,1.9-3.67,3.97.15,2.15,1.9,3.76,3.95,3.63,2.15-.14,3.77-1.89,3.64-3.93Z"/>
                    </svg>
                </a>
                <a class="primary-button bg-secondary" href="{{ route('produtos.edit', $product->id) }}">
                    <svg class="fill-gray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48.5 48.5">
                        <path d="m26.31,3.62c-.19-.04-.43-.05-.68-.04-6.91,0-13.77,0-20.64,0-.22,0-.43,0-.65.02-1.93.1-3.59,1.4-4.15,3.25-.05.18-.1.36-.15.54l-.05.17v36.84c.02.06.05.13.06.21.48,2.44,2.25,3.9,4.74,3.9,10.58,0,21.15,0,31.73,0,.47,0,.9-.04,1.28-.13,2.15-.51,3.54-2.31,3.55-4.58.01-5.08,0-10.16,0-15.24v-2.29c0-.18-.02-.35-.06-.5-.11-.43-.48-.74-.93-.76-.46-.03-.87.25-.99.64-.06.2-.1.46-.1.77,0,4.53,0,9.06,0,13.59v3.4c0,.31,0,.53-.02.75-.1,1.16-1.01,2.09-2.16,2.23-.26.03-.51.03-.77.03H5.03c-.26,0-.52,0-.77-.04-1.1-.13-2-1.02-2.14-2.11-.04-.27-.04-.55-.04-.83v-16.38c0-6.14,0-12.28,0-18.42,0-.34,0-.75.11-1.16.3-1.15,1.31-1.84,2.68-1.84h20.84c.16,0,.31,0,.46-.01.48-.05.86-.47.88-.97.03-.48-.3-.94-.74-1.04Z"/>
                        <path d="m13.41,37.29c2.97-1,5.94-1.99,8.92-2.97.47-.15.85-.39,1.21-.75,5.33-5.33,10.66-10.67,15.99-16l6.79-6.79c.22-.22.44-.45.65-.68,1.2-1.34,1.73-3.14,1.45-4.96-.28-1.78-1.3-3.31-2.81-4.19-.51-.3-1.11-.49-1.74-.68-.27-.08-.54-.17-.81-.26h-1.17s-.24.05-.24.05c-1.46.18-2.71.88-4.09,2.26l-1.04,1.04c-6.55,6.58-13.31,13.38-20.04,20-1.57,1.55-2.5,3.05-3.02,4.87-.53,1.87-1.17,3.72-1.79,5.52-.28.82-.57,1.64-.84,2.47-.31.93.16,1.27.31,1.38.23.16.53.28,1.19.06l1.06-.36Zm.46-3.6c.17-.51.34-1.01.51-1.51.39-1.12.75-2.18,1.05-3.26.41-1.49,1.2-2.79,2.5-4.07,5.79-5.73,11.63-11.58,17.29-17.25l4.13-4.13c1.29-1.29,2.76-1.69,4.35-1.16,1.22.4,2.17,1.38,2.55,2.64.37,1.26.11,2.61-.69,3.61-.18.22-.37.44-.58.64-7.54,7.54-15.07,15.08-22.61,22.61-.19.19-.43.43-.78.55-1.77.6-3.55,1.19-5.38,1.8l-2.81.94.47-1.42Z"/>
                    </svg>
                </a>
                <form method="post" action="{{ route('produtos.destroy', $product->id) }}" class="p-6">                        
                    @csrf
                    @method('delete')
                    <button type="submit" class="primary-button bg-danger">                    
                        <svg class="fill-gray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.1 49.5">
                            <path d="m39.75,11.97c.45-1.04.46-2.2.04-3.19-.76-1.79-2.13-2.68-4.18-2.7-1.16-.01-2.32,0-3.48,0h-2.49s0-.71,0-.71c0-.27,0-.53,0-.78-.01-1.67-.63-2.93-1.83-3.73-.41-.27-.88-.44-1.39-.62-.22-.08-.44-.15-.65-.24h-11.45c-.06.03-.13.06-.2.07-1.95.33-3.39,1.85-3.59,3.79-.05.44-.06.88-.08,1.35,0,.21-.02.42-.03.63v.24s-.84,0-.84,0c-.41,0-.81,0-1.2,0-.45,0-.9,0-1.35,0h-.28c-.97,0-1.97,0-2.94.07-1.92.12-3.51,1.66-3.77,3.66-.25,1.87.9,3.76,2.68,4.41.45.16.62.41.62.89-.01,5.89-.01,11.77,0,17.65v2.21c0,.86,0,1.71,0,2.57,0,2-.02,4.08.02,6.11.07,3.35,2.59,5.85,5.88,5.85h.07c3.93-.04,7.92-.03,11.78-.02,2.17,0,4.33,0,6.5.01,1.19,0,2.39.01,3.58-.01,1.89-.03,3.41-.84,4.52-2.41.75-1.06,1.12-2.34,1.12-3.91v-7.26c0-6.88,0-13.77-.01-20.66,0-.48.12-.85.72-1.07.99-.37,1.81-1.18,2.25-2.21ZM12.53,3.36c.42-.96,1.21-1.5,2.21-1.5,3.46-.02,7.04-.03,10.65,0,1.25,0,2.25.93,2.38,2.19.04.4.03.79.02,1.2,0,.18,0,.37,0,.56v.25h-15.46v-.26c.01-.21,0-.42,0-.64-.02-.59-.04-1.2.22-1.8Zm22.42,39.78c0,1.53-.42,2.64-1.33,3.5-.71.66-1.57,1-2.56,1-3.97,0-7.95,0-11.92,0-3.35,0-6.7,0-10.05,0-1.98,0-3.52-1.36-3.83-3.37-.05-.33-.08-.67-.08-1.01,0-7.8,0-15.59,0-23.39v-5.35h29.78v28.62Zm1.2-30.53c-.25.03-.5.03-.76.03h-17.89c-.87,0-1.73,0-2.6,0-3.4,0-6.81,0-10.21,0-.33,0-.71,0-1.08-.09-1.04-.25-1.81-1.29-1.75-2.36.06-1.13.88-2.04,1.98-2.21.23-.04.48-.05.77-.05,10.3,0,20.6,0,30.89,0,1.58,0,2.59.82,2.71,2.18.11,1.27-.8,2.37-2.07,2.5Z"/>
                            <path d="m14.06,19.06c-.03-.54-.35-.89-.85-.92-.02,0-.05,0-.07,0-.24,0-.43.07-.58.21-.22.21-.33.57-.33,1.05,0,7.14,0,14.28,0,21.41,0,.2.01.35.04.48.1.49.48.79.94.78.47-.04.81-.39.85-.9.01-.12,0-.23,0-.35v-.12s0-10.58,0-10.58v-9.85s0-.35,0-.35c0-.29,0-.57,0-.86Z"/>
                            <path d="m19.14,40.75c0,.23,0,.44.05.62.09.41.45.7.86.7h.02c.41,0,.75-.29.85-.69.04-.19.06-.4.06-.67,0-7.07,0-14.15,0-21.22,0-.3-.02-.52-.07-.71-.07-.27-.26-.48-.52-.59-.11-.04-.22-.06-.33-.06-.17,0-.34.05-.49.14-.36.23-.44.58-.44,1.06,0,2.75,0,5.5,0,8.25v4.61c0,2.85,0,5.7,0,8.55Z"/>
                            <path d="m26.05,19.43v13.3s0,8.01,0,8.01c0,.51.11.9.33,1.11.15.14.35.22.6.21.61-.01.91-.45.91-1.31v-21.32c0-.5-.11-.88-.33-1.09-.15-.14-.35-.22-.59-.22h-.02c-.22,0-.9.01-.9,1.3Z"/>
                        </svg>                    
                    </button>
                </form>
            </div>    
        </x-card-image>
        @endforeach
    </div>
</x-app-layout>