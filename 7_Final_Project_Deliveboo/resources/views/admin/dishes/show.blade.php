@extends('layouts.app')

@section('content')

<div class="w-100" id="background-home-admin">
    <div class="w-100 h-100 my-opacity d-flex justify-content-center align-items-center">
        <div class="card col-10 col-sm-10 col-md-10 col-lg-8 my-bg-gradient border-0 rounded  bg-cambridge-blue">
            <div class="row g-0">
                <div class="col-6 d-none d-lg-inline p-3 shadow">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                        @if(strpos($dish->img_url, 'http') != false)
                        <img src="{{$dish->img_url}}" alt="{{$dish->name}}" class="w-75 h-75 rounded">
                        @else
                        <img src="/storage/{{$dish->img_url}}" alt="{{$dish->name}}" class="w-75 h-75 rounded">
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 d-flex justify-content-center align-items-center p-4">
                    <div class="card-body bg-white rounded shadow h-75 overflow-auto">
                        <h3 class="card-text text-center fw-bold abril-fatface-font">{{$dish->name}}</h3>
                        <p class="card-text text-secondary"> <span class="fw-bold fs-5 text-dark">Descrizione:</span>
                            {{$dish->description}}</p>
                        <p class="card-text text-secondary"> <span class="fw-bold fs-5 text-dark">ingredienti:</span>
                            {{$dish->ingredients}}</p>
                        <p class="card-text text-secondary"> <span class="fw-bold fs-5 text-dark">Prezzo:</span>:
                            {{$dish->price}} €</p>
                        <em class="card-text text-secondary"> <span class="fw-bold fs-5 text-dark">Creato il:</span>
                            {{$dish->created_at}}</em>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
