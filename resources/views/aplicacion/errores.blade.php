@if( $errors->any() )
<p>Revisa los siguientes campos:</p>
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
