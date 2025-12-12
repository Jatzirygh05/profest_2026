$("#cursonuevo_01").click(function(){
    var div="#totalcont";
    $( div ).load( "../cursos/registra_Curso.php" );
});
$("#Ragistra_cursonuevo_02").click(function(){
    var div="#totalcont";
    $( div ).load( "../cursos/registra_Curso_previo.php" );
});

$(document).on('change', '#modalidad07', function(){
    $('#guardar_total_1234321').attr("disabled", false);
});
$("#valida_cursoAdmin").click(function(){
    var div="#totalcont";
    $( div ).load( "../cursos/registra_Curso.php" );
});
$("#Ragistra_cursonuevo_Admin").click(function(){
    var div="#totalcont";
    $( div ).load( "../cursos/registra_Curso_previo.php" );
});
$("#valida_curso_servidores_Public").click(function(){
    var div="#totalcont";
    $( div ).load( "../cursos/cursos_servidores/principal_cursos_servidores.php" );
});
$("#Reportes_deCurso_Servidor_p").click(function(){
    var div="#totalcont";
    $( div ).load( "../cursos/Reporte/Carga_registros_user_servidor.php" );
});
$("#Servidores_Publicos").click(function(){
    var div="#totalcont";
    var recurso="muestra_servidores";
    $( div ).load( "catalogo_lugares.php?recurso="+recurso);
});
$(document).on('click', '#buscar_usuario_info', function(){
    var curp= $("#curp_buscar_usuario").val();
    var div="#totalcont";
    var recurso="muestra_servidores";
    if(curp=="" || curp==undefined){
        $("#texto").html("<strong>¡Error!</strong> proporcione el CURP a buscar. Por favor verifica.");
        //$("#divError").css("display", "block");
        $("#divError").show();
        var scrollPos =  $("#contenedor_divError").offset().top;
        $(window).scrollTop(scrollPos);
        return 0;
    }
    else{
        $(div).load( "catalogo_lugares.php?AC_busca_CURP="+curp+"&recurso=usuarios");
    }
});

$("#reportE_serV_p_3xe1").click(function(){
    var div="#totalcont";
    $( div ).load( "../cursos/admin/Reporte/Servidores_pub_anio.php" );
});
$("#Periodo_registro").click(function(){
    var div="#totalcont";
    $( div ).load( "../Periodos/Periodo_Registro.php" );
});
$(document).on('click', '#primero', function(){
    var valor= $("#primero_hidden").val();
    var div="#totalcont";
    $(div).load( "catalogo_lugares.php?pag="+valor+"&recurso=usuarios" );
});
$(document).on('click', '#anterior', function(){
    var valor= $("#anterior_hidden").val();
    var div="#totalcont";
    $(div).load( "catalogo_lugares.php?pag="+valor+"&recurso=usuarios" );
});
$(document).on('click', '#siguiente', function(){
    var valor= $("#siguiente_hidden").val();
    var div="#totalcont";
    $(div).load( "catalogo_lugares.php?pag="+valor+"&recurso=usuarios" );
});
$(document).on('click', '#ultimo', function(){
    var valor= $("#ultimo_hidden").val();
    var div="#totalcont";
    $(div).load( "catalogo_lugares.php?pag="+valor+"&recurso=usuarios" );
});

/////////////////
$(document).on('click', '#cAT_UA_123', function(){
    var div="#totalcont";
    $( div ).load( "../catalogos/UA/cat_UA.php" );
});
/////////////////
/////////////////
$(document).on('click', '#valida_CEDULA_Clave', function(){
    var div="#totalcont";
    $( div ).load( "../autenticidad/cap_reg_hrs_anuales_cap.php" );
});
/////////////////

//$('#op_doc_prepara').change(function()
//    {    }); cmbio en algo
//keydown()cuando se presiono tecla
//keypress() cuandpo presiono tecla
//$(document).ready(function(){
//	$("#escribe").keydown(function(event){
//		$("#parrafo").text("El código de la tecla " + String.fromCharCode(event.which) + " es: " + event.which);
//		$("#escribe").val("");
//	}); 
//});
//detectar click del raton
//$(document).ready(function(){
//	$("#escribe").on("mousedown", function( event ) {
//		$("#parrafo").text("El evento " + event.type + " tiene código: " + event.which);
//	});
//});
 
//	$("#curptrabajador_09").keydown(function(event){
//		var text=("El código de la tecla " + String.fromCharCode(event.which) + " es: " + event.which);
//                alert(text);
//                //código unicode. el 13 es el enter el espacio es 32 borrar es 8
//		//$("#escribe").val("");
//	});

//$("#regitrar_curso1234321").click(function(){
//		$("#panel-01").removeClass("in");
//		$("#panel-01").addClass("in");
//	});
//	
//if (document.formulario.ID_CURSOS_INSTITUCION_HORARIOS_3.checked==true){
//    
//}
//if( $('#cuesta').prop('checked') ) {
//    alert('Seleccionado');
//}

//if( $('cuesta').is(':checked') ) {
//    alert('Seleccionado');
//}