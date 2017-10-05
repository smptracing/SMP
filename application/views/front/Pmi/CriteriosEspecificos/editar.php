<form  id="form-editarCriteriosEspecificos"   action="<?php echo base_url();?>index.php/PmiCriterioEspecifico/editar" method="POST" >

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Criterio específico</label>
							<div>
								<input id="hdId" name="hdId" value="" class="form-control col-md-7 col-xs-12" type="hidden">
								<input id="txtcriterioespecifico" name="txtcriterioespecifico" value="" class="form-control col-md-4 col-xs-12">	
							</div>	
						</div>
					</div>
			
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Peso</label>
							<div>
								<input id="txtpeso" name="txtpeso" value="" class="form-control col-md-4 col-xs-12">	
							</div>	
						</div>
					</div>
		
				</div>
				
			</div>
		</div>
	</div>
	<div class="ln_solid"></div>
		<div class="row" style="text-align: right;">
			<button  id="btnEnviarFormulario" class="btn btn-success">Guardar</button>
			<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>