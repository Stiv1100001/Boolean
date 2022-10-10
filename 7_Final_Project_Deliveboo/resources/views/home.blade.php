@extends('layouts.app')

@section('content')
<div class="w-100" id="background-home-admin">
    <div class="h-100 my-opacity d-flex justify-content-center align-items-center">
        <div class="container abril-fatface-font">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1 class="fw-bold welcome text-white mb-5">Benvenuto, il tuo ristorante {{
                        Auth::user()->name_restaurant }} è
                        stato registrato
                    </h1>
                </div>
                <div class="col-9 d-flex justify-content-center">
                    <a class="text-decoration-none btn btn-outline-light text-uppercase rounded-pill menu"
                        href="{{ route('admin.dishes.index') }}">
                        Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
