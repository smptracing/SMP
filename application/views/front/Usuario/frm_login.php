<!--<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .login-page
        {
            background-color:#f1f4f7;
            background-image: -webkit-gradient(linear, left 0%, left 100%, from(#555555), to(#111111));
            background-image: -webkit-linear-gradient(top, #555555, 0%, #111111, 100%);
            background-image: -moz-linear-gradient(top, #555555 0%, #111111 100%);
            background-image: linear-gradient(to bottom, #555555 0%, #111111 100%);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff555555', endColorstr='#ff111111', GradientType=0);
            background-attachment: fixed;
        }
        .logo
        {
            text-align: center;
        }
        .login-box
        {
            margin-top: 50px;
        }
        .box-slider
        {
            background-color: #f7f7f7;
        }
        .carousel-inner
        {
            text-align: center;
            font-size: 13px;
            line-height: 1.25;
        }
        .carousel-content 
        {
            color:black;
            align-items:center;
            padding: 13px 5px;
        }
        #text-carousel
        {
          width: 100%;
          height: auto;
          padding: 0px;
        }
        .funcion{
            color: #2aaf67;;
            font-family: Open Sans, sans-serif;     
            text-transform: uppercase;
            font-weight: bold;    
            font-size: 15px;  
        }
        .cantidad
        {
            color: #5a8ab9;
             font-family: Open Sans, sans-serif;  
               
        }
        .Beneficiarios
        {
            color: #f26522;
            font-family: Open Sans, sans-serif;           

        }
        .costo
        {
            color: #e52b50;
            font-family: Open Sans, sans-serif;   
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <div class="row">
                <div class="col-md-12 logo">
                    <img style="display: inline-block; height: 50px; width: 170px;" src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive">                              
                </div>
                <p class="login-box-msg">Inicie sesión</p>                
            </div>       
            <form action="<?php echo base_url("index.php/Login/ingresar");?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" autocomplete="off" class="form-control" placeholder="Ingrese usuario" name="txtUsuario" id="txtUsuario">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="txtPassword" id="txtPassword">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 container-box">
                        <div class="box-slider col-md-12">
                            <div class="row">
                                <div id="text-carousel" class="carousel slide" data-ride="carousel">
                                    <div class="row">
                                        <div class="col-xs-offset-3 col-xs-6">
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <div class="carousel-content">
                                                        <div>
                                                            <p class="funcion"><?=$Reporte[0]->nombre_funcion?></p>
                                                            <p class="cantidad"><?=$Reporte[0]->cantidad_pip?> Proyectos Registrados.</p>
                                                            <p class="Beneficiarios"><?=$Reporte[0]->total_beneficiarios?> Beneficiarios.</p>
                                                            <p class="costo">S/. <?=$Reporte[0]->costo_total?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                unset($Reporte[0]);
                                                foreach($Reporte as $item ) { ?>  
                                                <div class="item">
                                                    <div class="carousel-content">
                                                        <div>
                                                            <p class="funcion"><?=$item->nombre_funcion?></p>
                                                            <p class="cantidad"><?=$item->cantidad_pip?> Proyectos Registrados.</p>
                                                            <p class="Beneficiarios"><?=$item->total_beneficiarios?> Beneficiarios.</p>
                                                            <p class="costo">S/. <?=$item->costo_total?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>                                 
                                            </div>
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#text-carousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#text-carousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>                   
                            </div>                   
                        </div>   
                    </div>   
                </div>
            </form>
            <div style="text-align: center; padding:10px;">
                <a href="http://regionapurimac.gob.pe/" target="_blank">Gobierno Regional de Apurímac</a><br>             
            </div>            
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/adminlte/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/jquery.slimscroll.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/fastclick.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/app.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/adminlte.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/demo.js"> </script>
</body>
</html>-->
<!doctype html>
<html lang="en">
<style>
    .card 
           {
           background: linear-gradient(60deg, #f44336, #396388);
           
           }       
</style>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SMP TRACING</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/templateLogin/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/templateLogin/material-dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/templateLogin/demo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/#/dashboard">SMP TRACING</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://smp.regionapurimac.gob.pe/">
                           <i class="fa fa-th-large"> </i> Inicio
                        </a>
                    </li>
                    <li class=" active ">
                        <a href="#">
                           <i class="fa fa-sign-in"> </i>  Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?php echo base_url(); ?>assets/Img/laguna.jpg">

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form  action="<?php echo base_url("index.php/Login/ingresar");?>" method="post">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="blue">
                                        <h4 class="card-title">SMP TRACING</h4>
                                    </div>
                                    <p class="category text-center">
                                        Iniciar Sesión
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Ingrese Usuario</label>
                                                <input type="text" class="form-control" name="txtUsuario" id="txtUsuario">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Ingrese Contraseña</label>
                                                <input type="password" class="form-control"  name="txtPassword" id="txtPassword">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Ingresar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>


<script src="<?php echo base_url(); ?>assets/templateLogin/js/core/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/core/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/core/material.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/core/perfect-scrollbar.jquery.min.js"></script>

<!--<script src="<?php echo base_url(); ?>assets/templateLogin/js/core/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/bootstrap-notify.js"></script>

<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/jquery-jvectormap.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/nouislider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/jquery.select-bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/jquery.datatables.js"></script>

<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/jasny-bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/fullcalendar.min.js"></script>

<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/jquery.datatables.js"></script>-->

<script src="<?php echo base_url(); ?>assets/templateLogin/js/plugins/jquery.tagsinput.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/material-dashboard-angular.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/init/initMenu.js"></script>
<script src="<?php echo base_url(); ?>assets/templateLogin/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>




