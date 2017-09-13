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
</html>

