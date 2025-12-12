<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($con, $database_automaa);

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];


$recurso=("si");
$AC_busca_CURP=(isset($_GET['AC_busca_CURP'])?$_GET['AC_busca_CURP']:NULL);
$return="";
$cont=1;

$RegistrosAMostrar=60;
//estos valores los recibo por GET
if(isset($_GET['pag'])){
        if($_GET['pag']!=0){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
        $PagAct=$_GET['pag'];
        }
        else{
        $RegistrosAEmpezar=0;
        $PagAct=1;
        }
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
}
//$clve_usuario='jatziry30';
$sel_cuantos="SELECT * FROM mas_lugares WHERE clave_usuario='".$cve_user."'";
$exe_res_total=  mysqli_query($con, $sel_cuantos);
$Nro_desh_boton = mysqli_num_rows($exe_res_total);

?>

<div class="row">
      <div class="col-md-12">
         <button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#panel-01" <?php if($Nro_desh_boton>=50){ ?> disabled="disabled" <?php } ?>>
             <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Agregar foro
         </button>		
      </div>
</div>

 <!-- INICIO esta lineas estaban en el index arriba del php que manda a llamar a todo el codigo -->
<div class="row top-buffer">
	<div class="col-md-12" id="contenedor_divError">
                <div class="alert alert-danger" id="divError" hidden="hidden">
                    <!--<div class="alert alert-danger alert-dismissible" id="divError" style="display: none;">-->
                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <p id="texto">
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedor_divsucces">
                    <div class="alert alert-success" id="divsucces6" hidden="hidden">
                    <!--<div class="alert alert-danger alert-dismissible" id="divError" style="display: none;">-->
                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <p id="texto2">
                        </p>
                    </div>
	</div>
</div>
<!-- FIN esta lineas estaban en el index arriba del php que manda a llamar a todo el codigo -->

<div class="row">
      <div class="col-md-12">
<?php
if($recurso != NULL){
    $return .= '<div class="table-responsive">
	<table class="table">';
    $return .= "<tr>
    <td><strong>Código</strong></td>
    <td><strong>Nombre foro</strong></td>
    <td><strong>Código Póstal</strong></td>
    <td><strong>Estado</strong></td>
    <td><strong>Municipio o Alcaldía</strong></td>
    <td><strong>Colonia</strong></td>
    <td><strong>Calle</strong></td>
    <td><strong>No. exterior</strong></td>
    <td><strong>No. interior</strong></td>
    <td><strong>Descripción</strong></td>
    <td></td>
    <td></td>
    </tr>";
    if ($AC_busca_CURP!=NULL){
        $query_user="SELECT * FROM mas_lugares
        WHERE Nombreforo LIKE '%$AC_busca_CURP%'
        and clave_usuario='$cve_user'
        ORDER BY id_lugares
        LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
        $variable=1;
    }
    else{
    $query_user="SELECT * FROM mas_lugares
        where clave_usuario='$cve_user'
        ORDER BY id_lugares
        LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
        $variable=2;
    }
    
    $res_user =  mysqli_query($con, $query_user);
    while ($fila=mysqli_fetch_array($res_user, MYSQLI_ASSOC)){
        $id_lugares=$fila['id_lugares'];
        $Nombreforo=$fila['Nombreforo'];
        $Descripcionlug=$fila['Descripcionlug'];
        $cpforo=$fila['cpforo'];
        $estadoforo=$fila['estadoforo'];
        $mun_alcforo=$fila['mun_alcforo'];
        $coloniaforo=$fila['coloniaforo'];
        $calleforo=$fila['calleforo'];
        $no_extforo=$fila['no_extforo'];
        $no_intforo=$fila['no_intforo'];
		/*<div id='modificado".$cont."'>
                <span class='glyphicon glyphicon-floppy-save' aria-hidden='true' onClick='modificarServidorP(".$id_lugares.",".$cont.")'></span>
            </div>*/
        $return .= "<tr>
        <td> <strong>".$cont."</strong> </td>
        <td><input class='form-control' type='text' name='Curp_Servidor".$cont."' id='Curp_Servidor".$cont."' value='".utf8_encode($Nombreforo)."'></td>

       <td><input class='form-control' type='text' name='cpforo".$cont."' id='cpforo".$cont."' value='".$cpforo."' maxlength='5' onKeyPress='return evita_comas(event)'></td>
       <td><input class='form-control' type='text' name='estadoforo".$cont."' id='estadoforo".$cont."' value='".utf8_encode($estadoforo)."'></td>
       <td><input class='form-control' type='text' name='mun_alcforo".$cont."' id='mun_alcforo".$cont."' value='".utf8_encode($mun_alcforo)."'></td>
       <td><input class='form-control' type='text' name='coloniaforo".$cont."' id='coloniaforo".$cont."' value='".utf8_encode($coloniaforo)."'></td>
       <td><input class='form-control' type='text' name='calleforo".$cont."' id='calleforo".$cont."' value='".utf8_encode($calleforo)."'></td>
       <td><input class='form-control' type='text' name='no_extforo".$cont."' id='no_extforo".$cont."' value='".utf8_encode($no_extforo)."'></td>
       <td><input class='form-control' type='text' name='no_intforo".$cont."' id='no_intforo".$cont."' value='".utf8_encode($no_intforo)."'></td>

        <td><input class='form-control' style='width: 225px;' type='text' name='Tipo_Servidor_P".$cont."' id='Tipo_Servidor_P".$cont."' value='".utf8_encode($Descripcionlug)."'></td>
        <td> 
		
		<span class='glyphicon glyphicon-floppy-save' aria-hidden='true' onClick='modificarServidorP(".$id_lugares.",".$cont.")'></span>
		
        </td>
        <td align='center'>
            <div id='borrado".$cont."'>
                <span class='glyphicon glyphicon-trash' aria-hidden='true' onClick='eliminarServidorP(".$id_lugares.",".$cont.")'></span>
            </div>
        </td>
        </tr>
        ";
        $cont++;
		
    }
    $return .= "</table></div>";
    echo $return;
    if ($variable==1){
        $total_usuarios="SELECT * FROM mas_lugares WHERE Nombreforo LIKE '%$AC_busca_CURP%'
        and clave_usuario='$cve_user'";
    }
    if ($variable==2)
    {
        $total_usuarios="SELECT * FROM mas_lugares
        WHERE clave_usuario='$cve_user'";
    }
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
    
    /*echo '<div class="gobmx-example" id="usuarios">
    <ul class="pagination">';
    
    if($PagAct>1){
    //echo "<a href=../reportes/usuarios/consulta_usuarios.php?pag=".$PagPrimera."&recurso=usuarios id='primero'> Primero</a>";
    echo '<li>
            <a href="#usuarios" id="primero">«</a>
            <input type="hidden" value="'.$PagPrimera.'" id="primero_hidden">
          </li>';
    }
    if($PagAct>1){
    //echo "<a href=../reportes/usuarios/consulta_usuarios.php?pag=".$PagAnt."&recurso=usuarios id='anterior'> Anterior</a>";
    echo '<li>
            <a href="#usuarios" id="anterior">Anterior</a>
            <input type="hidden" value="'.$PagAnt.'" id="anterior_hidden">
        </li>';
    }
    if($PagAct<$PagUlt){
    //echo "<a href=../reportes/usuarios/consulta_usuarios.php?pag=".$PagSig."&recurso=usuarios id='siguiente'> Siguiente</a>";
    echo '<li>
            <a href="#usuarios" id="siguiente">Siguiente</a>
            <input type="hidden" value="'.$PagSig.'" id="siguiente_hidden">
        </li>';
    }
    //echo "<a href=../reportes/usuarios/consulta_usuarios.php?pag=".$PagUlt."&recurso=usuarios id='ultimo'> Ultimo</a>";
    echo '<li>
            <a href="#usuarios" id="ultimo">>></a>
            <input type="hidden" value="'.$PagUlt.'" id="ultimo_hidden">
        </li>';
    echo "<li><strong>&nbsp;&nbsp;Página".$PagAct."/".$PagUlt."</strong></li>";
    echo ' </ul>
           </div>';*/
    ?>
</div>
</div>
	<div id="panel-01" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">					
				<div class="modal-header">						
					<h4 class="modal-title">Agregar lugares</h4>
			    </div>
    			<div class="modal-body">
    				<form role="form">
                        <div class="form-group">
                            <label class="control-label" for="Curp_Servidor">Nombre foro*:</label>
                            <input class="form-control" id="Nombreforo" placeholder="Nombre foro" type="text">
                        </div>
                        <?php /*div class="form-group">
                            <label class="control-label" for="nombre_Servdor_P">Domicilio*:</label>
                            <input class="form-control" id="Domicilioforo" placeholder="Domicilio foro" type="text">
                        </div*/?>
                        <div class="form-group">
                            <label class="control-label" for="cpforo">Código Postal*:</label>
                            <input class="form-control proyectocampo" id="cpforo" name="cpforo" placeholder="Código Postal" type="text" maxlength="5" onKeyPress="return evita_comas(event)">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="estadoforo">Estado*:</label>
                            <input class="form-control proyectocampo" id="estadoforo" name="estadoforo" placeholder="Estado" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="mun_alcforo">Municipio o Alcaldía*:</label>
                            <input class="form-control proyectocampo" id="mun_alcforo" name="mun_alcforo" placeholder="Municipio o Alcaldía" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="coloniaforo">Colonia*:</label>
                            <input class="form-control proyectocampo" id="coloniaforo" name="coloniaforo" placeholder="Colonia" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="calleforo">Calle*:</label>
                            <input class="form-control proyectocampo" id="calleforo" name="calleforo" placeholder="Calle" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="no_extforo">No. exterior*:</label>
                            <input class="form-control proyectocampo" id="no_extforo" name="no_extforo" placeholder="No. exterior" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="no_intforo">No. interior*:</label>
                            <input class="form-control proyectocampo" id="no_intforo" name="no_intforo" placeholder="No. interior" type="text">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Tipo_Servidor_P">Descripci&oacute;n*:</label>
                            <input class="form-control" id="Descripcionlug" placeholder="Descripción lugar" type="text">
                        </div>

                        <div class="modal-footer">
    					    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
    						<!--input type="submit" class="btn btn-success" value="Guardar datos"-->
    						<button class="btn btn-success" type="button" id="Guardar_Servidor_P">Guardar</button>
    					</div>
    				</form>
    			</div>
			</div>
		</div>
	</div>
<?php
}
else{
    echo "No hay datos";
}
?>
