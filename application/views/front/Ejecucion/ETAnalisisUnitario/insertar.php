<div class="form-horizontal">
	<div class="row">
		<div class="col-md-7 col-sm-7 col-xs-12">
			<label for="control-label">Descripción del insunmo</label>
			<div>
				<select name="selectDescripcionDetalleAnalisis" id="selectDescripcionDetalleAnalisis" class="form-control"></select>
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12">
			<label for="control-label">Cuadrilla</label>
			<div>
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<label for="control-label">Undidad</label>
			<div>
				<select name="" id="" class="form-control">
					<?php foreach($listaUnidadMedida as $value){ ?>
						<option value="<?=$value->id_unidad?>"><?=$value->descripcion?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<label for="control-label">Rendimiento</label>
			<div>
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<label for="control-label">Cantidad</label>
			<div>
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<label for="control-label">Precio unitario</label>
			<div>
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<label for="control-label">Sub total</label>
			<div>
				<input type="text" class="form-control" readonly="readonly">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<label for="control-label">.</label>
			<div>
				<input type="button" class="btn btn-info" value="Guardar" style="width: 100%;">
			</div>
		</div>
	</div>
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
									<td><?=$item->descripcion?></td>
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
<script>
	$(function()
	{
		$('#selectDescripcionDetalleAnalisis').selectpicker({ liveSearch: true }).ajaxSelectPicker(
		{
	        ajax: {
	            url: base_url+'index.php/ET_Insumo/verPorDescripcion',
	            data: { valueSearch : '{{{q}}}' }
	        },
	        locale:
	        {
	            emptyTitle: 'Buscar insumo'
	        },
	        preprocessData: function(data)
	        {
	        	var dataForSelect=[];

	        	for(var i=0; i<data.length; i++)
	        	{
	        		dataForSelect.push(
	                {
	                    "value" : data[i].desc_insumo,
	                    "text" : data[i].desc_insum,
	                    "disabled" : false
	                });
	        	}

	            return dataForSelect;
	        },
	        preserveSelected: false
	    });

	    $('#selectDescripcionDetalleAnalisis').on('change', function()
	    {
			var selected=$(this).find("option:selected").val();

			if(selected.trim()!='')
			{
				
			}
	    });
	});
</script>