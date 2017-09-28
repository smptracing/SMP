<form class="form-horizontal"  id="form-addEntregable">
		<h4 style="margin-bottom: 0px;">Datos Estudio</h4>
		<hr style="margin: 1px;margin-bottom: 5px;">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<input type="text" class="form-control" name="cbx_estudioInversion" value="<?= $DetallEstudioInversion->nombre_estudio_inv?>" id="cbx_estudioInversion" autocomplete="off" disabled="disabled">
				<input type="hidden" class="form-control" name="id_est_inv"  value="<?= $DetallEstudioInversion->id_est_inv?>" id="id_est_inv" autocomplete="off">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Entregable</label>
					<select id="cbx_entregable" name="cbx_entregable" class="form-control notValidate" required=""> 
							<?php foreach ($listarEntregable as $itemp) {?>
								<option value="<?=$itemp->id_entregable.','.$itemp->nombre_entregable?>"> <?= $itemp->nombre_entregable?></option>
							<?php } ?>
					</select>

			</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<label>Modulo</label>
				<select id="cbx_modulos" name="cbx_modulos" class="form-control notValidate" required="">
					<?php foreach ($listarModulo as $itemp) {?>
						<option value="<?=$itemp->id_modulo.','.$itemp->nombre_modulo?>"> <?= $itemp->nombre_modulo?></option>
					<?php } ?>
				</select>
			</div>
			
			<div class="col-md-2 col-sm-2 col-xs-12">
				<label>Valor</label>
				<input type="text" class="form-control" name="valorEntregable" id="valorEntregable">
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12">
				<label>.</label>
				<input type="button" id="btnAgregarFEntregable" class="btn btn-success form-control" value="Agregar">
			</div>
		</div>
		<div><br/>
			<table id="table-Entregable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Modulo </td>
						<td>Entregable</td>
						<td>Valor Entregable</td>
						<td></td>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row" style="text-align: right;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-success">Registrar Entregable.</button>
			<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>

<script>
	$("#btnAgregarFEntregable").on('click', function(event)
	{
		

		var posicionSeparadorTemp=$('#cbx_modulos').val().indexOf(',');
		var idmodulo=$('#cbx_modulos').val().substring(0, posicionSeparadorTemp);
		var descripcionModulo=replaceAll(replaceAll($('#cbx_modulos').val().substring(posicionSeparadorTemp+1, $('#cbx_modulos').val().length), '<', '&lt;'), '>', '&gt;');

		var posicionSeparadorTemp1=$('#cbx_entregable').val().indexOf(',');
		var identregable=$('#cbx_entregable').val().substring(0, posicionSeparadorTemp1);
		var descripcionEntregable=replaceAll(replaceAll($('#cbx_entregable').val().substring(posicionSeparadorTemp1+1, $('#cbx_entregable').val().length), '<', '&lt;'), '>', '&gt;');
		
		var valorEntregable	=$("#valorEntregable").val();
		var htmlTemp='<tr>'+
			'<td><input type="hidden" value='+idmodulo+' name="hdIdmodulo[]"> '+descripcionModulo+'</td>'+
			'<td><input type="hidden" value='+identregable+' name="hdidEntregable[]">'+descripcionEntregable+'</td>'+
			'<td><input type="hidden" value='+valorEntregable+' name="ValorEntregable[]">'+valorEntregable+'</td>'+
			'<td><a href="#" onclick="$(this).parent().parent().remove();" style="color: red;font-weight: bold;text-decoration: underline;">Eliminar</a></td>'+
		'</tr>'

		$('#table-Entregable > tbody').append(htmlTemp);

		//limpiarText('divPresupuestoFuente', []);
	});

	$('#btnEnviarFormulario').on('click', function(event)
	{
		event.preventDefault();

		/*$('#form-addFePresupuesto').data('formValidation').validate();

		if(!($('#form-addFePresupuesto').data('formValidation').isValid()))
		{
			return;
		}*/

		paginaAjaxJSON($('#form-addEntregable').serialize(), '<?=base_url();?>index.php/UF_ModuloEntregable/insertar', 'POST', null, function(objectJSON)
		{
			$('#modalTemp').modal('hide');

			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function()
			{
				/*window.location.href='<?=base_url();?>index.php/FE_Presupuesto_Inv/index/'+objectJSON.idEstudioInversion;*/

				renderLoading();
			});
		}, false, true);
	});
</script>