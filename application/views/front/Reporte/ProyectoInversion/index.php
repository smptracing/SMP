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
																 <div class="panel-heading">Ejecución Anual del Proyecto</div>
																 
																	  <div class="panel-body">
																			
																			<div class="col-lg-12" id="nombreProyecto">
																			              
																		    </div>

																			<div class="col-lg-6">
																			      <label class="col-sm-2" for="email">CÓDIGO</label>
																				  <input type="text"  class="form-control" id="txtCodigo" name="txtCodigo">
																			 </div>							
																		    <div class="col-lg-6">
																			        <label class=" col-sm-4" for="pwd">N° BENEFICIARIOS</label>
																			        <input type="text" class="form-control"  id="beneficiario" name="beneficiario">
																		    </div> 
																		    <div class="col-lg-6">
																			        <label class=" col-sm-6" for="pwd">MONTO DE INSERSIÓN</label>
																			        <input type="text" class="form-control"  id="txtmontoInversion" name="txtmontoInversion">
																		    </div> 
																		    <div class="col-lg-6">
																			        <label class=" col-sm-6" for="pwd">PIA</label>
																			        <input type="text" class="form-control"  id="txtPIA" name="txtPIA">
																		    </div> 
																		    <div class="col-lg-6">
																			        <label class=" col-sm-6" for="pwd">PIM</label>
																			        <input type="text" class="form-control"  id="txtPIN" name="txtPIN">
																		    </div> 
																		    <div class="col-lg-6">
																			        <label class=" col-sm-6" for="pwd">DEVENGADO</label>
																			        <input type="text" class="form-control"  id="txtdevengado" name="txtdevengado">
																		    </div> 
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
												                        <div id="pimdevengadopialineas" style="height:350px;"></div>
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

$("#CodigoUnico").on( "click", function()
	 {
		$("#txtnombre").html('');
		$("#nombreProyecto").append( "<label  style='border: 2px solid black; text-align: center;' class='col-sm-12' id='txtnombre' name='txtnombre'></label>" );
		var codigounico=$("#BuscarPip").val();
		$.ajax({
		"url":base_url+"index.php/PrincipalReportes/DatosParaEstadisticaAnualProyecto",
		type:"POST",
		data:{codigounico:codigounico},
		success: function(data)
			{
		        console.log(data);
		        var cantidadpipprovincias=JSON.parse(data); 
		        $("#txtCodigo").val(cantidadpipprovincias.codigo_unico_pi);
		        $("#txtnombre").html(cantidadpipprovincias.nombre_pi);
		        $("#beneficiario").val(cantidadpipprovincias.num_beneficiarios);
		        $("#txtmontoInversion").val(cantidadpipprovincias.costo_pi);
		        $("#txtPIA").val(cantidadpipprovincias.pia_meta_pres);
		        $("#txtPIN").val(cantidadpipprovincias.pim_acumulado);
		        $("#txtdevengado").val(cantidadpipprovincias.pim_acumulado);
			}
		});

	//alert(codigounico);
	$.ajax({
				"url":base_url+"index.php/PrincipalReportes/BuscadorPipPorCodigoReporte",
				type:"GET", 
				data:{codigounico:codigounico},
				cache:false,
				success:function(resp){
					/*alert(resp);

					var cantidadpipprovincias=JSON.parse(resp);
					console.log(cantidadpipprovincias);
					var dom = document.getElementById("pimdevengadopia");
					var myChart = echarts.init(dom);
					var app = {};
					option = null;
					app.title = '多 Y 轴示例';

					var colors = ['#5793f3', '#d14a61', '#675bba'];

					option = {
					    color: colors,

					    tooltip: {
					        trigger: 'axis',
					        axisPointer: {
					            type: 'cross'
					        }
					    },
					    grid: {
					        right: '20%'
					    },
					    toolbox: {
					        feature: {
					            dataView: {show: true, readOnly: false},
					            restore: {show: true},
					            saveAsImage: {show: true}
					        }
					    },
					    legend: {
					        data:['Devengado','PIA','PIM']
					    },
					    xAxis: [
					        {
					            type: 'category',
					            axisTick: {
					                alignWithLabel: true
					            },
					            data: ['En','Feb','Mar','Abr','May','Jun','Jul','Agost','Set','Oct','Nov','Dic']
					        }
					    ],
					    yAxis: [
					        {
					            type: 'value',
					            name: 'Devengado',
					            min: 0,
					            max: 250,
					            position: 'right',
					            axisLine: {
					                lineStyle: {
					                    color: colors[0]
					                }
					            },
					            axisLabel: {
					                formatter: '{value} ml'
					            }
					        },
					        {
					            type: 'value',
					            name: 'PIA',
					            min: 0,
					            max: 250,
					            position: 'right',
					            offset: 80,
					            axisLine: {
					                lineStyle: {
					                    color: colors[1]
					                }
					            },
					            axisLabel: {
					                formatter: '{value} ml'
					            }
					        },
					        {
					            type: 'value',
					            name: 'PIM',
					            min: 0,
					            max: 25,
					            position: 'left',
					            axisLine: {
					                lineStyle: {
					                    color: colors[2]
					                }
					            },
					            axisLabel: {
					                formatter: '{value} °C'
					            }
					        }
					    ],
					    series: [
					        {
					            name:'Devengado',
					            type:'bar',
					            data:cantidadpipprovincias
					        },
					        {
					            name:'PIA',
					            type:'bar',
					            yAxisIndex: 1,
					            data:cantidadpipprovincias
					        },

					        
					        {
					            name:'PIM',
					            type:'line',
					            yAxisIndex: 2,
					            data:cantidadpipprovincias
					        }
					    ]
					};

					if (option && typeof option === "object") {
					    myChart.setOption(option, true);
					}*/
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
			});
	
});
</script>

