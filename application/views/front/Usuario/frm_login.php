<!--<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SMP APURÍMAC</title>
  <link href="<?php echo base_url(); ?>assets/login/css/smp.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/login/css/style.css" rel="stylesheet">

</head>

<body>
<div class="pen-title">
  <h1 style="font-size: 40px;">Inicio de Sesión</h1><span>Gobierno Regional de Apurímac</span>
</div>
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Registrate</div>
  </div>
  <div class="form">
    <h2>Ingresa a tu cuenta</h2>
    <form id="login" method="post" action="<?php echo base_url("index.php/Login/ingresar");?>">
      <input type="text" placeholder="Ingrese su nombre de Usuario" name="txtUsuario" autocomplete="off" />
      <input type="password" placeholder="Ingrese su  Contraseña" name="txtPassword" />
      <button type="submit">Entrar</button>
    </form>
  </div>
  <div class="form">
    <h2>Crea una Cuenta</h2> 
    <form>
        <input type="text" placeholder="Ingresa tu nombre"/>
        <input type="text" placeholder="Ingresa tu apellido paterno"/>
        <input type="text" placeholder="Ingresa tu apellido materno"/>
        <input type="text" placeholder="Ingresa tu DNI"/>
        <input type="text" placeholder="Ingresa tu Direccion"/>
        <input type="tel" placeholder="Ingresa tu Telefono"/>
        <input type="email" placeholder="Ingresa tu Correo Electrónico"/>
        <input type="text" placeholder="Ingresa tu grado Acádemico"/>
        <input type="text" placeholder="Ingresa tu Especialidad"/>
        <input type="date" placeholder="Ingresa tu Fecha de Nacimiento"/>
        <input type="password" placeholder="Password"/>
        <button>Registrarse</button>
    </form>
  </div>
  <div class="cta"><a href="#">Olvidaste tu contraseña?</a></div>
</div>
  <script src="<?php echo base_url(); ?>assets/adminlte/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/login/js/index.js"></script>

</body>
</html>-->

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
    body{
    background:#E96D65;
    }
    .login-box-body, .register-box-body 
    {
        background:#FFCA03;
    }

    #carousel {
    position: relative;
    width:100%;
    margin:0 auto;
    }

    #slides {
    overflow: hidden;
    position: relative;
    width: 100%;
    height: 190px;
    }

    #slides ul {
    list-style: none;
    width:100%;
    height:90px;
    margin: 0;
    padding: 0;
    position: relative;
    }

     #slides li {
    width:100%;
    height:90px;
    float:left;
    text-align: center;
    position: relative;
    font-family:lato, sans-serif;
    }
    .btn-bar{
        max-width: 146px;
        margin: 0 auto;
        display: block;
        position: relative;
        top: 10px;
        width: 100%;
    }

     #buttons {
    padding:0 0 5px 0;
    float:right;
    }

    #buttons a {
    text-align:center;
    display:block;
    font-size:30px;
    float:left;
    outline:0;
    margin:0 20px;
    color:#b14943;
    text-decoration:none;
    display:block;
    padding:5px;
    width:35px;
    }

    a#prev:hover, a#next:hover {
    color:#FFF;
    text-shadow:.5px 0px #b14943;  
    }

    .quote-phrase, .quote-author {
    font-family:sans-serif;
    font-weight:300;
    display: table-cell;
    vertical-align: middle;
    padding: 0px 0px;
    font-family:'Lato', Calibri, Arial, sans-serif;
    }

    .quote-phrase {
    height: 10px;
    font-size:14px;
    color:#FFF;
    font-style:italic;
    text-shadow:.5px 0px #b14943;  
    }

    .quote-marks {
    font-size:10px;
    padding:0 3px 3px;
    position:inherit;
    }

    .quote-author {
    font-style:normal;
    font-size:20px;
    color:#b14943;
    font-weight:400;
    height: 30px;
    }

    .quoteContainer, .authorContainer {
    display: table;
    width: 100%;
    padding-bottom: 0px;
    padding-top: 0px;
    }
    .msg{
        color: black;
        font-size: 18px;
        font-style: bold;
    }
    .msgTitulo{
        color: white;
        font-size: 18px;
        text-shadow:.5px 0px #b14943;  
    }
</style>
</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
    </header>
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header"></section>
            <section class="content">
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="margin-top: 120px;">
                        <div class="col-md-12 col-xs-12" style="background-color:#43B6CC; margin-top: 20px; border-radius: 10px; height: 230px;" id="carousel">
                            <div class="btn-bar">
                                <div id="buttons">
                                    <div class="col-md-6 col-xs-6">
                                        <a id="prev" href="#"><</a>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <a id="next" href="#">></a> 
                                    </div>
                                </div>
                            </div>
                            <div id="slides" class="col-md-12 col-xs-12">
                                <ul>
                                    <?php foreach($Reporte as $item ) { ?>
                                    <li class="slide">
                                        <div class="quoteContainer">
                                            <p class="quote-phrase col-md-12 col-xs-12 msgTitulo">Función</p><br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msg"><?=$item->nombre_funcion?></p><br>
                                            <br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msg">
                                            <?php if($item->cantidad_pip>=2) 
                                                    echo $item->cantidad_pip." Proyectos Registrados";
                                                else
                                                    echo $item->cantidad_pip." Proyecto Registrado";?>
                                            </p>
                                            <br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msg">
                                            <?=
                                            ($item->total_beneficiarios)?> Beneficiarios</p>
                                            <br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msg">S/. <?=$item->costo_total?></p><br>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>  
                            <!--<div id="slides" class="col-md-12 col-xs-12">
                                <ul>
                                    <?php foreach($Reporte as $item ) { ?>
                                    <li class="slide">
                                        <div class="quoteContainer">
                                            <p class="quote-phrase col-md-12 col-xs-12 msgTitulo">Función</p><br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msg">Educación</p><br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msgTitulo">Beneficiarios</p><br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msg">36,446.00</p><br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msgTitulo">Costo</p><br>
                                            <p class="quote-phrase col-md-12 col-xs-12 msg">S/. 97,279,294.42</p><br>
                                        </div>
                                    </li>
                                    <li class="slide" class="col-md-12 col-xs-12">
                                        <div class="quoteContainer col-md-12 col-xs-12" >
                                            <p class="quote-phrase col-md-12 col-xs-12" > 122 I could not stop staring! </p>
                                            <br>
                                            <p class="quote-phrase col-md-12 col-xs-12"> 112 I was literally BLOWN!</p>
                                            <br>
                                            <p class="quote-phrase col-md-12 col-xs-12"> 112 I was literally BLOWN!</p>
                                        </div>
                                    </li>
                                    <li class="slide col-md-12 col-xs-12">
                                        <div class="quoteContainer col-md-12 col-xs-12">
                                            <p class="quote-phrase col-md-12 col-xs-12"> 133 Carl Fakeguy, was the most helpful designer I've ever hired!</p>
                                            <br>
                                            <p class="quote-phrase col-md-12 col-xs-12"> 113 I was literally BLOWN!</p>
                                            <br>
                                            <p class="quote-phrase col-md-12 col-xs-12"> 113 I was literally BLOWN!</p>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>     -->            
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="login-box" style="padding-top: 80px;">
                            <div class="login-logo">
                            </div>
                            <div class="login-box-body">
                                <p class="login-box-msg">Iniciar Sesión</p>
                                <form method="post" action="<?php echo base_url("index.php/Login/ingresar");?>">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control" placeholder="Usuario" name="txtUsuario" id="txtUsuario">
                                        <span class="fa fa-user form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="password" class="form-control" placeholder="Contraseña" name="txtPassword" id="txtPassword">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                
                    </div> 
                </div>
            </section>
        </div>
    </div>
</div>
  <script src="<?php echo base_url(); ?>assets/adminlte/jquery-2.2.3.min.js"></script>
<script>
    $(document).ready(function () 
    {
        var speed = 5000;    
        var run = setInterval(rotate, speed);
        var slides = $('.slide');
        var container = $('#slides ul');
        var elm = container.find(':first-child').prop("tagName");
        var item_width = container.width();
        var previous = 'prev'; //id of previous button
        var next = 'next'; //id of next button
        slides.width(item_width); //set the slides to the correct pixel width
        container.parent().width(item_width);
        container.width(slides.length * item_width); //set the slides container to the correct total width
        container.find(elm + ':first').before(container.find(elm + ':last'));
        resetSlides();

        $('#buttons a').click(function (e) 
        {
            if (container.is(':animated')) 
            {
                return false;
            }
            if (e.target.id == previous) 
            {
                container.stop().animate({
                    'left': 0
                }, 1500, function () {
                    container.find(elm + ':first').before(container.find(elm + ':last'));
                    resetSlides();
                });
            }
            
            if (e.target.id == next) 
            {
                container.stop().animate({
                    'left': item_width * -2
                }, 1500, function () {
                    container.find(elm + ':last').after(container.find(elm + ':first'));
                    resetSlides();
                });
            }
            return false;            
        });
        
        container.parent().mouseenter(function () 
        {
            clearInterval(run);
        }).mouseleave(function () 
        {
            run = setInterval(rotate, speed);
        });
    
    
        function resetSlides() 
        {
            container.css({
                'left': -1 * item_width
            });
        }
    
    });
    function rotate() 
    {
        $('#next').click();
    }
</script>
<script src="<?php echo base_url(); ?>assets/adminlte/jquery-2.2.3.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/jquery.slimscroll.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/fastclick.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/app.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/adminlte.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/adminlte/demo.js"> </script>

<!--

<script src="../../bower_components/jquery/jquery-3.2.1.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>-->
</body>
</html>



