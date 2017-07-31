<form class="form-horizontal" id="form-addClasificador" action="<?php echo base_url();?>index.php/Clasificador/insertar" method="POST" >
	<div class="row">
		<label class="control-label col-md-2 col-sm-1 col-xs-12" >
			Nombre Proyecto
		</label>
		<div class="col-md-5 col-sm-3 col-xs-12">
			<input id="txtNombreProyecto" name="txtNombreProyecto" class="form-control col-md-4 col-xs-12"  placeholder="Nombre De Proyecto" required="required" autocomplete="off" >
		</div>
		<label class="control-label col-md-1" >
			Etapa
		</label>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<select id="cobEtapa" name="cobEtapa" class="form-control notValidate"> 
				<option value="">Formulación </option>
			</select>
		</div>
	</div><hr><br>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-12">
								Partida Descripción 
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								Rendimiento  
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								Und.     	 
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								 			100 
							</div>
											
					</div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Rendimiento
							</label>
							<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Rendimiento" required="required" autocomplete="off" >
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Unidad
							</label>
							<select id="cobUnidad" name="cobUnidad" class="form-control notValidate"> 
								<option value="">##</option>
							</select>
						</div>
						<div class="col-md-1 col-sm-3 col-xs-12">
							<label>
								Cant.
							</label>
							<input id="txtCantidad" name="txtCantidad" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Precio
							</label>
							<input id="txtPrecio" name="txtPrecio" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Etapa
							</label>
							<select id="cobEtapa" name="cobEtapa" class="form-control notValidate"> 
								<option value="">##</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Total
							</label>
							<input id="txtTotal" name="txtTotal" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>
						<div class="col-md-1 col-sm-3 col-xs-12" style="text-align: center;margin-top: 10px;">
							<label>
							</label>
							<button id="btnProcesar" class="btn btn-success btn-xs">Proceder</button>
						</div>
					</div><br>
					<div class="row">
						<table id="table-Partidad" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<td>Rendimiento</td>
									<td>Und.</td>
									<td>Cant.</td>
									<td>Precio U.</td>
									<td>Fecah R.</td>
									<td>Etapa.</td>
									<td>Anl.</td>
									<td>Total</td>
									<td></td>
								</tr>
							</thead>
								<tbody>
									
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-12">
								Partida Descripción de la otra Partida
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								Rendimiento  
							</div>
							<div class="col-md-2 col-sm-3 col-xs-12">
								Und.     	 
							</div>
							<div class="col-md-2 col-sm-3 col-xs-12">
								 			100 
							</div>
							<div class="col-md-1 col-sm-1 col-xs-12" style="text-align: center;margin-top: -10px; font-size: 5px;">
								<button id="btnProcesarDetallePartidad" class="btn btn-link">Asignar Precio</button>
							</div>
											
					</div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Rendimiento
							</label>
							<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Rendimiento" required="required" autocomplete="off" >
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Unidad
							</label>
							<select id="cobUnidad" name="cobUnidad" class="form-control notValidate"> 
								<option value="">##</option>
							</select>
						</div>
						<div class="col-md-1 col-sm-3 col-xs-12">
							<label>
								Cant.
							</label>
							<input id="txtCantidad" name="txtCantidad" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Precio
							</label>
							<input id="txtPrecio" name="txtPrecio" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Etapa
							</label>
							<select id="cobEtapa" name="cobEtapa" class="form-control notValidate"> 
								<option value="">##</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>
								Total
							</label>
							<input id="txtTotal" name="txtTotal" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>

						<div class="col-md-1 col-sm-3 col-xs-12" style="text-align: center;margin-top: 10px;">
							<label>
							</label>
							<button id="btnProcesar" class="btn btn-success btn-xs">Proceder</button>
						</div>
					</div><br>
					<div class="row">
						<table id="table-DetallePartida" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
								</tr>
							</thead>
								<tbody>
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ln_solid"></div>
	<div class="row" style="text-align: right;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-success">Guardar Clasificador</button>
			<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>
