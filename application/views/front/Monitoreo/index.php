<style>
	ul
	{
		list-style-type: none;
    	margin: 0;
    	padding: 0;

	}
	.titulo
	{
		cursor: pointer;
	}
	.prod_color li {
    margin: 0 0px;
}
.list-inline>li {
    display: inline-block;
    padding-right: 2px;
    padding-left: 2px;
}
.prod_color .color {
    border: 1px black !important;
}
/*
	.prod_color .color {
    width: 25px;
    height: 25px;
    border: 2px black !important;
    padding: 2px;
    border-radius: 50px;
}
.list-inline>li {
    display: inline-block;
}*/
.bg-off
{background:#6f6f6f !important;border:1px solid #6f6f6f !important;color:#fff}
</style>
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
									<td class="col-md-1 col-xs-12">Código Único</td>
									<td class="col-md-6 col-xs-12">Nombre del proyecto</td>
									<td style="text-align: right;" class="col-md-1 col-xs-12">Costo</td>
									<td class="col-md-2 col-xs-12">Estado</td>
									<td class="col-md-2 col-xs-12">Opciones</td>					
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listaProyecto as $key => $value) { ?>
									<tr>
										<td><?=$value->codigo_unico_pi?></td>
										<td><?=$value->nombre_pi?></td>
										<td style="text-align: right;"><?=a_number_format($value->costo_pi , 2, '.',",",3)?></td>
										<td>
											<ul class="list-inline prod_color">
					                          	<li>
					                            	<div data-toggle="tooltip" data-placement="top" title="<?php echo ($value->porcentaje<=50 ? 'Alerta: Avance al '.a_number_format($value->porcentaje , 2, '.',",",3).' %' : '')?>" class= "color <?php echo ($value->porcentaje<=50 ? 'bg-red titulo' : 'bg-off')?>"></div>
					                          	</li>
					                            <li>
					                            	<div data-toggle="tooltip" data-placement="top" title="<?php echo ($value->porcentaje>50 && $value->porcentaje<100 ? ' Avance al '.a_number_format($value->porcentaje , 2, '.',",",3).' %' : '')?>" class="color <?php echo ($value->porcentaje>50 && $value->porcentaje<100  ? 'bg-orange titulo' : 'bg-off')?>"></div>
					                          	</li>
					                          	<li>					                          
					                            	<div data-toggle="tooltip" data-placement="top" title="<?php echo ($value->porcentaje==100 ? 'Completo: Avance al '.a_number_format($value->porcentaje , 2, '.',",",3).' %' : '' )?>" class="color <?php echo ($value->porcentaje==100 ? 'bg-green titulo' : 'bg-off')?>"></div>
					                          	</li>
					                        </ul>
										</td>
										<td>
											<a onclick="paginaAjaxDialogo('monitoreo', 'Monitorear Proyecto',{ id_pi: '<?=$value->id_pi?>' }, base_url+'index.php/Mo_Monitoreo/index', 'GET', null, null, false, true);return false;" role="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Monitoreo"><span class="fa fa-search-plus"></span></a>

											<a onclick="paginaAjaxDialogo('nuevoProducto', 'Editar Producto',{ id_pi: '<?=$value->id_pi?>' }, base_url+'index.php/Mo_MonitoreodeProyectos/EditarProducto', 'GET', null, null, false, true);return false;" role="button" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><span class="fa fa-edit"></span></a>

											<a onclick="eliminarMonitoreo('<?=$value->id_pi?>', this);" role="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar" ><span class="fa fa-trash-o"></span></a>

										</td>
									</tr>
								<?php } ?>
							</tbody>
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
					url:base_url+"index.php/Mo_MonitoreodeProyectos/BuscarProyecto",
					type:"GET", 
					data:{inputValue:inputValue},
					cache:false,
					success:function(resp)
					{
						resp = JSON.parse(resp);
						if(resp.proceso=='Info')
						{
							swal("Error!", resp.mensaje, "error");
						}
						else
						{
							if(resp.length==1)
							{
								paginaAjaxDialogo('nuevoProducto', 'Registrar Producto',{codigoUnico:inputValue}, base_url+'index.php/Mo_MonitoreodeProyectos/InsertarProducto', 'GET', null, null, false, true);
			  					swal("Correcto!", "Se Encontro el Proyecto: " + inputValue, "success");
							}
							else
							{
								swal.showInputError("No se encontro el  Codigo Unico. Intente Nuevamente!");
			    				return false
							}
						}										
					}
				});
			}

		});
	}

	function eliminarMonitoreo(idPi,element)
    {
        swal({
            title: "Esta seguro que desea eliminar el Monitoreo de este proyecto?",
            text: "",
            type: "warning",
            showCancelButton: true,
            cancelButtonText:"CANCELAR" ,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "SI,ELIMINAR",
            closeOnConfirm: false
        },
        function()
        {
            paginaAjaxJSON({ "idPi" : idPi }, base_url+'index.php/Mo_MonitoreodeProyectos/eliminarMonitoreo', 'POST', null, function(resp)
			{
				resp=JSON.parse(resp);
				((resp.proceso=='Correcto') ? swal(resp.proceso,resp.mensaje,"success") : swal(resp.proceso,resp.mensaje,"error"));

				if(resp.proceso=='Correcto')
				{
					$(element).parent().parent().remove();
				}				
			}, false, true);
        });
    }

	$(document).on('hidden.bs.modal', '.modal', function () 
	{
	    if ($('body').find('.modal.in').length > 0) 
	    {
	        $('body').addClass('modal-open');
	    }
	});
</script>
