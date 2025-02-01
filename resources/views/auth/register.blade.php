@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <!-- Mostrar errores de validación -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Selección de rol -->
                        <div class="text-center mb-4">
                            <button type="button" id="btn-cli" class="btn btn-primary" onclick="seleccionarRol('cliente')">Registrarse como Cliente</button>
                            <button type="button" id="btn-prov" class="btn btn-secondary" onclick="seleccionarRol('proveedor')">Registrarse como Proveedor</button>
                        </div>

                        <!-- Campo oculto para almacenar el rol seleccionado -->
                        <input type="hidden" name="rol" id="rolSeleccionado" value="cliente">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end" id="labelNombre">{{ __('Nombre:') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico:') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="idcard" class="col-md-4 col-form-label text-md-end" id="labelDocumento">{{ __('Cédula:') }}</label>
                            <div class="col-md-6">
                                <input id="idcard" type="text" class="form-control @error('idcard') is-invalid @enderror" name="idcard" value="{{ old('idcard') }}" required autocomplete="idcard">
                                @error('idcard')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono:') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña:') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña:') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-success">
                                    {{ __('¡Regístrate!') }}
                                </button>
                            </div>
                        </div>

                        <p class="col-md-8 offset-md-5">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function seleccionarRol(rol) {
        document.getElementById('rolSeleccionado').value = rol;

        if (rol === 'proveedor') {
            document.getElementById('btn-cli').className="btn btn-secondary";
            document.getElementById('btn-prov').className="btn btn-primary";

            document.getElementById('labelNombre').innerText = 'Nombre de Empresa:';
            document.getElementById('labelDocumento').innerText = 'NIT / RUT:';
        } else {
            document.getElementById('btn-prov').className="btn btn-secondary";
            document.getElementById('btn-cli').className="btn btn-primary";

            document.getElementById('labelNombre').innerText = 'Nombre:';
            document.getElementById('labelDocumento').innerText = 'Cédula:';
        }
    }
</script>
@endsection
