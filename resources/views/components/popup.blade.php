<div class="modal fade" {{ $attributes->merge(['id' => '']) }} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $slot }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        @isset($body)
            {{ $body }}
        @endisset

      </div>
      <div class="modal-footer">

        @isset($buttons)
            {{ $buttons }}
        @endisset

        
      </div>
    </div>
  </div>
</div>