<form class="form-horizontal"  id="form-addAsignarPuntajePi">
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
				<label class="control-label">Nombre del Proyecto de Inversion</label>
				<div>
					<input id="txtIdPi" name="txtIdPi" value="" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" autocomplete="off"  type="hidden">	
					<input id="txtNombreUe" name="txtNombrePi" value="" class="form-control col-md-4 col-xs-12"  autocomplete="off" readonly="readonly">	
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
				<label class="control-label">Seleccionar criterio general</label>
				<div>
				
					<select  id="combocriteriogeneral" name="combocriteriogeneral" class="form-control col-md-2 col-xs-2">
							
								<option value=""></option>
						
						</select>	
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
				<label class="control-label">Seleccionar criterio especifico</label>
				<div>
				
					<select  id="combocriterioespecif" name="combocriterioespecif" class="form-control col-md-2 col-xs-2">
							
								<option value=""></option>
						
						</select>	
				</div>	
			</div>
		</div>

		<div class="row" id="divCriterioGeneral">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label></label>
				<input style="margin-top: 5px;" type="button" id="btnAsignarPuntajePip" class="btn btn-primary form-control" value="Agregar">
			</div>
		</div>

		<div><br/>
			<table id="table-GriterioGenerales" class="table table-striped table-bordered jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Criterio</td>
						<td>Puntaje</td>
						<td>Opcion</td>
					</tr>
				</thead>
				<tbody id="bodyCriterioGenerales">
						
				</tbody>
			</table>
		</div>
</form>
