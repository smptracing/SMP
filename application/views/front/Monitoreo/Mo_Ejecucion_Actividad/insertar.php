<form  id="frmInsertarEjecucionActividad">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content" >		
				<div class="row">
					<div class="col-md-12">
						<div id ="divFormEjecucionActividad">
							<input type="hidden" id="hdIdPi" name="hdIdPi" autocomplete="off" class="form-control" value="<?=$idPi?>">
							<input type="hidden" id="hdIdActividad" name="hdIdActividad" autocomplete="off" class="form-control" value="<?=$idActividad?>">
							<div class="row">
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Mes: </label>
									<div>
										<select id="txtMes" name="txtMes" class="form-control selectpicker" data-live-search="true">
											<?php foreach ($meses as $key => $value) { ?>
												<option value="<?=$value?>"><?=$value?></option>
											<?php } ?>
										</select>
									</div>
								</div>	
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Año: </label>
									<div>
										<input type="text" id="txtAnio" name="txtAnio" autocomplete="off" placeholder="____" class="form-control" value="<?= date('Y')?>" maxlength = "4" >
									</div>
								</div>	
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Ejec. Fís. Programada: </label>
									<div>
										<input type="text" id="txtFechaInicio" name="txtFechaInicio" autocomplete="off" class="form-control">
									</div>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Ejec. Fín. Programada: </label>
									<div>
										<input type="text" id="txtFechaFin" name="txtFechaFin" autocomplete="off" class="form-control">
									</div>
								</div>							
							</div>							
						</div>
						<div class="row">
							<br><br>
							<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center">
								<input type="button" name="" class="btn btn-success" value="Guardar">
								<button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar ventana</button>
							</div>	
						</div>
					</div>					
				</div>
			</div>				
		</div>
	</div>
</div>
</form>
<script>
	$('.selectpicker').selectpicker({
	});
</script>