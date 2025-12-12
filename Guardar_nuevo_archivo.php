<?php require_once('Connections/conexion.php');
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
//$cve_user ='ezayasn';
if($cve_user==""){ 
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
  }

$archivo= $_FILES['archivo']['name'];
$tipo= $_FILES['archivo']['type'];
$archivo_nombre = $_POST['archivo_nombre'];
//$url_antecedente = $_POST['url_antecedente'];

if(empty($url_antecedente))
{
			// guardamos el archivo a la carpeta files
										
			//comprobamos si existe un directorio para subir el archivo
			//si no es así, lo creamos
			if(!is_dir("anexos/".$cve_user."/")) 
    			mkdir("anexos/".$cve_user."/", 0770);
										
				$name_archivo = $archivo;
										
				$destino =  "anexos/".$cve_user."/".$name_archivo;
				
				if (file_exists($destino)) {
					//echo "El fichero $nombre_fichero existe";
					//echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=guardar_solicitud.php'>";
					
					$p_msn = 1; 

					header("Location: guardar_solicitud.php?p_msn=$p_msn"); 
				} else { 
					$p_msn = 0; 
                    if (copy($_FILES['archivo'.$id.'']['tmp_name'],$destino)) {
						$status = "Anexo enviado con nombre: <b>".$archivo."</b>";
				
					echo $query="INSERT INTO `anexos` (
																`clave_id` ,
																`nombre_formato` ,
																`fecha_hora_captura` ,
																`clave_usuario` ,
																`anio` ,
																`archivo_adjunto` ,
																`tipo_formato`, `liga_anexo`
																)
																VALUES (
																NULL, '".$archivo_nombre."', NOW(), '".$cve_user."', 
																'".$anio."', '".$archivo."', '".$tipo."', '".$url_antecedente."');";
														$result= mysqli_query($con, $query);
												
														if (!$result)
																	{
																	echo "<strong>Error:</strong> No se ha podido guardar la información. <br>Favor de contactar al administrador";
																	
																	//exit;
																	}
																	else
																	{
																	//echo "Anexo registrado correctamente.<br>";
																	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=guardar_solicitud.php'>";
																	// sube archivo
																	}
															
														} else {
															$status = "Error al subir el archivo <b>".$archivo."</b>";
														}
				}
	
} else {
	
	$query="INSERT INTO `anexos` (
																`clave_id` ,
																`nombre_formato` ,
																`fecha_hora_captura` ,
																`clave_usuario` , `liga_anexo`
																)
																VALUES (
																NULL, '".$archivo_nombre."', NOW(), '".$cve_user."', '".$url_antecedente."');";
														$result= mysqli_query($con, $query);
												
														if (!$result)
																	{
																	echo "<strong>Error:</strong> No se ha podido guardar la información. <br>Favor de contactar al administrador";
																	
																	//exit;
																	}
																	else
																	{
																		$p_msn = 0; 
																	//echo "Anexo registrado correctamente.<br>";
																	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=guardar_solicitud.php'>";
																	// sube archivo
																	}
															
	
	}
?>
