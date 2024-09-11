@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header text-white bg-dark text-center">
                    <h3>{{ __('Gestionar Dirección') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('addresses.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-10 col-form-label text-md-end">Ahora necesitamos tu dirección exacta para poder enviar todos tus pedidos!:</label>
                        </div>

                        <div class="row mb-4">
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

                        <div class="row mb-4">
                            <label for="inputCity" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad:') }}</label>
                            <div class="col-md-6">
                                <input id="inputCity" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="inputNeighborhood" class="col-md-4 col-form-label text-md-end">{{ __('Barrio:') }}</label>
                            <div class="col-md-6">
                                <input id="inputNeighborhood" type="text" class="form-control @error('neighborhood') is-invalid @enderror" name="neighborhood" value="{{ old('neighborhood') }}" required autocomplete="neighborhood">
                                @error('neighborhood')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="inputAddress1" class="col-md-4 col-form-label text-md-end">{{ __('Dirección 1:') }}</label>
                            <div class="col-md-6">
                                <input id="inputAddress1" type="text" class="form-control @error('address_line1') is-invalid @enderror" name="address_line1" value="{{ old('address_line1') }}" required autocomplete="address_line1">
                                @error('address_line1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="inputAddress2" class="col-md-4 col-form-label text-md-end">{{ __('Dirección 2:') }}</label>
                            <div class="col-md-6">
                                <input id="inputAddress2" type="text" class="form-control @error('address_line2') is-invalid @enderror" name="address_line2" value="{{ old('address_line2') }}" autocomplete="address_line2" placeholder="Opcional">
                                @error('address_line2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-4 text-center">
                                <button type="submit" class="btn btn-success w-100">{{ __('Guardar Dirección') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
