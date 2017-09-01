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



});
