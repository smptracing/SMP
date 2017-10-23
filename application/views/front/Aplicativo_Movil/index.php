<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Localización</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/localizacion/favicon.ico">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/adminlte/jquery-2.2.3.min.js"> </script>
  <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>


  <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/ionicons.min.css">

  <link href="<?php echo base_url(); ?>assets/adminlte/AdminLTE.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/adminlte/_all-skins.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/morris.js/morris.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/jvectormap/jquery-jvectormap.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link href="<?php echo base_url(); ?>assets/adminlte/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/adminlte/jquery.slimscroll.min.js"> </script>
	<script src="<?php echo base_url(); ?>assets/adminlte/fastclick.min.js"> </script>
	<script src="<?php echo base_url(); ?>assets/adminlte/app.min.js"> </script>
	<script src="<?php echo base_url(); ?>assets/adminlte/demo.js"> </script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1uRF6cxgwFc9DGwREFvIE6oorBaWny64&callback=initialize">
  </script>
  <style>
    .main-footer 
    {
      background: #2b3f4a;
      padding: 15px;
      color: #fff;
      border-top: 1px solid #d2d6de;
    }
    .content-wrapper
    {
      
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
        background-color: #2b3f4a;
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
    table{
    	font-size:10px;
    	font-family: arial, sans-serif;
    }
    /*table {
	   width: 100%;
	   border: 1px solid #000;
	}
	table tr {background-color: yellow; }*/
  </style>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<script>
var base_url = '<?php echo base_url(); ?>';
</script>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header" style="padding-top: 13px;">
          <a href="<?php echo site_url('Inicio'); ?>" >
            <img id="logoRegion" style="display: inline-block; height: 70px; width: 185px; opacity: 1;margin-top: -15px;" src="<?php echo base_url(); ?>assets/images/gore.png" class="img-responsive">
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
      <section class="content" style="margin-top: 30px;"> <!-- Main content -->
      <div class="row box-container">
      
    <div class="col-md-12 col-xs-12">
      <div class="row">

        <div class="col-md-8">

		    <div class="panel panel-default">
					<div class="panel-heading">
					 	<div class="row">

					             <div class="col-md-5 col-sm-8">
					             	<h5>Localización</h5>
					             </div>
		  						 <div class="col-md-5">
		  							<div class="input-group">
		  									<input type="text" id="BuscarPip"  class="form-control" placeholder="Ingrese código Único" value="">
		  									<span class="input-group-btn">
		  									<button id="CodigoUnico" class="btn btn-default" type="button" ><span class="glyphicon glyphicon-search"> Buscar</span></button>
		  									</span>
		  							</div>
		  						</div>
			        	</div>

					</div>
					<div class="panel-body">
							

				              <div class="row">
				                <div class="col-md-12 col-sm-8">
				                  <div class="pad">
				                    <div id="mapa" style="height: 490px;margin-top: -21px;">
				                      
				                    </div>

				                  </div>
				                </div>
				              </div>
				    </div>

		    </div>
        </div>

        <div class="col-md-4">

			 <div class="row" style="margin-top: -50px;">
	        	<div class="col-md-12">
	          		<div class="box box-solid">
	           			 <div class="box-header with-border">
			  			  <div id="EjecucionAnual" align="justify">
					
								<table class="table table-striped  table-hover">
								  
									<tr>
										<td class="blue" width="120"><b>Código</b></td>
										<td > <label  id="txtCodigo" name="txtCodigo"></label> </td>
									</tr>
									<tr>
										<td class="blue"><b>Nombre</b></td>
										<td > <label  id="txtnombre" name="txtnombre"></label></td>
									</tr>
									<tr>
										<td class="blue" ><b>N° Beneficiarios</b></td>
										<td> <label id="txtbeneficiario" name="txtbeneficiario"></label> </td>
									</tr>
									<tr>
										<td class="blue" ><b>Monto de Inversión</b></td>
										<td> S/. <label id="txtmontoInversion" name="txtmontoInversion"></label> </td>
									</tr>
									
							  </table> 

						</div>

            </div>
            <div class="box-body">
              <div class="box-group" id="accordion">
           
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    
						<div class="info-box bg-yellow">
				            <span class="info-box-icon"><i class="fa fa-area-chart"></i></span>

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
			          	</div>

                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
	                    <div style="margin-top: -30px;">
							<label style="color: gray">Función</label>
							<select class="form-control" id="comboboxfuncion" name="comboboxfuncion">
								<option value="1" style="font-size:10px">Elija Función</option>
								<?php foreach($comboboxfuncion as $item){ ?>
									<option value="<?=$item->id_funcion; ?>"  style="font-size:9.5px"><?= $item->nombre_funcion;?></option>
								<?php } ?>
						
							</select>
	                    </div>
	                    <div>
							<label style="color: gray">División funcional</label>
							<select class="form-control" id="comboboxdivisionfuncional" name="comboboxdivisionfuncional">
								<option style="font-size:9.5px">Elija División Funcional</option>
							</select>
	                  	</div>

	                  	<div>
							<label style="color: gray">Grupo funcional</label>
							<select class="form-control" id="comboboxgrupofuncional" name="comboboxgrupofuncional" onclick="mapaUbicacionProyecto();">
								<option style="font-size:9.5px">Elija Grupo Funcional</option>
							</select>
	                  	</div>
                    </div>
                  </div>
                </div>

                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        
						<div class="info-box bg-green">
			            <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>

				            <div class="info-box-content">
				              <span class="info-box-text">NO PIP</span>
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

                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      
                		<div>
							<label style="color: gray">Tipo No Pip</label>
							<select class="form-control" id="comboboxtiponopi" name="comboboxtiponopi" onclick="mapaUbicacionNoPip();">
							<option value="1" style="font-size:9.5px">Elija Tipo No PIP</option>
			
							<?php foreach($comboboxtiponopip as $item){ ?>
								<option value="<?=$item->id_tipo_nopip; ?>"  style="font-size:9.5px"><?= $item->desc_tipo_nopip;?></option>
							<?php } ?>
					
							</select>
	                    </div>

                    </div>
                  </div>
                </div>

				

              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

         

   </div>

      </div>
       <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <div class="row">
 
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
         </div>
     	</div> 
    </section>
    </div>
  </div>
  <footer class="main-footer">
    <div class="container">   
	      <div class="pull-right hidden-xs">
	      </div>

	      <strong>Copyright &copy; 2017-2019 - </strong> Todos los derechos reservados.
    </div>
  </footer>
</div>


<script type="text/javascript">
	$(document).ready(function()
	{
		initialize();
		$("#EjecucionAnual").hide();
		$("#CodigoUnico").on("click", function() 
		{
			$("#EjecucionAnual").show(2000);
			var codigounico=$("#BuscarPip").val();

				$.ajax({
				"url":base_url+"index.php/AplicativoMovil/DatosGeneralesdelPip",
				type:"POST",
				data:{codigounico:codigounico},
				success: function(data)
					{
				        var cantidadpipprovincias=JSON.parse(data); 
				        $("#txtCodigo").html(cantidadpipprovincias.codigo_unico_pi);
				        $("#txtnombre").html(cantidadpipprovincias.nombre_pi);
				        $("#txtbeneficiario").html(cantidadpipprovincias.num_beneficiarios);
				        $("#txtmontoInversion").html(cantidadpipprovincias.costo_pi);
				       
					}
				});
		});


		$("#comboboxfuncion" ).change(function() {
		var idFuncion=$("#comboboxfuncion").val();
		var parametros = {
                "idFuncion" : idFuncion
        	};
        $.ajax({
                data:  parametros,
                url:    base_url+'index.php/Funcion/GetDivisionFuncional',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) {
                	//alert(response);
                	var html;
            		objectJSON=JSON.parse(response);
                 	
                	$("#comboboxdivisionfuncional").html('');
                	html +='<option value="">Elija División Funcional </option>';
                	$.each(objectJSON,function(index,element)
                	{
                	 html +='<option value="'+element.id_div_funcional+'">'+element.nombre_div_funcional+'</option>';
                	});
             		$("#comboboxdivisionfuncional").append(html);               
                }
        	});
		});
		$("#comboboxdivisionfuncional" ).change(function() {
		var idDivisionFuncional=$("#comboboxdivisionfuncional").val();
		var parametros = {
                "idDivisionFuncional" : idDivisionFuncional
        	};
        $.ajax({
                data:  parametros,
                url:    base_url+'index.php/Funcion/GetGrupoFuncional',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) {
                	var html;
            		objectJSON=JSON.parse(response);
                 	
                	$("#comboboxgrupofuncional").html('');
                	html +='<option value="">Elija Grupo Funcional </option>';
                	$.each(objectJSON,function(index,element)
                	{
                	 html +='<option value="'+element.id_grup_funcional+'">'+element.nombre_grup_funcional+'</option>';
                	});
             		$("#comboboxgrupofuncional").append(html);             
                }
        	});
		});
	
	});


    function initialize() {
    	 var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 9,
        center: new google.maps.LatLng(-13.871858, -72.867959),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var marker, i,marker1;
      var infowindow = new google.maps.InfoWindow();

      $.ajax(
   		 {
		        url: base_url+"index.php/AplicativoMovil/listaTotalDeUbicacionesProyecto",
		        type: "POST",
		        success: function(marcadores)
		        {

		        	// console.log(marcadores);
		        	 var marcadores=JSON.parse(marcadores);

				      for (i = 0; i < marcadores.length; i++) 
				  		{  
					        marker = new google.maps.Marker({
					          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
					          map: map,
					          icon: "<?php echo base_url(); ?>uploads/IconosSector/"+marcadores[i][3], 
					        });
					        google.maps.event.addListener(marker, 'click', (function(marker, i) {
					          return function() {
					            infowindow.setContent(marcadores[i][0]);
					            infowindow.open(map, marker);
					          }
					        })(marker, i));

		  				}
		  				
		  		}

   		 });
   
    }
    function mapaUbicacionProyecto()
    {
    	 
    	 var map = new google.maps.Map(document.getElementById('mapa'), {
	        zoom: 9,
	        center: new google.maps.LatLng(-13.871858, -72.867959),
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	      });
	      var marker, i,marker1;
	      var infowindow = new google.maps.InfoWindow();

    	 var id_grup_funcional=$("#comboboxgrupofuncional").val();
    	 var parametros = {
                "id_grup_funcional" : id_grup_funcional
        	};
    	 $.ajax(
   		 {
		        data:  parametros,
		        url: base_url+"index.php/AplicativoMovil/listadoProyectoGrupoFuncional",
		        type: "POST",
		        success: function(marcadores)
		        {
		        	console.log(marcadores);
		        	 var marcadores=JSON.parse(marcadores);

				      for (i = 0; i < marcadores.length; i++) 
				  		{  
					        marker = new google.maps.Marker({
					          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
					          map: map,
					          icon: "<?php echo base_url(); ?>uploads/IconosSector/"+marcadores[i][3], 
					        });
					        google.maps.event.addListener(marker, 'click', (function(marker, i) {
					          return function() {
					            infowindow.setContent(marcadores[i][0]);
					            infowindow.open(map, marker);
					          }
					        })(marker, i));

		  				}
		  				
		  		}

   		 });
    }

    function mapaUbicacionNoPip()
    {
    	 
    	var map = new google.maps.Map(document.getElementById('mapa'), {
	        zoom: 9,
	        center: new google.maps.LatLng(-13.871858, -72.867959),
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    });
	    var marker, i,marker1;
	    var infowindow = new google.maps.InfoWindow();

    	var id_tipo_nopip=$("#comboboxtiponopi").val();
    	var parametros = {
                "id_tipo_nopip" : id_tipo_nopip
        	};
    	 $.ajax(
   		 {
		        data:  parametros,
		        url: base_url+"index.php/AplicativoMovil/listadoNoPipPorTipoNoPip",
		        type: "POST",
		        success: function(marcadores)
		        {
		        	//alert(marcadores);
		        	console.log(marcadores);
		        	var marcadores=JSON.parse(marcadores);

				      for (i = 0; i < marcadores.length; i++) 
				  		{  
					        marker = new google.maps.Marker({
					          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
					          map: map,
					          icon: "<?php echo base_url(); ?>uploads/IconosSector/"+marcadores[i][3], 
					        });
					        google.maps.event.addListener(marker, 'click', (function(marker, i) {
					          return function() {
					            infowindow.setContent(marcadores[i][0]);
					            infowindow.open(map, marker);
					          }
					        })(marker, i));

		  				}
		  				
		  		}

   		 });
    }
  
   	
    </script>
</body>
</html>
