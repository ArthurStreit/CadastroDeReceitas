@extends('master')

@section('breadcrumb', 'Receitas')

@section('title', 'Receita')

@section('content')

<div class="col-md-12">
    <table id="receita_table" class="table table-bordered table-datatable" role="grid">
        <thead>
            <tr>
                <th colspan="2">Código: {{ $receita->id }}</th>
                <th colspan="2">Receita: {{ $receita->descricao }}</th>
            </tr>
            <tr>
                <th colspan="4">Ingredientes</th>
            </tr>
            <tr>
                <th>Ordem</th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Previsto em Kg</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredientes_receita as $ingrediente)
                <tr>
                    <td>{{ $ingrediente->ordem }}</td>
                    <td>{{ $ingrediente->ingrediente_id }}</td>
                    <td>{{ $ingrediente->descricao }}</td>
                    <td>{{ $ingrediente->peso }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

<style>
    .table-bordered {
        border: 2px solid #777777 !important;
    }
    .table thead th {
        border-bottom: 2px solid #777777 !important;
    }
    .table-bordered td, .table-bordered th {
        border: 2px solid #777777 !important;
    }
</style>
@include('receita.javascript')