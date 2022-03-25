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
                    <form class="shadow-sm" id="form-seach">
                        @csrf
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Pesquisar Game"
                                aria-label="Recipient's username"
                                aria-describedby="basic-addon2"
                                id="input-seach"
                            >
                            <button type="submit" class="input-group-text">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="mt-4 p-1">

                    <div class="d-flex justify-content-between flex-wrap">
                        @foreach($games as $game)
                            <div class="card shadow-sm border mb-3" style="width: 15rem;">
                                <img style="height: 20rem;" src="https://store-images.s-microsoft.com/image/apps.8896.13817077164703749.cd543429-7cae-4721-ab65-6ad0bd406b04.fe30a3c6-8907-42ea-88fa-5650c8a7abe6?q=90&w=177&h=265" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center fw-bold">{{ Str::limit($game->name, 15) }}</h5>
                                    <p class="font-monospace text-center">{{ Str::limit($game->company, 15) }}</p>
                                    <hr>
                                    <p class="card-text fw-light">{{ Str::limit($game->description, 100) }}</p>
                                    <hr>
                                    <div class="d-flex justify-content-between">
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
                            </div>
                        @endforeach
                    </div>

                    <!-- Paginate -->
                    <div class="col-md-12 mt-4">
                        {{ $games->links('vendor.pagination.bootstrap-5') }}
                    </div>
            </div>
        </div>
@endsection

@push('script')
     <script>
        $.ajax({
            url: '',
            method: '',
            data: {

            }
        })
     </script>
@endpush
