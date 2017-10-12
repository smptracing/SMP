
<form  id="form-addExpedienteTecnico"   action="<?php echo base_url();?>index.php/Expediente_Tecnico/insertar" method="POST" enctype="multipart/form-data" >

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<!--<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del proyecto</label>
							<div>
								<input id="txtIdPi" name="txtIdPi" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" autocomplete="off"  type="hidden">	
								<input id="txtNombre" name="txtNombre" class="form-control col-md-4 col-xs-12" placeholder="Nombre del proyecto"  autocomplete="off" readonly="readonly" value="<?= $partida->nombre_pi?>" >	
							</div>	
						</div>
					</div>-->
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Partida</label>
							<div>
								<input class="form-control" placeholder="descripcion de Partida" autocomplete="off" readonly="readonly" value="<?= $partida->desc_partida?>">	
							</div>	
						</div>
					</div>	
					<br>
					<div class="row">
						<div class="col-md-3">
							<label class="control-label">Ingrese Nro de Orden</label>
							<div>
								<button onclick="BuscarOrden();" class="btn btn-primary">Buscar</button>
							</div>	
							
						</div>						
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-12 col-xs-12">
							<label class="control-label">Numero de Orden</label>
							<div>
								<input class="form-control"  placeholder="Número de Orden "  autocomplete="off">	
							</div>	
						</div>
						<div class="col-md-9 col-sm-12 col-xs-12">
							<label class="control-label">Concepto</label>
							<div>
								<input class="form-control"  placeholder="Concepto"  autocomplete="off">	
							</div>	
						</div>
					</div>					
				</br>
				</div>
				
			</div>
		</div>
	</div>
	<div class="ln_solid"></div>
	<div class="row" style="text-align: right;">
		<button  id="btnEnviarFormulario" class="btn btn-success">Guardar</button>
		<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	</div>
</form>
<script>
function BuscarOrden()
{
	swal({
	  title: "Buscar",
	  text: "Proyecto: Ingrese Nro de Orden",
	  type: "input",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  inputPlaceholder: "Ingrese Nro de Orden"
	}, function (inputValue) {
	
	if (inputValue === "")
	  {
	  	swal.showInputError("Ingresar codigo!");
    	return false
	  }
	 else 
	 {
			/*event.preventDefault();
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
			});*/
		}

	});
}
/*
$(function()
	{
		CKEDITOR.replace('txtSituacioActual' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
		});
		CKEDITOR.replace('txtSituacioEconomica' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
		});
		CKEDITOR.replace('txtResumenProyecto' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
		});

		$('#form-addExpedienteTecnico').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtDireccionUE:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Dirección UE." es requerido.</b>'
						}
					}
				},
				txtUbicacionUE:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Ubicación UE." es requerido.</b>'
						}
					}
				},
				txtNombreUe:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Nombre unidad ejecutora" es requerido.</b>'
						}
					}
				},
				txtTelefonoUE:
				{
					validators:
					{
					
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Teléfono" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^[0-9]+$/,
							message: '<b style="color: red;">El campo "Teléfono" debe ser un numero.</b>'
						}
					}
				},
				txtRuc:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Ruc" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^([0-9]){11}$/,
							message: '<b style="color: red;">El campo "Ruc" debe ser un número de 11 dígitos.</b>'
						}
					}
				},
				txtCostoTotalPreInversion:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Costo total de preinversion" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
							message: '<b style="color: red;">El campo "Costo U." debe ser un valor en soles.</b>'
						}
					}
				},
				txtCostoDirectoPre:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Costo Directo de preinversion" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
							message: '<b style="color: red;">El campo "Costo U." debe ser un valor en soles.</b>'
						}
					}
				},
				txtCostoIndirectoPre:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Costo Indirecto de preinversion" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
							message: '<b style="color: red;">El campo "Costo U." debe ser un valor en soles.</b>'
						}
					}
				},
				txtCostoTotalInversion:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Costo total de Inversión" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
							message: '<b style="color: red;">El campo "Costo total de Inversión" debe ser un valor en soles.</b>'
						}
					}
				},
				txtCostoDirectoInversion:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Costo Directo de Inversión" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
							message: '<b style="color: red;">El campo "Costo Directo de Inversión" debe ser un valor en soles.</b>'
						}
					}
				},
				txtGastosGenerales:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Costo General" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
							message: '<b style="color: red;">El campo "Costo General." debe ser un valor en soles.</b>'
						}
					}
				},
				txtGastosSupervision:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Gastos de supervisión" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
							message: '<b style="color: red;">El campo "Gastos de supervisión" debe ser un valor en soles.</b>'
						}
					}
				},
				txtFuncionProgramatica:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Función Programatica" es requerido.</b>'
						}
					}
				},
				txtProyecto:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Proyecto" es requerido.</b>'
						}
					}
				},
				txtComponente:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Componente" es requerido.</b>'
						}
					}
				},
				txtMeta:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Meta" es requerido.</b>'
						}
					}
				},
				txtNumBeneficiarios:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Numero de beneficiarios" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^\d*$/,
							message: '<b style="color: red;">El campo "Numero de beneficiarios" debe ser un numero.</b>'
						}
					}
				},
				txtFuenteFinanciamiento:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Fuente Financiamiento" es requerido.</b>'
						}
					}
				},
				txtModalidadEjecucion:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Modalidad de Ejecución" es requerido.</b>'
						}
					}
				},
				txtTiempoEjecucionPip:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Titmpo de ejecución" es requerido.</b>'
						}
					}
				},
				txtNumFolio:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Numero de folios" es requerido.</b>'
						},
						regexp:
						{
							regexp: /^\d*$/,
							message: '<b style="color: red;">El campo "Numero de folios" debe ser un número.</b>'
						}
					}
				}
			}
		});
	});
    $('#btnEnviarFormulario').on('click', function(event)
   	{
            event.preventDefault();
            $('#form-addExpedienteTecnico').data('formValidation').validate();
			if(!($('#form-addExpedienteTecnico').data('formValidation').isValid()))
			{
				return;
			}
			var extension=$("#Documento_Resolucion").val();
            var url=getFileExtension(extension);
            $("#url").val(url);

            $("#hdtxtSituacioActual").val(CKEDITOR.instances.txtSituacioActual.getData());
            $("#hdtxtSituacioEconomica").val(CKEDITOR.instances.txtSituacioEconomica.getData());
            $("#hdtxtResumenProyecto").val(CKEDITOR.instances.txtResumenProyecto.getData());

            var formData=new FormData($("#form-addExpedienteTecnico")[0]);
            var dataString = $('#form-addExpedienteTecnico').serialize();
            $.ajax({
                type:"POST",
                enctype: 'multipart/form-data',
                url:base_url+"index.php/Expediente_Tecnico/insertar",
                data: formData,
                cache: false,
                contentType:false,
                processData:false,
                beforeSend: function() {
                	renderLoading();
			    },
                success:function(resp)
                {
                  	//console.log(resp);
                    window.location.href=base_url+"index.php/Expediente_Tecnico/"
                }
            });
          $('#form-addExpedienteTecnico')[0].reset();
    });

    function getFileExtension(filename)
    {

		return filename.slice((filename.lastIndexOf(".") - 2 >>> 0) + 2);

	}
			  */
</script>






