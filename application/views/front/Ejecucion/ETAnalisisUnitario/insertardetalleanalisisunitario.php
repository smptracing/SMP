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
li
{
	list-style:none;
}
.nivel
{
	color: #73879C;
    font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.471;
    margin : 2px;
}
</style>


<form  id="frmInsertarDetalleAnalisisUnitario" action="" method="POST">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content" >		
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="hidden" id="idAnalisis" name="idAnalisis" class="form-control" value="<?=$idAnalisis?>">
							<label for="control-label">Descripción del insumo</label>
							<div style="height: 250px;overflow-y: scroll; background-color: #f2f5f7;">
								<ul>
							    	<?php foreach ($listaNivel1 as $key => $value) 
							    	{
						    			if($value->hasChild)
						    			{?>
						    				<li>
						    					<input type="button" style="width: 25px;" class="btn btn-default btn-xs" id="btnAccion" name="Accion" value="+" onclick="elegirAccion('<?=$value->CodInsumo?>', 1, this);" style="margin: 1px;">								    			
								    			<!--<input type="button" class="btn btn-default btn-xs" value="+" onclick="ContraerSubLista(this); MostrarSubLista('<?=$value->CodInsumo?>', 1, this);" style="margin: 1px;">
								    			<input type="button" class="btn btn-default btn-xs" value="-" onclick="ContraerSubLista(this);" style="margin: 1px;">-->
								    			<span class="nivel"><?=$value->Descripcion?> <?=($value->Simbolo==null ? '' : ($value->Simbolo))?> </span>
								    		</li>
						    			<?php } else { ?>
						    				<li>
								    			<span class="nivel"><?=$value->Descripcion?></span>
								    		</li>
						    			<?php } ?>							    		
							    	<?php } ?>
							    </ul>
							</div>
						</div>
						<div class="col-md-6">
							<div id ="divFormDetallaAnalisisUnitario">
								<div class="row">
									<div class="col-md-12 col-sm-2 col-xs-12">
										<label for="control-label">Insumo:</label>
										<div>
											<input type="text" id="txtInsumo" name="txtInsumo" autocomplete="off" class="form-control">
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-2 col-xs-12">
										<label for="control-label">Cuadrilla</label>
										<div>
											<input type="text" id="txtCuadrilla" name="txtCuadrilla" autocomplete="off" class="form-control" onkeyup="calcularCantidad();calcularSubTotal();">
										</div>
									</div>
									<div class="col-md-4 col-sm-1 col-xs-12">
										<label for="control-label">Horas</label>
										<div>
											<input type="text" id="txtHoras" name="txtHoras" autocomplete="off" class="form-control" onkeyup="calcularCantidad();calcularSubTotal();">
										</div>
									</div>
									<div class="col-md-4 col-sm-1 col-xs-12">
										<label for="control-label">Unidad</label>
										<div>
											<input type="text" readonly="readonly" id="txtUnidad" name="txtUnidad" autocomplete="off" class="form-control">
										</div>
									</div>
									<!--<div class="col-md-4 col-sm-2 col-xs-12">
										<label for="control-label">Unidad</label>
										<div>
											<select name="selectUnidadMedida" id="selectUnidadMedida" class="form-control" disabled="disabled">
												<?php foreach($listaUnidadMedida as $item){ ?>
													<option value="<?=$item->id_unidad?>"><?=html_escape($item->descripcion)?></option>
												<?php } ?>
											</select>
										</div>
									</div>-->									
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-2 col-xs-12">
										<label for="control-label">Rendimiento</label>
										<div>
											<input type="text" id="txtRendimiento" autocomplete="off" name="txtRendimiento" class="form-control" onkeyup="calcularCantidad();calcularSubTotal();">
										</div>
									</div>
									<div class="col-md-4 col-sm-2 col-xs-12">
										<label for="control-label">Cantidad</label>
										<div>
											<input type="text" id="txtCantidad" autocomplete="off" name="txtCantidad" class="form-control" onkeyup="calcularRendimiento();calcularSubTotal();">
										</div>
									</div>
									<div class="col-md-4 col-sm-3 col-xs-12">
										<label for="control-label">Precio unitario</label>
										<div>
											<input type="text" id="txtPrecioUnitario" autocomplete="off" name="txtPrecioUnitario" class="form-control" onkeyup="calcularSubTotal();">
										</div>
									</div>										
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-3 col-xs-12">
										<label for="control-label">Sub total</label>
										<div>
											<input type="text" id="txtSubTotal" class="form-control" readonly="readonly">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<br>
								<div class="col-md-6 col-sm-2 col-xs-12">
									<button  class="btn btn-success" onclick="guardarDetalleAnalisisPresupuestal();">Guardar</button>
									<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								</div>	
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</form>
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
			txtInsumo:
			{
				validators:
				{				
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Insumo" es requerido.</b>'
					}
				}
			},
			/*txtCuadrilla:
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
			},*/
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
});

function calcularCantidad()
{
	var cuadrilla=$('#txtCuadrilla').val();
	var horas=$('#txtHoras').val();
	var rendimiento=$('#txtRendimiento').val();
	var cantidad=null;
	if(cuadrilla > 0 && horas > 0)
	{
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
}

function calcularRendimiento()
{
	var cuadrilla=$('#txtCuadrilla').val();
	var cantidad=$('#txtCantidad').val();
	var horas=$('#txtHoras').val();
	var rendimiento=null;

	if(cuadrilla>0 && horas>0)
	{
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
}

function calcularSubTotal()
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
	$('#divFormDetallaAnalisisUnitario').data('formValidation').resetField($('#txtCantidad'));
	$('#divFormDetallaAnalisisUnitario').data('formValidation').resetField($('#txtInsumo'));
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
                $('#frmInsertarDetalleAnalisisUnitario')[0].reset();
                $('#otherModal2').modal('hide');
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
	var marginLeftTemp=35;
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
					'<input type="button" class="btn btn-warning btn-xs" style="width: 25px;" value="A" onclick="seleccionar(\''+replaceAll(obj[i].Descripcion,'"','*')+'\',\''+obj[i].Unidad+'\', this);" style="margin: 1px;">'+
					'<span class="nivel">'+obj[i].Descripcion+ ((obj[i].Simbolo == null) ? "" : ' ('+obj[i].Simbolo+')')+'</span>'+
					'</li>';
				}
				else
				{
					htmlTemp+='<li>'+
					'<input type="button" style="width: 25px;" class="btn btn-default btn-xs" value="+" onclick="elegirAccion(\''+obj[i].CodInsumo+'\', '+(obj[i].Nivel+1)+', this);" style="margin: 1px;">'+
					'<span class="nivel">'+obj[i].Descripcion+ ((obj[i].Simbolo == null) ? "" : ' ('+obj[i].Simbolo+')')+'</span>'+
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

function seleccionar(insumo,unidad,element)
{
	var nuevoInsumo = replaceAll(insumo,'*','"');
	$('#txtInsumo').val(nuevoInsumo);
	if(unidad=='null')
	{
		$('#txtUnidad').val("UNIDAD");
	}
	else
	{
		$('#txtUnidad').val(unidad);
	}	
}

function elegirAccion(codigoInsumo, nivel, element)
{
	var valueButton =  $(element).attr('value');
	if(valueButton == '+')
	{
		MostrarSubLista(codigoInsumo, nivel, element);
		$(element).attr('value','-');
	}
	else
	{
		ContraerSubLista(element);
		$(element).attr('value','+');
	}
	
}
</script>
