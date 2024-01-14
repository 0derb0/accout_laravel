@props(['color' => 'primary'])

<button {{
  $attributes
    ->class([
      'btn', "btn-$color"
    ])
    ->merge([
      'type' => 'button',
      'data-bs-toggle' => 'modal',
      'data-bs-target' => '',
    ])
}}>
  {{ $slot }}
</button>