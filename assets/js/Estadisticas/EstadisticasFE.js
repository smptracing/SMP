$(document).on("ready" ,function(){
        
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

	                 if (option && typeof option === "object") {
	                 	myChart.setOption(option, true);
	                 }
                }
          });
          
        
          //Fin estadistica en forma de circulo

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
                   data: ['Formulación','Evaluación','Viabilidad','Aprobados','Otros']
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
                          {value:10, name:'Formulación'},
                          {value:5, name:'Evaluación'},
                          {value:15, name:'Viabilidad'},
                          {value:25, name:'Aprobados'},
                          {value:20, name:'Otros'}
                      ]
                  }
              ]
          };
          ;
          if (option && typeof option === "object") {
              myChart.setOption(option, true);
          }
            //inicio graficos
             if ("undefined" != typeof Chart && (console.log("init_chart_doughnut"), $(".MontosTiposGasto").length))
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
            }


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
	                 		data: ['Aprobados','Evaluación','Viabilidad','Formulación','Otros']
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
	                 }

     	});