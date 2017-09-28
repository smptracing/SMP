<form class="form-horizontal"  id="form-addFePresupuesto">
		<h4 style="margin-bottom: 0px;">Datos generales</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<input type="text" class="form-control" name="cbx_estudioInversion" value="<?= $nombre_estudio_inv?>" id="cbx_estudioInversion" autocomplete="off" disabled="disabled">
				<input type="hidden" class="form-control" name="idEstudioInversion"  value="" id="idEstudioInversion" autocomplete="off">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<label>Modulo</label>
				<select id="cbx_Sector" name="cbx_Sector" class="form-control notValidate" required="">
				
				</select>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Entregable</label>
				<input  type="text" class="form-control" id="txtPliego" name="txtPliego" placeholder="Entregable" autocomplete="off">
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12">
				<label>.</label>
				<input type="button" id="btnAgregarFEPresupuestoFuente" class="btn btn-success form-control" value="Agregar">
			</div>
		</div>
		<div><br/>
			<table id="table-PresupestoFormulacion" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Modulo </td>
						<td>Entregable</td>
						<td></td>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row" style="text-align: right;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-success">Registrar Entregable.</button>
			<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>
