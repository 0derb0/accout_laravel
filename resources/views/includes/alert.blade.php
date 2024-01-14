@if($alert = session()->pull('alert'))
    <div class="alert alert-success mb-0 rounded-0 text-center small py-2">
        {{ __($alert) }}
    </div>
@endif