<div {{ $attributes->merge(['class' => 'card-stock']) }}>
  {{ $image }}
  <div class="card-body">
    <h2>{{ $itemName }} - <span> {{ $itemValue }}</span></h2>
    {{ $slot }}
  </div>
</div>