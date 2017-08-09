<form class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label" style="text-align: left;">Nombre Proyecto</label>
			<div>
				<textarea name="txtNombreProyectoInversion" id="txtNombreProyectoInversion" rows="3" class="form-control" style="resize: none;resize: vertical;" readonly="readonly"></textarea>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Etapa</label>
			<div>
				<select id="cobEtapa" name="cobEtapa" class="form-control"> 
					<option value="">Formulación</option>
				</select>
			</div>
		</div>
	</div>
	<hr style="margin-bottom: 4px;margin-top: 4px;">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">Partida Descripción</div>
						<div class="col-md-3 col-sm-3 col-xs-12">Rendimiento</div>
						<div class="col-md-3 col-sm-3 col-xs-12">Und.</div>
						<div class="col-md-3 col-sm-3 col-xs-12">100</div>
					</div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-12">
							<label>Rendimiento</label>
							<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Rendimiento" required="required" autocomplete="off" >
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label>Unidad</label>
							<select id="cobUnidad" name="cobUnidad" class="form-control"> 
								<option value="">##</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label>Cant.</label>
							<input id="txtCantidad" name="txtCantidad" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>Precio</label>
							<input id="txtPrecio" name="txtPrecio" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>Total</label>
							<input id="txtTotal" name="txtTotal" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
						</div>
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label>Etapa</label>
							<select id="cobEtapa" name="cobEtapa" class="form-control"> 
								<option value="">##</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label>.</label>
							<input type="button" class="btn btn-info" value="Proceder" style="width: 100%;">
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
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row" style="text-align: right;">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</form>