<!--home-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMP TRACING Beta</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->

  <link href="<?php echo base_url(); ?>assets/adminlte/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/adminlte/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/AdminLTE.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/_all-skins.min.css" rel="stylesheet">
  <style>
    /*.skin-blue .main-header li.user-header {
      background-color: #2a3f54;
    }*/
    .main-footer
    {
      background: #2a3f54;
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
        background-color: #2a3f54;
    }
    .box.box-info
    {
        border-top-color: #fff;
    }
    .inner
    {
        height: 120px;
    }
    .thebox{
        color:white;
        cursor: pointer;
        height: 150px;
        padding: 20px;
        width: auto;
        text-align: center;
        -webkit-transition: transform 0.3s;
        -moz-transition: transform 0.3s;
        -ms-transition: transform 0.3s;
        -o-transition: transform 0.3s;
        transition: transform 0.4s;
        user-select : none;
        box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.2);

    }
    .zoom-in{
        padding-top: 30px;
    }
    .thebox:hover {
        transform: scale(1.125);
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }
    .box-container{
        padding-top: 10px;
        padding-bottom: 50px;
    }
    .Menu>li>a:hover
    {
      background-color: #5c94a0;
      color: white;

    }


    .subMenu >li>a:hover{
      background-color: #35495d;
      color:white;
    }
    .subMenu{
      box-shadow: 0px 5px 10px 0px rgba(0,0,0,0.2);
      margin: 0px 0 0;
    }
    .content-wrapper
    {
      background-color: #f7f7f7;
    }
    .skin-blue .main-header .navbar .nav>li>a {
        color: black;
    }
    .dropdown:hover
    {
      background-color: #5c94a0;

    }
    .dropdown:hover .dropdown-menu
    {
      display: block;
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
        <div class="navbar-header" style="padding-top: 13px;">
          <a href="<?php echo site_url('Inicio'); ?>" >
            <img style="display: inline-block; height: 50px; width: 185px; opacity: 1;" src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive">
          </a>
        </div>
        <div class="navbar-custom-menu">
         <span class="tituloHeader">Software de Seguimiento y Monitoreo de PIP's</span><br>
        </div>
      </div>

    </nav>
    <nav class="navbar navbar-static-top" style="background-color: #ededed;">
      <div class="container">
          <div class="navbar-header" style="height: 0px;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav Menu">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" >Guía de Usuario<span class="caret"></span></a>
                  <ul class="dropdown-menu subMenu " role="menu">
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
          <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>assets/images/img.jpg" class="user-image" alt="User Image"/>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"> <?php echo $this->session->userdata('nombreUsuario')?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <!--<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                  <img src="<?php echo base_url(); ?>assets/images/img.jpg" class="img-circle" alt="Profile Image" />

                  <p>
                    <?php echo $this->session->userdata('nombreUsuario')?> <br> <?php echo $this->session->userdata('desc_usuario_tipo')?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?php echo base_url("index.php/Login/logout");?>" class="btn btn-default btn-flat">Cerrar Sesion</a>
                  </div>
                </li>
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
      <div class="row box-container">

        <?php foreach ($resp as $value): ?>
          <?php if($value->id_modulo=='HOME') { ?>
                     <div class="col-md-3 col-sm-6 col-xs-12">
                         <div class="zoom-in">
                             <a href="<?php echo site_url($value->url); ?>">
                             <div style="background-color: <?php echo $value->color; ?>;" class="col-md-12 thebox">
                                 <div class="span 6">
                                     <span class="<?php echo $value->class_icono; ?>"></span>
                                 </div>
                                 <div class="span 6">
                                     <br>
                                     <?php echo $value->nombre; ?>
                                 </div>

                             </div>
                             </a>
                         </div>
                     </div>
          <?php } ?>
        <?php endforeach; ?> 

      </div>
    </section>

    </div>
  </div>
  <footer class="main-footer">
    <div class="container">
      <div class="row">
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
        </div>

        <div class="col-lg-4 col-sm-6">
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
