@extends('layouts.app')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1 class="home"><span class='one'>R</span><span class='two'>O</span><span
                                class='three'>LE</span>
                            <span class='five'>US</span><span class='six'>ER</span></h1>

                </div>
            </div>
        </div>
    </div>
@endsection
