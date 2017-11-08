<?php

$sumatoriasTotales=[];
$totalGeneral=0;
function mostrarMetaAnidada($meta, $expedienteTecnico, &$sumatoriasTotales,&$totalGeneral)
{
    $htmlTemp='';


    if(count($meta->childMeta)==0)
    {
        
        foreach($meta->childPartida as $key => $value)
        {

            $totalGeneral+=($value->cantidad*$value->precio_unitario);

            if($expedienteTecnico->num_meses!=null)
            {
                for($i=0; $i<$expedienteTecnico->num_meses; $i++)
                {
                    if(!isset($sumatoriasTotales[$i]))
                    {
                        $sumatoriasTotales[]=0;
                    }

                    $precioTotalMesValorizacionTemp=0;
                    $cantidadMesValorizacionTemp=0;

                    foreach($value->childDetallePartida->childMesValorizacion as $index => $item)
                    {
                        if($item->id_detalle_partida==$value->childDetallePartida->id_detalle_partida && $item->numero_mes==($i+1))
                        {
                            $sumatoriasTotales[$i]+=$item->precio;

                            $precioTotalMesValorizacionTemp=$item->precio;

                            $cantidadMesValorizacionTemp=$item->cantidad;

                            break;
                        }
                    }
                }
            }

        }
        
    }

    foreach($meta->childMeta as $key => $value)
    {
        $htmlTemp.=mostrarMetaAnidada($value, $expedienteTecnico, $sumatoriasTotales,$totalGeneral);
    }

    return $htmlTemp;
}
?>
<style>
.thebox{
    height: 90px;
    background-color: white;
    margin: 20px 5px;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
    border-radius: 6px;
    position: relative;
}
.thebox .box-header{
    float: left;
    text-align: center;
    margin: -15px 15px 0;
    border-radius: 3px;
    padding: 10px;
    box-shadow:  0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
    position: relative;
}
.thebox .box-header i{
    font-size: 30px;
    line-height: 46px;
    width: 56px;
    height: 46px;
    color: white;
}
.thebox .box-content
{
    text-align: right;
    padding-top: 10px;
    padding: 10px 6px;
    position: relative;
    color: #3C4858;

}
.parrafo
{
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 200;
    line-height: 1em;
    font-size: 15px;
}
.titulo
{
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    font-weight: 200;
    line-height: 1em;
    font-size: 17px;
}

.box-red
{
    background-color: #ef5350;
}
.box-orange
{
    background:  linear-gradient(60deg, #ffa726, #fb8c00);
}
.box-green
{
    background: linear-gradient(60deg, #66bb6a, #43a047);
}
.box-blue
{
    background: linear-gradient(60deg, #26c6da, #00acc1);
}
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thebox">                  
                    <div class="box-header box-orange">    
                        <i class="fa fa-home"></i>                    
                    </div>
                    <div class="box-content">
                        <p class="titulo">PIA</p>
                        <p class="parrafo">S/. 1,234,321.45</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thebox">                  
                    <div class="box-header box-red">    
                        <i class="fa fa-home"></i>                     
                    </div>
                    <div class="box-content">
                        <p class="titulo">PIM</p>
                        <p class="parrafo">S/. 123,234,321.43</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thebox">                  
                    <div class="box-header box-green">  
                        <i class="fa fa-home"></i>                       
                    </div>
                    <div class="box-content">
                        <p class="titulo">DEVENGADO</p>
                        <p class="parrafo">S/. 1,234,321</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="thebox">                  
                    <div class="box-header box-blue"> 
                        <i class="fa fa-home"></i>                        
                    </div>
                    <div class="box-content">
                        <p class="titulo">GIRADO</p>
                        <p class="parrafo">S/. 1,234,321</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
                    <?php foreach($value->childMeta as $index => $item){ ?>
                        <?= mostrarMetaAnidada($item, $expedienteTecnico, $sumatoriasTotales,$totalGeneral)?>
                    <?php } ?>
                <?php } ?>

                <!--<?php if($expedienteTecnico->num_meses!=null)
                {
                    $suma = 0;
                    for($i=0; $i<$expedienteTecnico->num_meses; $i++) { ?>
                        <p><b><?=a_number_format($sumatoriasTotales[$i], 2, '.',",",3);?></b></p>
                        <p><b> <?=$suma+=$sumatoriasTotales[$i]?>  </b></p>
                    <?php }
                }?>-->

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reporte Estadístico<small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!--<canvas id="grafico"></canvas>-->
                        <div id="grafico" style="height:350px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/echarts/dist/echarts.min.js"></script>

<script>
    var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

      var echartLine = echarts.init(document.getElementById('grafico'), theme);

      echartLine.setOption({
        title: {
          text: '',
          subtext: ''
        },
        tooltip: {
          trigger: 'axis'
        },
        
        toolbox: {
          show: true,
          feature: {
            magicType: {
              show: true,
              title: {
                line: 'Linea',
                bar: 'Barra'
              },
              type: ['line', 'bar']
            },
            restore: {
              show: true,
              title: "Restaurar"
            },
            saveAsImage: {
              show: true,
              title: "Guardar Image"
            }
          }
        },
        calculable: true,
        xAxis: [{
          type: 'category',
          boundaryGap: false,
          data: ["",<?php if($expedienteTecnico->num_meses!=null)
            {
                for($i=0; $i<$expedienteTecnico->num_meses; $i++) 
                { 
                    echo "'Mes ".($i+1)."',";
                }
            }?>]
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Programado',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [0,

                <?php if($expedienteTecnico->num_meses!=null)
                {
                    $suma = 0;
                    for($i=0; $i<$expedienteTecnico->num_meses; $i++) 
                    {
                        $monto = $suma+=$sumatoriasTotales[$i];

                        echo ''.$monto.',';
                    }
                } ?>]
        }, {
          name: 'Ejecutado',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [0, 0, 0, 0, 0, 0, 0]
        }]
      });



    </script>