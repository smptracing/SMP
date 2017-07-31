<div class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Expediente técnico</label>
			<div>
				<input type="text" id="txtNombreProyectoInversion" name="txtNombreProyectoInversion" class="form-control" autocomplete="off" value="Nombre del proyecto de inversión" readonly="readonly">
			</div>
		</div>
	</div>
	<div id="divAgregarComponente" class="row" style="margin-top: 4px;">
		<div class="col-md-9 col-sm-9 col-xs-9">
			<input type="text" class="form-control" id="txtDescripcionComponente" name="txtDescripcionComponente" placeholder="Descripción del componente">
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="button" class="btn btn-info" value="Agregar componente" onclick="agregarComponente();" style="width: 100%;">
		</div>
	</div>
	<div id="divAgregarPartida" class="row" style="display: none;margin-top: 4px;">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label">Descripción partida</label>
			<div>
				<input type="text" class="form-control" id="txtDescripcionPartida" name="txtDescripcionPartida">
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label">Rendimiento</label>
			<div>
				<input type="text" class="form-control" id="txtRendimientoPartida" name="txtRendimientoPartida">
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label">Unidad</label>
			<div>
				<select id="selectUnidadMedidaPartida" name="selectUnidadMedidaPartida" class="form-control">
					<?php foreach($listaUnidadMedida as $key => $value){ ?>
						<option value="<?=$value->id_unidad?>"><?=$value->descripcion?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<label class="control-label">Cantidad</label>
			<div>
				<input type="text" class="form-control" id="txtCantidadPartida" name="txtCantidadPartida">
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<label class="control-label">.</label>
			<div>
				<input type="button" class="btn btn-info" value="+" onclick="agregarPartida();" style="width: 100%;">
			</div>
		</div>
	</div>
	<hr style="margin-top: 4px;">
	<div class="row" style="max-height: 360px;overflow-y: scroll;">
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
			<ul id="ulComponenteMetaPartida" style="background-color: #f5f5f5;"></ul>
		</div>
	</div>
	<hr>
	<div class="row" style="text-align: right;">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</div>
<script>
	function limpiarArbolCompletoMasOpciones()
	{
		$('#divAgregarPartida').hide();

		$('#ulComponenteMetaPartida').find('li').css({ "background-color" : "#ffffff" });

		limpiarText('divAgregarPartida', []);
	}

	function agregarComponente()
	{
		$('#divAgregarComponente').data('formValidation').resetField($('#txtDescripcionComponente'));

		$('#divAgregarComponente').data('formValidation').validate();

		if(!($('#divAgregarComponente').data('formValidation').isValid()))
		{
			return;
		}

		var existeComponente=false;

		$('#ulComponenteMetaPartida').find('li').each(function(index, element)
		{
			if(replaceAll($(element).text(), ' ', '')==replaceAll($('#txtDescripcionComponente').val(), ' ', ''))
			{
				existeComponente=true;

				return false;
			}
		});

		if(existeComponente)
		{
			alert('No se puede agregar dos veces el mismo componente.');

			return;
		}

		var htmlTemp='<li>'+
			'<b>'+$('#txtDescripcionComponente').val()+'</b> <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta($(this).parent(), \'\');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente(this);" style="width: 30px;">'+
			'<ul style="background-color: #f5f5f5;"></ul>'
		'</li>';

		$('#ulComponenteMetaPartida').append(htmlTemp);

		$('#txtDescripcionComponente').val('');

		limpiarArbolCompletoMasOpciones();
	}

	function eliminarComponente(element)
	{
		if(!confirm('Al borrar componente se eliminará todas las metas, sub metas y partidas asociadas. ¿Realmente desea proseguir con la operaición?'))
		{
			return;
		}

		$(element).parent().remove();

		limpiarArbolCompletoMasOpciones();
	}

	function eliminarMeta(element)
	{
		if(!confirm('Al borrar meta se eliminará todas las sub metas y partidas asociadas. ¿Realmente desea proseguir con la operaición?'))
		{
			return;
		}

		$(element).parent().remove();

		limpiarArbolCompletoMasOpciones();
	}

	function agregarMeta(elementoPadre, metaPadre)
	{
		if($($(elementoPadre).find('ul')[0]).find('> .liPartida').length>0)
		{
			alert('No se puede agregar submeta al mismo nivel que una partida.');

			return;
		}

		var descripcionMeta=prompt('Descripción de la meta', '');

		if(descripcionMeta==null || descripcionMeta.trim()=='')
		{
			return;
		}

		var existeMeta=false;

		$($(elementoPadre).find('ul')[0]).find('> li').each(function(index, element)
		{
			if(replaceAll($(element).text(), ' ', '')==replaceAll(descripcionMeta, ' ', ''))
			{
				existeMeta=true;

				return false;
			}
		});

		if(existeMeta)
		{
			alert('No se puede agregar dos metas iguales en el mismo nivel.');

			return;
		}

		var htmlTemp='<li>'+
			descripcionMeta+' <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta($(this).parent(), \'metaTemporal\')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), this)" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta(this);" style="width: 30px;">'+
			'<ul style="background-color: #f5f5f5;"></ul>'+
		'</li>';

		$($(elementoPadre).find('ul')[0]).append(htmlTemp);

		limpiarArbolCompletoMasOpciones();
	}

	var elementoPadreParaAgregarPartida, metaPadreParaAgregarPartida;

	function renderizarAgregarPartida(elementoPadre, metaPadre)
	{
		limpiarArbolCompletoMasOpciones();
		
		if($($(elementoPadre).find('ul')[0]).find('input[value="+M"]').length)
		{
			alert('No se puede agregar partida a una meta antecesora de otra.');

			return;
		}

		$('#divAgregarPartida').show(1000);

		$(elementoPadre).css({ "background-color" : "#f5f5f5" });

		elementoPadreParaAgregarPartida=elementoPadre;
		metaPadreParaAgregarPartida=metaPadre;
	}

	function agregarPartida()
	{
		$('#divAgregarPartida').data('formValidation').resetField($('#txtDescripcionPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#txtRendimientoPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#selectUnidadMedidaPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#txtCantidadPartida'));

		$('#divAgregarPartida').data('formValidation').validate();

		if(!($('#divAgregarPartida').data('formValidation').isValid()))
		{
			return;
		}

		var existePartida=false;

		$($(elementoPadreParaAgregarPartida).find('ul')[0]).find('> li > b').each(function(index, element)
		{
			if(replaceAll($(element).text(), ' ', '')==replaceAll($('#txtDescripcionPartida').val(), ' ', ''))
			{
				existePartida=true;

				return false;
			}
		});

		if(existePartida)
		{
			alert('No se puede agregar dos partidas iguales en el mismo nivel.');

			return;
		}

		var htmlTemp='<li style="color: blue;" class="liPartida">'+
			'<b>'+$('#txtDescripcionPartida').val()+'</b> | '+$('#txtRendimientoPartida').val()+' | '+$('#selectUnidadMedidaPartida').val()+' | '+$('#txtCantidadPartida').val()+' <input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida(this);" style="width: 30px;">'+
		'</li>';

		$($(elementoPadreParaAgregarPartida).find('ul')[0]).append(htmlTemp);

		limpiarArbolCompletoMasOpciones();
	}

	function eliminarPartida(element)
	{
		if(!confirm('Al borrar partida se eliminará todos los datos relacionados a dicha partida. ¿Realmente desea proseguir con la operaición?'))
		{
			return;
		}

		$(element).parent().remove();

		limpiarArbolCompletoMasOpciones();
	}

	$(function()
	{
		$('#divAgregarComponente').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtDescripcionComponente:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción del componente" es requerido.</b>'
						}
					}
				}
			}
		});

		$('#divAgregarPartida').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtDescripcionPartida:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción partida" es requerido.</b>'
						}
					}
				},
				txtRendimientoPartida:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Rendimiento" es requerido.</b>'
						}
					}
				},
				selectUnidadMedidaPartida:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Unidad" es requerido.</b>'
						}
					}
				},
				txtCantidadPartida:
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
	                        message: '<b style="color: red;">El campo "Cantidad" debe ser un número.</b>'
	                    }
					}
				}
			}
		});
	});
</script>