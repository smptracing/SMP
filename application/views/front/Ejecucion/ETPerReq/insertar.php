<style>
	.cajonEspecialidad
	{
		background-color: #ffffff;
		box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4);
		cursor: move;
		display: inline-table;
		height: 70px;
		margin: 2px;
		padding: 4px;
		text-align: center;
		user-select: none;
		vertical-align: middle;
		width: 170px;
	}

	.cajonEspecialidad:hover
	{
		background: #2f9bfb;
		color: #ffffff;
	}

	.cajonEspecialidad > small
	{
		display: table-cell;
		vertical-align: middle;
	}
</style>
<div style="padding: 5px;user-select: none;">
	<table style="width: 100%;">
		<thead>
			<tr>
				<th style="text-align: center;height: 25px"><b></b></th>
				<th style="text-align: center;height: 25px"><b>Especialistas requeridos para este expediente técnico</b></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="background-color: #f5f5f5;text-align: center;vertical-align: top;width: 200px;">
					<div style="height: 450px;overflow-y: scroll;">
						<?php foreach($listaEspecialidad as $key => $value){ ?>
							<div id="divEspecialidad<?=$value->id_esp?>" class="cajonEspecialidad" draggable="true" ondragstart="drag(event);">
								<small><?=$value->nombre_esp?></small>
							</div>
						<?php } ?>
					</div>
				</td>
				<td id="tdSectionDrop" style="background-color: #f5fbfb;vertical-align: top;" ondragover="allowDrop(event, this);" ondrop="drop(event, this);">
					<div style="height: 450px;overflow-y: scroll;">
						
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<script>
	function eliminarEspecialidadAsignada(idPerReq, element)
	{
		/*paginaAjaxJSON({ idPerReq : idPerReq }, '<?=base_url()?>index.php/ET_Especialista_Tarea/eliminar', 'POST', null, function(objectJSON)
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
		}, false, true);*/
	}

	function allowDrop(ev, element)
	{
		ev.preventDefault();
	}

	function drag(ev)
	{
		ev.dataTransfer.setData("idDivEspecialidad", ev.target.id);
	}

	function drop(ev, element)
	{
		ev.preventDefault();

		var data=ev.dataTransfer.getData("idDivEspecialidad");

		paginaAjaxJSON({ idEspecialidad : data.substring(15), idET : <?=$idET?> }, '<?=base_url()?>index.php/ET_Per_Req/insertar', 'POST', null, function(objectJSON)
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

			var htmlTemp='<table style="width: 100%;">'+
				'<tbody>'+
					'<tr>'+
						'<td style="width: 50%;"><div style="background-color: #54c4b9;border-radius: 5px;color: #ffffff;margin: 4px;padding: 4px;"><label><b>Craet__</b><input type="checkbox" value="craet" style="margin-left: -10px;"></label>'+$('#'+data).text()+'</div></td>'+
						'<td>'+'<select class="form-control"></select>'+'</td>'+
						'<td style="width: 1%;">'+'<a href="#" style="color: red;padding: 2px;" onclick="eliminarEspecialidadAsignada('+objectJSON.idPerReq+', this);">Eliminar</a>'+'</td>'+
					'</tr>'+
				'</tbody>'+
			'</table>';

			if($(element).find('table').length==0)
			{
				$($(element).find('div')[0]).html('');
			}

			$($(element).find('div')[0]).prepend(htmlTemp);
		}, false, true);
	}
</script>