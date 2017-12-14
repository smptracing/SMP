<style>
	li
	{
		list-style:none;
		padding-top:5px;
	}
	ul
	{
		list-style-type: none;
    	margin: 0;
    	padding: 0;

	}
	b
	{
		padding-left: 5px;
	}
	.btnli
	{
		width: 30px;
	}
</style>
<form  id="frmInsertarMonitoreo">
<div class="form-horizontal">
	<div id="divAgregarMonitoreo">
		<input type="hidden" name="hdIdEjecucion" id="hdIdEjecucion" value="<?=$ejecucion->id_ejecucion?>">
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
				<input type="text" class="form-control" id="txtResultado" name="txtResultado" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-4 col-xs-12">
				<label for="control-label">.</label>
				<input type="button" class="btn btn-info" value="Guardar Resultado" onclick="agregarResultado();" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div style="background-color: #f5fbfb; height: 300px;overflow-y: scroll; margin-top: 15px;">
				<ul id="Resultado">
					<?php foreach ($monitoreo as $key => $value) { ?>
					<li>
						<div class="btn-group  btn-group-xs">
	                        <button data-toggle="tooltip" data-placement="top" title="Guardar Resultado" onclick="guardarCambiosMonitoreo('<?=$value->id_monitoreo?>');" class="btn btn-default btnli" type="button">G</button>
	                        <button data-toggle="tooltip" data-placement="top" title="Eliminar Resultado" onclick="eliminarMonitoreo('<?=$value->id_monitoreo?>',this);" class="btn btn-default btnli" type="button">-</button>
	                        <button data-toggle="tooltip" data-placement="top" title="Agregar Observación" onclick="agregarObservacion('<?=$value->id_monitoreo?>',$(this).parent().parent());" class="btn btn-default btnli" type="button">+</button>
                      	</div><b id="descripcionMonitoreo<?=$value->id_monitoreo?>" style="color:#1e8c75;font-size:12px;text-transform:uppercase;" contenteditable><?=$value->desc_monitoreo?></b>
                      	<ul style="padding-left:27px;">
	                    <?php foreach ($value->childObservacion as $key => $observacion) {?>
	                    	<li>
								<div class="btn-group  btn-group-xs">
			                        <button data-toggle="tooltip" data-placement="top" title="Guardar Observación" onclick="guardarCambiosObservacion('<?=$observacion->id_observacion?>');" class="btn btn-default btnli" type="button">G</button>
			                        <button data-toggle="tooltip" onclick="eliminarObservacion('<?=$observacion->id_observacion?>',this);" data-placement="top" title="Eliminar Observación" class="btn btn-default btnli" type="button">-</button>
			                        <button data-toggle="tooltip" data-placement="top" title="Agregar compromiso" onclick="agregarCompromiso('<?=$observacion->id_observacion?>',$(this).parent().parent());" class="btn btn-default btnli" type="button">+</button>
		                      	</div><b id="descripcionObservacion<?=$observacion->id_observacion?>" style="color:#e74c3c;font-size:12px;text-transform: uppercase;" contenteditable><?=$observacion->desc_observacion?></b>
		                      	<ul style="padding-left:57px;">
			                    <?php foreach ($observacion->chilCompromiso as $key => $compromiso) { ?>
			                    	<li>
										<div class="btn-group  btn-group-xs">
					                        <button data-toggle="tooltip" data-placement="top" title="Guardar compromiso" class="btn btn-default btnli"  type="button">G</button>
					                        <button data-toggle="tooltip" data-placement="top" title="Eliminar compromiso" class="btn btn-default btnli" type="button">-</button>
				                      	</div><b id="descripcionCompromiso<?=$compromiso->id_compromiso?>" style="color:#3498db;font-size:12px;text-transform:uppercase;" contenteditable><?=$compromiso->desc_compromiso?></b>
				                    </li>
			                    	
			                    <?php } ?>	                    	
			                    </ul>
		                    </li>		                                        	
	                    <?php } ?>
	                    </ul>
						<?php } ?>
                    </li>
                    					
				</ul>
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

	function agregarResultado()
	{
		event.preventDefault();
		$('#divAgregarMonitoreo').data('formValidation').validate();
		if(!($('#divAgregarMonitoreo').data('formValidation').isValid()))
		{
			return;
		}
		var formData=new FormData($("#frmInsertarMonitoreo")[0]);
		var resultado=$('#txtResultado').val().trim();
		$.ajax({
	        type:"POST",
	        url:base_url+"index.php/Mo_Monitoreo/Insertar",
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
	        		var htmlTemp ='<li><div class="btn-group  btn-group-xs"><button data-toggle="tooltip" data-placement="top" title="Guardar Resultado"  onclick="guardarCambiosMonitoreo('+resp.idMonitoreo+');" class="btn btn-default btnli" type="button">G</button><button data-toggle="tooltip" data-placement="top" title="Eliminar Resultado" class="btn btn-default btnli" type="button">-</button><button  data-toggle="tooltip" data-placement="top" title="Agregar Observación" onclick="agregarObservacion('+resp.idMonitoreo+',$(this).parent().parent());" class="btn btn-default btnli" type="button">+</button></div>';
	        		htmlTemp+='<b id="descripcionMonitoreo'+resp.idMonitoreo+'" style="color:#1e8c75; font-size:12px; text-transform: uppercase;" contenteditable>'+resultado+'</b><ul style="padding-left: 27px;"></ul></li>';
	        		$('#Resultado').append(htmlTemp);
	        	}
	        	((resp.proceso=='Correcto') ? swal(resp.proceso,resp.mensaje,"success") : swal(resp.proceso,resp.mensaje,"error"));	        		        		        	
	        	$('#frmInsertarMonitoreo')[0].reset();
	        }
    	});
	}

	function guardarCambiosMonitoreo(codigoMonitoreo)
	{
		if($('#descripcionMonitoreo'+codigoMonitoreo).text().trim()=='')
		{
			swal(
			{
				title: '',
				text: 'El campo resultado es requerido',
				type: 'error'
			},
			function(){});
			$('#descripcionMonitoreo'+codigoMonitoreo).text('___');
			return;
		}
		paginaAjaxJSON({ "idMonitoreo" : codigoMonitoreo, 'descripcionMonitoreo' : replaceAll(replaceAll($('#descripcionMonitoreo'+codigoMonitoreo).text().trim(), '<', '&lt;'), '>', '&gt;') }, base_url+'index.php/Mo_Monitoreo/editar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$('#descripcionMonitoreo'+codigoMonitoreo).text($('#descripcionMonitoreo'+codigoMonitoreo).text().trim());
		}, false, true);
	}

	function eliminarMonitoreo(codigoMonitoreo, element)
	{
		swal({
            title: "¿Realmente desea proseguir con la operación?",
            text: "",
            type: "warning",
            showCancelButton: true,
            cancelButtonText:"CANCELAR" ,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "SI,ELIMINAR",
            closeOnConfirm: false
        },
        function(){
            paginaAjaxJSON({ "idMonitoreo" : codigoMonitoreo }, base_url+'index.php/Mo_Monitoreo/eliminar', 'POST', null, function(objectJSON)
			{
				objectJSON=JSON.parse(objectJSON);

				swal(
				{
					title: '',
					text: objectJSON.mensaje,
					type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
				},
				function(){});

				$(element).parent().parent().remove();

			}, false, true);
        });
	}

	function agregarObservacion(codigoMonitoreo,elementoPadre)
	{
		swal({
			title: "",
			text: "Agregar Observación",
			type: "input",
			showCancelButton: true,
			cancelButtonText:"CERRAR",
			confirmButtonText: "ACEPTAR",
			closeOnConfirm: false,
		 	inputPlaceholder: ""
		}, function (inputValue)
		{
		  	if (inputValue === false) return false;
		  	if (inputValue === "") 
		  	{
		    	swal.showInputError("Observación es un campo requerido");
		    	return false
		  	}

			paginaAjaxJSON({ "idMonitoreo" : codigoMonitoreo, "descripcionObservacion" : inputValue}, base_url+'index.php/Mo_Observacion/insertar', 'POST', null, function(objectJSON)
			{
				objectJSON=JSON.parse(objectJSON);

				swal(
				{
					title: '',
					text: objectJSON.mensaje,
					type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
				},
				function(){});

				if(objectJSON.proceso=='Error')
				{
					return false;
				}

				var htmlTemp='<li><div class="btn-group  btn-group-xs"><button data-toggle="tooltip" data-placement="top" title="Guardar Observación" onclick="guardarCambiosObservacion('+objectJSON.idObservacion+');" class="btn btn-default btnli" type="button">G</button><button data-toggle="tooltip" data-placement="top" title="Eliminar Observación" onclick="eliminarObservacion('+objectJSON.idObservacion+',this);" class="btn btn-default btnli" type="button">-</button><button data-toggle="tooltip" data-placement="top" title="Agregar compromiso" class="btn btn-default btnli" type="button">+</button></div>';
				htmlTemp+='<b id="descripcionObservacion'+objectJSON.idObservacion+'" style="color:#e74c3c; font-size:12px; text-transform:uppercase;" contenteditable>'+inputValue+'</b>'
					'<ul style="padding-left:57px;"></ul></li>';

				$($(elementoPadre).find('ul')[0]).append(htmlTemp);
			}, false, true);
		});
	}

	function guardarCambiosObservacion(codigoObservacion)
	{
		if($('#descripcionObservacion'+codigoObservacion).text().trim()=='')
		{
			swal(
			{
				title: '',
				text: 'El campo observación es requerido',
				type: 'error'
			},
			function(){});
			$('#descripcionObservacion'+codigoObservacion).text('___');
			return;
		}
		paginaAjaxJSON({ "idObservacion" : codigoObservacion, 'descripcionObservacion' : replaceAll(replaceAll($('#descripcionObservacion'+codigoObservacion).text().trim(), '<', '&lt;'), '>', '&gt;') }, base_url+'index.php/Mo_Observacion/editar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$('#descripcionObservacion'+codigoObservacion).text($('#descripcionObservacion'+codigoObservacion).text().trim());
		}, false, true);
	}

	function eliminarObservacion(codigoObservacion, element)
	{
		swal({
            title: "¿Realmente desea eliminar esta observación con los compromisos respectivos?",
            text: "",
            type: "warning",
            showCancelButton: true,
            cancelButtonText:"CANCELAR" ,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "SI,ELIMINAR",
            closeOnConfirm: false
        },
        function(){
            paginaAjaxJSON({ "idObservacion" : codigoObservacion }, base_url+'index.php/Mo_Observacion/eliminar', 'POST', null, function(objectJSON)
			{
				objectJSON=JSON.parse(objectJSON);

				swal(
				{
					title: '',
					text: objectJSON.mensaje,
					type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
				},
				function(){});

				$(element).parent().parent().remove();

			}, false, true);
        });
	}

	function agregarCompromiso(codigoObservacion,elementoPadre)
	{
		swal({
			title: "",
			text: "Agregar Compromiso",
			type: "input",
			showCancelButton: true,
			cancelButtonText:"CERRAR",
			confirmButtonText: "ACEPTAR",
			closeOnConfirm: false,
		 	inputPlaceholder: ""
		}, function (inputValue)
		{
		  	if (inputValue === false) return false;
		  	if (inputValue === "") 
		  	{
		    	swal.showInputError("Compromiso es un campo requerido");
		    	return false
		  	}

			paginaAjaxJSON({ "idObservacion" : codigoObservacion, "descripcionCompromiso" : inputValue}, base_url+'index.php/Mo_Compromiso/insertar', 'POST', null, function(objectJSON)
			{
				objectJSON=JSON.parse(objectJSON);

				swal(
				{
					title: '',
					text: objectJSON.mensaje,
					type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
				},
				function(){});

				if(objectJSON.proceso=='Error')
				{
					return false;
				}

				var htmlTemp='<li><div class="btn-group  btn-group-xs"><button data-toggle="tooltip" data-placement="top" title="Guardar compromiso" class="btn btn-default btnli"  type="button">G</button><button data-toggle="tooltip" data-placement="top" title="Eliminar compromiso" class="btn btn-default btnli" type="button">-</button></div>';
				htmlTemp+='<b id="descripcionCompromiso'+objectJSON.idCompromiso+'" style="color:#3498db; font-size:12px; text-transform:uppercase;" contenteditable>'+inputValue+'</b></li>';

				$($(elementoPadre).find('ul')[0]).append(htmlTemp);
			}, false, true);
		});
	}

</script>