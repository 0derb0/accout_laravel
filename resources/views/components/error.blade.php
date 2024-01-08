@props(['name' => ''])

@error($name)
    <div class="text-danger mb-3">{{ $message }}</div>
@enderror