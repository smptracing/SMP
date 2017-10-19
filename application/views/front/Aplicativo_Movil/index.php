<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Movil-GORE</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->

  <link href="<?php echo base_url(); ?>assets/adminlte/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/adminlte/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/AdminLTE.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte/_all-skins.min.css" rel="stylesheet">
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1uRF6cxgwFc9DGwREFvIE6oorBaWny64&callback=initMap"></script>
  <style>
    .main-footer 
    {
      background: #3c8dbc;
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
        background-color: #3c8dbc;
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

    }
    .zoom-in{
        padding-top: 30px;
    }
    .thebox:hover {
        transform: scale(1.125);
    }
    .box-container{
        padding-top: 10px;
        padding-bottom: 50px;
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
  <script>
function initMap() {
 // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
 var map = new google.maps.Map(document.getElementById('mapa'), {
 center: {lat: 43.2686751, lng: -2.9340005},
 scrollwheel: false,
 zoom: 8,
 zoomControl: true,
 rotateControl : false,
 mapTypeControl: true,
 streetViewControl: false,
 });
 // Creamos dos marcadores.
 var marker1 = new google.maps.Marker({
 position: {lat: 43.2686751, lng: -2.9340005}, 
 icon: "<?php echo base_url(); ?>assets/images/localizacion/carretera.png", 
 draggable: false
 });
 // a este marcador le añadimos un icono personalizado
 var marker2 = new google.maps.Marker({
 position: {lat: 42.8286751, lng: -3.0990005}, 
 icon: "<?php echo base_url(); ?>assets/images/localizacion/obras.png", 
 draggable: false
 });
// Le asignamos el mapa a los marcadores.
 marker1.setMap(map);
 marker2.setMap(map);
}
</script>
</head>
</head>
<body class="hold-transition skin-blue layout-top-nav"  onload="initMap()">
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

  </header>
  <div class="content-wrapper">
    <div class="container">
      <section class="content" style="margin-top: 50px;"> <!-- Main content -->
      <div class="row box-container">
      
            <div class="col-md-12 col-xs-12">
                                 
               


      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PMI</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">FORMULACION</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">EJECUCIÓN</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">FUNCIONAMIENTO</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
     
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
           
                <!-- /.col -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Proyectos de localización</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="mapa" style="height: 325px;">
                      assd
                    </div>

                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Visits</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">30%</h5>
                      <span class="description-text">Referrals</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text">Organic</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.row -->

        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PIP</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">NO PIP</span>
              <span class="info-box-number">92,050</span>
				
              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    <!-- /.content -->







                 
                    
             </div>
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