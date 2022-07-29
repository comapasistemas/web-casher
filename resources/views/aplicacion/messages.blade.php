@if( session()->has('message') )
<div>
    <p>
        <em>{{ session('message') }}</em>
    </p>
</div>
@endif
