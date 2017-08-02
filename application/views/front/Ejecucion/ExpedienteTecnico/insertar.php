<style>
	.row
	{
		margin-top: 4px;
	}
</style>
<script src="ckeditor/ckeditor.js"></script>
<form class="form-horizontal" id="form-addClasificador" action="<?php echo base_url();?>index.php/Clasificador/insertar" method="POST" >

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="x_content">
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre de la Unidad Ejecutora</label>
							<div>
								<input id="txtUnidadEjecutora" name="txtUnidadEjecutora" value ="<?= $Listarproyectobuscado->nombre_ue?>" class="form-control col-md-4 col-xs-12"  placeholder="Dirección" required="required" autocomplete="off" >
							</div>
						</div>
					</div
					<div class="row">
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Dirección</label>
							<div>
								<input id="txtDireccionUE" name="txtDireccionUE" class="form-control"  placeholder="Dirección" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Distrito/Provincia/Distrito</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Dirección" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label class="control-label">Teléfono</label>
							<div>
								<input id="txtCantidad" name="txtCantidad" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label class="control-label">RUC</label>
							<div>
								<input id="txtPrecio" name="txtPrecio" class="form-control col-md-4 col-xs-12"  placeholder="" required="required" autocomplete="off" >
							</div>
						</div>

					</div>
	
						<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del Proyecto</label>
							<div>
								<input id="txtNombrePip" name="txtNombrePip" value="<?= $Listarproyectobuscado->nombre_pi?>" class="form-control col-md-4 col-xs-12"  placeholder="Nombre del proyecto" required="required" autocomplete="off" >	
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Ubicación distrital donde se plantea su Ejecución</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Ubicación" required="required" autocomplete="off" >
							</div>
						</div>

						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Codigo SNIP</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Código SNIP" required="required" autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Total del Proyecto (Pre Inversión)</label>
							<div>
								<input id="txtCostoTotalPreInversion" name="txtCostoTotalPreInversion" value="<?= $Listarproyectobuscado->costo_total_preinv_et?>"  class="form-control col-md-4 col-xs-12"  placeholder="Total del Proyecto (Pre Inversión)" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Directo</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Costo Directo" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Costo Indirecto</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Costo Total del Proyecto (Inversión)</label>
							<div>
								<input id="txtCostoTotalInversion" name="txtCostoTotalInversion" value="<?= $Listarproyectobuscado->costo_total_inv_et?>" class="form-control col-md-4 col-xs-12"  placeholder="Costo Total del Proyecto (Inversión)" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Costo Directo</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Costo Directo" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Gastos generales</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Gastos de supervisión</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Costo Indirecto" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Funcion Programatica</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Funcion Programatica" required="required" autocomplete="off" >
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label class="control-label">Funcion</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Funcion" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label class="control-label">Programa</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Programa" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<label class="control-label">Sub Programa</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Sub Programa" required="required" autocomplete="off" >
							</div>
						</div>

						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Proyecto</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Proyecto" required="required" autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Componente</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Componente" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Meta</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Meta" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Fuente de financiamiento</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Fuente de financiamiento" required="required" autocomplete="off" >
							</div>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Modalidad de Ejecución</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Modalidad de Ejecución" required="required" autocomplete="off" >
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
								<input id="txtNumBeneficiarios" name="txtNumBeneficiarios" value="<?= $Listarproyectobuscado->num_beneficiarios?>" class="form-control col-md-4 col-xs-12"  placeholder="Número de beneficiarios indirectos" required="required" autocomplete="off" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del Responsable de la Elaboración del Proyecto</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Responable de la Elaboración del Proyecto" required="required" autocomplete="off" >
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Profesión</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Profesión" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">DNI</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="DNI" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Registro Profesional N°</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Registro Profesional" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8 col-sm-3 col-xs-12">
							<label class="control-label">Direccion</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Dirección" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Teléfono</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Teléfono" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-3 col-xs-12">
							<label class="control-label">Nombre del Responsable de la Ejecución del Proyecto</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Responsable de la Ejecución del Proyecto" required="required" autocomplete="off" >
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6 col-sm-3 col-xs-12">
							<label class="control-label">Profesión</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Profesión" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">DNI</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="DNI" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label class="control-label">Registro Profesional N°</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Registro Profesional" required="required" autocomplete="off" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8 col-sm-3 col-xs-12">
							<label class="control-label">Direccion</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Dirección" required="required" autocomplete="off" >
							</div>
						</div>
						<div class="col-md-4 col-sm-3 col-xs-12">
							<label class="control-label">Teléfono</label>
							<div>
								<input id="txtRendimiento" name="txtRendimiento" class="form-control col-md-4 col-xs-12"  placeholder="Teléfono" required="required" autocomplete="off" >
							</div>
						</div>

					</div></br>
					<div class="row">
						<p><textarea name="editor1" id="editor1" rows="10" cols="80"></textarea></p>	
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
 CKEDITOR.replace('editor1' ,{
		filebrowserImageBrowseUrl : '<?php echo base_url('assets/filemanager/index.html');?>'
	});
</script>






