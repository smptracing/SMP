
<form  id="frmInsertarInsumo" action="<?php echo base_url();?>index.php/Expediente_Tecnico/insertar" method="POST">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">		
					<div class="row" id="validarValorizacion">
						<div class="col-md-4 col-sm-2 col-xs-12">
							<label for="control-label">Unidad de Medida: </label>
							<div>
								<select name="listaUnidadMedida" name="listaUnidadMedida" class="form-control">
									<?php foreach($listaUnidadMedida as $item){ ?>
										<option value="<?=$item->id_unidad?>"><?=html_escape($item->descripcion)?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-8 col-sm-6 col-xs-12">
							<label class="control-label">Insumo: </label>
							<div>
								<input class="form-control" name="txtInsumo" id="Insumo" autocomplete="off"  >	
							</div>	
						</div>
					</div>			
				</br>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row" style="text-align: center;">
		<button  id="btnEnviarFormulario" class="btn btn-success">Guardar</button>
		<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	</div>
</form>