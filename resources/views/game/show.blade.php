@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-4">
            <div class="d-flex justify-content-center">

                <div class="card mb-3 shadow-sm border">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="{{ $game->url_img }}" class="img-fluid rounded-start" alt="Capa">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $game->name }}</h5>
                                <p class="card-text">{{ $game->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div>
                <a href="{{ route('games.index') }}" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-arrow-left-long"></i> Voltar
                </a>
            </div>
        </div>
    </div>
@endsection
