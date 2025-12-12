$(document).on('click', '#Guardar_Presupuesto_P', function(){
    var div="#para_Trabajar2";
    var Concepto_gasto= $("#Concepto_gasto").val();
    var Fuente_finan= $("#Fuente_finan").val();
    var Monto_unidad= $("#Monto_unidad").val();
	var Porcentaje= $("#Porcentaje").val();
    var expr = /^[a-zA-Z0-9]*$/;
    
        if(Concepto_gasto=="" || Fuente_finan=="" || Monto_unidad=="" || Porcentaje==""){
            $("#texto8a").html("<strong>¡Error!</strong> datos vacios. Por favor verifica.");
            $("#divError8a").css("display", "block");
            $("#divError8a").show();
			$("#divsucces8").hide();//jat agrego 270222019 07:38
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            return 0;
        }
        else{
            if(confirm("Seguro de guardar el registro?")){
                var parametros = {
                    "Concepto_gasto" : Concepto_gasto,
                    "Fuente_finan" : Fuente_finan,
                    "Monto_unidad" : Monto_unidad,
					"Porcentaje" : Porcentaje
                };
                $.ajax({
                    data:  parametros, //datos que se envian a traves de ajax
                    url:   'Guarda_nuevo_presupuesto.php', //archivo que recibe la peticion
                    type:  'POST', //método de envio
                    beforeSend: function () {
                        $("#Guardar_Presupuesto_P").attr("disabled", true);
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

$(document).on('click', '#Guardar_imporTacion_SERvp', function(){
    var div="#para_Trabajar2";
    var div_total="#totalcont2";
    var file_val=$("#archivo_A_Importar").val();
    if(file_val=="" || file_val==undefined){
        $("#texto").html("<strong>¡Error!</strong> selecciona archivo*. Por favor verifica.");
        $("#divError2").show();
        var scrollPos =  $("#contenedor_divError2").offset().top;
        $(window).scrollTop(scrollPos);
        return 0;
    }
    else{
        
        
        var fileExtension = "";
        var file = $("#archivo_A_Importar")[0].files[0];
        //obtenemos el tamaño del archivo
        var fileSize = file.size;            
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //OBTENER SOLO NOMBRE
        var nombre = fileName.substring(0, 18);
        var tamanio_max=8388600;
        if(fileSize>tamanio_max){
            $("#texto").html("<strong>¡Error!</strong> el archivo excede los 8 MB. Por favor verifica.");
            $("#divError2").show();
            var scrollPos =  $("#contenedor_divError2").offset().top;
            $(window).scrollTop(scrollPos);
            ok_formdata=0;
            return 0;
        }
        else{
            if(fileType != "application/vnd.ms-excel" || fileExtension != "csv"){
                $("#texto").html("<strong>¡Error!</strong> tipo de archivo incorrecto. Por favor verifica.");
                $("#divError2").show();
                var scrollPos =  $("#contenedor_divError2").offset().top;
                $(window).scrollTop(scrollPos);
                ok_formdata=0;
                return 0;
            }
            else{
                var parametros = new FormData($("#subir_ServP")[0]);
                if(confirm("¿Esta seguro de guardar la información?")){
                    $.ajax({
                        data:  parametros, //datos que se envian a traves de ajax
                        url:   '../catalogos/servidores_Publicos/Importar_Servidores_Public.php', //archivo que recibe la peticion
                        type:  'POST', //método de envio
                        //necesario para subir archivos via ajax
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('#Guardar_imporTacion_SERvp').attr("disabled", true);
                            $(div).html("<CENTER>...</CENTER>");
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
    }
});

function modificarPresupuestoP(id_presupuesto,numero){
    //var div1="#para_Trabajar2";
    var div="#modificada"+numero;
    var tipo="modificar";
    var Concepto_gasto=$("#Concepto_gasto_P"+numero).val();
    var Fuente_finan=$("#Fuente_finan_P"+numero).val();
    var Monto_unidad=$("#Monto_unidad_P"+numero).val();
	var Porcentaje=$("#Porcentaje_P"+numero).val();
    
        if(Concepto_gasto=="" || Concepto_gasto==undefined || Fuente_finan=="" || Fuente_finan==undefined || Monto_unidad=="" || Monto_unidad==undefined || Porcentaje=="" || Porcentaje==undefined){
            $("#texto2").html("<strong>¡Error!</strong> datos vacios. Por favor verifica.");
            //$("#divError").css("display", "block");
            $("#divError2").show();
            var scrollPos =  $("#contenedor_divError2").offset().top;
            $(window).scrollTop(scrollPos);
            return 0;
        }
        else{
          //nombre de como se va a recivir en el POST (Modificar..)
                var parametros = {
                    "tipo" : tipo,
                    "Concepto_gasto": Concepto_gasto,
                    "Fuente_finan" : Fuente_finan,
                    "Monto_unidad" : Monto_unidad,
					"Porcentaje" : Porcentaje,
                    "id_presupuesto_p" : id_presupuesto,
                    "numero" : numero
                };
                if (confirm ("Seguro de guardar los cambios?")){
                    $.ajax({
                        data:  parametros, //datos que se envian a traves de ajax
                        url:   'Modificar_Eliminar_presupuesto.php', //archivo que recibe la peticion
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


function eliminarPresupuestoP(id_presupuesto,numero)
{
    var div="#borrada"+numero;
    var divmodif="#modificada"+numero;
    var tipo="borrar";
    var parametros = {
        "tipo" : tipo,
        "id_presupuesto_p" : id_presupuesto,
        "numero" : numero
    };
    if (confirm ("Seguro de eliminar el registro?")){
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'Modificar_Eliminar_presupuesto.php', //archivo que recibe la peticion
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