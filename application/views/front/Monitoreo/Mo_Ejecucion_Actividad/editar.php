<form  id="frmEditarEjecucionActividad">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content" >		
				<div class="row">
					<div class="col-md-12">
						<div id ="divFormEditarEjecucionActividad">
							<input type="hidden" id="hdIdActividad" name="hdIdActividad" autocomplete="off" class="form-control" value="<?=$programacion->id_actividad?>">
							<input type="hidden" id="hdIdEjecucion" name="hdIdEjecucion" autocomplete="off" class="form-control" value="<?=$programacion->id_ejecucion?>">
							<div class="row">
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Mes: </label>
									<div>
										<select id="txtMes" name="txtMes" class="form-control selectpicker" data-live-search="true">
											<?php foreach ($meses as $key => $value) { ?>
												<option value="<?=$value?>" <?php echo ($programacion->mes_ejec==$value ? 'selected':'')?>><?=$value?></option>
											<?php } ?>
										</select>
									</div>
								</div>	
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Año: </label>
									<div>
										<input type="text" id="txtAnio" name="txtAnio" autocomplete="off" placeholder="____" class="form-control" value="<?=$programacion->anio_ejec?>" maxlength = "4" >
									</div>
								</div>	
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Ejec. Fís. Programada: </label>
									<div>
										<input type="text" id="txtFisica" name="txtFisica" autocomplete="off" class="form-control" value="<?=$programacion->ejec_fisic_prog?>" >
									</div>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Ejec. Fín. Programada: </label>
									<div>
										<input type="text" id="txtFinanc" name="txtFinanc" autocomplete="off" class="form-control moneda" value="<?=a_number_format($programacion->ejec_fisic_prog, 2, '.',",",3)?>">
									</div>
								</div>							
							</div>							
						</div>
						<div class="row">
							<br><br>
							<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center">
								<input type="button" name="" class="btn btn-success" onclick="guardarEdicionEjecucionActividad();" value="Guardar">
								<button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar ventana</button>
							</div>	
						</div>
					</div>					
				</div>
			</div>				
		</div>
	</div>
</div>
</form>
<script>

	$(".moneda").keyup(function(e)
	{
	    $(this).val(format($(this).val()));
	});

	var format = function(num)
	{
	    var str = num.replace("", ""), parts = false, output = [], i = 1, formatted = null;
	    if(str.indexOf(".") > 0)
	    {
	        parts = str.split(".");
	        str = parts[0];
	    }
	    str = str.split("").reverse();
	    for(var j = 0, len = str.length; j < len; j++)
	    {
	        if(str[j] != ",")
	        {
	            output.push(str[j]);
	            if(i%3 == 0 && j < (len - 1))
	            {
	                output.push(",");
	            }
	            i++;
	        }
	    }
	    formatted = output.reverse().join("");
	    return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
	};

	$('.selectpicker').selectpicker({
	});

	$(function()
	{
		$('#divFormEditarEjecucionActividad').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message:'<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor</b>',
			trigger: null,
			fields:
			{
				txtMes:
				{
					validators:
					{				
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Mes" es requerido.</b>'
						}
					}
				},
				txtAnio:
				{
					validators:
					{				
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Año" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^[0-9]{4}$/,
							message: '<b style="color: red;">El campo "Año" debe ser un número de cuatro dígitos</b>'
						}
					}
				},
				txtFisica:
				{
					validators:
					{				
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Ejec. Fís. Programada" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
                        	message: '<b style="color: red;">El campo "Ejec. Fís. Programada" debe ser númerico.</b>'                    
						}
					}
				},
				txtFinanc:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Ejec. Fin. Programada" es requerido.</b>'
						},
						regexp:
						{
							regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        	message: '<b style="color: red;">El campo "Ejec. Fin. Programada" debe ser númerico.</b>'                    
						}
					}
				}
			}
		});
	});

	function guardarEdicionEjecucionActividad()
	{
		event.preventDefault();
		$('#divFormEditarEjecucionActividad').data('formValidation').validate();
		if(!($('#divFormEditarEjecucionActividad').data('formValidation').isValid()))
		{
			return;
		}
		var formData=new FormData($("#frmEditarEjecucionActividad")[0]);
		var idEjecucion=$('#hdIdEjecucion').val();
		var mes=$('#txtMes').val();
		var ejecucionFisica=$('#txtFisica').val();
		var ejecucionFinanciera=$('#txtFinanc').val();
		$.ajax({
	        type:"POST",
	        url:base_url+"index.php/Mo_Ejecucion_Actividad/editar",
	        data: formData,
	        cache: false,
	        contentType:false,
	        processData:false,
	        success:function(resp)
	        {
                resp = JSON.parse(resp);
	        	if(resp.proceso=='Correcto')
	        	{
	        		var currentRow = $("#trProgramacion"+idEjecucion);			
					currentRow.find("td:eq(0)").text(mes);
					currentRow.find("td:eq(1)").text(ejecucionFisica);
					currentRow.find("td:eq(2)").text(ejecucionFinanciera);
	        	}
	        	((resp.proceso=='Correcto') ? swal(resp.proceso,resp.mensaje,"success") : swal(resp.proceso,resp.mensaje,"error"));	        		        		        	
	        	$('#frmEditarEjecucionActividad')[0].reset();
                $('#editarProgramacion').modal('hide');     	
	        }
    	});
	}
</script>