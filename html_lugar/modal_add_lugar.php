<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Cronograma</h4>
					</div>
					<div class="modal-body">               
                    	<div class="form-group datepicker-group">
							<label class="control-label" for="calendar">Fecha:</label>
							<input type="text" name="name" id="name" class="form-control" required>
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
						</div>
						<div class="form-group">
							<label>Acciones</label>
							<input type="text" name="category" id="category" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>
        
        <script>
		$gmx(document).ready(function() {
		  $('#name').datepicker();
		});
</script>