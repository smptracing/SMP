<?php
function mostrarMetaAnidada($meta, $idExpedienteTecnico)
{
	$htmlTemp='';

	$htmlTemp.='<li>'.
		'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosMeta('.$meta->id_meta.');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('.$meta->id_meta.', this);" style="width: 30px;"> <span id="nombreMeta'.$meta->id_meta.'" contenteditable>'.html_escape($meta->desc_meta).'</span>'.
		((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '<table><tbody>' : '<ul>');

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr id="rowPartida'.$value->id_partida.'" style="color: '.($value->partidaCompleta ? 'blue' : 'red').';" class="liPartida">'.
				'<td style="width: 75px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('.$value->id_partida.', this);" style="width: 30px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : '.$idExpedienteTecnico.', idPartida : '.$value->id_partida.' }, \''.base_url().'index.php/ET_Analisis_Unitario/insertar\', \'get\', null, null, false, true);" style="width: 30px;">'.
				'</td>'.
				'<td style="padding-left: 10px;"><b>&#9658;'.html_escape($value->desc_partida).'</b></td>'.
				'<td style="padding-left: 4px;">'.html_escape($value->rendimiento).'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.html_escape($value->descripcion).'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.$value->cantidad.'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.number_format($value->parcial, 2).'</td>'.
			'</tr>';
		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value, $idExpedienteTecnico);
	}

	$htmlTemp.=((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '</tbody></table>' : '</ul>').
	'</li>';

	return $htmlTemp;
}
?>
<style>
	.modal-dialog
	{
		width: 90%;
		margin: 0;
		margin-left: 5%;
		padding: 0;
	}

	.modal-content
	{
		height: auto;
		min-height: 100%;
		border-radius: 0;
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
	li
	{
		list-style:none;
	}
</style>
<div class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<!--<label class="control-label">Nombre del proyecto de inversión</label>-->
			<div>
				<textarea name="txtNombreProyectoInversion" id="txtNombreProyectoInversion" rows="2" class="form-control" style="resize: none;resize: vertical;" readonly="readonly"><?=html_escape(trim($expedienteTecnico->nombre_pi))?></textarea>
			</div>
		</div>
	</div>
	<div id="divAgregarComponente" class="row" style="margin-top: 3px;">
		<div class="col-md-9 col-sm-9 col-xs-9">
			<input type="text" class="form-control" id="txtDescripcionComponente" name="txtDescripcionComponente" placeholder="Descripción del componente">
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="button" class="btn btn-info" value="Agregar componente" onclick="agregarComponente();" style="width: 100%;">
		</div>
	</div>
	<div id="divAgregarPartida" class="row" style="display: none;margin-top: 2px;">
		<div class="col-md-6">
			<label for="control-label">Descripción de la Partida</label>
			<div style="height: 220px;overflow-y: scroll; background-color: #f2f5f7;">
				<ul>
			    	<?php foreach ($listaPartidaNivel1 as $key => $value) 
			    	{
		    			if($value->hasChild)
		    			{?>
		    				<li>							    			
				    			<input type="button" class="btn btn-default btn-xs" value="+" onclick="ContraerSubLista(this); MostrarSubLista('<?=$value->CodPartida?>',3, this);" style="margin: 1px;">
				    			<input type="button" class="btn btn-default btn-xs" value="-" onclick="ContraerSubLista(this);" style="margin: 1px;">
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
			<div id="validarPartida">
				<div class="row">
					<div class="col-md-12 col-sm-2 col-xs-12">
						<br>
						<label for="control-label">Partida:</label>
						<div>
							<input type="text" id="selectDescripcionPartida" name="selectDescripcionPartida" autocomplete="off" class="form-control">
						</div>
					</div>								
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-2 col-xs-12">
						<label for="control-label">Rendimiento:</label>
						<div>
							<input type="text" id="txtRendimientoPartida" name="txtRendimientoPartida" autocomplete="off" class="form-control">
						</div>
					</div>	
					<div class="col-md-6 col-sm-2 col-xs-12">
						<label for="control-label">Unidad:</label>
						<div>
							<input type="text" id="selectUnidadMedidaPartida" name="selectUnidadMedidaPartida" autocomplete="off" class="form-control">
						</div>
					</div>								
				</div>	
				<div class="row">
					<div class="col-md-6 col-sm-2 col-xs-12">
						<label for="control-label">Cantidad:</label>
						<div>
							<input type="text" id="txtCantidadPartida" name="txtCantidadPartida" autocomplete="off" class="form-control">
						</div>
					</div>
					<div class="col-md-6 col-sm-2 col-xs-12">
						<label for="control-label">Precio:</label>
						<div>
							<input type="text" id="txtPrecioUnitarioPartida" name="txtPrecioUnitarioPartida" autocomplete="off" class="form-control">
						</div>
					</div>									
				</div>
			</div>
			<div class="row">
				<br>
				<div class="col-md-6 col-sm-2 col-xs-12">
					<input type="hidden" id="hdIdListaPartida" name="hdIdListaPartida">
					<input type="button" class="btn btn-success" value="Guardar" onclick="agregarPartida();">
					<input type="button" class="btn btn-danger" value="Cerrar" onclick="cerrar();">
				</div>	
			</div>			
		</div>

		<!--<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Descripción partida</label>
			<div>
				<select name="selectDescripcionPartida" id="selectDescripcionPartida" class="form-control"></select>
			</div>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
			<label class="control-label">Rendimiento</label>
			<div>
				<input type="text" class="form-control" id="txtRendimientoPartida" name="txtRendimientoPartida">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
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
		<div class="col-md-2 col-sm-2 col-xs-2">
			<label class="control-label">Precio U.</label>
			<div>
				<input type="text" class="form-control" id="txtPrecioUnitarioPartida" name="txtPrecioUnitarioPartida">
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<label class="control-label">.</label>
			<div>
				<input type="hidden" id="hdIdListaPartida" name="hdIdListaPartida">
				<input type="button" class="btn btn-info" value="+" onclick="agregarPartida();" style="width: 100%;">
			</div>
		</div>-->
	</div>
	<hr style="margin-top: 1px;">
	<div class="row" style="height: 300px;overflow-y: scroll;">
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
			<ul id="ulComponenteMetaPartida" style="background-color: #f5f5f5;list-style-type: upper-roman;">
				<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
					<li>
						<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosComponente(<?=$value->id_componente?>);" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(<?=$value->id_componente?>, $(this).parent(), '');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente(<?=$value->id_componente?>, this);" style="width: 30px;"> <b id="nombreComponente<?=$value->id_componente?>" contenteditable><?=html_escape($value->descripcion)?></b>
						<ul style="background-color: #f5f5f5;">
							<?php foreach($value->childMeta as $index => $item){ ?>
								<?=mostrarMetaAnidada($item, $expedienteTecnico->id_et);?>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<hr>
	<div class="row" style="text-align: right;">
		<input type="hidden" id="hdIdET" value="<?=$expedienteTecnico->id_et?>">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</div>
<script>
	function cerrar()
	{
		$('#divAgregarPartida').hide();
	}
	function limpiarArbolCompletoMasOpciones()
	{
		//$('#divAgregarPartida').hide();

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

		$('#ulComponenteMetaPartida').find('> li > b').each(function(index, element)
		{
			if(replaceAll($(element).text(), ' ', '').toLowerCase()==replaceAll($('#txtDescripcionComponente').val(), ' ', '').toLowerCase())
			{
				existeComponente=true;

				return false;
			}
		});

		if(existeComponente)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar dos veces el mismo componente.',
				type: 'error'
			},
			function(){});

			return;
		}

		paginaAjaxJSON({ "idET" : $('#hdIdET').val(), "descripcionComponente" : $('#txtDescripcionComponente').val().trim() }, base_url+'index.php/ET_Componente/insertar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			if(objectJSON.proceso=='Error')
			{
				return false;
			}

			var htmlTemp='<li>'+
				'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosComponente('+objectJSON.idComponente+');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta('+objectJSON.idComponente+', $(this).parent(), \'\');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente('+objectJSON.idComponente+', this);" style="width: 30px;"> <b id="nombreComponente'+objectJSON.idComponente+'" contenteditable>'+replaceAll(replaceAll($('#txtDescripcionComponente').val().trim(), '<', '&lt;'), '>', '&gt;')+'</b>'+
				'<ul style="background-color: #f5f5f5;"></ul>'
			'</li>';

			$('#ulComponenteMetaPartida').append(htmlTemp);

			$('#txtDescripcionComponente').val('');

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	function guardarCambiosComponente(idComponente)
	{
		if($('#nombreComponente'+idComponente).text().trim()=='')
		{
			swal(
			{
				title: '',
				text: 'El nombre del componente es obligatorio.',
				type: 'error'
			},
			function(){});

			$('#nombreComponente'+idComponente).text('___');

			return;
		}

		paginaAjaxJSON({ "idComponente" : idComponente, 'descripcionComponente' : replaceAll(replaceAll($('#nombreComponente'+idComponente).text().trim(), '<', '&lt;'), '>', '&gt;') }, base_url+'index.php/ET_Componente/editarDescComponente', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$('#nombreComponente'+idComponente).text($('#nombreComponente'+idComponente).text().trim());
		}, false, true);
	}

	function guardarCambiosMeta(idMeta)
	{
		if($('#nombreMeta'+idMeta).text().trim()=='')
		{
			swal(
			{
				title: '',
				text: 'El nombre de la meta es obligatorio.',
				type: 'error'
			},
			function(){});

			$('#nombreMeta'+idMeta).text('___');

			return;
		}

		paginaAjaxJSON({ "idMeta" : idMeta, 'descripcionMeta' : replaceAll(replaceAll($('#nombreMeta'+idMeta).text().trim(), '<', '&lt;'), '>', '&gt;') }, base_url+'index.php/ET_Meta/editarDescMeta', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$('#nombreMeta'+idMeta).text($('#nombreMeta'+idMeta).text().trim());
		}, false, true);
	}

	function eliminarComponente(idComponente, element)
	{
		if(!confirm('Al borrar componente se eliminará todas las metas, sub metas y partidas asociadas. ¿Realmente desea proseguir con la operaición?'))
		{
			return;
		}

		paginaAjaxJSON({ "idComponente" : idComponente }, base_url+'index.php/ET_Componente/eliminar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$(element).parent().remove();

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	function eliminarMeta(idMeta, element)
	{
		if(!confirm('Al borrar meta se eliminará todas las sub metas y partidas asociadas. ¿Realmente desea proseguir con la operación?'))
		{
			return;
		}

		paginaAjaxJSON({ "idMeta" : idMeta }, base_url+'index.php/ET_Meta/eliminar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$(element).parent().remove();

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	function agregarMeta(idComponente, elementoPadre, idMetaPadre)
	{
		if($($(elementoPadre).find('> table')[0]).find('> tbody > .liPartida').length>0)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar submeta al mismo nivel que una partida.',
				type: 'error'
			},
			function(){});

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
			if(replaceAll($(element).text(), ' ', '').toLowerCase()==replaceAll(descripcionMeta, ' ', '').toLowerCase())
			{
				existeMeta=true;

				return false;
			}
		});

		if(existeMeta)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar dos metas iguales en el mismo nivel.',
				type: 'error'
			},
			function(){});

			return;
		}

		paginaAjaxJSON({ "idComponente" : idComponente, "descripcionMeta" : descripcionMeta.trim(), "idMetaPadre" : idMetaPadre }, base_url+'index.php/ET_Meta/insertar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			if(objectJSON.proceso=='Error')
			{
				return false;
			}

			var htmlTemp='<li>'+
				'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosMeta('+objectJSON.idMeta+');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '+objectJSON.idMeta+')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '+objectJSON.idMeta+')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('+objectJSON.idMeta+', this);" style="width: 30px;"> <span id="nombreMeta'+objectJSON.idMeta+'" contenteditable>'+replaceAll(replaceAll(descripcionMeta.trim(), '<', '&lt;'), '>', '&gt;')+'</span>'+
				'<ul style="background-color: #f5f5f5;"></ul>'+
			'</li>';

			$($(elementoPadre).find('ul')[0]).append(htmlTemp);

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	var elementoPadreParaAgregarPartida, metaPadreParaAgregarPartida;

	function renderizarAgregarPartida(elementoPadre, metaPadre)
	{
		limpiarArbolCompletoMasOpciones();
		
		if($($(elementoPadre).find('ul')[0]).find('input[value="+M"]').length)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar partida a una meta antecesora de otra.',
				type: 'error'
			},
			function(){});

			return;
		}

		$('#divAgregarPartida').show(1000);

		$(elementoPadre).css({ "background-color" : "#f5f5f5" });

		elementoPadreParaAgregarPartida=elementoPadre;
		metaPadreParaAgregarPartida=metaPadre;
	}
	function agregarPartida()
	{		

		$('#divAgregarPartida').data('formValidation').resetField($('#selectDescripcionPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#txtRendimientoPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#selectUnidadMedidaPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#txtCantidadPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#txtPrecioUnitarioPartida'));

		$('#divAgregarPartida').data('formValidation').validate();

		if(!($('#divAgregarPartida').data('formValidation').isValid()))
		{
			return;
		}
		

		var existePartida=false;

		$($(elementoPadreParaAgregarPartida).find('table')[0]).find('> tbody > tr > td > b').each(function(index, element)
		{
			if(replaceAll($(element).text(), ' ', '').toLowerCase()==replaceAll($('#selectDescripcionPartida').val(), ' ', '').toLowerCase())
			{
				existePartida=true;

				return false;
			}
		});

		if(existePartida)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar dos partidas iguales en el mismo nivel.',
				type: 'error'
			},
			function(){});

			return;
		}

		var idUnidad = $('#selectUnidadMedidaPartida').val().trim();
		var descripcion = $('#selectDescripcionPartida').val().trim();
		var rendimiento = $('#txtRendimientoPartida').val().trim();
		var cantidad = $('#txtCantidadPartida').val();
		var precio = $('#txtPrecioUnitarioPartida').val();
		var idLista = $('#hdIdListaPartida').val();

		paginaAjaxJSON({ "idMeta" : metaPadreParaAgregarPartida, "idUnidad" : idUnidad, "descripcionPartida" : descripcion, "rendimientoPartida" : rendimiento, "cantidadPartida" : cantidad, "precioUnitarioPartida" : precio, "idListaPartida" : idLista }, base_url+'index.php/ET_Partida/insertar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			if(objectJSON.proceso=='Error')
			{
				return false;
			}

			var htmlTemp='<tr id="rowPartida'+objectJSON.idPartida+'" style="color: red;" class="liPartida">'+
				'<td style="width: 75px;">'+
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('+objectJSON.idPartida+', this);" style="width: 30px;">'+
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : <?=$expedienteTecnico->id_et?>, idPartida : '+objectJSON.idPartida+' }, \''+base_url+'index.php/ET_Analisis_Unitario/insertar\''+', \'get\', null, null, false, true);" style="width: 30px;">'+
				'</td>'+
				'<td style="padding-left: 10px;"><b>&#9658;'+replaceAll(replaceAll($('#selectDescripcionPartida').val().trim(), '<', '&lt;'), '>', '&gt;')+'</b></td>'+
				'<td style="padding-left: 4px;">'+replaceAll(replaceAll($('#txtRendimientoPartida').val().trim(), '<', '&lt;'), '>', '&gt;')+'</td>'+
				'<td style="padding-left: 4px;text-align: center;">'+replaceAll(replaceAll(objectJSON.descripcionUnidadMedida, '<', '&lt;'), '>', '&gt;')+'</td>'+
				'<td style="padding-left: 4px;text-align: center;">'+parseFloat(objectJSON.cantidadDetallePartida).toFixed(2)+'</td>'+
				'<td style="padding-left: 4px;text-align: center;">'+parseFloat(objectJSON.precioParcialDetallePartida).toFixed(2)+'</td>'+
			'</tr>';

			if(!($(elementoPadreParaAgregarPartida).find('table').length))
			{
				$($(elementoPadreParaAgregarPartida).find('ul')[0]).replaceWith('<table><tbody></tbody></table>');
			}

			$($(elementoPadreParaAgregarPartida).find('table > tbody')[0]).append(htmlTemp);

			limpiarArbolCompletoMasOpciones();
		}, false, true);

	}

	function eliminarPartida(idPartida, element)
	{
		if(!confirm('Al borrar partida se eliminará todos los datos relacionados a dicha partida. ¿Realmente desea proseguir con la operaición?'))
		{
			return;
		}

		paginaAjaxJSON({ "idPartida" : idPartida }, base_url+'index.php/ET_Partida/eliminar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			var tBodyTemporal=$(element).parent().parent().parent();

			$(element).parent().parent().remove();

			if(!($(tBodyTemporal).find('tr').length))
			{
				$($(tBodyTemporal).parent()[0]).replaceWith('<ul></ul>');
			}

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	function MostrarSubLista(codigoPartida, nivel, element)
	{
		var marginLeftTemp=45;
		$.ajax(
		{
			type: "POST",
			url: base_url+"index.php/ET_Componente/cargarNivel",
			cache: false,
			data: { codigoPartida: codigoPartida, nivel: nivel },
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
						'<input type="button" class="btn btn-warning btn-xs" value="A" onclick="seleccionar(\''+replaceAll(obj[i].Descripcion,'"','*')+'\',\''+obj[i].Unidad+'\', \''+obj[i].RendimientoMO+'\');" style="margin: 1px;">'+
						'<span class="nivel">'+obj[i].Descripcion+ ((obj[i].Simbolo == null) ? "" : ' ('+obj[i].Simbolo+')')+'</span>'+
						'</li>';
					}
					else
					{
						htmlTemp+='<li>'+
						'<input type="button" class="btn btn-default btn-xs" value="+" onclick="ContraerSubLista(this); MostrarSubLista(\''+obj[i].CodPartida+'\', '+(obj[i].Nivel+1)+', this);" style="margin: 1px;">'+
						'<input type="button" class="btn btn-default btn-xs" value="-" onclick="ContraerSubLista(this);" style="margin: 1px;">'+
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

	function seleccionar(partida,unidad,rendimiento)
	{
		var nuevoPartida = replaceAll(partida,'*','"');
		$('#selectDescripcionPartida').val(nuevoPartida);
		if(unidad=='null')
		{
			$('#selectUnidadMedidaPartida').val("UNIDAD");
		}
		else
		{
			$('#selectUnidadMedidaPartida').val(unidad);
		}
		if(rendimiento == 'null')
		{
			$('#txtRendimientoPartida').val("");
		}
		else
		{
			$('#txtRendimientoPartida').val(rendimiento);
		}
	}

	$(function()
	{
		limpiarArbolCompletoMasOpciones();

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
				selectDescripcionPartida:
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
				},
				txtPrecioUnitarioPartida:
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
	                        message: '<b style="color: red;">El campo "Precio unitario" debe ser en soles.</b>'
	                    }
					}
				}
			}
		});
	});
</script>