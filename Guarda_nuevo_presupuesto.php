<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($automaa, $database_automaa);

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

        
$Concepto_gasto=(isset($_POST['Concepto_gasto'])?utf8_decode(trim($_POST['Concepto_gasto'])):NULL);
$Fuente_finan=(isset($_POST['Fuente_finan'])?$_POST['Fuente_finan']:NULL);
$Monto_unidad=(isset($_POST['Monto_unidad'])?$_POST['Monto_unidad']:NULL);
$Porcentaje=(isset($_POST['Porcentaje'])?$_POST['Porcentaje']:NULL);

if($Concepto_gasto!=NULL && $Fuente_finan!=NULL && $Monto_unidad!=NULL && $Porcentaje!=NULL){
    
       $query_insert_nuevo="INSERT INTO mas_presupuesto (id_presupuesto, clave_usuario, Concepto_gasto, Fuente_finan, Monto_unidad, Porcentaje, fecha_hora_registro)
        VALUES (NULL, '$cve_user', '$Concepto_gasto', '$Fuente_finan', '$Monto_unidad', '$Porcentaje', NOW())";
        $res_nuevo=mysqli_query($con, $query_insert_nuevo);
        if($res_nuevo){
           echo '<script type=\"text/javascript\">
		   		$("#Guardar_Presupuesto_P").attr("disabled", false);
				document.getElementById("Concepto_gasto").value="";
				document.getElementById("Fuente_finan").value="";
				document.getElementById("Monto_unidad").value="";
				document.getElementById("Porcentaje").value="";
				$("#panel-04").hide();
				$("#texto8").html("<strong>¡Felicidades!</strong>, se guardo correctamente el registro.");
                $("#divsucces8").show();
				$("#divError8a").hide();
				$(window).scrollTop(scrollPos); var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#totalcont2").load( "catalogo_presupuesto.php?recurso=recargar" );
                </script>';
        }
        else{
            echo '<script type=\"text/javascript\">
            $("#texto8").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica.");
            $("#divError8a").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            $("#Guardar_Presupuesto_P").attr("disabled", false);
            </script>';
			
        }
}
else{
    echo "Datos vacios";
}
?>
