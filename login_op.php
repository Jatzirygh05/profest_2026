<?php //echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index_cierre.php'>";
require_once('Connections/conexion.php'); 
error_reporting(0); 
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
    
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "admin,op";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {
  
  /*Global variable $con is necessary, because it is not known inside the function and you need it for mysqli_real_escape_string($con, $theValue); the Variable $con ist defined as mysqli_connect("localhost","user","password", "database") with an include-script.*/
    Global $con;
  
   if (PHP_VERSION < 6) {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }
  
    $theValue = mysqli_real_escape_string($con, $theValue);
  
    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;   
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
        break;
      case "date":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "defined":
        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        break;
    }
     return $theValue;
  }
}

$cve_user = $_SESSION['MM_Username'];
mysqli_set_charset($con, 'utf8');
$level = $_SESSION['MM_UserGroup'];
if($cve_user==""){ 
  echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=index_cierre.php'>";
}
include('querys_login_op.php');  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocatoria PROFEST 2026</title>
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/agregar_mas_opciones.js"></script>
    <script type="text/javascript" src="js/imprimir_mismo_valor_en_diferentes_lugares.js"></script>
    <script src="https://code.jquery.com/jquery-1.0.4.js"></script>
    <script type="text/javascript" src="js/Validacion_solicitud.js"></script>
    <script type="text/javascript" src="js/Validacion_email.js"></script>
    <script type="text/javascript" src="js/Validacion_email2.js"></script>
    <script type="text/javascript" src="js/Validacion_email_dir.js"></script>
 
    <script type="text/javascript" src="js/calcula_informacion_financiera_v2.js"></script>
    <script type="text/javascript" src="js/evita_comas.js"></script>
    <script type="text/javascript" src="js/formato_montos.js"></script>
    <script type="text/javascript" src="js/lugares_foros_medios.js"></script>

    <!--(INICIO) script para el codigo postal -->
    <script type="text/javascript" src="js/select_dependientes.js"></script>
    <script type="text/javascript" src="js/select_dependientes_colonia.js"></script>
    <script type="text/javascript" src="js/select_dependientes_cp.js"></script>
    <script type="text/javascript" src="js/select_dependientes_estado.js"></script>
    <!--(FIN) script para el codigo postal -->
    <!--obten_porcentaje funcion que utilizaba cuando guardaba desde que estaba en el campo antes de poner el boton Guardar en esta sección>
    <script type="text/javascript" src="js/obten_porcentaje.js"></script-->

    <!--(INICIO) script del presupuesto -->
    <script type="text/javascript" src="js/Validacion_presupuesto.js"></script>   
    <script type="text/javascript" src="js/calculo_op_resumen_presupuestal.js"></script> 
    <!--(FIN) script del presupuesto -->
    <link href="css/estilos_varios_login_op.css" rel="stylesheet">
    <script type="text/javascript" src="js/solo_numeros.js"></script> 
    </head>
    <?php 
    //(INICIO) presupuesto_proyecto
            $query="SELECT * FROM `catalogo_concepto_gastos` order by concepto_gasto";
            $result = mysqli_query($con,$query);
            if($result)
            $combobit="";
              while($renglon = mysqli_fetch_array($result, MYSQLI_ASSOC)){    
                    $valor=$renglon['id_gasto'];
                    $imp_texto=$renglon['concepto_gasto'];
                    $combobit .= "<option value=".$valor.">".utf8_encode($imp_texto)."</option>\n";
              }                 
            $query_dos="SELECT * FROM `catalogo_concepto_gastos` order by concepto_gasto";
            $result_dos = mysqli_query($con,$query_dos);
            if($result_dos)
                $combobitdos="";
                while($renglon_dos = mysqli_fetch_array($result_dos, MYSQLI_ASSOC)){    
                    $valor_dos=$renglon_dos['id_gasto'];
                    $imp_texto_dos=$renglon_dos['concepto_gasto'];
                    $combobitdos .= "<option value=".$valor_dos.">".$imp_texto_dos."</option>\n";
                }       
    //(FIN) presupuesto_proyecto                
    ?>
<body>
<main role="main">
  <div class="modal fade" id="panel-03" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog2" role="document">
      <div class="modal-content">
        <form role="form">
          <div class="modal-header"><h4 class="modal-title">Agregar meta num&eacute;rica</h4></div>
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label" for="nombre_meta_numerica">Nombre de la meta*:</label>
              <input class="form-control" id="nombre_meta_numerica" placeholder="Nombre meta" type="text" required>
            </div>
            <div class="form-group"><label class="control-label" for="meta_cantidad">Cantidad*:</label>
              <input class="form-control" id="meta_cantidad" placeholder="Cantidad meta" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
              <button class="btn btn-success" type="button" id="Guardar_Meta_P">Guardar</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div>
  </div><!-- /.modal -->
  <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <ol class="breadcrumb">
              <li><a href="#"><i class="icon icon-home"></i></a></li>
              <li><a href="login_op.php">Inicio</a></li>
              <li class="active">Registro solicitud</li>
            </ol>
          </div>
          <div class="col-sm-4">
            <div class="user-credencials">
              <ul class="list-unstyled">
                <li><span class="user-credencials__name"><?php echo $nombrec; ?></span></li>
                <li>Información adicional<a href="<?php echo $logoutAction ?>" target="_parent" class="btn btn-link pull-right">Salir</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <h1>Convocatoria PROFEST 2026<?php //print_r($_SESSION); ?></h1>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12"> 
                <strong><h3>Nota Importante</h3>
                    <p>La postulación de los proyectos se conforma de 4 etapas de llenado: la primera corresponde a la solicitud de datos de la Instancia Postulante, mientras que la segunda y tercera etapa pertenecen al desarrollo del proyecto a postular. En la cuarta etapa podrás descargar formatos oficiales y adjuntar los requisitos documentales que se describen en la Convocatoria.
Toda la información que se registre en los apartados de este sitio web, servirá para el llenado de los formatos oficiales, por lo que en la última etapa podrás descargarlos ya prellenados. El contenido de estos formatos será la información que considerarán los miembros de las Comisiones Dictaminadoras para evaluar y valorar cada solicitud de apoyo.
</p>
                </strong>
            </div>
        </div>
    <?php /*div class="alert alert-warning"><div id="countdown"></div></div*/?><?php //---alerta para indicar que la convocatoria a cerrado?>
    <div class="row"><br></div>
    <a href="#" class="scroll"></a>
    <div class="row " id="rowErrora" name="rowErrora" style="display:none">
      <div class="col-md-12">
        <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica tu captura del apartado Presupuesto / Resumen presupuestal.</div>
      </div>
    </div>
    <!--INICIO ALERTAS-->
        <div class="row" id="rowError" name="rowError" style="display:none">
          <div class="col-md-12">
            <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Es necesario capturar los campos obligatorios.</div>
          </div>
        </div>
        <div class="row " id="rowErrora" name="rowErrora" style="display:none">
          <div class="col-md-12">
            <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica tu captura del apartado Presupuesto / Resumen presupuestal.</div>
          </div>
        </div>
        <div class="row" id="rowErrordisciplina" name="rowErrordisciplina" style="display:none">
          <div class="col-md-12">
            <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Es necesario capturar la disciplina.</div>
          </div>
        </div>
        <div class="row" id="errperiodo_realizacion" name="errperiodo_realizacion" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> El periodo de realización del proyecto deberá encontrarse entre el 15 de abril y el 15 de diciembre de 2025</div>
                <!--El periodo de realización del proyecto deberá encontrarse entre el 02 de octubre y el 15 de diciembre del 2020.jat jat-->
            </div>
        </div>
        <!-- Registro completado -->
        <div class="row" id="rowCompletado" name="rowCompletado" style="display:none">
          <div class="col-md-12">
            <div id="datos_correctos" class="alert alert-success"><strong>¡Felicidades!</strong> Has completado con éxito el formulario 
              <!--input class="btn btn-primary" type="button" value="Imprimir solicitud" id="Imprimir solicitud" name="Imprimir solicitud" onClick="enviar();"-->
            </div>
          </div>
        </div>
        <div class="row" id="rowError_poblacion" name="rowError_poblacion" style="display:none">
          <div class="col-md-12">
            <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verificar los datos del inciso f) Población objetivo del festival.</div>
          </div>
        </div>
        <div class="row" id="rowError_cronograma" name="rowError_cronograma" style="display:none">
          <div class="col-md-12">
            <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verificar las fechas del inciso l) Cronograma de acciones para la ejecución del festival.</div>
          </div>
        </div>
        <div class="row" id="rowError_estra_difusion" name="rowError_estra_difusion" style="display:none">
          <div class="col-md-12">
            <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verificar los datos del inciso i) Estrategias de difusión del festival.</div>
          </div>
        </div>
        <div class="row" id="errmayormontoSC" name="errmayormontoSC" style="display:none">
          <div class="col-md-12">
            <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica los montos de honorarios con impuestos incluidos (M.N.)* y la suma de los conceptos ya que la suma de estos debe coincidir con el monto solicitado a la Secretaría de Cultura.</div>
          </div>
        </div>
  <!-- *********************FIN ALERTAS********************* -->
        <div class="row">
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab-01">Información de la instancia</a></li>
              <li><a data-toggle="tab" href="#tab-02">Proyecto</a></li>
              <li ><a data-toggle="tab" href="#tab-03">Aspectos financieros</a></li>
            </ul>
            <!--presupuesto_proyecto.php
                guardar_presupuesto.php-->
  <form method="post" id="apInf" name="apInf" action="guardar_solicitud.php">
            <!-- INICIO PESTAÑAS -->
            <div class="tab-content">
                <!-- INICIO PESTAÑA "Información de la instancia" -->
                <div class="tab-pane active" id="tab-01">
                  <div class="row">
                    <div class="col-md-8"> 
                      <h3>Información de la Instancia</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                  </div>
                    <!-- Primera Fila -->
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                            <label>Tipo de Instancia Postulante<samp id="errtipo_instanciaAs" name="errtipo_instanciaAs" class="control-label">*</samp>:</label>
                                <select id="tipo_instancia" name="tipo_instancia" class="form-control info_inst_reg">
                                    <option value="" selected="selected">Selecciona una opción</option>
                                    <option value=1 <?php if($tipo_instancia==1){ ?> selected="selected" <?php } ?>>Instancia Estatal de Cultura</option>
                                    <option value=2 <?php if($tipo_instancia==2){ ?> selected="selected" <?php } ?>>Instancia Municipal de Cultura con personalidad jurídica propia</option>
                                    <option value=3 <?php if($tipo_instancia==3){ ?> selected="selected" <?php } ?>>Gobierno Municipal</option>
                                    <option value=4 <?php if($tipo_instancia==4){ ?> selected="selected" <?php } ?>>Universidad Pública</option>
                                    <option value=5 <?php if($tipo_instancia==5){ ?> selected="selected" <?php } ?>>Organización de la Sociedad Civil</option>
                                </select>
                                <small id="errtipo_instancia" name="errtipo_instancia" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                        </div>
                    </div>   
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"> 
                                    <label>Nombre de la Instancia Postulante<samp id="errnombre_instancia_postulanteAs" name="errnombre_instancia_postulanteAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la Instancia Postulante o razón social"></span></label>
                                    <input type="text" id="nombre_instancia_postulante" name="nombre_instancia_postulante" class="form-control info_inst_reg" placeholder="Ingresa el nombre de la Instancia Postulante" value="<?php echo $nombre_instancia_postulante; ?>">
                                    <small id="errnombre_instancia_postulante" name="errnombre_instancia_postulante" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> 
                                    <label>Nombre completo de la o el Titular o Representante Legal<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el Títular"></span></label>
                                    <input type="text" id="nombre_titular" name="nombre_titular" class="form-control info_inst_reg" placeholder="Ingresa el nombre de la o el Títular" value="<?php echo $nombre_titular; ?>">
                                    <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                                </div>
                            </div>
                          </div>     
                         <div class="row">            
                            <div class="col-md-4">
                              <div class="form-group"> 
                                 <label>Grado académico<samp id="errgrado_academicoAs" name="errgrado_academicoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Grado académico de la o el Títular"></span></label>      
                                 <select id="grado_academico" name="grado_academico" class="form-control info_inst_reg">
                                    <option value="" selected="selected">Selecciona una opción</option>
                                    <option value="Dr." <?php if($grado_academico=="Dr."){ ?> selected="selected" <?php } ?>>Dr.</option>
                                    <option value="Dra." <?php if($grado_academico=="Dra."){ ?> selected="selected" <?php } ?>>Dra.</option>
                                    <option value="Mtro." <?php if($grado_academico=="Mtro."){ ?> selected="selected" <?php } ?>>Mtro.</option>
                                    <option value="Mtra." <?php if($grado_academico=="Mtra."){ ?> selected="selected" <?php } ?>>Mtra.</option>
                                    <option value="Lic." <?php if($grado_academico=="Lic."){ ?> selected="selected" <?php } ?>>Lic.</option>
                                    <option value="Ing." <?php if($grado_academico=="Ing."){ ?> selected="selected" <?php } ?>>Ing.</option>
                                    <option value="C." <?php if($grado_academico=="C."){ ?> selected="selected" <?php } ?>>C.</option>                       
                                </select>
                                <small id="errgrado_academico" name="errgrado_academico" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group"> 
                            <label> Cargo<samp id="errcargoAs" name="errcargoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el Títular"></span></label>
                              <input type="text" id="cargo" name="cargo" class="form-control info_inst_reg" placeholder="Ingresa el cargo de la o el Títular" value="<?php echo $cargo; ?>">
                                <small id="errcargo" name="errcargo" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                          </div>
                        </div>
                      </div>


                  <div class="row">
                    <div class="col-md-8"> 
                      <h3>Domicilio fiscal de la instancia postulante</h3>
                    </div>
                    <div class="col-md-12"><hr class="red small-margin"></div>
                  </div>


                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Código Postal<samp id="errPostCodRepLegAs" name="errPostCodRepLegAs" class="control-label">*</samp>:</label>
                                <input type="text" id="PostCodRepLeg" name="PostCodRepLeg" class="form-control info_inst_reg" placeholder="Ingresa el código postal" onBlur="cargaContenido4(this.id)" value="<?php echo $cp; ?>"><small id="errPostCodRepLeg" name="errPostCodRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php $consulta_p="SELECT c_estado, d_estado FROM codigos_postales group by d_estado order by d_estado";
                                      $consulta=mysqli_query($con, $consulta_p); ?>
                                <label>Estado<samp id="errEstadoRepLegAs" name="errEstadoRepLegAs" class="control-label info_inst_reg">*</samp>:</label>
                                <select id="EstadoRepLeg" name="EstadoRepLeg" class="form-control" onChange='cargaContenido(this.id);guardarestado(this.id)'>
                                    <option value="">Selecciona una opción</option>
                                    <?php while($registro=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
                                      <option value=<?php echo $registro['c_estado']; ?> <?php if($registro['c_estado']==$estado){ ?> selected='selected' <?php } ?>><?php echo $registro['d_estado']; ?></option>
                                    <?php } ?>
                                </select><small id="errEstadoRepLeg" name="errEstadoRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Municipio o Alcaldía<samp id="errMunicipio_AlcRepLegAs" name="errMunicipio_AlcRepLegAs" class="control-label">*</samp>:</label>
                                <?php
                                    $consulta_p="SELECT c_mnpio, D_mnpio FROM codigos_postales WHERE c_estado='$estado' 
                                    and c_mnpio='$Municipio_AlcRepLeg' group by D_mnpio order by D_mnpio";
                                    $consulta=mysqli_query($con, $consulta_p);                                                     
                                    $registro_mun=mysqli_fetch_array($consulta);
                                    $registro_mun['D_mnpio']=$registro_mun['D_mnpio'];
                                ?>
                                <select id="Municipio_AlcRepLeg" name="Municipio_AlcRepLeg" class="form-control info_inst_reg" <?php if($registro_mun['D_mnpio']==''){ ?>disabled<?php } ?>>
                                    <option value="">Selecciona una opción</option>
                                    <?php if($registro_mun['D_mnpio']<>''){
                                            echo "<option value='".$registro_mun['c_mnpio']."' selected='selected'>".$registro_mun['D_mnpio']."</option>";
                                          } else {
                                            echo "<option value='".$Municipio_AlcRepLeg."' >".$Municipio_AlcRepLeg."</option>";
                                          } ?>
                                </select><small id="errMunicipio_AlcRepLeg" name="errMunicipio_AlcRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Colonia<samp id="errColoniaRepLegAs" name="errColoniaRepLegAs" class="control-label">*</samp>:</label>
                            <?php if(!empty($cp)){
                                    $muestra_con_cp="&& cp='$cp'";
                                  } else {
                                    $muestra_con_cp;
                                  }
                                  if(!empty($estado)){
                                    $muestra_con_estado="&& c_estado='$estado'";
                                  } else {
                                    $muestra_con_estado;
                                  }
                                  if(!empty($Municipio_AlcRepLeg)){
                                    $muestra_con_mun="&& c_mnpio='$Municipio_AlcRepLeg'";
                                  } else {
                                    $muestra_con_mun;
                                  }
                                  $consulta_p2="SELECT id_asenta_cpcons, d_asenta, cp FROM codigos_postales 
                                  WHERE id_asenta_cpcons='$ColoniaRepLeg' 
                                  $muestra_con_cp $muestra_con_estado 
                                  $muestra_con_mun group by d_asenta order by d_asenta";
                                  $consulta2=mysqli_query($con, $consulta_p2);
                                  $registro_col=mysqli_fetch_array($consulta2, MYSQLI_ASSOC);
                                  $registro_col['d_asenta']=$registro_col['d_asenta'];
                                ?>
                                <select id="ColoniaRepLeg" name="ColoniaRepLeg" class="form-control info_inst_reg" <?php if($registro_col['d_asenta']==''){ ?>disabled<?php } ?>>
                                    <option value="">Selecciona una opción</option>
                                    <?php if($registro_col['d_asenta']<>''){
                                            echo "<option value='".$registro_col['id_asenta_cpcons']."' selected>".$registro_col['d_asenta']."</option>";
                                          } else {
                                            echo "<option value='".$ColoniaRepLeg."'>".$ColoniaRepLeg."</option>";
                                          } ?>
                                </select>
                                <small id="errColoniaRepLeg" name="errColoniaRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Calle<samp id="errcalleAs" name="errcalleAs" class="control-label">*</samp>:</label>
                                <input type="text" id="calle" name="calle" class="form-control info_inst_reg" placeholder="Ingresa la calle" value="<?php echo $calle; ?>">
                                <small id="errcalle" name="errcalle" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>No. exterior<samp id="errno_extAs" name="errno_extAs" class="control-label">*</samp>:</label>
                                <input type="text" id="no_ext" name="no_ext" class="form-control info_inst_reg" placeholder="Ingresa el número exterior" value="<?php echo $no_ext; ?>">
                                <small id="errno_ext" name="errno_ext" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>No. interior:</label>
                                <input type="text" id="no_int" name="no_int" class="form-control info_inst_reg" placeholder="Ingresa el número interior" value="<?php echo $no_int; ?>">
                            </div>
                        </div>            
                    </div>
                    <div class="row">                        
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="phone">Teléfono fijo (10 dígitos)<samp id="errtelefono_fijoAs" name="errtelefono_fijoAs" class="control-label">*</samp>:</label>
                                <input type="text" id="telefono_fijo" name="telefono_fijo" class="form-control info_inst_reg" placeholder="Telefono fijo" value="<?php echo $telefono_fijo; ?>" onkeypress="return soloNumeros(event)" maxlength="10">
                                <small id="errtelefono_fijo" name="errtelefono_fijo" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Extensión:</label><input type="text" id="extension" name="extension" class="form-control info_inst_reg" placeholder="Ingresa la extensión"  value="<?php echo $extension; ?>">
                          </div>
                        </div>
                    </div>  
                    <div class="row">            
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Correo electrónico de la o el Títular<samp id="errCorreo_titAs" name="errCorreo_titAs" class="control-label">*</samp>:</label><input type="text" id="Correo_tit" name="Correo_tit" class="form-control info_inst_reg" placeholder="ejemplo@dominio.com" onBlur="validarEmail_titular(this.id);" value="<?php echo $Correo_tit; ?>">
                          <small id="emailOK_titular"></small>
                          <small id="errCorreo_tit" name="errCorreo_tit" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>CLUNI (Organizaciones de la Sociedad Civil):<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Número de registro federal asignado por INDESOL"></span></label><input type="text" id="CLUNI" name="CLUNI" class="form-control info_inst_reg" placeholder="Ingresa el CLUNI" <?php if($tipo_instancia!=5){ ?> disabled <?php } ?> value="<?php echo $CLUNI; ?>">
                          <small id="errCLUNI" name="errCLUNI" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 col-md-offset-4"><hr/></div>
                    </div>
            </div>
            <!-- FIN PESTAÑA "Información de la Instancia" -->
            <div class="tab-pane" id="tab-02">
              <?php include('pestania_proyecto_2022.php'); ?>
            </div>               
      <!-- INICIO PESTAÑA "Presupuesto" -->
      <div class="tab-pane" id="tab-03">
        <div class="row">
                    <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#tab-11">Categoría y costo del proyecto</a></li>
                      <li><a data-toggle="tab" href="#tab-12">Presupuesto de coinversión</a></li>
                      <!--li><a data-toggle="tab" href="#tab-13">Programación</a></li-->
                      <li><a data-toggle="tab" href="#tab-14">Presupuesto PROFEST</a></li><!--convocatoria 2022: Otros conceptos PROFEST-->
                    </ul>
                    <div class="tab-content">
                        <!-- INICIO SUB. PESTAÑAS PRESUPUESTO / Información financiera -->
                            <div class="tab-pane active" id="tab-11">
                                <div class="row">
                            <div class="col-md-12">
                                <h3> Categoría y costo del proyecto </h3>
                                <!--p>En todos los casos, la Secretaría de Cultura podrá aportar hasta un 65% del costo total de realización del festival, por lo que deberá existir, por lo menos, una aportación del 35% de coinversión. Toda vez que el monto solicitado a la Secretaría de Cultura rebase el porcentaje antes descrito, se indicará que existe un error y se invitará a capturar los montos correctos.</p-->
                            </div>
                        </div>
                        <br>
                        <div class="row">   
                          <div class="col-md-4">
                            <div class="form-group"> 
                              <label>Categoría en la que participa/ Monto solicitado a la Secretaría de Cultura<samp id="errinfo_financiera_categoriaAs" name="errinfo_financiera_categoriaAs" class="control-label">*</samp>:</label>
                              <select id="info_financiera_categoria" name="info_financiera_categoria" class="form-control cat_categoria">
                                <option value="" selected="selected">Selecciona una opción</option>
                                <option value="A" <?php if($Info_financiera_categoria=="A"){ ?> selected="selected" <?php } ?>>a)	$300,000.00 (con puntaje mínimo de 170 puntos).</option>
                                <option value="B" <?php if($Info_financiera_categoria=="B"){ ?> selected="selected" <?php } ?>>b)	$500,000.00 (con puntaje mínimo de 175 puntos).</option>
                                <option value="C" <?php if($Info_financiera_categoria=="C"){ ?> selected="selected" <?php } ?>>c)	$1,000,000.00 (con puntaje mínimo de 180 puntos).</option>
                                <option value="D" <?php if($Info_financiera_categoria=="D"){ ?> selected="selected" <?php } ?>>d)	$1,500,000.00 (con puntaje mínimo de 185 puntos).</option>
                                <option value="E" <?php if($Info_financiera_categoria=="E"){ ?> selected="selected" <?php } ?>>e)	$2,000,000.00 (con puntaje mínimo de 195 puntos).</option>
                              </select>
                              <small id="errinfo_financiera_categoria" name="errinfo_financiera_categoria" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Costo total de realización del festival<samp id="errInfor_finan_costo_montoAs" name="errInfor_finan_costo_montoAs" class="control-label">*</samp>:</label>
                              <input class="form-control" id="Infor_finan_costo_monto" name="Infor_finan_costo_monto" placeholder="Costo total de realización del festival" type="text" onblur="suma_cantidades()" onKeyPress="return evita_comas(event)" value="<?=$Infor_finan_costo_monto?>">
                              <small id="errInfor_finan_costo_monto" name="errInfor_finan_costo_monto" class="form-text form-text-error" style="display:none">El Costo total de realización del festival debe ser mayor a la Categoría seleccionada</small>
                            </div>
                          </div>
                        </div>
                        <!--div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Monto solicitado a la Secretaría de Cultura<samp id="errInfor_finan_apoyo_montoAs" name="errInfor_finan_apoyo_montoAs" class="control-label">*</samp>:</label>
                              <input class="form-control" type="text" id="Infor_finan_apoyo_monto" name="Infor_finan_apoyo_monto" placeholder="Apoyo financiero solicitado a la SC" onblur="suma_cantidades();" readonly  onKeyPress="return evita_comas(event)" value="<?=$Infor_finan_apoyo_monto?>"><small id="errCosto_mayor3" name="errCosto_mayor3" class="form-text form-text-error" style="display:none">El monto capturado no coincide con la categoría seleccionada</small>
                              <small id="errInfor_finan_apoyo_monto" name="errInfor_finan_apoyo_monto" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                          </div>
                        </div-->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                <label>% de apoyo financiero sobre el costo total del Proyecto<samp id="errInfor_finan_apoyo_costo_totalAs" name="errInfor_finan_apoyo_costo_totalAs" class="control-label">*</samp>:</label>
                              <input type="text" id="Infor_finan_apoyo_costo_total" name="Infor_finan_apoyo_costo_total" value="<?php echo $Infor_finan_apoyo_costo_total; ?>" class="form-control" placeholder="Apoyo financiero % Costo total del proyecto" readonly>
                                <small id="errInfor_finan_apoyo_costo_total" name="errInfor_finan_apoyo_costo_total" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group"> 
                              <label> Monto de coinversión:</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group"><input type="text" id="monto_coinversion" name="monto_coinversion" value="<?php echo $monto_coinversion; ?>" class="form-control" readonly></div>
                          </div>
                        </div>              
                      </div>
                      <!-- FIN SUB. PESTAÑAS PRESUPUESTO / Información financiera -->
                      <!-- INICIO SUB. PESTAÑAS PRESUPUESTO / Desarrollo del proyecto -->
                      <div class="tab-pane" id="tab-12">
                        <div class="row">
                          <div class="col-md-12"> 
                            <h3>Presupuesto de coinversión</h3>
                                         
                            <p><strong>Usa este espacio para registrar un resumen del presupuesto de coinversión que aporta o gestiona la instancia que postula el proyecto, usando al menos 3 conceptos de gasto que se enlista en el combo al seleccionar el campo. La cantidad que resulte de la suma de los montos registrados deberá ser igual al monto  de coinversión que el siguiente apartado.</strong></p>
                            
                            <div class="row">
                            <div class="col-sm-4">
                              <strong>Monto de coinversión:</strong>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group"><input type="text" id="monto_coinversion2" name="monto_coinversion2" value="<?php echo $monto_coinversion; ?>" class="form-control" readonly></div>
                              </div>
                            </div>

                          </div>
                          <div class="col-md-12"><hr class="red small-margin"></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"> 
                            <div id="formulario">
                              <!--form method="post" id="formdata"-->
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group clearfix">   
                                    <div class="pull-left text-muted text-vertical-align-button"></div>
                                      <div class="pull-right">
                                        <input class="btn btn-default" type="button" id="botonenviar" value="Guardar">
                                      </div>
                                    </div>
                                  </div> 
                                </div>
                      <table class="table-responsive">
                      <tr>
                        <td>#</td>
                        <td>Concepto de gasto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</td>
                        <td>Fuente de financiamiento<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp></td>
                        <td>Monto<samp id="errMonto_unidad_aAs" name="errMonto_unidad_aAs" class="control-label">*</samp></td>
                        <?php /*td>Porcentaje<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp></td*/?>
                      </tr>
                      <tr>
                      <?php $query_user2="SELECT * FROM mas_presupuesto WHERE clave_usuario='".$cve_user."';";
                        $res_user2 =  mysqli_query($con, $query_user2);
                        $cuantos=mysqli_num_rows($res_user2);
                        $h=0;
                        $Concepto_gasto=0;
                        while ($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
                            $h=$h+1;
                            $id_presupuesto=$fila2['id_presupuesto'];
                            $Concepto_gasto_s=$fila2['Concepto_gasto'];
                            $Fuente_finan=utf8_encode($fila2['Fuente_finan']);
                            $Monto_unidad=$fila2['Monto_unidad'];
                            $Porcentaje=$fila2['Porcentaje'];
                        ?>
                        <td><?php echo $h; ?><input type="hidden" name="id_presupuesto<?=$h?>" id="id_presupuesto<?=$h?>" value="<?=$id_presupuesto?>">
                        <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?=$cuantos?>">
                        <td> 
                        <select class='form-control proyectocampo' name='Concepto_gasto<?=$h?>' id='Concepto_gasto<?=$h?>'>
                          <option value="" <?php if(empty($Concepto_gasto_s)){ ?>selected="selected"<?php } ?>>Selecciona opci&oacute;n</option>
                              <?php $query="SELECT * FROM `catalogo_concepto_gastos` order by concepto_gasto";
                                $result = mysqli_query($con,$query);
                                    //if($result)
                                    //$renglon = mysqli_fetch_row($result)
                                      while($renglon = mysqli_fetch_array($result, MYSQLI_ASSOC)){   
                                            $valor=$renglon['id_gasto'];
                                            $imp_texto=$renglon['concepto_gasto'];
                              ?>
                                      <option value=<?php echo $valor; ?> <?php if($valor==$Concepto_gasto_s){echo "Selected";}?>><?php echo $imp_texto; ?></option>
                              <?php } ?>
                        </select>
                        </td>
                        <td>
                          <select class='form-control' name='Fuente_finan<?php echo $h?>' id='Fuente_finan<?php echo $h?>' onChange="calc_presup(<?php echo $h?>, <?php echo $Infor_finan_apoyo_monto; ?>)">
                            <option value="" selected="selected">Selecciona opci&oacute;n</option>
                            <option value="1" <?php if($Fuente_finan=='1'){ ?> selected <?php } ?>>Institucional Estatal</option>
                            <option value="2" <?php if($Fuente_finan=='2'){ ?> selected <?php } ?>>Institucional Municipal</option>
                            <option value="4" <?php if($Fuente_finan=='4'){ ?> selected <?php } ?>>Institucional Educación Superior</option>
                            <option value="5" <?php if($Fuente_finan=='5'){ ?> selected <?php } ?>>Privada</option>
                          </select>
                        </td>
                        <td>
                          <!--obten_porcentaje funcion que utilizaba cuando guardaba desde que estaba en el campo antes de poner el boton Guardar en esta sección
                          obtenporcentaje(<?=$h?>, <?=$Infor_finan_costo_monto?>);
                          sumaVerticalporcentajes(<?=$h?>, <?=$cuantos?>);
                          calc_presup(<?=$h?>, <?=$Infor_finan_apoyo_monto?>);
                        -->
                          <input class="form-control" id="Monto_unidad<?=$h?>" name="Monto_unidad<?=$h?>" value="<?=$Monto_unidad?>" placeholder="0.00" type="text" onChange="sumaVerticalmonto(<?=$h?>, <?=$cuantos?>);" onKeyPress="return evita_comas(event)">
                        </td>
                        <?php /*td>
                          <input class="form-control" id="Porcentaje<?=$h?>" name="Porcentaje<?=$h?>" value="<?=$Porcentaje?>" placeholder="0.00" type="text" readonly="readonly">
                        </td*/?>
                      </tr>
                    <?php }
                    $cuantos = $cuantos+1;
                     for($i=$cuantos;$i<=50;$i++){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                          <select class='form-control proyectocampo' name='Concepto_gasto<?php echo $i?>' id='Concepto_gasto<?php echo $i?>'>
                            <option value="" selected="selected">Selecciona opci&oacute;n</option>
                            <?php echo $combobitdos; ?>
                          </select>
                        </td>
                        <td>
                          <select class='form-control' name='Fuente_finan<?php echo $i?>' id='Fuente_finan<?php echo $i?>' onChange="calc_presup(<?php echo $i; ?>, <?php echo $Infor_finan_apoyo_monto; ?>)">
                            <option value="" selected="selected">Selecciona opci&oacute;n</option>
                            <option value="1">Institucional Estatal</option>
                            <option value="2">Institucional Municipal</option>
                            <option value="4">Institucional Educación Superior</option>
                            <option value="5">Privada</option>
                          </select>
                        </td>
                        <td>
                          <?php /*obtenporcentaje(<?=$i?>, <?=$Infor_finan_costo_monto?>);
                          sumaVerticalporcentajes(<?=$i?>, <?=$cuantos?>);
                          */ ?>
                          <input class="form-control obten_porcentaje" id="Monto_unidad<?php echo $i?>" name="Monto_unidad<?php echo $i?>" placeholder="0.00" type="text" onChange="calc_presup(<?=$i?>, <?=$Infor_finan_apoyo_monto?>);sumaVerticalmonto(<?=$i?>, <?=$cuantos?>);" onKeyPress="return evita_comas(event)">
                        </td>
                        <?php /*td>
                          <input class="form-control" id="Porcentaje<?php echo $i?>" name="Porcentaje<?php echo $i?>" placeholder="0.00" type="text" readonly>
                        </td*/?>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                        <?php include_once('funciones_obtener_valores_2022.php'); ?>
                        <!--div id="imp_var_ejemplo"></div-->
                          <input type="text" class="form-control" name="pres_anual_tot_2010" id="pres_anual_tot_2010" value="<?php echo $result_resumenpresup[0]; ?>" readonly>
                        <!--input type="text" id="texto" name="texto" class="form-control"/-->
                        </td>
                        <?php /*td><!--input type="text" class="form-control" name="ene_suma" id="ene_suma" value="<?=$porcentaje_total?>" readonly-->
                          <input type="text" id="textod" name="textod" class="form-control" value="<?=$result_resumenpresup[1]?>" readonly />
                        </td*/?>
                      </tr>
                    </table>
            </form>
          </div>
        </div>
      </div>       
    </div>
    <!-- FIN SUB. PESTAÑAS PRESUPUESTO / Desarrollo del proyecto -->
            <!--div class="tab-pane" id="tab-13">
                <?php //include('v2_honorarios_artisticos_academicos_v2021_conformacion.php'); ?>
            </div-->
            <div class="tab-pane" id="tab-14">
                <?php include('v2_honorarios_artisticos_academicos_v2021_conformacion2daparte1.php'); ?>
                <div class="row">
                  <div class="col-md-8"><br></div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group clearfix">   
                      <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
                      <div class="pull-right">
                        <input class="btn btn-primary" type="button" value="Enviar" id="submit1" name="submit1" onClick="validarEnvio();">
                      </div>
                    </div>
                  </div> 
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN PESTAÑA "Presupuesto" -->
            </div>
          </div>
        </div> 
  </form>                  
          <div class="form-group clearfix top-buffer">
            <div class="alert alert-info">
              <p><strong>Aviso de privacidad simplificado del Sistema de datos personales de los formularios de la convocatoria para el otorgamiento de subsidios en coinversión a festivales culturales y artísticos PROFEST</strong></p>
              <p>La Secretaría de Cultura, a través de la Dirección General de Promoción y Festivales Culturales, con domicilio en Avenida Paseo de la Reforma No. 175, Alcaldía Cuauhtémoc, Colonia Cuauhtémoc, Código Postal 06500, Ciudad de México, es la responsable del tratamiento de los datos personales que nos proporcione, los cuales serán protegidos conforme a lo dispuesto por la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, y demás normatividad que resulte aplicable.
                Los datos personales serán tratados con la finalidad de llevar un registro de las postulaciones, para poder realizar las notificaciones del fallo de la Comisión Dictaminadora y en caso de ser aprobados, dar continuidad a los trámites jurídicos y administrativos, hasta la conclusión de los proyectos
                De manera adicional, los datos recabados se utilizarán para generar estadísticas e informes, la información, no estará asociados con la persona titular de los datos personales, por lo que no será posible identificarla.
                Al momento de dar a conocer el aviso de privacidad, el titular de los datos manifiesta tácitamente su conformidad con el mismo y otorga su consentimiento para que dichos datos sean utilizados por el responsable, para las finalidades señaladas.
                Los datos personales que se recaban no podrán ser transferidos, salvo que se actualice alguna de las excepciones previstas en el artículo 22 la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, o cuando, previamente, se haya obtenido su consentimiento expreso por escrito o por un medio de autenticación similar.</p>
              <p>Si deseas conocer nuestro aviso de privacidad integral, lo podrás consultar en el portal <a href="formatos_para_descarga_general/AVISO DE PRIVACIDAD INTEGRAL_PROFEST.pdf" target="_blank">Aviso de Privacidad Integral</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script type="text/javascript" src="js/funciones_load_cronograma.js"></script> <!-- código de metas -->
<script type="text/javascript" src="js/Gu_Mo_El_cronograma.js"></script> <!-- código de metas -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> <!-- este es del código de lugares -->
<!--script type="text/javascript" src="js/funciones_load.js"></script> <// este es del código de lugares>
<script type="text/javascript" src="js/Gu_Mo_El_Serv_p.js"></script> <// este es del código de lugares -->
<script type="text/javascript" src="js/funciones_load_presupuesto.js"></script> <!-- código de presupuesto -->
<script type="text/javascript" src="js/Gu_Mo_El_Presup.js"></script> <!-- código de presupuesto -->
<script type="text/javascript" src="js/funciones_load_meta.js"></script> <!-- este es del código de metas -->
<script type="text/javascript" src="js/Gu_Mo_El_meta.js"></script> <!-- este es del código de metas -->
<script type="text/javascript" src="js/hacer_peticion_y_altera.js"></script>
<script type="text/javascript" src="js/guardado_de_campos_loginop.js"></script> <!--aqui se encuentrán todos los scripts donde mando a guardar los campos uno por uno--> 
<!--script type="text/javascript" src="js/reloj_regresivo_cierre_pruebas.js"></script-->
<script type="text/javascript" src="js/validacion_guardado_presupuesto_misma_pagina.js"></script>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>
<script>
$gmx(document).ready(function() {
$('#periodo_realizacion_fecha_inicio').datepicker();
$('#periodo_realizacion_fecha_termino').datepicker();
});
</script>
<script>
  $gmx(document).ready(function() {
  var afecha = document.querySelectorAll(".honofecha");
      afecha.forEach((y)=>{  
      //console.log(y.value)  
      $(y).datepicker();             
    })
  });
</script>
</body>
</html>