<?php
//require_once('especifico_datos.php');
require_once('Connections/conexion.php');
//mysqli_select_db($con, $database_automaa);

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

$recurso2=("si");
$AC_busca_CURP=(isset($_GET['AC_busca_CURP'])?$_GET['AC_busca_CURP']:NULL);
$returna="";
$conta=1;

$RegistrosAMostrar2=60;
//estos valores los recibo por GET
if(isset($_GET['pag'])){
        if($_GET['pag']!=0){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar2;
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
$sel_cuantos="SELECT * FROM mas_presupuesto WHERE clave_usuario='".$cve_user."'";
$exe_res_total=  mysqli_query($con, $sel_cuantos);
$Nro_desh_boton = mysqli_num_rows($exe_res_total);


?>
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
	<script type="text/javascript" src="js/formato_montos.js"></script>
          <script type="text/javascript" src="js/obten_porcentaje.js"></script>	        
          <style>
            .obten_porcentaje{
            }
        </style>


<div class="row">
      <div class="col-md-12">
         <button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#panel-04" <?php if($Nro_desh_boton>=50){ ?> disabled="disabled" <?php } ?>>
             <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Agregar opci&oacute;n
         </button>		
      </div>
</div>

 <!-- INICIO esta lineas estaban en el index arriba del php que manda a llamar a todo el codigo -->
<div class="row top-buffer">
	<div class="col-md-12" id="contenedor_divError">
                <div class="alert alert-danger" id="divError8a" hidden="hidden">
                    <!--<div class="alert alert-danger alert-dismissible" id="divError" style="display: none;">-->
                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <p id="texto8a">
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedor_divsucces">
                    <div class="alert alert-success" id="divsucces8" hidden="hidden">
                    <!--<div class="alert alert-danger alert-dismissible" id="divError" style="display: none;">-->
                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <p id="texto8">
                        </p>
                    </div>
	</div>
</div>
<!-- FIN esta lineas estaban en el index arriba del php que manda a llamar a todo el codigo -->

<div class="row">
      <div class="col-md-12">
<?php
if($recurso2 != NULL){
    $returna .= '<div class="table-responsive">
	<table class="table">';
    $returna .= "<tr>
    <td><strong>C&oacute;digo</strong></td>
    <td><strong>Concepto de gasto<span class='glyphicon glyphicon glyphicon-question-sign' aria-hidden='tru' data-placement='left' title='Desglosar los conceptos del presupuesto general del proyecto.'></span></strong></td>
    <td><strong>Fuente de financiamiento<span class='glyphicon glyphicon glyphicon-question-sign' aria-hidden='true' data-placement='left' title='Procedencia del recurso (Institucional Estatal, Institucional Municipal, Institucional Federal PROFEST, Privada).'></span></strong></td>
    <td><strong>Monto/unidad<span class='glyphicon glyphicon glyphicon-question-sign' aria-hidden='true' data-placement='left' title='Cantidad de aportación (puede ser monetaria o en especie).'></span></strong></td>
    <td><strong>Porcentaje<span class='glyphicon glyphicon glyphicon-question-sign' aria-hidden='true' data-placement='left' title='Porcentaje que representa el gasto referido dentro del presupuesto global.'></span></strong></td>
	<td></td>
	<td></td>
	<td></td>
    </tr>";
    if ($AC_busca_CURP!=NULL){
        $query_user2="SELECT * FROM mas_presupuesto
        WHERE Concepto_gasto LIKE '%$AC_busca_CURP%'
        and clave_usuario='$cve_user'
        ORDER BY id_presupuesto
        LIMIT $RegistrosAEmpezar, $RegistrosAMostrar2";
        $variable2=1;
    }
    else{
    $query_user2="SELECT * FROM mas_presupuesto
        where clave_usuario='$cve_user'
        ORDER BY id_presupuesto
        LIMIT $RegistrosAEmpezar, $RegistrosAMostrar2";
        $variable2=2;
    }
    
    $res_user2 =  mysqli_query($con, $query_user2);
    while ($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
        $id_presupuesto=$fila2['id_presupuesto'];
        $Concepto_gasto=$fila2['Concepto_gasto'];
        $Fuente_finan=utf8_encode($fila2['Fuente_finan']);
        $Monto_unidad=$fila2['Monto_unidad'];
		$Porcentaje=$fila2['Porcentaje'];
		
		$query_ver="SELECT * FROM `catalogo_concepto_gastos` where id_gasto='".$Concepto_gasto."'";
		$result_ver = mysqli_query($con, $query_ver);
		 
		 
		 $query="SELECT * FROM `catalogo_concepto_gastos`";
		 $result = mysqli_query($con, $query);
			
			
		$returna .= "<tr>
        <td> <strong>".$conta."</strong> </td>
        <td>
		<select class='form-control proyectocampo_varios_presupuesto' name='Concepto_gasto_P'".$conta."' id='Concepto_gasto_P'".$conta."'>'";
		
						while($renglon_ver = mysqli_fetch_row($result_ver)){
						$valor_ver=$renglon_ver[0];
						$imp_texto_ver=$renglon_ver[1];        	 
							  $returna .="<option value=".$valor_ver." selected>".utf8_encode($imp_texto_ver)."</option>"; 
						}
						while($renglon = mysqli_fetch_row($result))
						{	
					   		  $valor=$renglon[0];
							  $imp_texto=$renglon[1];
							  $returna .="<option value=".$valor."-".$id_presupuesto.">".utf8_encode($imp_texto)."</option>";
						}	
						
		 
		
        $returna .= "</select>
		</td>
        <td><select class='form-control proyectocampo_varios_presupuesto' name='Fuente_finan_P".$conta."' id='Fuente_finan_P".$conta."'>
			<option value=".$Fuente_finan." selected>".$Fuente_finan."</option>
			<option value='Institucional Estatal-".$id_presupuesto."'>Institucional Estatal</option>
			<option value='Institucional Municipal-".$id_presupuesto."'>Institucional Municipal</option>
			<option value='Institucional Federal PROFEST-".$id_presupuesto."'>Institucional Federal PROFEST</option>
			<option value='Institucional Educación Superior-".$id_presupuesto."'>Institucional Educación Superior</option>
			<option value='Privada-".$id_presupuesto."'>Privada</option>			
		</select>		
		</td>
        <td>
		<input type='hidden' name='id_presupuesto".$conta."' id='id_presupuesto".$conta."' value='".$id_presupuesto."'>
		
		<input class='form-control obten_porcentaje' type='text' name='Monto_unidad_P".$conta."' id='Monto_unidad_P".$conta."' value='".$Monto_unidad."'  placeholder='0.00'></td>
		<td><input class='form-control' type='text' name='Porcentaje_P".$conta."' id='Porcentaje_P".$conta."' value='".$Porcentaje."'  placeholder='0.00' readonly='readonly'></td>
        <td align='center'>
            <div id='borrada".$conta."'>
                <span class='glyphicon glyphicon-trash' aria-hidden='true' onClick='eliminarPresupuestoP(".$id_presupuesto.",".$conta.")'></span>
            </div>
        </td>
        </tr>
        ";
        $conta++;
    }
    $returna .= "</table></div>";
    echo $returna;
    if ($variable2==1){
        $total_usuarios2="SELECT * FROM mas_presupuesto WHERE Concepto_gasto LIKE '%$AC_busca_CURP%'
        and clave_usuario='$cve_user'";
    }
    if ($variable2==2)
    {
        $total_usuarios2="SELECT * FROM mas_presupuesto
        WHERE clave_usuario='$cve_user'";
    }
    $res_total2=  mysqli_query($con, $total_usuarios2);
    $NroRegistros2 = mysqli_num_rows($res_total2);
    
    $criterio2=null;
    $criterio2_tipo=null;
    $PagPrimera2=1;
    $PagAnt2=$PagAct-1;
    $PagSig2=$PagAct+1;
    $PagUlt2=$NroRegistros2/$RegistrosAMostrar2;
    
    $Res=$NroRegistros2%$RegistrosAMostrar2;
    if($Res>0) $PagUlt2=floor($PagUlt2)+1;
    
   /* echo '<div class="gobmx-example" id="presupuesto">
    <ul class="pagination">';
    
    if($PagAct>1){
    //echo "<a href=../reportes/usuarios/consulta_usuarios.php?pag=".$PagPrimera2."&recurso=usuarios id='primero2'> Primero</a>";
    echo '<li>
            <a href="#presupuesto" id="primero_presupuesto">«</a>
            <input type="hidden" value="'.$PagPrimera2.'" id="primero_presupuesto_hidden">
          </li>';
    }
    if($PagAct>1){
    //echo "<a href=../reportes/usuarios/consulta_usuarios.php?pag=".$PagAnt2."&recurso=usuarios id='anterior2'> Anterior</a>";
    echo '<li>
            <a href="#presupuesto" id="anterior_presupuesto">Anterior</a>
            <input type="hidden" value="'.$PagAnt2.'" id="anterior_presupuesto_hidden">
        </li>';
    }
    if($PagAct<$PagUlt2){
    //echo "<a href=../reportes/usuarios/consulta_usuarios.php?pag=".$PagSig2."&recurso=usuarios id='siguiente2'> Siguiente</a>";
    echo '<li>
            <a href="#presupuesto" id="siguiente_presupuesto">Siguiente</a>
            <input type="hidden" value="'.$PagSig2.'" id="siguiente_presupuesto_hidden">
        </li>';
    }
    //echo "<a href=../reportes/usuarios/consulta_usuarios.php?pag=".$PagUlt2."&recurso=usuarios id='ultimo2'> Ultimo</a>";
    echo '<li>
            <a href="#presupuesto" id="ultimo_presupuesto">>></a>
            <input type="hidden" value="'.$PagUlt2.'" id="ultimo_presupuesto_hidden">
        </li>';
    echo "<li><strong>&nbsp;&nbsp;P&aacute;gina ".$PagAct."/".$PagUlt2."</strong></li>";
    echo ' </ul>
           </div>';*/
    ?>
</div>
</div>
	<div id="panel-04" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">					
						<div class="modal-header">						
						<h4 class="modal-title">Agregar presupuesto</h4>
					</div>
					<div class="modal-body">
					 <form role="form">
                                                <div class="form-group">
                                                    <label class="control-label" for="Concepto_gasto">Concepto de gasto:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Desglosar los conceptos del presupuesto general del proyecto."></span></label>                                                    
                                                    <select class='form-control' name='Concepto_gasto' id='Concepto_gasto'>
                                                        <?php echo $combobit; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="Fuente_finan">Fuente de financiamiento:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Procedencia del recurso (institucional, social o privada)."></span></label>
                                                    <!--input class="form-control" id="Fuente_finan" placeholder="Fuente de financiamiento" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"-->
													
													<select class='form-control' name='Fuente_finan' id='Fuente_finan'>
														<option value="" selected="selected">Selecciona opci&oacute;n</option>
                                                        <option value='Institucional Estatal'>Institucional Estatal</option>
                                                        <option value='Institucional Municipal'>Institucional Municipal</option>
                                                        <option value='Institucional Federal PROFEST'>Institucional Federal PROFEST</option>
                                                        <option value='Institucional Educación Superior'>Institucional Educación Superior</option>
                                                        <option value='Privada'>Privada</option>			
													</select>	
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label obten_porcentaje" for="Monto_unidad">Monto/unidad:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cantidad de aportación (puede ser monetaria o en especie)."></span></label>
                                                    <input class="form-control obten_porcentaje" id="Monto_unidad" placeholder="0.00" type="text" onBlur="MASK(this,this.value,'-$##,###,##0.00',1)">
                                                </div>	
												<div class="form-group">
                                                    <label class="control-label" for="Porcentaje">Porcentaje:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Porcentaje que representa el gasto referido dentro del presupuesto global."></span></label>
                                                    <input class="form-control" id="Porcentaje" placeholder="0.00" type="number" readonly="" >
                                                </div>
                                                
												<div class="modal-footer">
													<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
													<!--input type="submit" class="btn btn-success" value="Guardar datos"-->
													<button class="btn btn-success" type="button" id="Guardar_Presupuesto_P">Guardar</button>
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
