<div class="form-horizontal">
	<?php foreach($listaETAnalisisUnitario as $value){ ?>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h4 style="color: blue;text-decoration: underline;"><?=$value->desc_recurso?></h4>
				<div>
					<table class="table">
						<thead>
							<tr>
								<th>Descripción</th>
								<th>Cuadrilla</th>
								<th>Und.</th>
								<th>Rendimiento</th>
								<th>Cant.</th>
								<th>Precio U.</th>
								<th>Sub total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($value->childETDetalleAnalisisUnitario as $item){ ?>
								<tr>
									<td><?=$item->desc_detalle_analisis?></td>
									<td><?=$item->cuadrilla?></td>
									<td><?=$item->id_unidad?></td>
									<td><?=$item->rendimiento?></td>
									<td><?=$item->cantidad?></td>
									<td><?=$item->precio_unitario?></td>
									<td><?=$item->precio_parcial?></td>
									<td>
										<a href="#" style="color: green;text-decoration: underline;"><b>Editar</b></a>
										&nbsp;
										<a href="#" style="color: red;text-decoration: underline;"><b>Eliminar</b></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php } ?>
</div>