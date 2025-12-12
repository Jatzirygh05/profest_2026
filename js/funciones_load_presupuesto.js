
$(document).on('change', '#modalidad07', function(){
    $('#guardar_total_1234321').attr("disabled", false);
});

$("#Servidores_Publicos2").click(function(){
    var div="#totalcont2";
    var recurso="muestra_servidores2";
    $( div ).load( "catalogo_presupuesto.php?recurso="+recurso);
});

$(document).on('click', '#primero_presupuesto', function(){
    var valor= $("#primero_presupuesto_hidden").val();
    var div="#totalcont2";
    $(div).load( "catalogo_presupuesto.php?pag="+valor+"&recurso=presupuesto" );
});
$(document).on('click', '#anterior_presupuesto', function(){
    var valor= $("#anterior_presupuesto_hidden").val();
    var div="#totalcont2";
    $(div).load( "catalogo_presupuesto.php?pag="+valor+"&recurso=presupuesto" );
});
$(document).on('click', '#siguiente_presupuesto', function(){
    var valor= $("#siguiente_presupuesto_hidden").val();
    var div="#totalcont2";
    $(div).load( "catalogo_presupuesto.php?pag="+valor+"&recurso=presupuesto" );
});
$(document).on('click', '#ultimo_presupuesto', function(){
    var valor= $("#ultimo_presupuesto_hidden").val();
    var div="#totalcont2";
    $(div).load( "catalogo_presupuesto.php?pag="+valor+"&recurso=presupuesto" );
});
