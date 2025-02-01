@extends('layouts.app')

@section('content')

<div class="alert alert-warning text-center">
    <strong>Aviso:</strong> Su usuario está actualmente deshabilitado. Si considera que es un error o tiene pendiente una solicitud para ser proveedor, 
    <a href="{{ route('contact') }}" class="alert-link">póngase en contacto con nosotros</a>.
</div>

@endsection