<form class="form-horizontal"  id="form-addCriterioGeneral">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<label>Función</label><br/>
				<input type="hidden" class="form-control" id="txtIdFuncion" name="txtIdFuncion" value="<?= $id_funcion;?>" placeholder="" autocomplete="off">
				<select id="cbx_funcion" name="cbx_funcion" class="selectpicker" data-live-search="true"  disabled>
						<?php foreach ($function as $Itemp) {?>
								 <option value="<?=$Itemp->id_funcion?>" <?=($Itemp->id_funcion==$id_funcion ? 'selected' : '')?> ><?=$Itemp->nombre_funcion?></option>
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
				<input style="margin-top: 5px;" type="button" id="btnAgregarCriterioGeneral" class="btn btn-primary form-control" value="Agregar">
			</div>
		</div>
		<div style="height:300px;overflow:scroll;overflow-x: hidden; "><br/>
			<table id="table-GriterioGenerales" class="table table-striped table-bordered jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Peso</td>
						<td>Porcentaje %</td>
						<td style="width:15%"></td>
					</tr>
				</thead>
				<tbody id="bodyCriterioGenerales">
						<?php $peso=0;$por=0; foreach ($listaCritetioGeneral as $key => $item) { $peso +=$item->peso_criterio_gen; $por=100; ?>
						<tr>
									<tr>
										<td><?= $item->nombre_criterio_gen?></td>
										<td><?= $item->peso_criterio_gen?></td>
										<td><?php  if($item->porcentaje<1){ echo '0'.$item->porcentaje;}else{ echo $item->porcentaje;} ?> %</td>
										<td>
											<button type="button" class="btn btn-primary btn-xs " onclick="EditarCriterioGeneral(<?=$item->id_criterio_gen?>)"><i class="fa fa-pencil"></i></button>
											<button type="button" class="btn btn-primary btn-xs " onclick="paginaAjaxDialogo(null, 'Registro Criterio Específicos',{ id_criterio_gen:'<?=$item->id_criterio_gen?>',nombre_criterio_gen:'<?=$item->nombre_criterio_gen?>' }, base_url+'index.php/PmiCriterioEspecifico/index', 'GET', null, null, false, true);"><i class="fa fa-bars"></i></button>
											<button onclick="EliminarCriterioGeneral(<?=$item->id_criterio_gen?>,<?=$item->id_funcion?>);" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class='btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button></td>									
									</tr>
						</tr>						
					<?php }?>
					<tr>
						<td> </td>
						<td> <h6>Total <?php echo $peso;?></h6> </td>
						<td> <h6><?php echo $por ;?> %</h6> </td>
						<td> </td>
					</tr>
				</tbody>
			</table>
		</div>
</form>
<script>
$( document ).ready(function() {

    $('#cbx_funcion').selectpicker('refresh');
    $('#btnAgregarCriterioGeneral').on('click', function(event)
	{
		event.preventDefault();
		paginaAjaxJSON($('#form-addCriterioGeneral').serialize(), '<?=base_url();?>index.php/PmiCriterioG/insertar', 'POST', null, function(objectJSON)
		{
			//$('#modalTemp').modal('hide');

			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function()
			{
				var html;
                    	$("#bodyCriterioGenerales").html('');
                    	var peso=0;var por=100;
                    	$.each(objectJSON.listaCritetioGeneral,function(index,element)
                    	{
                    	    peso = (parseInt(peso) + parseInt(element.peso_criterio_gen));
                    	    html +='<tr>';
                    		html +='<td>'+element.nombre_criterio_gen+'</td>';
                    		html +='<td>'+element.peso_criterio_gen+'</td>';
                    		html +='<td>'+element.porcentaje+'</td>';
                    		html +='<td><button type="button" class="btn btn-primary btn-xs " onclick="EditarCriterioGeneral('+element.id_criterio_gen+')"><i class="fa fa-pencil"></i></button>';
                    		html +='<button onclick="EliminarCriterioGeneral('+element.id_criterio_gen+','+element.id_funcion+');" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                    		html +='</td>';
                    		html +='</tr>';
                    	});
                    	html +='<td> </td>';
                    	html +='<td> <h6>'+peso+'</h6> </td>';
                    	html +='<td> <h6> '+por+' %</h6> </td>';
                    	html +='<td> </td>';
                 $("#table-GriterioGenerales > #bodyCriterioGenerales").append(html);
			});

		}, false, true);

	});

});
function EditarCriterioGeneral(idCriterioGeneral)
{
	paginaAjaxDialogo(null, 'Editar Criterio General',{ idCriterioGeneral:idCriterioGeneral}, base_url+'index.php/PmiCriterioG/editar', 'GET', null, null, false, true);
}
function EliminarCriterioGeneral(idCriterioGeneral,id_funcion)
{
		$('#cbx_funcion').selectpicker('refresh');
		event.preventDefault();
		paginaAjaxJSON({ "idCriterioGeneral" : idCriterioGeneral,"id_funcion" : id_funcion}, '<?=base_url();?>index.php/PmiCriterioG/eliminar', 'POST', null, function(objectJSON)
		{
			//$('#modalTemp').modal('hide');

			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function()
			{
				var html;
                    	$("#bodyCriterioGenerales").html('');
                    	var peso=0;var por=100;
                    	$.each(objectJSON.listaCritetioGeneral,function(index,element)
                    	{
                    	    peso = (parseInt(peso) + parseInt(element.peso_criterio_gen));
                    	    html +='<tr>';
                    		html +='<td>'+element.nombre_criterio_gen+'</td>';
                    		html +='<td>'+element.peso_criterio_gen+'</td>';
                    		html +='<td>'+element.porcentaje+'</td>';
                    		html +='<td><button type="button" class="btn btn-primary btn-xs " onclick="EditarCriterioGeneral('+element.id_criterio_gen+')"><i class="fa fa-pencil"></i></button>';
                    		html +='<button onclick="EliminarCriterioGeneral('+element.id_criterio_gen+','+element.id_funcion+');" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                    		html +='</td>';
                    		html +='</tr>';
                    	});
                    	html +='<td> </td>';
                    	html +='<td> <h6>'+peso+'</h6> </td>';
                    	html +='<td> <h6> '+por+' %</h6> </td>';
                    	html +='<td> </td>';
                 $("#table-GriterioGenerales > #bodyCriterioGenerales").append(html);
			});

		}, false, true);
	
}
</script>

