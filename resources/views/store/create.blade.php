<x-app-layout>
    <x-slot name="header">
        <h2>criar loja</h2>
        <x-secondary-button class="bg-secondary" :href="route('lojas.index')">voltar</x-secondary-button>
    </x-slot>
    <div class="flex-column list-content">
        <form class="form-block flex-column" method="POST" action="{{ route('lojas.store') }}">
            @csrf
            <!-- Nome -->
            <div class="flex-column input-block">
                <x-text-input id="name" type="text" name="name" placeholder="nome da loja"  :value="old('name')"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>
            <!-- Endereço -->
            <div class="flex-column input-block">
                <x-text-input id="address" type="text" name="address" placeholder="endereço"  :value="old('address')"  autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" />
            </div>
            <div class="flex-column input-block">
                <x-text-input id="phone" type="text" name="phone" placeholder="telefone"  :value="old('phone')"  autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" />
            </div>
            <!-- Latitude -->
            <div class="flex-column input-block">
                <x-text-input id="lat" type="text" name="lat" placeholder="latitude"  :value="old('lat')"  autofocus autocomplete="lat" />
                <x-input-error :messages="$errors->get('lat')" />
            </div>
            <!-- Longitude -->
            <div class="flex-column input-block">
                <x-text-input id="long" type="text" name="long" placeholder="longitude"  :value="old('long')"  autofocus autocomplete="long" />
                <x-input-error :messages="$errors->get('long')" />
            </div>
            <!-- Cidade -->
            <div class="flex-column input-block">
                <select name="city_id">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>                
                <x-input-error :messages="$errors->get('city_id')" />
            </div>

            <div class="flex-row flex-end">
                <x-primary-button class="bg-wood">cadastrar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>