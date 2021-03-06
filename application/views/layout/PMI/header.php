<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMP-APURIMAC</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-select.css"><!--- para el selector con buscardor---->

    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/vendors/animate/animate.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/jquery.growl.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/formValidation.min.css">

  <style>

      #ProgramacionHorizontal{
        width: 100% !important;
      }
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
  </style>

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>

     <script>
    var base_url = '<?php echo base_url(); ?>';
    </script>
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!--<div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('Inicio') ?>" class="site_title"><i class="fa fa-calendar"></i> PMI</a>
            </div>-->
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('Inicio') ?>" class="site_title"><i class="fa fa-users"></i> <span>SMPTRACING</span></a>
            </div>


             <div class="clearfix"></div>



           

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class='nav side-menu'>
                  <li><a href="<?php echo site_url('PrincipalPmi/pmi'); ?>"> <i class="fa fa-home"></i> INICIO<span class=""></span></a></li>
                  <?php
                    $openTag=false;
                    $arrayMenu=$this->session->userdata('menuUsuario');
                    for($i=0;$i<count($arrayMenu);$i++){
                      if($i>0 and ($arrayMenu[$i]['id_menu']!=$arrayMenu[$i-1]['id_menu'])){
                        if($openTag==true){
                          echo '</ul></li>';
                          $openTag=false;
                        }

                        ?>
                        <?php
                      }
                      if($arrayMenu[$i]['url']==''){

                        if($openTag==false){
                          ?>
                          <li>
                            <a> <i class="<?php echo $arrayMenu[$i]['class_icono']; ?>"></i> <?php echo $arrayMenu[$i]['nombre']; ?> <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                               <li><a href="<?php echo site_url($arrayMenu[$i]["urlSubmenu"]); ?>"><?php echo $arrayMenu[$i]["nombreSubmenu"] ?></a></li> 
                          <?php
                          $openTag=true;
                        }
                        else{
                          ?>
                          <li><a href="<?php echo site_url($arrayMenu[$i]["urlSubmenu"]); ?>"><?php echo $arrayMenu[$i]["nombreSubmenu"] ?></a></li> 
                          <?php
                        }
                      }
                      else{
                        ?>
                        <li>
                          <a href="<?php echo site_url($arrayMenu[$i]["url"]); ?>"> <i class="<?php echo $arrayMenu[$i]['class_icono']; ?>"></i> <?php echo $arrayMenu[$i]['nombre']; ?></a>
                        </li>
                        <?php
                      }
                    }
                  ?>
                  </ul>

              </div>
            </div>

          

        


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle" style="position: relative;">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  <div id="navtittle"  >
                  <span style="position: absolute;top: 14px;left: 50px; width: 700px; font-size: 20px; text-shadow: 1px 1px 1px rgba(0,0,0,0.3);">Programación Multianual de Inversiones</span>
                  </div>

                  <div id="navtittlemin">
                  <span style="position: absolute;top: 14px;left: 50px; width: 700px; font-size: 20px; text-shadow: 1px 1px 1px rgba(0,0,0,0.3);">PMI</span></div>
              </div>



              <ul class="nav navbar-nav navbar-right">

                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Ajustes</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>

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
                 <li role="presentation" class="dropdown">
                 <br>
                      <div class="col-md-2">
                        <select  id="Aniocartera_dasboard" selected name="Aniocartera_dasboard"  class="selectpicker"></select>
                        <input type="hidden" id="Aniocartera_dasboard_imput" value="<?=(isset($anio) ? $anio : date('Y'))?>">
                      </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->