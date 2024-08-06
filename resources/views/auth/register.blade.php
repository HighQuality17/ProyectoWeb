@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico:') }}</label>

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
                            <label for="idcard" class="col-md-4 col-form-label text-md-end">{{ __('Cedula:') }}</label>

                            <div class="col-md-6">
                                <input id="idcard" type="number" class="form-control @error('idcard') is-invalid @enderror" name="idcard" value="{{ old('idcard') }}" required autocomplete="idcard">

                                @error('idcard')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Telefono:') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <br>

                        <div class="row mb-3">
                            <label class="col-md-10 col-form-label text-md-end">Ahora necesitamos tu dirección exacta para poder enviar todos tus pedidos!:</label>
                        </div>

                        <div class="row mb-3">
                            <label for="inputDepartment" class="col-md-4 col-form-label text-md-end">{{ __('Departamento:') }}</label>

                            <div class="col-md-6">
                                <input id="inputDepartment" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputCity" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad:') }}</label>

                            <div class="col-md-6">
                                <input id="inputCity" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNeighborhood" class="col-md-4 col-form-label text-md-end">{{ __('Barrio:') }}</label>

                            <div class="col-md-6">
                                <input id="inputNeighborhood" type="text" class="form-control @error('neighborhood') is-invalid @enderror" name="neighborhood" value="{{ old('neighborhood') }}" required autocomplete="neighborhood" autofocus>

                                @error('neighborhood')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAddress1" class="col-md-4 col-form-label text-md-end">{{ __('Dirección 1:') }}</label>

                            <div class="col-md-6">
                                <input id="inputAddress1" type="text" class="form-control @error('address') is-invalid @enderror" name="address_line1" value="{{ old('address_line1') }}" required autocomplete="address_line1" autofocus>

                                @error('address_line1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputAddress2" class="col-md-4 col-form-label text-md-end">{{ __('Dirección 2:') }}</label>

                            <div class="col-md-6">
                                <input id="inputAddress2" type="text" class="form-control @error('address_line2') is-invalid @enderror" name="address_line2" value="{{ old('address_line2') }}" required autocomplete="address_line2" autofocus placeholder="Opcional">

                                @error('address_line2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrate!') }}
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
@endsection
