<form class="form-horizontal" id="form-editarClasificador" action="<?php echo base_url();?>index.php/Clasificador/editar" method="POST" >
	<div class="row">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" >Número<span class="required">*</span></label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input id="hdIdClasificadro" name="hdIdClasificadro" class="form-control col-md-7 col-xs-12"  placeholder="Ingrese Número" notValidate>
			<input id="txtNumeroClasi" name="txtNumeroClasi" class="form-control col-md-7 col-xs-12"  placeholder="Ingrese Número"  autocomplete="off" >
		</div>
	</div><br>
	<div class="row">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" >Descripción<span class="required">*</span></label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input id="txtDescripcionClasi" name="txtDescripcionClasi" class="form-control col-md-7 col-xs-12"  placeholder="Ingrese Descripción"  autocomplete="off" >
		</div>
	</div><br>
	<div class="row">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" >Detalle<span class="required">*</span></label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input id="txtDetalleClasi" name="txtDetalleClasi" class="form-control col-md-7 col-xs-12"  placeholder="Ingrese Detalle" autocomplete="off" >
		</div>
	</div><br>
	<div class="ln_solid"></div>
	<div class="row" style="text-align: center;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-success">Guardar Clasificador</button>
			<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>

<script>

	$(function()
	{
		$('#editarClasificador').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtNumeroClasi:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Numero" es requerido.</b>'
						},
						regexp:
	                    {
	                        regexp: "^[0-9]+([,][0-9]+)?$",
	                        message: '<b style="color: red;">El campo "Numero" debe ser un número.</b>'
	                    }
					}
				},
				txtDescripcionClasi:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción" es requerido.</b>'
						}
					}
				},
				txtDetalleClasi:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Detalle" es requerido.</b>'
						}
					}
				}
			}
		});
	});
	
	$('#btnEnviarFormulario').on('click', function(event)
	{
		event.preventDefault();

		$('#editarClasificador').data('formValidation').validate();

		if(!($('#editarClasificador').data('formValidation').isValid()))
		{
			return;
		}

		paginaAjaxJSON($('#editarClasificador').serialize(), '<?=base_url();?>index.php/Clasificador/editar', 'POST', null, function(objectJSON)
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
				window.location.href='<?=base_url();?>index.php/Clasificador/index/'+objectJSON.txtNumeroClasi;

				renderLoading();
			});
		}, false, true);
	});
</script>