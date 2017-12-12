<form  id="frmInsertarEjecucionActividad">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content" >		
				<div class="row">
					<div class="col-md-12">
						<div id ="divFormEjecucionActividad">
							<input type="hidden" id="hdIdPi" name="hdIdPi" autocomplete="off" class="form-control" value="<?=$idPi?>">
							<input type="hidden" id="hdIdActividad" name="hdIdActividad" autocomplete="off" class="form-control" value="<?=$idActividad?>">
							<div class="row">
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Mes: </label>
									<div>
										<select id="txtMes" name="txtMes" class="form-control selectpicker" data-live-search="true">
											<?php foreach ($meses as $key => $value) { ?>
												<option value="<?=$value?>"><?=$value?></option>
											<?php } ?>
										</select>
									</div>
								</div>	
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Año: </label>
									<div>
										<input type="text" id="txtAnio" name="txtAnio" autocomplete="off" placeholder="____" class="form-control" value="<?= date('Y')?>" maxlength = "4" >
									</div>
								</div>	
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Ejec. Fís. Programada: </label>
									<div>
										<input type="text" id="txtFisica" name="txtFisica" autocomplete="off" class="form-control moneda">
									</div>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<label for="control-label">Ejec. Fín. Programada: </label>
									<div>
										<input type="text" id="txtFinanciera" name="txtFinanciera" autocomplete="off" class="form-control moneda">
									</div>
								</div>							
							</div>							
						</div>
						<div class="row">
							<br><br>
							<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center">
								<input type="button" name="" class="btn btn-success" onclick="guardarEjecucionActividad();" value="Guardar">
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
		$('#divFormEjecucionActividad').formValidation(
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
							message: '<b style="color: red;">El campo "Año" debe ser un número</b>'
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
							regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        	message: '<b style="color: red;">El campo "Ejec. Fís. Programada" debe ser númerico.</b>'                    
						}
					}
				},
				txtFinanciera:
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

	function guardarEjecucionActividad()
	{
		event.preventDefault();
		$('#divFormEjecucionActividad').data('formValidation').validate();
		if(!($('#divFormEjecucionActividad').data('formValidation').isValid()))
		{
			return;
		}
		var formData=new FormData($("#frmInsertarEjecucionActividad")[0]);
		var idActividad=$('#hdIdActividad').val();
		var mes=$('#txtMes').val();
		var ejecucionFisica=$('#txtFisica').val();
		var ejecucionFinanciera=$('#txtFinanciera').val();
		$.ajax({
	        type:"POST",
	        url:base_url+"index.php/Mo_Ejecucion_Actividad/Insertar",
	        data: formData,
	        cache: false,
	        contentType:false,
	        processData:false,
	        success:function(resp)
	        {
	        	resp = JSON.parse(resp);
	        	((resp.proceso=='Correcto') ? swal(resp.proceso,resp.mensaje,"success") : swal(resp.proceso,resp.mensaje,"error"));
	        	if(resp.proceso=='Correcto')
	        	{
	        		var htmlTemp = '<tr><td>'+mes+'</td><td>'+ejecucionFisica+'</td><td>'+ejecucionFinanciera+'</td><td>'+resp.idProgramacion+'</td></tr>';
	        		$('#tbodyActividad'+idActividad).append(htmlTemp);
	        	}	        		        	
	        	$('#frmInsertarEjecucionActividad')[0].reset();
                $('#modalProgramacion').modal('hide');   	
	        }
    	});
	}
</script>