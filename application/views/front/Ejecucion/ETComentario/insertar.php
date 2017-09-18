<link rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-select.css">
<div style="height: 250px;overflow-y: scroll;">
	<table class="table table-striped">
		<tbody>
			<tr>
				<td style="padding: 2px;padding-top: 4px;">
					<img src="<?=base_url()?>assets/img/user.png" height="45" width="45" style="background-color: #ffffff;border: 1px solid #cccccc;border-radius: 50px;">
				</td>
				<td style="padding: 4px;padding-left: 0px;">
					<b>Kevin Arnold Arias Figueroa</b><br>
					<small>Este es un comentario de prueba que se está escribiendo para verificar que el diseño se ajuste correctamente a la visualización del usuario.</small>
					<div>
						<small><b>Archivos adjuntos: </b><a href="#">Archivo de prueba.txt</a>, <a href="#">Archivo 2.png</a></small>
					</div>
					<div style="color: #999999;font-size: 9px;text-align: right;">
						<a href="#" style="color: red;font-size: 10px;">Eliminar</a> | 2017-09-18 07:51:20
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding: 2px;padding-top: 4px;">
					<img src="<?=base_url()?>assets/img/user.png" height="45" width="45" style="background-color: #fbfbf5;border: 1px solid #cccccc;border-radius: 50px;">
				</td>
				<td style="padding: 4px;padding-left: 0px;">
					<b>Kevin Arnold Arias Figueroa</b><br>
					<small>Este es un comentario de prueba que se está escribiendo para verificar que el diseño se ajuste correctamente a la visualización del usuario.</small>
					<div>
						<small><b>Archivos adjuntos: </b>Ninguno</small>
					</div>
					<div style="color: #999999;font-size: 9px;text-align: right;">
						<a href="#" style="color: red;font-size: 10px;">Eliminar</a> | 2017-09-18 07:51:20
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding: 2px;padding-top: 4px;">
					<img src="<?=base_url()?>assets/img/user.png" height="45" width="45" style="background-color: #fbfbf5;border: 1px solid #cccccc;border-radius: 50px;">
				</td>
				<td style="padding: 4px;padding-left: 0px;">
					<b>Kevin Arnold Arias Figueroa</b><br>
					<small>Este es un comentario de prueba que se está escribiendo para verificar que el diseño se ajuste correctamente a la visualización del usuario.</small>
					<div>
						<small><b>Archivos adjuntos: </b>Ninguno</small>
					</div>
					<div style="color: #999999;font-size: 9px;text-align: right;">
						<a href="#" style="color: red;font-size: 10px;">Eliminar</a> | 2017-09-18 07:51:20
					</div>
				</td>
			</tr>
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
		}, false, true);
	}
</script>