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
														      <input type="text" id="BuscarPip"  class="form-control" placeholder="Ingrese código Unico">
														      <span class="input-group-btn">
														        <button id="CodigoUnico" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"> Buscar</span></button>
														      </span>
														    </div>
														  </div>
														   <div class="col-lg-6">
														    <div class="input-group">
														      <span class="input-group-btn">

														        <a href="javascript:siafActualizador()"><button id="BtnAcatualizar" class="btn btn-success" type="button"><i class="fa fa-spinner"></i> Actualizar</button></a>
														      </span>
														    </div>
														  </div>
														</div>			
														<div class="row">
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

												            <div class="row" style="margin-left: 10px; margin:10px; ">
												                <div class="panel panel-default">
																 	<div class="panel-heading">PIA, PIM Y DEVENGADO ACTUAL </div>
												                        <div id="GrafPimDevenPia" class="table-responsive">
																			<br>
																			<table id="tableGrafPimDevenPia" class="table  table-striped jambo_table bulk_action table-responsive" style="text-align: left;"> 
																			 	<div id="pimdevengadopia"></div>
																		  </table> 
																	    </div>
												                       
												                </div>
													        </div>

													        <div class="row" style="margin-left: 10px; margin:10px; ">
												                <div class="panel panel-default">
																<div class="panel-heading">PIA, PIM Y DEVENGADO ANUAL</div>
												                       
												                        <div id="GrafdevengadolinealAnual" class="table-responsive">
																			<br>
																			<table id="tableGrafdevengadolinealAnual" class="table  table-striped jambo_table bulk_action table-responsive" style="text-align: left;"> 
																			 	<div id="pimdevengadopialineasAnual"></div>
																		    </table> 
																	    </div>
												                </div>
													        </div>

															<div class="row" style="margin-left: 10px; margin:10px; ">
																<div class="panel panel-default">
																	<div class="panel-heading"> EJECUCIÓN PRESUPUESTAL </div>
																 
																	  	<div id="actproynombre" class="table-responsive">
																			<br>
																			<table id="table-EjecucionPresupuestal" class="table  table-striped jambo_table bulk_action" style="text-align: left;"> 
																			 
																		  </table> 
																	  </div>
																</div>
															</div>
															
															<div class="row" style="margin-left: 10px; margin:10px; ">
																<div class="panel panel-default">
																	<div class="panel-heading">INFORMACIÓN FINANCIERA</div>
																	  	<div id="metaAcumulada" class="table-responsive">
																			<br>
																			<table id="table-MetaAcumulada" class="table  table-striped jambo_table bulk_action table-responsive" style="text-align: left;"> 
																			 
																		  </table> 
																	    </div>
																</div>
															</div>

															<div class="row" style="margin-left: 10px; margin:10px; ">
												                <div class="panel panel-default">
																 <div class="panel-heading">GRÁFICO ESTADÍSTICO DE INFORMACIÓN FINANCIERA</div>
												                        
																		<div id="GrafmetaAcumulada" class="table-responsive">
																			<br>
																			<table id="tableGraf" class="table  table-striped jambo_table bulk_action table-responsive" style="text-align: left;"> 
																			 	 <div id="MetaPimPiaPorCadaAño"></div>
																		  </table> 
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

$("#BtnAcatualizar").on( "click", function()
	{
		var codigounico=$("#BuscarPip").val();
		$.ajax({
		"url":"http://localhost:8080/siaf/index.php/Importacion/inicio",
		type:"GET",
		dataType:"jsonp",
		data:{CodigoUnico:codigounico},
		success: function(data)
			{
		        
			}

		});


	});
	
$("#EjecucionAnual").hide();
$("#CodigoUnico").on( "click", function()
	{
		$("#EjecucionAnual").show(2000);
		$("#pimdevengadopia").css({"height":"350"}); 
		$("#pimdevengadopialineasAnual").css({"height":"420"}); 
		$("#actproynombre").show(2000);
		$("#metaAcumulada").show(2000);
		$("#MetaPimPiaPorCadaAño").css({"height":"420"}); 

		var codigounico=$("#BuscarPip").val();
		$.ajax({
		"url":base_url+"index.php/PrincipalReportes/DatosParaEstadisticaAnualProyecto",
		type:"POST",
		data:{codigounico:codigounico},
		success: function(data)
			{
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
		"url":base_url+"index.php/PrincipalReportes/DatosEjecucionPresupuestal",
		type:"POST",
		data:{codigounico:codigounico},
		success: function(data)
			{
		        console.log(data);
		        var ejecucionPresupuestal=JSON.parse(data); 
		        var html;
				html+="<thead><tr><th>AÑO EJECUCIÓN</th><th>COSTO ACTUAL</th><th>COSTO DE EXPEDIENTE</th><th>COSTO DE VIABILIDAD</th><th>COSTO DE EXP AÑO ANTERIOR</th></tr></thead>"
				$.each( ejecucionPresupuestal, function( key, value ) {
				  html +="<tbody> <tr><th>"+value.ano_eje+"</th><th>"+(value.costo_actual).toLocaleString("en-ESP")+"</th><th>"+value.costo_expediente+"</th><th>"+value.costo_viabilidad+"</th><th>"+value.ejecucion_ano_anterior+"</th></tr>";      
						html +="</tbody>";"en-US"
				});
				
				$("#table-EjecucionPresupuestal").html(html);
			}

		});

		$.ajax({
		"url":base_url+"index.php/PrincipalReportes/DatosCorrelativoMeta",
		type:"POST",
		data:{codigounico:codigounico},
		success: function(data)
			{
		    	console.log(data);

		    	var meta=JSON.parse(data); 
		        var html;
				html+="<thead><tr><th>Año Ejec</th><th>Meta</th><th>Pia</th><th>Pim</th><th>Pim Acum.</th><th>Ejecución</th><th>Compromiso</th><th>Monto Certificado</th><th>Devengado</th><th>Girado</th><th>Pagado</th><th>Avan Fin.</th><th>Monto comprometido</th><th>Monto precertificado</th><th>Ver</th>/tr></thead>"
				$.each( meta, function( key, value ) {
				  html +="<tbody> <tr><th>"+value.ano_eje+"</th><th>"+value.meta+"</th><th>"+value.pia+"</th><th>"+value.pim+"</th><th>"+value.pim_acumulado+"</th><th>"+value.ejecucion+"</th><th>"+value.compromiso+"</th><th>"+value.monto_certificado+"</th><th>"+value.devengado+"</th><th>"+value.girado+"</th><th>"+value.pagado+"</th><th>"+value.avance_financiero+'%'+"</th><th>"+value.monto_comprometido_anual+"</th><th>"+value.monto_precertificado+"</th><th><button type='button' class='editar btn btn-primary btn-xs' onclick='detalladoMensualizado("+value.ano_eje+","+value.meta+");'><i class='ace-icon fa fa-eye bigger-120'></i></button></th></tr>";      
						html +="</tbody>";
				});
				
				$("#table-MetaAcumulada").html(html);
			}

		});


		$.ajax({
				"url":base_url+"index.php/PrincipalReportes/GrafEstInfFinanciera",
				type:"GET", 
				data:{codigounico:codigounico},
				cache:false,
				success:function(resp)
				{
				//alert(resp);
						var pip=JSON.parse(resp);
				
						var dom = document.getElementById("MetaPimPiaPorCadaAño");
						var myChart = echarts.init(dom);
				
						/*option = {
						    tooltip: {
						        trigger: 'axis',
						        axisPointer: {
						            type: 'cross',
						            crossStyle: {
						                color: '#999'
						            }
						        }
						    },
						    toolbox: {
						        feature: {
						            dataView: {show: true, readOnly: false},
						            magicType: {show: true, type: ['line', 'bar']},
						            restore: {show: true},
						            saveAsImage: {show: true}
						        }
						    },
						    legend: {
						        data:['Pim','Devengado']
						    },
						    xAxis: [
						        {
						            type: 'category',
						            data: pip[0], //AÑOS 
						            
						            axisPointer: {
						                type: 'shadow'
						            }
						        }
						    ],
						    yAxis: [
						        {
						            type: 'value',
						            name: 'Pim',
						            min: 0,
						            max: 1000000,
						            interval: 160000,
						            axisLabel: {
						                formatter: '{value}'
						            }
						        }
						    ],
						    series: [
						        {
						            name:'Pim',
						            type:'bar',
						            data: pip[1],
						        },
						        {
						            name:'Devengado',
						            type:'bar',
						            data:pip[2]
						        }
						    ]
						};*/
						var app = {};
						option = null;
							var posList = [
						    'left', 'right', 'top', 'bottom',
						    'inside',
						    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
						    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
						];

						app.configParameters = {
						    rotate: {
						        min: -90,
						        max: 90
						    },
						    align: {
						        options: {
						            left: 'left',
						            center: 'center',
						            right: 'right'
						        }
						    },
						    verticalAlign: {
						        options: {
						            top: 'top',
						            middle: 'middle',
						            bottom: 'bottom'
						        }
						    },
						    position: {
						        options: echarts.util.reduce(posList, function (map, pos) {
						            map[pos] = pos;
						            return map;
						        }, {})
						    },
						    distance: {
						        min: 0,
						        max: 100
						    }
						};

						app.config = {
						    rotate: 90,
						    align: 'left',
						    verticalAlign: 'middle',
						    position: 'insideBottom',
						    distance: 15,
						    onChange: function () {
						        var labelOption = {
						            normal: {
						                rotate: app.config.rotate,
						                align: app.config.align,
						                verticalAlign: app.config.verticalAlign,
						                position: app.config.position,
						                distance: app.config.distance
						            }
						        };
						        myChart.setOption({
						            series: [{
						                label: labelOption
						            }, {
						                label: labelOption
						            }, {
						                label: labelOption
						            }, {
						                label: labelOption
						            }]
						        });
						    }
						};


						var labelOption = {
						    normal: {
						        show: true,
						        position: app.config.position,
						        distance: app.config.distance,
						        align: app.config.align,
						        verticalAlign: app.config.verticalAlign,
						        rotate: app.config.rotate,
						        formatter: '{c}  {name|{a}}',
						        fontSize: 14,
						        rich: {
						            name: {
						                textBorderColor: '#fff'
						            }
						        }
						    }
						};

						option = {
						    color: ['#2E86C1', '#CB4335'],
						    tooltip: {
						        trigger: 'axis',
						        axisPointer: {
						            type: 'shadow'
						        }
						    },
						    legend: {
						        data: ['DEVENGADO', 'PIM']
						    },
						    toolbox: {
						        show: false,
						        orient: 'vertical',
						        left: 'right',
						        top: 'center',
						        feature: {
						            mark: {show: true},
						            dataView: {show: true, readOnly: false},
						            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
						            restore: {show: true},
						            saveAsImage: {show: true}
						        }
						    },
						    calculable: true,
						    xAxis: [
						        {
						            type: 'category',
						            axisTick: {show: false},
						            data: pip[0]
						        }
						    ],
						    yAxis: [
						        {
						            type: 'value'
						        }
						    ],
						    series: [
						        {
						            name: 'DEVENGADO',
						            type: 'bar',
						            barGap: 0,
						            label: labelOption,
						            data: pip[1]
						        },
						        {
						            name: 'PIM',
						            type: 'bar',
						            label: labelOption,
						            data: pip[2]
						        } 
						    ]
						};



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
						var dom = document.getElementById("pimdevengadopia");
						var myChart = echarts.init(dom);
						var app = {};
						option = null;
						var posList = [
						    'left', 'right', 'top', 'bottom',
						    'inside',
						    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
						    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
						];

						app.configParameters = {
						    rotate: {
						        min: -90,
						        max: 90
						    },
						    align: {
						        options: {
						            left: 'left',
						            center: 'center',
						            right: 'right'
						        }
						    },
						    verticalAlign: {
						        options: {
						            top: 'top',
						            middle: 'middle',
						            bottom: 'bottom'
						        }
						    },
						    position: {
						        options: echarts.util.reduce(posList, function (map, pos) {
						            map[pos] = pos;
						            return map;
						        }, {})
						    },
						    distance: {
						        min: 0,
						        max: 100
						    }
						};

						app.config = {
						    rotate: 90,
						    align: 'left',
						    verticalAlign: 'middle',
						    position: 'insideBottom',
						    distance: 15,
						    onChange: function () {
						        var labelOption = {
						            normal: {
						                rotate: app.config.rotate,
						                align: app.config.align,
						                verticalAlign: app.config.verticalAlign,
						                position: app.config.position,
						                distance: app.config.distance
						            }
						        };
						        myChart.setOption({
						            series: [{
						                label: labelOption
						            }, {
						                label: labelOption
						            }, {
						                label: labelOption
						            }, {
						                label: labelOption
						            }]
						        });
						    }
						};


						var labelOption = {
						    normal: {
						        show: true,
						        position: app.config.position,
						        distance: app.config.distance,
						        align: app.config.align,
						        verticalAlign: app.config.verticalAlign,
						        rotate: app.config.rotate,
						        formatter: '{c}  {name|{a}}',
						        fontSize: 16,
						        rich: {
						            name: {
						                textBorderColor: '#fff'
						            }
						        }
						    }
						};

						option = {
						    color: ['#003366', '#006699', '#4cabce', '#e5323e'],
						    tooltip: {
						        trigger: 'axis',
						        axisPointer: {
						            type: 'shadow'
						        }
						    },
						    legend: {
						        data: ['PIA', 'PIM', 'DEVENGADO']
						    },
						    toolbox: {
						        show: false,
						        orient: 'vertical',
						        left: 'right',
						        top: 'center',
						        feature: {
						            mark: {show: true},
						            dataView: {show: true, readOnly: false},
						            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
						            restore: {show: true},
						            saveAsImage: {show: true}
						        }
						    },
						    calculable: true,
						    xAxis: [
						        {
						            type: 'category',
						            axisTick: {show: false},
						            data: [cantidadpipprovincias.anio_meta_pres]
						        }
						    ],
						    yAxis: [
						        {
						            type: 'value'
						        }
						    ],
						    series: [
						        {
						            name: 'PIA',
						            type: 'bar',
						            barGap: 0,
						            label: labelOption,
						            data: [cantidadpipprovincias.pia_meta_pres]
						        },
						        {
						            name: 'PIM',
						            type: 'bar',
						            label: labelOption,
						            data: [cantidadpipprovincias.pim_acumulado]
						        },
						        {
						            name: 'DEVENGADO',
						            type: 'bar',
						            label: labelOption,
						            data: [cantidadpipprovincias.devengado_acumulado]
						        }   
						    ]
						};;
						if (option && typeof option === "object") {
						    myChart.setOption(option, true);
						}

						
					}
				});

			$.ajax({
				"url":base_url+"index.php/PrincipalReportes/ReporteDevengadoPiaPimPorPipGraficos",
				type:"GET", 
				data:{codigounico:codigounico},
				cache:false,
				success:function(resp)
				{
						console.log(resp);
						var devengadoPiaGraficos=JSON.parse(resp);
						var dom = document.getElementById("pimdevengadopialineasAnual");
						var myChart = echarts.init(dom);
						var app = {};
						option = null;
						var posList = [
						    'left', 'right', 'top', 'bottom',
						    'inside',
						    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
						    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
						];

						app.configParameters = {
						    rotate: {
						        min: -90,
						        max: 90
						    },
						    align: {
						        options: {
						            left: 'left',
						            center: 'center',
						            right: 'right'
						        }
						    },
						    verticalAlign: {
						        options: {
						            top: 'top',
						            middle: 'middle',
						            bottom: 'bottom'
						        }
						    },
						    position: {
						        options: echarts.util.reduce(posList, function (map, pos) {
						            map[pos] = pos;
						            return map;
						        }, {})
						    },
						    distance: {
						        min: 0,
						        max: 100
						    }
						};

						app.config = {
						    rotate: 90,
						    align: 'left',
						    verticalAlign: 'middle',
						    position: 'insideBottom',
						    distance: 15,
						    onChange: function () {
						        var labelOption = {
						            normal: {
						                rotate: app.config.rotate,
						                align: app.config.align,
						                verticalAlign: app.config.verticalAlign,
						                position: app.config.position,
						                distance: app.config.distance
						            }
						        };
						        myChart.setOption({
						            series: [{
						                label: labelOption
						            }, {
						                label: labelOption
						            }, {
						                label: labelOption
						            }, {
						                label: labelOption
						            }]
						        });
						    }
						};


						var labelOption = {
						    normal: {
						        show: true,
						        position: app.config.position,
						        distance: app.config.distance,
						        align: app.config.align,
						        verticalAlign: app.config.verticalAlign,
						        rotate: app.config.rotate,
						        formatter: '{c}  {name|{a}}',
						        fontSize: 16,
						        rich: {
						            name: {
						                textBorderColor: '#fff'
						            }
						        }
						    }
						};

						option = {
						    color: ['#003366', '#006699', '#4cabce', '#e5323e'],
						    tooltip: {
						        trigger: 'axis',
						        axisPointer: {
						            type: 'shadow'
						        }
						    },
						    legend: {
						        data: ['COSTO TOTAL', 'PIA', 'PIM', 'DEVENGADO','COMPROMISO ACUMULADO']
						    },
						    toolbox: {
						        show: false,
						        orient: 'vertical',
						        left: 'right',
						        top: 'center',
						        feature: {
						            mark: {show: true},
						            dataView: {show: true, readOnly: false},
						            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
						            restore: {show: true},
						            saveAsImage: {show: true}
						        }
						    },
						    calculable: true,
						    xAxis: [
						        {
						            type: 'category',
						            axisTick: {show: false},
						            data: ['AÑO ACUMULADO']
						        }
						    ],
						    yAxis: [
						        {
						            type: 'value'
						        }
						    ],
						    series: [
						        {
						            name: 'COSTO TOTAL',
						            type: 'bar',
						            barGap: 0,
						            label: labelOption,
						            data: [devengadoPiaGraficos.costo_pi]
						        },
						        {
						            name: 'PIA',
						            type: 'bar',
						            label: labelOption,
						            data: [devengadoPiaGraficos.pia_meta_pres]
						        },
						        {
						            name: 'PIM',
						            type: 'bar',
						            label: labelOption,
						            data: [devengadoPiaGraficos.pim_acumulado]
						        },
						        {
						            name: 'DEVENGADO',
						            type: 'bar',
						            label: labelOption,
						            data: [devengadoPiaGraficos.devengado_acumulado]
						        },
						         {
						            name: 'COMPROMISO ACUMULADO',
						            type: 'bar',
						            label: labelOption,
						            data: [devengadoPiaGraficos.compromiso_acumulado]
						        }    
						    ]
						};;
						if (option && typeof option === "object") {
						    myChart.setOption(option, true);
						}
						
												
				}

			});

		});
	
});

	function detalladoMensualizado(anio,meta)
	{
		//paginaAjaxDialogo(null, 'Ver Detallado Mensualizado',null, base_url+'index.php/PrincipalReportes/DetalleMensualizado', 'GET', null, null, false, true);
		paginaAjaxDialogo(null, 'Ver Detallado Mensualizado',{ anio: anio, meta:meta}, base_url+'index.php/PrincipalReportes/DetalleMensualizado', 'GET', null, null, false, true);
		
	}
    function siafActualizador() {
    	var codigounico=$("#BuscarPip").val();
    	var urll="http://192.168.1.100:8080/importador_siaf/index.php/Importacion/inicio/"+codigounico;
        ventana=window.open(urll, 'Nombre de la ventana', 'width=1400,height=800');
    }
</script>

