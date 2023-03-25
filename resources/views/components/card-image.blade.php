<div {{ $attributes->merge(['class' => 'card-image']) }}>
  {{ $image }}
  <div class="card-body">
    <h2>{{ $itemName }} <span>R$ {{ $itemValue }}</span></h2>
    {{ $slot }}
  </div>
</div>