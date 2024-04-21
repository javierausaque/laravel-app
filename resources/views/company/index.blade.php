@extends('layouts.app')

@section('template_title')
    Empresas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Empresas
                            </span>

                            <div class="float-right">
                                <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm float-right"
                                   data-placement="left">
                                    {{ __('Crear nueva empresa') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center">
                                <thead class="thead">
                                <tr class=" ">
                                    <th class="">No</th>
                                    <th>Logo</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Página web</th>
                                    <th>Acciones</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td><img style="max-height: 30px" src="{{ "/storage/".$company->logo  }}"
                                                 alt="logo"/></td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->website }}</td>

                                        <td>
                                            <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('companies.show',$company->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('companies.edit',$company->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $companies->links() !!}
            </div>
        </div>
    </div>
@endsection
