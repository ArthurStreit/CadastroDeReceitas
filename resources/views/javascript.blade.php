<script>
    // Problemas referentes ao jQuery. Não foi possível utilizar document.ready ou window.on.load. jQuery não carrega a tempo.
    setTimeout(function(){
        $('#home').addClass('active').parents('li').addClass('active').children('ul').addClass('in');
    }, 400);
</script>