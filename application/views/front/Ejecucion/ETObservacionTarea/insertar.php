<link rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-select.css">
<div id="divObservacionTarea" style="height: 250px;overflow-y: scroll;">
	<table id="tableObservacionTarea" class="table table-striped">
		<tbody>
			<?php foreach($listaETObservacionTarea as $key => $value){ ?>
				<tr>
					<td style="padding: 2px;padding-top: 4px;width: 45px;">
						<img src="<?=base_url()?>assets/img/user.png" height="45" width="45" style="background-color: #ffffff;border: 1px solid #cccccc;border-radius: 50px;">
					</td>
					<td style="padding: 4px;padding-left: 0px;">
						<b><?=html_escape($value->nombres.' '.$value->apellido_p.' '.$value->apellido_m)?> <small style="color: #999999;">(<?=html_escape($value->nombre_esp)?>)</small></b><br>
						<small><?=html_escape($value->desc_observacion_tarea)?></small>
						<div>
							<small>
								<?=count($value->childETArchivo)!=0 ? '<b>Archivos adjuntos: </b>' : ''?>
								<?php foreach($value->childETArchivo as $index => $item){ ?>
									<a href="#" onclick="window.location.href='<?=base_url()?>index.php/ET_Archivo/descargar/<?=$item->id_et_archivo?>';"><?=html_escape($item->nombre_archivo)?></a><?=(count($value->childETArchivo)-1)!=$index ? ', ' : ''?>
								<?php } ?>
							</small>
						</div>
						<div style="color: #999999;font-size: 9px;text-align: right;">
							<a href="#" style="color: red;font-size: 10px;" onclick="eliminarObservacionTarea(<?=$value->id_et_observacion_tarea?>, this);">Eliminar</a> | <?=$value->fecha_observacion_tarea?>
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
			<textarea id="txtDescripcionObservacionTarea" rows="3" class="form-control" style="resize: none;" placeholder="Escribe un observación con respecto a la actividad actualmente seleccionada."></textarea>
		</div>
		<div class="col-md-12" style="margin-top: 4px;">
			<input type="file" id="fileArchivosObservacionTarea" value="Publicar" multiple class="col-md-7">
			<div class="col-md-1"></div>
			<input type="button" class="btn btn-primary col-md-4" value="Publicar observación" onclick="insertarObservacionTarea();">
		</div>
	</div>
</div>
<script src="<?=base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/bootstrap-select.js"></script>