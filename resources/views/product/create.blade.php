<x-app-layout>
    <x-slot name="header">
        <h2>criar produto</h2>
        <x-secondary-button class="bg-secondary" :href="route('produtos.index')">voltar</x-secondary-button>
    </x-slot>
    <div class="flex-column list-content">
        <form class="form-block flex-column" method="POST" action="{{ route('produtos.store') }}">
            @csrf
            <!-- Nome -->
            <div class="flex-column input-block">
                <x-text-input id="name" type="text" name="name" placeholder="nome do produto"  :value="old('name')"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>
            <!-- Descrição -->
            <div class="flex-column input-block">
                <x-text-textarea id="description" type="text" name="description" rows="5" placeholder="descrição" autofocus autocomplete="name">
                    {{ old('description')}}    
                </x-text-textarea>
                <x-input-error :messages="$errors->get('description')" />
            </div>
            <!-- Texto de chamada -->
            <div class="flex-column input-block">
                <x-text-input id="headline" type="text" name="headline" placeholder="chamada"  :value="old('headline')"  autofocus autocomplete="headline" />
                <x-input-error :messages="$errors->get('headline')" />
            </div>
            <!-- Preço -->
            <div class="flex-column input-block">
                <x-text-input id="price" type="text" name="price" placeholder="valor"  :value="old('price')"  autofocus autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" />
            </div>
            <!-- Peso -->
            <div class="flex-column input-block">
                <x-text-input id="weight" type="text" name="weight" placeholder="peso"  :value="old('weight')"  autofocus autocomplete="weight" />
                <x-input-error :messages="$errors->get('weight')" />
            </div>
            <!-- Altura -->
            <div class="flex-column input-block">
                <x-text-input id="height" type="text" name="height" placeholder="altura"  :value="old('height')"  autofocus autocomplete="height" />
                <x-input-error :messages="$errors->get('height')" />
            </div>
            <!-- Largua -->
            <div class="flex-column input-block">
                <x-text-input id="width" type="text" name="width" placeholder="largura"  :value="old('width')"  autofocus autocomplete="width" />
                <x-input-error :messages="$errors->get('width')" />
            </div>
            <!-- Comprimento -->
            <div class="flex-column input-block">
                <x-text-input id="lenght" type="text" name="lenght" placeholder="comprimento"  :value="old('lenght')"  autofocus autocomplete="lenght" />
                <x-input-error :messages="$errors->get('lenght')" />
            </div>
            <div class="flex-row flex-end">
                <x-primary-button class="bg-wood">cadastrar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>