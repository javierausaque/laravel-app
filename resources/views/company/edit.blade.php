@extends('layouts.app')

@section('template_title')
    Editar Empresa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar datos de Empresa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('companies.update', $company->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('company.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
