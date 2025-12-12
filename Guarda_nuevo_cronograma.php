<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($automaa, $database_automaa);

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

$fechaacciones=(isset($_POST['fechaacciones'])?$_POST['fechaacciones']:NULL);
$acciones=(isset($_POST['acciones'])?utf8_decode($_POST['acciones']):NULL);
$fechaacciones_fin=(isset($_POST['fechaacciones_fin'])?$_POST['fechaacciones_fin']:NULL);


if($fechaacciones!=NULL && $acciones!=NULL && $fechaacciones_fin!=NULL){
    
    $query_insert_nuevo="INSERT INTO cronograma_acciones_ejecucion_festival (id_cronograma_acciones, clave_usuario, fechaacciones, fechaacciones_fin, acciones, fecha_hora_registro)
        VALUES (NULL, '$cve_user', '$fechaacciones', '$fechaacciones_fin', '$acciones', NOW())";
	
        $res_nuevo=mysqli_query($con, $query_insert_nuevo);
        if($res_nuevo){
				
				/*
				funcionaba antes de limpiar campos
				echo '<script type=\"text/javascript\">
				$("#panel-077").hide();
                $("#texto5").html("<strong>¡Felicidades!</strong>, se guardo correctamente el registro.");
                $("#divsucces5").show();
				$("#divError5a").hide();
				 </script>';	*/	
				echo '<script type=\"text/javascript\">
				$("#panel-077").hide();
                $("#totalcont4").load( "catalogo_cronograma.php?recurso=recargar" );
				
				
				</script>';
			//location.href = "login_op.php?abre_tab=1";	
        }
        else{ 
		/*
		//$("#texto5a").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica."); $("#divError5a").show(); var scrollPos =  $("#contenedor_divError5a").offset().top;
            echo '<script type=\"text/javascript\">
            
                       $(window).scrollTop(scrollPos);
            $("#Guardar_crono_P").attr("disabled", false);
            </script>';*/
			
			 echo '<script type=\"text/javascript\">
			 $("#panel-077").hide();
                $("#texto_crono").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica.");
				$("#divError_crono").show(); 
				 $("#divsucces5").hide();
				
			 </script>';
			
			/*echo '<script type=\"text/javascript\">
            $("#texto5a").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica.");
            $("#divError5a").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            $("#Guardar_crono_P").attr("disabled", false);
            </script>';*/
			
        }
}
else{
    echo "Datos vacios";
}
?>
