<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">-->

<!-- Latest compiled and minified JavaScript -->

<form class="form-horizontal" id="frmInsertarEstudio" action="<?php echo base_url();?>index.php/Feformulacion/insertar" method="POST" >
	<!--<div class="row">
		<div class="item form-group">
			<div class="col-md-12">
				<div class="col-xs-12 col-md-9">
			    	<label for="listaProyectos">Proyecto PMI<span class="required"></span></label>
			        <select   id="listaProyectos" name="listaProyectos" class="selectpicker form-control col-md-9 col-xs-12" data-live-search="true"  title="Buscar Proyecto...">	        
			        <?php foreach($ListaProyectos as $item ){ ?>
			        	<option><?=$item->nombre_pi?></option>
			     	<?php } ?>
			     	</select>
			    </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="item form-group">
			<div class="col-md-12">
				<div class="col-xs-12 col-md-9">
			    	<label for="listaProyectos">Nombre de Estudio de Inversion<span class="required"></span></label>
			    	<input id="txtnombres" name="txtnombres"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2" placeholder="Nombre de Estudio de Inversión" required="required" type="text">
			    </div>
			</div>
		</div>
	</div>-->

	<div class="row ">
        <div class="col-md-12">
            <div class=".col-xs-12 .col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<div class="col-md-12">
                            <div class=".col-xs-12 .col-md-10">
                                <label for="listaProyectos">Proyecto PMI<span class="required"></span></label>
						        <select   id="listaProyectos" name="listaProyectos" class="selectpicker form-control col-md-9 col-xs-12" data-live-search="true"  title="Buscar Proyecto...">	        
						        <?php foreach($ListaProyectos as $item ){ ?>
						        	<option><?=$item->nombre_pi?></option>
						     	<?php } ?>
						     	</select>
                            </div>
                        </div>
                        <div class="col-md-12">
                        	<br>
                            <div class=".col-xs-12 .col-md-10">
                                <label for="name">Nombre de Estudio de Inversión<span class="required"></span>
                                </label>
                                <input id="txtnombres" name="txtnombres"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2" placeholder="Nombre de Estudio de Inversión" required="required" type="text">
                            </div>
                        </div>
                    	<div class="col-md-6">
                    		<br>
                        	<label for="name">Tipo de Estudio<span class="required"></span></label>
                            <select   id="listaTipoInversion" name="listaTipoInversion" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Tipo de Estudio..."></select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <label for="name">Nivel de Estudio<span class="required"></span></label>
                            <select   id="listaNivelEstudio" name="listaNivelEstudio" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Nivel Estudio..."></select>
                        </div>
                        <div class="col-md-3">
                            <div class=".col-xs-6 .col-md-12">
                            <br>
                            <label for="name">Monto de Inversión<span class="required"></span></label>
                            <input id="txtMontoInversion" name="txtMontoInversion"  class="form-control col-md-1 col-xs-1" required="required" type="text" placeholder="0.00">
                            </div>
                        </div>
						<div class="col-md-3">
							<br>
							<label for="name">Costo del Estudio<span class="required"></span></label>
						    <input id="txtcostoestudio" name="txtcostoestudio"  class="form-control col-md-1 col-xs-1" required="required" type="text" placeholder="0.00">
						</div>
						<div class="col-md-3">
							<br>
							<label for="name">Unidad Formuladora<span class="required"></span></label>
						  	<select   id="lista_unid_form" name="lista_unid_form" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar UF..."></select>
						</div>
						<div class="col-md-3">
							<br>
							<label for="name">Unidad Ejecutora<span class="required"></span></label>
						    <select   id="lista_unid_ejec" name="lista_unid_ejec" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar UE...">
						    </select>
						</div>
						<div class="col-md-12">
							<div class=".col-xs-12 .col-md-10">
								<br>
								<label for="name">Descripción del Estudio de Inversión<span class="required"></span>
								</label>
								<textarea class="form-control" rows="3" name="txadescripcion" id="txadescripcion"></textarea>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="ln_solid"></div>
	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">
			<button type="submit" class="btn btn-success">
				<span class="glyphicon glyphicon-floppy-disk"></span>
				Guardar
			</button>
			<button class="btn btn-danger" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove"></span>
				Cancelar
			</button>
		</div>
	</div>
</form>
<script>
	$(function()
	{
		$('#frmInsertarModulo').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtNombre:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
						}
					}
				}
			}
		});
	});
	$('.selectpicker').selectpicker({
	  size: 2
	});
</script>

<!--
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap-select.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>-->

<script src="<?php echo base_url(); ?>assets/js/Formulacion_Evaluacion/CargadodeDatos.js"></script>

<!--
            <form class="form-horizontal " id="form-AddEstudioInversion" action="<?php echo base_url(); ?>Estudio_Inversion/AddEstudioInversion" method="POST">
                     
                    <br>

                          <div class="row ">
                            <div class="col-md-2">
                                       <div class=".col-xs-12 .col-md-2">
                                        </div>
                            </div>
                            <br>
                           <div class="col-md-12">
                                <div class=".col-xs-12 .col-md-12">
                               <div class="panel panel-default">
                             
                                      <div class="panel-body">
                                      <form class="form-horizontal " id="form-AddEstudioInversion" action="<?php echo base_url(); ?>Estudio_Inversion/AddEstudioInversion" method="POST">

                                          <div class="col-md-12">
                                          <div class=".col-xs-12 .col-md-10">
                                           <label for="name">Estado<span class="required"></span>
                                            </label>
                                                <select   id="comboEstadoFe" name="comboEstadoFe" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Elija estado">

                                                </select>
                                          </div>
                                          <div class=".col-xs-12 .col-md-10">
                                           <label for="name">Proyecto PMI<span class="required"></span>
                                            </label>
                                                <select   id="listaFuncionC" name="listaFuncionC" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Proyecto...">
                                                </select>
                                          </div>
                                          <div class=".col-xs-7 .col-md-7">
                                           <label for="name">Código Único<span class="required"></span>
                                            </label>
                                                <input id="txtCodigoUnico" name="txtCodigoUnico" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Ingrese único " required="required" autocomplete="off" type="text">
                                          </div>

                                          </div>
                                      </div>
                                </div>
                              </div>
                            </div>
                          </div>
                                                    <div class="row ">
                            <div class="col-md-2">
                                       <div class=".col-xs-12 .col-md-2">
                                        </div>
                            </div>
                           <div class="col-md-12">
                                <div class=".col-xs-12 .col-md-12">
                               <div class="panel panel-default">

                                      <div class="panel-body">
                                          <div class="col-md-12">
                                          <div class=".col-xs-12 .col-md-10">
                                           <label for="name">Nombre de Estudio de Inversión<span class="required"></span>
                                            </label>
                                                  <input id="txtnombres" name="txtnombres"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2" placeholder="Nombre de Estudio de Inversión" required="required" type="text">
                                          </div>
                                          </div>
                                         <div class="col-md-6">
                                          <br>
                                           <label for="name">Tipo de Estudio<span class="required"></span>
                                            </label>
                                                 <select   id="listaTipoInversion" name="listaTipoInversion" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Tipo de Estudio...">
                                                </select>

                                          </div>
                                          <div class="col-md-6">
                                          <br>
                                           <label for="name">Tipo Documento Técnico<span class="required"></span>
                                            </label>
                                                 <select   id="listaNivelEstudio" name="listaNivelEstudio" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Nivel Estudio...">
                                                </select>
                                            </div>

                                          <div class="col-md-3">
                                          <div class=".col-xs-6 .col-md-12">
                                          <br>
                                           <label for="name">Monto de Inversión<span class="required"></span>
                                            </label>
                                                  <input id="txtMontoInversion" name="txtMontoInversion"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2"  required="required" type="number" step='0.01'  placeholder="0.00">
                                          </div>
                                          </div>

                                          <div class="col-md-3">
                                          <br>
                                           <label for="name">Costo del Estudio<span class="required"></span>
                                            </label>
                                                  <input id="txtcostoestudio" name="txtcostoestudio"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2"  required="required" type="number" step='0.01'  placeholder="0.00">
                                          </div>
                                          <div class="col-md-3">
                                          <br>
                                           <label for="name">Unidad Formuladora<span class="required"></span>
                                            </label>
                                                  <select   id="lista_unid_form" name="lista_unid_form" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar UF...">
                                                </select>
                                          </div>
                                          <div class="col-md-3">
                                          <br>
                                           <label for="name">Unidad Ejecutora<span class="required"></span>
                                            </label>
                                                   <select   id="lista_unid_ejec" name="lista_unid_ejec" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar UE...">
                                                </select>
                                          </div>

                                           <div class="col-md-12">
                                          <div class=".col-xs-12 .col-md-10">
                                          <br>
                                           <label for="name">Descripción del Estudio de Inversión<span class="required"></span>
                                            </label>
                                              <textarea class="form-control" rows="3" name="txadescripcion" id="txadescripcion"></textarea>
                                          </div>
                                          </div>
                                            <div class="col-md-3">
                                          <br>
                                           <label for="name">.<span class="required"></span>
                                            </label> <br>
                                            <center>
                                                 <button id="btn-GuardarMontoProgramado"  class="btn btn-success">
                               <span  aria-hidden="true"></span><strong>Guardar</strong> </button>
                               <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cancelar</strong> </button>

                               </center>
                                          </div>
                                       </div>
                                </div>
                              </div>
                            </div>
                          </div>
-->