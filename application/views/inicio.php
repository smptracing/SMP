<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMP TRACING</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/AdminLTE.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/_all-skins.min.css" rel="stylesheet">
  <style>
    .main-footer 
    {
      background: #3c5767;
      padding: 15px;
      color: #fff;
      border-top: 1px solid #d2d6de;
    }
    .box
    {
      background-color: #ecf0f5;
    }
    .TituloListaFooter
    {
      text-shadow: 1px 1px 2px rgba(0,0,0,0.7); 
      font-size: 14px;
      color: white;
      padding-left: 20px;
    }
    .tituloHeader
    {
      display: inline-block;
      text-align: middle;
      padding-top: 25px;
      color: white;
      font-size: 15px;

    }
    .tituloLogo
    {
      padding-top: 25px;
      
    }
    .navbar-header
    {
      height: 70px;
    }
    .skin-blue .main-header .navbar {
        background-color: #3c5767;
    }
    .box.box-info 
    {
        border-top-color: #fff;
    }
    .inner
    {
        height: 120px;
    }
    @media (max-width: 770px) {
      .tituloHeader{
        display: none;
      }
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
          <a href="../../index2.html" class="navbar-brand tituloLogo"><b style="font-size: 40px; padding-top: 25px;">SMP</b> Tracing v1.0</a>
        </div>
        <div class="navbar-custom-menu">
         <span class="tituloHeader">Software de Seguimiento y Monitoreo de PIP's</span><br>
        </div>    
      </div>

    </nav>
    <nav class="navbar navbar-static-top" style="background-color: #424949;">
      <div class="container">
          <div class="navbar-header" style="height: 0px;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Guía de Usuario<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Mantenimiento de Parámetros</a></li>
                      <li><a href="#">PMI</a></li>
                      <li><a href="#">Formulación y Evaluación</a></li>
                      <li><a href="#">Ejecución</a></li>
                      <li><a href="#">Liquidación</a></li>
                      <li><a href="#">Reportes</a></li>
                      <li><a href="#">Control de Usuarios</a></li>
                  </ul> 
              </li>
            </ul>
          </div>
        
      </div>

    </nav>
  </header>
  <div class="content-wrapper">
    <div class="container">
      <section class="content" style="margin-top: 50px;">
      <div class="row">
        <div class="col-md-12">
         <!-- <div class="box box-info">-->
            <div class="box-header with-border">              
              <h3 class="box-title"> <br><i class="fa fa-refresh"></i> CICLO DE INVERSIONES</h3>
            </div>
            <div class="box-body">
                  <div class="row">
                      <div class="col-lg-4 col-xs-12 col-sm-6">
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>PMI</h3>
                                    <p>Programación Multianual de Inversión (PMI)</p>
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
                          <div class="small-box bg-olive">
                              <div class="inner">
                                  <h3>FE</h3>
                                  <p>Formulación y Evaluación de Proyectos de Inversión Pública</p>
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
                          <div class="small-box bg-blue">
                              <div class="inner">
                                  <h3>E</h3>
                                  <p>Ejecución de Proyectos de Inversión Pública</p>
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
                <div class="row">
                      <div class="col-lg-4 col-xs-12 col-sm-6">
                          <div class="small-box bg-yellow">
                              <div class="inner">
                                  <h3>S</h3>
                                  <p>Seguimiento de Proyectos de Inversión Pública</p>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-random"></i>
                              </div>
                              <a href="#"
                                 class="small-box-footer">
                                  Ingresar <i class="fa fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div>
                      <div class="col-lg-4 col-xs-12 col-sm-6">
                          <div class="small-box bg-purple">
                              <div class="inner">
                                  <h3>M</h3>
                                  <p>Monitoreo de Proyectos de Inversión Pública</p>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-eye"></i>
                              </div>
                              <a href="#"
                                 class="small-box-footer">
                                  Ingresar <i class="fa fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div>
                      <div class="col-lg-4 col-xs-12 col-sm-6">
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
                              <a href="<?php echo site_url('PrincipalReportes/PrincipalReportes'); ?>"
                                 class="small-box-footer">
                                  Ingresar <i class="fa fa-arrow-circle-right"></i>
                              </a>

                          </div>
                      </div>
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
            <!--</div>-->
          </div>
      </div>
    </section>
    </div>
  </div>
  <footer class="main-footer">
    <div class="container">
      <div class="row">
       <!-- <div class="col-lg-4 col-sm-6">
            <span class="TituloListaFooter"><strong>Guía de Usuario</strong></span>
            <ul>
                <li><a style="color:#fff;" href="#">Mantenimiento de Parámetros</a></li>
                <li><a style="color:#fff;" href="#">PMI</a></li>
                <li><a style="color:#fff;" href="#">Formulación y Evaluación</a></li>
                <li><a style="color:#fff;" href="#">Ejecución</a></li>
                <li><a style="color:#fff;" href="#">Liquidación</a></li>
                <li><a style="color:#fff;" href="#">Reportes</a></li>
                <li><a style="color:#fff;" href="#">Control de Usuarios</a></li>
            </ul>          
        </div>-->
        <div class="col-lg-4 col-sm-6" >
            <span class="TituloListaFooter"><strong>Enlaces</strong></span>
            <ul>
                <li><a style="color:#fff;" href="http://ofi5.mef.gob.pe/sosem2/" target="_blank">App Sosem</a></li>
                <li><a style="color:#fff;" href="http://ofi4.mef.gob.pe/odi/login.asp?mensaje=si" target="_blank">Banco de Inversiones</a></li>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/aplicativos-invierte-pe?id=4279" target="_blank">Consulta de Inversiones</a></li>
                <li><a style="color:#fff;" href="https://apps4.mineco.gob.pe/sispipapp/" target="_blank">Programación Multianual InviertePE</a></li>
                <li><a style="color:#fff;" href="http://apps2.mef.gob.pe/consulta-vfp-webapp/consultaExpediente.jspx" target="_blank">Consulta SIAF</a></li>
            </ul>
        </div>
        
        <div class="col-lg-4 col-sm-6">
            <span class="TituloListaFooter"><strong>Descargas</strong></span>
            <ul>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/anexos-y-formatos#anexos" target="_blank">Anexos  InviertePe</a></li>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/anexos-y-formatos#formatos" target="_blank">Formatos</a></li>
            </ul>
            <!--<span class="TituloListaFooter"><strong>Normatividad</strong></span>
            <ul>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/documentacion-sp-30574/temas/sistema-nacional-de-programacion-multianual-y-gestion-de-inversiones-invierte-pe/15837-decreto-supremo-n-027-2017-ef-2/file">Decreto Supremo Nº 027-2017-EF</a></li>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/documentacion-sp-30574/temas/sistema-nacional-de-programacion-multianual-y-gestion-de-inversiones-invierte-pe/15836-decreto-legislativo-n-1252-1/file">Decreto Legislativo N° 1252</a></li>
            </ul>    -->      
        </div>

        <div class="col-lg-4 col-sm-6">
            <!--<span class="TituloListaFooter"><strong>Descargas</strong></span>
            <ul>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/anexos-y-formatos#anexos">Anexos  InviertePe</a></li>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/anexos-y-formatos#formatos">Formatos</a></li>
            </ul>-->
            <span class="TituloListaFooter"><strong>Normatividad</strong></span>
            <ul>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/documentacion-sp-30574/temas/sistema-nacional-de-programacion-multianual-y-gestion-de-inversiones-invierte-pe/15837-decreto-supremo-n-027-2017-ef-2/file" target="_blank">Decreto Supremo Nº 027-2017-EF</a></li>
                <li><a style="color:#fff;" href="https://www.mef.gob.pe/es/documentacion-sp-30574/temas/sistema-nacional-de-programacion-multianual-y-gestion-de-inversiones-invierte-pe/15836-decreto-legislativo-n-1252-1/file" target="_blank">Decreto Legislativo N° 1252</a></li>
            </ul>          
        </div>
      </div>
      <div class="pull-right hidden-xs">
      </div>
      <hr>
      <strong>Copyright &copy; 2017-2019 - </strong> Todos los derechos reservados.
    </div>
  </footer>
</div>
<script src="<?php echo base_url(); ?>assets/adminlte/jquery-2.2.3.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/jquery.slimscroll.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/fastclick.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/app.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/demo.js"> </script>
</body>
</html>