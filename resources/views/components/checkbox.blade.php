@php($id = Str::uuid())

<div class="mb-3 form-check">
  <input type="checkbox" {{ $attributes->merge([ 'name'=>'' ])}} id={{ $id }} value="1" class="form-check-input">
  <label for={{ $id }} class="form-check-label" >{{ $slot }}</label>
</div>