<form class="form-horizontal" id="form-addPresupuestoEjecucion" action="<?php echo base_url();?>index.php/ET_Presupuesto_Ejecucion/insertar" method="POST" >
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label col-md-6 col-sm-6 col-xs-6" >Tipo No PIP </label>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
				<select id="TipoNoPip" name="TipoNoPip" class="form-control " data-live-search="true"  title="Buscar Proyecto...">
					<?php  foreach ($ListarPipProgramados as  $item) {?>
							<option value="<?= $item->id_tipo_nopip?>"> <?= $item->desc_tipo_nopip; ?></option>
					<?php } ?>

				</select>
		</div>
	</div>
	<hr style="margin-top: 4px;">
	<div class="row" style="text-align: center;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-success">Guardar </button>
			<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
	
</form>


