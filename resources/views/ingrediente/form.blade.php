@extends('master')

@section('breadcrumb', 'Ingredientes')

@if ($ingrediente->exists)
    @section('title', 'Ingrediente')
@else
    @section('title', 'Novo ingrediente')
@endif

@section('content')

<div class="col-md-12">
    @if ($ingrediente->exists)
        <form class="mt-md-1" role="form" method="POST" action="{{ route('ingredientes.update', $ingrediente->id) }}">
        @method('PUT')
    @else
        <form class="mt-md-1" role="form" method="POST" action="{{ route('ingredientes.store') }}">
    @endif
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" value="{{ $ingrediente->descricao }}" placeholder="Descrição">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="peso">Peso (Kg)</label>
                    <input type="number" class="form-control" name="peso" value="{{ $ingrediente->peso }}" placeholder="Peso">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary block m-b">Salvar</button>
            </div>
        </div>
    </form>
</div>

@endsection

@include('ingrediente.javascript')