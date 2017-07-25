<style>
  #table-CarteraInv > tbody > tr > td
  {
    text-align: center;
    vertical-align: middle;
  }

  #table-CarteraInv > thead > tr > th
  {
    text-align: center;
  }
</style>
<div class="right_col" role="main">
          <div class="">


            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> CARTERA DE INVERSION<small></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                      <ul id="myTab" class="nav nav-tabs" role="tablist">
          
                                        <li role="presentation" class="active"><a  href="#tab_CarteraInversion" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> CARTERA DE INVERSION</a>
                                        </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">

                            <!-- /  panel de modalidad ejecucion el row -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_CarteraInversion" aria-labelledby="profile-tab">

                                              <!-- /tabla de cartera de inersion row -->
                                            <div class="row">

                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraCarteraInv"><span class="fa fa-plus-circle"></span> Nuevo</button>
                                                          <div class="x_title">


                                                            <ul class="nav navbar-right panel_toolbox">

                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>

                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>

                                                            </ul>

                                                            <div class="clearfix"></div>

                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-CarteraInv" class="table table-condensed table-striped table-bordered table-hover table table-striped table-bordered nowrap" width="100%">
                                                              <thead>
                                                                 <tr>
                                                                  <th>AÑO DE APERTURA</th>
                                                                  <th>FECHA INICIO CARTERA</th>
                                                                  <th>FECHA FIN CARTERA</th>
                                                                  <th>ESTADO CICLO</th>
                                                                  <th>NRO RESOLUCION</th>
                                                                  <th>URL</th>
                                                                  <th class="col-sm-1"></th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                            </div>
                                         <!-- / fin  de la tabla de cartera de inersion row -->
                                        </div>
                                <!-- /  fin panel de cartera de inersion el row -->
                                          
                                      </div>
                                    </div>

                                  </div>
                                </div>
              </div>


          </div>
          <div class="clearfix"></div>
        </div>
     </div>


<!-- Ventana para registrar una modalidad de ejecucion -->
<div class="modal fade" id="VentanaRegistraCarteraInv" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Cartera de Inversion</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                <form class="form-horizontal " id="form-RegistraCarteraInv" action="<?php echo base_url();?>CarteraInversion/AddCartera" method="POST" >

                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Año Apertura Cartera<span class="required">*</span>
                            </label>
                               <div class="col-md-2 col-sm-2 col-xs-12">
                                  <select class="form-control" id="dateAñoAperturaCart" name="dateAñoAperturaCart">
                                  <?php 
                                       for($i=2017;$i<2099;$i++){   
                                      echo '<option value="'.$i.'">'.$i.'</option>';  
                                  }  
                                  ?>
                                  </select>
                               </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha Inicio Cartera<span class="required">*</span>
                            </label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="date" id="dateFechaIniCart" name="dateFechaIniCart" value="<?php echo date("Y-m-d"); ?>" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                               </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="name">Fecha Fin Cartera<span class="required">*</span>
                            </label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="date" id="dateFechaFinCart" name="dateFechaFinCart" value="<?php echo date("Y-m-d"); ?>" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                               </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Numero Resolucion Cartera <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NumResolucionCart" name="txt_NumResolucionCart" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Numero Resolucion Cartera" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Adjuntar resolución<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="file" name="Cartera_Resoluacion" >
                          </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                         <button   class="btn btn-success" type="submit">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button  data-dismiss="modal" class="btn btn-danger">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

<!-- fin ventana para registrar una modalidad  de ejecucion -->
<div class="modal fade" id="CambioCartera" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <input type="text" id="AnioCartera">
          <center><p><h4>Mostrar Cartera 2017</h4></p>
          <button type="button" id="Btn_SiCartera" class="btn btn-info">Si</button>
          <button type="button" class="Btn_NoCartera">No</button></center>
        </div>

      </div>
      
    </div>
  </div>

