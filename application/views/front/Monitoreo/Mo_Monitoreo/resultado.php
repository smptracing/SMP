<div class="form-horizontal">
	<div id="divAgregarMonitoreo">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label for="control-label">Actividad:</label>
				<div>
					<input type="text" autocomplete="off" value="<?=$actividad?>" class="form-control" readonly>				
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label for="control-label">Mes:</label>
				<div>
					<input value="<?=$ejecucion->mes_ejec?>" type="text" autocomplete="off" class="form-control" readonly>
				</div>
			</div>							
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label for="control-label">Ejec. Fis. Programado:</label>
				<div>
					<input type="text" value="<?=$ejecucion->ejec_fisic_prog?>" autocomplete="off" class="form-control" readonly>				
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label for="control-label">Ejec. Fis. Real:</label>
				<div>
					<input type="text" value="<?=$ejecucion->ejec_fisic_real?>" id="txtEjFisReal" name="txtEjFisReal" autocomplete="off" class="form-control">
				</div>
			</div>	
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label for="control-label">Ejec. Fin. Programado:</label>
				<div>
					<input type="text" readonly value="<?=a_number_format($ejecucion->ejec_finan_prog, 2, '.',",",3)?>" autocomplete="off" class="form-control">
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label for="control-label">Ejec. Fin. Real:</label>
				<div>
					<input type="text" value="<?=a_number_format($ejecucion->ejec_finan_real, 2, '.',",",3) ?>" id="txtEjFinReal" name="txtEjFinReal" autocomplete="off" class="form-control moneda">
				</div>
			</div>							
		</div>
		<div class="row">
			<div class="col-md-9 col-sm-8 col-xs-12">
				<label for="control-label">Resultado:</label>
				<input type="text" class="form-control" id="txtResultado" name="txtResultado">
			</div>
			<div class="col-md-3 col-sm-4 col-xs-12">
				<label for="control-label">.</label>
				<input type="button" class="btn btn-info" value="Guardar Resultado" onclick="agregarProducto();" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row" style="height: 300px;overflow-y: scroll; margin-top: 15px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">           	
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

	$(function()
	{
		$('#divAgregarMonitoreo').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtEjFisReal:
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
				txtEjFinReal:
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
				},
				txtResultado:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Ejec. Fin. Programada" es requerido.</b>'
						}
					}
				}
			}
		});		
	});

	$('#nuevoProducto').on('hidden.bs.modal', function(){
	    window.location.href=base_url+'Mo_MonitoreodeProyectos/index';
	});
</script>