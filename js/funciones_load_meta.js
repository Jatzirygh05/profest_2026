
$(document).on('change', '#modalidad07', function(){
    $('#guardar_total_1234321').attr("disabled", false);
});

$("#Servidores_Publicos").click(function(){
    var div="#totalcont3";
    var recurso="muestra_servidores";
    $( div ).load( "catalogo_metas_numericas.php?recurso="+recurso);
});

$(document).on('click', '#primero_metas', function(){
    var valor= $("#primero_metas_hidden").val();
    var div="#totalcont3";
    $(div).load( "catalogo_metas_numericas.php?pag="+valor+"&recurso=metas" );
});
$(document).on('click', '#anterior_metas', function(){
    var valor= $("#anterior_metas_hidden").val();
    var div="#totalcont3";
    $(div).load( "catalogo_metas_numericas.php?pag="+valor+"&recurso=metas" );
});
$(document).on('click', '#siguiente_metas', function(){
    var valor= $("#siguiente_metas_hidden").val();
    var div="#totalcont3";
    $(div).load( "catalogo_metas_numericas.php?pag="+valor+"&recurso=metas" );
});
$(document).on('click', '#ultimo_metas', function(){
    var valor= $("#ultimo_metas_hidden").val();
    var div="#totalcont3";
    $(div).load( "catalogo_metas_numericas.php?pag="+valor+"&recurso=metas" );
});
