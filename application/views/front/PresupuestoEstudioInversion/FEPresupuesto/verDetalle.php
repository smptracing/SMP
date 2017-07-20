<div class="x_panel">
	<div class="x_content">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<label>Estudio de Inversión</label>
				<input type="text" class="form-control" name="txtEstudioInv" value="<?= $nombreProyectoInver->nombre_est_inv?>" id="txtEstudioInv" autocomplete="off" disabled="disabled">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Sector</label>
				<input type="text" class="form-control" name="txtSector"  value="<?= $SectorPliego->nombre_sector?>"  id="txtSector" autocomplete="off" disabled="disabled">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Pliego</label>
				<input type="text" class="form-control" name="txtPliego" value="<?= $SectorPliego->pliego?>"  id="txtPliego" autocomplete="off" disabled="disabled">
			</div>
		</div>
		<hr>
		<table id="table-fePresupuestoFuente" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>Descripcion de la fuente</td>
					<td>Correlativo Meta</td>
					<td>Año</td>
				</tr>
			</thead> 
			</tbody>
			
		</table>

		<div class="row">
			<div class="col-xs-3">
				<ul class="nav nav-tabs tabs-left">
				        <?php foreach($TipoGasto as $item ){ ?>		
								<li class=""><a href="#<?= $item->desc_tipo_gasto?>" data-toggle="tab"><?=$item->desc_tipo_gasto?></a>					
						<?php } ?>		
					</li>
				</ul>
			</div>
			
			<div class="col-xs-9">
				<!-- Tab panes -->
				<div class="tab-content">
					 <?php foreach($DetalleGasto as $item ){ ?>	
						<div class="tab-pane " id="<?= $item->desc_tipo_gasto?>"><?= $item->desc_detalle_gasto?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

	</div>
</div>
