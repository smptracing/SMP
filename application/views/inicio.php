<style>
    .inner > p
    {
        height: 35px;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-calendar"></i> CICLO DE INVERSIONES</h2>

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

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3>PMI</h3>
                                        <p>Programacion Multianual de Inversion</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <a href="<?php echo site_url('PrincipalPmi/pmi'); ?>" class="small-box-footer">
                                        <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-olive">
                                    <div class="inner">
                                        <h3>FE</h3>
                                        <p>Formulacion, Evaluacion de Proyectos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <a href="<?php echo site_url('PrincipalFyE/PrincipalFyED'); ?>" class="small-box-footer">
                                        <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner">
                                        <h3>E</h3>
                                        <p>Ejecucion de Proyectos de Inversion</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>


                            <!--<table class="table table-condensed table-striped table-hover table-responsible">
                                <thead>


                                <tr>


                                    <th class="col-sm-3">
                                        <div class="count green">
                                            <CENTER><a href="<?php /*echo site_url('PrincipalParametros/parametros'); */ ?>">
                                                    <img src="<?php /*echo base_url(); */ ?>assets/images/5.jpg"
                                                         class="img-rounded" alt="Cinque Terre" width="160"
                                                         height="140">
                                            </center>
                                            </a>
                                            <center><span class="count_top">MANTENIMIENTO</span></center>
                                            <center><h6><i>Configuración de los parametros de las PIP</i></h6></center>
                                        </div>
                                    </th>
                                    <th class="col-sm-3">
                                        <div class="count green">
                                            <CENTER><a href="<?php /*echo site_url('PrincipalPmi/pmi'); */ ?>">
                                                    <img src="<?php /*echo base_url(); */ ?>assets/images/3.JPG"
                                                         class="img-rounded" alt="Cinque Terre" width="160"
                                                         height="140"></CENTER>
                                            </a>

                                            <center><span class="count_top">PMI</span></center>
                                            <center><h6><i>Carteras, Programación Multianual de Inversiones </i></h6>
                                            </center>
                                        </div>
                                    </th>


                                    <th class="col-sm-3">
                                        <div class="count green">
                                            <CENTER><a href="<?php /*echo site_url('PrincipalFyE/Formulacion_Eval'); */ ?>">
                                                    <img src="<?php /*echo base_url(); */ ?>assets/images/2.png"
                                                         class="img-rounded" alt="Cinque Terre" width="160"
                                                         height="140"></CENTER>
                                            </a>
                                            <center><span class="count_top">FORMULACION Y EVALUACION</span></center>
                                            <center><h6><i>Formulación de Proyectos de Inversión</i></h6></center>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                            </table>

                            <table class="table table-condensed table-striped table-hover table-responsible">
                                <thead>
                                <tr>
                                    <th class="col-sm-3">
                                        <div class="count green">
                                            <CENTER><a href="<?php echo site_url('PrincipalParametros/parametros'); ?>">
                                                    <img src="<?php echo base_url(); ?>assets/images/ejecucion.png"
                                                         class="img-rounded" alt="Cinque Terre" width="160"
                                                         height="140">
                                            </center>

                                            </a>

                                            <center><span class="count_top">EJECUCIÓN</span></center>
                                            <center><h6><i>Configuración de los parametros de las PIP</i></h6></center>
                                        </div>
                                    </th>


                                    <th class="col-sm-3">
                                        <div class="count green">
                                            <CENTER><a href="<?php echo site_url('PrincipalPmi/pmi'); ?>">
                                                    <img src="<?php echo base_url(); ?>assets/images/liquidacion.png"
                                                         class="img-rounded" alt="Cinque Terre" width="160"
                                                         height="140"></CENTER>
                                            </a>

                                            <center><span class="count_top">LIQUIDACIÓN</span></center>
                                            <center><h6><i>Carteras, Programación Multianual de Inversiones </i></h6>
                                            </center>
                                        </div>
                                    </th>


                                    <th class="col-sm-3">
                                        <div class="count green">
                                            <CENTER><a href="<?php echo site_url('PrincipalPmi/pmi'); ?>">
                                                    <img src="<?php echo base_url(); ?>assets/images/Admin.png"
                                                         class="img-rounded" alt="Cinque Terre" width="160"
                                                         height="140"></CENTER>
                                            </a>

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
                        <p></p>

                    </div>

                    <div class="x_title">
                        <h2><i class="fa fa-line-chart"></i> MÓDULOS</h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <!-- top tiles -->
                        <div class="row ">

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow"><!-- bg-aqua-active #001f3f-->
                                    <div class="inner">
                                        <h3>S</h3>

                                        <p>Seguimiento de Proyectos de Inversión</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-gears"></i>
                                    </div>
                                    <a href="#"
                                       class="small-box-footer">
                                        <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3>M</h3>
                                        <p>Monitoreo de Proyectos de Inversión</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <a href="#"
                                       class="small-box-footer">
                                        <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-navy">
                                    <div class="inner">
                                        <h3>R</h3>
                                        <p>Reportes, Estadisticas, Informes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <a href="#"
                                       class="small-box-footer">              <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- End SmartWizard Content -->
                    </div>

                    <div class="x_title">
                        <h2><i class="fa fa-line-chart"></i> CONFIGURACION DE PARAMETROS</h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <!-- top tiles -->
                        <div class="row ">

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red"><!-- bg-aqua-active #001f3f-->
                                    <div class="inner">
                                        <h3>P</h3>

                                        <p>Mantenimiento de Parametros Generales</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-gears"></i>
                                    </div>
                                    <a href="<?php echo site_url('PrincipalParametros/parametros'); ?>"
                                       class="small-box-footer">
                                        <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-navy">
                                    <div class="inner">
                                        <h3>U</h3>
                                        <p>Usuarios, Permisos y Administracion</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <a href="<?php echo site_url('Usuario/'); ?>"
                                       class="small-box-footer">              <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
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
                        <form class="form-horizontal " id="form-AddNaturalezaInversion"
                              action="<?php echo base_url(); ?>pip/AddNaturalezaInversion" method="POST">


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