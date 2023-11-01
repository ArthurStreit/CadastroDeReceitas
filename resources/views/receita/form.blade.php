@extends('master')

@section('breadcrumb', 'Receitas')

@if ($receita->exists)
    @section('title', 'Receita')
@else
    @section('title', 'Nova receita')
@endif

@section('content')

<div class="col-md-12">
    @if ($receita->exists)
        <form class="mt-md-1" role="form" method="POST" action="{{ route('receitas.update', $receita->id) }}">
        @method('PUT')
    @else
        <form class="mt-md-1" role="form" method="POST" action="{{ route('receitas.store') }}">
    @endif
        @csrf
        @if($errors->any())
            <h4 style="color: red">{{$errors->first()}}</h4>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" value="{{ $receita->descricao }}" placeholder="Descrição">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="ordem">Ordem</label>
                        <input type="number" class="form-control mb-md-2" name="ordem[]" placeholder="Ordem">
                    </div>
                    <div class="col-sm-8">
                        <label for="ingrediente">Ingrediente</label>
                        <select class="select form-control mb-md-2" name="ingrediente[]" id="ingredientes_option">
                            @foreach ($ingredientes as $ingrediente)
                                <option value="{{ $ingrediente->id }}">{{ $ingrediente->descricao }} - {{ $ingrediente->peso }}(Kg)</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-md-2">
            <div class="col-sm-6">
                <button type="button" class="btn btn-success block m-b" onclick="adicionarIngrediente(this)"><i class="fas fa-plus"></i> Adicionar ingrediente</button>
            </div>
            <div class="col-sm-6 text-right">
                <button type="button" class="btn btn-danger block m-b" onclick="removerIngrediente(this)"><i class="fas fa-minus"></i> Remover último ingrediente</button>
            </div>
        </div>

        <div class="row mt-md-4">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary block m-b">Salvar</button>
            </div>
        </div>
    </form>
</div>

@endsection

@include('receita.javascript')