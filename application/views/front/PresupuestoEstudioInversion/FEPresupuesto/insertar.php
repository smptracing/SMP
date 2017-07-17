<form class="form-horizontal " id="form-addTipoGastoFE" action="<?php echo base_url();?>index.php/FEPresupuesto_Inv/insertar" method="POST" >
	<div class="item form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo de Gasto<span class="required">*</span>
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input id="txt_descripcion_tipo" name="txt_descripcion_tipo" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Ingrese Tipo de Gasto" required="required" type="text">
		</div>
	</div>

	<div class="ln_solid"></div>
	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">

			<button  type="submit" class="btn btn-success">
				<span class="glyphicon glyphicon-floppy-disk"></span>
				Guardar
			</button>
			<button type="submit" class="btn btn-danger" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove"></span>
				Cancelar
			</button>

		</div>
	</div>
</form>	
																														