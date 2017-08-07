<style>
	.row
	{
		margin-top: 4px;
	}
</style>
<script src="ckeditor/ckeditor.js"></script>
<form class="form-horizontal" id="form-addExpedienteTecnico" action="<?php echo base_url();?>index.php/Expediente_Tecnico/insertar" method="POST" enctype="multipart/form-data" >

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="x_content">
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre de la Unidad Ejecutora</label>
							<div>
								<input id="txtIdPi" name="txtIdPi" value="<?= $Listarproyectobuscado->id_pi?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" autocomplete="off"  type="hidden">	
								<input id="txtNombreUe" name="txtNombreUe" value="<?= $Listarproyectobuscado->nombre_ue?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" required="required" autocomplete="off" >	
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Dirección</label>
							<div>
								<input id="txtDireccionUE" name="txtDireccionUE" value="" class="form-control col-md-4 col-xs-12"  placeholder="Dirección"  autocomplete="off" >	
							</div>	
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Distrito/Provincia/Departamento</label>
							<div>
								<input id="txtUbicacionUE" name="txtUbicacionUE" value="" class="form-control col-md-4 col-xs-12"  placeholder="Distrito/Provincia/Departamento" autocomplete="off" >	
							</div>	
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Teléfono</label>
							<div>
								<input id="txtTelefonoUE" name="txtTelefonoUE" value="" class="form-control col-md-4 col-xs-12"  placeholder="Teléfono"  autocomplete="off" >	
							</div>	
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">RUC</label>
							<div>
								<input id="txtRuc" name="txtRuc" value="" class="form-control col-md-4 col-xs-12"  placeholder="RUC"  autocomplete="off" >	
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del Proyecto</label>
							<div>
								<input id="txtNombrePip" name="txtNombrePip" value="<?= $Listarproyectobuscado->nombre_pi?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" required="required" autocomplete="off" readonly="readonly">
							</div>	
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Ubicación donde se plantea su Ejecución</label>
							<div>
								<input id="txtUbicacionPip" name="txtUbicacionPip" value="<?= $Listarproyectobuscado->provincia ?>" class="form-control col-md-4 col-xs-12"  placeholder="Ubicación" autocomplete="off" readonly="readonly">
							</div>
						</div>

						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Codigo SNIP</label>
							<div>
								<input id="txtCodigoUnico" name="txtCodigoUnico" value="<?= $Listarproyectobuscado->codigo_unico_pi ?>" class="form-control col-md-4 col-xs-12"  placeholder="Código SNIP" autocomplete="off" readonly="readonly">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Total del Proyecto (Pre Inversión)</label>
							<div>
								<input id="txtCostoTotalPreInversion" name="txtCostoTotalPreInversion" value="<?= $Listarproyectobuscado->costo_total_preinv_et?>"  class="form-control col-md-4 col-xs-12"  placeholder="Total del Proyecto (Pre Inversión)" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Directo</label>
							<div>
								<input id="txtCostoDirectoPre" name="txtCostoDirectoPre" class="form-control col-md-4 col-xs-12"  placeholder="Costo Directo"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Indirecto</label>
							<div>
								<input id="txtCostoIndirectoPre" name="txtCostoIndirectoPre" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto"  autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Costo Total del Proyecto (Inversión)</label>
							<div>
								<input id="txtCostoTotalInversion" name="txtCostoTotalInversion" value="<?= $Listarproyectobuscado->costo_total_inv_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Costo Total del Proyecto (Inversión)"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Costo Directo</label>
							<div>
								<input id="txtCostoDirectoInversion" name="txtCostoDirectoInversion" class="form-control col-md-4 col-xs-12"  placeholder="Costo Directo"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Gastos generales</label>
							<div>
								<input id="txtGastosGenerales" name="txtGastosGenerales" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Gastos de supervisión</label>
							<div>
								<input id="txtGastosSupervision" name="txtGastosSupervision" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Funcion Programatica</label>
							<div>
								<input id="txtFuncionProgramatica" name="txtFuncionProgramatica" class="form-control col-md-4 col-xs-12"  placeholder="Funcion Programatica" required="required" autocomplete="off" >
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Funcion</label>
							<div>
								<input id="txtFuncion" name="txtFuncion" class="form-control col-md-4 col-xs-12" value="<?= $Listarproyectobuscado->nombre_funcion?>"  placeholder="Funcion" required="required" autocomplete="off" readonly="readonly">
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Programa</label>
							<div>
								<input id="txtPrograma" name="txtPrograma" class="form-control col-md-4 col-xs-12" value="<?= $Listarproyectobuscado->nombre_div_funcional?>" placeholder="Programa" required="required" autocomplete="off" readonly="readonly">
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Sub Programa</label>
							<div>
								<input id="txtSubPrograma" name="txtSubPrograma" class="form-control col-md-4 col-xs-12" value="<?= $Listarproyectobuscado->nombre_grup_funcional?>" placeholder="Sub Programa" required="required" autocomplete="off" readonly="readonly">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Proyecto</label>
							<div>
								<input id="txtProyecto" name="txtProyecto" class="form-control col-md-4 col-xs-12"  placeholder="Proyecto" required="required" autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Componente</label>
							<div>
								<input id="txtComponente" name="txtComponente" class="form-control col-md-4 col-xs-12"  placeholder="Componente" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Meta</label>
							<div>
								<input id="txtMeta" name="txtMeta" class="form-control col-md-4 col-xs-12"  placeholder="Meta" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Fuente de financiamiento</label>
							<div>
								<input id="txtFuenteFinanciamiento" name="txtFuenteFinanciamiento" class="form-control col-md-4 col-xs-12"  placeholder="Fuente de financiamiento" required="required" autocomplete="off" >
							</div>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Modalidad de Ejecución</label>
							<div>
								<input id="txtModalidadEjecucion" name="txtModalidadEjecucion"  value="" class="form-control col-md-4 col-xs-12"  placeholder="Modalidad de Ejecución" required="required" autocomplete="off" >
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Tiempo de Ejecución del Proyecto</label>
							<div>
								<input id="txtTiempoEjecucionPip" name="txtTiempoEjecucionPip" value="<?= $Listarproyectobuscado->tiempo_ejecucion_pi_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Tiempo de Ejecución" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Número de beneficiarios indirectos del proyecto</label>
							<div>
								<input id="txtNumBeneficiarios" name="txtNumBeneficiarios" value="" class="form-control col-md-4 col-xs-12"  placeholder="Número de beneficiarios indirectos" required="required" autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="row">
					 	<div class="col-md-4 col-sm-3 col-xs-12">
                            <label class="control-label">Subir Resolución</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file" id="Documento_Resolucion" name="Documento_Resolucion">
                                </div>
                        </div>
						<!--<div class="col-md-8 col-sm-3 col-xs-12">
							<label class="control-label">Url Documento de aprobacion</label>
							<div>
								<input id="txtUrlDocAprobacion" name="txtUrlDocAprobacion" class="form-control col-md-4 col-xs-12"  placeholder="Responable de la Elaboración del Proyecto" required="required" autocomplete="off" >
							</div>
						</div>-->
					</div>
					<div class="row">
						<div class="col-md-5 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del Responsable de la Elaboración del Proyecto</label>
							<select  id="txtResponsableElaboracion" name="txtResponsableElaboracion" class="form-control col-md-2 col-xs-2">
									<?php foreach($listarPersona as $item){ ?>
										<option value="<?=$item->id_persona; ?>"><?= $item->nombreCompleto;?></option>
									<?php } ?>
								</select>
							<div>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Profesión</label>
							<div>
								<input id="txtProfesion" name="txtProfesion" class="form-control col-md-4 col-xs-12"  placeholder="Profesión" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">DNI</label>
							<div>
								<input id="txtDNI" name="txtDNI" class="form-control col-md-4 col-xs-12"  placeholder="DNI" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Registro Profesional N°</label>
							<div>
								<input id="txtRegistroProfesional" name="txtRegistroProfesional" class="form-control col-md-4 col-xs-12"  placeholder="Registro Profesional" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8 col-sm-3 col-xs-12">
							<label class="control-label">Direccion</label>
							<div>
								<input id="txtDireccionElaborador" name="txtDireccionElaborador" class="form-control col-md-4 col-xs-12"  placeholder="Dirección" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Teléfono</label>
							<div>
								<input id="txtTelefElaborador" name="txtTelefElaborador" class="form-control col-md-4 col-xs-12"  placeholder="Teléfono" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-5 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del Responsable de la Ejecución del Proyecto</label>
								<select  id="txtResponsableEjecucion" name="txtResponsableEjecucion" class="form-control col-md-2 col-xs-2">
									<?php foreach($listarPersona as $item){ ?>
										<option value="<?=$item->id_persona; ?>"><?= $item->nombreCompleto;?></option>
									<?php } ?>
								</select>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Profesión</label>
							<div>
								<input id="txtProfesionEjecutor" name="txtProfesionEjecutor" class="form-control col-md-4 col-xs-12"  placeholder="Profesión" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">DNI</label>
							<div>
								<input id="txtDNIEjecutor" name="txtDNIEjecutor" class="form-control col-md-4 col-xs-12"  placeholder="DNI" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Registro Profesional N°</label>
							<div>
								<input id="txtRegistroProEjecutor" name="txtRegistroProEjecutor" class="form-control col-md-4 col-xs-12"  placeholder="Registro Profesional" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8 col-sm-3 col-xs-12">
							<label class="control-label">Direccion</label>
							<div>
								<input id="txtDireccionEjecutor" name="txtDireccionEjecutor" class="form-control col-md-4 col-xs-12"  placeholder="Dirección" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Teléfono</label>
							<div>
								<input id="txtTelefonoEjecutor" name="txtTelefonoEjecutor" class="form-control col-md-4 col-xs-12"  placeholder="Teléfono" required="required" autocomplete="off" >
							</div>
						</div>

					</div></br>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label">Sustento para la presentacion del proyecto</label></br>
							<p><textarea name="txtSituacioActual" id="txtSituacioActual" rows="10" cols="80"></textarea></p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label">Relevancia Economica</label></br>
							<p><textarea name="txtSituacioDeseada" id="txtSituacioDeseada" rows="10" cols="80"></textarea></p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label">Resumen del proyecto (Descripción)</label></br>
							<p><textarea name="txtContribucioInterv" id="txtContribucioInterv" rows="10" cols="80"></textarea></p>
						</div>	
					</div>
						
					<div class="row">
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Número de folios</label>
							<div>
								<input id="txtNumFolio" name="txtNumFolio" class="form-control col-md-4 col-xs-12"  placeholder="Número de folios" required="required" autocomplete="off" >
							</div>
						</div>	
					</div>		
				</div>

			</div>
		</div>
	</div>

	
	<div class="ln_solid"></div>
		<div class="row" style="text-align: right;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-success">Guardar</button>
			<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>
 <script>
 CKEDITOR.replace('txtSituacioActual' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
	});
 CKEDITOR.replace('txtSituacioDeseada' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
	});
  CKEDITOR.replace('txtContribucioInterv' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
	});

$(function()
	{
		$('#form-addExpedienteTecnico').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
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
					
							regexp:
						{
							regexp: /^\d*$/,
							message: '<b style="color: red;">El campo "Teléfono" debe ser un numero.</b>'
						}
					}
				},
				txtRuc:
				{
					validators:
					{
							regexp:
						{
							regexp: "^([0-9]){11}$",
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
							message: '<b style="color: red;">El campo "Costo U." debe ser un valor en soles.</b>'
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
							message: '<b style="color: red;">El campo "Costo U." debe ser un valor en soles.</b>'
						}
					}
				},
				txtGastosGenerales:
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
							message: '<b style="color: red;">El campo "Costo U." debe ser un valor en soles.</b>'
						}
					}
				},
				txtGastosSupervision:
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
							message: '<b style="color: red;">El campo "Costo U." debe ser un valor en soles.</b>'
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
				txtNumBeneficiarios:
				{
					validators:
					{
						regexp:
						{
							regexp: /^\d*$/,
							message: '<b style="color: red;">El campo "Numero de beneficiarios" debe ser un numero.</b>'
						}
					}
				},
				txtNumFolio:
				{
					validators:
					{
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



</script>






