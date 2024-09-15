@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Generación de Reportes</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selecciona el reporte a generar') }}</div>

                <div class="card-body">
                    <form action="{{ route('reports.generate') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="report_type" class="form-label">{{ __('Tipo de Reporte') }}</label>
                            <select id="report_type" name="report_type" class="form-select" required>
                                <option value="" disabled selected>-- Selecciona un reporte --</option>
                                <option value="sales">{{ __('Reporte de Ventas') }}</option>
                                <option value="returns">{{ __('Reporte de Devoluciones') }}</option>
                                <option value="reviews">{{ __('Reporte de Reseñas') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date_from" class="form-label">{{ __('Desde') }}</label>
                            <input type="date" id="date_from" name="date_from" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_to" class="form-label">{{ __('Hasta') }}</label>
                            <input type="date" id="date_to" name="date_to" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Generar Reporte') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
