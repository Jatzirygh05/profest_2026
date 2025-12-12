<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($con, $database_automaa);

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

//print_r($_POST);
//foreach($_POST as $nombre_campo => $valor){ 
//$asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
//eval($asignacion); 
//echo $asignacion."<br>";
////unset($_POST["$nombre_campo"]);
//}
//$clve_usuario='jatziry30';
        
$Nombreforo=(isset($_POST['Nombreforo'])?trim(utf8_decode($_POST['Nombreforo'])):NULL);
$tipo_lugar=(isset($_POST['tipo_lugar'])?trim(utf8_decode($_POST['tipo_lugar'])):NULL);
$cpforo=(isset($_POST['cpforo'])?trim(utf8_decode($_POST['cpforo'])):NULL);
$estadoforo=(isset($_POST['estadoforo'])?trim(utf8_decode($_POST['estadoforo'])):NULL);
$mun_alcforo=(isset($_POST['mun_alcforo'])?trim(utf8_decode($_POST['mun_alcforo'])):NULL);
$coloniaforo=(isset($_POST['coloniaforo'])?trim(utf8_decode($_POST['coloniaforo'])):NULL);
$calleforo=(isset($_POST['calleforo'])?trim(utf8_decode($_POST['calleforo'])):NULL);
$no_intforo=(isset($_POST['no_intforo'])?trim(utf8_decode($_POST['no_intforo'])):NULL);
$no_extforo=(isset($_POST['no_extforo'])?trim(utf8_decode($_POST['no_extforo'])):NULL);
$Descripcionlug=(isset($_POST['Descripcionlug'])?trim(utf8_decode($_POST['Descripcionlug'])):NULL);


/*if($tipo_lugar==2){
    if($Nombreforo!=NULL && $Descripcionlug!=NULL){
        
         $query_insert_nuevo="INSERT INTO mas_lugares (id_lugares, clave_usuario, Nombreforo, Descripcionlug, tipo_lugar, fecha_hora_registro)
            VALUES (NULL, '$cve_user', '$Nombreforo', '$tipo_lugar', NOW())";
            $res_nuevo=mysqli_query($con, $query_insert_nuevo);
            if($res_nuevo){ 
                    
                    echo '<script type=\"text/javascript\">
                    $("#Guardar_Servidor_P").attr("disabled", false);
                    document.getElementById("Nombreforo").value="";
                    document.getElementById("Descripcionlug").value="";
                    $("#panel-01").hide();
                    $("#texto2").html("<strong>¡Felicidades!</strong>, se guardo correctamente el registro.");
                    $("#divsucces6").show();
                    $("#divError").hide();
                    $(window).scrollTop(scrollPos); var scrollPos =  $("#contenedor_divError").offset().top;
                    $(window).scrollTop(scrollPos);
                    $("#totalcont").load( "catalogo_lugares.php?recurso=recargar" );
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
    }else{
        echo "Datos vacios";
    }



} elseif ($tipo_lugar==1) {
   

if($Nombreforo!=NULL && $cpforo!=NULL && $estadoforo!=NULL && $mun_alcforo!=NULL && $coloniaforo!=NULL && $calleforo!=NULL && $no_extforo!=NULL && $no_intforo!=NULL && $Descripcionlug!=NULL){*/
    
     $query_insert_nuevo="INSERT INTO mas_lugares (id_lugares, clave_usuario, Nombreforo, 
        cpforo,
        estadoforo,
        mun_alcforo, 
        coloniaforo,
        calleforo, 
        no_extforo, 
        no_intforo, 
        Descripcionlug, tipo_lugar, fecha_hora_registro)
        VALUES (NULL, '$cve_user', '$Nombreforo', 
        '$cpforo',
        '$estadoforo',
        '$mun_alcforo', 
        '$coloniaforo',
        '$calleforo', 
        '$no_extforo', 
        '$no_intforo', 
        '$Descripcionlug', $tipo_lugar, NOW())";
        $res_nuevo=mysqli_query($con, $query_insert_nuevo);
        if($res_nuevo){ 
		
		/*<script type=\"text/javascript\">$("#texto2").html("<strong>¡Felicidades!</strong>, se guardo correctamente el registro.");
                $("#divsucces").show();
                var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#totalcont").html("");
                $("#totalcont").load( "catalogo_lugares.php?recurso=recargar" );
                </script>';*/
         /* funcionaba cuando no mostraba alertas   echo '<script type=\"text/javascript\">
                $("#texto2").html("<strong>¡Felicidades!</strong>, se guardo correctamente el registro.");
                var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#totalcont").html("");
                $("#totalcont").load( "catalogo_lugares.php?recurso=recargar" );
                </script>';*/
				
				echo '<script type=\"text/javascript\">
				$("#Guardar_Servidor_P").attr("disabled", false);
				document.getElementById("Nombreforo").value="";
                document.getElementById("cpforo").value="";
                document.getElementById("estadoforo").value="";
                document.getElementById("mun_alcforo").value="";
                document.getElementById("coloniaforo").value="";
                document.getElementById("calleforo").value=""; 
                document.getElementById("no_extforo").value="";
                document.getElementById("no_intforo").value="";
				document.getElementById("Descripcionlug").value="";
				$("#panel-01").hide();
                $("#texto2").html("<strong>¡Felicidades!</strong>, se guardo correctamente el registro.");
                $("#divsucces6").show();
				$("#divError").hide();
				$(window).scrollTop(scrollPos); var scrollPos =  $("#contenedor_divError").offset().top;
                $(window).scrollTop(scrollPos);
                $("#totalcont").load( "catalogo_lugares.php?recurso=recargar" );
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
/*}
else{
    echo "Datos vacios";
}*/
?>
