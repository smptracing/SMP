<form class="form-horizontal"  id="form-addCriterioGeneral">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<label>Función</label><br/>
				<input type="hidden" class="form-control" id="txtIdFuncion" name="txtIdFuncion" value="<?= $id_funcion;?>" placeholder="" autocomplete="off">
				<select id="cbx_funcion" name="cbx_funcion" class="selectpicker" data-live-search="true" >
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
			<div class="col-md-2 col-sm-6 col-xs-12">
				<label>Año</label>
				<input type="text" class="form-control" id="txtAnioCriterioG" name="txtAnioCriterioG" value="<?= $anio;?>" placeholder="Año" autocomplete="off">
			</div>
			<div class="col-md-2 col-sm-6 col-xs-12">
				<label>Peso</label>	
				<input type="text" class="form-control" id="txtPesoCriterioG" name="txtPesoCriterioG" placeholder="Peso" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<label></label>
				<input style="margin-top: 5px;" type="button" id="btnAgregarCriterioGeneral" class="btn btn-primary form-control" value="Agregar">
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<label></label>
				<button class="btn btn-info form-control" style="margin-top: 5px;margin-left: 100px;" id="btnGuardarCambios"><i class="fa fa-refresh"> Guardar</i> </button>
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
										<td><?= $item->nombre_criterio_gen?></td>
										<td><?= $item->peso_criterio_gen?></td>
										<td><?php  if($item->porcentaje<1){ echo '0'.$item->porcentaje;}else{ echo $item->porcentaje;} ?> %</td>
										<td>
											<button type="button" class="btn btn-primary btn-xs " onclick="EditarCriterioGeneral(<?=$item->id_criterio_gen?>)"><i class="fa fa-pencil"></i></button>
											<button type="button" class="btn btn-primary btn-xs " onclick="CriterioEspecificos(<?=$item->id_criterio_gen?>)"><i class="fa fa-bars"></i></button>
											<button onclick="EliminarCriterioGeneral(<?=$item->id_criterio_gen?>,<?=$item->id_funcion?>,<?=$item->anio_criterio_gen ?>);" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class='btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button></td>									
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
$(function()
	{
		$('#btnGuardarCambios').on('click', function(event)
		{
			txtAnioCriterioG=$('#txtAnioCriterioG').val();
			window.location.href=base_url+"index.php/PmiCriterioG/criterioFuncion/"+txtAnioCriterioG;
			renderLoading();
		});
		
		$('#form-addCriterioGeneral').formValidation(
				{
					framework: 'bootstrap',
					excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
					live: 'enabled',
					message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
					trigger: null,
					fields:
					{
						txtNombreCriterio:
						{
							validators: 
							{
								notEmpty:
								{
									message: '<b style="color: red;text-align: center;">El campo "Criterio General" es requerido.</b>'
								}
							}
						},
						txtAnioCriterioG:
						{
							validators: 
							{
								notEmpty:
								{
									message: '<b style="color: red;text-align: center;">El campo "Anio Criterio" debe ser un número entero.</b>'
								},
								regexp:
					            {
					                regexp: /^\d*$/,
					                message: '<b style="color: red;">El campo "Anio Criterio" debe ser un número entero.</b>'
					            }
							}
						},
						txtPesoCriterioG:
						{
							validators: 
							{
								notEmpty:
								{
									message: '<b style="color: red;text-align: center;">El campo "Criterio General" es requerido.</b>'
								},
								regexp:
					            {
					                regexp: /^\d*$/,
					                message: '<b style="color: red;">El campo "Peso Criterio General" debe ser un número entero.</b>'
					            }
							}
						}
						
						
					}
				});
});

$(function()
	{
 
    $('#cbx_funcion').selectpicker('refresh');

    $('#btnAgregarCriterioGeneral').on('click', function(event)
	{
		event.preventDefault();
		$('#form-addCriterioGeneral').data('formValidation').validate();

		if(!($('#form-addCriterioGeneral').data('formValidation').isValid()))
		{
			return;
		}

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
                    		html +='<button type="button" class="btn btn-primary btn-xs " onclick="CriterioEspecificos('+element.id_criterio_gen+')"><i class="fa fa-bars"></i></button>';
                    		html +='<button onclick="EliminarCriterioGeneral('+element.id_criterio_gen+','+element.id_funcion+','+element.anio_criterio_gen+');" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                    		html +='</td>';
                    		html +='</tr>';
                    	});
                    	html +='<tr><td> </td>';
                    	html +='<td> <h6>'+peso+'</h6> </td>';
                    	html +='<td> <h6> '+por+' %</h6> </td>';
                    	html +='<td> </td></tr>';
                 $("#table-GriterioGenerales > #bodyCriterioGenerales").append(html);
			});

		}, false, true);

	});

});
function EditarCriterioGeneral(idCriterioGeneral)
{
	//alert(idCriterioGeneral);
	paginaAjaxDialogo(1, 'Editar Criterio General',{ idCriterioGeneral:idCriterioGeneral}, base_url+'index.php/PmiCriterioG/editar', 'GET', null, null, false, true);
}
function CriterioEspecificos(id_criterio_gen)
{
	paginaAjaxDialogo(2, 'Registro Criterio Específicos',{ id_criterio_gen:id_criterio_gen}, base_url+'index.php/PmiCriterioEspecifico/index', 'GET', null, null, false, true);
}
function EliminarCriterioGeneral(idCriterioGeneral,id_funcion,anio_criterio_gen)
{
		$('#cbx_funcion').selectpicker('refresh');
		event.preventDefault();
		paginaAjaxJSON({ "idCriterioGeneral" : idCriterioGeneral,"id_funcion" : id_funcion,'anio_criterio_gen':anio_criterio_gen}, '<?=base_url();?>index.php/PmiCriterioG/eliminar', 'POST', null, function(objectJSON)
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
                    		html +='<button type="button" class="btn btn-primary btn-xs " onclick="CriterioEspecificos('+element.id_criterio_gen+')"><i class="fa fa-bars"></i></button>';
                    		html +='<button onclick="EliminarCriterioGeneral('+element.id_criterio_gen+','+element.id_funcion+','+element.anio_criterio_gen+');" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                    		html +='</td>';
                    		html +='</tr>';
                    	});
                    	html +='<tr><td> </td>';
                    	html +='<td> <h6>'+peso+'</h6> </td>';
                    	html +='<td> <h6> '+por+' %</h6> </td>';
                    	html +='<td> </td></tr>';
                 $("#table-GriterioGenerales > #bodyCriterioGenerales").append(html);
			});

		}, false, true);
	
}
</script>

