<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($automaa, $database_automaa);

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

$nombre_meta_numerica=(isset($_POST['nombre_meta_numerica'])?utf8_decode($_POST['nombre_meta_numerica']):NULL);
$meta_cantidad=(isset($_POST['meta_cantidad'])?$_POST['meta_cantidad']:NULL);

if($nombre_meta_numerica!=NULL && $meta_cantidad!=NULL){
    
     $query_insert_nuevo="INSERT INTO mas_metas_numericas (id_meta, clave_usuario, nombre_meta_numerica, meta_cantidad, fecha_hora_registro)
        VALUES (NULL, '$cve_user', '$nombre_meta_numerica', '$meta_cantidad', NOW())";
        $res_nuevo=mysqli_query($con, $query_insert_nuevo);
        if($res_nuevo){
           echo '<script type=\"text/javascript\">
		   		$("#Guardar_Meta_P").attr("disabled", false);
				document.getElementById("nombre_meta_numerica").value="";
				document.getElementById("meta_cantidad").value="";
		    	$("#panel-03").hide();
                $("#texto1").html("<strong>¡Felicidades!</strong>, se guardo correctamente el registro.");
                $("#divsucces1").show();
				$("#divError1a").hide();
				$(window).scrollTop(scrollPos); var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#totalcont3").load( "catalogo_metas_numericas.php?recurso=recargar" );
                </script>';
			
				/* $("#totalcont3").html("");
				var scrollPos =  $("#divsucces1").offset().top;
				 $(window).scrollTop(scrollPos); var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#totalcont3").load( "catalogo_metas_numericas.php?recurso2=recargar" );*/               
        }
        else{
            echo '<script type=\"text/javascript\">
            $("#texto1a").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica.");
            $("#divError1a").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            $("#Guardar_Meta_P").attr("disabled", false);
            </script>';
        }
}
else{
    echo "Datos vacios";
}
?>
