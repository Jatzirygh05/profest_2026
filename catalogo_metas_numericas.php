<?php require_once('Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) { session_start(); }
$cve_user = $_SESSION['MM_Username'];

$recurso=("si");
$AC_busca_CURP=(isset($_GET['AC_busca_CURP'])?$_GET['AC_busca_CURP']:NULL);
$return="";
$conte=1;

$RegistrosAMostrar=60;
//estos valores los recibo por GET
if(isset($_GET['pag'])){
        if($_GET['pag']!=0){ $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
        $PagAct=$_GET['pag'];
        } else{ $RegistrosAEmpezar=0;
        $PagAct=1;
        }
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
}
//$clve_usuario='jatziry30';

mysqli_query("SET NAMES 'utf8'");

$sel_cuantos="SELECT * FROM mas_metas_numericas WHERE clave_usuario='".$cve_user."'";
$exe_res_total=  mysqli_query($con, $sel_cuantos);
$Nro_desh_boton = mysqli_num_rows($exe_res_total);
?>
    <!--link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet"-->
 <!-- INICIO esta lineas estaban en el index arriba del php que manda a llamar a todo el codigo -->
<div class="row top-buffer">
                <div class="col-md-12" id="contenedor_divError">
                    <div class="alert alert-danger" id="divError1a" hidden="hidden">
                    <!--<div class="alert alert-danger alert-dismissible" id="divError" style="display: none;">-->
                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <p id="texto1a">
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedor_divsucces">
                    <div class="alert alert-success" id="divsucces1" hidden="hidden">
                    <!--<div class="alert alert-danger alert-dismissible" id="divError" style="display: none;">-->
                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <p id="texto1">
                        </p>
                    </div>
    </div>
</div>
<!-- FIN esta lineas estaban en el index arriba del php que manda a llamar a todo el codigo -->
<div class="row">
      <div class="col-md-12">
<?php
if($recurso != NULL){
    $return .= '<div class="table-responsive" id="refresca_meta"><table class="table">';
    $return .= "<tr><td><strong>C&oacute;digo</strong></td><td><strong>Nombre de la meta</strong></td><td><strong>Cantidad</strong></td><td></td>
    <td></td></tr>";
    if ($AC_busca_CURP!=NULL){
        $query_user="SELECT * FROM mas_metas_numericas WHERE Nombreforo LIKE '%$AC_busca_CURP%' and clave_usuario='$clve_usuario' ORDER BY id_meta
        LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
        $variable=1;
    }
    else{
$query_user="SELECT * FROM mas_metas_numericas where clave_usuario='".$cve_user."' ORDER BY id_meta LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
$variable=2;
    }
    $res_user =  mysqli_query($con,$query_user);
    while ($fila=mysqli_fetch_array($res_user, MYSQLI_ASSOC)){
        $id_meta=$fila['id_meta'];
        $nombre_meta_numerica=$fila['nombre_meta_numerica'];
        $meta_cantidad=$fila['meta_cantidad'];
        $return .= "<tr><td><strong>".$conte."</strong></td><td><input class='form-control' type='text' name='nombre_meta_numerica_P".$conte."' id='nombre_meta_numerica_P".$conte."' value='".$nombre_meta_numerica."'></td><td><input class='form-control' type='text' name='meta_cantidad_P".$conte."' id='meta_cantidad_P".$conte."' value='".$meta_cantidad."' onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td><td align='center'><div id='modificado".$conte."'><span class='glyphicon glyphicon-floppy-save' aria-hidden='true' onClick='modificarMetaP(".$id_meta.",".$conte.")'></span></div></td><td align='center'><div id='borrado".$conte."'><span class='glyphicon glyphicon-trash' aria-hidden='true' onClick='eliminarMetaP(".$id_meta.",".$conte.")'></span></div></td></tr>";
        $conte++;
    }
    $return .= "</table></div>";
    echo $return;
    if ($variable==1){ $total_usuarios="SELECT * FROM mas_metas_numericas WHERE nombre_meta_numerica LIKE '%$AC_busca_CURP%' and clave_usuario='".$cve_user."'";
    }
    if ($variable==2){ $total_usuarios="SELECT * FROM mas_metas_numericas WHERE clave_usuario='".$cve_user."'"; }
    $res_total=  mysqli_query($con, $total_usuarios);
    $NroRegistros = mysqli_num_rows($res_total);
    
    $criterio=null;
    $criterio_tipo=null;
    $PagPrimera=1;
    $PagAnt=$PagAct-1;
    $PagSig=$PagAct+1;
    $PagUlt=$NroRegistros/$RegistrosAMostrar;
    
    $Res=$NroRegistros%$RegistrosAMostrar;
    if($Res>0) $PagUlt=floor($PagUlt)+1;    
    ?>
</div>
</div>
<?php
}
else{
    echo "No hay datos";
}
?>
