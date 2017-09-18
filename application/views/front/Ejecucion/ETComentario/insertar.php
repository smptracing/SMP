<link rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-select.css">
<div id="divComentario" style="height: 250px;overflow-y: scroll;">
	<table id="tableComentario" class="table table-striped">
		<tbody>
			<?php foreach($listaETComentario as $key => $value){ ?>
				<tr>
					<td style="padding: 2px;padding-top: 4px;">
						<img src="<?=base_url()?>assets/img/user.png" height="45" width="45" style="background-color: #ffffff;border: 1px solid #cccccc;border-radius: 50px;">
					</td>
					<td style="padding: 4px;padding-left: 0px;">
						<b><?=$value->nombres.' '.$value->apellido_p.' '.$value->apellido_m?> <small style="color: #999999;">(<?=$value->nombre_esp?>)</small></b><br>
						<small><?=$value->desc_comentario?></small>
						<div>
							<small><b>Archivos adjuntos: </b><a href="#">Archivo de prueba.txt</a>, <a href="#">Archivo 2.png</a></small>
						</div>
						<div style="color: #999999;font-size: 9px;text-align: right;">
							<a href="#" style="color: red;font-size: 10px;" onclick="eliminarComentario(<?=$value->id_et_comentario?>, this);">Eliminar</a> | <?=$value->fecha_comentario?>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<textarea id="txtDescripcionComentario" rows="3" class="form-control" style="resize: none;" placeholder="Escribe un comentario con respecto a la actividad actualmente seleccionada."></textarea>
		</div>
		<div class="col-md-12" style="margin-top: 4px;">
			<input type="file" value="Publicar" multiple class="col-md-7">
			<div class="col-md-1"></div>
			<input type="button" class="btn btn-primary col-md-4" value="Publicar comentario" onclick="insertarComentario();">
		</div>
	</div>
</div>
<script src="<?=base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/bootstrap-select.js"></script>
<script>
	function insertarComentario()
	{
		paginaAjaxJSON({ idTareaET : <?=$idTareaET?>, descComentario : $('#txtDescripcionComentario').val() }, '<?=base_url()?>index.php/ET_Comentario/insertar', 'POST', null, function(objectJSON)
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
				'<td style="padding: 2px;padding-top: 4px;">'+
					'<img src="<?=base_url()?>assets/img/user.png" height="45" width="45" style="background-color: #ffffff;border: 1px solid #cccccc;border-radius: 50px;">'+
				'</td>'+
				'<td style="padding: 4px;padding-left: 0px;">'+
					'<b>'+objectJSON.etComentario.nombres+' '+objectJSON.etComentario.apellido_p+' '+objectJSON.etComentario.apellido_m+' <small style="color: #999999;">('+objectJSON.etComentario.nombre_esp+')</small></b><br>'+
					'<small>'+objectJSON.etComentario.desc_comentario+'</small>'+
					'<div>'+
						'<small><b>Archivos adjuntos: </b><a href="#">Archivo de prueba.txt</a>, <a href="#">Archivo 2.png</a></small>'+
					'</div>'+
					'<div style="color: #999999;font-size: 9px;text-align: right;">'+
						'<a href="#" style="color: red;font-size: 10px;" onclick="eliminarComentario('+objectJSON.etComentario.id_et_comentario+', this);">Eliminar</a> | '+objectJSON.etComentario.fecha_comentario+
					'</div>'+
				'</td>'+
			'</tr>';

			$('#tableComentario > tbody').append(htmlTemp);
			$('#txtDescripcionComentario').val(null);

			$('#divComentario').animate({ scrollTop :  $('#divComentario').scrollTop()+$('#divComentario')[0].scrollHeight }, 200);
		}, false, true);
	}

	function eliminarComentario(idETComentario, element)
	{
		if(confirm('¿Realmente desea eliminar el comentario?'))
		{
			paginaAjaxJSON({ idETComentario : idETComentario }, '<?=base_url()?>index.php/ET_Comentario/eliminar', 'POST', null, function(objectJSON)
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

				$(element).parent().parent().parent().remove();
			}, false, true);
		}
	}
</script>