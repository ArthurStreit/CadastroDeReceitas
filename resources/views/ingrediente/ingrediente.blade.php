<tr>
    <td>{{ $ingrediente->id }}</td>
    <td>{{ $ingrediente->descricao }}</td>
    <td>{{ $ingrediente->peso }}</td>
    <td>{{ Carbon\Carbon::parse($ingrediente->created_at)->format('d/m/Y H:i') }}</td>
    <td class="text-center">
        <a title="Editar ingrediente" class="btn btn-info" href="{{ route('ingredientes.edit',  $ingrediente->id) }}" ><i class="fa fa-edit fa-fw"></i></a>
        <a title="Excluir ingrediente" class="btn btn-danger" onclick="deletarIngrediente({{ $ingrediente->id }})"><i class="fas fa-trash-alt"></i></a>
    </td>
</tr>