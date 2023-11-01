<script>
    // Problemas referentes ao jQuery. Não foi possível utilizar document.ready ou window.on.load. jQuery não carrega a tempo.
    setTimeout(function(){
        $('#receitas').addClass('active').parents('li').addClass('active').children('ul').addClass('in');

        @if(isset($ingredientes_receita) && !$ingredientes_receita->isEmpty())
            @foreach($ingredientes_receita as $item)
                $('[for="ordem"]').parent().append('<input type="number" class="form-control mb-md-2" name="ordem[]" placeholder="Ordem" value="{{ $item->ordem }}">');
                $('[for="ingrediente"]').parent().append($('#ingredientes_option').clone());
                $('[for="ingrediente"]').parent().find('select:last').val({{ $item->ingrediente_id }});
            @endforeach

            $('[for="ordem"]').parent().find('input:first').remove();
            $('[for="ingrediente"]').parent().find('select:first').remove();
        @endif

    }, 400);

    function adicionarIngrediente() {
        $('[for="ordem"]').parent().append('<input type="number" class="form-control mb-md-2" name="ordem[]" placeholder="Ordem">');
        $('[for="ingrediente"]').parent().append($('#ingredientes_option').clone());
    }

    function removerIngrediente() {
        if ( $('[for="ingrediente"]').parent().find('select').length > 1 ) {
            $('[for="ordem"]').parent().find('input:last').remove();
            $('[for="ingrediente"]').parent().find('select:last').remove();
        }
        else
        {
            alert('Não é possível remover todos os ingredientes!');
        }
    }

    function deletarReceita(id) {
        let receita_id = id;
        $.ajax ({
            url: 'receitas/' + receita_id,
            type: 'delete',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(result)
            {
                window.location.reload(true);
            }
        });
    }
</script>