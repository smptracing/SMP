<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>EXPEDIENTE TÉCNICO</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				<p>Gentellela provides you with several dropdown designs for your choosing.</p>
                  	<ul class="nav nav-pills" role="tablist">
                    	<li role="presentation" class="dropdown">
                      		<a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">	Acciones
                                <span class="caret"></span>
                            </a>
                      		<ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                        		<li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Asignación de especialistas requeridos', { idExpedienteTecnico : 2 }, base_url+'index.php/ET_PER_REQ/insertar', 'GET', null, null, false, true); return false;"> Asignar Personal	
		                        	</a>
		                        </li>
		                        <li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="window.open(base_url+'index.php/ET_Tarea/index/2', '_blank'); return false;"> Gestionar Actividades</a>
		                        </li>
                        		<li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Another action</a>
                        		</li>
                        		<li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Something else here</a>
                        		</li>
                        		<li role="presentation" class="divider"></li>
                        		<li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Separated link</a>
                        		</li>
                    		</ul>
                    	</li>
                    <li role="presentation" class="dropdown">
                      <a id="drop5" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                  Reportes
                                  <span class="caret"></span>
                              </a>
                      <ul id="menu2" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop5">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a>
                        </li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Another action</a>
                        </li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Something else here</a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Separated link</a>
                        </li>
                      </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                      <a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                  Detalle Expendiente
                                  <span class="caret"></span>
                              </a>
                      <ul id="menu3" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop6">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a>
                        </li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Another action</a>
                        </li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Something else here</a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Separated link</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  	<br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->codigo_unico_pi?>">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" readonly="readonly" rows="5">
                          	<?= trim($ExpedienteTecnicoElaboracion[0]->nombre_pi);?>
                          </textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Unidad Ejecutora</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->nombre_ue?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo Total del Proyecto PreInversion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->costo_total_preinv_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo Total del Proyecto Inversion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->costo_total_inv_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiempo de Ejecucion<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->tiempo_ejecucion_pi_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Beneficiarios<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->num_beneficiarios?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                    </form>
				</div>
			</div>
			<style>
				.btn-app{
					height: 20px;
					width: 30px;
				}
			</style>
			<div class="x_panel">
                  <div class="x_title">
                    <h2>Button App Design</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Add the class <code>.btn .btn-app</code> tag</p>
                    <a class="btn btn-app" data-toggle="tooltip" title="Editar E.T.">
                      <i class="fa fa-edit"></i> Editar
                    </a>
                    <a class="btn btn-app" data-toggle="tooltip" title="Eliminar E.T.">
                      <i class="fa fa-trash"></i> Eliminar
                    </a>
                    <a class="btn btn-app" data-toggle="tooltip" title="Asignar Personal">
                      <i class="fa fa-pause"></i> Personal
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Gestionar Actividades" >
                      <i class="fa fa-save"></i> Actividades
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Registrar Componentes, Metas y Partidas">
                      <i class="fa fa-edit"></i> Registrar
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Presupuesto  Analitico">
                      <i class="fa fa-play"></i> Presupuesto
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Enviar E.T. a la siguiente etapa">
                      <i class="fa fa-pause"></i> Enviar E.T.
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Dar visto bueno">
                      <i class="fa fa-save"></i> visto bueno
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Valorizacion de Ejecucion">
                      <i class="fa fa-edit"></i> Valorizacion
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Expediente Tecnico 001">
                      <i class="fa fa-play"></i> Expediente Tecnico 001
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Metrado">
                      <i class="fa fa-pause"></i> Metrado
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Formato FF-05">
                      <i class="fa fa-save"></i> Formato FF-05
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Presupuesto Analitico">
                      <i class="fa fa-bullhorn"></i> Presupuesto Analitico
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Formato FF-11">
                      <i class="fa fa-repeat"></i> Formato FF-11
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Responsable">
                      <i class="fa fa-users"></i> Responsable
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Documentos">
                      <i class="fa fa-inbox"></i> Documentos
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Detalle Expediente">
                      <i class="fa fa-envelope"></i> Detalle Expediente
                    </a>
                    <br /><br />

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php
$sessionTempCorrecto=$this->session->flashdata('correcto');
$sessionTempError=$this->session->flashdata('error');

if($sessionTempCorrecto){ ?>
	<script>
	$(document).ready(function()
	{
		swal('','<?=$sessionTempCorrecto?>', "success");
	});
	</script>
<?php }

if($sessionTempError){ ?>
	<script>
	$(document).ready(function()
	{
	swal('','<?=$sessionTempError?>', "error");
	});
	</script>
<?php } ?>
<script>
</script>