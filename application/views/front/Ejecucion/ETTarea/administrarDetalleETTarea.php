<div>
	<h3 style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4)">
		Actividad: <span style="color: #26a5d8;"><?=$etTarea->nombre_tarea?></span>
		<br>
		<small>desde el <i style="text-decoration: underline;"><?=explode(' ', $etTarea->fecha_inicio_tarea)[0]?></i> hasta el <i style="text-decoration: underline;"><?=explode(' ', $etTarea->fecha_final_tarea)[0]?></i></small>
	</h3>
	<hr>
	<label for="selectETResponsableTarea"><b>Responsable de la actividad</b></label>
	<br>
	<select name="selectETResponsableTarea" id="selectETResponsableTarea" style="width: 100%;">
		<option value=""></option>
		<?php foreach($listaPersona as $key => $value){ ?>
			<option value="<?=$value->id_persona?>"><?=$value->nombres.' '.$value->apellido_p.' '.$value->apellido_m?></option>
		<?php } ?>
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
							<span id="spanDescripcionLevantamientoTObservacion<?=$value->id_tarea_observacion?>"></span>
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
	<hr>
	<div style="text-align: right;">
		<input type="button" value="Cerrar ventana" class="button requireWrite newproject" style="background-color: #d43c3c;" onclick="$('#divDialogoGeneralGantt').hide();">
	</div>
</div>
<script>
	function registrarObservacion()
	{
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

				var htmlTemp='<tr>'+
					'<td>'+$('#txtObservacion').val().trim()+'</td>'+
					'<td>'+objectJSON.fechaActual+'</td>'+
					'<td></td>'+
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

				$('#spanDescripcionLevantamientoTObservacion'+idTareaObservacion).val($('#'+idTextAreaTemp).val().trim());

				$('#'+idTextAreaTemp).hide();
				$(element).remove();
			}, false, true);
		}
	}
</script>