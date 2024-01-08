@php($id = Str::uuid())

<div class="mb-3">
  <label for={{ $id }} class="form-label">{{ $slot }}</label>
  <input {{ 
    $attributes
      ->merge([ 
        'type'=>'text', 
        'name'=>'',
        'value' => (old($attributes->get('name')) ?: ''),
      ]) 
  }} class="form-control" id={{ $id }}>
</div>