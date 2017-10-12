<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>EXPEDIENTE TÉCNICO</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

                    <p>Lista de Partidas para asignar orden</p>
                    <table class="table table-striped projects">
                      	<thead>
                       		<tr>
								<th style="width: 1%">#</th>
								<th style="width: 50%">Partida</th>
								<th style="width: 20%">Opciones</th>
                        	</tr>
                      	</thead>
                      	<tbody>
                        <tr>
                          	<td>#</td>
                          	<td>
	                            <a>Pesamakini Backend UI</a>
	                            <br />
	                            <small>Created 01.01.2015</small>
                          	</td>
                          	<td>
	                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
	                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
	                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          	</td>
                        </tr>                          
                      </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
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
		$('#table-ExpedienteTecnico').DataTable(
		{
			"language":idioma_espanol
		});

	});


	$(document).ready(function()
	{
		$('#table-Compatibilidad').DataTable(
		{
			"language":idioma_espanol
		});

	});
	$(document).ready(function()
	{
		$('#table-Modificacion').DataTable(
		{
			"language":idioma_espanol
		});

	});

	$(document).ready(function()
	{
		$('#table-Ejecucion_Deductivos').DataTable(
		{
			"language":idioma_espanol
		});

	});
	$(document).ready(function()
	{
		$('#table-Ejecucion-Adicional').DataTable(
		{
			"language":idioma_espanol
		});

	});
	$(document).ready(function()
	{
		$('#tableExpedienteTecnico').DataTable(
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
	  inputPlaceholder: "Ingrese Codigo Unico"
	}, function (inputValue) {
	
	if (inputValue === "")
	  {
	  	swal.showInputError("Ingresar codigo!");
    	return false
	  }
	 else 
	 {
			event.preventDefault();
			$.ajax({
				"url":base_url+"index.php/Expediente_Tecnico/registroBuscarProyecto",
				type:"GET", 
				data:{inputValue:inputValue},
				cache:false,
				success:function(resp){
					var ProyetoEncontrado=eval(resp);
					if(ProyetoEncontrado.length==1){
							var buscar="true";
							paginaAjaxDialogo(null, 'Registrar Expediente Técnico',{CodigoUnico:inputValue,buscar:buscar}, base_url+'index.php/Expediente_Tecnico/insertar', 'GET', null, null, false, true);
	  						swal("Correcto!", "Se Encontro el Proyecto: " + inputValue, "success");
					}else{
							swal.showInputError("No se encontro el  Codigo Unico. Intente Nuevamente!");
	    					return false
					}
					
				}
			});
		}

	});
}
</script>