<form class="form-horizontal " id="form-editarUnidad_Medida" action="<?php echo  base_url();?>index.php/Unidad_Medida/editar" method="POST">
	<div class="item form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Descripción <span class="required">*</span>
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" style="display: none;">
			<input id="hdId" name="hdId" value="<?=$unidadMedida->id_unidad;?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Descripción" required="required" type="hidden">
			<input id="txtDescripcion" name="txtDescripcion" value="<?=$unidadMedida->descripcion;?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Descripción" required="required" type="text">
		</div>
	</div>
	<div class="ln_solid"></div>
	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">
			<button class="btn btn-success">
				<span class="glyphicon glyphicon-floppy-disk"></span>
				Guardar
			</button>
			<button id="btnElimianrModal" class="btn btn-danger" data-dismiss="modal" onclick="removeModal();">
				<span class="glyphicon glyphicon-remove"></span>
				Cancelar
			</button>
		</div>
	</div>
</form>
<script>
	$('#form-editarUnidad_Medida').on('submit', function(e)
	{
		//e.preventDefault();
	});
</script>