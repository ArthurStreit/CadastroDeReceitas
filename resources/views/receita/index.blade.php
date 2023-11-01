@extends('master')

@section('breadcrumb', 'Receitas')

@section('title', 'Receitas')

@section('content')
<div class="row mb-md-2">
    <div class="col-md-12">
        <div class="text-right">
            <a class="btn btn-primary" href="{{ route('receitas.create') }}"><i class="fas fa-plus"></i> Nova receita</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive no-padding">
            <div class="dataTables_wrapper no-footer">
                <table id="receita_table" class="table table-hover table-bordered table-datatable table-striped" role="grid">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @each('receita.receita', $receitas, 'receita')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@include('receita.javascript')