<script>
    // Problemas referentes ao jQuery. Não foi possível utilizar document.ready ou window.on.load. jQuery não carrega a tempo.
    setTimeout(function(){
        $('#ingredientes').addClass('active').parents('li').addClass('active').children('ul').addClass('in');
    }, 400);

    function deletarIngrediente(id) {
        let ingrediente_id = id;

        $.ajax ({
            url: 'ingredientes/' + ingrediente_id,
            type: 'delete',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(result)
            {
                window.location.reload(true);
            },
            error: function(result) {
                alert('Erro!\nVerifique se este ingrediente não está sendo utilizado por nenhuma receita!');
            }
        });
    }
</script>