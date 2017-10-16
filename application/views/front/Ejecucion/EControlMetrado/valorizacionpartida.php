
<form  id="frmValorizacion" action="<?php echo base_url();?>index.php/Expediente_Tecnico/insertar" method="POST">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">		
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Partida</label>
							<div>
								<input class="form-control" name="hdIdPartida" id="hdIdPartida" readonly="readonly" type="hidden"> 	
								<input class="form-control" placeholder="descripcion de Partida" autocomplete="off" readonly="readonly">	
							</div>	
						</div>
					</div>	
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">Fecha: </label>
							<div>
								<input class="form-control" name="txtFecha" id="txtFecha" type="date" autocomplete="off">	
							</div>	
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">Cantidad: </label>
							<div>
								<input class="form-control" placeholder="Cantidad" autocomplete="off" name="txtCantidad" id="txtCantidad">	
							</div>	
						</div>
					</div>			
				</br>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row" style="text-align: center;">
		<button  id="btnEnviarFormulario" class="btn btn-success">Guardar</button>
		<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	</div>
</form>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<table id="tableListaValorizacion" style="text-align: left;" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th style="width: 5%" class="col-md-1 col-xs-12">Fecha</th>
						<th style="width: 30%" class="col-md-2 col-xs-12">Cantidad</th>						
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
$(document).ready(function()
{
	$('#tableListaOrden').DataTable(
	{
		"language":idioma_espanol
	});

});
</script>

