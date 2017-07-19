<form class="form-horizontal"  id="form-addFePresupuesto" action="<?php echo base_url();?>index.php/FE_Presupuesto_Inv/insertar" method="POST">
		<h4 style="margin-bottom: 0px;">Datos generales</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<label>Estudio De Inversión</label>
				<input type="text" class="form-control" value="<?=$fePresupuestoInv->nombre_est_inv?>" autocomplete="off" readonly="readonly">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Sector</label>
				<input type="text" class="form-control" id="txtSector" name="txtSector" autocomplete="off" placeholder="Sector" autocomplete="off">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Pliego</label>
				<input type="text" class="form-control" id="txtPliego" name="txtPliego" placeholder="Pliego" value="<?=$fePresupuestoInv->pliego?>" autocomplete="off">
			</div>
		</div>
		<h4 style="margin-bottom: 0px;">Fuente de financiamiento</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<div class="row" id="divPresupuestoFuente">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>Descripción Fuente</label>
				<input type="text" class="form-control" id="txtDescripcionFuente" name="txtDescripcionFuente" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>Correlativo Meta</label>
				<input type="text" class="form-control" id="txtCorelativoMeta" name="txtCorelativoMeta" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>Año</label>
				<input type="text" class="form-control" id="txtAnio" name="txtAnio" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>.</label>
				<input type="button" id="btnAgregarFEPresupuestoFuente" class="btn btn-success form-control" value="Agregar">
			</div>
		</div>
		<div>
			<table id="table-PresupestoFormulacion" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Descripcion de la Fuente</td>
						<td>Correlativo Meta</td>
						<td>Año</td>
						<td></td>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row" style="text-align: right;">
			<button type="submit" class="btn btn-success">Registrar fuente de finan.</button>
			<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>
<script>
	$("#btnAgregarFEPresupuestoFuente").on('click', function(event)
	{
		$('#divPresupuestoFuente').data('formValidation').validate();

		if(!($('#divPresupuestoFuente').data('formValidation').isValid()))
		{
			return;
		}

		var htmlTemp='<tr>'+
			'<td><input type="hidden" value='+$('#txtDescripcionFuente').val()+' name="hdDescripcionFuente[]"> '+$('#txtDescripcionFuente').val()+'</td>'+
			'<td><input type="hidden" value='+$('#txtCorelativoMeta').val()+' name="hdCorrelativoMeta[]">'+$('#txtCorelativoMeta').val()+'</td>'+
			'<td><input type="hidden" value='+$('#txtAnio').val()+' name="hdAnio[]">'+$('#txtAnio').val()+'</td>'+
			'<td><a href="#" onclick="$(this).parent().parent().remove();">Eliminar</a></td>'+
		'</tr>'

		$('#table-PresupestoFormulacion > tbody').append(htmlTemp);

		limpiarText('divPresupuestoFuente', []);
	});

	$(function()
	{
		$('#form-addFePresupuesto').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtSector:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Sector" es requerido.</b>'
						}
					}
				},
				txtPliego:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Pliego" es requerido.</b>'
						}
					}
				}
			}
		});

		$('#divPresupuestoFuente').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtDescripcionFuente:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción fuente" es requerido.</b>'
						}
					}
				},
				txtCorelativoMeta:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Correlativo Meta" es requerido.</b>'
						}
					}
				},
				txtAnio:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Año" es requerido.</b>'
						},
						regexp:
	                    {
	                        regexp: "^([0-9]){4}$",
	                        message: '<b style="color: red;">El campo "Año" debe ser un número entero.</b>'
	                    }
					}
				}
			}
		});	
	});
</script>