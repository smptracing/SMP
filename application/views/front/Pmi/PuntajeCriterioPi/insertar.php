<form class="form-horizontal"  id="form-addAsignarPuntajePi">
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
				<label class="control-label">Nombre del Proyecto de Inversion </label>
				<input type="hidden" name="id_funcion" id="id_funcion" value="<?= $id_funcion?>">
				<div>
					<input type="hidden" id="txtIdPi" name="txtIdPi" value="<?= $listaUnicaProIv->id_pi?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" autocomplete="off"  type="hidden">	
					<input id="txtNombreUe" name="txtNombrePi" value="<?= $listaUnicaProIv->nombre_pi?>" class="form-control col-md-4 col-xs-12"  autocomplete="off" readonly="readonly">	
				</div>	
			</div>
		</div><br/>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
					<label class="control-label">Año</label>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
					<input style="margin-left: -120px;" type="text" class=" form-control " name="anioPriorizacion" id="anioPriorizacion" value="<?= $anio?>" readonly>
			</div>
		</div><br/>
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
					<label class="control-label">Criterio general: &nbsp;&nbsp;&nbsp;</label>
					<input type="hidden"  name="sumaPesoTotalGeberal" value="<?= $sumaPesoTotalGeberal ?>">
					<select  id="combocriteriogeneral" name="combocriteriogeneral"  class="selectpicker" data-width="75%" data-live-search="true">
						<option value="">Buscar Criterio General</option>
						<?php foreach($listaCritetioGeneral as $item){ ?>
							<option value="<?=$item->id_criterio_gen; ?>"><?= $item->nombre_criterio_gen;?></option>
						<?php } ?>
					</select>	
			</div>
		</div><br/>
		<div class="row">
			<input type="hidden" name="SumaTotaCriterio" id="SumaTotaCriterio">
			<div class="col-md-12 col-sm-3 col-xs-12">
					<label class="control-label">Criterio especifico:</label>
					<select  id="combocriterioespecif" name="combocriterioespecif[]" class="selectpicker" multiple data-actions-box="true" data-width="75%" data-live-search="true" required="required" class="form-control">
								
					</select>	
			</div>
		</div>

		<div class="row" id="divCriterioGeneral">
			<div class="col-md-2 col-sm-2 col-xs-12">
				<label></label>
				<input style="margin-top: 5px;" type="button" id="btnAsignarPuntajePip" class="btn btn-primary form-control" value="Agregar"/>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12">
				<label></label>
				<button class="btn btn-info form-control" style="margin-top: 5px;margin-left: 50px;" id="btnGuardarCambios"><i class="fa fa-refresh"> Guardar</i> </button>
			</div>
		</div>

		<div style="height:300px;overflow:scroll;overflow-x: hidden; "><br/>
			<table id="table-puntaje" class="table table-striped table-bordered jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Criterio</td>
						<td>Puntaje</td>
						<td>Opcion</td>
					</tr>
				</thead>
				<tbody id="bodyPuntaje">
						<?php $puntaje=0; foreach ($listarPuntajeCriterioPip as $itemp) { $puntaje =round($puntaje,2)+round($itemp->puntaje_criterio,2)?>
							<tr>
								<td><?= $itemp->nombre_criterio ?></td>
	                    		<td><?= $itemp->puntaje_criterio ?></td>
	                    		<td>
	                    			<button type="button" class="btn btn-danger btn-xs " onclick="eliminarPuntaje(<?=$itemp->id_ptje_criterio?>,<?=$itemp->id_pi?>,<?= $itemp->anio_ptje_criterio ?>)"><span class="fa fa-trash"></span></button>
	                    		</td>
	                    	</tr>
						<?php } ?>
					<tr>
						<td></td>
						<td><button type="button" class="btn btn-success">Puntaje Total <span class="badge"><?= number_format($puntaje, 2, '.', ' '); ?></span></button> </td>
						<td></td>
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
			var id_funcion=$('#id_funcion').val();
			var anioPriorizacion=$('#anioPriorizacion').val();
			window.location.href=base_url+"index.php/PuntajeCriterioPi/index/"+id_funcion+'.'+anioPriorizacion;
			renderLoading();
			
		});
		$('#combocriterioespecif').selectpicker('refresh');
		$('#combocriteriogeneral').selectpicker('refresh');
	
		$('#form-addAsignarPuntajePi').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				combocriteriogeneral:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;text-align: center;">El campo "Criterio General" es requerido.</b>'
						}
					}
				},
				combocriterioespecif:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;text-align: center;">El campo "Criterio especifico" es requerido.</b>'
						}
					}
				}
				
			}
		});
	});
	

$("#combocriteriogeneral" ).change(function() {

		
		id_criterio_gen=$("#combocriteriogeneral").val();
		var parametros = {
                "id_criterio_gen" : id_criterio_gen,
        };
        $.ajax({
                data:  parametros,
                url:    base_url+'index.php/PmiCriterioEspecifico/listarCriterioEspecificos',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) {
                		objectJSON=JSON.parse(response);
                     	 var html,sumaTotalCriteo=0;
                    	$("#combocriterioespecif").html('');
                    	$.each(objectJSON.listaCriteriosEspecificos,function(index,element)
                    	{
                    	 sumaTotalCriteo =parseInt(sumaTotalCriteo) + parseInt(element.peso);
                    	 html +='<option value="'+element.id_criterio+'">'+element.nombre_criterio+'</option>';
                    	});
                 		$("#combocriterioespecif").append(html);
                 		$('#combocriterioespecif').selectpicker('refresh');
                 		$("#SumaTotaCriterio").val(sumaTotalCriteo);

                }
        });
	});
$(function()
	{
 
    $('#btnAsignarPuntajePip').on('click', function(event)
	{
		event.preventDefault();

		$('#form-addAsignarPuntajePi').data('formValidation').validate();

		if(!($('#form-addAsignarPuntajePi').data('formValidation').isValid()))
		{
			return;
		}

		paginaAjaxJSON($('#form-addAsignarPuntajePi').serialize(), '<?=base_url();?>index.php/PuntajeCriterioPi/insertar', 'POST', null, function(objectJSON)
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
                    	$("#bodyPuntaje").html('');
                    	var puntaje=0;
                    	$.each(objectJSON.listarPuntajeCriterioPip,function(index,element)
                    	{
                    	    puntaje = parseFloat(puntaje) + parseFloat(element.puntaje_criterio);
                    	   	 html +='<tr>';
	                    		html +='<td>'+element.nombre_criterio+'</td>';
	                    		html +='<td>'+element.puntaje_criterio+'</td>';
	                    		html +='<td><button type="button" class="btn btn-danger btn-xs " onclick="eliminarPuntaje('+element.id_ptje_criterio+','+element.id_pi+','+element.anio_ptje_criterio+')"><span class="fa fa-trash"></span></button> </td>';
                    		html +='</tr>';
                    	});
                    	html +='<tr><td> </td>';
                    	html +='<td><button type="button" class="btn btn-success">Puntaje Total <span class="badge">'+puntaje+'.00'+'</span></button></td>';
                    	html +='<td></td></tr>';
                 $("#table-puntaje > #bodyPuntaje").append(html);
			});

		}, false, true);

	});

});
function eliminarPuntaje(id_ptje_criterio,id_pi,anio)
	{
		event.preventDefault();
		paginaAjaxJSON({ "id_ptje_criterio" : id_ptje_criterio,"id_pi" : id_pi,"anio" : anio}, '<?=base_url();?>index.php/PuntajeCriterioPi/eliminarPuntajecriterio', 'POST', null, function(objectJSON)
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
                    	$("#bodyPuntaje").html('');
                    	var puntaje=0;
                    	$.each(objectJSON.listarPuntajeCriterioPip,function(index,element)
                    	{
                    	    puntaje = parseFloat(puntaje) + parseFloat(element.puntaje_criterio);
                    	   	 html +='<tr>';
	                    		html +='<td>'+element.nombre_criterio+'</td>';
	                    		html +='<td>'+element.puntaje_criterio+'</td>';
	                    		html +='<td><button type="button" class="btn btn-danger btn-xs " onclick="eliminarPuntaje('+element.id_ptje_criterio+','+element.id_pi+','+element.anio_ptje_criterio+')"><span class="fa fa-trash"></span></button> </td>';
                    		html +='</tr>';
                    	});
                    	html +='<tr><td> </td>';
                    	html +='<td><button type="button" class="btn btn-success">Puntaje Total <span class="badge">'+puntaje+'.00'+'</span></button></td>';
                    	html +='<td></td></tr>';
                 $("#table-puntaje > #bodyPuntaje").append(html);
			});

		}, false, true);

	}


</script>


