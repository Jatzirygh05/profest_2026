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

 <nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
              <span class="sr-only">Interruptor de Navegaci&oacute;n</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Dependencia</a>
          </div>
          <div class="collapse navbar-collapse" id="subenlaces">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Enlace 1</a></li>
              <li><a href="#">Enlace 2</a></li>
            </ul>
          </div>
        </div>
      </nav>
      
     <div class="container top-buffer-submenu">
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
echo "<pre>";
	print_r($_POST);
echo "</pre>";

$id_usuario_b=$_POST['no'];
$nombre_b = $_POST['nombre'];
$ap_b = $_POST['ap'];
$am_b = $_POST['am'];
$clave_usuario_b = $_POST['clave_usuario'];
$contrasena_usuario_b = $_POST['contrasena_usuario'];
$cargo_b = $_POST['cargo'];
$administrador_b = $_POST['administrador'];
	
	//*** INICIO VALIDAR QUE el usuario y contraseña NO EXISTAN ***//
		
		$query_rfc="SELECT * FROM usuarios WHERE clave_usuario='$clave_usuario_b' 
		or contrasena_usuario='$contrasena_usuario_b';";
		$exe_query_rfc=mysql_query($query_rfc);
		$cuenta_rfc=mysql_num_rows($exe_query_rfc);
		
		if($cuenta_rfc==2)
		{
			echo "<span class=mensajes_negritas_inf_guardada><center><br>
				<br><br><strong>Error:</strong> La cuenta '".$clave_usuario_b."' ya está asignada a otro usuario.</span>";
				echo "<br><br>Espere un momento... <META HTTP-EQUIV='Refresh' CONTENT='2;URL=modificar_cuentas_usuario.php?numero=$id_usuario_b'></center>";	
		} else {
			
	 //*** FIN VALIDAR QUE EL RFC NO EXISTA ***//
		
		echo $query_mod_usuarios="UPDATE usuarios SET 
		nombre='$nombre_b', 
		apellido_paterno='$ap_b', 
		apellido_materno='$am_b', 
		clave_usuario='$clave_usuario_b',
		contrasena_usuario='$contrasena_usuario_b',
		puesto='$cargo_b', 
		administrador='$administrador_b',
		level='$level_b',
		usuario_modificacion='$cve_user',
		fecha_hora_modificacion='$fecha_modifica'
		WHERE id_usuario_b='$id_usuario_b';";
		$exe_query_mod_usuarios=mysql_query($query_mod_usuarios) or die ("No se puede guardar la informaci&oacute;n, intenlo m&aacute;s tarde.");
		

				if(!$exe_query_mod_usuarios)
				{
					echo "<span class=mensajes_negritas_inf_guardada><center><br>
						<br><br><strong>Error:</strong> No se ha podido guardar la informaci&oacute;n. 
						<br>Favor de contactar al administrador</span>";
		echo "<br><br>Espere un momento... <META HTTP-EQUIV='Refresh' CONTENT='3;URL=modificar_cuentas_usuario.php?numero=$id_usuario_b'></center>";
				}
				else
				{
					echo "<span class=mensajes_negritas_inf_guardada><center><br>
						<br><br>Informaci&oacute;n guardada correctamente, espere un momento por favor...<br></center>";								
					echo "<center><br><br><input type=button name=Cerrar value=Cerrar onClick=recarga_padre_y_cierra_ventana();></center>";
					echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=login.php'>";
				}
	}
	
?>
</div></div></div>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

  </body>
</html>