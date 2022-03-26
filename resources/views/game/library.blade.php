@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">

            <div class="position-relative">
                @if (session('status'))
                    <div
                        class="alert alert-success alert-dismissible fade show position-absolute bottom-0 end-0 shadow"
                        role="alert">
                        <i class="fa-solid fa-check"></i>
                        {{ session('status') }}
                        <button type="button" class="btn-close col-md-3" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('error'))
                    <div
                        class="alert alert-danger alert-dismissible fade show position-absolute bottom-0 end-0 shadow"
                        role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-md-12 mt-4 d-flex justify-content-between">
                <div class="col">
                    <a href="{{ route('games.create') }}" class="btn btn-outline-success shadow-sm">Adicionar</a>
                </div>

                <!-- Seach -->
                <div class="col-md-3">
                    <form class="shadow-sm" id="form-search">
                        @csrf
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Pesquisar Game"
                                aria-label="Recipient's username"
                                aria-describedby="basic-addon2"
                                id="input-search"
                            >
                            <button type="submit" class="input-group-text">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="mt-4 p-1">

                    <div class="d-flex justify-content-between flex-wrap" id="search-card">
                        @foreach($games as $game)
                            <div class="card shadow-sm border mb-3" style="width: 15rem;">
                                <img style="height: 20rem;" src="{{ $game->url_img }}" class="card-img-top" alt="Capa">
                                <div class="card-body">
                                    <h5 class="card-title text-center fw-bold">{{ Str::limit($game->name, 15) }}</h5>
                                    <p class="font-monospace text-center">{{ Str::limit($game->company, 15) }}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="{{ route('games.show', $game->id) }}" class="btn btn-outline-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('games.destroy', $game->id) }}" class="btn btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Paginate -->
                    <div class="col-md-12 mt-2">
                        {{ $games->links('vendor.pagination.bootstrap-5') }}
                    </div>

            </div>
        </div>
@endsection

@section('script-search')
            <script>
                $('#form-search').submit(function (e) {
                    e.preventDefault();

                    let search = $('#input-search').val();

                    $.ajax({
                        url: '{{ route('games.search') }}',
                        type: 'get',
                        data: { search: search },
                        dataType: 'json',
                        success: function (response) {

                            let id = response[0].id;
                            let routeShow = 'http://127.0.0.1:8000/games/' + id;
                            let routeEdit = 'http://127.0.0.1:8000/games/' + id + '/edit';
                            let routeDelete = 'http://127.0.0.1:8000/games/' + id + '/remove';

                            $('#search-card').html(
                                '<div class="card shadow-sm border mb-3" style="width: 15rem;">' +
                                    '<img style="height: 20rem;" src="'+ response[0].url_img +'" class="card-img-top" alt="Capa">' +
                                    '<div class="card-body">' +
                                        '<h5 class="card-title text-center fw-bold">' + response[0].name + '</h5>' +
                                        '<p class="font-monospace text-center">' + response[0].company + '</p>' +
                                    '</div>' +
                                    '<div class="card-footer d-flex justify-content-between">' +
                                        '<a href="' + routeShow + '" class="btn btn-outline-info">' +
                                            '<i class="fa-solid fa-eye"></i>' +
                                        '</a>' +
                                        '<a href="' + routeEdit + '" class="btn btn-outline-warning">' +
                                            '<i class="fa-solid fa-pen-to-square"></i>' +
                                        '</a>' +
                                        '<a href="' + routeDelete + '" class="btn btn-outline-danger">' +
                                            '<i class="fa-solid fa-trash"></i>' +
                                        '</a>' +
                                    '</div>' +
                                '</div>'
                            );
                        }
                    });
                });
            </script>
@endsection
