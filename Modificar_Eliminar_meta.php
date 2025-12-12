<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($automaa, $database_automaa);

$tipo=(isset($_POST['tipo'])?$_POST['tipo']:NULL);

if ($tipo=="borrar")//modificar
{
    $id_meta_p=(isset($_POST['id_meta_p'])?$_POST['id_meta_p']:NULL);
    $numero=(isset($_POST['numero'])?$_POST['numero']:NULL);
    $select_reg="DELETE FROM mas_metas_numericas WHERE id_meta = $id_meta_p";
    $res=  mysqli_query($con, $select_reg);

        if (!$res){
           /* echo '<script type=\"text/javascript\">
                $("#texto1a").html("<strong>¡Error!</strong> al eliminar el registro. Por favor verifica.");
                $("#divError1a").show();
                </script>';*/
               /* var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);*/
				
				
				  echo '<script type=\"text/javascript\">
                $("#texto1a").html("<strong>¡Error!</strong> al eliminar el registro. Por favor verifica.");
                $("#divError").show();
                var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                </script>';
        }
        else { 
				/* echo '<script type=\"text/javascript\">
                    $("#texto1").html("<strong>¡Felicidades!</strong>, se elimino correctamente el registro.");
                    $("#divsucces1").show();
                    </script>';*/
					
			/*echo '<script type=\"text/javascript\">
                    var scrollPos =  $("#contenedor_divError").offset().top;
                    $(window).scrollTop(scrollPos);
					$("#totalcont3").load( "catalogo_metas_numericas.php?recurso=recargar" );
                    </script>';*/
					
					//echo "entro";
				echo '<script type=\"text/javascript\">
                //$("#totalcont.").html("");
                $("#refresca_meta").load( "catalogo_metas_numericas.php?recurso=recargar" );
                </script>';

                   /* $return .= "<table class="table">";
                    $return .= "<tr><td><strong>C&oacute;digo</strong></td><td><strong>Nombre de la meta</strong></td><td><strong>Cantidad</strong></td><td></td>
                    <td></td></tr>";
                    $query_user="SELECT * FROM mas_metas_numericas where clave_usuario='".$cve_user."' ORDER BY id_meta";
                    $res_user =  mysqli_query($con,$query_user);
                    while ($fila=mysqli_fetch_array($res_user, MYSQLI_ASSOC)){
                        $id_meta=$fila['id_meta'];
                        $nombre_meta_numerica=utf8_encode($fila['nombre_meta_numerica']);
                        $meta_cantidad=$fila['meta_cantidad'];
                        $return .= "<tr><td><strong>".$conte."</strong></td><td><input class='form-control' type='text' name='nombre_meta_numerica_P".$conte."' id='nombre_meta_numerica_P".$conte."' value='".$nombre_meta_numerica."'></td><td><input class='form-control' type='text' name='meta_cantidad_P".$conte."' id='meta_cantidad_P".$conte."' value='".$meta_cantidad."' onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td><td align='center'><div id='modificado".$conte."'><span class='glyphicon glyphicon-floppy-save' aria-hidden='true' onClick='modificarMetaP(".$id_meta.",".$conte.")'></span></div></td><td align='center'><div id='borrado".$conte."'><span class='glyphicon glyphicon-trash' aria-hidden='true' onClick='eliminarMetaP(".$id_meta.",".$conte.")'></span></div></td></tr>";
                        $conte++;
                    }
                    $return .= "</table>!;*/
		}
}
if ($tipo=="modificar")
{
   //nombre_meta_numerica, meta_cantidad
    $nombre_meta_numerica=(isset($_POST['nombre_meta_numerica'])?$_POST['nombre_meta_numerica']:NULL);
    $meta_cantidad=(isset($_POST['meta_cantidad'])?$_POST['meta_cantidad']:NULL);
	
    $id_meta_p=(isset($_POST['id_meta_p'])?$_POST['id_meta_p']:NULL);
    $numero=(isset($_POST['numero'])?$_POST['numero']:NULL);
    
    //si se requiere verificar que la meta no se repita
    $existe_Servidor="Select * from mas_metas_numericas where nombre_meta_numerica = $nombre_meta_numerica;";
    $res_existe= mysqli_query($con, $existe_Servidor);
    $num_existe= mysqli_num_rows($res_existe);
    
	$num_existe=0;
    if($num_existe>=1){
        echo '<script type=\"text/javascript\">
            $("#texto1a").html("<strong>¡Error!</strong> ya existe la meta con el mismo nombre. Por favor verifica.");
            $("#divError").show();
            var scrollPos =  $("#contenedor_divError").offset().top;
            $(window).scrollTop(scrollPos);
            </script>';
        echo '<span class="glyphicon glyphicon-floppy-save" aria-hidden="true" onClick="modificarMetaP('.$id_meta_p.','.$numero.')"></span>';
    }
    else{
       
            $query_insert_nuevo="UPDATE mas_metas_numericas SET nombre_meta_numerica='$nombre_meta_numerica', meta_cantidad = '$meta_cantidad', fecha_hora_registro='NOW()'
                    WHERE mas_metas_numericas.id_meta = $id_meta_p";
            $res_nuevo=mysqli_query($con, $query_insert_nuevo);
            if($res_nuevo){
                echo '<script type=\"text/javascript\">
                    $("#texto1").html("<strong>¡Felicidades!</strong>, se actualizó correctamente la información.");
                    $("#divsucces1").show();
					$("#divError1a").hide();
                    </script>';
            }
            else{
                echo '<script type=\"text/javascript\">
                $("#texto1").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica.");
                $("#divError1a").show();
                </script>';  
				/*var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#Guardar_Meta_P").attr("disabled", false);*/
            }            
      
    }
}
?>