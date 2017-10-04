<form class="form-horizontal"  id="form-addFePresupuesto">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-xs-12">
				<label>Criterio General</label>
				<input type="text" class="form-control" id="txtNombreCriterioG" value="<?=$nombre_criterio_gen?>" name="txtNombreCriterio" >
			</div>
			<div class="col-md-6 col-sm-8 col-xs-12">
				<label>Criterio Específico</label>
				<input type="text" class="form-control" id="txtNombreCriterio" name="txtNombreCriterio" placeholder="Ingrese Criterio Específico" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-8 col-xs-12">
				<label>Peso</label>
				<input type="text" class="form-control" id="txtNombreCriterio" name="txtNombreCriterio" placeholder="Ingrese Criterio Específico" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>.</label>
				<input type="button" id="btnAgregarCriterioGeneral" class="btn btn-primary form-control" value="Agregar">
			</div>
		</div>
	<hr>
		<div>
			<table id="table-GriterioGenerales" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Criterio especifico</td>
						<td>Peso</td>
						<td>Porcentaje</td>
						<td>Accion</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listaCriterioEspec as $key => $item) {?>
						<tr>
									<tr>
										<td><?= $item->nombre_criterio?></td>
										<td><?= $item->peso?></td>
										<td><?= $item->porcentaje?></td>
										<td><?= $item->porcentaje?></td>
																
									</tr>
						</tr>						
					<?php }?>
				</tbody>
			</table>
		</div>
		<div class="row" style="text-align: right;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-primary">Registrar Criterio Especifico</button>
			<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>
