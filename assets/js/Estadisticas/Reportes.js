$(document).on("ready" ,function(){

$.ajax({
		url:base_url+"/index.php/PrincipalReportes/GetAprobadosEstudio",
		dataType:"json",
		type:"POST",
		cache:false,
		success:function(respuesta)
		{
			var arrayNaturalezaInv=new Array();
			$.each(respuesta,function(index,element)
			{
				arrayNaturalezaInv[index]=element.Cantidadpip;
			});

			var dom = document.getElementById("NaturalezaInversion");
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
					data: ['Creación','Ampliación','Mejoramiento','Recuperación']
				},

				series : [
				{
					name: 'Naturaleza Inversion',
					type: 'pie',
					radius : '55%',
					center: ['50%', '60%'],
					data:[
					{value:arrayNaturalezaInv[0], name:'Creación'},
					{value:arrayNaturalezaInv[1], name:'Ampliación'},
					{value:arrayNaturalezaInv[2], name:'Mejoramiento'},
					{value:arrayNaturalezaInv[3], name:'Recuperación'},
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
		url:base_url+"/index.php/PrincipalReportes/NaturalezaInversionMontos",
		dataType:"json",
		type:"POST",
		cache:false,
		success:function(respuesta)
		{
			var arrayNaturalezaMontosPip=new Array();
			$.each(respuesta,function(index,element)
			{
				arrayNaturalezaMontosPip[index]=element.Monto;
			});

			var dom = document.getElementById("MontosPipPorNaturaleza");
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
					data: ['Creación','Ampliación','Mejoramiento','Recuperación']
				},

				series : [
				{
					name: 'Naturaleza Inversion',
					type: 'pie',
					radius : '55%',
					center: ['50%', '60%'],
					data:[
					{value:arrayNaturalezaMontosPip[0], name:'Creación'},
					{value:arrayNaturalezaMontosPip[1], name:'Ampliación'},
					{value:arrayNaturalezaMontosPip[2], name:'Mejoramiento'},
					{value:arrayNaturalezaMontosPip[3], name:'Recuperación'},
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
	url:base_url+"/index.php/PrincipalReportes/CantidadPipFuenteFinancimiento",
	dataType:"json",
	type:"POST",
	cache:false,
	success:function(respuesta)
	{
		var arrayNumPipFuenteFinan=new Array();
		$.each(respuesta,function(index,element)
		{
			arrayNumPipFuenteFinan[index]=element.Cantidadpip;
		});

		var dom = document.getElementById("NumPipFuenteFinanciamiento");
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
					data: ['Donaciones y transferencias','Recursos Determinados','Recursos Directamente Recaudados','Recursos ordinarios','Recursos Por Operaciones Oficiales de Credito']
			},
			
		    series: [
		        {
		            name:'Fuente de Financiamiento',
		            type:'pie',
		            radius: ['20%', '40%'],
		            avoidLabelOverlap: false,
		            label: {
		                normal: {
		                    show: false,
		                    position: 'center'
		                },
		                emphasis: {
		                    show: true,
		                    textStyle: {
		                        fontSize: '12',
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
							{value:arrayNumPipFuenteFinan[0], name:'Donaciones y transferencias'},
							{value:arrayNumPipFuenteFinan[1], name:'Recursos Determinados'},
							{value:arrayNumPipFuenteFinan[2], name:'Recursos Directamente Recaudados'},
							{value:arrayNumPipFuenteFinan[3], name:'Recursos ordinarios'},
							{value:arrayNumPipFuenteFinan[4], name:'Recursos Por Operaciones Oficiales de Credito'}
						]

		        }
		    ]
		};
	
		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}

	}
});



$.ajax({
		url:base_url+"/index.php/PrincipalReportes/CantidadPipModalidad",
		dataType:"json",
		type:"POST",
		cache:false,
		success:function(respuesta)
		{
			var arrayNumPipModalidad=new Array();
			$.each(respuesta,function(index,element)
			{
				arrayNumPipModalidad[index]=element.CantidadPip;
			});

			var dom = document.getElementById("NumPipModalidad");
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
					data: ['Administracion Directa','Contrata Consultores Externos','Mixto']
				},

				series : [
				{
					name: 'Naturaleza Inversion',
					type: 'pie',
					radius : '55%',
					center: ['50%', '60%'],
					data:[
					{value:arrayNumPipModalidad[0], name:'Administracion Directa'},
					{value:arrayNumPipModalidad[1], name:'Contrata Consultores Externos'},
					{value:arrayNumPipModalidad[2], name:'Mixto'}
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
	url:base_url+"/index.php/PrincipalReportes/MontoPipModalidad",
	dataType:"json",
	type:"POST",
	cache:false,
	success:function(respuesta)
	{
		var arrayModalidadMontosPip=new Array();
		$.each(respuesta,function(index,element)
		{
			arrayModalidadMontosPip[index]=element.Monto;
		});

		var dom = document.getElementById("MontoPipsModalidad");
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
				data: ['Administracion Directa','Contrata Consultores Externos','Mixto']
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
		                        fontSize: '12',
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
						{value:arrayModalidadMontosPip[0], name:'Administracion Directa'},
						{value:arrayModalidadMontosPip[1], name:'Contrata Consultores Externos'},
						{value:arrayModalidadMontosPip[2], name:'Mixto'}
						]

		        }
		    ]
		};
	
		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}

	}
});

$.ajax({
		url:base_url+"/index.php/PrincipalReportes/CantidadPipRubro",
		dataType:"json",
		type:"POST",
		cache:false,
		success:function(respuesta)
		{
			var arrayNumPipRubro=new Array();
			$.each(respuesta,function(index,element)
			{
				arrayNumPipRubro[index]=element.Cantidadpip;
			});

			var dom = document.getElementById("CantidadPipRubro");
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
					data: ['Canon y sobrecanon','Contribuciones a fondos','Donaciones y transferencias','Fondo de compensación regional','Recursos Directamente Recaudados','Recursos por operaciones']
				},

				series : [
				{
					name: 'Rubro Ejecucion',
					type: 'pie',
					radius : '45%',
					center: ['50%', '60%'],
					data:[
					{value:arrayNumPipRubro[0], name:'Canon y sobrecanon'},
					{value:arrayNumPipRubro[1], name:'Contribuciones a fondos'},
					{value:arrayNumPipRubro[2], name:'Donaciones y transferencias'},
					{value:arrayNumPipRubro[3], name:'Fondo de compensación regional'},
					{value:arrayNumPipRubro[4], name:'Recursos Directamente Recaudados'},
					{value:arrayNumPipRubro[5], name:'Recursos ordinarios'},
					{value:arrayNumPipRubro[6], name:'Recursos por operaciones'},
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
		url:base_url+"/index.php/PrincipalReportes/CantidadPipProvincia",
		type:"POST",
		cache:false,
		success:function(respuesta)
		{
			var cantidadpipprovincias=JSON.parse(respuesta);
			console.log(cantidadpipprovincias);
			var dom = document.getElementById("container");
			var myChart = echarts.init(dom);
			var app = {};
			option = null;
			app.title = '坐标轴刻度与标签对齐';

			option = {
			    color: ['#3398DB'],
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
			            data : ['Abancay', 'Andahuaylas', 'Antabamba', 'Aymaraes', 'Chincheros', 'Cotabambas', 'Grau'],
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
			            name:'Cantidad de pip',
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
		url:base_url+"/index.php/PrincipalReportes/CantidadPipProvincia",
		type:"POST",
		cache:false,
		success:function(respuesta)
		{
				var cantidadpipprovincias=JSON.parse(respuesta);
			console.log(cantidadpipprovincias);
			var dom = document.getElementById("dispersion");
			var myChart = echarts.init(dom);
			var dataBJ = [
		    [1,55,9,56,0.46,18,6,"hola"],
		    [2,25,11,21,0.65,34,9,"prueba"]
		];

		var schema = [
		    {name: 'date', index: 0, text: '日'},
		    {name: 'AQIindex', index: 1, text: 'AQI指数'},
		    {name: 'PM25', index: 2, text: 'PM2.5'},
		    {name: 'PM10', index: 3, text: 'PM10'},
		    {name: 'CO', index: 4, text: '一氧化碳（CO）'},
		    {name: 'NO2', index: 5, text: '二氧化氮（NO2）'},
		    {name: 'SO2', index: 6, text: '二氧化硫（SO2）'}
		];


		var itemStyle = {
		    normal: {
		        opacity: 0.8,
		        shadowBlur: 10,
		        shadowOffsetX: 0,
		        shadowOffsetY: 0,
		        shadowColor: 'rgba(0, 0, 0, 0.5)'
		    }
		};

		option = {
		    backgroundColor: 'white',
		    color: [
		        '#dd4444', '#fec42c', '#80F1BE'
		    ],
		    legend: {
		        y: 'top',
		        data: ['北京'],
		        textStyle: {
		            color: 'red',
		            fontSize: 16
		        }
		    },
		    grid: {
		        x: '10%',
		        x2: 150,
		        y: '18%',
		        y2: '10%'
		    },
		    tooltip: {
		        padding: 10,
		        backgroundColor: '#222',
		        borderColor: '#777',
		        borderWidth: 1,
		        formatter: function (obj) {
		            var value = obj.value;
		            return '<div style="border-bottom: 1px solid rgba(255,255,255,.3); font-size: 18px;padding-bottom: 7px;margin-bottom: 7px">'
		                + obj.seriesName + ' ' + value[0] + '日：'
		                + value[7]
		                + '</div>'
		                + schema[1].text + '：' + value[1] + '<br>'
		                + schema[2].text + '：' + value[2] + '<br>'
		                + schema[3].text + '：' + value[3] + '<br>'
		                + schema[4].text + '：' + value[4] + '<br>'
		                + schema[5].text + '：' + value[5] + '<br>'
		                + schema[6].text + '：' + value[6] + '<br>';
		        }
		    },
		    xAxis: {
		        type: 'value',
		        name: '日期',
		        nameGap: 16,
		        nameTextStyle: {
		            color: 'red',
		            fontSize: 14
		        },
		        max: 31,
		        splitLine: {
		            show: false
		        },
		        axisLine: {
		            lineStyle: {
		                color: 'black'
		            }
		        }
		    },
		    yAxis: {
		        type: 'value',
		        name: 'AQI指数',
		        nameLocation: 'end',
		        nameGap: 20,
		        nameTextStyle: {
		            color: 'red',
		            fontSize: 16
		        },
		        axisLine: {
		            lineStyle: {
		                color: 'black'
		            }
		        },
		        splitLine: {
		            show: false
		        }
		    },
		     series: [
		        {
		            name: '北京',
		            type: 'scatter',
		            itemStyle: itemStyle,
		            data: dataBJ
		        }
		    ]
		};
			
			if (option && typeof option === "object") {
			    myChart.setOption(option, true);
			}

			}
	});
		


});
