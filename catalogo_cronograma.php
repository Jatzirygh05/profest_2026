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
$conteo=1;

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

$sel_cuantos="SELECT clave_usuario FROM cronograma_acciones_ejecucion_festival WHERE clave_usuario='".$cve_user."'";
$exe_res_total=  mysqli_query($con, $sel_cuantos);
$Nro_desh_boton = mysqli_num_rows($exe_res_total);
	
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <style>
    .validafecha_unico{
		}
	.validafecha_final{
		}			
	.validafecha_VARIOS{
		}
	.validafecha_DOS{
		}
    </style>  
<div id="contanido_tab_3">
	
<div class="row">
      <div class="col-md-12">
         <button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#panel-077" <?php if($Nro_desh_boton>=50){ ?> disabled="disabled" <?php } ?>>
             <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Agregar acción
         </button>		
      </div>
</div>

 <!-- INICIO esta lineas estaban en el index arriba del php que manda a llamar a todo el codigo -->
<div class="row top-buffer">
				<div class="col-md-12" id="contenedor_divError">
                <div class="alert alert-danger" id="divError_crono" hidden="hidden">
                    <!--<div class="alert alert-danger alert-dismissible" id="divError" style="display: none;">-->
                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <p id="texto_crono">
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedor_divsucces">
                    <div class="alert alert-success" id="divsucces5" hidden="hidden">
                    <!--<div class="alert alert-danger alert-dismissible" id="divError" style="display: none;">-->
                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                        <p id="texto5">
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
    <td><strong>C&oacute;digo</strong></td>
    <td><strong>Fecha inicio</strong></td>
	<td><strong>Fecha fin</strong></td>
    <td><strong>Acciones</strong></td>
    <td></td>
    <td></td>
    </tr>";
    if ($AC_busca_CURP!=NULL){
        $query_user="SELECT * FROM cronograma_acciones_ejecucion_festival
        WHERE fechaacciones LIKE '%$AC_busca_CURP%'
        and clave_usuario='$clve_usuario'
        ORDER BY id_cronograma_acciones
        LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
        $variable=1;
    }
    else{
    $query_user="SELECT * FROM cronograma_acciones_ejecucion_festival
        where clave_usuario='".$cve_user."'
        ORDER BY id_cronograma_acciones
        LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
        $variable=2;
    }
	
    $res_user =  mysqli_query($con,$query_user);
    while ($fila=mysqli_fetch_array($res_user, MYSQLI_ASSOC)){
        $id_cronograma_acciones=$fila['id_cronograma_acciones'];
        $fechaacciones=$fila['fechaacciones'];
		$fechaacciones_fin=$fila['fechaacciones_fin'];
        $acciones=utf8_encode($fila['acciones']);
		
        $return .= "<tr>
        <td> <strong>".$conteo."</strong> </td>
        <td>
		<div class='form-group datepicker-group'>
		<input class='form-control validafecha_VARIOS' type='text' name='fechaacciones_P".$conteo."' id='fechaacciones_P".$conteo."' value='".$fechaacciones."' placeholder='dd/mm/aaaa'>
		<span class='glyphicon glyphicon-calendar' aria-hidden='true'></span>
        <small id='errfechacrono_unico_mod_P".$conteo."' name='errfechacrono_unico_mod_P".$conteo."' class='form-text form-text-error' style='display:none'>Ingresa una fecha valida</small>
		</div>
		</td>
		<td>
		<div class='form-group datepicker-group'>
		<input class='form-control validafecha_DOS' type='text' name='fechaacciones_fin_P".$conteo."' id='fechaacciones_fin_P".$conteo."' value='".$fechaacciones_fin."' placeholder='dd/mm/aaaa'>
		<span class='glyphicon glyphicon-calendar' aria-hidden='true'></span>
		<small id='errfechacrono_unico_mod_fin_P".$conteo."' name='errfechacrono_unico_mod_fin_P".$conteo."' class='form-text form-text-error' style='display:none'>Ingresa una fecha valida</small>
		</div>
		</td>
        <td><input class='form-control' type='text' name='acciones_P".$conteo."' id='acciones_P".$conteo."' value='".$acciones."'></td>
        <td align='center'> 
            <div id='modificado".$conteo."'>
                <span class='glyphicon glyphicon-floppy-save' aria-hidden='true' onClick='modificar_crono_P(".$id_cronograma_acciones.",".$conteo.")'></span>
            </div>
        </td>
        <td align='center'>
            <div id='borrado".$conteo."'>
                <span class='glyphicon glyphicon-trash' aria-hidden='true' onClick='eliminar_crono_P(".$id_cronograma_acciones.",".$conteo.")'></span>
            </div>
        </td>
        </tr>
        ";
        $conteo++;
    }
    $return .= "</table></div>";
    $return .="<input type='hidden' name='conteo' id='conteo' value='".$conteo."'>";
    echo $return;
    if ($variable==1){
        $total_usuarios="SELECT * FROM cronograma_acciones_ejecucion_festival WHERE fechaacciones LIKE '%$AC_busca_CURP%'
        and clave_usuario='".$cve_user."'";
    }
    if ($variable==2)
    {
        $total_usuarios="SELECT * FROM cronograma_acciones_ejecucion_festival
        WHERE clave_usuario='".$cve_user."'";
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
    
    ?>
</div>
</div>
	<div id="panel-077" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">					
					<div class="modal-header">						
						<h4 class="modal-title">Agregar acci&oacute;n</h4>
					</div>
					<div class="modal-body">
					 <form role="form">
                          <div class="form-group datepicker-group">
							<label class="control-label" for="calendar">Fecha inicio:</label>
								<input type="text" name="fechaacciones" id="fechaacciones" class="form-control validafecha_unico" placeholder="dd/mm/aaaa"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                <small id="errfechacrono_unico" name="errfechacrono_unico" class="form-text form-text-error" style="display:none">Ingresa una fecha valida</small>
						   </div>
                            <div class="form-group datepicker-group">
							<label class="control-label" for="calendar">Fecha fin:</label>
								<input type="text" name="fechaacciones_fin" id="fechaacciones_fin" class="form-control validafecha_final" placeholder="dd/mm/aaaa">
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                <small id="errfechacrono_unico_fin" name="errfechacrono_unico_fin" class="form-text form-text-error" style="display:none">Ingresa una fecha valida</small>
						   </div>
                          <div class="form-group">
                              <label class="control-label" for="meta_cantidad">Acciones:</label>
                                   <input class="form-control" id="acciones" placeholder="Acciones" type="text">
                          </div>
                          <div class="modal-footer">
								   <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
								   <button class="btn btn-success" type="button" id="Guardar_crono_P">Guardar</button>
						  </div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
<?php
}
else{
    echo "No hay datos";
}
?>
</div>
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
       <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>
      <script type="text/javascript" src="js/datepicker.js"></script>
      
      <script>
	  
	  //INICIO NUEVO
		  var set_pdate = document.querySelectorAll(".validafecha_unico");
			
		  for (var i = 0; i < set_pdate.length; i++) {
			   set_pdate[i].onchange = function () {
				   
			   var fecha_inicial = this.value.split('/');
 			   var fecha_ini = fecha_inicial[2] + '/' + fecha_inicial[1] + '/' + fecha_inicial[0];
			
			   var fecha_final = document.getElementById("fechaacciones_fin").value.split('/');
			   var fecha_fin = fecha_final[2] + '/' + fecha_final[1] + '/' + fecha_final[0];
				   
				   var nombre_a='fechaacciones'; 
			
					if(document.getElementById("crono_fechaacciones_fin_c").value!='')
					{
						var c_conteo = document.getElementById("conteo").value-1;
				
						if(c_conteo>0){
							var c = document.getElementById("fechaacciones_P"+c_conteo).value
							var c_uno = c.split('/');
			   				var c_dos = c_uno[2] + '/' + c_uno[1] + '/' + c_uno[0];
			   				console.log(c_dos)
						} else {
							//comentado el 18/03/2020 var c = document.getElementById("crono_fechaacciones_fin_c").value;
							var c = document.getElementById("crono_fechaacciones_c").value;
							var c_uno = c.split('/');
			   				var c_dos = c_uno[2] + '/' + c_uno[1] + '/' + c_uno[0];
						}
						console.log(this.name)
						//if(this.name=="fechaacciones" && new Date(fecha_ini).getTime() >= new Date(c_dos).getTime())
						if(this.name=="fechaacciones" && new Date(c_dos).getTime() <= new Date(fecha_ini).getTime())
						{
							//console.log('entro jat');
							document.getElementById("errfechacrono_unico").style.display = 'none';
						} else {
							document.getElementById("errfechacrono_unico").style.display = 'block';
							//console.log('Fecha A mal');	
							document.getElementById("fechaacciones").value = '';
						}	
				   }
			   }
		  }	  
	  
	  
	 	 var set_pdatefc = document.querySelectorAll(".validafecha_final");
			
		  for (var i = 0; i < set_pdatefc.length; i++) {
			   set_pdatefc[i].onchange = function () {
			
			   var fecha_final_c = this.value.split('/');
 			   var fecha_fin_c = fecha_final_c[2] + '/' + fecha_final_c[1] + '/' + fecha_final_c[0];
			   
			   var fecha_inicial_c = document.getElementById("fechaacciones").value.split('/');
			   var fecha_ini_c = fecha_inicial_c[2] + '/' + fecha_inicial_c[1] + '/' + fecha_inicial_c[0];
			   
			   var nombre_c='fechaacciones_fin'; 
			   
					if(document.getElementById("fechaacciones_fin").value!='')
					{
						if(this.name=="fechaacciones_fin" && new Date(fecha_ini_c).getTime() <= new Date(fecha_fin_c).getTime())
						{
							document.getElementById("errfechacrono_unico_fin").style.display = 'none';						
						} else {
							document.getElementById("errfechacrono_unico_fin").style.display = 'block';
							//console.log('Fecha C mal');	
							document.getElementById("fechaacciones_fin").value = '';
						}
				   }
			   }
		  }
		  ///////FIN NUEVO
		  
		  ///INICIO VARIOS inicio
		  var set_pdateUNO = document.querySelectorAll(".validafecha_VARIOS");
			
		  for (var i = 0; i < set_pdateUNO.length; i++) {
			   set_pdateUNO[i].onchange = function () {
				   
				   var valor_P_fin = this.name.split('_P');
				   var solo_nombre = valor_P_fin[1];
				   var dame_valor_P_fin = 'fechaacciones_fin_P'.concat(solo_nombre);


				   /* inicio nuevo codigo 18/03/2020 v2 */
				   var valor_P_inicio = this.name.split('_P');
				   var solo_nombre_inicio_v = valor_P_inicio[1]-1;
				   var dame_valor_P_inicio = 'fechaacciones_P'.concat(solo_nombre_inicio_v);
				   /* fin nuevo codigo 18/03/2020 v2 */
				   
				   var fecha_inicial = this.value.split('/');
				   var fecha_ini = fecha_inicial[2] + '/' + fecha_inicial[1] + '/' + fecha_inicial[0];
				
				   var fecha_final = document.getElementById(dame_valor_P_fin).value.split('/');
				   var fecha_fin = fecha_final[2] + '/' + fecha_final[1] + '/' + fecha_final[0];
				   
				   var nombre_a=this.name; 
				   
				  if(document.getElementById(dame_valor_P_fin).value!='')
					{
						if(solo_nombre==1){
							console.log('es el primero');
							//comentado el 18/03/2020 var fin_c_tres = document.getElementById("crono_fechaacciones_fin_c").value.split('/');
				   			//comentado el 18/03/2020 var fin_c = fin_c_tres[2] + '/' + fin_c_tres[1] + '/' + fin_c_tres[0];

				   			var inicio_c_tres = document.getElementById("crono_fechaacciones_c").value.split('/');
				   			var inicio_c = inicio_c_tres[2] + '/' + inicio_c_tres[1] + '/' + inicio_c_tres[0];

							/*console.log(fecha_ini);
							console.log(fin_c);*/

							//comentado el 18/03/2020 if(this.name==nombre_a && new Date(fecha_ini).getTime() <= new Date(fecha_fin).getTime() && new Date(fecha_ini).getTime() >= new Date(fin_c).getTime())

							if(this.name==nombre_a && new Date(fecha_fin).getTime() >= new Date(fecha_ini).getTime() && new Date(fecha_ini).getTime() >= new Date(inicio_c).getTime())
							{
								document.getElementById("errfechacrono_unico_mod_P".concat(solo_nombre)).style.display = 'none';
								$("#divError_crono").hide();
								//console.log('Fecha A bien');	
							} else {
								document.getElementById("errfechacrono_unico_mod_P".concat(solo_nombre)).style.display = 'block';
								//console.log('Fecha A mal');	
								document.getElementById(nombre_a).value = '';
							}

						}else{
							console.log('es el segundo');

							var c = document.getElementById(dame_valor_P_inicio).value
							var c_uno = c.split('/');
			   				var inicio_ant_nuevo = c_uno[2] + '/' + c_uno[1] + '/' + c_uno[0];

			   				/* inicio nuevo codigo 18/03/2020 v2 */
						   var valor_P_inicio_sig = this.name.split('_P');
						   var solo_nombre_inicio_v = valor_P_inicio_sig[1]+1;
						   var dame_valor_P_inicio = 'fechaacciones_P'.concat(solo_nombre_inicio_v);
						   /* fin nuevo codigo 18/03/2020 v2 */


							if(this.name==nombre_a && new Date(fecha_ini).getTime() >= new Date(inicio_ant_nuevo).getTime() 
								&& new Date(fecha_ini).getTime() >= new Date(dame_valor_P_inicio).getTime())
							{
								document.getElementById("errfechacrono_unico_mod_P".concat(solo_nombre)).style.display = 'none';
								$("#divError_crono").hide();
								//console.log('Fecha A bien');	
							} else {
								document.getElementById("errfechacrono_unico_mod_P".concat(solo_nombre)).style.display = 'block';
								//console.log('Fecha A mal');	
								document.getElementById(nombre_a).value = '';
							}
						}
				   }
			   }
		  }	
		  ///FIN VARIOS inicio
		  
		  ///INICIO VARIOS fin
		  var set_pdateDOS = document.querySelectorAll(".validafecha_DOS");
			
		  for (var i = 0; i < set_pdateDOS.length; i++) {
			   set_pdateDOS[i].onchange = function () {
				   
				   var valor_P_ini = this.name.split('_P');
				   var solo_nombre = valor_P_ini[1];
				   var dame_valor_P_ini = 'fechaacciones_P'.concat(solo_nombre);
				   
				   var fecha_final = this.value.split('/');
				   var fecha_fin = fecha_final[2] + '/' + fecha_final[1] + '/' + fecha_final[0];
				   
				   var fecha_inicial = document.getElementById(dame_valor_P_ini).value.split('/');
				   var fecha_ini = fecha_inicial[2] + '/' + fecha_inicial[1] + '/' + fecha_inicial[0];
				   
				  var nombre_a=this.name; 
				   
				  if(document.getElementById(dame_valor_P_ini).value!='')
					{						
						if(this.name==nombre_a && new Date(fecha_ini).getTime() <= new Date(fecha_fin).getTime())
						{
							document.getElementById("errfechacrono_unico_mod_fin_P".concat(solo_nombre)).style.display = 'none';
							$("#divError_crono").hide();
						} else {
							document.getElementById("errfechacrono_unico_mod_fin_P".concat(solo_nombre)).style.display = 'block';
							//console.log('Fecha A mal');	
							document.getElementById(nombre_a).value = '';
						}
				   }
			   }
		  }	
		  ///FIN VARIOS fin
	  </script>
      