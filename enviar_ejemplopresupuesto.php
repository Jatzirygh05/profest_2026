<?php require_once('Connections/conexion.php');  
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];
foreach($_POST as $k => $v)
	{
		${$k}=$_POST[$k];
	}

'<?xml version="1.0"?>';
'<root>';
$query_user2="SELECT * FROM mas_presupuesto WHERE clave_usuario='".$cve_user."';";
$res_user2 =  mysqli_query($con, $query_user2);
$cuantos=mysqli_num_rows($res_user2);

$cuantos_mod = $cuantos;

for($i=1;$i<=$cuantos_mod;$i++){
	$id_presupuesto_a=${'id_presupuesto'.$i};
	$Concepto_gasto_a=${'Concepto_gasto'.$i};
  	$Fuente_finan_a=${'Fuente_finan'.$i};
 	$Monto_unidad_a=${'Monto_unidad'.$i};
	//$Porcentaje_a=${'Porcentaje'.$i};
	//Porcentaje		=	'$Porcentaje_a',
	//porcentaje_total = '$textod',
	$query_b="UPDATE mas_presupuesto SET 
			Concepto_gasto	=	'$Concepto_gasto_a',
			Fuente_finan	=	'$Fuente_finan_a',
			Monto_unidad	=	'$Monto_unidad_a',
			monto_unidad_total = '$pres_anual_tot_2010',
			fecha_hora_registro=NOW()
			WHERE clave_usuario LIKE '".$cve_user."' && id_presupuesto = '".$id_presupuesto_a."';";
	$mod=mysqli_query($con, $query_b);
}
if($mod) echo $res_paso=1;
$cuantos_agrega=$cuantos_mod+1;
for($a=$cuantos_agrega;$a<=50;$a++){
	$Concepto_gasto_b=${'Concepto_gasto'.$a};
    $Fuente_finan_b=${'Fuente_finan'.$a};
    $Monto_unidad_b=${'Monto_unidad'.$a};
	//$Porcentaje_b=${'Porcentaje'.$a};
	//&& $Porcentaje_b!=''
	if($Concepto_gasto_b!='' && $Fuente_finan_b!='' && $Monto_unidad_b!='' )
	{
		$query_c = "INSERT INTO mas_presupuesto 
		(id_presupuesto, clave_usuario, Concepto_gasto, Fuente_finan, Monto_unidad, monto_unidad_total, porcentaje_total, fecha_hora_registro)
		VALUES
		(NULL, '$cve_user', '$Concepto_gasto_b', '$Fuente_finan_b', '$Monto_unidad_b', '$pres_anual_tot_2010', '$textod',NOW());";
		$mod_c = mysqli_query($con, $query_c);		
	}
	if($mod_c) echo $res_paso=1;
}	
'</root>';