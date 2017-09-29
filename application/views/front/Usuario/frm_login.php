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
            background-color: /*rgba(29, 101, 160, 0.42);*/#f7f7f7;
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
            color: #58bf77;
            font-family: Open Sans, sans-serif;     
            text-transform: uppercase;
            font-weight: bold;    
            font-size: 15px;  
        }
        .cantidad
        {
            color: #3c8dbc;
             font-family: Open Sans, sans-serif;  
               
        }
        .Beneficiarios
        {
            color: #e04f00;
            font-family: Open Sans, sans-serif;           

        }
        .costo
        {
            color: #58bf77;
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
                                                <?php foreach($Reporte as $item ) { ?>  
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
</html>



