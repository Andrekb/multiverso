<a {{ $attributes->merge(['class' => 'card']) }}>
  <div class="card-header">{{ $header }}</div>
  <div class="card-body">
    <strong>{{ $itemsCount }}</strong>
    <p>{{ $items }}</p>
  </div>
</a>