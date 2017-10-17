
<form  id="frmValorizacion" action="<?php echo base_url();?>index.php/Expediente_Tecnico/insertar" method="POST">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">		
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Partida</label>
							<div>
								<input class="form-control" name="hdIdDetallePartida" id="hdIdDetallePartida" readonly="readonly" type="hidden" value="<?=$DetallePartida->id_detalle_partida?>"> 	
								<input class="form-control" placeholder="descripcion de Partida" autocomplete="off" readonly="readonly" value="<?=$DetallePartida->desc_partida?>">	
							</div>	
						</div>
					</div>	
					<div class="row" id="validarValorizacion">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<label class="control-label">Fecha: </label>
							<div>
								<input class="form-control" name="txtFecha" id="txtFecha" type="date" autocomplete="off" value="<?=$fecha?>">	
							</div>	
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<label class="control-label">Cantidad Máxima: </label>
							<div>
								<input class="form-control" placeholder="Cantidad" autocomplete="off" value="<?=$DetallePartida->cantidad?>" readonly="readonly" >	
							</div>	
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
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
						<th style="width: 3%" class="col-md-2 col-xs-12">Opciones</th>							
					</tr>
				</thead>
				<tbody>
				<?php foreach ($listaValorizacion as $key => $value) { ?>
					<tr>
						<td><?=(new DateTime($value->fecha_dia))->format('d-m-Y')?></td>
						<td><?=$value->cantidad?></td>
						<td><button type="button" class="btn btn-danger btn-xs" onclick="eliminar('<?=$value->id_det_seg_valorizacion?>');"><i class="fa fa-trash-o"></i> Eliminar</button></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
$(document).ready(function()
{
	$('#tableListaValorizacion').DataTable(
	{
		"language":idioma_espanol
	});

});
$(function()
{
	$('#validarValorizacion').formValidation(
	{
		framework: 'bootstrap',
		excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
		live: 'enabled',
		message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
		trigger: null,
		fields:
		{
			txtCantidad:
			{
				validators:
				{
				
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Cantidad" es requerido.</b>'
					},
					regexp:
					{
						regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
	                    message: '<b style="color: red;">El campo "Cantidad" debe ser un número.</b>'
					}
				}
			},
			txtFecha:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">El campo "Fecha" es requerido.</b>'
					}
				}
			}
		}
	});
});
$('#btnEnviarFormulario').on('click', function(event)
{
    event.preventDefault();
    $('#validarValorizacion').data('formValidation').resetField($('#txtFecha'));
    $('#validarValorizacion').data('formValidation').resetField($('#txtCantidad'));
    $('#validarValorizacion').data('formValidation').validate();
	if(!($('#validarValorizacion').data('formValidation').isValid()))
	{
		return;
	}
    var formData=new FormData($("#frmValorizacion")[0]);
    var dataString = $('#frmValorizacion').serialize();
    $.ajax({
        type:"POST",
        url:base_url+"index.php/Expediente_Tecnico/AsignarValorizacion",
        data: formData,
        cache: false,
        contentType:false,
        processData:false,
        beforeSend: function() 
        {
        	renderLoading();
	    },
        success:function(resp)
        {
        	if (resp=='3') 
            {
                swal("Error","Supero la cantidad máxima requerida para la partida, Ingrese un valor menor", "error");
            }
        	if (resp=='1') 
            {
                swal("Correcto","Se registró correctamente", "success");
            }
            if (resp=='2') 
            {
                swal("Error","Ocurrio un error ", "error");
            }
            paginaAjaxDialogo(null, 'Valorizacion de Partida',{ id_DetallePartida: <?=$DetallePartida->id_detalle_partida?> }, base_url+'index.php/Expediente_Tecnico/AsignarValorizacion', 'GET', null, null, false, true);
  			$('#frmValorizacion')[0].reset();
        }
    });  
});
function eliminar(codigo)
{
	swal(
        {
            title: "Confirmación",
            text: "Realmente desea realizar esta operación",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Consentir proceso",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },
        function(isConfirm)
        {
            if(isConfirm)
            {
                $.ajax({
			        type:"GET",
			        url:base_url+"index.php/Expediente_Tecnico/eliminarValorizacionPartida",
			        data: {idDetSegValorizacion : codigo},
			        cache: false,
			        success:function(resp)
			        {
			        	if (resp=='1') 
			            {
			                swal("Correcto","El registro se eliminó correctamente", "success");
			            }
			            else
			            {
			                swal("Error","Ocurrio un error ", "error");
			            }
			            paginaAjaxDialogo(null, 'Valorizacion de Partida',{ id_DetallePartida: <?=$DetallePartida->id_detalle_partida?> }, base_url+'index.php/Expediente_Tecnico/AsignarValorizacion', 'GET', null, null, false, true);
			        }
			    }); 
            }
        });
}
</script>

