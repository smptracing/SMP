<form class="form-horizontal"  id="form-addAsignarPuntajePi">
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
				<label class="control-label">Nombre del Proyecto de Inversion </label>
				<div>
					<input id="txtIdPi" name="txtIdPi" value="<?= $listaUnicaProIv->id_pi?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" autocomplete="off"  type="hidden">	
					<input id="txtNombreUe" name="txtNombrePi" value="<?= $listaUnicaProIv->nombre_pi?>" class="form-control col-md-4 col-xs-12"  autocomplete="off" readonly="readonly">	
				</div>	
			</div>
		</div><br/>
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
					<label class="control-label">Criterio general: &nbsp;&nbsp;&nbsp;</label>

					<select  id="combocriteriogeneral" name="combocriteriogeneral"  class="selectpicker" data-width="75%" data-live-search="true">
						<?php foreach($listaCritetioGeneral as $item){ ?>
							<option value="<?=$item->id_criterio_gen; ?>"><?= $item->nombre_criterio_gen;?></option>
						<?php } ?>
					</select>	
			</div>
		</div><br/>
		<div class="row">
			<div class="col-md-12 col-sm-3 col-xs-12">
					<label class="control-label">Criterio especifico:</label>
					<select  id="combocriterioespecif" name="combocriterioespecif" class="selectpicker" multiple data-actions-box="true" data-width="75%" data-live-search="true" >
								
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
			<table id="table-GriterioGenerales" class="table table-striped table-bordered jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Criterio</td>
						<td>Puntaje</td>
						<td>Opcion</td>
					</tr>
				</thead>
				<tbody id="bodyCriterioGenerales">
						
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
                     	 var html;
                    	$("#combocriterioespecif").html('');
                    	$.each(objectJSON.listaCriteriosEspecificos,function(index,element)
                    	{
                    	 html +='<option value="">'+element.nombre_criterio+'</option>';
                    	});
                 		$("#combocriterioespecif").append(html);
                 		$('#combocriterioespecif').selectpicker('refresh');

                }
        });
	});
</script>

