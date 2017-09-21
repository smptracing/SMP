<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">-->

<!-- Latest compiled and minified JavaScript -->

<form class="form-horizontal" id="frmInsertarEstudio" action="<?php echo base_url();?>index.php/Feformulacion/insertar" method="POST" >
	<div class="row ">
        <div class="col-md-12">
            <div class=".col-xs-12 .col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<div class="row">
	                    	<div class="col-md-3">
	                            <div class=".col-xs-12 .col-md-3">
	                                <label for="txtNombreEstudioInversion">Cartera: <span class="required">*</span>
	                                </label>
	                                <select   id="anioCartera" name="anioCartera" class="selectpicker form-control col-md-3 col-xs-12" data-live-search="true"  title="Buscar Cartera...">	        
							        	<option value="2015">2015</option>
							        	<option value="2016">2016</option>
							        	<option value="2017">2017</option>
							        	<option value="2018">2018</option>
							        	<option value="2019">2019</option>
							        	<option value="2020">2020</option>
							     	</select>
	                            </div>
	                        </div>
                        </div>
                        <div class="row">
	                    	<div class="col-md-12">
	                    		<br>
	                            <div class=".col-xs-12 .col-md-10">
	                                <label for="listaProyectos">Proyecto PMI: <span class="required">*</span></label>
							        <select id="listaProyectos" name="listaProyectos" class="selectpicker form-control col-md-9 col-xs-12" data-live-search="true"  title="Buscar Proyecto...">	        
							        <!--<?php foreach($ListaProyectos as $item ){ ?>
							        	<option value="<?= $item->id_pi?>"><?=$item->nombre_pi?></option>
							     	<?php } ?>-->
							     	</select>
	                            </div>
	                        </div>
                        </div>
                        <div class="row">
	                        <div class="col-md-12">
	                        	<br>
	                            <div class=".col-xs-12 .col-md-10">
	                                <label for="txtNombreEstudioInversion">Nombre de Estudio de Inversión: <span class="required">*</span>
	                                </label>
	                                <input id="txtNombreEstudioInversion" name="txtNombreEstudioInversion"  class="form-control col-md-1 col-xs-1" placeholder="Nombre de Estudio de Inversión" required="required" type="text" autocomplete="off">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-md-12">
	                        	<br>
	                            <div class=".col-xs-12 .col-md-10">
	                                <label for="listaCoordinador">Asignar Coordinador: <span class="required">*</span>
	                                </label>
	                                <select   id="listaCoordinador" name="listaCoordinador" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Responsable...">
		                            <?php foreach($listaCoordinador as $item ){ ?>
							        	<option value="<?= $item->id_persona?>"><?=$item->nombres." ".$item->apellido_p." ".$item->apellido_m?></option>
							     	<?php } ?>                         	
		                            </select>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-md-6">
	                    		<br>
	                        	<label for="listaTipoEstudio">Tipo de Estudio: <span class="required">*</span></label>
	                            <select   id="listaTipoEstudio" name="listaTipoEstudio" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Tipo de Estudio...">
	                            <?php foreach($listaTipoEstudio as $item ){ ?>
						        	<option value="<?= $item->id_tipo_est?>"><?=$item->nombre_tipo_est?></option>
						     	<?php } ?>                            	
	                            </select>
	                        </div>
	                        <div class="col-md-6">
	                            <br>
	                            <label for="listaNivelEstudio">Nivel de Estudio: <span class="required">*</span></label>
	                            <select   id="listaNivelEstudio" name="listaNivelEstudio" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Nivel Estudio...">       
						        <?php foreach($listaNivelEstudio as $item ){ ?>
						        	<option value="<?= $item->id_nivel_estudio?>"><?=$item->denom_nivel_estudio?></option>
						     	<?php } ?>
						     	</select>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-md-3">
								<br>
								<label for="listaUnidadFormuladora">Unidad Formuladora: <span class="required"></span></label>
							  	<select   id="listaUnidadFormuladora" name="listaUnidadFormuladora" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar UF...">
							  	<?php foreach($listaUnidadFormuladora as $item ){ ?>
						        	<option value="<?= $item->id_uf?>"><?=$item->nombre_uf?></option>
						     	<?php } ?>      
							  	</select>
							</div>
							<div class="col-md-3">
								<br>
								<label for="listaUnidadEjecutora">Unidad Ejecutora: <span class="required">*</span></label>
							    <select   id="listaUnidadEjecutora" name="listaUnidadEjecutora" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar UE...">
							    <?php foreach ($listaUnidadEjecutora as $key => $value) { ?>
							    	<option value="<?=$value->id_ue?>"><?=$value->nombre_ue?></option>
							    
							    <?php } 
							    ?>
							    </select>
							</div>
	                        <div class="col-md-3">
	                            <div class=".col-xs-6 .col-md-12">
	                            <br>
	                            <label for="txtMontoInversion">Monto de Inversión: <span class="required">*</span></label>
	                            <input id="txtMontoInversion" name="txtMontoInversion"  class="form-control col-md-1 col-xs-1" required="required" type="text" placeholder="0.00" autocomplete="off">
	                            </div>
	                        </div>
							<div class="col-md-3">
								<br>
								<label for="txtCostoEstudio">Costo del Estudio: <span class="required">*</span></label>
							    <input id="txtCostoEstudio" name="txtCostoEstudio"  class="form-control col-md-1 col-xs-1" required="required" type="text" placeholder="0.00" autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<br>
								<label for="txtEtapaEstudio">Etapa del Estudio: <span class="required">*</span></label>
							    <input id="txtEtapaEstudio" name="txtEtapaEstudio"  class="form-control col-md-1 col-xs-1" required="required" type="text" placeholder="Ingrese Etapa de Estudio" autocomplete="off">
							</div>
							<div class="col-md-3">
								<br>
								<label for="txtFechaEtapa">Fecha de Etapa: <span class="required">*</span></label>
							    <input id="txtFechaEtapa" name="txtFechaEtapa"  class="form-control col-md-1 col-xs-1" required="required" type="date" autocomplete="off">
							</div>
							<div class="col-md-3">
								<br>
								<label for="txtMontoEtapa">Monto de Etapa: <span class="required">*</span></label>
							    <input id="txtMontoEtapa" name="txtMontoEtapa"  class="form-control col-md-1 col-xs-1" required="required" type="text" placeholder="0.00" autocomplete="off">
							</div>
							<div class="col-md-3">
								<br>
								<label for="txtAvanceEtapa">Avance de Etapa<span class="required">*</span></label>
							    <input id="txtAvanceEtapa" name="txtAvanceEtapa"  class="form-control col-md-1 col-xs-1" required="required" type="text" placeholder="Ingrese Avance" autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class=".col-xs-12 .col-md-12">
									<br>
									<label for="txtDescripcionEstudio">Descripción del Estudio de Inversión<span class="required">*</span>
									</label>
									<textarea class="form-control" rows="3" name="txtDescripcionEstudio" id="txtDescripcionEstudio" autocomplete="off"></textarea>
								</div>
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

<script src="<?php echo base_url(); ?>assets/js/Formulacion_Evaluacion/CargadodeDatos.js"></script>
<script>

	$(function()
	{
		$('#frmInsertarEstudio').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				listaProyectos:
				 {
				 	validators:
				 	{
				 		notEmpty:
				 		{
				 			message: '<b style="color: red;">El campo "Proyecto PMI" es requerido.</b>'
				 		}
				 	}
				},
				txtNombreEstudioInversion:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
						}
					}
				},
				listaTipoEstudio:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Tipo de Estudio" es requerido.</b>'
						}
					}
				},
				listaNivelEstudio:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Nivel de Estudio" es requerido.</b>'
						}
					}
				},
				listaUnidadFormuladora:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Unidad Formuladora" es requerido.</b>'
						}
					}
				},
				listaUnidadEjecutora:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Unidad Ejecutora" es requerido.</b>'
						}
					}
				},
				txtMontoInversion:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Monto de Inversión" es requerido.</b>'
						},
	                    regexp:
	                    {
	                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
	                        message: '<b style="color: red;">El campo "Monto de Inversión" debe ser númerico.</b>'
	                    }
					}
				},
				txtCostoEstudio:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Costo de Estudio" es requerido.</b>'
						},
	                    regexp:
	                    {
	                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
	                        message: '<b style="color: red;">El campo "Costo de Estudio" debe ser númerico.</b>'
	                    }
					}
				},
				txtEtapaEstudio:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Etapa de Estudio" es requerido.</b>'
						}
					}
				},
				txtFechaEtapa:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Fecha" es requerido.</b>'
						}
					}
				},
				txtMontoEtapa:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Monto" es requerido.</b>'
						},
	                    regexp:
	                    {
	                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
	                        message: '<b style="color: red;">El campo "Monto" debe ser númerico.</b>'
	                    }						
					}
				},
				txtAvanceEtapa:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Avance" es requerido.</b>'
						}
					}
				},
				txtDescripcionEstudio:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción" es requerido.</b>'
						}
					}
				}
			}
		});
	});
	$('.selectpicker').selectpicker({
		size: 4
	});
</script>

