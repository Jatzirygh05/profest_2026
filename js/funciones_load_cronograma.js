$(document).on('change', '#modalidad07', function(){
    $('#guardar_total_1234321').attr("disabled", false);
});
$(document).on('click', '#primero_cronograma', function(){
    var valor= $("#primero_cronograma_hidden").val();
    var div="#totalcont4";
    $(div).load( "catalogo_cronograma.php?pag="+valor+"&recurso=cronograma" );
});
$(document).on('click', '#anterior_cronograma', function(){
    var valor= $("#anterior_cronograma_hidden").val();
    var div="#totalcont4";
    $(div).load( "catalogo_cronograma.php?pag="+valor+"&recurso=cronograma" );
});
$(document).on('click', '#siguiente_cronograma', function(){
    var valor= $("#siguiente_cronograma_hidden").val();
    var div="#totalcont4";
    $(div).load( "catalogo_cronograma.php?pag="+valor+"&recurso=cronograma" );
});
$(document).on('click', '#ultimo_cronograma', function(){
    var valor= $("#ultimo_cronograma_hidden").val();
    var div="#totalcont4";
    $(div).load( "catalogo_cronograma.php?pag="+valor+"&recurso=cronograma" );
});
