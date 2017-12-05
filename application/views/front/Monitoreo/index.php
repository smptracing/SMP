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
					<button onclick="BuscarProyectocodigo();" class="btn btn-primary" style="margin-top: 5px;margin-bottom: 15px;"><span class="fa fa-plus"></span>  NUEVO</button>
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
function BuscarProyectocodigo()
{
	swal({
		title: "Buscar",
		text: "Proyecto: Ingrese Código Único del proyecto",
		type: "input",
		showCancelButton: true,
		closeOnConfirm: false,
		cancelButtonText:"CERRAR" ,
		confirmButtonText: "BUSCAR",
		inputPlaceholder: "Ingrese Codigo Unico",

	}, function (inputValue)
	{
		if (inputValue === "")
	  	{
	  		swal.showInputError("Ingrese código Único");
    		return false
	  	}
		else 
		{
			event.preventDefault();
			$.ajax({
				"url":base_url+"index.php/Mo_MonitoreodeProyectos/BuscarProyecto",
				type:"GET", 
				data:{inputValue:inputValue},
				cache:false,
				success:function(resp)
				{
					console.log(resp);
					resp = JSON.parse(resp);
					console.log(resp);
					if(resp.length==1)
					{
						alert("Hola");
						/*var buscar="true";
						paginaAjaxDialogo(null, 'Registrar Expediente Técnico',{CodigoUnico:inputValue,buscar:buscar}, base_url+'index.php/Expediente_Tecnico/insertar', 'GET', null, null, false, true);
	  					swal("Correcto!", "Se Encontro el Proyecto: " + inputValue, "success");*/
					}
					else
					{
						swal.showInputError("No se encontro el  Codigo Unico. Intente Nuevamente!");
	    				return false
					}					
				}
			});
		}

	});
}
</script>
