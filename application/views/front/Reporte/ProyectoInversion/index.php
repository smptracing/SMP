<script src="<?php echo base_url(); ?>assets/vendors/echarts/dist/echarts-all-3.js"></script>

<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>REPORTE POR PROYECTO DE INVERSIÓN</b> </h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						BÚSQUEDA POR CÓDIGO (Ingrese un código válido)
						<div class="row">

						  <div class="col-lg-6">

						    <div class="input-group">
						      <input type="text" id="BuscarPip"  class="form-control" placeholder="Ingrese código Unico:" value="<?=$codigo?>">
						      <span class="input-group-btn">
						        <button id="CodigoUnico" class="btn btn-default" type="button" ><span class="glyphicon glyphicon-search"> Aceptar</span></button>
						      </span>
						    </div>

						  </div>
						   <div class="col-lg-6">
						    <div class="input-group">
						      <span class="input-group-btn">

						        <a href="javascript:siafActualizador()"><button id="BtnAcatualizar" class="btn btn-success" type="button"><i class="fa fa-spinner"></i> Actualizar (Importar de SIAF)</button></a>
						      </span>
						    </div>
						  </div>
						</div>
						<div class="row">
							<div class="row" style="margin-left: 10px; margin:10px; ">
								<div class="panel panel-default">
									<div class="panel-heading">DATOS DEL PROYECTO DE INVERSIÓN</div>
									<br>
								    <div id="EjecucionAnual">
										<table class="table" STYLE="table-layout:fixed">
											<tr>
												<td style="width: 20%" class="blue"><b>NOMBRE</b></td>
												<td style="width: 80%">
													<label  id="txtnombre" name="txtnombre"></label>
												</td>
											</tr>
											<tr>
												<td class="blue" ><b>MONTO DE INVERSIÓN</b></td>
												<td>S/. <label id="txtbeneficiario" name="txtbeneficiario"></label></td>
											</tr>
											<tr>
												<td class="blue" ><b>COSTO DE EXPEDIENTE</b></td>
												<td> S/. <label id="txtmontoInversion" name="txtmontoInversion"></label> </td>
											</tr>
											<tr>
												<td class="blue" ><b>COSTO DE VIABLIDAD</b></td>
												<td> S/. <label id="txtPIA" name="txtPIA"></label> </td>
											</tr>
											<tr>
												<td class="blue" ><b>MONTO DE EJECUCIÓN</b></td>
												<td> S/. <label id="txtPIN" name="txtPIN"></label> </td>
											</tr>
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
											<table id="table-MetaAcumulada" class="table  table-striped jambo_table bulk_action table-responsive" style="text-align: left;" width="120%">

											 </table>
									    </div>
								</div>
							</div>

							<div class="row" style="margin-left: 10px; margin:10px; ">
				                <div class="panel panel-default">
								 <div class="panel-heading">GRÁFICO: ESTADÍSTICO DE INFORMACIÓN FINANCIERA POR AÑO</div>

										<div id="GrafmetaAcumulada" class="table-responsive">
											<br>
											<table id="tableGraf" class="table  table-striped jambo_table bulk_action table-responsive" style="text-align: left;">
											 	 <div id="MetaPimPiaPorCadaAño"></div>
										  </table>
									    </div>

				                </div>
					        </div>


					        <div class="row" style="margin-left: 10px; margin:10px; ">
				                <div class="panel panel-default">
								 <div class="panel-heading">GRÁFICO: AVANCE DE INFORMACIÓN FINANCIERA POR FASE</div>

										<div id="Grafinformacionfinanciera" class="table-responsive">
											<br>
											<table id="tableGrafinfFinanciera" class="table  table-striped jambo_table bulk_action table-responsive" style="text-align: left;">
											 	 <div id="AvanceInfFinanciera"></div>
										  </table>
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

$(document).on('hidden.bs.modal', '.modal', function () {
    if ($('body').find('.modal.in').length > 0) {
        $('body').addClass('modal-open');
    }
});

$(document).on("ready" ,function(){

//No UTILIZAR
// $("#BtnAcatualizar").on( "click", function()
// 	{
// 		var codigounico=$("#BuscarPip").val();
// 		$.ajax({
// 		"url":"http://localhost:8080/siaf/index.php/Importacion/inicio",
// 		type:"GET",
// 		dataType:"jsonp",
// 		data:{CodigoUnico:codigounico},
// 		success: function(data)
// 			{
// 			}
// 		});
// 	});

$("#EjecucionAnual").hide();
$("#CodigoUnico").on( "click", function()
	{
		$("#EjecucionAnual").show(2000);
		$("#pimdevengadopia").css({"height":"350"});
		$("#pimdevengadopialineasAnual").css({"height":"420"});
		$("#actproynombre").show(2000);
		$("#metaAcumulada").show(2000);
		$("#MetaPimPiaPorCadaAño").css({"height":"420"});
		$("#AvanceInfFinanciera").css({"height":"420"});

		var codigounico=$("#BuscarPip").val();
		$.ajax({
		"url":base_url+"index.php/PrincipalReportes/DatosParaEstadisticaAnualProyecto",
		type:"POST",
		data:{codigounico:codigounico},
		success: function(data)
			{
		        var cantidadpipprovincias=JSON.parse(data);
		        $("#txtnombre").html(cantidadpipprovincias.nombre);
		        $("#txtbeneficiario").html(cantidadpipprovincias.costo_actual);
		        $("#txtmontoInversion").html(cantidadpipprovincias.costo_expediente);
		        $("#txtPIA").html(cantidadpipprovincias.costo_viabilidad);
		        $("#txtPIN").html(cantidadpipprovincias.ejecucion_ano_anterior);
			}
		});

		$.ajax({
		"url":base_url+"index.php/PrincipalReportes/DatosEjecucionPresupuestal",
		type:"POST",
		data:{codigounico:codigounico},
		success: function(data)
			{
		        //console.log(data);
		        var ejecucionPresupuestal=JSON.parse(data);
		        var html;
				html+="<thead><tr><th>AÑO EJECUCIÓN</th><th style='text-align:right'>COSTO ACTUAL</th><th style='text-align:right'>COSTO DE EXPEDIENTE</th><th style='text-align:right'>COSTO DE VIABILIDAD</th><th style='text-align:right'>COSTO DE EXP AÑO ANTERIOR</th></tr></thead>"
				$.each( ejecucionPresupuestal, function( key, value ) {
				  html +="<tbody> <tr><td><button type='button' class='editar btn btn-success btn-xs' onclick='detalleAnalitico("+value.ano_eje+","+codigounico+");'>"+value.ano_eje+"<i class='ace-icon bigger-120'></i></button><button type='button' class='clasificador btn btn-primary btn-xs' onclick='detalleClasificadorPip("+value.ano_eje+","+codigounico+");'>clasif.<i class='ace-icon bigger-120'></i></button></td><td style='text-align:right'> S/. "+(value.costo_actual)+"</td><td style='text-align:right'>S/. "+value.costo_expediente+"</td><td style='text-align:right'>S/. "+value.costo_viabilidad+"</td><td style='text-align:right'>S/. "+value.ejecucion_ano_anterior+"</td></tr>";
						html +="</tbody>";
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
		    	//console.log(data);

		    	var meta1=JSON.parse(data);
		        var html;
				html+="<thead><tr><th>Año Ejec</th><th>Meta</th><th></th><th></th><th style='text-align:right'>Pia</th><th style='text-align:right'>Pim</th><th style='text-align:right'>Pim Acum.</th><th style='text-align:right'>Ejecución</th><th style='text-align:right'>Compromiso</th><th style='text-align:right'>Monto Certificado</th><th style='text-align:right'>Devengado</th><th style='text-align:right'>Girado</th><th style='text-align:right'>Pagado</th><th style='text-align:right'>Avan Fin.</th><th style='text-align:right'>Monto comprometido</th><th style='text-align:right'>Monto precertificado</th></tr></thead>"
				$.each( meta1, function( key, value ) {
                   	html +="<tr>";
                              html +="<th  colspan='16'>"+value.nombre_finalidad+"</th></tr> <tr>";
				 	html +="<tbody> <tr><th style='width:5%;'><button type='button' class='editar btn btn-success btn-xs' onclick='detalladoMensualizado("+value.ano_eje+","+parseInt(value.meta)+");'>"+parseInt(value.ano_eje)+" <i class='ace-icon'></i></button></th><th style='width:15%;'><button type='button' class='editar btn btn-primary btn-xs' onclick='detalladoMensualizadoFuenteFinan("+value.ano_eje+","+parseInt(value.meta)+");'>"+parseInt(value.meta)+"<i class='ace-icon bigger-120'></i></button></th><th style='width:10%;'><button type='button' class='editar btn btn-success btn-xs' onclick='detalladoMensualizadoConceptoClasificador("+value.ano_eje+","+parseInt(value.meta)+");'>Orden <i class='ace-icon'></i></button></th><th style='width:10%;'> <button type='button' class='editar btn btn-success btn-xs' onclick='detallePedidoCompraMeta("+value.ano_eje+","+parseInt(value.meta)+");'>Pedido <i class='ace-icon'></i></button>  </th><th style='text-align:right; width:10%;'>S/. "+value.pia+"</th><th style='text-align:right; width:10%;'>S/. "+value.pim+"</th><th style='text-align:right; width:10%;'>S/. "+value.pim_acumulado+"</th><th style='text-align:right; width:5%;'>S/. "+value.ejecucion+"</th><th style='text-align:right; width:10%;'>S/. "+value.compromiso+"</th><th style='text-align:right; width:10%;'>S/. "+value.monto_certificado+"</th><th style='text-align:right; width:10%;'>S/. "+value.devengado+"</th><th style='text-align:right; width:5%;'>S/. "+value.girado+"</th><th style='text-align:right; width:10%;'>S/. "+value.pagado+"</th><th style='text-align:right; width:10%;'>"+value.avance_financiero+'%'+"</th><th style='text-align:right; width:10%;'>S/. "+value.monto_comprometido_anual+"</th><th style='text-align:right; width:10%;'>S/. "+value.monto_precertificado+"</th></tr>";
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
						};
						if (option && typeof option === "object") {
						    myChart.setOption(option, true);
						}
					}
				});

		$.ajax({
				"url":base_url+"index.php/PrincipalReportes/GrafAvanceFinanciero",
				type:"GET",
				data:{codigounico:codigounico},
				cache:false,
				success:function(resp)
				{
					var pip=JSON.parse(resp);
					var dom = document.getElementById("AvanceInfFinanciera");
					var myChart = echarts.init(dom);
					var app = {};
					option = null;
					option = {
						    title: {
						        text: 'Inf. Financiero'
						    },
						    tooltip: {
						        trigger: 'axis'
						    },
						    legend: {
						        data:['Ejecucion','Compromiso','Certificado','Devengado','Girado','Pagado']
						    },
						    grid: {
						        left: '3%',
						        right: '4%',
						        bottom: '3%',
						        containLabel: true
						    },
						    toolbox: {
						        feature: {
						            saveAsImage: {}
						        }
						    },
						    xAxis: {
						        type: 'category',
						        boundaryGap: false,
						        data: pip[0]
						    },
						    yAxis: {
						        type: 'value'
						    },
						    series: [
						        {
						            name:'Ejecucion',
						            type:'line',
						            stack: '总量',
						            data:pip[1]
						        },
						        {
						            name:'Compromiso',
						            type:'line',
						            stack: '总量',
						            data:pip[2]
						        },
						        {
						            name:'Certificado',
						            type:'line',
						            stack: '总量',
						            data:pip[3]
						        },
						        {
						            name:'Devengado',
						            type:'line',
						            stack: '总量',
						            data:pip[4]
						        },
						        {
						            name:'Girado',
						            type:'line',
						            stack: '总量',
						            data:pip[5]
						        },
						        {
						            name:'Pagado',
						            type:'line',
						            stack: '总量',
						            data:pip[6]
						        }
						    ]
						};
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
						};
						if (option && typeof option === "object") {
						    myChart.setOption(option, true);
						}
				}

			});

		});
});

	function detalleAnalitico(anio,codigounico)
	{
		paginaAjaxDialogo(null, 'Analítico del Avance Financiero del Proyecto por año',{anio: anio,codigounico:codigounico}, base_url+'index.php/PrincipalReportes/DetalleAnalitico', 'GET', null, null, false, true);
	}

	function detalleClasificadorPip(anio,codigounico)
	{
		paginaAjaxDialogo(null, 'Detalle de Clasificador por PIP',{anio: anio,codigounico:codigounico}, base_url+'index.php/PrincipalReportes/DetalleClasificador', 'GET', null, null, false, true);
	}

	function detalladoMensualizado(anio,meta)
	{
		paginaAjaxDialogo(null, 'Ver Detallado Mensualizado',{ anio: anio, meta:meta}, base_url+'index.php/PrincipalReportes/DetalleMensualizado', 'GET', null, null, false, true);
	}

	function detalladoMensualizadoFuenteFinan(anio,meta)
	{
		paginaAjaxDialogo(null, 'Ver Detalle',{ anio: anio, meta:meta}, base_url+'index.php/PrincipalReportes/DetalleMensualizadoFuenteFinan', 'GET', null, null, false, true);
	}

    function siafActualizador() {
    	var codigounico=$("#BuscarPip").val();
		var start = +new Date();
		var ups_url = '<?php $ups_url = $this->config->item('ups_url');echo $ups_url;?>';

    	$.ajax({
				url: ups_url + "/Importacion/codigo/" + codigounico,
				type: "POST",
				cache: false,
		        contentType:false,
		        processData:false,
				beforeSend: function(request) {
					//request.setRequestHeader("Authorization", "Negotiate");
				    renderLoading();
				},
				success:function(data){
					$('#divModalCargaAjax').hide();
					datos=JSON.parse(data);
					var rtt = +new Date() - start;

					if(datos.actualizo)
					{

						//var rttSeg = rtt / 1000;
						swal(
						  'Operacion Completada',
						  datos.mensaje + ' Tiempo: ' + (rtt/1000) +'s',
						  'success'
						);
					}
					else
					{
						swal(
						  'No se pudo completar la Operacion',
						  datos.mensaje + ' Tiempo: ' + (rtt/1000) +'s',
						  'error'
						);
					}
				},
				error: function (xhr, textStatus, errorMessage) {
			        $('#divModalCargaAjax').hide();
			        swal(
						  'ERROR!',
						  'No se pudo conectar con el servidor de Importacion, error 0x5642418',
						  'error'
						);
			    }
			});
    } 

	function detalladoMensualizadoConceptoClasificador(anio,meta)
	{
		paginaAjaxDialogo(null, 'Ver Concepto',{ anio: anio, meta:meta}, base_url+'index.php/PrincipalReportes/detalladoMensualizadoConceptoClasificador', 'GET', null, null, false, true);
	}
	function detallePedidoCompraMeta(anio,meta)
	{
		paginaAjaxDialogo(null, 'Orden de Compra por Meta',{ anio: anio, meta:meta}, base_url+'index.php/PrincipalReportes/detallePedidoCompraMeta', 'GET', null, null, false, true);
	}

</script>



