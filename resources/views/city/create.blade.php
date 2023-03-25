<x-app-layout>
    <x-slot name="header">
        <h2>criar cidade</h2>
        <x-secondary-button class="bg-secondary" :href="route('cidades.index')">voltar</x-secondary-button>
    </x-slot>
    <div class="flex-column list-content">
        <form class="form-block flex-column" method="POST" action="{{ route('cidades.store') }}">
            @csrf
            <!-- Nome -->
            <div class="flex-column input-block">
                <x-text-input id="name" type="text" name="name" placeholder="nome da cidade"  :value="old('name')"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>
            <!-- Estado -->
            <div class="flex-column input-block">
                <x-text-input id="uf" type="text" name="uf" placeholder="estado"  :value="old('uf')"  autofocus autocomplete="uf" />
                <x-input-error :messages="$errors->get('uf')" />
            </div>
            <!-- CEP -->
            <div class="flex-column input-block">
                <x-text-input id="cep" type="text" name="cep" placeholder="CEP"  :value="old('cep')"  autofocus autocomplete="cep" />
                <x-input-error :messages="$errors->get('cep')" />
            </div>
            <!-- Responsável -->
            <div class="flex-column input-block">
                <x-text-input id="manager" type="text" name="manager" placeholder="responsável"  :value="old('manager')"  autofocus autocomplete="manager" />
                <x-input-error :messages="$errors->get('manager')" />
            </div>
            <!-- Região -->
            <div class="flex-column input-block">
                <select name="region">
                    <option value="Norte">norte</option>
                    <option value="Nordeste">nordeste</option>
                    <option value="Centro-Oeste">centro-oeste</option>
                    <option value="Sudeste">sudeste</option>
                    <option value="Sul">sul</option>
                </select>                
                <x-input-error :messages="$errors->get('region')" />
            </div>
            <div class="flex-row flex-end">
                <x-primary-button class="bg-wood">cadastrar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>