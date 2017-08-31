<!--<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMP-APURIMAC</title>

    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">

	<style>
		.tooltip-inner
		{
			max-width: none;
			white-space: nowrap;
			background:white;
			border:1px solid lightgray;
			-webkit-box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.3);
			-moz-box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.3);
			box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.3);
			color:gray;
			margin:0;
			padding:0;
		}

		.tooltip.bottom .tooltip-arrow
		{
			top: 0;
			left: 50%;
			margin-left: -5px;
			border-bottom-color: lightgray;
			border-width: 0 5px 5px;
		}
	</style>

	<script>
		var base_url = '<?php echo base_url(); ?>';
	</script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
             <form  id="login" class="form-horizontal" method="post" action="<?php echo base_url("index.php/Login/ingresar");?>">
              <h1> Inicio de Sesión</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" id="txt_usuario" name="txt_usuario" autocomplete="off" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="Password" id="Password" />
              </div>
			<div>
				<button type="submit" class="btn btn-default">Entrar</button>
        <input type="submit" class="btn btn-default" value="Ingresar">
				<a class="reset_pass" href="#"></a>
			</div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <p></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" >Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
	<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/Usuario/login.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<script>
		$(function()
		{
			$('#txt_usuario').tooltip({ "placement" : "right", "html" : true, "trigger" : "focus", "title" : "<div style=\"padding: 4px;\">Ingrese su nombre de usuario.</div>" });
			$('#Password').tooltip({ "placement" : "right", "html" : true, "trigger" : "focus", "title" : "<div style=\"padding: 4px;\">Ingres su contraseña.</div>" });		
		});
	</script>
</html>-->

<!DOCTYPE html>
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
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Registrarse</button>
    </form>
  </div>
  <div class="cta"><a href="http://andytran.me">Forgot your password?</a></div>
</div>
  <script src="<?php echo base_url(); ?>assets/adminlte/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/login/js/index.js"></script>

</body>
</html>

