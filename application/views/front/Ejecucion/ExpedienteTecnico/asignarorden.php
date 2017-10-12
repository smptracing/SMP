
<form  id="frmAsignarOrden"   action="<?php echo base_url();?>index.php/Expediente_Tecnico/insertar" method="POST">

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<!--<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del proyecto</label>
							<div>
								<input id="txtIdPi" name="txtIdPi" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" autocomplete="off"  type="hidden">	
								<input id="txtNombre" name="txtNombre" class="form-control col-md-4 col-xs-12" placeholder="Nombre del proyecto"  autocomplete="off" readonly="readonly" value="<?= $partida->nombre_pi?>" >	
							</div>	
						</div>
					</div>-->
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Partida</label>
							<div>
								<input class="form-control" placeholder="descripcion de Partida" autocomplete="off" readonly="readonly" value="<?= $partida->desc_partida?>">	
							</div>	
						</div>
					</div>	
					<br>
					<div class="row">
						<div class="col-md-3">
							<label class="control-label">Ingrese Nro de Orden</label>
							<div>
								<button onclick="BuscarOrden();" class="btn btn-primary">Buscar</button>
							</div>	
							
						</div>						
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-12 col-xs-12">
							<label class="control-label">Numero de Orden</label>
							<div>
								<input class="form-control" name="txtNumeroOrden" id="txtNumeroOrden" placeholder="Número de Orden "  autocomplete="off">	
							</div>	
						</div>
						<div class="col-md-9 col-sm-12 col-xs-12">
							<label class="control-label">Concepto</label>
							<div>
								<input class="form-control" name="txtConceptoOrden" id="txtConceptoOrden" placeholder="Concepto" autocomplete="off">	
							</div>	
						</div>
					</div>					
				</br>
				</div>
				
			</div>
		</div>
	</div>
	<div class="ln_solid"></div>
	<div class="row" style="text-align: right;">
		<button  id="btnEnviarFormulario" class="btn btn-success">Guardar</button>
		<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	</div>
</form>
<script>
function BuscarOrden()
{
	swal({
	  title: "Buscar",
	  text: "Proyecto: Ingrese Nro de Orden",
	  type: "input",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  inputPlaceholder: "Ingrese Nro de Orden"
	}, function (inputValue) {
	
	/*if (inputValue === "")
	  {
	  	swal.showInputError("Ingresar codigo!");
    	return false
	  }
	 else 
	 {
			event.preventDefault();
			$.ajax({
				"url":base_url+"index.php/Expediente_Tecnico/registroBuscarProyecto",
				type:"GET", 
				data:{inputValue:inputValue},
				cache:false,
				success:function(resp){
					var ProyetoEncontrado=eval(resp);
					if(ProyetoEncontrado.length==1){
							var buscar="true";
							paginaAjaxDialogo(null, 'Registrar Expediente Técnico',{CodigoUnico:inputValue,buscar:buscar}, base_url+'index.php/Expediente_Tecnico/insertar', 'GET', null, null, false, true);
	  						swal("Correcto!", "Se Encontro el Proyecto: " + inputValue, "success");
					}else{
							swal.showInputError("No se encontro el  Codigo Unico. Intente Nuevamente!");
	    					return false
					}
					
				}
			});
		}*/

	});
}
$(function()
	{
		$('#frmAsignarOrden').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtNumeroOrden:
				{
					validators:
					{
					
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Número de Orden" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^[0-9]+$/,
							message: '<b style="color: red;">El campo "Número de Orden" debe ser un numero.</b>'
						}
					}
				},
				txtConceptoOrden:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Concepto" es requerido.</b>'
						}
					}
				}
			}
		});
	});
    $('#btnEnviarFormulario').on('click', function(event)
   	{
            event.preventDefault();
            $('#frmAsignarOrden').data('formValidation').validate();
			if(!($('#frmAsignarOrden').data('formValidation').isValid()))
			{
				return;
			}
            var formData=new FormData($("#frmAsignarOrden")[0]);
            var dataString = $('#frmAsignarOrden').serialize();
            $.ajax({
                type:"POST",
                url:base_url+"index.php/Expediente_Tecnico/insertar",
                data: formData,
                cache: false,
                contentType:false,
                processData:false,
                beforeSend: function() 
                {
                	renderLoading();
			    },
                success:function(resp)
                {
                    window.location.href=base_url+"index.php/Expediente_Tecnico/"
                }
            });
          $('#form-addExpedienteTecnico')[0].reset();
    });
</script>






