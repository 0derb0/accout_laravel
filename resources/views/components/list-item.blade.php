<li class="list-group-item">
  <a {{
    $attributes
      ->class([
        // 'link-underline',
        // 'link-underline-opacity-0'
        'nav-link'
      ])
      ->merge([
        'href' => '#'
      ])
  }} >{{$slot}}</a>
</li>