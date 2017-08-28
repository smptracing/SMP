<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMP TRACING </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/AdminLTE.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/_all-skins.min.css" rel="stylesheet">
  <style>
    .main-footer {
    background: #3c8dbc;
    padding: 15px;
    color: #fff;
    border-top: 1px solid #d2d6de;
  }
  </style>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"><b>SMP</b> Tracing</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Normatividad<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Guía de Usuarios</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Descargas<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Enlaces<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        </h1>
        <ol class="breadcrumb">
        </ol>
      </section>
       <section class="content" style="margin-bottom: 120px;">
          <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-refresh"></i> CICLO DE INVERSIONES</h3>
            </div>
            <div class="box-body">
              <div class="row">
                  <div class="col-lg-4 col-xs-12 col-sm-6">
                                  <!-- small box -->
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>PMI</h3>
                                <p>Programación Multianual de Inversión</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <a href="<?php echo site_url('PrincipalPmi/pmi'); ?>" class="small-box-footer">
                                Ingresar <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                  </div>

                  <div class="col-lg-4 col-xs-12 col-sm-6">
                      <!-- small box -->
                      <div class="small-box bg-olive">
                          <div class="inner">
                              <h3>FE</h3>
                              <p>Formulación, Evaluación de Proyectos</p>
                          </div>
                          <div class="icon">
                              <i class="fa fa-edit"></i>
                          </div>
                          <a href="<?php echo site_url('PrincipalFyE/PrincipalFyED'); ?>" class="small-box-footer">
                              Ingresar <i class="fa fa-arrow-circle-right"></i>
                          </a>
                      </div>
                  </div>
                  <div class="col-lg-4 col-xs-12 col-sm-6">
                      <!-- small box -->
                      <div class="small-box bg-blue">
                          <div class="inner">
                              <h3>E</h3>
                              <p>Ejecución de Proyectos de Inversión</p>
                          </div>
                          <div class="icon">
                              <i class="fa fa-play"></i>
                          </div>
                          <a href="<?php echo site_url('PrincipalEjecucion/PrincipalEjec'); ?>" class="small-box-footer">
                              Ingresar <i class="fa fa-arrow-circle-right"></i>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-list"></i> MÓDULOS<br></h3><br>
            </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-4 col-xs-12 col-sm-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow"><!-- bg-aqua-active #001f3f-->
                                    <div class="inner">
                                        <h3>S</h3>

                                        <p>Seguimiento de Proyectos de Inversión</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-random"></i>
                                    </div>
                                    <a href="#"
                                       class="small-box-footer">
                                        <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12 col-sm-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3>M</h3>
                                        <p>Monitoreo de Proyectos de Inversión</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <a href="#"
                                       class="small-box-footer">
                                        <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12 col-sm-6">
                                <!-- small box -->
                                <div class="small-box bg-navy">
                                    <div class="inner">
                                        <h3>R</h3>
                                        <p>
                                            Reportes, Estadísticas e Informes
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <a href="#"
                                       class="small-box-footer">              <!--                                       <a href="#" class="small-box-footer">-->
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>


            <!-- /.col -->
          </div>
          <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-cog"></i> CONFIGURACIÓN DE PARÁMETROS<br> </h3><br>
            </div>
            <div class="row">
          <div class="col-lg-4 col-xs-12 col-sm-6">
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>P</h3>

                                        <p>Mantenimiento de Parámetros Generales</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-cogs"></i>
                                    </div>
                                    <a href="<?php echo site_url('PrincipalParametros/parametros'); ?>"
                                       class="small-box-footer">
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-xs-12 col-sm-6">
                                <div class="small-box bg-light-blue">
                                    <div class="inner">
                                        <h3>U</h3>
                                        <p>Usuarios, Permisos y Administracion</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <a href="<?php echo site_url('Usuario/'); ?>"
                                       class="small-box-footer">
                                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>

    </section>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.6
      </div>
      <strong>Copyright &copy; 2017-2019 - </strong> Todos los derechos reservados.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
 <script src="<?php echo base_url(); ?>assets/adminlte/adminlte.min.js"></script>
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
