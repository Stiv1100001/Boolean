@extends('layouts.app')

@section('content')
<div class="form-bg d-flex align-items-center"  id="my-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5">
                <div class="form-container rounded">
                    <h1 class="fw-bold text-white mb-4">Register</h1>

                    <form method="POST" action="{{ route('register') }}" class="form-horizontal my-form" enctype="multipart/form-data" id="form">
                        @csrf

                        <div class="alert alert-danger d-none" id="error">
                            <p id="error-message"></p>
                        </div>

                        <div class="form-group mb-1">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <div>
                                <input placeholder="Nome Ristorante*" id="name_restaurant" type="text"
                                    class="form-control @error('name_restaurant') is-invalid @enderror"
                                    name="name_restaurant" value="{{ old('name_restaurant') }}" required
                                    autocomplete="name_restaurant" autofocus>
                                @error('name_restaurant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                            <div>
                                <input placeholder="E-Mail*" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <div>
                                <input placeholder="Password*" id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <div>
                                <input placeholder="Conferma Password*" id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- Custom field --}}
                        <div class="form-group">
                            <span class="input-icon"><i class="fa-solid fa-location-dot"></i></span>
                            <div>
                                <input placeholder="Indirizzo*" id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="input-icon"><i class="fa-solid fa-briefcase"></i></span>
                            <div>
                                <input placeholder="Partita Iva*" id="vat_number" type="text"
                                    class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                                    value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus
                                    minlength="11" maxlength="11">

                                @error('vat_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input id="image_url" type="file"
                                    class="form-control p-1 border border-2 rounded h-auto" @error('image_url') is-invalid @enderror" name="image_url"
                                    value="{{ old('image_url') }}" required autofocus>

                                @error('image_url')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group my-4">
                            <span class="col-12 col-form-label text-md-right fw-bold">Seleziona Categorie*</span>
                            @error('types')
                            <span class="invalid-feedback" role="alert">
                                <strong>ALemno una categoria deve essere selezionata</strong>
                            </span>
                            @enderror
                            <div class="categorie col-12  ml-2 d-flex flex-wrap mt-4">

                                @foreach ($types as $type)
                                <div class="col-6 col-lg-4  text-start">
                                    <input class="custom-control-input @error('types') is-invalid @enderror"
                                        name="types[]" type="checkbox" value="{{$type->id}}" id="type-{{$type->id}}">
                                    <label class="custom-control-label" for="type-{{$type->id}}">
                                        {{$type->name_type}}
                                    </label>
                                    @if ($loop->last)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>At least one category has to be checked</strong>
                                    </span>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <button class="btn signin" id="btn-submit-register">
                                    {{ __('Registrati') }}
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
<script src="{{ asset('js/validation.js')}}"></script>
@endsection
