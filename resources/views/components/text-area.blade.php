@php($id = Str::uuid())

<div class="mb-3">
  <label for={{ $id }} class="form-label">{{ $slot }}</label>
  <textarea {{ 
    $attributes
      ->merge([ 
        'rows'=>'3', 
        'name'=>'',
        'value' => (old($attributes->get('name')) ?: ''),
      ]) 
  }} class="form-control" id={{ $id }}></textarea>
</div>