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
																<?=$item->ejecucion?>
													    	</td>
													    	<td>
																<?=$item->compromiso?>
													    	</td>
													    	<td>
																<?=$item->devengado?>
													    	</td>
													    	<td>
																<?=$item->girado?>
													    	</td>
													    	<td>
																<?=$item->pagado?>
													    	</td>
													  </tr>
													<?php } ?>
												</tbody>
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
	$("#contenedorGrafico").css({"height":"350"});

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
	        data: ['Forest', 'Steppe', 'Desert', 'Wetland']
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
	            data: ['2012', '2013', '2014', '2015', '2016']
	        }
	    ],
	    yAxis: [
	        {
	            type: 'value'
	        }
	    ],
	    series: [
	        {
	            name: 'Forest',
	            type: 'bar',
	            barGap: 0,
	            label: labelOption,
	            data: [320, 332, 301, 334, 390]
	        },
	        {
	            name: 'Steppe',
	            type: 'bar',
	            label: labelOption,
	            data: [220, 182, 191, 234, 290]
	        },
	        {
	            name: 'Desert',
	            type: 'bar',
	            label: labelOption,
	            data: [150, 232, 201, 154, 190]
	        },
	        {
	            name: 'Wetland',
	            type: 'bar',
	            label: labelOption,
	            data: [98, 77, 101, 99, 40]
	        }
	    ]
	};

	if (option && typeof option === "object") {
	    myChart.setOption(option, true);
	}
}, 5000);
</script>