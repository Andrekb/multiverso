<x-app-layout>
    <x-slot name="header">
        <h2>editar loja: {{ $store->name }}</h2>
        <x-secondary-button class="bg-secondary" :href="route('lojas.index')">voltar</x-secondary-button>
    </x-slot>
    <div class="flex-column list-content">
        <form class="form-block flex-column" method="POST" action="{{ route('lojas.update', $store->id) }}">
            @csrf
            @method('put')
            <!-- Nome -->
            <div class="flex-column input-block">
                <x-text-input id="name" type="text" name="name" placeholder="nome da loja"  :value="$store->name"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>
            <!-- Endereço -->
            <div class="flex-column input-block">
                <x-text-input id="address" type="text" name="address" placeholder="endereço"  :value="$store->address"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('address')" />
            </div>
            <!-- Latitude -->
            <div class="flex-column input-block">
                <x-text-input id="lat" type="text" name="lat" placeholder="latitude"  :value="$store->lat"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('lat')" />
            </div>
            <!-- Longitude -->
            <div class="flex-column input-block">
                <x-text-input id="long" type="text" name="long" placeholder="longitude"  :value="$store->long"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('long')" />
            </div>
            <!-- Cidade -->
            <div class="flex-column input-block">
                <select name="city_id">
                    @foreach($cities as $city)
                        <option {{ ($store->city_id == $city->id) ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>                
                <x-input-error :messages="$errors->get('city_id')" />
            </div>

            <div class="flex-row flex-end">
                <x-primary-button class="bg-wood">alterar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>