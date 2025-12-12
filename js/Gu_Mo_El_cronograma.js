$(document).on('click', '#Guardar_crono_P', function(){
    var div="#para_Trabajar4";
    var fechaacciones= $("#fechaacciones").val();
	var fechaacciones_fin= $("#fechaacciones_fin").val();
    var acciones= $("#acciones").val();
    var expr = /^[a-zA-Z0-9]*$/;
	
	console.log('hola');
    
        if(fechaacciones=="" || acciones=="" || fechaacciones_fin=="" ){
           $("#texto_crono").html("<strong>¡Error!</strong> datos vacios. Por favor verifica.");
            $("#divError_crono").css("display", "block");
            $("#divError_crono").show();
			$("#divsucces5").hide();//jat agrego 270222019 07:38
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            return 0;
        }
        else{
            if(confirm("Seguro de guardar el registro?")){
                var parametros = {
                    "fechaacciones" : fechaacciones,
					"fechaacciones_fin" : fechaacciones_fin,
                    "acciones" : acciones
                };
                $.ajax({
                    data:  parametros, //datos que se envian a traves de ajax
                    url:   'Guarda_nuevo_cronograma.php', //archivo que recibe la peticion
                    type:  'POST', //método de envio
                    beforeSend: function () {
                        $("#Guardar_crono_P").attr("disabled", true);
                        $(div).html("<center>Espere por favor...</center>");
                    },
                    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $(div).html(response);
						
						  $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
						  $('.modal-backdrop').remove();//eliminamos el backdrop del modal
						
                    }
                });
            }
        }
});


function modificar_crono_P(id_cronograma_acciones,numero){
    var div="#modificada"+numero;
    var tipo="modificar";
    var fechaacciones=$("#fechaacciones_P"+numero).val();
	var fechaacciones_fin=$("#fechaacciones_fin_P"+numero).val();
    var acciones=$("#acciones_P"+numero).val();
    
        if(fechaacciones=="" || acciones=="" || fechaacciones_fin==""){
            $("#texto_crono").html("<strong>¡Error!</strong> datos vacios. Por favor verifica.");
            $("#divError_crono").css("display", "block");
            $("#divError_crono").show();
			$("#divsucces5").hide();//jat agrego 270222019 07:38
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            return 0;
        }
        else{
          //nombre de como se va a recivir en el POST (Modificar..)
                var parametros = {
                    "tipo" : tipo,
                    "fechaacciones": fechaacciones,
					"fechaacciones_fin": fechaacciones_fin,
                    "acciones" : acciones,
                    "id_cronograma_acciones_p" : id_cronograma_acciones,
                    "numero" : numero
                };
                if (confirm ("Seguro de guardar los cambios?")){
                    $.ajax({
                        data:  parametros, //datos que se envian a traves de ajax
                        url:   'Modificar_Eliminar_cronograma.php', //archivo que recibe la peticion
                        type:  'POST', //método de envio
                        beforeSend: function () {
                            $(div).html("<center>...</center>");
                        },
                        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                            $(div).html(response);
                        }
                    });
                }
                else{
                    return 0;
                }
            }
            
}


function eliminar_crono_P(id_cronograma_acciones,numero)
{
    var div="#borrada"+numero;
    var divmodif="#modificada"+numero;
    var tipo="borrar";
    var parametros = {
        "tipo" : tipo,
        "id_cronograma_acciones_p" : id_cronograma_acciones,
        "numero" : numero
    };
    if (confirm ("Seguro de eliminar el registro?")){
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'Modificar_Eliminar_cronograma.php', //archivo que recibe la peticion
            type:  'POST', //método de envio
            beforeSend: function () {
                $(div).html("<center>...</center>");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $(divmodif).html("");
                $(div).html(response);
            }
        });
    }
    else{
        return 0;
    }
}