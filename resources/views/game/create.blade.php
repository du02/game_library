@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm mt-3">
                    <div class="card-header">
                        <h3>Novo Game</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('games.store') }}" method="POST">
                            @csrf

                            <input
                                name="user_id"
                                type="hidden"
                                value="{{ Auth::id() }}">

                            <div class="">
                                <div class="form-floating mb-3 col">
                                    <input
                                        name="name"
                                        type="text"
                                        class="form-control"
                                        id="floatingInput"
                                        placeholder="Microsoft"
                                        value="{{ old('name') }}">
                                    <label for="floatingInput">Nome do Game</label>
                                </div>

                                <div class="form-floating mb-3 col">
                                    <input
                                        name="company"
                                        type="text"
                                        class="form-control"
                                        id="floatingEmpresa"
                                        placeholder="Empresa"
                                        value="{{ old('company') }}">
                                    <label for="floatingPassword">Nome da Empresa</label>
                                </div>

                                <div class="form-floating">
                                    <textarea
                                        name="description"
                                        class="form-control"
                                        id="floatingTextarea2" style="height: 100px">
                                        {{ old('description') }}
                                    </textarea>
                                    <label for="floatingTextarea2">Descrição</label>
                                </div>
                            </div>

                            <div class="col mt-4 d-flex justify-content-between">
                                <a href="{{ route('games.index') }}" class="btn btn-outline-secondary shadow-sm">Voltar</a>
                                <div>
                                    <a href="{{ route('games.index') }}" class="btn btn-outline-danger shadow-sm">Cancelar</a>
                                    <button type="submit" class="btn btn-outline-success shadow-sm">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
