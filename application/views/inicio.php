  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <h2><i class="fa fa-gears"></i> ETAPAS DEL PROYECTO</h2>

                    <ul class="nav navbar-right panel_toolbox">
                     <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>-->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                         <!-- top tiles -->
          <div class="row ">

               <table  class="table table-condensed table-striped table-hover table-responsible">
                      <thead>
                           <tr>
                          <th class="col-sm-3">
                                    <div class="count green">
                                       <CENTER> <a href="<?php echo site_url('PrincipalParametros/parametros'); ?>">
                                          <img src="<?php echo base_url(); ?>assets/images/5.jpg" class="img-rounded" alt="Cinque Terre" width="160" height="140">
                                      </center>
                                       </a>
                                       <center><span class="count_top">MANTENIMIENTO</span></center>
                                       <center><h6><i>Configuración de los parametros de las PIP</i></h6></center>
                                    </div>
                          </th>
                          <th class="col-sm-3">
                                  <div class="count green">
                                  <CENTER> <a href="<?php echo site_url('PrincipalPmi/pmi'); ?>">
                                   <img src="<?php echo base_url(); ?>assets/images/3.JPG" class="img-rounded" alt="Cinque Terre" width="160" height="140"></CENTER>
                                   </a>

                                   <center><span class="count_top">PMI</span></center>
                                  <center><h6><i>Carteras, Programación Multianual de Inversiones </i></h6></center>
                                  </div>
                          </th>


                         <th class="col-sm-3">
                                  <div class="count green">
                                     <CENTER> <a href="<?php echo site_url('PrincipalPmi/pmi'); ?>">
                                   <img src="<?php echo base_url(); ?>assets/images/2.png" class="img-rounded" alt="Cinque Terre" width="160" height="140"></CENTER> </a>

                                   <center><span class="count_top">FORMULACION Y EVALUACION</span></center>
                                  <center><h6><i>Formulación de Proyectos de Inversión</i></h6></center>
                                  </div>
                         </th>
                       </tr>
                     </thead>
                </table>

                <table  class="table table-condensed table-striped table-hover table-responsible">
                      <thead>
                           <tr>
                          <th class="col-sm-3">
                                    <div class="count green">
                                       <CENTER> <a href="<?php echo site_url('PrincipalParametros/parametros'); ?>">
                                          <img src="<?php echo base_url(); ?>assets/images/ejecucion.png" class="img-rounded" alt="Cinque Terre" width="160" height="140">
                                      </center>

                                       </a>

                                       <center><span class="count_top">EJECUCIÓN</span></center>
                                       <center><h6><i>Configuración de los parametros de las PIP</i></h6></center>
                                    </div>
                          </th>


                          <th class="col-sm-3">
                                  <div class="count green">
                                  <CENTER> <a href="<?php echo site_url('PrincipalPmi/pmi'); ?>">
                                   <img src="<?php echo base_url(); ?>assets/images/liquidacion.png" class="img-rounded" alt="Cinque Terre" width="160" height="140"></CENTER>
                                   </a>

                                   <center><span class="count_top">LIQUIDACIÓN</span></center>
                                  <center><h6><i>Carteras, Programación Multianual de Inversiones </i></h6></center>
                                  </div>
                          </th>


                         <th class="col-sm-3">
                                  <div class="count green">
                                     <CENTER> <a href="<?php echo site_url('PrincipalPmi/pmi'); ?>">
                                   <img src="<?php echo base_url(); ?>assets/images/Admin.png" class="img-rounded" alt="Cinque Terre" width="160" height="140"></CENTER> </a>

                                   <center><span class="count_top">ADMIN</span></center>
                                  <center><h6><i>Formulación de Proyectos de Inversión</i></h6></center>
                                  </div>
                         </th>
                       </tr>
                     </thead>
                </table>


          </div>
          <!-- /top tiles -->

                      </div>

                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<!-- /.ventana para Registar  nueva Naturaleza de inversion-->
<div class="modal fade" id="VentanaRegistrarNaturalezaInversion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Iniciar </h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                  <form class="form-horizontal " id="form-AddNaturalezaInversion"   action="<?php echo base_url(); ?>pip/AddNaturalezaInversion" method="POST" >


                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
</div>
<!-- /.fin ventana para registra nueva Naturaleza de inversion-->