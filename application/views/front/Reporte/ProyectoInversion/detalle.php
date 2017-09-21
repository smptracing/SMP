<style>
	.modal-dialog
	{
		width: 90%;
		margin: 0;
		margin-left: 5%;
		padding: 0;
	}

	.modal-content
	{
		height: auto;
		min-height: 100%;
		border-radius: 0;
	}
</style>

<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>DETALLE MENSUAL DE LA META</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
					
							<div id="myTabContent" class="tab-content">
								<!-- /Contenido del sector -->
								<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
									<!-- /tabla de sector desde el row -->
										
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											<table id="table-DetalleMensualizado"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
														<td>Nombre</td>
														<td>Mes</td>
														<td>Ejecución</td>
														<td>Compromiso</td>
														<td>Certificado</td>
														<td>Devengado</td>
														<td>Girado</td>
														<td>Pagado</td>
													</tr>
												</thead>
												<tbody>
													<?php foreach($listaDetalleMensualizado as $item ){ ?>
													  	<tr>
															<td>
																<?=$item->nombre?>
													    	</td>
													    	<td>
																<?=$item->mes_eje?>
													    	</td>
													    	<td>
																<?= number_format($item->ejecucion,2)?>
													    	</td>
													    	<td>
																<?= number_format($item->compromiso,2)?>
													    	</td>
													    	<td>
																<?= number_format($item->certificado,2)?>
													    	</td>
													    	<td>
																<?= number_format($item->devengado,2)?>
													    	</td>
													    	<td>
																<?= number_format($item->girado,2)?>
													    	</td>
													    	<td>
																<?=number_format($item->pagado,2)?>
													    	</td>
													  </tr>
													<?php } ?>
												</tbody>
												<input type="hidden" id="txtcorrelativo" name="txtcorrelativo" value="<?php echo $correlativoMeta ?>">
												<input type="hidden" id="txtanioMeta" name="txtanioMeta" value="<?php echo $anioMeta ?>">
											</table>
										</div>
									
									</div>
										<!-- / fin tabla de sector desde el row -->
									<div class="row" style="margin-left: 10px; margin:10px; ">
						                <div class="panel panel-default">
										 <div class="panel-heading">GRÁFICO ESTADÍSTICO DE DETALLE MENSUALIZADO</div>
						                        <div id="contenedorGrafico"></div>
						                </div>
						        	</div>
	

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
window.setTimeout(function()
{
	var meta=document.getElementById("txtcorrelativo").value;
	var anio=document.getElementById("txtanioMeta").value;

	$("#contenedorGrafico").css({"height":"350"});
	$.ajax({
		"url":base_url+"index.php/PrincipalReportes/GrafDetalleMensualizado",
		type:"GET", 
		data:{meta:meta,anio:anio},
		cache:false,
		success:function(resp)
		{
			//alert(resp);
			var pip=JSON.parse(resp);
			var dom = document.getElementById("contenedorGrafico");
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
			        fontSize: 10,
			        rich: {
			            name: {
			                textBorderColor: '#fff'
			            }
			        }
			    }
			};

			option = {
			    color: ['#003366', '#16A085', '#4cabce', '#e5323e','#D35400','#8E44AD'],
			    tooltip: {
			        trigger: 'axis',
			        axisPointer: {
			            type: 'shadow'
			        }
			    },
			    legend: {
			        data: ['Ejecucion', 'Compromiso','Certificado','Devengado', 'Girado','Pagado']
			    },
			    toolbox: {
			        show: true,
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
			            name: 'Ejecucion',
			            type: 'bar',
			            barGap: 0,
			            label: labelOption,
			            data: pip[1]
			        },
			        {
			            name: 'Compromiso',
			            type: 'bar',
			            label: labelOption,
			            data: pip[2]
			        },
			          {
			            name: 'Certificado',
			            type: 'bar',
			            label: labelOption,
			            data: pip[3]
			        },
			        {
			            name: 'Devengado',
			            type: 'bar',
			            label: labelOption,
			            data: pip[4]
			        },
			        {
			            name: 'Girado',
			            type: 'bar',
			            label: labelOption,
			            data: pip[5]
			        },
			        {
			            name: 'Pagado',
			            type: 'bar',
			            label: labelOption,
			            data: pip[6]
			        }
			    ]
			};

			if (option && typeof option === "object") {
			    myChart.setOption(option, true);
			}
		}
	});
}, 5000);
</script>