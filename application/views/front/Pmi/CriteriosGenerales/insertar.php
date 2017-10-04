<form class="form-horizontal"  id="form-addFePresupuesto">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<label>Función</label><br/>
				<select id="cbx_funcion" name="cbx_funcion" class="selectpicker" data-live-search="true"  disabled>
						<?php foreach ($function as $Itemp) {?>
								 <option value="<?=$Itemp->id_funcion.','.$Itemp->nombre_funcion?>" <?=($Itemp->nombre_funcion==$nombre_funcion ? 'selected' : '')?> ><?=$Itemp->nombre_funcion?></option>
						<?php  } ?>
				</select>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<label>Nombre</label>
				<input type="text" class="form-control" id="txtNombreCriterio" name="txtNombreCriterio" placeholder="Nombre Criterio" autocomplete="off">
			</div>
		</div>
		<h4 style="margin-bottom: 0px;">Detalle</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<div class="row" id="divCriterioGeneral">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>Año</label>
				<input type="text" class="form-control" id="txtAnioCriterioG" name="txtAnioCriterioG" placeholder="Año" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>Peso</label>	
				<input type="text" class="form-control" id="txtPesoCriterioG" name="txtPesoCriterioG" placeholder="Peso" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label></label>
				<input type="button" id="btnAgregarCriterioGeneral" class="btn btn-primary form-control" value="Agregar">
			</div>
		</div>
		<div><br/>
			<table id="table-GriterioGenerales" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Peso</td>
						<td>Porcentaje %</td>
						<td></td>
					</tr>
				</thead>
				<tbody id="bodyCriterioGenerales">
						<?php foreach ($listaCritetioGeneral as $key => $item) {?>
						<tr>
									<tr>
										<td><?= $item->nombre_criterio_gen?></td>
										<td><?= $item->peso_criterio_gen?></td>
										<td><?= $item->porcentaje?></td>
										<td><button onclick="EliminarPresClasiAnalitico(<?=$item->id_criterio_gen?>,this);" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class='btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button></td>									</tr>
						</tr>						
					<?php }?>
				</tbody>
			</table>
		</div>
</form>
<script>
$( document ).ready(function() {
    $('#cbx_funcion').selectpicker('refresh');

});
</script>

