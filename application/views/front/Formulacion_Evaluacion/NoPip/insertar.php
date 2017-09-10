<form class="form-horizontal" id="form-addPresupuestoEjecucion" action="<?php echo base_url();?>index.php/ET_Presupuesto_Ejecucion/insertar" method="POST" >
	<div class="item form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Estado<span class="required">*</span></label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input id="txtDescripcion" name="txtDescripcion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Ingrese presupuesto ejecucion" required="required" autocomplete="off" type="text">
		</div>
	</div>
	<div class="ln_solid"></div>
	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-success">
				<span class="glyphicon glyphicon-floppy-disk"></span>
				Guardar
			</button>
			<button class="btn btn-danger" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove"></span>
				Cancelar
			</button>
		</div>
	</div>
</form>


