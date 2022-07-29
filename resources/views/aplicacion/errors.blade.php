@if( $errors->any() )
<div>
    <p>Revisa los siguiente:</p>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
