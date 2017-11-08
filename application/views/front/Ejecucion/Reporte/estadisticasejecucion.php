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

                <?php if($expedienteTecnico->num_meses!=null)
                {
                    for($i=0; $i<$expedienteTecnico->num_meses; $i++) { ?>
                        <p><b>S/.<?=a_number_format($sumatoriasTotales[$i], 2, '.',",",3);?> - </b></p>
                    <?php }
                }?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
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
                        <canvas id="grafico"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<script>
      Chart.defaults.global.legend = {
        enabled: false
      };
      //"rgba(255, 255, 255, 0.34)",

      var ctx = document.getElementById("grafico");
      var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["", "January", "February", "Msssssssarch", "April", "May", "June", "July", "otr"],
          datasets: [{
            label: "My First dataset",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: [0, 2345451000, 74, 6, 39, 20, 85, 7, 20]
          }, {
            label: "My Second dataset",
            backgroundColor: "rgba(3, 88, 106, 0.3)",
            borderColor: "rgba(3, 88, 106, 0.70)",
            pointBorderColor: "rgba(3, 88, 106, 0.70)",
            pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(151,187,205,1)",
            pointBorderWidth: 1,
            data: [0, 35, 23, 66, 9, 99, 4, 2, 40]
          }]
        },
      });


    </script>