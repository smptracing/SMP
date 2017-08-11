<style>
	.row
	{
		margin-top: 4px;
	}
</style>

<form class="form-horizontal" id="form-EditarExpedienteTecnico" action="<?php echo base_url();?>index.php/Expediente_Tecnico/editar" method="POST" enctype="multipart/form-data" >

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="x_content">
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre de la Unidad Ejecutora</label>
							<div>
								<input id="hdIdExpediente" name="hdIdExpediente" value="<?= $ExpedienteTecnicoM->id_et?>" class="form-control col-md-4 col-xs-12" placeholder="" autocomplete="off"  type="hidden">	
								<input id="txtNombreUe" name="txtNombreUe" value="<?= $ExpedienteTecnicoM->nombre_ue?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre de la unidad ejecutora" autocomplete="off" >	
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Dirección</label>
							<div>
								<input id="txtDireccionUE" name="txtDireccionUE" value="<?= $ExpedienteTecnicoM->direccion_ue?>" class="form-control col-md-4 col-xs-12"  placeholder="Dirección"  autocomplete="off" >	
							</div>	
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Distrito/Provincia/Departamento</label>
							<div>
								<input id="txtUbicacionUE" name="txtUbicacionUE" value="<?= $ExpedienteTecnicoM->distrito_provincia_departamento_ue?>" class="form-control col-md-4 col-xs-12"  placeholder="Distrito/Provincia/Departamento" autocomplete="off" >	
							</div>	
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Teléfono</label>
							<div>
								<input id="txtTelefonoUE" name="txtTelefonoUE" value="<?= $ExpedienteTecnicoM->telefono_ue?>" class="form-control col-md-4 col-xs-12"  placeholder="Teléfono"  autocomplete="off" >	
							</div>	
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">RUC</label>
							<div>
								<input id="txtRucUE" name="txtRucUE" value="<?= $ExpedienteTecnicoM->ruc_ue?>" class="form-control col-md-4 col-xs-12"  placeholder="RUC"  autocomplete="off" >	
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del Proyecto</label>
							<div>
								<input id="txtNombrePip" name="txtNombrePip" value="<?= $ExpedienteTecnicoM->nombre_pi?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" required="required" autocomplete="off" readonly="readonly">
							</div>	
						</div>
					</div>
				
					<div class="row">
				

						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Codigo SNIP</label>
							<div>
								<input id="txtCodigoUnico" name="txtCodigoUnico" value="<?= $ExpedienteTecnicoM->codigo_unico_pi?>" class="form-control col-md-4 col-xs-12"  placeholder="Código SNIP" autocomplete="off" readonly="readonly">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Total del Proyecto (Pre Inversión)</label>
							<div>
								<input id="txtCostoTotalPreInversion" name="txtCostoTotalPreInversion" value="<?= $ExpedienteTecnicoM->costo_total_preinv_et?>"  class="form-control col-md-4 col-xs-12"  placeholder="Total del Proyecto (Pre Inversión)" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Directo</label>
							<div>
								<input id="txtCostoDirectoPre" name="txtCostoDirectoPre" value="<?= $ExpedienteTecnicoM->costo_directo_preinv_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Costo Directo"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Indirecto</label>
							<div>
								<input id="txtCostoIndirectoPre" name="txtCostoIndirectoPre" value="<?= $ExpedienteTecnicoM->costo_indirecto_preinv_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto"  autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Costo Total del Proyecto (Inversión)</label>
							<div>
								<input id="txtCostoTotalInversion" name="txtCostoTotalInversion" value="<?= $ExpedienteTecnicoM->costo_total_inv_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Costo Total del Proyecto (Inversión)"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Costo Directo</label>
							<div>
								<input id="txtCostoDirectoInversion" name="txtCostoDirectoInversion" value="<?= $ExpedienteTecnicoM->costo_directo_inv_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Costo Directo"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Gastos generales</label>
							<div>
								<input id="txtGastosGenerales" name="txtGastosGenerales" value="<?= $ExpedienteTecnicoM->gastos_generales_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Gastos de supervisión</label>
							<div>
								<input id="txtGastosSupervision" name="txtGastosSupervision" value ="<?= $ExpedienteTecnicoM->gastos_supervision_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Funcion Programatica</label>
							<div>
								<input id="txtFuncionProgramatica" name="txtFuncionProgramatica" class="form-control col-md-4 col-xs-12"  placeholder="Funcion Programatica" autocomplete="off" >
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Funcion</label>
							<div>
								<input id="txtFuncion" name="txtFuncion" class="form-control col-md-4 col-xs-12" value="<?= $ExpedienteTecnicoM->funcion_et?>"  placeholder="Funcion" required="required" autocomplete="off" readonly="readonly">
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Programa</label>
							<div>
								<input id="txtPrograma" name="txtPrograma" class="form-control col-md-4 col-xs-12" value="<?= $ExpedienteTecnicoM->programa_et?>" placeholder="Programa" required="required" autocomplete="off" readonly="readonly">
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Sub Programa</label>
							<div>
								<input id="txtSubPrograma" name="txtSubPrograma" class="form-control col-md-4 col-xs-12" value="<?= $ExpedienteTecnicoM->sub_programa_et?>" placeholder="Sub Programa"  autocomplete="off" readonly="readonly">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Proyecto</label>
							<div>
								<input id="txtProyecto" name="txtProyecto" value="<?= $ExpedienteTecnicoM->proyecto_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Proyecto"  autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Componente</label>
							<div>
								<input id="txtComponente" name="txtComponente" value="<?= $ExpedienteTecnicoM->componente_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Componente" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Meta</label>
							<div>
								<input id="txtMeta" name="txtMeta" value="<?= $ExpedienteTecnicoM->meta_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Meta"  autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Fuente de financiamiento</label>
							<div>
								<input id="txtFuenteFinanciamiento" name="txtFuenteFinanciamiento" value="<?= $ExpedienteTecnicoM->fuente_financiamiento_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Fuente de financiamiento" autocomplete="off" >
							</div>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Modalidad de Ejecución</label>
							<div>
								<input id="txtModalidadEjecucion" name="txtModalidadEjecucion"  value="<?= $ExpedienteTecnicoM->modalidad_ejecucion_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Modalidad de Ejecución" autocomplete="off" >
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Tiempo de Ejecución del Proyecto</label>
							<div>
								<input id="txtTiempoEjecucionPip" name="txtTiempoEjecucionPip" value="<?= $ExpedienteTecnicoM->tiempo_ejecucion_pi_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Tiempo de Ejecución" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Número de beneficiarios indirectos del proyecto</label>
							<div>
								<input id="txtNumBeneficiarios" name="txtNumBeneficiarios" value="<?= $ExpedienteTecnicoM->num_beneficiarios_indirectos?>" class="form-control col-md-4 col-xs-12"  placeholder="Número de beneficiarios indirectos" autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="row">
					 	<div class="col-md-4 col-sm-3 col-xs-12">
                            <label class="control-label">Subir Resolución</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" id="Documento_Resolucion" name="Documento_Resolucion" value="<?= $ExpedienteTecnicoM->url_doc_aprobacion_et?>">
                            </div>
                        </div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label">Sustento para la presentacion del proyecto</label></br>
							<input type="hidden" id="hdtxtSituacioActual" value="<?=$ExpedienteTecnicoM->desc_situacion_actual_et?>" type="hidden">
							<p><textarea name="txtSituacioActual" id="txtSituacioActual" rows="10" cols="80"></textarea></p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label">Relevancia Economica</label></br>
							<input type="hidden" id="hdtxtSituacionDeseada" value="<?=$ExpedienteTecnicoM->relevancia_economica_et?>">
							<p><textarea name="txtSituacioDeseada" id="txtSituacioDeseada" rows="10" cols="80"></textarea></p>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label">Resumen del proyecto (Descripción)</label></br>
							<input type="hidden" id="hdtxtContribucioInterv" value="<?=$ExpedienteTecnicoM->resumen_pi_et?>" type="hidden">
							<p><textarea name="txtContribucioInterv" id="txtContribucioInterv" rows="10" cols="80"></textarea></p>
						</div>	
					</div>			
					<div class="row">
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Número de folios</label>
							<div>
								<input id="txtNumFolio" name="txtNumFolio" value="<?= $ExpedienteTecnicoM->num_folios?>" class="form-control col-md-4 col-xs-12"  placeholder="Número de folios" autocomplete="off" >
							</div>
						</div>	
					</div>	
					<div class="row">
						<div  id="divfotos" class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Fotografías(04 minimo)</label>
							<div>
								<input  type="file" name="imagen[]" id="imagen" value="" placeholder="Fotografias"   autocomplete="off" multiple  >
							<br>

							<table id="table-img" style="text-align: center;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<td>Imagen</td>
										<td class="col-md-2 col-md-2 col-xs-12"></td>
									</tr>
								</thead>
								<?php foreach($listaimg as $item){ ?>
								  	<tr class="success">
										<td>
											<img class="img-thumbnail .img-responsive" src="<?= base_url();?>uploads/ImageExpediente/<?= $item->desc_img?>">
										</td>
										<td><button onclick="EliminarImagen(<?=$item->id_img?>,<?=$item->id_et?>);"  title='Eliminar imagen del Expediente Técnico'  class='eliminarExpediente btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button></td>
								  	</tr>
								<?php } ?>
							</table>
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
	  
$(function()
{
	CKEDITOR.replace('txtSituacioActual' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
	});
	CKEDITOR.replace('txtSituacioDeseada' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
	});
  	CKEDITOR.replace('txtContribucioInterv' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
	});
	var html=$("#hdtxtSituacioActual").val();
	CKEDITOR.instances.txtSituacioActual.setData(html);
	var html1=$("#hdtxtSituacionDeseada").val();
	CKEDITOR.instances.txtSituacioDeseada.setData(html1);
	var html2=$("#hdtxtContribucioInterv").val();
	CKEDITOR.instances.txtContribucioInterv.setData(html2);
});

	function EliminarImagen(id_img,id_et)
	{	
		alert(id_img);
		event.preventDefault();
		swal({
				title: "Está seguro que desea eliminar la imagen del expediente técnico ?",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "SI,ELIMINAR",
				closeOnConfirm: false
			},
			function()
			{
				$.ajax({
                        url:base_url+"index.php/ET_Img/eliminar",
                        type:"POST",
                        data:{id_img:id_img,id_et:id_et},
                        dataType:'JSON',
                        cache:false,
                        success:function(respuesta)
                        {
                        	var html;
                        	swal("ELIMINADO!", "Se elimino correctamente la imagen del expediente técnico.", "success");
                        	$("#table-img" ).remove();
                        	html +='<table id="table-img" style="text-align: center;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">';
                        	
                        	$.each(respuesta,function(index,element)
                        	{
                        		html +='<tr class="success">';
                        		html +='<td> <img class="img-thumbnail .img-responsive" src="<?= base_url();?>uploads/ImageExpediente/<?= $item->desc_img?>"></td>';
                        		html +='<td> <button onclick="EliminarImagen('+element.id_img+','+element.id_et+');"  title="Eliminar imagen del Expediente Técnico"  class="eliminarExpediente btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>';
                        		html +='</tr>';
                        	});
                        	html +='</table>';
							$("#divfotos").append(html);
                        }
                    });
			});
	}



   /* function EliminarImagen(id_img, element)
	{
		alert(id_img,element);
		if(!confirm('Se eliminara la imagen. ¿Realmente desea proseguir con la operación?'))
		{
			return;
			alert(id_img,element);
		}
		paginaAjaxJSON({ "id_et" : id_et }, base_url+'index.php/ET_Img/eliminar', 'POST', null, function(objectJSON)
		{
			alert(objectJSON);
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$(element).parent().remove();
		}, false, true);
	}*/

</script>







