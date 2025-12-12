function eliminar_archivo_P(clave_id)
{
    var div="#borrada";
    var tipo="borrar";
	
	
    var parametros = {
        "tipo" : tipo,
        "clave_id_P" : clave_id
    };
    if (confirm ("Seguro de eliminar el registro?")){
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'Modificar_Eliminar_archivo.php', //archivo que recibe la peticion
            type:  'POST', //método de envio
            beforeSend: function () {
                $(div).html("<center>...</center>");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                //$(divmodif).html("");
                $(div).html(response);
				location.reload(true);
            }
        });
    }
    else{
        return 0;
    }
}