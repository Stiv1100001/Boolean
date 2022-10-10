@extends('layouts.app')

@section('content')
<div class="form-bg d-flex align-items-center"  id="my-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5">
                <div class="form-container rounded">
                    <h1 class="text-center fw-bold text-dark mb-5">Modifica il tuo piatto</h1>

                    <form id="create-dish" class="form-horizontal overflow-auto my-form" action="{{route('admin.dishes.update', $dish)}}" method="POST" id="form">
                        @csrf
                        @method('PUT')

                        <div class="alert alert-danger d-none" id="error">
                            <p id="error-message"></p>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><img src="/img/icons8-meal-50.png" alt=""></span>
                            <div>
                                <input placeholder="Nome del piatto" type="text" name="name" id="name" class="form-control" value="{{$dish->name}}">
                                @error('name')
                                <div class="alert mt-2 alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <span class="input-icon"><i class="fa-solid fa-book-open"></i></i></span>
                            <div>
                                <input placeholder="Descrizione del piatto" type="text" name="description" id="description" class="form-control" value="{{$dish->description}}">
                                @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><img src="/img/icons8-ingredients-64.png" alt=""></span> 
                            <div>
                                <input placeholder="Ingredienti del piatto" class="form-control" name="ingredients" id="ingredients"
                                rows="5"  value="{{$dish->ingredients}}">{{ old('ingredients') }}</textarea>
                                @error('ingredients')
                                <div class="alert mt-2 alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><i class="fa-solid fa-euro-sign"></i></span> 
                            <div>
                                <input placeholder="Prezzo del piatto" type="text" name="price" id="price" class="form-control" value="{{$dish->price}}">
                                @error('price')
                                <div class="alert mt-2 alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <div class="form-check form-switch d-flex justify-content-start">
                                <input class="form-check-input" type="checkbox" name="availability" id="availability" value="1" {{
                                    $dish->availability ? 'checked' : ''}}>
                                <label class="form-check-label ms-2" for="exampleRadios1">
                                    Disponibile
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-12 p-0">
                                <button type="" id="btn-submit-dish-create"class="btn signin">
                                    Modifica
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/validation.js') }}" defer></script>
@endsection
