
<form  id="frmInsertarInsumo" action="<?php echo base_url();?>index.php/ET_Analisis_Unitario/insertarinsumo" method="POST">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">		
					<div class="row">
						<div class="col-md-7 col-sm-7 col-xs-12">
							<label for="control-label">Descripción del insunmo</label>
							<div>
								<select name="selectDescripcionDetalleAnalisis<?=$idAnalisis?>" id="selectDescripcionDetalleAnalisis<?=$idAnalisis?>" class="form-control"></select>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Cuadrilla</label>
							<div>
								<input type="text" id="txtCuadrilla<?=$idAnalisis?>" name="txtCuadrilla<?=$idAnalisis?>" class="form-control" onkeyup="calcularCantidad(<?=$idAnalisis?>);calcularSubTotal(<?=$idAnalisis?>);">
							</div>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-12">
							<label for="control-label">Horas</label>
							<div>
								<input type="text" id="txtHoras<?=$idAnalisis?>" name="txtHoras<?=$idAnalisis?>" class="form-control" onkeyup="calcularCantidad(<?=$idAnalisis?>);calcularSubTotal(<?=$idAnalisis?>);" value="8">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Uniddad</label>
							<div>
								<select name="selectUnidadMedida<?=$idAnalisis?>" id="selectUnidadMedida<?=$idAnalisis?>" class="form-control">
									<?php foreach($listaUnidadMedida as $item){ ?>
										<option value="<?=$item->id_unidad?>"><?=html_escape($item->descripcion)?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Rendimiento</label>
							<div>
								<input type="text" id="txtRendimiento<?=$idAnalisis?>" name="txtRendimiento<?=$idAnalisis?>" class="form-control" onkeyup="calcularCantidad(<?=$idAnalisis?>);calcularSubTotal(<?=$idAnalisis?>);">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Cantidad</label>
							<div>
								<input type="text" id="txtCantidad<?=$idAnalisis?>" name="txtCantidad<?=$idAnalisis?>" class="form-control" onkeyup="calcularRendimiento(<?=$idAnalisis?>);calcularSubTotal(<?=$idAnalisis?>);">
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label for="control-label">Precio unitario</label>
							<div>
								<input type="text" id="txtPrecioUnitario<?=$idAnalisis?>" name="txtPrecioUnitario<?=$idAnalisis?>" class="form-control" onkeyup="calcularSubTotal(<?=$idAnalisis?>);">
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label for="control-label">Sub total</label>
							<div>
								<input type="text" id="txtSubTotal<?=$idAnalisis?>" class="form-control" readonly="readonly">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">.</label>
							<div>
								<input type="button" class="btn btn-info" value="Agregar" style="width: 100%;" onclick="registrarDetalleAnalisisUnitario(<?=$idAnalisis?>);">
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
function calcularCantidad(idAnalisisUnitario)
	{
		var cuadrilla=$('#txtCuadrilla'+idAnalisisUnitario).val();
		var horas=$('#txtHoras'+idAnalisisUnitario).val();
		var rendimiento=$('#txtRendimiento'+idAnalisisUnitario).val();
		var cantidad=null;

		if(!isNaN(cuadrilla) && cuadrilla.trim()!='' && !isNaN(horas) && horas.trim()!='' && !isNaN(rendimiento) && rendimiento.trim()!='')
		{
			cantidad=parseFloat(cuadrilla)/(parseFloat(horas)*parseFloat(rendimiento));

			$('#txtCantidad'+idAnalisisUnitario).val(cantidad);
		}
		else
		{
			$('#txtCantidad'+idAnalisisUnitario).val('');
		}
	}

	function calcularRendimiento(idAnalisisUnitario)
	{
		var cuadrilla=$('#txtCuadrilla'+idAnalisisUnitario).val();
		var cantidad=$('#txtCantidad'+idAnalisisUnitario).val();
		var horas=$('#txtHoras'+idAnalisisUnitario).val();
		var rendimiento=null;

		if(!isNaN(cuadrilla) && cuadrilla.trim()!='' && !isNaN(cantidad) && cantidad.trim()!='' && !isNaN(horas) && horas.trim()!='')
		{
			rendimiento=parseFloat(cuadrilla)/(parseFloat(cantidad))/(parseFloat(horas));

			$('#txtRendimiento'+idAnalisisUnitario).val(rendimiento);
		}
		else
		{
			$('#txtRendimiento'+idAnalisisUnitario).val('');
		}
	}

	function calcularSubTotal(idAnalisisUnitario)
	{
		var cantidad=$('#txtCantidad'+idAnalisisUnitario).val();
		var precioUnitario=$('#txtPrecioUnitario'+idAnalisisUnitario).val();
		var subTotal=null;

		if(!isNaN(cantidad) && cantidad.trim()!='' && !isNaN(precioUnitario) && precioUnitario.trim()!='')
		{
			subTotal=cantidad*precioUnitario;

			$('#txtSubTotal'+idAnalisisUnitario).val(subTotal.toFixed(2));
		}
		else
		{
			$('#txtSubTotal'+idAnalisisUnitario).val('');
		}
	}

</script>
