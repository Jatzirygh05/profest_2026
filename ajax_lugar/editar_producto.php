<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "La clave está vacía.";
	} elseif (!empty($_POST['edit_id'])){
	require_once('../Connections/conexion.php'); 
	//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    //$prod_code = mysqli_real_escape_string($con,(strip_tags($_POST["edit_code"],ENT_QUOTES)));
	$prod_name = mysqli_real_escape_string($con,(strip_tags($_POST["edit_name"],ENT_QUOTES)));
	$prod_ctry = mysqli_real_escape_string($con,(strip_tags($_POST["edit_category"],ENT_QUOTES)));
	
	 $id_producto=intval($_POST['edit_id']);
	
	// UPDATE data into database
    $sql = "UPDATE cronograma_acciones_ejecucion_festival SET fechaacciones='".$prod_name."', acciones='".$prod_ctry."', fecha_hora_registro='NOW()' WHERE id_cronograma_acciones='".$id_producto."' ";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El registro ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regresa y vuelve a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Felicidades!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>