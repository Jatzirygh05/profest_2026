$(document).on('click', '#Guardar_Meta_P', function(){
    var div="#para_Trabajar3";
    var nombre_meta_numerica= $("#nombre_meta_numerica").val();
    var meta_cantidad= $("#meta_cantidad").val();
    var expr = /^[a-zA-Z0-9]*$/;
    
        if(nombre_meta_numerica=="" || meta_cantidad==""){
            $("#texto1a").html("<strong>¡Error!</strong> datos vacios. Por favor verifica.");
            $("#divError1a").css("display", "block");
            $("#divError1a").show();
			$("#divsucces1").hide();//jat agrego 270222019 07:38
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            return 0;
        }
        else{
            if(confirm("Seguro de guardar el registro?")){
                var parametros = {
                    "nombre_meta_numerica" : nombre_meta_numerica,
                    "meta_cantidad" : meta_cantidad
                };
                $.ajax({
                    data:  parametros, //datos que se envian a traves de ajax
                    url:   'Guarda_nueva_meta.php', //archivo que recibe la peticion
                    type:  'POST', //método de envio
                    beforeSend: function () {
                        $("#Guardar_Meta_P").attr("disabled", true);
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


function modificarMetaP(id_meta,numero){
    //var div1="#para_Trabajar3";
    var div="#modificada"+numero;
    var tipo="modificar";
    var nombre_meta_numerica=$("#nombre_meta_numerica_P"+numero).val();
    var meta_cantidad=$("#meta_cantidad_P"+numero).val();
    
        if(nombre_meta_numerica=="" || meta_cantidad==""){
            $("#texto1a").html("<strong>¡Error!</strong> datos vacios. Por favor verifica.");
          
            $("#divError1a").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            return 0;
        }
        else{
          //nombre de como se va a recivir en el POST (Modificar..)
                var parametros = {
                    "tipo" : tipo,
                    "nombre_meta_numerica": nombre_meta_numerica,
                    "meta_cantidad" : meta_cantidad,
                    "id_meta_p" : id_meta,
                    "numero" : numero
                };
                if (confirm ("Seguro de guardar los cambios?")){					
                    $.ajax({
                        data:  parametros, //datos que se envian a traves de ajax
                        url:   'Modificar_Eliminar_meta.php', //archivo que recibe la peticion
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


function eliminarMetaP(id_meta,numero)
{
    var div="#borrada"+numero;
    var divmodif="#modificada"+numero;
    var tipo="borrar";
    var parametros = {
        "tipo" : tipo,
        "id_meta_p" : id_meta,
        "numero" : numero
    };
   /* if (confirm ("Seguro de eliminar el registro?")){
		
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'Modificar_Eliminar_meta.php', //archivo que recibe la peticion
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
    }*/
	 if (confirm ("Estas seguro de eliminar?")){
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'Modificar_Eliminar_meta.php', //archivo que recibe la peticion
            type:  'POST', //método de envio
            beforeSend: function () {
                $(div).html("<center>...</center>");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                //$(divmodif).html("");
                $("#refresca_meta").html(response);
            }
        });
    }
    else{
        return 0;
    }
}