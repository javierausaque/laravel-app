@extends('layouts.app')

@section('template_title')
    {{ $employee->name ??  'Ver empleados' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">Datos Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Nombres:</strong>
                            {{ $employee->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Rol:</strong>
                            {{ $employee->rol }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Empresa:</strong>
                            {{ $employee->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
