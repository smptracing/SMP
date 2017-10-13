<form class="form-horizontal"  id="form-addAsignarPuntajePi">
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
				<label class="control-label">Nombre del Proyecto de Inversion </label>
				<div>
					<input type="hidden" id="txtIdPi" name="txtIdPi" value="<?= $listaUnicaProIv->id_pi?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" autocomplete="off"  type="hidden">	
					<input id="txtNombreUe" name="txtNombrePi" value="<?= $listaUnicaProIv->nombre_pi?>" class="form-control col-md-4 col-xs-12"  autocomplete="off" readonly="readonly">	
					
				</div>	
			</div>
		</div><br/>
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
					<label class="control-label">Criterio general: &nbsp;&nbsp;&nbsp;</label>
					<input type="hidden"  name="sumaPesoTotalGeberal" value="<?= $sumaPesoTotalGeberal ?>">
					<select  id="combocriteriogeneral" name="combocriteriogeneral"  class="selectpicker" data-width="75%" data-live-search="true">
						<?php foreach($listaCritetioGeneral as $item){ ?>
							<option value=""> Criterio General</option>
							<option value="<?=$item->id_criterio_gen; ?>"><?= $item->nombre_criterio_gen;?></option>
						<?php } ?>
					</select>	
			</div>
		</div><br/>
		<div class="row">
			<input type="hidden" name="SumaTotaCriterio" id="SumaTotaCriterio">
			<div class="col-md-12 col-sm-3 col-xs-12">
					<label class="control-label">Criterio especifico:</label>
					<select  id="combocriterioespecif" name="combocriterioespecif[]" class="selectpicker" multiple data-actions-box="true" data-width="75%" data-live-search="true" >
								
					</select>	
			</div>
		</div>

		<div class="row" id="divCriterioGeneral">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label></label>
				<input style="margin-top: 5px;" type="button" id="btnAsignarPuntajePip" class="btn btn-primary form-control" value="Agregar">
			</div>
		</div>

		<div><br/>
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
	                    			<button type="button" class="btn btn-success btn-xs " onclick=""><span class="fa fa-bars"></span></button>
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
	$('#combocriterioespecif').selectpicker('refresh');
	$('#combocriteriogeneral').selectpicker('refresh');
	

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
                    	    puntaje = (parseInt(puntaje) + parseInt(element.puntaje_criterio));
                    	   	 html +='<tr>';
	                    		html +='<td>'+element.nombre_criterio+'</td>';
	                    		html +='<td>'+element.puntaje_criterio+'</td>';
	                    		html +='<td><button type="button" class="btn btn-success btn-xs "><span class="fa fa-bars"></span></button> </td>';
                    		html +='</tr>';
                    	});
                    	html +='<tr><td> </td>';
                    	html +='<td><button type="button" class="btn btn-success">Puntaje Total <span class="badge">'+puntaje+'</span></button></td>';
                    	html +='<td></td></tr>';
                 $("#table-puntaje > #bodyPuntaje").append(html);
			});

		}, false, true);

	});

});
</script>

