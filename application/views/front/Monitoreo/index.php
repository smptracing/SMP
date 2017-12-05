<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>MONITOREO DE PROYECTOS</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<button class="btn btn-primary" style="margin-top: 5px;margin-bottom: 15px;"><span class="fa fa-plus"></span>  NUEVO</button>
					<div class="table-responsive">
						<table id="tablaMonitoreodeProyectos" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<td class="col-md-2 col-xs-12">Código Único</td>
									<td class="col-md-5 col-xs-12">Nombre del proyecto</td>
									<td style="text-align: right;" class="col-md-1 col-xs-12">Costo</td>
									<td class="col-md-2 col-xs-12">Estado</td>
									<td class="col-md-2 col-xs-12">Opciones</td>					
								</tr>
							</thead>
						</table>
					</div>							
									
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php
$sessionTempCorrecto=$this->session->flashdata('correcto');
$sessionTempError=$this->session->flashdata('error');

if($sessionTempCorrecto){ ?>
	<script>
	$(document).ready(function()
	{
		swal('','<?=$sessionTempCorrecto?>', "success");
	});
	</script>
<?php }

if($sessionTempError){ ?>
	<script>
	$(document).ready(function()
	{
	swal('','<?=$sessionTempError?>', "error");
	});
	</script>
<?php } ?>
<script>
$(document).ready(function()
{
	$('#tablaMonitoreodeProyectos').DataTable(
	{
		"language":idioma_espanol
	});
});
</script>
