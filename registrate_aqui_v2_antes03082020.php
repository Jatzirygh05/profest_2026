<!DOCTYPE html>
  <html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profest</title>
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
      <!--egb_script language="javascript" type="text/javascript" src="js/ValidacionAccesos.js"></script-->  

    <!-- Esta liga contiene el script para el codigo postal -->
    <script type="text/javascript" src="js/select_dependientes.js"></script>
    <script type="text/javascript" src="js/select_dependientes_colonia.js"></script>
    <script type="text/javascript" src="js/select_dependientes_cp.js"></script>
    <script type="text/javascript" src="js/select_dependientes_estado.js"></script>
    <script type="text/javascript" src="js/Validacion.js"></script>
    <?php /*script type="text/javascript" src="js/suma_cantidades.js"></script>
    <script type="text/javascript" src="js/evita_comas.js"></script>
    <script type="text/javascript" src="js/valora_checkbox.js"></script>
   <script type="text/javascript" src="js/busca_rfc.js"></script*/ ?>
   <script laguage="javascript">
	function habilitar(form)
	{
	if(form.tipo_de_instancia.options[0].selected || form.tipo_de_instancia.options[1].selected==true || form.tipo_de_instancia.options[2].selected==true || form.tipo_de_instancia.options[3].selected==true || form.tipo_de_instancia.options[4].selected==true)
	{form.CLUNI.disabled=true;}
	else
	{form.CLUNI.disabled=false;}
	}
   </script>
  </head>
  <body>     
<?php //include "conexion1.php";
//include("funciones_select.php");
?>
    <!-- Menu -->
    <main class="page">
      <!-- Contenedor -->
      <div class="container">
        <!-- Breadcrumbs -->	
        <!-- Ruta del sitio -->
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
          <div class="col-sm-8">
            <h1>Convocatoria PROFEST 2020<?php //print_r($_SESSION); ?></h1>
          </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h1>Registrarme</h1>
            </div>
        </div>
        <div class="alert alert-warning"><div id="countdown"></div></div>
    <form METHOD="POST" id="apInf" name="apInf" action="guardar_acceso.php">
		<!-- Titulo Principal -->        
         <a href="#" class="scroll"></a>
        
<!-- *********************PRIMERA PARTE********************* -->
        <!-- Ventana emergente -->
        <div class="row" id="rowError" name="rowError" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Es necesario capturar los campos obligatorios.</div>
            </div>
        </div>

        <!-- Registro completado -->
        <div class="row" id="rowCompletado" name="rowCompletado" style="display:none">
            <div class="col-md-12">
                <div id="datos_correctos" class="alert alert-success"><strong>¡Felicidades!</strong> Has completado con éxito el formulario 
                   <?php /*input class="btn btn-primary" type="button" value="Imprimir solicitud" id="Imprimir solicitud" name="Imprimir solicitud" onClick="enviar();" */?>
                
                </div>
            </div>
        </div>
        
        

        <div class="row">
        	<div class="col-md-8"> 
        		<h3>Información general</h3>
        	</div>
        	<div class="col-md-12"><hr class="red small-margin"></div>
        </div>

        
        <!-- Primera Fila -->
        <div class="row">

        	<!-- Campo RFC -->
        	<div class="col-md-4"> 
        		<div class="form-group">
        			<label>Tipo de Instancia<samp id="errtipo_de_instanciaAs" name="errtipo_de_instanciaAs" class="control-label">*</samp>:</label>
                    
                    <select id="tipo_de_instancia" name="tipo_de_instancia" class="form-control" onChange="habilitar(this.form)">
                    	<option value="" selected="selected">Selecciona una opción</option>
                        <option value="Instancia Estatal de Cultura">Instancia Estatal de Cultura</option>
                        <option value="Instancia Municipal de Cultura">Instancia Municipal de Cultura</option>
                        <option value="Municipio o Alcaldía">Municipio o Alcaldía</option>
                        <option value="Instancia de Educación Superior Pública Estatal">Instancia de Educación Superior Pública Estatal</option>
                        <option value="Organización de la Sociedad Civil">Organización de la Sociedad Civil</option>
                    </select>
        			<small id="errtipo_de_instancia" name="errtipo_de_instancia" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
        		</div>
        	</div>

             </div>     
              <div class="row">
            
            <!-- Campo Nombre de la Instancia Postulante -->
                <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Nombre de la Instancia Postulante<samp id="errNombre_InstAs" name="errNombre_InstAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la Instancia Postulante o razón social"></span></label>
                        <input type="text" id="Nombre_Inst" name="Nombre_Inst" class="form-control" placeholder="Ingresa el nombre de la Instancia Postulante">
                        <small id="errNombre_Inst" name="errNombre_Inst" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
                
             </div>     
              <div class="row">
               <!-- Campo Nombre de la o el Títular -->
                <div class="col-md-4">
                    <div class="form-group"> 
                        <label>Representante legal<samp id="errnombre_titularAs" name="errnombre_titularAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el Títular"></span></label>
                        <input type="text" id="nombre_titular" name="nombre_titular" class="form-control" placeholder="Ingresa el nombre de la o el Títular">
                        <small id="errnombre_titular" name="errnombre_titular" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
           <div class="col-md-4">
                <div class="form-group"> 
                     <label> Grado académico<samp id="errgradoAs" name="errgradoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Grado académico de la o el Títular"></span></label>                 
                     <select id="grado" name="grado" class="form-control">
                        <option value="" selected="selected">Selecciona una opción</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Dra.">Dra.</option>
                        <option value="Mtro.">Mtro.</option>
                        <option value="Mtra.">Mtra.</option>
                        <option value="Lic.">Lic.</option>
                        <option value="Ing.">Ing.</option>
                        <option value="C.">C.</option>                       
                    </select>
                        <small id="errgrado" name="errgrado" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
           
            <div class="col-md-4">
                    <div class="form-group"> 
                        <label> Cargo<samp id="errcargoAs" name="errcargoAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el Títular"></span></label>
                        <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Ingresa el cargo de la o el Títular">
                        <small id="errcargo" name="errcargo" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                </div>
           </div>
           
           
            <div class="row">    
            <!-- Código postal -->
            <div class="col-md-4">
                <div class="form-group">

                    <label>Código Postal<samp id="errPostCodRepLegAs" name="errPostCodRepLegAs" class="control-label">*</samp>:</label>
                    <input type="number" id="PostCodRepLeg" name="PostCodRepLeg" class="form-control" placeholder="Ingresa el código postal" onBlur="cargaContenido4(this.id)">
                    <small id="errPostCodRepLeg" name="errPostCodRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            <!-- Estado -->
            <div class="col-md-4">
                <div class="form-group"><!--<?php// generaUr("EstadoRepLeg"); ?>-->
                    <?php 
                    $consulta_p="SELECT c_estado, d_estado FROM codigos_postales_copy_todos group by d_estado order by d_estado";
                    $consulta=mysql_query($consulta_p);?>
                    <label>Estado<samp id="errEstadoRepLegAs" name="errEstadoRepLegAs" class="control-label">*</samp>:</label>
                    <select id="EstadoRepLeg" name="EstadoRepLeg" class="form-control" onChange='cargaContenido(this.id)'>
                        <option value="">Selecciona una opción</option>
                        <?php 
                            while($registro=mysql_fetch_row($consulta))
                            {
                            // Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
                            //$registro[1]=$registro[1];
                            // Imprimo las opciones del select
                            echo "<option value='".$registro[0]."'>". utf8_decode($registro[1])."</option>";
                            }
                        ?>
                    </select>
                    <small id="errEstadoRepLeg" name="errEstadoRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            
             <!-- Municipio o alcaldía -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Municipio o Alcaldía<samp id="errMunicipio_AlcRepLegAs" name="errMunicipio_AlcRepLegAs" class="control-label">*</samp>:</label>
                    <select id="Municipio_AlcRepLeg" name="Municipio_AlcRepLeg" class="form-control" disabled>
                        <option value="">Selecciona una opción</option>
                    </select>
                    <small id="errMunicipio_AlcRepLeg" name="errMunicipio_AlcRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            
        </div>
        <!-- Fila CP -->
        <div class="row"></div> 
        <!-- Segunda Fila -->
        <div class="row">          
            <!-- Colonia -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Colonia<samp id="errColoniaRepLegAs" name="errColoniaRepLegAs" class="control-label">*</samp>:</label>
                    <select id="ColoniaRepLeg" name="ColoniaRepLeg" class="form-control" disabled>
                        <option value="">Selecciona una opción</option>
                    </select>
                    <small id="errColoniaRepLeg" name="errColoniaRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            <!-- Calle -->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Calle<samp id="errCalleRepLegAs" name="errCalleRepLegAs" class="control-label">*</samp>:</label>
                    <input type="text" id="CalleRepLeg" name="CalleRepLeg" class="form-control" placeholder="Ingresa la calle">
                    <small id="errCalleRepLeg" name="errCalleRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            
            <!-- Número exterior -->
            <div class="col-md-2">
                <div class="form-group">
                    <label>No. exterior<samp id="errExteriorRepLegAs" name="errExteriorRepLegAs" class="control-label">*</samp>:</label>
                    <input type="text" id="ExteriorRepLeg" name="ExteriorRepLeg" class="form-control" placeholder="Ingresa el número exterior">
                    <small id="errExteriorRepLeg" name="errExteriorRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            
             <!-- Número interior -->
            <div class="col-md-2">
                <div class="form-group">
                    <label>No. interior:</label>
                    <input type="text" id="InteriorRepLeg" name="InteriorRepLeg" class="form-control" placeholder="Ingresa el número interior">
                </div>
            </div>
            
        </div>


        <?php /*div class="row"> 
            <div class="col-md-4">
                <div class="form-group">
                  <!-- Lada -->
                  <div class="form-control-lada">
                    <label for="lada">Lada<samp id="errLadaRepLegAs" name="errLadaRepLegAs" class="control-label">*</samp>:</label>
                    <input type="number" id="LadaRepLeg" name="LadaRepLeg" class="form-control" placeholder="Lada">   
                    <small id="errLadaRepLeg" name="errLadaRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                  <!-- Telefono -->
                  <div class="form-control-phone">
                    <label for="phone">Teléfono fijo<samp id="errTelefonoRepLegAs" name="errTelefonoRepLegAs" class="control-label">*</samp>:</label>
                    <input type="number" id="TelefonoRepLeg" name="TelefonoRepLeg" class="form-control" placeholder="Telefono fijo">
                    <small id="errTelefonoRepLeg" name="errTelefonoRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  </div>
                </div>
            </div> 
        </div>  

            <!-- Tercera fila -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Extensión:</label><input type="text" id="extension" name="extension" class="form-control" placeholder="Ingresa la extensión">
                        <small id="errEmailRepLeg" name="errEmailRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div>
                 </div>             
              	<!-- Correo electronico YA ESTA EN LA BD -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Correo electrónico de la o el Títular<samp id="errCorreoAs" name="errCorreoAs" class="control-label">*</samp>:</label><input type="text" id="Correo" name="Correo" class="form-control" placeholder="ejemplo@dominio.com" onBlur="validarEmail(this.id);">
                        <small id="errCorreo" name="errCorreo" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <small id="emailOK"></small>
                    </div>
                </div>
            </div*/?>
                <div class="row">
             <div class="col-md-4">
                <div class="form-group">
                    <?php /*div class="form-control-lada">
                        <label for="lada">Lada<samp id="errLadaRepLegAs" name="errLadaRepLegAs" class="control-label">*</samp>:</label>
                        <input type="number" id="LadaRepLeg" name="LadaRepLeg" class="form-control" placeholder="Lada">   
                        <small id="errLadaRepLeg" name="errLadaRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    </div*/ ?>
                        <label>Teléfono fijo (10 dígitos)<samp id="errTelefonoRepLegAs" name="errTelefonoRepLegAs" class="control-label">*</samp>:</label>
                        <input type="text" id="TelefonoRepLeg" name="TelefonoRepLeg" class="form-control" placeholder="Ingresa el teléfono fijo" maxlength="10">
                        <small id="errTelefonoRepLeg" name="errTelefonoRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                        <label>Extensión<?php /*samp id="errEmailRepLegAs" name="errEmailRepLegAs" class="control-label">*</samp*/?>:</label><input type="text" id="extension" name="extension" class="form-control" placeholder="Ingresa la extensión">
                        <small id="errEmailRepLeg" name="errEmailRepLeg" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="form-group" id="nacionalidadSolicitante">
                    <label>Correo electrónico de la o el Títular<samp id="errCorreoAs" name="errCorreoAs" class="control-label">*</samp>:</label>
                    <input type="text" id="Correo" name="Correo" class="form-control" placeholder="ejemplo@dominio.com" onBlur="validarEmail(this.id);">
                    <small id="errCorreo" name="errCorreo" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                    <small id="emailOK"></small>
                </div>
            </div>
        </div>
          
           <div class="row"> 
                <!-- Correo electronico nuevo para la BD -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Correo electrónico para el registro en Sistema<samp id="errCorreo_sistAs" name="errCorreo_sistAs" class="control-label">*</samp>:</label><input type="text" id="Correo_sist" name="Correo_sist" class="form-control" placeholder="ejemplo@dominio.com" onBlur="validarEmail2(this.id);">
                        <small id="errCorreo_sist" name="errCorreo_sist" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        <small id="emailOK"></small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>CLUNI (Organizaciones de la Sociedad Civil):<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Número de registro federal asignado por INDESOL"></span></label><input type="text" id="CLUNI" name="CLUNI" class="form-control" placeholder="Ingresa el CLUNI" disabled>
                    </div>
                </div>
            </div>

        <!-- Tercera fila -->
        <div class="row"></div>
      
    <!-- Fila de la línea -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8 col-md-offset-4"><hr/></div>
            </div>

        

        <div class="row">
            <div class="col-md-12">
                <div class="form-group clearfix">	

    			     <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
    				    <div class="pull-right">
    
    				        <input class="btn btn-primary" type="button" value="Enviar" id="submit1" name="submit1" onClick="return validarEnvio();" >
    
    			        </div>
                        
                	</div>
            </div> 
         </div>
    </form>   
    
    <div class="row">
		<div class="col-md-12 top-buffer">					
		</div>
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
                    <p>
                    Si deseas conocer nuestro aviso de privacidad integral, lo podrás consultar en el portal <a href="formatos_para_descarga_general/AVISO DE PRIVACIDAD INTEGRAL_PROFEST.pdf" target="_blank">Aviso de Privacidad Integral</a>
                    </p>
        </div>
    </div>        
     </div>
    </main>
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>            
        <script type="text/javascript" src="js/reloj_regresivo_cierre.js"></script>
    </body>
</html>