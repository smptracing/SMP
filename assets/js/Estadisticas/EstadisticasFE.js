


          /*$.ajax({
                url:base_url+"/index.php/PrincipalFyE/GetAprobadosEstudio",
                type:"POST",
                success:function(respuesta){
                  console.long(respuesta);
                }
          });*/

          //estadistica en forma de circulo
          var dom = document.getElementById("PieFormulacionEvaluacion");
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
           orient: 'vertical',
           left: 'left',
           data: ['Formulación','Evaluación','Viabilidad','Aprobados','Otros']
          },
          series : [
           {
               name: '%',
               type: 'pie',
               radius : '55%',
               center: ['50%', '60%'],
               data:[
                   {value:335, name:'Formulación'},
                   {value:310, name:'Evaluación'},
                   {value:234, name:'Viabilidad'},
                   {value:135, name:'Aprobados'},
                   {value:1548, name:'Otros'}
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
          ;
          if (option && typeof option === "object") {
          myChart.setOption(option, true);
          }
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


