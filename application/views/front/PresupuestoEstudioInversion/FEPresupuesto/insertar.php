		<br />
		<form class="form-horizontal"  id="form-addFePresupuesto" action="<?php echo base_url();?>index.php/FE_Presupuesto_Inv/insertar" method="POST">
				<label>Datos generales</label>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
						<label>Estudio De Inversión</label>
						<select id="cbx_estudioInversion" name="cbx_estudioInversion" class="form-control notValidate" required="">
							 <option value="">Choose..</option>
							 <option value="">Choose..</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
						<label>Sector
						</label>
						<input type="text" class="form-control" id="txtSector" name="txtSector" autocomplete="off" placeholder="Sector" autocomplete="off">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
						<label>Pliego</label>
						<input type="text" class="form-control" id="txtPliego" name="txtPliego" placeholder="Pliego" autocomplete="off">
					</div>
				</div>
				<div class="row" id="presupuestoFuente">
					<div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
						<label>Descripción Fuente</label>
						<input type="text" class="form-control" id="txtDescripcionFuente" name="txtDescripcionFuente" autocomplete="off">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
						<label>Correlativo Meta</label>
						<input type="text" class="form-control" id="txtCorelativoMeta" name="txtCorelativoMeta" autocomplete="off">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
						<label>Año</label>
						<input type="text" class="form-control" id="txtAnio" name="txtAnio" autocomplete="off">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
						<br>
						<button id="btn_agregarPresupuestoInnv" class="btn btn-success">Agregar</button>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
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
				<div class="form-group">
					<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
					<button type="submit" class="btn btn-success">Registrar Gasto y proceder con la especificación del mismo
						</button>
						<button  class="btn btn-danger" data-dismiss="modal" onclick="removeModal();">Cancelar
						</button>
						
					</div>
				</div>

		</form>
<script>
	$("#btn_agregarPresupuestoInnv").on('click', function(event)
	{
		var htmlTemp='<tr>'+
			'<td><input type="hidden" value='+$('#txtDescripcionFuente').val()+' name="hdDescripcionFuente[]"> '+$('#txtDescripcionFuente').val()+'</td>'+
			'<td><input type="hidden" value='+$('#txtCorelativoMeta').val()+' name="hdCorrelativoMeta[]">'+$('#txtCorelativoMeta').val()+'</td>'+
			'<td><input type="hidden" value='+$('#txtAnio').val()+' name="hdAnio[]">'+$('#txtAnio').val()+'</td>'+
			'<td><a href="#" onclick="$(this).parent().parent().remove();">Eliminar</a></td>'+
		'</tr>'

		$('#table-PresupestoFormulacion > tbody').append(htmlTemp);
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
