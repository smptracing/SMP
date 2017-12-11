<style>
	.panel-title 
	{
	    font-size: 13px;
	    font-weight: bold;
	}
</style>
<div class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div>
				<input type="hidden" id="id_pi" value="<?=$proyecto[0]->id_pi?>">
				<textarea name="txtNombreProyectoInversion" id="txtNombreProyectoInversion" rows="2" class="form-control" style="resize: none;resize: vertical;" readonly="readonly"><?=html_escape(trim($proyecto[0]->nombre_pi))?></textarea>
			</div>
		</div>
	</div>
	<br>
	<div id="divAgregarProducto" class="row" style="margin-top: 3px;">
		<div class="col-md-10 col-sm-6 col-xs-12">
			<input type="text" class="form-control" id="txtDescripcionProducto" name="txtDescripcionProducto" placeholder="Descripción del producto">
		</div>
		<div class="col-md-2 col-sm-4 col-xs-12">
			<input type="button" class="btn btn-info" value="Agregar producto" onclick="agregarProducto();" style="width: 100%;">
		</div>
	</div>
	<div class="row" style="height: 300px;overflow-y: scroll; margin-top: 15px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
        		<?php foreach ($producto as $key => $value) { ?>        		
        		<div class="panel">
        			<div class="panel-heading" style="padding: 6px;">
        				<h4 class="panel-title" style="float:right;">
        					<a onclick="paginaAjaxDialogo('modal2', 'Agregar Actividad',{ idPi: '<?=$value->id_pi?>' , idProducto : '<?=$value->id_producto?>' }, base_url+'index.php/Mo_Actividad/Insertar', 'GET', null, null, false, true);return false;" role="button" class="btn btn-round btn-warning btn-xs"><span class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Agregar Actividad"></span>
        					</a>
        				</h4>
        				<a class="panel-title" id="heading<?=$value->id_producto?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$value->id_producto?>" aria-expanded="false" aria-controls="collapse<?=$value->id_producto?>" style="text-transform: uppercase;"><?=$value->desc_producto?>
        				</a>
        			</div>
        			<div id="collapse<?=$value->id_producto?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$value->id_producto?>">
				      	<div class="panel-body">
				      		<div class="table-responsive">
				      			<table class="table table-bordered">
				              		<thead>
				                		<tr>
				                  			<th>Actividad</th>
				                  			<th>U. Medida</th>
				                  			<th>Meta</th>
				                  			<th>Fecha Inicio</th>
				                  			<th>Fecha Fin</th>
				                  			<th>Opciones</th>
				                		</tr>
				              		</thead>
				              		<tbody>
				              			<?php foreach ($value->childActividad as $key => $actividad) { ?>
				              			<tr>
				                  			<td><?=$actividad->desc_actividad?></td>
				                  			<td><?=$actividad->uni_medida?></td>
				                  			<td><?=$actividad->meta?></td>
				                  			<td><?=$actividad->fecha_inicio?></td>
				                  			<td><?=$actividad->fecha_fin?></td>
				                  			<td>
				                  				<a onclick="editarActividad('<?=$actividad->id_actividad?>','<?=$value->id_pi?>');" role="button" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><span class="fa fa-edit"></span></a>

												<a onclick="eliminarActividad('<?=$actividad->id_actividad?>', this);" role="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar" ><span class="fa fa-trash-o"></span></a>
				                  			</td>
				                		</tr>
				                		<?php } ?>
				              		</tbody>
				            	</table>			      			
				      		</div>			        	
				      	</div>
			    	</div>
        		</div> 
        		<?php } ?>       		
        	</div>
        </div>
	</div>

	<hr>
	<div class="row" style="text-align: right;">		
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</div>
<script>
	function agregarProducto()
	{
		$('#divAgregarProducto').data('formValidation').resetField($('#txtDescripcionProducto'));

		$('#divAgregarProducto').data('formValidation').validate();

		if(!($('#divAgregarProducto').data('formValidation').isValid()))
		{
			return;
		}
		paginaAjaxJSON({ "idPi" : $('#id_pi').val(), "descripcionProducto" : $('#txtDescripcionProducto').val().trim() }, base_url+'index.php/Mo_MonitoreodeProyectos/InsertarProducto', 'POST', null, function(objectJSON)
		{
			resp=JSON.parse(objectJSON);

			((resp.proceso=='Correcto') ? swal(resp.proceso,resp.mensaje,"success") : swal(resp.proceso,resp.mensaje,"error"));
            
            if(resp.proceso=='Correcto')
            {
            	var htmlTemp= '<div class="panel"><div class="panel-heading" style="padding: 6px;"><h4 class="panel-title" style="float:right;"><a onclick="paginaAjaxDialogo(\'modal2\',\'Agregar Actividad\', {idPi:'+$('#id_pi').val()+', idProducto :'+resp.idProducto+'}, base_url+\'index.php/Mo_Actividad/Insertar\',\'GET\', null, null, false, true);" role="button" class="btn btn-round btn-warning btn-xs"><span class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Agregar Actividad"></span></a></h4><a class="panel-title" id="heading'+resp.idProducto+'" data-toggle="collapse" data-parent="#accordion" href="#collapse'+resp.idProducto+'" aria-expanded="false" aria-controls="collapse'+resp.idProducto+'" style="text-transform: uppercase;">'+replaceAll(replaceAll($('#txtDescripcionProducto').val().trim(), '<', '&lt;'), '>', '&gt;')+'</a></div>';
            	htmlTemp+='<div id="collapse'+resp.idProducto+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+resp.idProducto+'><div class="panel-body"><div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Actividad</th><th>U. Medida</th><th>Meta</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Opciones</th></tr></thead></table></div></div></div></div>';

				$('#accordion').append(htmlTemp);

				$('#txtDescripcionProducto').val('');

            }
		}, false, true);

	}

	function editarActividad(idActividad, idPi)
	{
		paginaAjaxDialogo('modal3', 'Editar Actividad',{ idActividad: idActividad, idPi: idPi}, base_url+'index.php/Mo_Actividad/editar', 'GET', null, null, false, true);
	}

	function eliminarActividad(idActividad, element)
    {
        swal({
            title: "Esta seguro que desea eliminar la actividad?",
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
            paginaAjaxJSON({ "idActividad" : idActividad }, base_url+'index.php/Mo_Actividad/eliminar', 'POST', null, function(resp)
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
    $(function()
	{
		$('#divAgregarProducto').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtDescripcionProducto:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción del producto" es requerido.</b>'
						}
					}
				}
			}
		});		
	});
</script>