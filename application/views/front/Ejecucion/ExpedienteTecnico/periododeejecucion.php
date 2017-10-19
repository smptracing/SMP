<style>
	.row
	{
		margin-top: 4px;
	}
</style>

<form class="form-horizontal" id="frmAgregarPeriodo" action="<?php echo base_url();?>index.php/Expediente_Tecnico/editar" method="POST">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class="row">
						<input type="hidden" class="form-control" name="hdIdEt" id="hdIdEt" value="<?=$ExpedienteTecnico->id_et?>">	
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Fecha de Inicio:</label>
							<div>
								<input type="date" class="form-control" name="txtFechaInicio" id="txtFechaInicio" value="<?=(new DateTime($ExpedienteTecnico->fecha_inicio_et))->format('Y-m-d')?>">	
							</div>	
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Fecha Fin:</label>
							<div>
								<input type="date" name="txtFechaFin" class="form-control" id="txtFechaFin" value="<?=(new DateTime($ExpedienteTecnico->fecha_fin_et))->format('Y-m-d')?>" >
							</div>	
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Numero de Meses:</label>
							<div>
								<input type="text" readonly="readonly" class="form-control" value="<?=$ExpedienteTecnico->num_meses?> meses"  >
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="row" style="text-align: right;">
		<button type="submit" id="btnEnviarFormulario" class="btn btn-success">Guardar</button>
		<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	</div>
</form>
<script>
	$(function()
	{
		$('#frmAgregarPeriodo').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtFechaInicio:
				{
					validators:
					{					
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Fecha de Inicio" es requerido.</b>'
						}
					}
				},
				txtFechaFin:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Fecha de Finalizacion" es requerido.</b>'
						}
					}
				}
			}
		});
	});
    $('#btnEnviarFormulario').on('click', function(event)
   	{
            event.preventDefault();
            $('#frmAgregarPeriodo').data('formValidation').resetField($('#txtFechaInicio'));
            $('#frmAgregarPeriodo').data('formValidation').resetField($('#txtFechaFin'));
            $('#frmAgregarPeriodo').data('formValidation').validate();
			if(!($('#frmAgregarPeriodo').data('formValidation').isValid()))
			{
				return;
			}
            var formData=new FormData($("#frmAgregarPeriodo")[0]);
            var dataString = $('#frmAgregarPeriodo').serialize();
            $.ajax({
                type:"POST",
                url:base_url+"index.php/Expediente_Tecnico/PeriodoEjecucion",
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
                	if (resp=='1') 
	                {
	                    swal("Correcto","Se registró correctamente", "success");
	                }
	                if (resp=='2') 
	                {
	                    swal("Error","Ocurrio un error ", "error");
	                }
                    window.location.href=base_url+"index.php/Expediente_Tecnico/verdetalle/"+<?= $ExpedienteTecnico->id_et?>;
                }
            });
          $('#frmAsignarOrden')[0].reset();
    });
	
</script>






