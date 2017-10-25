<style>
	.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
.dropdown:hover {
}
</style>


<form  id="frmInsertarDetalleAnalisisUnitario" action="" method="POST">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content" id ="divFormDetallaAnalisisUnitario">		
					<div class="row">
						<div class="col-md-7 col-sm-7 col-xs-12">
							<input type="hidden" id="idAnalisis" name="idAnalisis" class="form-control" value="<?=$idAnalisis?>">
							<label for="control-label">Descripción del insumo</label>
							<div style="height: 300px;overflow-y: scroll;">
								<ul>
							    	<?php foreach ($listaNivel1 as $key => $value) 
							    	{
						    			if($value->hasChild)
						    			{?>
						    				<li>
								    			<input type="button" class="btn btn-default btn-xs" value="+" onclick="MostrarSubLista('<?=$value->CodInsumo?>', 1, this);" style="margin: 2px;">
								    			<input type="button" class="btn btn-default btn-xs" value="-" onclick="ContraerSubLista(this);" style="margin: 4px;">
								    			<span><?=$value->Descripcion?></span>
								    		</li>
						    			<?php } else { ?>
						    				<li>
								    			<span><?=$value->Descripcion?></span>
								    		</li>
						    			<?php } ?>							    		
							    	<?php } ?>
							    </ul>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Cuadrilla</label>
							<div>
								<input type="text" id="txtCuadrilla" name="txtCuadrilla" autocomplete="off" class="form-control" onkeyup="calcularCantidad(<?=$idAnalisis?>);calcularSubTotal(<?=$idAnalisis?>);">
							</div>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-12">
							<label for="control-label">Horas</label>
							<div>
								<input type="text" id="txtHoras" name="txtHoras" autocomplete="off" class="form-control" onkeyup="calcularCantidad(<?=$idAnalisis?>);calcularSubTotal(<?=$idAnalisis?>);" value="8">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Uniddad</label>
							<div>
								<select name="selectUnidadMedida" id="selectUnidadMedida" class="form-control">
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
								<input type="text" id="txtRendimiento" autocomplete="off" name="txtRendimiento" class="form-control" onkeyup="calcularCantidad(<?=$idAnalisis?>);calcularSubTotal(<?=$idAnalisis?>);">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Cantidad</label>
							<div>
								<input type="text" id="txtCantidad" autocomplete="off" name="txtCantidad" class="form-control" onkeyup="calcularRendimiento(<?=$idAnalisis?>);calcularSubTotal(<?=$idAnalisis?>);">
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label for="control-label">Precio unitario</label>
							<div>
								<input type="text" id="txtPrecioUnitario" autocomplete="off" name="txtPrecioUnitario" class="form-control" onkeyup="calcularSubTotal(<?=$idAnalisis?>);">
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label for="control-label">Sub total</label>
							<div>
								<input type="text" id="txtSubTotal" class="form-control" readonly="readonly">
							</div>
						</div>
					</div>		
				</br>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row" style="text-align: center;">
		<button  class="btn btn-success" onclick="guardarDetalleAnalisisPresupuestal();">Guardar</button>
		<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	</div>
</form>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
  $('.selectpicker').selectpicker('refresh');

});
</script>
<script>
$(function()
{
	$('#divFormDetallaAnalisisUnitario').formValidation(
	{
		framework: 'bootstrap',
		excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
		live: 'enabled',
		message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
		trigger: null,
		fields:
		{
			selectDescripcionDetalleAnalisis:
			{
				validators:
				{				
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Insumo" es requerido.</b>'
					}
				}
			},
			txtCuadrilla:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Cuadrilla" es requerido.</b>'
					},
					regexp:
		            {
		                regexp: /^\d*$/,
		                message: '<b style="color: red;">El campo "Cuadrilla" debe ser un número entero.</b>'
		            }
				}
			},
			txtHoras:
			{
				validators:
				{				
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Horas" es requerido.</b>'
					},
					regexp:
		            {
		                regexp: /^\d*$/,
		                message: '<b style="color: red;">El campo "Hora" debe ser un número entero.</b>'
		            }
				}
			},
			selectUnidadMedida:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Unidad de Medida" es requerido.</b>'
					}
				}
			},
			txtRendimiento:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Rendimiento" es requerido.</b>'
					},
					regexp:
					{
						regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
						message: '<b style="color: red;">El campo "Rendimiento" debe ser un valor en decimales.</b>'
					}
				}
			},
			txtCantidad:
			{
				validators:
				{				
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Cantidad" es requerido.</b>'
					},
					regexp:
					{
						regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
						message: '<b style="color: red;">El campo "Cantidad" debe ser un valor en decimales.</b>'
					}
				}
			},
			txtPrecioUnitario:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Precio unitario" es requerido.</b>'
					},
					regexp:
					{
						regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
						message: '<b style="color: red;">El campo "Precio unitario" debe ser un valor en soles.</b>'
					}
				}
			}
		}
	});

	$('#selectRecurso').selectpicker({ liveSearch: true });
	$('#selectPresupuestoAnalitico').selectpicker({ liveSearch: true });

	$('#selectPresupuestoAnalitico').on('change', function()
    {
		var selected=$(this).find("option:selected").val();

		if(selected.trim()!='')
		{
			$('#txtPresupuestoEjecucion').val(selected.substring(selected.indexOf(',')+1, selected.length));
		}
		else
		{
			$('#txtPresupuestoEjecucion').val(null);
		}
    });

	$('[id*="selectDescripcionDetalleAnalisis"]').selectpicker({ liveSearch: true }).ajaxSelectPicker(
	{
        ajax: {
            url: base_url+'index.php/ET_Insumo/verPorDescripcion',
            data: { valueSearch : '{{{q}}}' }
        },
        locale:
        {
            emptyTitle: 'Buscar insumo'
        },
        preprocessData: function(data)
        {
        	var dataForSelect=[];

        	for(var i=0; i<data.length; i++)
        	{
        		dataForSelect.push(
                {
                    "value" : data[i].desc_insumo,
                    "text" : data[i].desc_insum,
                    "data" :
                    {
                    	"id-unidad" : data[i].id_unidad
                    },
                    "disabled" : false
                });
        	}

            return dataForSelect;
        },
        preserveSelected: false
    });

    $('[id*="selectDescripcionDetalleAnalisis"]').on('change', function()
    {
		var selected=$(this).find("option:selected").val();

		if(selected.trim()!='')
		{
			$('#selectUnidadMedida'+$(this).attr('id').substring(32)).val($(this).find("option:selected").data('id-unidad'));
		}
    });
});

function calcularCantidad(idAnalisisUnitario)
{
	var cuadrilla=$('#txtCuadrilla').val();
	var horas=$('#txtHoras').val();
	var rendimiento=$('#txtRendimiento').val();
	var cantidad=null;

	if(!isNaN(cuadrilla) && cuadrilla.trim()!='' && !isNaN(horas) && horas.trim()!='' && !isNaN(rendimiento) && rendimiento.trim()!='')
	{
		cantidad=parseFloat(cuadrilla)/(parseFloat(horas)*parseFloat(rendimiento));

		$('#txtCantidad').val(cantidad);
	}
	else
	{
		$('#txtCantidad').val('');
	}
}

function calcularRendimiento(idAnalisisUnitario)
{
	var cuadrilla=$('#txtCuadrilla').val();
	var cantidad=$('#txtCantidad').val();
	var horas=$('#txtHoras').val();
	var rendimiento=null;

	if(!isNaN(cuadrilla) && cuadrilla.trim()!='' && !isNaN(cantidad) && cantidad.trim()!='' && !isNaN(horas) && horas.trim()!='')
	{
		rendimiento=parseFloat(cuadrilla)/(parseFloat(cantidad))/(parseFloat(horas));

		$('#txtRendimiento').val(rendimiento);
	}
	else
	{
		$('#txtRendimiento').val('');
	}
}

function calcularSubTotal(idAnalisisUnitario)
{
	var cantidad=$('#txtCantidad').val();
	var precioUnitario=$('#txtPrecioUnitario').val();
	var subTotal=null;

	if(!isNaN(cantidad) && cantidad.trim()!='' && !isNaN(precioUnitario) && precioUnitario.trim()!='')
	{
		subTotal=cantidad*precioUnitario;

		$('#txtSubTotal').val(subTotal.toFixed(2));
	}
	else
	{
		$('#txtSubTotal').val('');
	}
}
function guardarDetalleAnalisisPresupuestal()
{
	event.preventDefault();
	$('#divFormDetallaAnalisisUnitario').data('formValidation').validate();
	if(!($('#divFormDetallaAnalisisUnitario').data('formValidation').isValid()))
	{
		return;
	}
	var formData=new FormData($("#frmInsertarDetalleAnalisisUnitario")[0]);
    var dataString = $('#frmInsertarDetalleAnalisisUnitario').serialize();
    $.ajax({
        type:"POST",
        url:base_url+"index.php/ET_Analisis_Unitario/insertarDetalleAnalisisUnitario",
        data: formData,
        cache: false,
        contentType:false,
        processData:false,
        success:function(resp)
        {
        	if (resp=='1') 
            {
                swal("Correcto","Se registró correctamente", "success");
                paginaAjaxDialogo('otherModal', 'Análisis presupuestal', { idET : <?=$partida->id_et?> , idPartida : <?=$partida->id_partida?> }, base_url+'index.php/ET_Analisis_Unitario/insertar', 'GET', null, null, false, true);
            }
            if (resp=='0') 
            {
                swal("Error","No se puede agregar dos veces el mismo detalle de análisis.", "error");
            }
        }
    }); 
}
function MostrarSubLista(codigoInsumo, nivel, element)
{
	var marginLeftTemp=nivel*15;

	$.ajax(
	{
		type: "POST",
		url: base_url+"index.php/ET_Analisis_Unitario/cargarNivel",
		cache: false,
		data: { codigoInsumo: codigoInsumo, nivel: nivel },
		success: function(resp)
		{
			var obj=JSON.parse(resp);

			if(obj.length==0)
			{
				return false;
			}

			var htmlTemp='<ul style="margin-left: '+marginLeftTemp+'px;">';

			for(var i=0; i<obj.length; i++)
			{
				if(obj[i].hasChild == false)
				{
					htmlTemp+='<li>'+
					'<span>'+obj[i].Descripcion+'</span>'+
					'</li>';
				}
				else
				{
					htmlTemp+='<li>'+
					'<input type="button" class="btn btn-default btn-xs" value="+" onclick="MostrarSubLista(\''+obj[i].CodInsumo+'\', '+(obj[i].Nivel+1)+', this);" style="margin: 4px;">'+
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="ContraerSubLista(this);" style="margin: 4px;">'+
					'<span>'+obj[i].Descripcion+'</span>'+
				'</li>';

				}
				
			}

			htmlTemp+='</ul>';

			$(element).parent().append(htmlTemp);        											            
		}
	});
}

function ContraerSubLista(element)
{
	$(element).parent().find('>ul').remove();
}
</script>
