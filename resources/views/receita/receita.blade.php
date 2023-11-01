<tr>
    <td>{{ $receita->id }}</td>
    <td>{{ $receita->descricao }}</td>
    <td>{{ Carbon\Carbon::parse($receita->created_at)->format('d/m/Y H:i') }}</td>
    <td class="text-center">
        <a title="Visualizar receita" class="btn btn-success" href="{{ route('receitas.show',  $receita->id) }}" ><i class="fa fa-eye fa-fw"></i></a>
        <a title="Editar receita" class="btn btn-info" href="{{ route('receitas.edit',  $receita->id) }}" ><i class="fa fa-edit fa-fw"></i></a>
        <a title="Excluir receita" class="btn btn-danger" onclick="deletarReceita({{ $receita->id }})"><i class="fas fa-trash-alt"></i></a>
    </td>
</tr>