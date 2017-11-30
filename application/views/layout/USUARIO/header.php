 <!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMP-APURIMAC</title>

  <link href="<?php echo base_url(); ?>assets/Template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

  
  <link href="<?php echo base_url(); ?>assets/Template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-select.css">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/Template/vendors/animate.css/animate.min.css" rel="stylesheet">
  
    <link href="<?php echo base_url(); ?>assets/Template/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/Template/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/formValidation.min.css">
    <link href="<?php echo base_url(); ?>assets/css/jquery.growl.css" rel="stylesheet">

  <script src="<?php echo base_url(); ?>assets/js/Helper/jsHelper.js"></script> 
  <script src="<?php echo base_url(); ?>assets/Template/vendors/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
  

  
  <style>
    #navtittlemin
      {
        display: none;
      }

      @media (max-width: 550px) {
      #navtittle{
        display: none;
      }
      #navtittlemin
      {
        display: inline-block;
      }
    }
    body
    {
      font-size: 11px;
    }
  </style>

  

  <script>
    var base_url = '<?php echo base_url(); ?>';
  </script>

</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo site_url('Inicio') ?>" class="site_title"><i class="fa fa-users"></i> <span>SMPTRACING</span></a>
          </div>
          <div class="clearfix"></div>
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="<?php echo site_url('PrincipalEjecucion/PrincipalEjec'); ?>"> <i class="fa fa-home"></i> INICIO<span class=""></span></a>
                </li>

              </ul>

              <h3><span style="font-size: 10px;">Administración</span></h3>
              <ul class="nav side-menu">
                    <li><a href="<?php echo site_url('Usuario/'); ?>"><i class="fa fa-suitcase"></i>Usuario</a></li>
                </ul>

            </div>
          </div>
          <div class="sidebar-footer hidden-small">
          </div>
        </div>
      </div>
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle" style="position: relative;">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        <div id="navtittle"  >
                        <span style="position: absolute;top: 14px;left: 50px; width: 700px; font-size: 20px; text-shadow: 1px 1px 1px rgba(0,0,0,0.3);">Usuarios, Permisos y Administracion</span>
                        </div>

                        <div id="navtittlemin">
                        <span style="position: absolute;top: 14px;left: 50px; width: 700px; font-size: 20px; text-shadow: 1px 1px 1px rgba(0,0,0,0.3);">Usuarios</span></div>
                    </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt=""><?= $this->session->userdata('nombreUsuario')?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"><?= $this->session->userdata('desc_usuario_tipo');?></a></li>
                  <li><a href="<?php echo base_url("index.php/Login/logout");?>"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a></li>
                </ul>
              </li>
              <li role="presentation" class="dropdown">
                <a id="panel_notificacion_pmi" href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>Usuario</span>
                        <span class="time">3 Nuevos proyecto</span>
                      </span>
                      <span class="message">

                      </span>
                    </a>
                  </li>

                  <li>
                    <div class="text-center">
                      <a>
                        <strong>Nuevos Proyectos</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>