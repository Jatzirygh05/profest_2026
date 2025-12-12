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
  <script type="text/javascript" src="js/Validacion.js"></script>
  <!-- script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script-->
</head>
<body>
  <main class="page">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ol class="breadcrumb">
            <li><a href="https://www.gob.mx/"><i class="icon icon-home"></i></a></li>
            <li><a href="index.php">Inicio</a></li>
            <li class="active">Registrarme</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <h1>Convocatoria PROFEST 2025</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <h1>Registrarme</h1>
        </div>
      </div>
      <div class="alert alert-warning"><div id="countdown"></div></div>
      <form METHOD="POST" id="apInf" name="apInf" action="guardar_acceso.php">
        <a href="#" class="scroll"></a>
        <div class="row" id="rowError" name="rowError" style="display:none">
          <div class="col-md-12">
            <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Es necesario capturar los campos obligatorios.</div>
          </div>
        </div>
        <div class="row" id="rowCompletado" name="rowCompletado" style="display:none">
          <div class="col-md-12">
            <div id="datos_correctos" class="alert alert-success"><strong>¡Felicidades!</strong> Has completado con éxito el formulario</div>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-8"> 
        		<h3>Información general</h3>
        	</div>
          <div class="col-md-12"><hr class="red small-margin"></div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group"> 
              <label>Nombre del usuario que registra el proyecto<samp id="errnombre_usuario_reg_proyectoAs" name="errnombre_usuario_reg_proyectoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre del usuario que registra el proyecto"></span></label>
              <input type="text" id="nombre_usuario_reg_proyecto" name="nombre_usuario_reg_proyecto" class="form-control" placeholder="Ingresa el nombre del usuario que registra el proyecto">
              <small id="errnombre_usuario_reg_proyecto" name="errnombre_usuario_reg_proyecto" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Correo electrónico para el registro en Sistema<samp id="errCorreo_sistAs" name="errCorreo_sistAs" class="control-label">*</samp>:</label><input type="text" id="Correo_sist" name="Correo_sist" class="form-control" placeholder="ejemplo@dominio.com" onBlur="validarEmail2(this.id);">
              <small id="errCorreo_sist" name="errCorreo_sist" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
              <small id="emailOK"></small>
            </div>
          </div>
        </div>      
        <div class="row">
          <div class="col-md-4"></div>
            <div class="col-md-4 col-md-offset-4"><hr/></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group clearfix">	
    			    <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
    				  <div class="pull-right"><input class="btn btn-primary" type="button" value="Enviar" id="submit1" name="submit1" onClick="return validarEnvio();" ></div>
            </div>
          </div> 
        </div>
      </form>   
        <div class="row">
        <div class="col-md-12 top-buffer"></div>
    </div>
    <div class="form-group clearfix">
      <div class="alert alert-info">
          <p><strong>Aviso de privacidad simplificado del Sistema de datos personales de los formularios de la convocatoria para el otorgamiento de 
                     subsidios en coinversión a festivales culturales y artísticos PROFEST</strong></p>
                    <p>La Secretaría de Cultura, a través de la Dirección General de Promoción y Festivales Culturales, con domicilio en Avenida Paseo de la Reforma No. 175, Alcaldía Cuauhtémoc, Colonia Cuauhtémoc, Código Postal 06500, Ciudad de México, es la responsable del tratamiento de los datos personales que nos proporcione, los cuales serán protegidos conforme a lo dispuesto por la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, y demás normatividad que resulte aplicable.
                    Los datos personales serán tratados con la finalidad de llevar un registro de las postulaciones, para poder realizar las notificaciones del fallo de la Comisión Dictaminadora y en caso de ser aprobados, dar continuidad a los trámites jurídicos y administrativos, hasta la conclusión de los proyectos
                    De manera adicional, los datos recabados se utilizarán para generar estadísticas e informes, la información, no estará asociados con la persona titular de los datos personales, por lo que no será posible identificarla.
                    Al momento de dar a conocer el aviso de privacidad, el titular de los datos manifiesta tácitamente su conformidad con el mismo y otorga su consentimiento para que dichos datos sean utilizados por el responsable, para las finalidades señaladas.
                    Los datos personales que se recaban no podrán ser transferidos, salvo que se actualice alguna de las excepciones previstas en el artículo 22 la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, o cuando, previamente, se haya obtenido su consentimiento expreso por escrito o por un medio de autenticación similar.
          </p>
          <p>Si deseas conocer nuestro aviso de privacidad integral, lo podrás consultar en el portal <a href="formatos_para_descarga_general/AVISO DE PRIVACIDAD INTEGRAL_PROFEST.pdf" target="_blank">Aviso de Privacidad Integral</a></p>
        </div>
    </div>
  </main>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
</body>
</html>