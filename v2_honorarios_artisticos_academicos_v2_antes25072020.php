<?php require_once('Connections/conexion.php'); ?>
<?php
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


?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

//aqui lo tendriamos que cambiar por fecha de apertura
mysqli_query("SET NAMES 'utf8'");
$level = $_SESSION['MM_UserGroup'];
//if($level=="op"){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login_op.php'>";}
if($cve_user==""){ echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=index_cierre.php'>";}
			
	// INICIO informacion para acceso al sistema
			$sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado = mysqli_query($con, $sql);
			$num_resultados = mysqli_num_rows($resultado);
				for ($i=0; $i <$num_resultados; $i++)
				{
					$row = mysqli_fetch_array($resultado);
					$nombre = utf8_encode($row["nombre_titular"]);
					$ape_pat = utf8_encode($row["primer_apellido"]);
					$ape_mat = utf8_encode($row["segundo_apellido"]);
					$nombrec = $nombre.' '.$ape_pat.' '.$ape_mat;
				}
			// FIN informacion para acceso al sistema	
			
			
			$sql_dat = "SELECT * FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
			$resultado_dat = mysqli_query($con, $sql_dat);
			$num_resultados_dat = mysqli_num_rows($resultado_dat);
				for ($y=0; $y <$num_resultados_dat; $y++)
				{
					$row_dat = mysqli_fetch_array($resultado_dat);
					$Infor_finan_costo_monto = $row_dat["Infor_finan_costo_monto"];
					$Infor_finan_apoyo_monto = $row_dat["Infor_finan_apoyo_monto"];
				}
			

      $sql_sum_cant = "SELECT reque_v2_1_2.total_esp_mue_inmue, v2_requerimientos_elegidos.* 
      FROM `reque_v2_1_2`, `v2_requerimientos_elegidos` WHERE reque_v2_1_2.clave_usuario LIKE '".$cve_user."'  
      and v2_requerimientos_elegidos.clave_usuario LIKE '".$cve_user."' and reque_v2_1_2.tipo = v2_requerimientos_elegidos.tipo 
      group by reque_v2_1_2.tipo"; 
      $resultado_sql_sum_cant = mysqli_query($con, $sql_sum_cant);
      $num_sql_sum_cant = mysqli_num_rows($resultado_sql_sum_cant);
        for ($z=0; $z <$num_sql_sum_cant; $z++)
        {
          $row_sql_sum_cant = mysqli_fetch_array($resultado_sql_sum_cant);
          $suma_pestanas = $suma_pestanas + $row_sql_sum_cant["total_esp_mue_inmue"];
        } 



      $sql_elegidos = "SELECT * FROM `v2_requerimientos_elegidos` WHERE `clave_usuario` LIKE '".$cve_user."'"; 
      $res_sql_elegidos = mysqli_query($con, $sql_elegidos);
      $num_sql_elegidos = mysqli_num_rows($res_sql_elegidos);
?>
  <html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocatoria PROFEST 2020</title>
    <!-- CSS -->
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
      <script type="text/javascript" src="js/Validacion_honorarios_v2.js"></script>
       <script type="text/javascript" src="js/evita_comas.js"></script>
      <!--script type="text/javascript" src="js/calculo_nuevos_formatos_v2.js"></script-->
<style>
.es{
    -webkit-transform: rotate(-70deg); 
    -moz-transform: rotate(-70deg);
    -o-transform: rotate(-70deg);
    transform: rotate(-70deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    height:25px;
    width:95px;
    font-size: 12px;
}
.inline-block{
    display:-moz-inline-stack;
    display:inline-block;
    zoom:1;
    *display:inline; 
}
</style>
<script type="text/javascript">  
  function suma_vertical(id){
      var sumaT=0;
      var cuantos = 150;
      var suma_general = 0;

      for(var i=1;i<=cuantos;i++){
        
        var campov=eval ('document.formul.monto_honorarios_imp_inc_mn'+i+'.value');
         if(campov.length==0){ 
            var calcula_total = 0 
          } else { 
            var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
            sumaT=sumaT+calcula_total;
          } 
      }
            var obtsuma= document.formul.total_apoyo_suma;
            obtsuma.value=sumaT;
    }
    function suma_vertical_general(){
      var suma_general = 0;

      var total_apoyo_suma = document.formul.total_apoyo_suma.value;
      var apoyo_general_paso = document.formul.apoyo_general_paso.value;

      console.log(apoyo_general_paso)

      var fin_suma = document.formul.fin_suma.value;
      var total_proyecto = document.formul.total_proyecto.value;

       //console.log(total_apoyo_suma)
       
       //console.log(fin_suma)

       suma_general = parseFloat(total_apoyo_suma.replace(/[$,\s]/g, '')) + parseFloat(apoyo_general_paso.replace(/[$,\s]/g, ''));
       
       if(suma_general<=total_proyecto)
        {
          console.log('Entro 1 el importe es correcto o esta dentro del Apoyo financiero solicitado a la Secretaría de Cultura');
          var obtsuma= document.formul.fin_suma;
          obtsuma.value=suma_general;
        } else {
          console.log('Entro 2 el importe ya rebaso el Apoyo financiero solicitado a la Secretaría de Cultura');
          var obtsuma_A= document.formul.fin_suma;
          obtsuma_A.value=suma_general;
        }
    }

    function soloNumeros(e) 
    { 
    var key = window.Event ? e.which : e.keyCode 
    return ((key >= 48 && key <= 57) || (key==8)) 
    }
</script>
</head>
<body>
    <form name="formul" action="guardar_v2_formatos_honorarios.php" method="post">
     <div class="container">
            <div class="row">
              <div class="col-sm-8">
                <ol class="breadcrumb">
                  <li><a href="#"><i class="icon icon-home"></i></a></li>
                  <li><a href="index.php">Inicio</a></li>
                  <li class="active">Registro solicitud</li>
                </ol>
              </div>
              <div class="col-sm-4">
                <div class="user-credencials">
                  <ul class="list-unstyled">
                    <li>
                      <span class="user-credencials__name"><?php echo $nombrec; ?></span>
                    </li>
                    <li>Informaci&oacute;n adicional<a href="<?php echo $logoutAction ?>" target="_parent" class="btn btn-link pull-right">Salir</a></li>
                  </ul>
                </div>
              </div>
            </div>      
         		<div class="row">
              <div class="col-sm-8">
                <h1>Convocatoria PROFEST 2020</h1>
              </div>
            </div>
            <div class="row top-buffer"></div>
            <div class="alert alert-warning"><div id="countdown"></div></div>
    		        
            <div class="row " id="rowError1" name="rowError1" style="display:none">
              <div class="col-md-12">
                  <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada,<br>
                  * Todos los campos son obligatorios.</div>
              </div>
            </div>
            <div class="row " id="rowError2" name="rowError2" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica los montos de honorarios con impuestos incluidos (M.N.)* ya que la suma de estos debe coincidir con el Apoyo financiero solicitado a la Secretaría de Cultura.</div>
            </div>
            </div>
            <div class="row " id="rowBien1" name="rowBien1" style="display:none">
                <div class="col-md-12">
                  <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta.</div>
                </div>
            </div>
            
          <div class="row">
          	<div class="col-sm-12">
            	La suma de todos los rubros deberá ser igual a la cantidad registrada en el apartado Apoyo solicitado a la Secretaría de Cultura.
            </div>
          </div>
          <br>
          <?php $total_proyecto=$Infor_finan_apoyo_monto; //Apoyo financiero solicitado a la Secretaría de Cultura ?>
          <div class="row">
            <div class="col-sm-4">
              <strong>Apoyo financiero solicitado a la Secretaría de Cultura:</strong>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="apoyo_fin_sol_sc" id="apoyo_fin_sol_sc" value="<?php echo '$'.$total_proyecto; ?>" readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-8"> 
              <h3>Honorarios artísticos y académicos</h3>
            </div>
            <div class="col-md-12"><hr class="red small-margin"></div>
          </div>
    </div>
      
       <div class="row">
        <div class="col-md-8"> 
          <table>
            <tr>
              <td rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr bgcolor="#DDDDDD">
              <td rowspan="2">#</td>
              <td colspan="3"></td>
              <td colspan="10"><center>Datos de la o el Artista o Grupo</center></td>
              <td colspan="4"><center>Datos de la o el representante fiscal</center></td>
              <td colspan="18"><center>Datos presentación</center></td> 
            </tr>
            <tr bgcolor="#F6F6F6">
              <td width="534" height="150"><span class="es inline-block">Confirmado/tentativo*</span></td>
              <td><span class="es inline-block">Disciplina*</span></td>
              <td><span class="es inline-block">Categoría*</span></td>
              <td><span class="es inline-block">Nombre de la o el Artista o Grupo*</span></td>
              <td><span class="es inline-block">Estado origen*</span></td>
              <td><span class="es inline-block">Municipio o Alcaldía origen*</span></td>
              <td><span class="es inline-block">Teléfono fijo/móvil*</span></td>
              <td><span class="es inline-block">Correo*</span></td>
              <td><span class="es inline-block">Reconocimientos importantes*</span></td>
              <td><span class="es inline-block">Página web/Redes sociales*:</span></td>
              <td><span class="es inline-block">Alcance del Artista*</span></td>
              <td><span class="es inline-block">Cuenta con CFDI*</span></td>
              <td><span class="es inline-block">Años de experiencia comprobables*</span></td>
              <td><span class="es inline-block">Nombre de la o el representante fiscal*</span></td>
              <td><span class="es inline-block">Teléfono fijo/móvil*</span></td>
              <td><span class="es inline-block">Correo*</span></td>
              <td><span class="es inline-block">Cuenta con CFDI*</span></td>
              <td><span class="es inline-block">Espacio requerido*</span></td>                               
              <td><span class="es inline-block">Nombre presentación*</span></td>
              <td><span class="es inline-block">Fecha presentación*</span></td>
              <td><span class="es inline-block">Horario*</span></td>
              <td><span class="es inline-block">#Participantes por grupo*</span></td>
              <td><span class="es inline-block">#Mujeres*</span></td>
              <td><span class="es inline-block">#Hombres*</span></td>
              <td><span class="es inline-block">Duración del espectáculo propuesto*</span></td>
              <td><span class="es inline-block">Nombre foro*</span></td>
              <td><span class="es inline-block">Estado foro*</span></td>
              <td><span class="es inline-block">Municipio o Alcaldía foro*</span></td>
              <td><span class="es inline-block">Colonia y localidad*</span></td>
              <td><span class="es inline-block">Público al que va dirigida la propuesta artística*</span></td>
              <td><span class="es inline-block">Impacto socio/cultural del espectáculo*</span></td> 
              <td><span class="es inline-block">Sinopsis de la presentación artística propuesta*</span></td> 
              <td><span class="es inline-block">Links a material videográfico de la propuesta*</span></td>
              <td><span class="es inline-block">Monto de honorarios con impuestos incluidos (M.N.)*</span></td>
              <td><span class="es inline-block">¿Cuenta con beca FONCA? Especifíque:*</span></td> 
            </tr>
            <tr>
              <?php
                $query_user10 = "SELECT * FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."' order by id;";                          
                $res_user10 =  mysqli_query($con, $query_user10);
                $cuantos10 = mysqli_num_rows($res_user10);
              ?>
              <input type="hidden" name="cuantos_INSERT10" id="cuantos_INSERT10" value="<?php echo $cuantos10; ?>">
              <?php
                $h=0;
                while($fila10=mysqli_fetch_array($res_user10, MYSQLI_ASSOC)){
                $h=$h+1;
                $total_apoyo = $total_apoyo+$fila10['monto_honorarios_con_impuestos_incluidos_mn'];                        
                ?>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $h; ?><input type="hidden" name="idhaa<?php echo $h; ?>" id="idhaa<?php echo $h; ?>" value="<?php echo $fila10['id']; ?>"></td>
                  <td><select name="confirmado_tentativo<?php echo $h; ?>" id="confirmado_tentativo<?php echo $h; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Confirmado" <?php if($fila10['confirmado_tentativo']=='Confirmado'){?> selected <?php } ?>>Confirmado</option>
                      <option value="Tentativo" <?php if($fila10['confirmado_tentativo']=='Tentativo'){?> selected <?php } ?>>Tentativo</option>
                      </select></td>
                  <td>
                 <?php $disciplina = utf8_encode($fila10['disciplina']); ?>
                    <select name="disciplina<?php echo $h; ?>" id="disciplina<?php echo $h; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Música" <?php if ($disciplina=='Música'){?> selected <?php } ?>>Música</option>
                      <option value="Teatro" <?php if ($disciplina=='Teatro'){?> selected <?php } ?>>Teatro</option>
                      <option value="Danza" <?php if ($disciplina=='Danza'){?> selected <?php } ?>>Danza</option>
                      <option value="Artes visuales" <?php if ($disciplina=='Artes visuales'){?> selected <?php } ?>>Artes visuales</option>
                      <option value="Gastronomia" <?php if ($disciplina=='Gastronomia'){?> selected <?php } ?>>Gastronomia</option>
                      <option value="Literatura" <?php if ($disciplina=='Literatura'){?> selected <?php } ?>>Literatura</option>
                      </select></td>
                  <td><select name="categoria<?php echo $h; ?>" id="categoria<?php echo $h; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Amateur" <?php if ($fila10['categoria']=='Amateur'){?> selected <?php } ?>>Amateur</option>
                      <option value="Profesional" <?php if ($fila10['categoria']=='Profesional'){?> selected <?php } ?>>Profesional</option>
                      </select></td>
                  <td><input type="text" class="form-control" name="nombre_artista_grupo<?php echo $h; ?>" id="nombre_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['nombre_artista_grupo']); ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="estado_origen_artista_grupo<?php echo $h; ?>" id="estado_origen_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['estado_origen_artista_grupo']); ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="mun_origen_artista_grupo<?php echo $h; ?>" id="mun_origen_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['municipio_origen_artista_grupo']); ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="num_tel_artista_grupo<?php echo $h; ?>" id="num_tel_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['num_telefonico_artista_grupo']); ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="email_artista_grupo<?php echo $h; ?>" id="email_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['correo_electronico_artista_grupo']); ?>"  placeholder="ejemplo@dominio.com" /></td>
                  <td><input type="text" class="form-control" name="reconoc_import_art_grupo<?php echo $h; ?>" id="reconoc_import_art_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['reconocimientos_importantes_artista_grupo']); ?>" placeholder="Ingresa"/></td>
                  <td><input type="text" class="form-control" name="paginaweb_redessoc_artista_grupo<?php echo $h; ?>" id="paginaweb_redessoc_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['paginaweb_redessociales_artista_grupo']); ?>" placeholder="Ingresa"/></td>
                  <td><?php /*input type="text" class="form-control" name="alcance_Artista<?php echo $h; ?>" id="alcance_Artista<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['alcance_Artista']); ?>" placeholder="Ingresa" /*/?>

                    <select name="alcance_Artista<?php echo $h; ?>" id="alcance_Artista<?php echo $h; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Local" <?php if($fila10['alcance_Artista']=="Local"){ ?> selected <?php } ?>>Local</option>
                      <option value="Regional" <?php if($fila10['alcance_Artista']=="Regional"){ ?> selected <?php } ?>>Regional</option>
                      <option value="Estatal" <?php if($fila10['alcance_Artista']=="Estatal"){ ?> selected <?php } ?>>Estatal</option>
                      <option value="Nacional" <?php if($fila10['alcance_Artista']=="Nacional"){ ?> selected <?php } ?>>Nacional</option>
                      <option value="Internacional" <?php if($fila10['alcance_Artista']=="Internacional"){ ?> selected <?php } ?>>Internacional</option>
                    </select>

                  </td>
                  <td><select name="artista_cuenta_con_CFDI<?php echo $h; ?>" id="artista_cuenta_con_CFDI<?php echo $h; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Si" <?php if ($fila10['artista_cuenta_con_CFDI']=='Si'){?> selected <?php } ?>>Si</option>
                      <option value="No" <?php if ($fila10['artista_cuenta_con_CFDI']=='No'){?> selected <?php } ?>>No</option>
                      </select></td>
                  <td><input type="number" name="anio_experiencia_comprobables<?php echo $h; ?>" id="anio_experiencia_comprobables<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['anio_experiencia_comprobables']); ?>" class="form-control" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input type="text" name="nombre_rep_fis_artista_grupo<?php echo $h; ?>" id="nombre_rep_fis_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['nombre_representante_fiscal_artista_grupo']); ?>" class="form-control" placeholder="Ingresa" /></td> 
                  <td><input type="text" name="num_tel_rep_fis_artista_grupo<?php echo $h; ?>" id="num_tel_rep_fis_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['num_telefonico_representante_fiscal_artista_grupo']); ?>" class="form-control" placeholder="Ingresa" /></td>
                  <td><input type="text" name="email_rep_fis_artista_grupo<?php echo $h; ?>" id="email_rep_fis_artista_grupo<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['correo_electronico_representante_fiscal_artista_grupo']); ?>" placeholder="ejemplo@dominio.com<?php echo $h; ?>" class="form-control" /></td>
                  <td><select name="rep_fis_cuenta_con_CFDI<?php echo $h; ?>" id="rep_fis_cuenta_con_CFDI<?php echo $h; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Si" <?php if ($fila10['representante_fiscal_cuenta_con_CFDI']=='Si'){?> selected <?php } ?>>Si</option>
                      <option value="No" <?php if ($fila10['representante_fiscal_cuenta_con_CFDI']=='No'){?> selected <?php } ?>>No</option>
                      </select></td>
                  <td><select name="espacio_requerido<?php echo $h; ?>" id="espacio_requerido<?php echo $h; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Abierto" <?php if ($fila10['espacio_requerido']=='Abierto'){?> selected <?php } ?>>Abierto</option>
                      <option value="Cerrado" <?php if ($fila10['espacio_requerido']=='Cerrado'){?> selected <?php } ?>>Cerrado</option>
                      </select></td>                                
                  <td><input type="text" class="form-control" name="nombre_presentacion<?php echo $h; ?>" id="nombre_presentacion<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['nombre_presentacion']); ?>" placeholder="Ingresa" /></td>
                  <td><input class="form-control" name="fecha_presentacion<?php echo $h; ?>" id="fecha_presentacion<?php echo $h; ?>" value="<?php echo $fila10['fecha_presentacion']; ?>" type="text" placeholder="dd/mm/aaaa"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></td>
                  <td><input type="time" class="form-control" name="horario<?php echo $h; ?>" id="horario<?php echo $h; ?>" value="<?php echo $fila10['horario']; ?>" placeholder="Ingres el horario" step="1" size="5" class="form-control" />
                  </td>
                  <td><input type="number" class="form-control" name="num_par_por_grupo<?php echo $h; ?>" id="num_par_por_grupo<?php echo $h; ?>" value="<?php echo $fila10['num_participantes_por_grupo']; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input type="number" class="form-control" name="num_Mujeres<?php echo $h; ?>" id="num_Mujeres<?php echo $h; ?>" value="<?php echo $fila10['num_Mujeres']; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input type="number" class="form-control" name="num_Hombres<?php echo $h; ?>" id="num_Hombres<?php echo $h; ?>" value="<?php echo $fila10['num_Hombres']; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><?php /*input type="text" class="form-control" name="duracion_espec_prop<?php echo $h; ?>" id="duracion_espec_prop<?php echo $h; ?>" value="<?php echo $fila10['duracion_espectaculo_propuesto']; ?>" placeholder="Ingresa" /*/
                        $duracion_espectaculo_propuesto = utf8_encode($fila10['duracion_espectaculo_propuesto']);
                  ?>
                  <select name="duracion_espec_prop<?php echo $h; ?>" id="duracion_espec_prop<?php echo $h; ?>" class="form-control">
                    <option value="">Selecciona una opción</option>
                    <option value="15 minutos" <?php if ($duracion_espectaculo_propuesto=='15 minutos'){?> selected <?php } ?>>15 minutos</option>
                    <option value="30 minutos" <?php if ($duracion_espectaculo_propuesto=='30 minutos'){?> selected <?php } ?>>30 minutos</option>
                    <option value="45 minutos" <?php if ($duracion_espectaculo_propuesto=='45 minutos'){?> selected <?php } ?>>45 minutos</option>
                    <option value="60 minutos" <?php if ($duracion_espectaculo_propuesto=='60 minutos'){?> selected <?php } ?>>60 minutos</option>
                    <option value="80 minutos" <?php if ($duracion_espectaculo_propuesto=='80 minutos'){?> selected <?php } ?>>80 minutos</option>
                    <option value="90 minutos" <?php if ($duracion_espectaculo_propuesto=='90 minutos'){?> selected <?php } ?>>90 minutos</option>
                    <option value="100 minutos" <?php if ($duracion_espectaculo_propuesto=='100 minutos'){?> selected <?php } ?>>100 minutos</option>
                    <option value="120 minutos" <?php if ($duracion_espectaculo_propuesto=='120 minutos'){?> selected <?php } ?>>120 minutos</option>
                    <option value="2:30 horas" <?php if ($duracion_espectaculo_propuesto=='2:30 horas'){?> selected <?php } ?>>2:30 horas</option>
                    <option value="3:00 horas" <?php if ($duracion_espectaculo_propuesto=='3:00 horas'){?> selected <?php } ?>>3:00 horas</option>
                    <option value="3:30 horas" <?php if ($duracion_espectaculo_propuesto=='3:30 horas'){?> selected <?php } ?>>3:30 horas</option>
                    <option value="4:00 horas" <?php if ($duracion_espectaculo_propuesto=='4:00 horas'){?> selected <?php } ?>>4:00 horas</option>
                    <option value="1 día" <?php if ($duracion_espectaculo_propuesto=='1 día'){?> selected <?php } ?>>1 día</option>
                    <option value="2 días" <?php if ($duracion_espectaculo_propuesto=='2 días'){?> selected <?php } ?>>2 días</option>
                    <option value="1 semana" <?php if ($duracion_espectaculo_propuesto=='1 semana'){?> selected <?php } ?>>1 semana</option>
                    <option value="2 semanas" <?php if ($duracion_espectaculo_propuesto=='2 semanas'){?> selected <?php } ?>>2 semanas</option>
                    <option value="+2 semanas" <?php if ($duracion_espectaculo_propuesto=='+2 semanas'){?> selected <?php } ?>>+2 semanas</option>
                  </select>
                  </td>
                  <td><input type="text" class="form-control" name="nombre_foro<?php echo $h; ?>" id="nombre_foro<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['nombre_foro']); ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="estado_foro<?php echo $h; ?>" id="estado_foro<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['estado_foro']); ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="mun_alcaldia_foro<?php echo $h; ?>" id="mun_alcaldia_foro<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['municipio_alcaldia_foro']); ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="localidad_foro<?php echo $h; ?>" id="localidad_foro<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['localidad_foro']); ?>" placeholder="Ingresa" /></td>
                  <td><?php /*input type="text" class="form-control" name="publico_dir_prop_art<?php echo $h; ?>" id="publico_dir_prop_art<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['publico_va_dirigida_propuesta_artistica']); ?>" placeholder="Ingresa" /*/?>
                    <select name="publico_dir_prop_art<?php echo $h; ?>" id="publico_dir_prop_art<?php echo $h; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Infantil" <?php if ($fila10['publico_va_dirigida_propuesta_artistica']=='Infantil'){?> selected <?php } ?>>Infantil</option>
                      <option value="Juvenil" <?php if ($fila10['publico_va_dirigida_propuesta_artistica']=='Juvenil'){?> selected <?php } ?>>Juvenil</option>
                      <option value="Adultos" <?php if ($fila10['publico_va_dirigida_propuesta_artistica']=='Adultos'){?> selected <?php } ?>>Adultos</option>
                      <option value="General" <?php if ($fila10['publico_va_dirigida_propuesta_artistica']=='General'){?> selected <?php } ?>>General</option>
                      <option value="Con discapacidad" <?php if ($fila10['publico_va_dirigida_propuesta_artistica']=='Con discapacidad'){?> selected <?php } ?>>Con discapacidad</option>
                      <option value="En reclusión" <?php if (utf8_encode($fila10['publico_va_dirigida_propuesta_artistica'])=='En reclusión'){?> selected <?php } ?>>En reclusión</option>
                      <option value="Comunidad indígena" <?php if (utf8_encode($fila10['publico_va_dirigida_propuesta_artistica'])=='Comunidad indígena'){?> selected <?php } ?>>Comunidad indígena</option>
                      <option value="Migrantes" <?php if ($fila10['publico_va_dirigida_propuesta_artistica']=='Migrantes'){?> selected <?php } ?>>Migrantes</option>
                      <option value="Otros" <?php if ($fila10['publico_va_dirigida_propuesta_artistica']=='Otros'){?> selected <?php } ?>>Otros</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control" name="impacto_socio_cultural_esp<?php echo $h; ?>" id="impacto_socio_cultural_esp<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['impacto_socio_cultural_espectaculo']); ?>" placeholder="Ingresa" /></td> 
                  <td>
              <input type="text" class="form-control" name="sinopsis<?php echo $h; ?>" id="sinopsis<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['sinopsis']); ?>" placeholder="Ingresa" maxlength="600">
                  </td> 
                  <td><input type="text" class="form-control" name="links_mat_videograf_prop<?php echo $h; ?>" id="links_mat_videograf_prop<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['links_material_videografico_propuesta']); ?>" placeholder="Ingresa" /></td>
                  <td>
  <input type="text" class="form-control" name="monto_honorarios_imp_inc_mn<?php echo $h; ?>" id="monto_honorarios_imp_inc_mn<?php echo $h; ?>" value="<?php echo $fila10['monto_honorarios_con_impuestos_incluidos_mn']; ?>" onChange="suma_vertical(<?php echo $i; ?>);suma_vertical_general();" placeholder="Ingresa" onKeyPress="return evita_comas(event)" /></td>
                  <td><input type="text" class="form-control" name="cuenta_actualmente_con_apoyo_FONCA<?php echo $h; ?>" id="cuenta_actualmente_con_apoyo_FONCA<?php echo $h; ?>" value="<?php echo utf8_encode($fila10['cuenta_actualmente_con_apoyo_FONCA']); ?>"></td> 
                </tr>
                <?php }
                $cuantos10 = $cuantos10+1;
                for($i=$cuantos10;$i<=150;$i++){ ?>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $i; ?></td>
                  <td><select name="confirmado_tentativo<?php echo $i; ?>" id="confirmado_tentativo<?php echo $i; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Confirmado">Confirmado</option>
                      <option value="Tentativo">Tentativo</option>
                      </select></td>
                  <td><select name="disciplina<?php echo $i; ?>" id="disciplina<?php echo $i; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Música">Música</option>
                      <option value="Teatro">Teatro</option>
                      <option value="Danza">Danza</option>
                      <option value="Artes visuales">Artes visuales</option>
                      <option value="Gastronomia">Gastronomia</option>
                      <option value="Literatura">Literatura</option>
                      </select></td>
                  <td><select name="categoria<?php echo $i; ?>" id="categoria<?php echo $i; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Amateur">Amateur</option>
                      <option value="Profesional">Profesional</option>
                      </select></td>
                  <td><input type="text" class="form-control" name="nombre_artista_grupo<?php echo $i; ?>" id="nombre_artista_grupo<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td>
                    <input type="text" class="form-control" name="estado_origen_artista_grupo<?php echo $i; ?>" id="estado_origen_artista_grupo<?php echo $i; ?>" placeholder="Ingresa" />
                  </td>
                  <td><input type="text" class="form-control" name="mun_origen_artista_grupo<?php echo $i; ?>" id="mun_origen_artista_grupo<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="num_tel_artista_grupo<?php echo $i; ?>" id="num_tel_artista_grupo<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="email_artista_grupo<?php echo $i; ?>" id="email_artista_grupo<?php echo $i; ?>" placeholder="ejemplo@dominio.com" /></td>
                  <td><input type="text" class="form-control" name="reconoc_import_art_grupo<?php echo $i; ?>" id="reconoc_import_art_grupo<?php echo $i; ?>" placeholder="Ingresa"/></td>
                  <td><input type="text" class="form-control" name="paginaweb_redessoc_artista_grupo<?php echo $i; ?>" id="paginaweb_redessoc_artista_grupo<?php echo $i; ?>" placeholder="Ingresa"/></td>
                  <td><?php /*input type="text" class="form-control" name="<?php echo $i; ?>" id="alcance_Artista<?php echo $i; ?>" placeholder="Ingresa" /*/?>
                    <select name="alcance_Artista<?php echo $i; ?>" id="alcance_Artista<?php echo $i; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Local">Local</option>
                      <option value="Regional">Regional</option>
                      <option value="Estatal">Estatal</option>
                      <option value="Nacional">Nacional</option>
                      <option value="Internacional">Internacional</option>
                    </select>
                  </td>
                  <td><select name="artista_cuenta_con_CFDI<?php echo $i; ?>" id="artista_cuenta_con_CFDI<?php echo $i; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                      </select></td>
                  <td><input type="number" name="anio_experiencia_comprobables<?php echo $i; ?>" id="anio_experiencia_comprobables<?php echo $i; ?>" class="form-control" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input type="text" name="nombre_rep_fis_artista_grupo<?php echo $i; ?>" id="nombre_rep_fis_artista_grupo<?php echo $i; ?>" class="form-control" placeholder="Ingresa" /></td> 
                  <td><input type="text" name="num_tel_rep_fis_artista_grupo<?php echo $i; ?>" id="num_tel_rep_fis_artista_grupo<?php echo $i; ?>" class="form-control" placeholder="Ingresa" /></td>
                  <td><input type="text" name="email_rep_fis_artista_grupo<?php echo $i; ?>" id="email_rep_fis_artista_grupo<?php echo $i; ?>" placeholder="ejemplo@dominio.com<?php echo $i; ?>" class="form-control" /></td>
                  <td><select name="rep_fis_cuenta_con_CFDI<?php echo $i; ?>" id="rep_fis_cuenta_con_CFDI<?php echo $i; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                      </select></td>
                  <td><select name="espacio_requerido<?php echo $i; ?>" id="espacio_requerido<?php echo $i; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Abierto">Abierto</option>
                      <option value="Cerrado">Cerrado</option>
                      </select></td>                                
                  <td>
                  <input type="text" class="form-control" name="nombre_presentacion<?php echo $i; ?>" id="nombre_presentacion<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td>
                    <input class="form-control" name="fecha_presentacion<?php echo $i; ?>" id="fecha_presentacion<?php echo $i; ?>" type="text" placeholder="dd/mm/aaaa"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                  </td>
                  <td><input type="time" class="form-control" name="horario<?php echo $i; ?>" id="horario<?php echo $i; ?>"placeholder="Ingres el horario" size="5" step="1"  class="form-control" /></td>
                  <td><input type="number" class="form-control" name="num_par_por_grupo<?php echo $i; ?>" id="num_par_por_grupo<?php echo $i; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input type="number" class="form-control" name="num_Mujeres<?php echo $i; ?>" id="num_Mujeres<?php echo $i; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input type="number" class="form-control" name="num_Hombres<?php echo $i; ?>" id="num_Hombres<?php echo $i; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><?php /*input type="text" class="form-control" name="duracion_espec_prop<?php echo $i; ?>" id="duracion_espec_prop<?php echo $i; ?>" placeholder="Ingresa" /*/?>
                    <select name="duracion_espec_prop<?php echo $i; ?>" id="duracion_espec_prop<?php echo $i; ?>" class="form-control">
                      <option value="">Selecciona una opción</option>
                      <option value="15 minutos">15 minutos</option>
                      <option value="30 minutos">30 minutos</option>
                      <option value="45 minutos">45 minutos</option>
                      <option value="60 minutos">60 minutos</option>
                      <option value="80 minutos">80 minutos</option>
                      <option value="90 minutos">90 minutos</option>
                      <option value="100 minutos">100 minutos</option>
                      <option value="120 minutos">120 minutos</option>
                      <option value="2:30 horas">2:30 horas</option>
                      <option value="3:00 horas">3:00 horas</option>
                      <option value="3:30 horas">3:30 horas</option>
                      <option value="4:00 horas">4:00 horas</option>
                      <option value="1 día">1 día</option>
                      <option value="2 días">2 días</option>
                      <option value="1 semana">1 semana</option>
                      <option value="2 semanas">2 semanas</option>
                      <option value="+2 semanas">+2 semanas</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control" name="nombre_foro<?php echo $i; ?>" id="nombre_foro<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="estado_foro<?php echo $i; ?>" id="estado_foro<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td>
                  <input type="text" class="form-control" name="mun_alcaldia_foro<?php echo $i; ?>" id="mun_alcaldia_foro<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="localidad_foro<?php echo $i; ?>" id="localidad_foro<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td><?php /*input type="text" class="form-control" name="publico_dir_prop_art<?php echo $i; ?>" id="publico_dir_prop_art<?php echo $i; ?>" placeholder="Ingresa" /*/?>
                    <select name="publico_dir_prop_art<?php echo $i; ?>" id="publico_dir_prop_art<?php echo $i; ?>" class="form-control">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Infantil">Infantil</option>
                      <option value="Juvenil">Juvenil</option>
                      <option value="Adultos">Adultos</option>
                      <option value="General">General</option>
                      <option value="Con discapacidad">Con discapacidad</option>
                      <option value="En reclusión">En reclusión</option>
                      <option value="Comunidad indígena">Comunidad indígena</option>
                      <option value="Migrantes">Migrantes</option>
                      <option value="Otros">Otros</option>
                    </select>
                  </td>
                  <td><input type="text" class="form-control" name="impacto_socio_cultural_esp<?php echo $i; ?>" id="impacto_socio_cultural_esp<?php echo $i; ?>" placeholder="Ingresa" /></td> 
                  <td><input type="text" class="form-control" name="sinopsis<?php echo $i; ?>" id="sinopsis<?php echo $i; ?>" placeholder="Ingresa la sinopsis" maxlength="80" /> </td> 
                  <td><input type="text" class="form-control" name="links_mat_videograf_prop<?php echo $i; ?>" id="links_mat_videograf_prop<?php echo $i; ?>" placeholder="Ingresa" /></td>
                  <td><input type="text" class="form-control" name="monto_honorarios_imp_inc_mn<?php echo $i; ?>" id="monto_honorarios_imp_inc_mn<?php echo $i; ?>" onChange="suma_vertical(<?php echo $i; ?>);suma_vertical_general();" placeholder="Ingresa" /></td>
                  <td><input type="text" name="cuenta_actualmente_con_apoyo_FONCA<?php echo $i; ?>" id="cuenta_actualmente_con_apoyo_FONCA<?php echo $i; ?>" class="form-control" placeholder="Ingresa">
                  </td> 
                 </tr> 
                <?php } ?>
                 <tr> 
                  <td colspan="35" align="right">Total de honorarios artísticos y académicos: </td>
                  <td>
                    <input type="text" name="total_apoyo_suma" id="total_apoyo_suma" placeholder="0.00" value="<?php echo $total_apoyo; ?>" readonly>
                  </td> 
                </tr>
                <tr> 
                  <td colspan="35" align="right"></td>
                  <td><?php 
                  if($num_sql_sum_cant==0){
                    $sumando_todo = 0;
                  } else {
                    $sumando_todo = $suma_pestanas; 
                  }
                  ?>
                    <input type="hidden" class="form-control" name="apoyo_general_paso" id="apoyo_general_paso" value="<?php echo $sumando_todo; ?>">
                  </td> 
                </tr>
                <tr> 
                  <td colspan="35" align="right">Suma total de conceptos registrados: </td>
                  <td><?php $sumando_todo = $suma_pestanas + $total_apoyo; ?>
                    <input type="text" class="form-control" name="fin_suma" id="fin_suma" value="<?php echo $sumando_todo; ?>" readonly>
                  </td> 
                </tr>                
              </table>
          </div>
        </div>
                <div class="row top-buffer">
        					<div class="col-md-12">
        						<div class="form-group clearfix">	
        							<div class="pull-left text-muted text-vertical-align-button">&nbsp;&nbsp;&nbsp;* Campos obligatorios</div>
        								<div class="pull-right">
                           <input type="hidden" name="total_proyecto" id="total_proyecto" value="<?php echo $total_proyecto?>">
                           <input type="hidden" name="tipo_elegidos" id="tipo_elegidos" value="<?php echo $num_sql_elegidos?>">
                          
                           <input class="btn btn-primary" type="button" value="Guardar" id="submit1" name="submit1" onClick="return validarEnvio_honorarios(<?php echo $total_proyecto; ?>);" >
        								</div>
                           </div>
                        </div>
          			</div>
           
		 <div class="bottom-buffer"></div>
	 </div>
  </div>
</form>

<script>
      $gmx(document).ready(function() {
        for(var i = 1; i <= 150; i++) {
            var nombre_fecha = "#fecha_presentacion"+i;
            $(nombre_fecha).datepicker();
        }
      });
</script>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>
<script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
</body>
</html>
