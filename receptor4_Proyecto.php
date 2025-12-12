<?php require_once('Connections/profest_rep.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

echo '<?xml version="1.0"?>';
echo '<root>';
/*echo '<variable>'.$_GET['variable'].'</variable>';
echo '<valor>'.$valor=$_GET['valor'].'</valor>';*/

$variable=(isset($_GET['variable'])?$_GET['variable']:NULL);
$valor=(isset($_GET['valor'])?$_GET['valor']:NULL);
$id_presupuesto = $_GET['id_presupuesto'];

if($variable=="Concepto_gasto_P"){
	$opcion = "Concepto_gasto=".$valor;
	} else {
	$opcion = "Fuente_finan='".$valor."'";
	}

mysql_select_db($database_automaa, $automaa);

					//echo "----MODIFICA REGISTRO----";
					$q_modifica="UPDATE mas_presupuesto SET $opcion,fecha_hora_registro='NOW()' WHERE id_presupuesto = $id_presupuesto;";
					mysql_query("SET NAMES 'utf8'");
					$exe_modifica=mysql_query($q_modifica);

echo '</root>';




