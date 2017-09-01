$(document).on("ready" ,function(){
$.ajax({
	url:base_url+"/index.php/PrincipalFyE/EstudioInvPorTipoEstudio",
	dataType:"json",
	type:"POST",
	cache:false,
	success:function(respuesta)
	{
		var arrayTipoEstudio=new Array();
		$.each(respuesta,function(index,element)
		{
			arrayTipoEstudio[index]=element.CantidadEstudio;
		});


		var dom = document.getElementById("ReporteBarras");
		var myChart = echarts.init(dom);
		var app = {};
		
		option = {
			title : {
				text: '',
				subtext: ''
			},
			tooltip : {
				trigger: 'axis'
			},
			legend: {
				data:['Monto','Avance']
			},
			toolbox: {
				show : true,
				feature : {
					dataView : {show: true, readOnly: false},
					magicType : {show: true, type: ['line', 'bar']},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			calculable : true,
			xAxis : [
			{
				type : 'category',
				data : ['1%','2%','3%','4%','5%','6%','7%','8%','9%','10%','11%','12%']
			}
			],
			yAxis : [
			{
				type : 'value'
			}
			],
			series : [
			{
				name:'Monto',
				type:'bar',
				data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
				markPoint : {
					data : [
					{type : 'max', name: '最大值'},
					{type : 'min', name: '最小值'}
					]
				},
				markLine : {
					data : [
					{type : 'average', name: '平均值'}
					]
				}
			},
			{
				name:'Avance',
				type:'bar',
				data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
				markPoint : {
					data : [
					{name : '年最高', value : 182.2, xAxis: 7, yAxis: 183},
					{name : '年最低', value : 2.3, xAxis: 11, yAxis: 3}
					]
				},
				markLine : {
					data : [
					{type : 'average', name : '平均值'}
					]
				}
			}
			]
		};

		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}

	}
});
$.ajax({
		url:base_url+"/index.php/PrincipalFyE/GetAprobadosEstudio",
		dataType:"json",
		type:"POST",
		cache:false,
		success:function(respuesta)
		{
			var arrayEstudioE=new Array();
			$.each(respuesta,function(index,element)
			{
				arrayEstudioE[index]=element.Cantidadpip;
			});

			var dom = document.getElementById("EstudioEtapa");
			var myChart = echarts.init(dom);
			var app = {};
			option = null;
			option = {
				title : {
					text: '',
					subtext: '',
					x:'center'
				},
				tooltip : {
					trigger: 'item',
					formatter: "{a} <br/>{b} : {c} ({d}%)"
				},
				legend: {
					orient: 'horizontal',
					left: 'left',
					data: ['Aprobados','Evaluación','Viabilidad','Formulación','Otros']
				},

				series : [
				{
					name: 'Estudios',
					type: 'pie',
					radius : '55%',
					center: ['50%', '60%'],
					data:[
					{value:arrayEstudioE[0], name:'Aprobados'},
					{value:arrayEstudioE[1], name:'Evaluación'},
					{value:arrayEstudioE[2], name:'Formulación'},
					{value:arrayEstudioE[3], name:'Viabilidad'},
					{value:0, name:'Otros'}
					],
					itemStyle: {
						emphasis: {
							shadowBlur: 10,
							shadowOffsetX: 0,
							shadowColor: 'rgba(0, 0, 0, 0.5)'
						}
					}
				}
				]
			};
			if (option && typeof option === "object") 
			{
				myChart.setOption(option, true);
		}
	}
});



$.ajax({
	url:base_url+"/index.php/PrincipalFyE/EstudioInvPorTipoEstudio",
	dataType:"json",
	type:"POST",
	cache:false,
	success:function(respuesta)
	{
		var arrayTipoEstudio=new Array();
		$.each(respuesta,function(index,element)
		{
			arrayTipoEstudio[index]=element.CantidadEstudio;
		});

		var dom = document.getElementById("CenterFEvaluacion");
		var myChart = echarts.init(dom);
		var app = {};
		option = null;
		option = {
			title : {
				text: 'Estadisticas',
				subtext: 'Proyectos',
				x:'center'
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c} ({d}%)"
			},
			legend: {
				x : 'center',
				y : 'bottom',
				data: ['Administracion Directa','TDR']
			},
			toolbox: {
				show : true,
				feature : {
					mark : {show: true},
					dataView : {show: true, readOnly: false},
					magicType : {
						show: true,
						type: ['pie', 'funnel']
					},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			calculable : true,
			series : [
			{
				name:'半径模式',
				type:'pie',
				radius : [20, 110],
				center : ['25%', '50%'],
				roseType : 'radius',
				label: {
					normal: {
						show: false
					},
					emphasis: {
						show: true
					}
				},
				lableLine: {
					normal: {
						show: false
					},
					emphasis: {
						show: true
					}
				},

			},
			{
				name:'Costo',
				type:'pie',
				radius : [25, 60],
				center : ['50%', '50%'],
				roseType : 'area',
				data:[
				{value:arrayTipoEstudio[0], name:'Administracion Directa'},
				{value:arrayTipoEstudio[1], name:'TDR'}
				]
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
	url:base_url+"/index.php/PrincipalFyE/TipoGastoMontos",
	dataType:"json",
	type:"POST",
	cache:false,
	success:function(respuesta)
	{
		var arrayTipoEstudio=new Array();
		$.each(respuesta,function(index,element)
		{
			arrayTipoEstudio[index]=element.Total;
		});

		var dom = document.getElementById("MontosTiposGasto");
		var myChart = echarts.init(dom);
		var app = {};

		app.title = '';

		option = {
		    tooltip: {
		        trigger: 'item',
		        formatter: "{a} <br/>{b}: {c} ({d}%)"
		    },
			legend: {
				orient: 'horizontal',
				left: 'left',
					data: ['Recursos Humanos','Estudios Complementarios','Materiales de oficina','Gestion Doc. Alquiler Viaticos']
			},
		    series: [
		        {
		            name:'访问来源',
		            type:'pie',
		            radius: ['27%', '50%'],
		            avoidLabelOverlap: false,
		            label: {
		                normal: {
		                    show: false,
		                    position: 'center'
		                },
		                emphasis: {
		                    show: true,
		                    textStyle: {
		                        fontSize: '15',
		                        fontWeight: 'bold'
		                    }
		                }
		            },
		            labelLine: {
		                normal: {
		                    show: false
		                }
		            },
		           data:[
							{value:arrayTipoEstudio[0], name:'Recursos Humanos'},
							{value:arrayTipoEstudio[1], name:'Estudios Complementarios'},
							{value:arrayTipoEstudio[2], name:'Materiales de oficina'},
							{value:arrayTipoEstudio[3], name:'Gestion Doc. Alquiler Viaticos'}
						]

		        }
		    ]
		};
	
		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}

	}
});


/*

$.ajax({
	url:base_url+"/index.php/PrincipalFyE/TipoGastoMontos",
	dataType:"json",
	type:"POST",
	cache:false,
	success:function(respuesta)
	{
		var arrayTipoEstudio=new Array();
		$.each(respuesta,function(index,element)
		{
			arrayTipoEstudio[index]=element.Total;
		});

		var dom = document.getElementById("MontosTiposGasto");
		var myChart = echarts.init(dom);
		var app = {};
		option = null;
		option = {
			title : {
				text: 'Estadisticas',
				subtext: 'Proyectos',
				x:'center'
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c} ({d}%)"
			},
			legend: {
				x : 'center',
				y : 'bottom',
				data: ['Recursos Humanos','Estudios Complementarios','Materiales de oficina','Gestion Doc. Alquiler Viaticos']
			},
			toolbox: {
				show : true,
				feature : {
					mark : {show: true},
					dataView : {show: true, readOnly: false},
					magicType : {
						show: true,
						type: ['pie', 'funnel']
					},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			calculable : true,
			series : [
			{
				name:'半径模式',
				type:'pie',
				radius : [20, 110],
				center : ['25%', '50%'],
				roseType : 'radius',
				label: {
					normal: {
						show: false
					},
					emphasis: {
						show: true
					}
				},
				lableLine: {
					normal: {
						show: false
					},
					emphasis: {
						show: true
					}
				},

			},
			{
				name:'Costo',
				type:'pie',
				radius : [25, 60],
				center : ['50%', '50%'],
				roseType : 'area',
				data:[
				{value:arrayTipoEstudio[0], name:'Recursos Humanos'},
				{value:arrayTipoEstudio[1], name:'Estudios Complementarios'},
				{value:arrayTipoEstudio[2], name:'Materiales de oficina'},
				{value:arrayTipoEstudio[3], name:'Gestion Doc. Alquiler Viaticos'}
				]
			}
			]
		};
		;
		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}

	}
});*/

//Fin estadistica en forma de circulo


//inicio graficos
/*if ("undefined" != typeof Chart && (console.log("init_chart_doughnut"), $(".MontosTiposGasto").length))
{
	var a=
	{
		type: "doughnut",
		tooltipFillColor: "rgba(51, 51, 51, 0.55)",
		data:
		{
			labels: ["Abancay", "Andahuaylas", "Antabamba", "Aymaraes", "Contabambas", "Chincheros", "Grau"],
			datasets: [
			{
				data: [1, 2, 3, 4, 5, 6, 7],
				backgroundColor: ["#3498DB", "#9B59B6", "#E74C3C", "#26B99A", "#B6CBD6", "#708B99", "#52C5E1"],
				hoverBackgroundColor: ["#3498DB", "#B370CF", "#E95E4F", "#36CAAB", "#BDD3DF", "#7C96A3", "#52C5E1"]
			}]
		},
		options: { legend: !1, responsive: !1 }
	};

	$(".MontosTiposGasto").each(function()
	{
		var b=$(this);

		new Chart(b, a)
	});
}*/


/*var dom = document.getElementById("EstudioProvinvia");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
title : {
text: '',
subtext: '',
x:'center'
},
tooltip : {
trigger: 'item',
formatter: "{a} <br/>{b} : {c} ({d}%)"
},
legend: {
orient: 'horizontal',
left: 'left',
data: ['Abancay','Evaluación','Viabilidad','Formulación','Otros']
},
series : [
{
name: 'Estudios',
type: 'pie',
radius : '55%',
center: ['50%', '60%'],
data:[
{value:1, name:'Aprobados'},
{value:3, name:'Evaluación'},
{value:5, name:'Formulación'},
{value:4, name:'Viabilidad'},
{value:0, name:'Otros'}
],
itemStyle: {
emphasis: {
shadowBlur: 10,
shadowOffsetX: 0,
shadowColor: 'rgba(0, 0, 0, 0.5)'
}
}
}
]
};

if (option && typeof option === "object") {
myChart.setOption(option, true);
}*/


$.ajax({
	url:base_url+"/index.php/PrincipalFyE/EstudioInvPorProvincia",
	dataType:"json",
	type:"POST",
	cache:false,
	success:function(respuesta)
	{
		var arrayEstudioE=new Array();
		$.each(respuesta,function(index,element)
		{
			arrayEstudioE[index]=element.CantidadEstudio;
		});

		var dom = document.getElementById("EstudioProvinvia");
		var myChart = echarts.init(dom);
		var app = {};
		option = null;
		option = {
			title : {
				text: '',
				subtext: '',
				x:'center'
			},
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c} ({d}%)"
			},
			legend: {
				orient: 'horizontal',
				left: 'left',
				data: ['Abancay','Andahuaylas','Antabamba','Aymaraes','Chincheros','Contabambas','Grau']
			},

			series : [
			{
				name: 'Estudios',
				type: 'pie',
				radius : '55%',
				center: ['50%', '60%'],
				data:[
				{value:arrayEstudioE[0], name:'Abancay'},
				{value:arrayEstudioE[1], name:'Andahuaylas'},
				{value:arrayEstudioE[2], name:'Antabamba'},
				{value:arrayEstudioE[3], name:'Aymaraes'},
				{value:arrayEstudioE[4], name:'Chincheros'},
				{value:arrayEstudioE[5], name:'Contabambas'},
				{value:arrayEstudioE[6], name:'Grau'}
				],
				itemStyle: {
					emphasis: {
						shadowBlur: 10,
						shadowOffsetX: 0,
						shadowColor: 'rgba(0, 0, 0, 0.5)'
					}
				}
			}
			]
		};

		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}
	}
});


$.ajax({
	url:base_url+"/index.php/PrincipalFyE/AvanceCostoInv",
	type:"POST",
	cache:false,
	success:function(respuesta)
	{
		//alert(respuesta);
		var dom = document.getElementById("Avance");
		var myChart = echarts.init(dom);
		var app = {};
				option = null;
				option = {
		    title : {
		        text: '',
		        subtext: ''
		    },
		    grid: {
		        left: '3%',
		        right: '7%',
		        bottom: '3%',
		        containLabel: true
		    },
		    tooltip : {
		        trigger: 'axis',
		        showDelay : 0,
		        formatter : function (params) {
		            if (params.value.length > 1) {
		                return params.seriesName + ' :<br/>'
		                + params.value[0] + '%'
		                + params.value[1] + 'S/. ';
		            }
		            else {
		                return params.seriesName + ' :<br/>'
		                + params.name + ' : '
		                + params.value + ' S/. ';
		            }
		        },
		        axisPointer:{
		            show: true,
		            type : 'cross',
		            lineStyle: {
		                type : 'dashed',
		                width : 1
		            }
		        }
		    },
		    toolbox: {
		        feature: {
		            dataZoom: {},
		            brush: {
		                type: ['rect', 'polygon', 'clear']
		            }
		        }
		    },
		    brush: {
		    },
		    legend: {
		        data: ['AVANCE FÍSICO  COSTO ESTUDIO','COSTO ESTUDIO'],
		        left: 'center'
		    },
		    xAxis : [
		        {
		            type : 'value',
		            scale:true,
		            axisLabel : {
		                formatter: '% {value}'
		            },
		            splitLine: {
		                show: false
		            }
		        }
		    ],
		    yAxis : [
		        {
		            type : 'value',
		            scale:true,
		            axisLabel : {
		                formatter: 'S/ . {value}'
		            },
		            splitLine: {
		                show: false
		            }
		        }
		    ],
		    series : [
		        {
		            name:'AVANCE FÍSICO  COSTO ESTUDIO',
		            type:'scatter',
		            data: respuesta,
		            markArea: {
		                silent: true,
		                itemStyle: {
		                    normal: {
		                        color: 'transparent',
		                        borderWidth: 1,
		                        borderType: 'dashed'
		                    }
		                },
		                data: [[{
		                    name: 'AVANCE FÍSICO  COSTO ESTUDIO',
		                    xAxis: 'min',
		                    yAxis: 'min'
		                }, {
		                    xAxis: 'max',
		                    yAxis: 'max'
		                }]]
		            },
		            markPoint : {
		                data : [
		                    {type : 'max', name: 'AVANCE FÍSICO  COSTO ESTUDIO'},
		                    {type : 'min', name: 'AVANCE FÍSICO'}
		                ]
		            },
		            markLine : {
		                lineStyle: {
		                    normal: {
		                        type: 'solid'
		                    }
		                },
		                data : [
		                    {type : 'average', name: 'AVANCE FÍSICO'},
		                    { xAxis: 160 }
		                ]
		            }
		        }
		    ]
		};

		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}
	}
});








});

