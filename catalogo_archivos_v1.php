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

$sel_cuantos="SELECT clave_usuario FROM anexos WHERE clave_usuario='".$cve_user."'";
$exe_res_total=  mysqli_query($con, $sel_cuantos);
$Nro_desh_boton = mysqli_num_rows($exe_res_total);
	
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>
function comprueba_extension(formulario, archivo, archivo_nombre, url_antecedente) { 
   extensiones_permitidas = new Array(".xls", ".xlsx", ".pdf", ".jpg", ".jpeg", ".png", ".doc", ".docx"); 
   mierror = ""; 
   //console.log(archivo_nombre);
   if (!archivo) { 
		var id = document.getElementById('archivo_nombre').value;
		if(id>61 && id<93){
			if(url_antecedente){
			
			  //recupero la extensión de este nombre de archivo 
			  extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
			  //alert (extension); 
			  //compruebo si la extensión está entre las permitidas 
			  permitida = false; 
			  
			  if(document.getElementById('radio-01').value==1)
			  {
				  permitida = true; 
			  } else {
				  for (var i = 0; i < extensiones_permitidas.length; i++) { 
					 if (extensiones_permitidas[i] == extension) { 
					 permitida = true; 
					 break; 
					 } 
				  } 
			  }
			  if (!permitida) { 
				 mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 
				}else{ 
					//submito! 					
				 alert ("El archivo es correcto.");
				formulario.submit(); 
				 return 1; 
				} 
			
			} else {
				
				mierror = "No has seleccionado ningún archivo o ningun link"; 
				
				}
		} else {
			//Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 
			mierror = "No has seleccionado ningún archivo"; 
			}
   } else {
      //recupero la extensión de este nombre de archivo 
      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
      //alert (extension); 
      //compruebo si la extensión está entre las permitidas 
      permitida = false; 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
         if (extensiones_permitidas[i] == extension) { 
         permitida = true; 
         break; 
         } 
      } 
      if (!permitida) { 
         mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 
      	}else{ 
         	//submito! 
         alert ("El archivo es correcto.");
		 
        formulario.submit(); 
         return 1; 
      	} 
   } 
   //si estoy aqui es que no se ha podido submitir 
   alert (mierror); 
   return 0; 
}


</script>

<script type="text/javascript">
function mostrar(id) {
	var opcion = parseInt(id);
	//console.log(opcion);
		   switch(opcion){
			   case 1:
			   		$("#archivo_anexos_descargar").hide();
					$("#archivo_solicitud_descargar").show();
					$("#archivo_proyecto_descargar").hide();
					$("#espacio").show();
					$("#archivo_3_descargar").hide();
					$("#archivo_4_descargar").hide();
					$("#archivo_5_descargar").hide();
					$("#archivo_6_descargar").hide();
					$("#archivo_7_descargar").hide();
					$("#archivo_8_descargar").hide();
					document.getElementById('archivo').disabled = false
				break;
				case 2:
					$("#archivo_anexos_descargar").hide();
					$("#archivo_solicitud_descargar").hide();
					$("#archivo_proyecto_descargar").show();
					$("#archivo_3_descargar").hide();
					$("#archivo_4_descargar").hide();
					$("#archivo_5_descargar").hide();
					$("#archivo_6_descargar").hide();
					$("#archivo_7_descargar").hide();
					$("#archivo_8_descargar").hide();
					$("#espacio").show();
					document.getElementById('archivo').disabled = false
				break;
				case 3:
					$("#archivo_anexos_descargar").hide();
					$("#archivo_solicitud_descargar").hide();
					$("#archivo_proyecto_descargar").hide();
					$("#espacio").show();
					$("#archivo_3_descargar").show();
					$("#archivo_4_descargar").hide();
					$("#archivo_5_descargar").hide();
					$("#archivo_6_descargar").hide();
					$("#archivo_7_descargar").hide();
					$("#archivo_8_descargar").hide();
					document.getElementById('archivo').disabled = false
				break;
				case 5:
					$("#archivo_anexos_descargar").hide();
					$("#archivo_solicitud_descargar").hide();
					$("#archivo_proyecto_descargar").hide();
					$("#espacio").show();
					$("#archivo_3_descargar").hide();
					$("#archivo_4_descargar").show();
					$("#archivo_5_descargar").hide();
					$("#archivo_6_descargar").hide();
					$("#archivo_7_descargar").hide();
					$("#archivo_8_descargar").hide();
					document.getElementById('archivo').disabled = false
				break;
				case 8:
					$("#archivo_anexos_descargar").hide();
					$("#archivo_solicitud_descargar").hide();
					$("#archivo_proyecto_descargar").hide();
					$("#espacio").show();
					$("#archivo_3_descargar").hide();
					$("#archivo_4_descargar").hide();
					$("#archivo_5_descargar").show();
					$("#archivo_6_descargar").hide();
					$("#archivo_7_descargar").hide();
					$("#archivo_8_descargar").hide();
					document.getElementById('archivo').disabled = false
				break;
				case 9:
					$("#archivo_anexos_descargar").hide();
					$("#archivo_solicitud_descargar").hide();
					$("#archivo_proyecto_descargar").hide();
					$("#espacio").show();
					$("#archivo_3_descargar").hide();
					$("#archivo_4_descargar").hide();
					$("#archivo_5_descargar").hide();
					$("#archivo_6_descargar").show();
					$("#archivo_7_descargar").hide();
					$("#archivo_8_descargar").hide();
					document.getElementById('archivo').disabled = false
				break;
				case 10:
					$("#archivo_anexos_descargar").hide();
					$("#archivo_solicitud_descargar").hide();
					$("#archivo_proyecto_descargar").hide();
					$("#espacio").show();		
					$("#archivo_3_descargar").hide();
					$("#archivo_4_descargar").hide();
					$("#archivo_5_descargar").hide();
					$("#archivo_6_descargar").hide();
					$("#archivo_7_descargar").show();
					$("#archivo_8_descargar").hide();
					document.getElementById('archivo').disabled = false
				break;
				case 11:
						$("#archivo_anexos_descargar").hide();
						$("#archivo_solicitud_descargar").hide();
						$("#archivo_proyecto_descargar").hide();
						$("#espacio").show();		
						$("#archivo_3_descargar").hide();
						$("#archivo_4_descargar").hide();
						$("#archivo_5_descargar").hide();
						$("#archivo_6_descargar").hide();
						$("#archivo_7_descargar").hide();
						$("#archivo_8_descargar").show();
					document.getElementById('archivo').disabled = false
				break;		
				default:
					if(opcion>61 && opcion<93){
						$("#archivo_anexos_descargar").show();
						$("#archivo_solicitud_descargar").hide();
						$("#archivo_proyecto_descargar").hide();
						$("#espacio").hide();		
						$("#archivo_3_descargar").hide();
						$("#archivo_4_descargar").hide();
						$("#archivo_5_descargar").hide();
						$("#archivo_6_descargar").hide();
						$("#archivo_7_descargar").hide();
						$("#archivo_8_descargar").hide();
		   			} else {
						$("#archivo_anexos_descargar").hide();
						$("#archivo_solicitud_descargar").hide();
						$("#archivo_proyecto_descargar").hide();
						$("#espacio").hide();		
						$("#archivo_3_descargar").hide();
						$("#archivo_4_descargar").hide();
						$("#archivo_5_descargar").hide();
						$("#archivo_6_descargar").hide();
						$("#archivo_7_descargar").hide();
						$("#archivo_8_descargar").hide();
						document.getElementById('archivo').disabled = false
					}
		}
}

function habilitar2(form)
	{
		 if($("#radio-01:checked").val()==1) {
			document.getElementById("url_antecedente").disabled=false;
			document.getElementById("archivo").disabled=true;
			document.getElementById("archivo").value = "";
		}
		else {
			document.getElementById("url_antecedente").disabled=true;
			document.getElementById("archivo").disabled=false;
			document.getElementById("url_antecedente").value = "";
		}
	}
</script>
   
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    
    
<div id="contanido_tab_3">
	
<div class="row">
      <div class="col-md-12">
      
         <button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#panel-077">
             <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Descarga y adjunta documentos
         </button>		
      </div>
</div>

<div class="row top-buffer">
      <div class="col-md-12">
<?php
if($recurso != NULL){
    $return .= '<div class="table-responsive">
	<table class="table">';
    $return .= "<tr>
    <td><strong>C&oacute;digo</strong></td>
    <td><strong>Nombre del documento</strong></td>
	<td><strong>Archivo adjunto</strong></td>
    <td><strong>Acciones</strong></td>
    </tr>";
    if ($AC_busca_CURP!=NULL){
    }
    else{
    $query_user="SELECT * FROM anexos
        where clave_usuario='".$cve_user."'";
        $variable=2;
    }
    
    $res_user =  mysqli_query($con,$query_user);
    while ($fila=mysqli_fetch_array($res_user, MYSQLI_ASSOC)){
        $clave_id=$fila['clave_id'];
        $nombre_formato=$fila['nombre_formato'];
		$archivo_adjunto=$fila['archivo_adjunto'];
		$liga_anexo=$fila['liga_anexo'];
		
		$destino =  "anexos/".$cve_user."/".$archivo_adjunto;
		
		$query_doc="SELECT * FROM nombre_formatos where id_docto = $nombre_formato";
     	$res_doc =  mysqli_query($con,$query_doc);
    	$fila_doc=mysqli_fetch_array($res_doc, MYSQLI_ASSOC);
		$nombre_formato_convert=utf8_encode($fila_doc['nombre_documento']);
		
		if(!empty($liga_anexo)){
			$imp_variable = "<a href=".$liga_anexo." target='_new'>".$liga_anexo."</a>";
		} else {
			$imp_variable = "<a href='".$destino."' border='0' target='_new'><span class='glyphicon glyphicon-file' aria-hidden='true'></span></a><br>";
		}	
        $return .= "<tr>
        <td> <strong>".$conteo."</strong> </td>
        <td>
		<div class='form-group'>".$nombre_formato_convert."</div>
		</td>
        <td>".$imp_variable."</td>
        <td align='center'>
            <div id='borrado'>
                <span class='glyphicon glyphicon-trash' aria-hidden='true' onClick='eliminar_archivo_P(".$clave_id.")'></span>
            </div>
        </td>
        </tr>
        ";
        $conteo++;
    }
    $return .= "</table></div>";
    echo $return;

    ?>
</div>
</div> 						
	<div id="panel-077" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">					
					<div class="modal-header">						
						<h4 class="modal-title">Agregar documento</h4>
                        <?php 
							 $sql_num_ed = "SELECT numero_ediciones_previas FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
							 $resultado_sql_num_ed = mysqli_query($con, $sql_num_ed);
											$row_ed = mysqli_fetch_array($resultado_sql_num_ed);
											$numero_ediciones_previas = $row_ed["numero_ediciones_previas"];
											
							if($numero_ediciones_previas>35){
										$vat_tope=35;
										} else {
											$vat_tope=$numero_ediciones_previas;
											}
										
										$arreglo = array(62,63,64,65,66,67,68,69,70,71,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92);
										
									$query_doctos2="SELECT nombre_formato FROM anexos WHERE clave_usuario='".$cve_user."' and nombre_formato in (62,63,64,65,66,67,68,69,70,71,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92);";
													$res_doctos2 =  mysqli_query($con,$query_doctos2);
													$cuantos_doctos2 =  mysqli_num_rows($res_doctos2);
													/*while ($fila_doctos2=mysqli_fetch_array($res_doctos2, MYSQLI_ASSOC)){
													
													$valor=$fila_doctos2['nombre_formato'];
										}*/
										
										
										$sql = "SELECT usuarios.tipo_instancia, cat_instancias.id_instancia, cat_instancias.nombre_instancia 
										FROM usuarios,cat_instancias 
										WHERE usuarios.clave_usuario LIKE '".$cve_user."' and cat_instancias.nombre_instancia = usuarios.tipo_instancia"; 
										$resultado = mysqli_query($con, $sql);
										$num_resultados = mysqli_num_rows($resultado);
										for ($i=0; $i <$num_resultados; $i++)
										{
										$row = mysqli_fetch_array($resultado);
										$id_instancia	= $row["id_instancia"];
										}
						?>
					</div>
					<div class="modal-body">
                            <div class="form-group datepicker-group">
                            <label>Nombre del archivo*:</label>
							<select class='form-control' name='archivo_nombre' id='archivo_nombre' onchange="mostrar(this.value);">
                            	<option value="" selected="selected">Selecciona opci&oacute;n</option>
                            		<?php	
										
										
										/*$query_doctos="SELECT id_docto, nombre_documento,tipo_formato, nombre_formatos.id_instancia,liga_archivo 
													  FROM nombre_formatos 
													  INNER JOIN cat_instancias 
													  INNER JOIN usuarios 
													  ON (cat_instancias.id_instancia = nombre_formatos.id_instancia)  
													  WHERE usuarios.tipo_instancia = cat_instancias.nombre_instancia 
													  AND usuarios.clave_usuario = '".$cve_user."' 
													  UNION  
													  SELECT id_docto,nombre_documento,tipo_formato,nombre_formatos.id_instancia,liga_archivo FROM nombre_formatos 
													  WHERE id_instancia = 0 and id_docto<=61 and Not id_docto In (Select nombre_formato From anexos where clave_usuario='".$cve_user."') ORDER BY id_docto;";
													  */
										$query_doctos="Select * From nombre_formatos where id_docto Not In (Select nombre_formato From anexos 
										where clave_usuario='".$cve_user."') and id_instancia in (0,'".$id_instancia."') and id_docto<=61 order by id_docto;";
										
													$res_doctos =  mysqli_query($con,$query_doctos);
													$cuantos_doctos =  mysqli_num_rows($res_doctos);
													while ($fila_doctos=mysqli_fetch_array($res_doctos, MYSQLI_ASSOC)){
													
													$id_docto=$fila_doctos['id_docto'];
													$nombre_documento=utf8_encode($fila_doctos['nombre_documento']);
													$tipo_formato=$fila_doctos['tipo_formato'];	
													
													$liga_archivo=$fila_doctos['liga_archivo'];	
													$tipo_formato=$fila_doctos['tipo_formato'];
																
									?>
								<option value='<?=$id_docto?>'><?php echo $nombre_documento.' ('.$tipo_formato.')'?></option>
								<?php 
									}
									
								for($u=$cuantos_doctos2;$u<$vat_tope;$u++){
							          		
									$imp=$u+1;											
								?>
                                <option value='<?=$arreglo[$u]?>'><?php echo 'Anexo Antecedentes del festival ('.$imp.')'; ?></option>
                                <?php } ?>
                            </select>	
						   </div>
                           
                 <div class="row">
           			 <div class="col-md-12">
             			<div id="archivo_solicitud_descargar" hidden="hidden">
                        <label>Descarga formato*:</label>
                        <br />
                        <a href="Solicitud.php" target="_blank">Solicitud de apoyo para festivales culturales y artísticos PROFEST</a>
                        </div>
                        
                        <div id="archivo_proyecto_descargar" hidden="hidden">
                        <label>Descarga formato*:</label>
                        <br />
                        <a href="reporte/Formato_proyecto.php" target="_new">Formato de proyecto para festivales culturales y artísticos PROFEST</a>
                        </div>  
                        
                        <div id="archivo_3_descargar" hidden="hidden">
                        <label>Descarga formato*:</label>
                        <br />
                        <a href="formatos_para_descarga_general/anexo_C.xlsx" target=blank>Formato de cronograma, presupuesto y programación PROFEST</a>
                        </div>
                        
                        <div id="archivo_4_descargar" hidden="hidden">
                        <label>Descarga formato*:</label>
                        <br />
                        <a href="formatos_para_descarga_general/anexo_D.xlsx" target="_blank">Formato de semblanza artística PROFEST</a>
                        </div>
                        
                        <div id="archivo_5_descargar" hidden="hidden">
                        <label>Descarga formato*:</label>
                        <br />
                        <a href="formatos_para_descarga_general/Modelo_Carta_no_gestion_otros_recursos_federales.docx" target="_blank">Modelo Carta de no gestión de otros recursos federales</a>
                        </div>
                        
                        <div id="archivo_6_descargar" hidden="hidden">
                        <label>Descarga formato*:</label>
                        <br />
                        <a href="formatos_para_descarga_general/Modelo_Carta_compromiso_financiamiento.docx" target="_blank">Modelo de Carta compromiso de financiamiento(en caso de que sea expedida por la institución postulante)</a>
                        </div>  
                        
                        <div id="archivo_7_descargar" hidden="hidden">
                        <label>Descarga formato*:</label>
                        <br />
                        <a href="formatos_para_descarga_general/Modelo_Carta_Derechos_autor.docx" target="_blank">Modelo Carta Derechos de autor</a>
                        </div> 
                        
                        <div id="archivo_8_descargar" hidden="hidden">
                        <label>Descarga formato*:</label>
                        <br />
                        <a href="formatos_para_descarga_general/Modelo_Carta_compromiso_gestion.docx" target="_blank">Modelo Carta compromiso gestión</a>
                        </div> 
                        
                        <div id="archivo_anexos_descargar" hidden="hidden">
                        <label>Selecciona el formato adjuntar*:</label>                        
                        <div class="radio">
                          <label>
                            <input type="radio" name="radio-01" id="radio-01" value="1" onClick="habilitar2()"> Link
                          </label>
                          <label>
                            <input type="radio" name="radio-01" id="radio-01" value="2" onClick="habilitar2()"> Archivo
                          </label>
                        </div>                        
                        <label>Indica la liga o agrega un documento*:</label>
                        <br>Indica el link o archivo que desee adjuntar
                        <input type="text" name="url_antecedente" id="url_antecedente" placeholder="https://www.gob.mx/cultura" class="form-control" disabled="disabled" />
                        </div> 
                        
                     </div>
                 </div> 
                 
                 <div id="espacio" hidden="hidden">
                  <div class="row">
           			 <div class="col-md-12">&nbsp;</div></div>
                 </div>
                           
                  <div class="row">
           			 <div class="col-md-12">          
                        <div class="form-group">  
                        <label class="control-label" for="archivo">Cargar archivo*:</label>
                        <input type="file" name="archivo" id="archivo" disabled="disabled"> 
  						</div>
                         <div class="modal-footer">
								   <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
								   <button class="btn btn-success" type="button" onclick="comprueba_extension(this.form, this.form.archivo.value, this.form.archivo_nombre.value, this.form.url_antecedente.value)">Guardar</button>
						  </div>
						</div>
                	</div>
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
