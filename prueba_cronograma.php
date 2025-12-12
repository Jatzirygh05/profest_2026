<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD de productos con PHP - MySQL - jQuery AJAX </title>
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
        <div class="table-wrapper">
           
                <div class="row">
                    <div class="col-md-8">
						<h2>k) Cronograma de acciones para la ejecución del festival*</h2>
					</div>
                </div>
                <div class="row">
                	<div class="col-md-4">
                        <button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Agregar opción
                        </button>		
					</div>
                </div>
                
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->
            
			
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<?php include("html/modal_add.php");?>
	<!-- Edit Modal HTML -->
	<?php include("html/modal_edit.php");?>
	<!-- Delete Modal HTML -->
	<?php include("html/modal_delete.php");?>
	<script src="js/script.js"></script>
     <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>
        
        <script>
		$gmx(document).ready(function() {
		  $('#periodo_realizacion_fecha_inicio').datepicker();
		  $('#periodo_realizacion_fecha_termino').datepicker();
		});
		</script>
</body>
</html>