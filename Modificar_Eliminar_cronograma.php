<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($automaa, $database_automaa);

$tipo=(isset($_POST['tipo'])?$_POST['tipo']:NULL);

if ($tipo=="borrar")//modificar
{
    $id_cronograma_acciones_p=(isset($_POST['id_cronograma_acciones_p'])?$_POST['id_cronograma_acciones_p']:NULL);
    $numero=(isset($_POST['numero'])?$_POST['numero']:NULL);
   
        $select_reg="DELETE FROM cronograma_acciones_ejecucion_festival WHERE cronograma_acciones_ejecucion_festival.id_cronograma_acciones = $id_cronograma_acciones_p";
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
          
		  /*  echo '<script type=\"text/javascript\">
                    $("#texto5").html("<strong>¡Felicidades!</strong>, se elimino correctamente el registro.");
                    $("#divsucces5").show();
                    $("#totalcont4").load( "catalogo_cronograma.php?recurso3=recargar" );
                    </script>';
			*/					 
				 /* echo '<script type=\"text/javascript\">
                    var scrollPos =  $("#contenedor_divError").offset().top;
                    $(window).scrollTop(scrollPos);
					$("#totalcont4").load( "catalogo_cronograma.php?recurso=recargar" );
                    </script>';*/
					echo '<script type=\"text/javascript\">
                $("#totalcont4").load( "catalogo_cronograma.php?recurso=recargar" );
				
				location.href = "login_op.php?abre_tab=1";
				</script>';	
        }
}
if ($tipo=="modificar")
{
   //nombre_meta_numerica, meta_cantidad
    $fechaacciones=(isset($_POST['fechaacciones'])?$_POST['fechaacciones']:NULL);
	$fechaacciones_fin=(isset($_POST['fechaacciones_fin'])?$_POST['fechaacciones_fin']:NULL);
    $acciones=(isset($_POST['acciones'])?utf8_decode($_POST['acciones']):NULL);
	
    $id_cronograma_acciones_p=(isset($_POST['id_cronograma_acciones_p'])?$_POST['id_cronograma_acciones_p']:NULL);
    $numero=(isset($_POST['numero'])?$_POST['numero']:NULL);
    
    //si se requiere verificar que la meta no se repita
    $existe_Servidor="Select * from cronograma_acciones_ejecucion_festival where fechaacciones = '$fechaacciones';";
    $res_existe= mysqli_query($con, $existe_Servidor);
    $num_existe= mysqli_num_rows($res_existe);
    
	$num_existe=0;
    if($num_existe>=1){
        echo '<script type=\"text/javascript\">
            $("#texto").html("<strong>¡Error!</strong> ya existe la meta con el mismo nombre. Por favor verifica.");
            $("#divError").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            </script>';
        echo '<span class="glyphicon glyphicon-floppy-save" aria-hidden="true" onClick="modificar_crono_P('.$id_cronograma_acciones_p.','.$numero.')"></span>';
    }
    else{
       
          $query_insert_nuevo="UPDATE cronograma_acciones_ejecucion_festival SET fechaacciones='$fechaacciones', fechaacciones_fin='$fechaacciones_fin', 
		  acciones = '$acciones', fecha_hora_registro='NOW()'
                    WHERE cronograma_acciones_ejecucion_festival.id_cronograma_acciones = $id_cronograma_acciones_p";
			mysqli_query("SET NAMES 'utf8'");
            $res_nuevo=mysqli_query($con, $query_insert_nuevo);
            if($res_nuevo){ 
			/*echo '<script type=\"text/javascript\">
				$("#texto5").html("<strong>¡Felicidades!</strong>, se actualizó correctamente la información.");
                    $("#divsucces5").show();
					var scrollPos =  $("#contenedor_divError").offset().top;
                    $(window).scrollTop(scrollPos);
                    </script>';*/
					
					echo '<script type=\"text/javascript\">
                $("#texto5").html("<strong>¡Felicidades!</strong>, se actualizó correctamente la información.");
                $("#divsucces5").show();
				$("#divError").hide();
				 </script>';	
            }
            else{
					 /*echo '<script type=\"text/javascript\">
				$("#texto_crono").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica.");
                $("#divError_crono").show();
				var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#Guardar_crono_P").attr("disabled", false);
                </script>'; */
            }            
      
    }
}
?>