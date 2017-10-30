<?php
function mostrarMetaAnidada($meta, $idExpedienteTecnico, $componente)
{
	$htmlTemp='';
	$htmlTemp.='<li>'.
		'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosMeta('.$meta->id_meta.');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('.$meta->id_meta.', this);" style="width: 30px;"><button type="button" title="Mostrar Partidas" class="btn btn-default btn-xs" style="width: 30px;" data-toggle="collapse" data-target="#demo'.$meta->id_meta.'"><i class="fa fa-expand"></i></button>';
		//echo $componente;
		$haschild = (count($meta->childMeta)==0 ? false : true);
		$hasPartida = false;
		/*if(isset($meta->childPartida))
		{
			$hasPartida = (count($meta->childPartida)==0 ? false : true);
		}
		else
		{
			$hasPartida = false;
		}
		if(!$hasPartida)
		{
			$htmlTemp.='<input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '.$meta->id_meta.')" style="width: 30px;">';

		}
		if(!$haschild)
		{
			$htmlTemp.='<input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '.$meta->id_meta.')" style="width: 30px;">';
		}*/
		$htmlTemp.='<input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta('.$componente.', $(this).parent(), '.$meta->id_meta.')" style="width: 30px;">';

		$htmlTemp.='<input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '.$meta->id_meta.')" style="width: 30px;">';

		$htmlTemp.='<span style="text-transform: uppercase; color:#611e7b; font-weight: bold;" id="nombreMeta'.$meta->id_meta.'" contenteditable>'.html_escape($meta->desc_meta).'</span>'.
		((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '<div style="margin-bottom : 8px;margin-top : 2px;" id="demo'.$meta->id_meta.'" class="collapse"><table class ="tablaPartidas"><thead><th class = "col-md-2">OPCIONES</th><th class = "col-md-5">PARTIDA</th><th class = "col-md-1">RENDIMIENTO</th><th class = "col-md-1">U. MEDIDA</th><th class = "col-md-1">CANTIDAD</th><th class = "col-md-1">PRECIO U.</th><th class = "col-md-1">TOTAL</th></thead><tbody>' : '<ul>');

	if(count($meta->childMeta)==0)
	{		
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr id="rowPartida'.$value->id_partida.'" style="color: '.($value->partidaCompleta ? 'blue' : 'red').';" class="liPartida">'.
				'<td>'.
					'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosPartida('.$value->id_partida.');" style="width: 30px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('.$value->id_partida.', this);" style="width: 30px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : '.$idExpedienteTecnico.', idPartida : '.$value->id_partida.' }, \''.base_url().'index.php/ET_Analisis_Unitario/insertar\', \'get\', null, null, false, true);" style="width: 30px;">'.
				'</td>'.
				'<td style="text-transform: uppercase;">'.html_escape($value->desc_partida).'</td>'.
				'<td style="text-align:right;">'.html_escape($value->rendimiento).'</td>'.
				'<td style="text-align: right; text-transform: uppercase;">'.html_escape($value->descripcion).'</td>'.
				'<td style="text-align: right;"><span id="nombrePartida'.$value->id_partida.'" contenteditable>'.html_escape($value->cantidad).'</span></td>'.
				'<td style="text-align: right;">'.$value->precio_unitario.'</td>'.
				'<td style="text-align: right;">'.number_format($value->parcial, 2).'</td>'.
			'</tr>';
		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value, $idExpedienteTecnico, $componente);
	}

	$htmlTemp.=((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '</tbody></table></div>' : '</ul>').
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
	.liPartida
	{
		list-style:none;
	}
	.tablaPartidas
	{
		margin-left: 70px;
		width:90%;
	}
	.tablaPartidas {
	    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	    border-collapse: collapse;
	}

	.tablaPartidas td {
	    border: 1px solid #ddd;
	    padding: 2px 6px;
	}
	.tablaPartidas th {
	    text-align: left;
	    background-color: #e5e5e5;
	    color: #5d87b1;
	    border: 1px solid #ddd;
	    padding: 4px;
	}
</style>
<div class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
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
		    					<input type="button" style="width: 25px;" class="btn btn-default btn-xs" id="btnAccion" name="Accion" value="+" onclick="elegirAccion('<?=$value->CodPartida?>', 3, this);" style="margin: 1px;">							    			
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
						<!--<label for="control-label">Unidad:</label>
						<div>
							<input type="text" id="selectUnidadMedidaPartida" name="selectUnidadMedidaPartida" autocomplete="off" class="form-control">-->
						<label class="control-label">Unidad</label>
						<div>
							<select  name="selectUnidadMedidaPartida" id="selectUnidadMedidaPartida" class="form-control selectpicker">
								<option value="">Buscar Unidad</option>
							</select>
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
	</div>
	<hr style="margin-top: 1px;">
	<div class="row" style="height: 300px;overflow-y: scroll;">
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
			<ul id="ulComponenteMetaPartida" style="list-style-type: upper-roman;">
				<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
					<li>
						<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosComponente(<?=$value->id_componente?>);" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(<?=$value->id_componente?>, $(this).parent(), '');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente(<?=$value->id_componente?>, this);" style="width: 30px;"><b style="text-transform: uppercase; color: black;" id="nombreComponente<?=$value->id_componente?>" contenteditable><?=html_escape($value->descripcion)?></b><ul style="padding-left: 40px;">
							<?php foreach($value->childMeta as $index => $item){ ?>
								<?=mostrarMetaAnidada($item, $expedienteTecnico->id_et, $value->id_componente);?>
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
		$('#divAgregarPartida').hide(1000);
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
				'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosComponente('+objectJSON.idComponente+');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta('+objectJSON.idComponente+', $(this).parent(), \'\');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente('+objectJSON.idComponente+', this);" style="width: 30px;"> <b style="text-transform: uppercase; color: black;" id="nombreComponente'+objectJSON.idComponente+'" contenteditable>'+replaceAll(replaceAll($('#txtDescripcionComponente').val().trim(), '<', '&lt;'), '>', '&gt;')+'</b>'+
				'<ul style="padding-left: 40px;></ul>'
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
	function guardarCambiosPartida(idPartida)
	{
		if($('#nombrePartida'+idPartida).text().trim()=='')
		{
			swal(
			{
				title: '',
				text: 'Cantidad es un campo obligatorio.',
				type: 'error'
			},
			function(){});

			$('#nombrePartida'+idPartida).text('___');

			return;
		}

		paginaAjaxJSON({ "idPartida" : idPartida, 'cantidadPartida' : replaceAll(replaceAll($('#nombrePartida'+idPartida).text().trim(), '<', '&lt;'), '>', '&gt;') }, base_url+'index.php/ET_Partida/editarCantidadPartida', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});
			
			var currentRow = $("#rowPartida"+objectJSON.idPartida);
			/*currentRow.find("td:eq(4)").text('<span id="nombrePartida'+objectJSON.idPartida+'" contenteditable>'+parseFloat(objectJSON.cantidad).toFixed(2))+'</span>');*/
			currentRow.find("td:eq(6)").text(parseFloat(objectJSON.precioParcial).toFixed(2));
			currentRow.find("td:eq(4)").html('<span id="nombrePartida'+objectJSON.idPartida+'" contenteditable>'+(parseFloat(objectJSON.cantidad).toFixed(2))+'</span>');
			limpiarArbolCompletoMasOpciones();
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
				'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosMeta('+objectJSON.idMeta+');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('+objectJSON.idMeta+', this);" style="width: 30px;"><button type="button" title="Mostrar Partidas" class="btn btn-default btn-xs" style="width: 30px;" data-toggle="collapse" data-target="#demo'+objectJSON.idMeta+'"><i class="fa fa-expand"></i></button><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '+objectJSON.idMeta+')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '+objectJSON.idMeta+')" style="width: 30px;"><span style="text-transform: uppercase; color:#611e7b; font-weight: bold;" id="nombreMeta'+objectJSON.idMeta+'" contenteditable>'+descripcionMeta+'</span>'+
					'<div id="demo'+objectJSON.idMeta+'" style="margin-bottom : 8px;margin-top : 2px;" class="collapse"><table class ="tablaPartidas"><thead><th class = "col-md-1">OPCIONES</th><th class = "col-md-7">PARTIDA</th><th class = "col-md-1">RENDIMIENTO</th><th class = "col-md-1">U. MEDIDA</th><th class = "col-md-1">CANTIDAD</th><th class = "col-md-1">PRECIO U.</th><th class = "col-md-1">TOTAL</th></thead><tbody><ul></ul></li>';

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
				'<td>'+
					'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosPartida('+objectJSON.idPartida+');" style="width: 30px;">'+
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('+objectJSON.idPartida+', this);" style="width: 30px;">'+
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : <?=$expedienteTecnico->id_et?>, idPartida : '+objectJSON.idPartida+' }, \''+base_url+'index.php/ET_Analisis_Unitario/insertar\''+', \'get\', null, null, false, true);" style="width: 30px;">'+
				'</td>'+
				'<td style="text-transform: uppercase;">'+replaceAll(replaceAll($('#selectDescripcionPartida').val().trim(), '<', '&lt;'), '>', '&gt;')+'</td>'+
				'<td style="text-align:right;">'+replaceAll(replaceAll($('#txtRendimientoPartida').val().trim(), '<', '&lt;'), '>', '&gt;')+'</td>'+
				'<td style="text-align: right; text-transform: uppercase;">'+replaceAll(replaceAll(objectJSON.descripcionUnidadMedida, '<', '&lt;'), '>', '&gt;')+'</td>'+
				'<td style="text-align: right;">'+parseFloat(objectJSON.cantidadDetallePartida).toFixed(2)+'</td>'+
				'<td style="text-align: right;">'+parseFloat(objectJSON.precioUnitarioDetallePartida).toFixed(2)+'</td>'+
				'<td style="text-align: right;">'+parseFloat(objectJSON.precioParcialDetallePartida).toFixed(2)+'</td>'+
			'</tr>';
			if(!($(elementoPadreParaAgregarPartida).find('table').length))
			{
				$($(elementoPadreParaAgregarPartida).find('ul')[0]).replaceWith('<table><tbody></tbody></table>');
			}

			$($(elementoPadreParaAgregarPartida).find('table > tbody')[0]).append(htmlTemp);

			$('#selectUnidadMedidaPartida').html('<option val="">Buscar Partida</option>');			
			$('#selectUnidadMedidaPartida').selectpicker('refresh');

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
		var marginLeftTemp=35;
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
						'<input type="button" id="btnAgregar" class="btn btn-warning btn-xs" value="A" style="width: 25px;" onclick="seleccionar(\''+replaceAll(obj[i].Descripcion,'"','*')+'\',\''+obj[i].Unidad+'\', \''+obj[i].RendimientoMO+'\');" style="margin: 1px;">'+
						'<span class="nivel">'+obj[i].Descripcion+ ((obj[i].Simbolo == null) ? "" : ' ('+obj[i].Simbolo+')')+'</span>'+
						'</li>';
					}
					else
					{
						htmlTemp+='<li>'+
						'<input type="button" style="width: 25px;" class="btn btn-default btn-xs" value="+" onclick="elegirAccion(\''+obj[i].CodPartida+'\', '+(obj[i].Nivel+1)+', this);" style="margin: 1px;">'+
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
			$('#selectUnidadMedidaPartida').html('<option val="UNIDAD">UNIDAD</option>');		
			$('#selectUnidadMedidaPartida').selectpicker('refresh');
			$('#selectUnidadMedidaPartida').selectpicker('val', "UNIDAD");
			//$('#selectUnidadMedidaPartida').attr('disabled', true);
			//$('#selectUnidadMedidaPartida').selectpicker('refresh');
		}
		else
		{
			$('#selectUnidadMedidaPartida').html('<option val="'+unidad+'">'+unidad+'</option>');
			$('#selectUnidadMedidaPartida').selectpicker('refresh');	
			$('#selectUnidadMedidaPartida').selectpicker('val', unidad);
			//$('#selectUnidadMedidaPartida').attr('disabled', true);		
			//$('#selectUnidadMedidaPartida').selectpicker('refresh');
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

	$(function()
	{
		limpiarArbolCompletoMasOpciones();

		$('#selectPartida').selectpicker({ liveSearch: true }).ajaxSelectPicker(
		{
	        ajax: {
	            url: base_url+'index.php/ET_Lista_Partida/verPorDescripcion',
	            data: { valueSearch : '{{{q}}}' }
	        },
	        locale:
	        {
	            emptyTitle: 'Buscar partida'
	        },
	        preprocessData: function(data)
	        {
	        	var dataForSelect=[];

	        	for(var i=0; i<data.length; i++)
	        	{
	        		dataForSelect.push(
	                {
	                    "value" : data[i].desc_lista_partida,
	                    "text" : data[i].desc_lista_partida,
	                    "data" :
	                    {
	                    	"id-lista-partida" : data[i].id_lista_partida,
	                    	"id-unidad" : data[i].id_unidad
	                    },
	                    "disabled" : false
	                });
	        	}

	            return dataForSelect;
	        },
	        preserveSelected: false
	    });
	    $('#selectUnidadMedidaPartida').selectpicker({ liveSearch: true }).ajaxSelectPicker(
		{
	        ajax: {
	            url: base_url+'index.php/Unidad_Medida/listaUnidadMedida',
	            data: { valueSearch : '{{{q}}}' }
	        },
	        preprocessData: function(data)
	        {
	        	var dataForSelect=[];
	        	for(var i=0; i<data.length; i++)
	        	{
	        		dataForSelect.push(
	                {
	                    "value" : data[i].descripcion,
	                    "text" : data[i].descripcion,
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