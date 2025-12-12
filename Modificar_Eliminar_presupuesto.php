<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($automaa, $database_automaa);

$tipo=(isset($_POST['tipo'])?$_POST['tipo']:NULL);

if ($tipo=="borrar")//modificar
{
    $id_presupuesto_p=(isset($_POST['id_presupuesto_p'])?$_POST['id_presupuesto_p']:NULL);
    $numero=(isset($_POST['numero'])?$_POST['numero']:NULL);
   
        $select_reg="DELETE FROM mas_presupuesto WHERE mas_presupuesto.id_presupuesto = $id_presupuesto_p";
        $res=  mysqli_query($con, $select_reg);
        if (!$res){
            echo '<script type=\"text/javascript\">
                $("#texto").html("<strong>¡Error!</strong> al eliminar el registro. Por favor verifica.");
                $("#divError").show();
                var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                </script>';
        }
        else {
           /* echo '<script type=\"text/javascript\">
                    $("#texto3").html("<strong>¡Felicidades!</strong>, se elimino correctamente el registro presupuesto.");
                    $("#divsucces").show();
                    var scrollPos =  $("#contenedor_divError").offset().top;
                    $(window).scrollTop(scrollPos);
                    </script>';
            echo "Eliminado";*/
			echo '<script type=\"text/javascript\">
                $("#totalcont2").html("");
                $("#totalcont2").load( "catalogo_presupuesto.php?recurso=recargar" );
                </script>';
        }
}
if ($tipo=="modificar")
{
   
    $Concepto_gasto=(isset($_POST['Concepto_gasto'])?utf8_decode(trim($_POST['Concepto_gasto'])):NULL);
    $Fuente_finan=(isset($_POST['Fuente_finan'])?$_POST['Fuente_finan']:NULL);
    $Monto_unidad=(isset($_POST['Monto_unidad'])?$_POST['Monto_unidad']:NULL);
	$Porcentaje=(isset($_POST['Monto_unidad'])?$_POST['Porcentaje']:NULL);
	
    $id_presupuesto_p=(isset($_POST['id_presupuesto_p'])?$_POST['id_presupuesto_p']:NULL);
    $numero=(isset($_POST['numero'])?$_POST['numero']:NULL);
    
    //si se requiere verificar si el foro no se repita
    $existe_Servidor="Select * from mas_presupuesto where id_presupuesto = $id_presupuesto_p;";
    $res_existe= mysqli_query($con, $existe_Servidor);
    $num_existe= mysqli_num_rows($res_existe);
    
    
    $num_existe=0;
    if($num_existe>=1){
        echo '<script type=\"text/javascript\">
            $("#texto").html("<strong>¡Error!</strong> ya existe un Foro con el mismo nombre. Por favor verifica.");
            $("#divError").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            </script>';
        echo '<span class="glyphicon glyphicon-floppy-save" aria-hidden="true" onClick="modificarPresupuestoP('.$id_presupuesto_p.','.$numero.')"></span>';
    }
    else{
       
            $query_insert_nuevo="UPDATE mas_presupuesto SET Concepto_gasto='$Concepto_gasto', Fuente_finan = '$Fuente_finan', 
			Monto_unidad='$Monto_unidad', Porcentaje='$Porcentaje', fecha_hora_registro='NOW()'
                    WHERE mas_presupuesto.id_presupuesto = $id_presupuesto_p";
            $res_nuevo=mysqli_query($con, $query_insert_nuevo);
            if($res_nuevo){
                /*echo '<script type=\"text/javascript\">
                    $("#texto3").html("<strong>¡Felicidades!</strong>, se actualizó correctamente la información.");
                    $("#divsucces").show();
                    var scrollPos =  $("#contenedor_divError").offset().top;
                    $(window).scrollTop(scrollPos);
                    </script>';*/
					echo '<script type=\"text/javascript\">
					$("#texto8").html("<strong>¡Felicidades!</strong>, se actualizó correctamente la información.");
                    $("#divsucces8").show();
					$("#divError8a").hide();
					var scrollPos =  $("#contenedor_divError").offset().top;
                    $(window).scrollTop(scrollPos);
                    </script>';
                echo '<span class="glyphicon glyphicon-floppy-save" aria-hidden="true" onClick="modificarPresupuestoP('.$id_presupuesto_p.','.$numero.')"></span>';
				
            }
            else{
                echo '<script type=\"text/javascript\">
                $("#texto").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica.");
                $("#divError").show();
                var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#Guardar_Presupuesto_P").attr("disabled", false);
                </script>';
            }            
      
    }
}
?>