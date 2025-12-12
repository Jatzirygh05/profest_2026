<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group datepicker-group">
							<label>Fecha</label>
							<input type="text" name="edit_name" id="edit_name" class="form-control" required>
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            <input type="hidden" name="edit_id" id="edit_id">
						</div>
						<div class="form-group">
							<label>Acciones</label>
							<input type="text" name="edit_category" id="edit_category" class="form-control" required>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

<script type="text/javascript" src="https://framework-gb.cdn.gob.mx/assets/scripts/jquery-ui-datepicker.js"></script>
        
        <script>
		$gmx(document).ready(function() {
		  $('#edit_name').datepicker();
		});
</script>