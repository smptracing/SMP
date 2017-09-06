<style>
	#tableObservacion td
	{
		border-bottom: 1px dotted #cccccc;
	}

	#listaArchivos
	{
		list-style: none;
		text-align: center;
		width: 100%;
	}

	#listaArchivos > li
	{
		border: 1px solid #999999;
		cursor: pointer;
		display: inline-block;
		margin: 3px;
		padding: 20px;
		padding-left: 7px;
		padding-right: 7px;
		text-align: center;
		vertical-align: middle;
		width: 200px;
	}

	#listaArchivos > li:hover
	{
		background-color: #f5f5f5;
	}
</style>
<div style="overflow-y: scroll;height: 390px;margin-top: 40px;">
	<h3 style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4)">
		Actividad: <span style="color: #26a5d8;"><?=$etTarea->nombre_tarea?></span>
		<br>
		<small>desde el <i style="text-decoration: underline;"><?=explode(' ', $etTarea->fecha_inicio_tarea)[0]?></i> hasta el <i style="text-decoration: underline;"><?=explode(' ', $etTarea->fecha_final_tarea)[0]?></i></small>
	</h3>
	<hr>
	<label for="selectETResponsableTarea"><b>Responsable de la actividad</b></label>
	<br>
	<select name="selectETResponsableTarea" id="selectETResponsableTarea" style="width: 100%;" onchange="asignarResponsable(<?=$etTarea->id_tarea_et?>);">
		<option value=""></option>
		<?php foreach($listaPersona as $key => $value){
			if(count($listaETResponsableTarea)>0){
				$asignado=false;
				foreach($listaETResponsableTarea as $index => $item){
					if($value->id_persona==$item->id_persona)
					{
						$asignado=true;break;
					}
				}
				if($asignado){ ?>
					<option value="<?=$value->id_persona?>" selected><?=$value->nombres.' '.$value->apellido_p.' '.$value->apellido_m?></option>
				<?php } else{ ?>
					<option value="<?=$value->id_persona?>"><?=$value->nombres.' '.$value->apellido_p.' '.$value->apellido_m?></option>
				<?php }
			}
			else{ ?>
				<option value="<?=$value->id_persona?>"><?=$value->nombres.' '.$value->apellido_p.' '.$value->apellido_m?></option>
			<?php }
			} ?>
	</select>
	<br><br>
	<label for="txtObservacion"><b>Observación</b></label>
	<br>
	<textarea name="txtObservacion" id="txtObservacion" rows="4" style="resize: none;width: 100%;"></textarea>
	<br>
	<div style="text-align: right;">
		<input type="button" value="Registrar observación" class="button requireWrite newproject" onclick="registrarObservacion();">
	</div>
	<table id="tableObservacion" style="width: 100%;">
		<thead>
			<tr>
				<th>Descripción</th>
				<th>Fecha</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="bodyTableObservacion">
			<?php foreach($listaETTareaObservacion as $key => $value){ ?>
				<tr>
					<td>
						<?=$value->desc_tobservacion?>
						<div style="padding-left: 20px;font-size: 12px;">
							<b>Levantamiento: </b><span id="spanDescripcionLevantamientoTObservacion<?=$value->id_tarea_observacion?>"><?=$value->levantamiento_tobservacion?></span>
							<br>
							<a id="enlaceEliminarLevantamientoObservacion<?=$value->id_tarea_observacion?>" href="#" style="color: red;<?=$value->levantamiento_tobservacion=='' ? 'display: none;' : ''?>" onclick="eliminarLevantamientoObservacion(<?=$value->id_tarea_observacion?>, this);">Eliminar levantamiento de la obs.</a>
							<textarea id="txtDescripcionLevantamientoObservacion<?=$value->id_tarea_observacion?>" rows="4" style="display: none;resize: none;width: 100%;" placeholder="Descripción del levantamiento de observación"></textarea>
						</div>	
					</td>
					<td><?=$value->fecha_tobservacion?></td>
					<td style="text-align: center;font-size: 12px;">
						<a href="#" style="color: blue;display: block" onclick="levantarObservacion(<?=$value->id_tarea_observacion?>, this);">Levantar obs.</a>
						<a href="#" style="color: red;display: block;" onclick="eliminarObservacion(<?=$value->id_tarea_observacion?>, this);">Eliminar</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<br>
	<label for="fileDocumentoEjecucion"><b>Archivos de esta actividad</b></label>
	<input type="file" id="fileDocumentoEjecucion" name="fileDocumentoEjecucion">
	<input type="button" value="Subir archivo" style="background-color: #3e973e;color: #ffffff;cursor: pointer;" onclick="registrarArchivo(<?=$etTarea->id_tarea_et?>);">
	<hr>
	<div id="divArchivosEjecucion">
		<ul id="listaArchivos">
			<?php foreach($listaETDocumentoEjecucion as $key => $value){ ?>
				<li>
					Archivo <?=($key+1).' '.$value->extension_doc_ejecucion?>
					<br>
					<a href="#" style="color: red;" onclick="eliminarArchivo(<?=$value->id_doc_ejecucion?>, this);">Eliminar</a> | <a href="#" onclick="window.location.href='<?=base_url()?>index.php/ET_Documento_Ejecucion/descargar/<?=$value->id_doc_ejecucion?>';">Descargar</a>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
<div style="background-color: #ffffff;box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.7);left: 0px;padding-top: 4px;position: absolute;right: 0px;text-align: right;top: 0px;">
	<input type="button" value="Cerrar ventana" class="button requireWrite newproject" style="background-color: #d43c3c;" onclick="$('#divDialogoGeneralGantt').hide();">
</div>
<script>
	function registrarObservacion()
	{
		if($('#txtObservacion').val().trim()=='')
		{
			swal(
			{
				title: '',
				text: 'El campo observación es obligatorio.',
				type: 'error'
			},
			function(){});

			return;
		}

		if(confirm('Confirmar operación'))
		{
			paginaAjaxJSON({ idTareaET : <?=$etTarea->id_tarea_et?>, descripcionObservacion : $('#txtObservacion').val().trim() }, '<?=base_url()?>index.php/ET_Tarea_Observacion/insertar', 'POST', null, function(objectJSON)
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

				var htmlTemp='<tr style="filaObservacion'+objectJSON.ultimoIdETTareaObservacion+'">'+
					'<td>'+
						$('#txtObservacion').val().trim()+
						'<div style="padding-left: 20px;font-size: 12px;">'+
							'<b>Levantamiento: </b><span id="spanDescripcionLevantamientoTObservacion'+objectJSON.ultimoIdETTareaObservacion+'"></span>'+
							'<br>'+
							'<a id="enlaceEliminarLevantamientoObservacion'+objectJSON.ultimoIdETTareaObservacion+'" href="#" style="color: red;display: none;" onclick="eliminarLevantamientoObservacion('+objectJSON.ultimoIdETTareaObservacion+', this);">Eliminar levantamiento de la obs.</a>'+
							'<textarea id="txtDescripcionLevantamientoObservacion'+objectJSON.ultimoIdETTareaObservacion+'" rows="4" style="display: none;resize: none;width: 100%;" placeholder="Descripción del levantamiento de observación"></textarea>'+
						'</div>'+
					'</td>'+
					'<td>'+objectJSON.fechaActual+'</td>'+
					'<td style="text-align: center;font-size: 12px;">'+
						'<a href="#" style="color: blue;display: block" onclick="levantarObservacion('+objectJSON.ultimoIdETTareaObservacion+', this);">Levantar obs.</a>'+
						'<a href="#" style="color: red;display: block;" onclick="eliminarObservacion('+objectJSON.ultimoIdETTareaObservacion+', this);">Eliminar</a>'+
					'</td>'+
				'</tr>';

				$('#bodyTableObservacion').append(htmlTemp);

				$('#txtObservacion').val('');
			}, false, true);
		}
	}

	function eliminarObservacion(idTareaObservacion, element)
	{
		if(confirm('Confirmar operación'))
		{
			paginaAjaxJSON({ idTareaObservacion : idTareaObservacion }, '<?=base_url()?>index.php/ET_Tarea_Observacion/eliminar', 'POST', null, function(objectJSON)
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

				$(element).parent().parent().remove();
			}, false, true);
		}
	}

	function levantarObservacion(idTareaObservacion, element)
	{
		var idTextAreaTemp='txtDescripcionLevantamientoObservacion'+idTareaObservacion;

		if($('#'+idTextAreaTemp).css('display')=='none')
		{
			$('#'+idTextAreaTemp).show();
			$('#'+idTextAreaTemp).val($('#spanDescripcionLevantamientoTObservacion'+idTareaObservacion).text());
			$(element).text('Guardar');
		}
		else
		{
			if($('#'+idTextAreaTemp).val().trim()=='')
			{
				swal(
				{
					title: '',
					text: 'La descripción del levantamiento de la observación es un campo obligatorio.',
					type: 'error'
				},
				function(){});

				return;
			}

			paginaAjaxJSON({ idTareaObservacion : idTareaObservacion, descripcionLevantamientoObservacion : $('#'+idTextAreaTemp).val().trim() }, '<?=base_url()?>index.php/ET_Tarea_Observacion/levantarObservacion', 'POST', null, function(objectJSON)
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

				$('#spanDescripcionLevantamientoTObservacion'+idTareaObservacion).text($('#'+idTextAreaTemp).val().trim());
				$('#enlaceEliminarLevantamientoObservacion'+idTareaObservacion).show();
				$('#'+idTextAreaTemp).hide();
				$(element).text('Levantar obs.');
			}, false, true);
		}
	}

	function eliminarLevantamientoObservacion(idTareaObservacion, element)
	{
		var idTextAreaTemp='txtDescripcionLevantamientoObservacion'+idTareaObservacion;

		paginaAjaxJSON({ idTareaObservacion : idTareaObservacion }, '<?=base_url()?>index.php/ET_Tarea_Observacion/levantarObservacion', 'POST', null, function(objectJSON)
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

			$('#spanDescripcionLevantamientoTObservacion'+idTareaObservacion).text('');
			$('#enlaceEliminarLevantamientoObservacion'+idTareaObservacion).hide();
		}, false, true);
	}

	function asignarResponsable(idTareaET)
	{
		paginaAjaxJSON({ idTareaET : idTareaET, idPersona : $('#selectETResponsableTarea').val() }, '<?=base_url()?>index.php/ET_Responsable_Tarea/asignar', 'POST', null, function(objectJSON)
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
		}, false, true);
	}

	function registrarArchivo(idTareaET)
	{
		if($($('#fileDocumentoEjecucion')[0]).get(0).files.length==0)
		{
			swal(
			{
				title: '',
				text: 'Debe seleccionar un archivo para subir a esta actividad.',
				type: 'error'
			},
			function(){});

			return;
		}

		var dataAjax=new FormData();

		dataAjax.append('idTareaET', idTareaET);
		dataAjax.append('file0', $($('#fileDocumentoEjecucion')[0]).get(0).files[0]);

		$.ajax({
		    type: 'POST',
		    url: '<?=base_url()?>index.php/ET_Documento_Ejecucion/insertar',
		    contentType: false,
		    processData: false,
		    data: dataAjax,
		    beforeSend: function(xhr)
		    {
		    	renderLoading();
		    },
		    success: function(objectJSON)
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

		    	$('#divModalCargaAjax').hide();

		    	$('#fileDocumentoEjecucion').val(null);

		    	var htmlTemp='<li>'+
					'Archivo '+(($('#listaArchivos').find('li').length)+1)+' '+objectJSON.extensionDocumentoEjecucion+
					'<br>'+
					'<a href="#" style="color: red;" onclick="eliminarArchivo('+objectJSON.idDocumentoEjecucion+', this);">Eliminar</a> | <a href="#" onclick="window.location.href=\'<?=base_url()?>index.php/ET_Documento_Ejecucion/descargar/'+objectJSON.idDocumentoEjecucion+'\';">Descargar</a>'+
				'</li>';

				$('#listaArchivos').append(htmlTemp);
		    }
		});
	}

	function eliminarArchivo(idDocumentoEjecucion, element)
	{
		if(confirm('Confirmar operación'))
		{
			paginaAjaxJSON({ idDocumentoEjecucion : idDocumentoEjecucion }, '<?=base_url()?>index.php/ET_Documento_Ejecucion/eliminar', 'POST', null, function(objectJSON)
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

				$(element).parent().remove();
			}, false, true);
		}
	}
</script>