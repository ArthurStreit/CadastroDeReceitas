@extends('master')

@section('breadcrumb', 'Ingredientes')

@section('title', 'Ingredientes')

@section('content')
<div class="row mb-md-2">
    <div class="col-md-12">
        <div class="text-right">
            <a class="btn btn-primary" href="{{ route('ingredientes.create') }}"><i class="fas fa-plus"></i> Novo ingrediente</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive no-padding">
            <div class="dataTables_wrapper no-footer">
                <table id="ingrediente_table" class="table table-hover table-bordered table-datatable table-striped" role="grid">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Previsto em Kg</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @each('ingrediente.ingrediente', $ingredientes, 'ingrediente')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@include('ingrediente.javascript')