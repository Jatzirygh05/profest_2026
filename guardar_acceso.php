<?php //echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index_cierre.php'>";
require_once('./Connections/conexion.php'); ?>
<!DOCTYPE html>
  <html lang="es">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocatoria Profest 2025</title>
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
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
            <h1>Convocatoria PROFEST 2025</h1>
          </div>
		</div>
        <div class="row top-buffer"></div>
          <div class="row">
          	<div class="col-sm-12">
				<?php
				$nombre_usuario_reg_proyecto=utf8_decode($_POST['nombre_usuario_reg_proyecto']);
				$Correo_sist=$_POST['Correo_sist'];
				//------ INICIO VALIDAR QUE el usuario y contrase�a NO EXISTAN ***
				$rs1 = "SELECT MAX(id_usuario) AS id FROM usuarios";
				$rs = mysqli_query($con,$rs1);
				if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
				$id = trim($row['id'])+1;
				}
				$sep_usu=explode('@',$Correo_sist);
				$cual_usu_solo=$sep_usu[0];
				
				$cons_cual_primero =  $cual_usu_solo.'_1'.$id.'9';
				$cual_usu=$cual_usu_solo.'230'.$id;
					
					$query_rfc="SELECT * FROM usuarios WHERE correo_electronico='$Correo_sist';";
					$exe_query_rfc=mysqli_query($con, $query_rfc);
					$cuenta_rfc=mysqli_num_rows($exe_query_rfc);
					
					if($cuenta_rfc>0){
							echo "<div class='row' id='rowError' name='rowError' style='display:block'>";
								echo "<div class='col-md-12'>";
								echo "<div class='alert alert-danger'><strong>¡Atenci&oacuten!</strong> No se ha podido generar tu usuario, ya que la cuenta de correo <strong>'".$Correo_sist."'</strong> ya existe, espera un momento, por favor...</div>
										</div>
									</div>";
							echo "<META HTTP-EQUIV='Refresh' CONTENT='5;URL=registrate_aqui.php'></center>";	
					} else {
				// FIN VALIDAR 
				$query_mod_usuarios="INSERT INTO usuarios (`id_usuario`, `nombre_usuario_reg_proyecto`, `level`, `correo_electronico`, 
						`clave_usuario`, `contrasena_usuario`, `usuario_captura`, `fecha_hora_captura`) 
				VALUES (NULL, '$nombre_usuario_reg_proyecto', 'op', '$Correo_sist', 
					'$cual_usu', '$cons_cual_primero', '$cual_usu', NOW())";
				$exe_query_mod_usuarios=mysqli_query($con, $query_mod_usuarios); //or die ("No se puede guardar la informaci&oacute;n, intenlo m&aacute;s tarde.");
							if(!$exe_query_mod_usuarios)
							{
								echo "<div class='row' id='rowError' name='rowError' style='display:block'>";
								echo "<div class='col-md-12'>";
								echo "<div class='alert alert-danger'><strong>Atenci&oacuten!</strong> No se ha podido generar tu usuario, por favor revisa los datos que proporcionaste.</div>
										</div></div>";
								echo "<META HTTP-EQUIV='Refresh' CONTENT='5;URL=index.php'></center>";
							} else {
								echo "<div class='row' style='display:block'>
								<div class='col-md-12'><div class='alert alert-success'><strong>¡Felicidades!</strong> 
									Ya se ha generado tu cuenta para ingresar a la <strong>convocatoria PROFEST</strong>, 
									en un momento la recibir&aacutes en el correo electr&oacutenico
									<strong>".$Correo_sist."</strong></div></div></div>";
								require('./mail/conf_correo_activacion.php');
								//index_revision_profest2_2021.php
								//cons_cual_primero='.$cons_cual_primero.'&nombre_firma='.$nombre_firma.'&puesto_firma='.$puesto_firma'
								echo "<META HTTP-EQUIV='Refresh' CONTENT=7;URL=index.php>";
							}
				} ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 top-buffer"></div>
	</div>
	<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
</body>
</html>