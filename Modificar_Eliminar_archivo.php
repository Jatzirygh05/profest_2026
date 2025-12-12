<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($automaa, $database_automaa);

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

#$cve_user = 'jatziry30';
$cve_user = $_SESSION['MM_Username'];

$tipo=(isset($_POST['tipo'])?$_POST['tipo']:NULL);

if ($tipo=="borrar")//modificar
{
    $clave_id_P=(isset($_POST['clave_id_P'])?$_POST['clave_id_P']:NULL);
	
	
	 $query_user="SELECT * FROM anexos
        where clave_usuario='".$cve_user."' and clave_id = $clave_id_P";
     $res_user =  mysqli_query($con,$query_user);
    	while ($fila=mysqli_fetch_array($res_user, MYSQLI_ASSOC)){
		$archivo_adjunto_P=$fila['archivo_adjunto'];
		}
	
	$destino =  "anexos/".$cve_user."/".$archivo_adjunto_P;
	
	unlink($destino);
	
        $select_reg="DELETE FROM anexos WHERE clave_id = $clave_id_P";
        $res=  mysqli_query($con, $select_reg);
       if ($res){
           
            /* echo '<script type=\"text/javascript\">
					  $("#texto5").html("<strong>¡Felicidades!</strong>.");
					  $("#divsucces5").show();
                    </script>';*/
        }
        else { 
			/* echo '<script type=\"text/javascript\">
                $("#texto1a").html("<strong>¡Error!</strong> al eliminar el registro. Por favor verifica.");
                $("#divError1a").show();
                </script>';*/
		}
}
?>
