<div class="card-body">
  <div class="d-flex justify-content-between">
    <h4 class="m-0">{{ $slot }}</h4>

    @isset($right)
        <div>
          {{ $right }}
        </div>
    @endisset
  </div>
</div>