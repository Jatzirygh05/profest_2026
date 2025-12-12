<?php 

/*$mysqli = new mysqli("localhost", "jatziry", "jat0905", "profest_cultura");

// verificar la conexión 
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

printf("Conjunto de caracteres inicial: %s\n", $mysqli->character_set_name());

// cambiar el conjunto de caracteres a utf8 
if (!$mysqli->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
    exit();
} else {
    printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
}

$mysqli->close();*/

/*$antecedentes = "Baúl Teatro.\r\nLa asociación tiene como misión revalorar el arte de los títeres en la zona norte de México, a través de actividades programadas de manera\r\nsistemática que cubran las áreas de investigación, documentación, creación, difusión y enseñanza.Lo anterior,.";


echo nl2br($antecedentes);


echo nl2br("Bienvenido\r\nEste es mi documento HTML", false);*/


//(INICIO) Operación de la Pestaña "Presupuesto"

$cve_user="jatziry30";

$sql_consulta_proy = "SELECT * FROM `proyecto` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado_consulta_proy = mysql_query($sql_consulta_proy);
			$num_resultados_proyecto = mysql_num_rows($resultado_consulta_proy);
			for ($k=0; $k <$num_resultados_proyecto; $k++)
			{
				$row_proy = mysql_fetch_array($resultado_consulta_proy);
				$Concepto_gasto_a= $row_proy["Concepto_gasto_a"];
				$Fuente_finan_a	= $row_proy["Fuente_finan_a"];
				$Monto_unidad_a	= $row_proy["Monto_unidad_a"];
				$Porcentaje_a	= $row_proy["Porcentaje_a"];
				
				$Concepto_gasto_b= $row_proy["Concepto_gasto_b"];
				$Fuente_finan_b	= $row_proy["Fuente_finan_b"];
				$Monto_unidad_b	= $row_proy["Monto_unidad_b"];
				$Porcentaje_b	= $row_proy["Porcentaje_b"];
				
				$Concepto_gasto_c= $row_proy["Concepto_gasto_c"];
				$Fuente_finan_c	= $row_proy["Fuente_finan_c"];
				$Monto_unidad_c	= $row_proy["Monto_unidad_c"];
				$Porcentaje_c	= $row_proy["Porcentaje_c"];		
			}

$sel_cuantos="SELECT * FROM mas_presupuesto WHERE clave_usuario='".$cve_user."'";
$exe_res_total=  mysqli_query($sel_cuantos);
$num_resultados_pres = mysql_num_rows($exe_res_total);
for ($i=0; $i <$num_resultados_pres; $i++)
			{
				$row_pres = mysql_fetch_array($exe_res_total);
				$Fuente_finan	= $row_pres["Fuente_finan"];	
				$Monto_unidad	= $row_pres["Monto_unidad"];
			}

//(FIN) Operación de la Pestaña "Presupuesto"
?>