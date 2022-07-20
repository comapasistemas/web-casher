@if( session()->has('message') )
    <p>
        <em>{{ session('message') }}</em>
    </p>
@endif
