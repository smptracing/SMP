<form class="form-horizontal " id="form-addETComponente" action="<?php echo  base_url();?>index.php/ET_Componente/insertar" method="POST">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Expediente técnico</label>
			<div>
				<input type="text" id="txtNombreProyectoInversion" name="txtNombreProyectoInversion" class="form-control" autocomplete="off" value="Nombre del proyecto de inversión" readonly="readonly">
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 4px;">
		<div class="col-md-9 col-sm-9 col-xs-9">
			<input type="text" class="form-control" id="txtDescripcionComponente" placeholder="Descripción del componente">
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="button" class="btn btn-info" value="Agregar componente" onclick="agregarComponente();" style="width: 100%;">
		</div>
	</div>
	<div id="divAgregarPartida" class="row" style="display: none;margin-top: 4px;">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label">Descripción partida</label>
			<div>
				<input type="text" class="form-control" id="txtDescripcionPartida">
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label">Rendimiento</label>
			<div>
				<input type="text" class="form-control" id="txtRendimientoPartida">
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label">Unidad</label>
			<div>
				<select id="selectUnidadMedidaPartida" class="form-control"></select>
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<label class="control-label">Cant.</label>
			<div>
				<input type="text" class="form-control" id="txtCantidadPartida">
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
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
			<ul id="ulComponenteMetaPartida">
				
			</ul>
		</div>
	</div>
	<hr>
	<div class="row" style="text-align: right;">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</form>
<div id="divDialogoTemporal"></div>
<script>
	function limpiarArbolCompletoMasOpciones()
	{
		$('#divAgregarPartida').hide();

		$('#ulComponenteMetaPartida').find('li').css({ "background-color" : "#ffffff" });
	}

	function agregarComponente()
	{
		limpiarArbolCompletoMasOpciones();

		var htmlTemp='<li>'+
			'<b>'+$('#txtDescripcionComponente').val()+'</b> <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta($(this).parent(), \'\');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente(this);" style="width: 30px;">'+
			'<ul></ul>'
		'</li>';

		$('#ulComponenteMetaPartida').append(htmlTemp);

		$('#txtDescripcionComponente').val('');
	}

	function eliminarComponente(element)
	{
		limpiarArbolCompletoMasOpciones();

		$(element).parent().remove();
	}

	function eliminarMeta(element)
	{
		limpiarArbolCompletoMasOpciones();

		$(element).parent().remove();
	}

	function agregarMeta(elementoPadre, metaPadre)
	{
		limpiarArbolCompletoMasOpciones();

		if($($(elementoPadre).find('ul')[0]).find('>.liPartida').length>0)
		{
			alert('No se puede agregar submeta al mismo nivel que una partida.');

			return;
		}

		var descripcionMeta=prompt('Descripción de la meta', '');

		if(descripcionMeta==null || descripcionMeta.trim()=='')
		{
			return;
		}

		var htmlTemp='<li>'+
			descripcionMeta+' <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta($(this).parent(), \'metaTemporal\')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), this)" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta(this);" style="width: 30px;">'+
			'<ul></ul>'+
		'</li>';

		$($(elementoPadre).find('ul')[0]).append(htmlTemp);
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
		limpiarArbolCompletoMasOpciones();

		var htmlTemp='<li style="color: blue;" class="liPartida">'+
			$('#txtDescripcionPartida').val()+' | '+$('#txtRendimientoPartida').val()+' | '+$('#selectUnidadMedidaPartida').val()+' | '+$('#txtCantidadPartida').val()+' <input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida(this);" style="width: 30px;">'+
		'</li>';

		$($(elementoPadreParaAgregarPartida).find('ul')[0]).append(htmlTemp);
	}

	function eliminarPartida(element)
	{
		limpiarArbolCompletoMasOpciones();

		$(element).parent().remove();
	}

	/*
	$(function()
	{
		$('#form-addETComponente').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtNombreProyectoInversion:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción" es requerido.</b>'
						}
					}
				}
			}
		});
	});*/
</script>