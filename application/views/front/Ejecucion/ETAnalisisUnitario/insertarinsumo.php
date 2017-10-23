<form  id="frmInsertarInsumo" action="<?php echo base_url();?>index.php/ET_Analisis_Unitario/insertarinsumo" method="POST">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">		
					<div class="row" id="validarInsumo">
						<div class="col-md-4 col-sm-2 col-xs-12">
							<label for="control-label">Unidad de Medida: </label>
							<div>
								<select name="listaUnidadMedida" name="listaUnidadMedida" class="form-control">
									<?php foreach($listaUnidadMedida as $item){ ?>
										<option value="<?=$item->id_unidad?>"><?=html_escape($item->descripcion)?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-8 col-sm-6 col-xs-12">
							<label class="control-label">Insumo: </label>
							<div>
								<input class="form-control" name="txtInsumo" id="txtInsumo" autocomplete="off"  >	
							</div>	
						</div>
					</div>			
				</br>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row" style="text-align: center;">
		<button  class="btn btn-success" id="btnEnviarFormulario" >Guardar</button>
		<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	</div>
</form>
<script>
$(function()
{
	$('#validarInsumo').formValidation(
	{
		framework: 'bootstrap',
		excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
		live: 'enabled',
		message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
		trigger: null,
		fields:
		{
			listaUnidadMedida:
			{
				validators:
				{				
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Cantidad" es requerido.</b>'
					}
				}
			},
			txtInsumo:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Fecha" es requerido.</b>'
					}
				}
			}
		}
	});
});
$('#btnEnviarFormulario').on('click', function(event)
{
    event.preventDefault();
    $('#validarInsumo').data('formValidation').resetField($('#listaUnidadMedida'));
    $('#validarInsumo').data('formValidation').resetField($('#txtInsumo'));
    $('#validarInsumo').data('formValidation').validate();
	if(!($('#validarInsumo').data('formValidation').isValid()))
	{
		return;
	}
    var formData=new FormData($("#frmInsertarInsumo")[0]);
    var dataString = $('#frmInsertarInsumo').serialize();
    $.ajax({
        type:"POST",
        url:base_url+"index.php/ET_Analisis_Unitario/insertarinsumo",
        data: formData,
        cache: false,
        contentType:false,
        processData:false,
        success:function(resp)
        {
        	if (resp=='1') 
            {
                swal("Correcto","Se registró correctamente", "success");
            }
            if (resp=='2') 
            {
                swal("Error","Ocurrio un error ", "error");
            }
        }
    });  
});
</script>