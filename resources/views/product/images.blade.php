<x-app-layout>
    <x-slot name="header">
        <h2>Adicionar imagens ao produto: {{ $product->name }}</h2>
        <x-secondary-button class="bg-secondary" :href="route('produtos.index')">voltar</x-secondary-button>
    </x-slot>
    <div class="flex-column list-content">  
        @if (session('status') === 'product-created')
            <p class="success">Produto cadastrado com sucesso, adicione as imagens</p>
        @endif
        <form action="{{ route('produtos.imagesStore') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div>
                <h3>Faça o upload de multiplas imagens ao clicar na caixa</h3>
            </div>
        </form>
        <div class="flex-row flex-end">
            <x-secondary-button class="bg-secondary" :href="route('produtos.index')">voltar</x-secondary-button>
        </div>
    </div>
<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize         :       1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
</script>
</x-app-layout>