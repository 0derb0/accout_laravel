<div {{ $attributes->class([
  'mb-3'
]) }}>
  @isset($header)
    <b>{{ $header }}</b><br>  
  @endisset

  <div class="d-flex justify-content-between">
    {{ $slot }}

    @isset($right)
      {{ $right }}
    @endisset
  </div>
</div>