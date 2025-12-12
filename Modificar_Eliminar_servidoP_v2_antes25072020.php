<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($con, $database_automaa);

$tipo=(isset($_POST['tipo'])?$_POST['tipo']:NULL);

if ($tipo=="borrar")//modificar
{
    $id_lugares_p=(isset($_POST['id_lugares_p'])?$_POST['id_lugares_p']:NULL);
    $numero=(isset($_POST['numero'])?$_POST['numero']:NULL);
   
        $select_reg="DELETE FROM mas_lugares WHERE id_lugares = $id_lugares_p";
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
            /*echo '<script type=\"text/javascript\">
                    $("#texto2").html("<strong>¡Felicidades!</strong>, se elimino correctamente el registro.");
                    $("#divsucces").show();
                    var scrollPos =  $("#contenedor_divError").offset().top;
                    $(window).scrollTop(scrollPos);
                    </script>';
            echo "Eliminado";*/
			echo '<script type=\"text/javascript\">
                $("#totalcont").html("");
                $("#totalcont").load( "catalogo_lugares.php?recurso=recargar" );
                </script>';
        }
}
if ($tipo=="modificar")
{
   
    $Nombreforo=(isset($_POST['Nombreforo'])?utf8_decode(trim($_POST['Nombreforo'])):NULL);
  
$cpforo=(isset($_POST['cpforo'])?trim(utf8_decode($_POST['cpforo'])):NULL);
$estadoforo=(isset($_POST['estadoforo'])?trim(utf8_decode($_POST['estadoforo'])):NULL);
$mun_alcforo=(isset($_POST['mun_alcforo'])?trim(utf8_decode($_POST['mun_alcforo'])):NULL);
$coloniaforo=(isset($_POST['coloniaforo'])?trim(utf8_decode($_POST['coloniaforo'])):NULL);
$calleforo=(isset($_POST['calleforo'])?trim(utf8_decode($_POST['calleforo'])):NULL);
$no_intforo=(isset($_POST['no_intforo'])?trim(utf8_decode($_POST['no_intforo'])):NULL);
$no_extforo=(isset($_POST['no_extforo'])?trim(utf8_decode($_POST['no_extforo'])):NULL);


    $Descripcionlug=(isset($_POST['Descripcionlug'])?utf8_decode(trim($_POST['Descripcionlug'])):NULL);
    $id_lugares_p=(isset($_POST['id_lugares_p'])?$_POST['id_lugares_p']:NULL);
    $numero=(isset($_POST['numero'])?$_POST['numero']:NULL);
    
    //si se requiere verificar si el foro no se repita
    $existe_Servidor="Select * from mas_lugares where id_lugares = $id_lugares_p;";
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
        //echo '<span class="glyphicon glyphicon-floppy-save" aria-hidden="true" onClick="modificarServidorP('.$id_lugares_p.','.$numero.')"></span>';
    }
    else{
       
            $query_insert_nuevo="UPDATE mas_lugares SET Nombreforo='$Nombreforo', 
cpforo='$cpforo',
estadoforo='$estadoforo',
mun_alcforo='$mun_alcforo', 
coloniaforo='$coloniaforo',
calleforo='$calleforo', 
no_extforo='$no_extforo', 
no_intforo='$no_intforo', 
            Descripcionlug='$Descripcionlug', fecha_hora_registro='NOW()'
                    WHERE mas_lugares.id_lugares = $id_lugares_p";
            $res_nuevo=mysqli_query($con, $query_insert_nuevo);
            if($res_nuevo){
                echo '<script type=\"text/javascript\">
					$("#divError").hide();
                    $("#texto2").html("<strong>¡Felicidades!</strong>, se actualizó correctamente la información.");
                    $("#divsucces6").show();
                    </script>';
            }
            else{
                echo '<script type=\"text/javascript\">
                $("#texto").html("<strong>¡Error!</strong> al guardar el registro. Por favor verifica.");
                $("#divError").show();
                var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#Guardar_Servidor_P").attr("disabled", false);
                </script>';
            }            
			
      
    }
}
?>