@extends('layouts.app')

@section('content')

<div class="container align-items-center justify-content-center">
    <div class="row justify-content-center">
        <div class="col-12 py-2 edit-messsage">
            @if(session('message'))
            <div class="alert alert-success">
                <p>{{session('message')}}</p>
            </div>
            @endif

            <div class="col-12 card text-center p-0 mb-5 rounded">
                <div class="card-header  p-0" id="background-menu-admin">
                    <div
                        class="w-100 h-100 my-opacity text-uppercase align-items-center d-flex justify-content-between p-3">
                        <h4 class="m-0 abril-fatface-font fw-bold text-white">Menu</h4>
                        <a href="{{route('admin.dishes.create')}}">
                            <button class="btn btn-outline-light text-uppercase rounded-pill">Aggiungi piatto</button>
                        </a>
                    </div>
                </div>
                <div class="card shadow-sm border-0">
                    <div class="card-body bg-cambridge-blue rounded-bottom">
                        <div class="row row-cols-1 row-cols-md-3 g-4 mb-2">
                            @forelse ($dishes as $dish)
                            <div class="col">
                                <div class="card shadow border border-3 border-dark bg-dark">

                                    <div class="card-body" id="my-card-menu">
                                        <a class="fw-bold text-decoration-none fs-1 text-center card-title abril-fatface-font text-black"
                                            href="{{route('admin.dishes.show', $dish)}}">{{$dish->name}}</a>
                                        <p class="card-text text-center mt-4">{{Str::limit($dish->description, 20,
                                            '...')}}
                                        </p>
                                        <p class="card-text  text-center">{{Str::limit($dish->ingredients, 20, '...')}}
                                        </p>
                                        <p class="card-text  text-center">{{$dish->price}}€</p>

                                        @if ($dish->availability)
                                        <span class="badge badge-pill bg-success">Disponibile</span>
                                        @else
                                        <span class="badge badge-pill bg-danger">Non disponibile</span>
                                        @endif
                                        <p class="card-text  text-center"><small
                                                class="text-muted">{{$dish->created_at}}</small>
                                        </p>
                                        <div class="buttons d-flex justify-content-center">
                                            <a class="me-3" href="{{route('admin.dishes.edit', $dish)}}">
                                                <button
                                                    class="btn btn-outline-dark text-uppercase rounded-pill">Modifica</button>
                                            </a>
                                            <form action="{{route('admin.dishes.destroy', $dish)}}" method="POST"
                                                class="delete" dish-model="{{$dish->id}}" dish-name="{{ $dish->name}}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-outline-dark text-uppercase rounded-pill">Elimina</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            @empty
                            <div class="col w-100">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <p>Non ci sono piatti da mostrare.</p>
                                </div>
                            </div>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let currentForm = null;

        document.querySelectorAll('.delete').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault()


        currentForm = form;
        Swal.fire({
            title: `Eliminare ${form.getAttribute('dish-name')}?`,
            text: 'Sei sicuro di voler continuare? Il piatto verrà eliminato definitivamente',
            icon: 'warning',
            confirmButtonText: 'Prosegui',
            showCancelButton: true,
            cancelButtonText: 'Annulla'
        }).then((result) => {


                    if (result.isConfirmed) {
                        currentForm.submit()
                    } else if (result.isCancelled) {
                        currentForm = null;
                        console.log(currentForm)
                    }
                })
            })
        })
    </script>
    @endsection
