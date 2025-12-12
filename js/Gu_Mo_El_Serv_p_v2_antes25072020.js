$(document).on('click', '#Guardar_Servidor_P', function(){
    var div="#para_Trabajar";
    var Nombreforo= $("#Nombreforo").val();
    var cpforo= $("#cpforo").val();
    var estadoforo= $("#estadoforo").val();
    var mun_alcforo= $("#mun_alcforo").val();
    var coloniaforo= $("#coloniaforo").val();
    var calleforo= $("#calleforo").val();
    var no_extforo= $("#no_extforo").val();
    var no_intforo= $("#no_intforo").val();
    var Descripcionlug= $("#Descripcionlug").val();
    var expr = /^[a-zA-Z0-9]*$/;
    
        if(Nombreforo=="" || cpforo=="" || estadoforo=="" || mun_alcforo=="" || coloniaforo=="" || calleforo=="" || no_extforo=="" || no_intforo=="" || Descripcionlug==""){
            $("#texto").html("<strong>¡Error!</strong> datos vacios. Por favor verifica.");
            $("#divError").css("display", "block");
            $("#divError").show();
			$("#divsucces6").hide();//jat agrego 270222019 07:38
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            return 0;
        }
        else{
            if(confirm("Deseas guardar el registro?")){
                var parametros = {
                    "Nombreforo" : Nombreforo,
                    "cpforo" : cpforo,
                    "estadoforo" : estadoforo,
                    "mun_alcforo" : mun_alcforo,
                    "coloniaforo" : coloniaforo,
                    "calleforo" : calleforo,
                    "no_extforo" : no_extforo,
                    "no_intforo" : no_intforo,
                    "Descripcionlug" : Descripcionlug
                };
                $.ajax({
                    data:  parametros, //datos que se envian a traves de ajax
                    url:   'Guarda_nuevo_servidor.php', //archivo que recibe la peticion
                    type:  'POST', //método de envio
                    beforeSend: function () {
                        $("#Guardar_Servidor_P").attr("disabled", true);
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

/*$(document).on('click', '#Guardar_imporTacion_SERvp', function(){
    var div="#para_Trabajar";
    var div_total="#totalcont";
    var file_val=$("#archivo_A_Importar").val();
    if(file_val=="" || file_val==undefined){
        $("#texto").html("<strong>¡Error!</strong> selecciona archivo*. Por favor verifica.");
        $("#divError").show();
        var scrollPos =  $("#contenedor_divError").offset().top;
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
            $("#divError").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            ok_formdata=0;
            return 0;
        }
        else{
            if(fileType != "application/vnd.ms-excel" || fileExtension != "csv"){
                $("#texto").html("<strong>¡Error!</strong> tipo de archivo incorrecto. Por favor verifica.");
                $("#divError").show();
                var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                ok_formdata=0;
                return 0;
            }
            else{
                var parametros = new FormData($("#subir_ServP")[0]);
                if(confirm("Deseas guardar el registro")){
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
});*/

function modificarServidorP(id_lugares,numero){
    //var div1="#para_Trabajar";
    var div="#modificado"+numero;
    var tipo="modificar";
    var Nombreforo=$("#Curp_Servidor"+numero).val();
    var cpforo= $("#cpforo"+numero).val();
    var estadoforo= $("#estadoforo"+numero).val();
    var mun_alcforo= $("#mun_alcforo"+numero).val();
    var coloniaforo= $("#coloniaforo"+numero).val();
    var calleforo= $("#calleforo"+numero).val();
    var no_extforo= $("#no_extforo"+numero).val();
    var no_intforo= $("#no_intforo"+numero).val();
    var Descripcionlug=$("#Tipo_Servidor_P"+numero).val();
    
        if(Nombreforo=="" || cpforo=="" || estadoforo=="" || mun_alcforo=="" || coloniaforo=="" || calleforo=="" || no_extforo=="" || no_intforo=="" || Descripcionlug==""){
            $("#texto").html("<strong>¡Error!</strong> datos vacios. Por favor verifica.");
            $("#divError").css("display", "block");
            $("#divError").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            return 0;
        }
        else{
          //nombre de como se va a recivir en el POST (Modificar..)
                var parametros = {
                    "tipo" : tipo,
                    "Nombreforo": Nombreforo,
                    "cpforo" : cpforo,
                    "estadoforo" : estadoforo,
                    "mun_alcforo" : mun_alcforo,
                    "coloniaforo" : coloniaforo,
                    "calleforo" : calleforo,
                    "no_extforo" : no_extforo,
                    "no_intforo" : no_intforo,
                    "Descripcionlug" : Descripcionlug,
                    "id_lugares_p" : id_lugares,
                    "numero" : numero
                };
                if (confirm ("Estas seguro de guardar los cambios?")){
                    $.ajax({
                        data:  parametros, //datos que se envian a traves de ajax
                        url:   'Modificar_Eliminar_servidoP.php', //archivo que recibe la peticion
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


function eliminarServidorP(id_lugares,numero)
{
    var div="#borrado"+numero;
    var divmodif="#modificado"+numero;
    var tipo="borrar";
    var parametros = {
        "tipo" : tipo,
        "id_lugares_p" : id_lugares,
        "numero" : numero
    };
    if (confirm ("Estas seguro de eliminar?")){
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'Modificar_Eliminar_servidoP.php', //archivo que recibe la peticion
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