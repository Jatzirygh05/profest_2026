<?php require_once('Connections/profest_rep.php'); ?>
<!DOCTYPE html>
  <html lang="es">
  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repositorio Profest</title>


    <!-- CSS -->
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     
	</head>
<body>

      
     <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <ol class="breadcrumb">
              <li><a href="#"><i class="icon icon-home"></i></a></li>
              <li><a href="index">Inicio</a></li>
              <li class="active">Registrarme</li>
            </ol>
          </div>
        </div>
 		<div class="row">
          <div class="col-sm-8">
            <h1>Repositorio Profest</h1>
          </div>
        </div>
        
        <div class="row top-buffer"></div>
        
          <div class="row">
          <div class="col-sm-12">

<?php
/*echo "<pre>";
	print_r($_POST);
echo "</pre>";*/

$tipo_de_instancia=$_POST['tipo_de_instancia'];
$Nombre_Inst=$_POST['Nombre_Inst'];
$nombre_titular=$_POST['nombre_titular'];
$grado=$_POST['grado'];
$cargo=$_POST['cargo'];
$PostCodRepLeg=$_POST['PostCodRepLeg'];
$EstadoRepLeg=$_POST['EstadoRepLeg'];
$Municipio_AlcRepLeg=$_POST['Municipio_AlcRepLeg'];
$ColoniaRepLeg=$_POST['ColoniaRepLeg'];
$CalleRepLeg=$_POST['CalleRepLeg'];
$ExteriorRepLeg=$_POST['ExteriorRepLeg'];
$InteriorRepLeg=$_POST['InteriorRepLeg'];
$LadaRepLeg=$_POST['LadaRepLeg'];
$TelefonoRepLeg=$_POST['TelefonoRepLeg'];
$extension=$_POST['extension'];
$Correo_tit=$_POST['Correo'];
$Correo_sist=$_POST['Correo_sist'];
$CLUNI=$_POST['CLUNI'];
	
	//*** INICIO VALIDAR QUE el usuario y contraseña NO EXISTAN ***//
	$rs = mysql_query("SELECT MAX(id_usuario) AS id FROM usuarios");
	if ($row = mysql_fetch_row($rs)) {
	 $id = trim($row[0])+1;
	}
	
	$sep_usu=explode('@',$Correo_sist);
	$cual_usu_solo=$sep_usu[0];
	
	$cons_cual_primero =  $cual_usu_solo.'_1'.$id.'9';
	$cual_usu=$cual_usu_solo.'20*'.$id;
		
		$query_rfc="SELECT * FROM usuarios WHERE correo_electronico='$Correo_sist';";
		$exe_query_rfc=mysql_query($query_rfc);
		$cuenta_rfc=mysql_num_rows($exe_query_rfc);
		
		if($cuenta_rfc>0)
		{
			/*echo "<span class=mensajes_negritas_inf_guardada><center><br>
				<br><br><strong>Error:</strong> </span>";
				*/
				
				echo "<div class='row' id='rowError' name='rowError' style='display:block'>";
					echo "<div class='col-md-12'>";
					echo "<div class='alert alert-danger'><strong>".utf8_encode('¡Atención!')."</strong> No se ha podido ".utf8_encode('generar')." tu usuario, ya que la cuenta de correo <strong>'".$Correo_sist."'</strong> ya existe, espera un momento, por favor...</div>
							</div>
        				  </div>";
				echo "<META HTTP-EQUIV='Refresh' CONTENT='5;URL=registrate_aqui.php'></center>";	
		} else {
			
	 //*** FIN VALIDAR QUE EL correo NO EXISTA ***//
$query_mod_usuarios="INSERT INTO usuarios (`id_usuario`, `nombre_titular`, `cargo`, `clave_usuario`,
  `contrasena_usuario`, `usuario_captura`, `level`, `tipo_instancia`, `nombre_instancia_postulante`, `grado_academico`,
  `cp`, `estado`, `municio_alcaldia`, `colonia`, `calle`, `no_ext`, `no_int`, `lada`, `telefono_fijo`, 
  `extension`, `correo_electronico`, `fecha_hora_captura`, `CLUNI`, `Correo_tit`) 
    VALUES (NULL, '$nombre_titular', '$cargo', '$cual_usu', 
	'$cons_cual_primero', '$cual_usu', 'op', '$tipo_de_instancia', '$Nombre_Inst', '$grado', 
	'$PostCodRepLeg', '$EstadoRepLeg', '$Municipio_AlcRepLeg', '$ColoniaRepLeg', '$CalleRepLeg', '$ExteriorRepLeg', '$InteriorRepLeg', '$LadaRepLeg', '$TelefonoRepLeg', 
	'$extension', '$Correo_sist', NOW(), '$CLUNI', '$Correo_tit');";
	
	$exe_query_mod_usuarios=mysql_query($query_mod_usuarios); //or die ("No se puede guardar la informaci&oacute;n, intenlo m&aacute;s tarde.");
		

				if(!$exe_query_mod_usuarios)
				{
					/*echo "<span class=mensajes_negritas_inf_guardada><center><br>
						<br><br><strong>Error:</strong> No se ha podido guardar la informaci&oacute;n. 
						<br>Favor de contactar al administrador</span>";
	//	*/
	
					echo "<div class='row' id='rowError' name='rowError' style='display:block'>";
					echo "<div class='col-md-12'>";
					echo "<div class='alert alert-danger'><strong>".utf8_encode('¡Atención!')."</strong> No se ha podido ".utf8_encode('generar')." tu usuario, por favor revisa los datos que proporcionaste.</div>
							</div>
        				  </div>";
					//echo "<META HTTP-EQUIV='Refresh' CONTENT='5;URL=index.php'></center>";
				}
				else
				{
					/*echo "<span class=mensajes_negritas_inf_guardada><center><br>
						<br><br>Informaci&oacute;n guardada correctamente, espere un momento por favor...<br></center>";								
					//echo "<center><br><br><input type=button name=Cerrar value=Cerrar onClick=recarga_padre_y_cierra_ventana();></center>";*/
											
					require_once('mail/conf_correo_activacion.php');
					
					echo "<div class='row' style='display:block'>";
            			echo "<div class='col-md-12'>";
						echo "<div class='alert alert-success'><strong>".utf8_encode('¡Felicidades!')."</strong> Ya se ha generado tu cuenta para ingresar a la <strong>convocatoria PROFEST</strong>, en un momento la ".utf8_encode('recibirás en el correo electrónico')." <strong>$Correo_sist</strong></div>
							  </div>
						  </div>";
					
					echo "<META HTTP-EQUIV='Refresh' CONTENT='7;URL=index.php'>";
				}
	}
	
?>
</div></div></div>

 <div class="row">
		<div class="col-md-12 top-buffer">					
		</div>
	</div>

<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

  </body>
</html>