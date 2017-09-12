<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>REPORTE POR PROYECTO DE INVERSIÓN</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab_Sector"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
										<b> Proyecto de Inversión</b>
									</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<!-- /Contenido del sector -->
								<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
									<!-- /tabla de sector desde el row -->
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="x_panel">
													<div class="clearfix">
														<div class="pull-right tableTools-container"></div>
													</div>
													<div class="x_content">
														BÚSQUEDA POR CÓDIGO 

														<div class="row">
													
														  <div class="col-lg-6">
														    <div class="input-group">
														      <input type="text" id="BuscarPip"  class="form-control">
														      <span class="input-group-btn">
														        <button id="CodigoUnico" class="btn btn-default" type="button" placeholder="Ingrese código Unico">Buscar</button>
														      </span>
														    </div>
														  </div>
														</div>
														<div class="row" style="margin-left: 10px; margin:10px; ">
															<div class="panel panel-default">
																 <div class="panel-heading"> EJECUCIÓN ANUAL DEL PROYECTO</div>
																 
																	  <div id="EjecucionAnual">
																			
																			<table class="table  table-striped jambo_table bulk_action" style="text-align: left;">
																			    <thead>
																			      
																			    </thead>
																			    <tbody>
																			      <tr>
																				        <td>NOMBRE</td>
																				        <td> <label style="text-align: center;" id="txtnombre" name="txtnombre"></label></td>
																				        <td></td>
																			      </tr>
																			      <tr>
																				        <td>CÓDIGO</td>
																				        <td> <label  id="txtCodigo" name="txtCodigo"></label> </td>
																				        <td></td>
																			      </tr>
																			      <tr>
																				        <td>N° BENEFICIARIOS</td>
																				        <td> <label id="txtbeneficiario" name="txtbeneficiario"></label> </td>
																				        <td></td>
																			      </tr>
																			       <tr>
																				        <td>MONTO DE INSERSIÓN</td>
																				        <td> S/. <label id="txtmontoInversion" name="txtmontoInversion"></label> </td>
																				        <td></td>
																			      </tr>
																			       <tr>
																				        <td>PIA</td>
																				        <td> <label id="txtPIA" name="txtPIA"></label> </td>
																				        <td></td>
																			      </tr>
																			       <tr>
																				        <td>PIM</td>
																				        <td> <label id="txtPIN" name="txtPIN"></label> </td>
																				        <td></td>
																			      </tr>
																			       <tr>
																				        <td>DEVENGADO</td>
																				        <td> <label id="txtdevengado" name="txtdevengado"></label> </td>
																				        <td></td>
																			      </tr>
																			    </tbody>
																		  </table> 
																	  </div>
																	
																</div>
														</div>
														<div class="row">

												            <div class="col-md-12 col-sm-4 col-xs-12">
												                <div class="x_panel">
												                    <div class="x_title">
												                        <h5> PIA, PIM Y DEVENGADO</h5>

												                        <div class="clearfix"></div>
												                    </div>
												                    <div class="x_content">
												                        <div id="pimdevengadopia" style="height:350px;"></div>
												                    </div>
												                </div>
													        </div>
													         <div class="col-md-12 col-sm-4 col-xs-12">
												                <div class="x_panel">
												                    <div class="x_title">
												                        <h5> PIA, PIM Y DEVENGADO</h5>

												                        <div class="clearfix"></div>
												                    </div>
												                    <div class="x_content">
												                        <div id="pimdevengadopialineasAnual" style="height:350px;"></div>
												                    </div>
												                </div>
													        </div>
														</div>
											</div>
										</div>
									</div>
										<!-- / fin tabla de sector desde el row -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<script>

$(document).on("ready" ,function(){
	
$("#EjecucionAnual").hide();
$("#CodigoUnico").on( "click", function()
	 {
		$("#EjecucionAnual").show(2000);
		var codigounico=$("#BuscarPip").val();
		$.ajax({
		"url":base_url+"index.php/PrincipalReportes/DatosParaEstadisticaAnualProyecto",
		type:"POST",
		data:{codigounico:codigounico},
		success: function(data)
			{
		        console.log(data);
		        var cantidadpipprovincias=JSON.parse(data); 
		        $("#txtCodigo").html(cantidadpipprovincias.codigo_unico_pi);
		        $("#txtnombre").html(cantidadpipprovincias.nombre_pi);
		        $("#txtbeneficiario").html(cantidadpipprovincias.num_beneficiarios);
		        $("#txtmontoInversion").html(cantidadpipprovincias.costo_pi);
		        $("#txtPIA").html(cantidadpipprovincias.pia_meta_pres);
		        $("#txtPIN").html(cantidadpipprovincias.pim_acumulado);
		        $("#txtdevengado").html(cantidadpipprovincias.pim_acumulado);
			}
		});
		$.ajax({
				"url":base_url+"index.php/PrincipalReportes/BuscadorPipPorCodigoReporte",
				type:"GET", 
				data:{codigounico:codigounico},
				cache:false,
				success:function(resp)
				{
						var cantidadpipprovincias=JSON.parse(resp);
						console.log(cantidadpipprovincias);
						var dom = document.getElementById("pimdevengadopia");
						var myChart = echarts.init(dom);
						var app = {};
						option = null;
						app.title = 'PIM,PIA Y DEVENGADO';
						option = {
						    color: ['#F5CBA7'],
						    tooltip : {
						        trigger: 'axis',
						        axisPointer : {          
						            type : 'shadow'        
						        }
						    },
						    grid: {
						        left: '3%',
						        right: '4%',
						        bottom: '3%',
						        containLabel: true
						    },
						    xAxis : [
						        {
						            type : 'category',
						            data : ['PIA', 'PIM', 'DEVENGADO'],
						            axisTick: {
						                alignWithLabel: true
						            }
						        }
						    ],
						    yAxis : [
						        {
						            type : 'value'
						        }
						    ],
						    series : [
						        {
						            name:'Montos',
						            type:'bar',
						            barWidth: '60%',
						            data:cantidadpipprovincias
						        }
						    ]
						};
						;
						if (option && typeof option === "object") {
						    myChart.setOption(option, true);
						}
					}
				});

			$.ajax({
				"url":base_url+"index.php/PrincipalReportes/BuscadorPipPorCodigoReporte",
				type:"GET", 
				data:{codigounico:codigounico},
				cache:false,
				success:function(resp)
				{
						var cantidadpipprovincias=JSON.parse(resp);
						var dom = document.getElementById("pimdevengadopialineasAnual");
						var myChart = echarts.init(dom);
						var app = {};
						option = null;
						option = {
						    title: {
						        text: 'PIA, PIM Y DEVENGADO ANUAL ',
						        subtext: '',
						        sublink: ''
						    },
						    tooltip : {
						        trigger: 'axis',
						        axisPointer : {            
						            type : 'shadow'        
						        },
						        formatter: function (params) {
						            var tar = params[1];
						            return tar.name + '<br/>' + tar.seriesName + ' : ' + tar.value;
						        }
						    },
						    grid: {
						        left: '3%',
						        right: '4%',
						        bottom: '3%',
						        containLabel: true
						    },
						    xAxis: {
						        type : 'category',
						        splitLine: {show:false},
						        data : ['2014','2015','2016','2017','2018','2020']
						    },
						    yAxis: {
						        type : 'value'
						    },
						    series: [
						        {
						            name: '辅助',
						            type: 'bar',
						            stack:  '总量',
						            itemStyle: {
						                normal: {
						                    barBorderColor: 'rgba(0,255,0,0.3)',
						                    color: 'rgba(0,255,0,0.3)'
						                },
						                emphasis: {
						                    barBorderColor: 'rgba(0,255,0,0.3)',
						                    color: 'rgba(0,255,0,0.3)'
						                }
						            },
						            data: [0, 0, 0, 0, 0, 0]
						        },
						        {
						            name: '生活费',
						            type: 'bar',
						            stack: '总量',
						            label: {
						                normal: {
						                    show: true,
						                    position: 'inside'
						                }
						            },
						            data:[2900, 1200, 300, 200, 900, 300]
						        }
						    ]
						};
						;
						if (option && typeof option === "object") {
						    myChart.setOption(option, true);
						}
												
				}

			});

		});
	
});
</script>

