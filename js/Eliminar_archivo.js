function eliminar_archivos(clave_id, ruta_desc)
{

    var tipo="borrar";
    var parametros = {
        "clave_id_p" : clave_id,
		"ruta_desc_p" : ruta_desc
    };
    if (confirm ("Seguro de eliminar el archivo?")){
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'Elimina_archivo.php', //archivo que recibe la peticion
            type:  'POST', //método de envio
            beforeSend: function () {
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				document.getElementById("action").value = "";
				console.log('solo borrar no actualizar');
				location.reload();
            }
        });
    }
    else{
        return 0;
    }
}