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
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .content-wrapper{
            /*background: url('assets/images/001.jpg');
            background-repeat: repeat;
            background-size: 80px 60px;*/
            background-color: #36404a;

        }
        .container-box
        {
            padding: 20px;
        }
        .box-slider
        {
            border-radius: 10px;
            margin:10px;
            padding: 20px;
            text-align: center;
            box-shadow:             
        }
        .log-box
        {
            padding: 20px;
            
        }
        .register-box-body
        {
            border-radius: 10px;
        }
        .header-logo
        {
            text-align: right;
            padding : 20px;
        }
        .header-left
        {
            text-align: left;
            padding: 20px;
            padding-bottom: 0px;
        }
        .footer-leg
        {
            padding: 20px;
        }
        .btn-primary {
            background-color: #5fbeaa;
            border-color: #5fbeaa;
        }
        .btn-primary:hover {
            background-color: #5fbeaa;
            border-color: #5fbeaa;
        }
        @media (max-width: 990px) 
        {
            .header-logo
            {
                text-align: center;
                padding : 20px;
            }
            .header-left
            {
                text-align: center;
                padding: 20px;
                padding-bottom: 0px;
            }
        }
    </style>
</head>

<body class="hold-transition skin-blue layout-top-nav" >
<div class="wrapper">
    <header class="main-header">
    </header>
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12" style="background-color: #ebeff2;">
                        <div class="col-md-6" style="background-color: #ebeff2;">
                            <div class="col-md-12 header-left">
                                <img style="display: inline-block; height: 70px; width: 200px;" src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive">                                
                            </div>
                            <div class="col-md-12" >
                                <span>Software de Seguimiento y Monitoreo de los PIPs</span>                                
                            </div>
                            <div class="col-md-12 container-box">
                                <div class="col-md-12 box-slider" style="background-color: #ceebe5; border:1px solid #5fbeaa; box-shadow: 1px 3px 3px #888888;">
                                    <span>Software de Seguimiento y Monitoreo de los PIPs</span>                                
                                </div>
                                <div class="col-md-12 box-slider" style="background-color: #e3e0f1; border:1px solid #7266ba; box-shadow: 1px 3px 3px #888888;">
                                    <span>Software de Seguimiento y Monitoreo de los PIPs</span>                                
                                </div>    
                                <div class="col-md-12 box-slider" style="background-color: #fff2db; border:1px solid #ffbd4a; box-shadow: 1px 3px 3px #888888;">
                                    <span>Software de Seguimiento y Monitoreo de los PIPs</span>                                
                                </div>                                                            
                            </div>                          
                            
                        </div>
                        <div class="col-md-6" style="background-color: #ebeff2;">
                            <div class="col-md-12 header-logo">
                                <img style="display: inline-block; height: 70px; width: 200px;" src="<?php echo base_url(); ?>assets/images/log.png" alt=""  class="img-responsive">
                            </div>
                            <div class="col-md-12 log-box">
                                <div class="register-box-body ">
                                    <p class="login-box-msg">Iniciar Sesión</p>
                                    <form method="post" action="<?php echo base_url("index.php/Login/ingresar");?>">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control" placeholder="Usuario" name="txtUsuario" id="txtUsuario">
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input type="password" class="form-control" placeholder="Contraseña" name="txtPassword" id="txtPassword">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class=" col-md-4 col-xs-12">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>                   
                            </div>
                            
                        </div>                        
                    </div>
                    <div class="col-md-12 footer-leg" style="background-color: #ffffff; ">
                        <span>¿Que es SMP TRACING?</span>
                        <p>SMP Tracing v1.0 es un Sistema que permite optimizar, gestionar y admistrar los procesos de inversión pública en sus diferentes fases y etapas. Su objetivo es brindar información relevante, oportuna y disponible para una toma de decisiones rápidas, informadas y efectivas.</p>
                        
                    </div>
                </div>
            </section>
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
</html>



