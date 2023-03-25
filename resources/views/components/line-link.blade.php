<div {{ $attributes->merge(['class' => 'line flex-row']) }}>
    <h2>{{ $name }}</h2>
    {{ $slot }}
</div>