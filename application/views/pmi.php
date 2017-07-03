<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> N° DE PROYECTOS</span>
            <div class="count">
                <center>
                    <div id="NumPip"></div>
                </center>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> MONTO TOTAL</span>
            <div class="count"><strong><h4>250000000</h4></strong></div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> COSTO INVERSIÓN </span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> SALDO PROGRAMADO</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> PROGRAMACIÓN</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> OPER Y MANT.</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>

        </div>
    </div>
    <!-- /top tiles -->


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Avance
                            <small>Fisico y Financiero</small>
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <div id="reportrange" class="pull-right"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <div class="x_title">
                        <h2>Avance del proyecto</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div>
                            <p>PMI</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar"
                                         data-transitiongoal="80"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Formulacion</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar"
                                         data-transitiongoal="60"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div>
                            <p>Ejecucion</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar"
                                         data-transitiongoal="40"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Funcionamiento</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar"
                                         data-transitiongoal="50"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <br/>

    <div class="row">


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Proyectos por Ciclos de Inversion</h2>

                    <div class="clearfix"></div>
                </div>

                <div id="panel_estadistica_ciclo_inversion" class="x_content">
                    <!-- <h4>#1235</h4>-->
                    <!--<div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Costo directo</span>
                        </div>

                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                    66%
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>123</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>-->

                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                    <h2>% de PIP por provincia</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;width: 200px;">
                                    Componente
                                </th>
                                <th style="text-align: left;">
                                    Leyenda
                                </th>
                                <th style="text-align: center;">
                                    %
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-top: 20px;text-align: center;">
                                    <canvas class="canvasDoughnut1" height="160" width="160"></canvas>
                                </td>
                                <td style="padding-top: 20px;text-align: left;vertical-align: middle;">
                                    <p><i class="fa fa-square blue" style="width: 15px;"></i>Abancay</p>
                                    <p><i class="fa fa-square purple" style="width: 15px;"></i>Andahuayla</p>
                                    <p><i class="fa fa-square red" style="width: 15px;"></i>Antabamba</p>
                                    <p><i class="fa fa-square green" style="width: 15px;"></i>Aymaraes</p>
                                    <p><i class="fa fa-square aero" style="width: 15px;"></i>Chinchero</p>
                                    <p><i class="fa fa-square black" style="width: 15px;"></i>Cotabamb</p>
                                    <p><i class="fa fa-square blue" style="width: 15px;"></i>Grau</p>
                                </td>
                                <td style="padding-top: 20px;text-align: center;">
                                    <p id="porcentajeAban"></p>
                                    <p id="porcentajeAnd"></p>
                                    <p id="porcentajeAnt"></p>
                                    <p id="porcentajeAy"></p>
                                    <p id="porcentajeChinc"></p>
                                    <p id="porcentajeCotab"></p>
                                    <p id="porcentajeGrau"></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>MONTO POR PROVINCIAS</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="table-estaditMontPIPProv" class="table table-responsive table-condensed" width="100%">

                    </table>


                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>PIP
                            <small>PROYECTOS POR PROVINCIAS</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="dashboard-widget-content">

                            <ul class="list-unstyled timeline widget">
                                <li>
                                    <div class="block">

                                        <h2 class="title"><a>ABANCAY</a></h2>
                                        <br>
                                        <table class="table table-condensed table-hover" width="100%">
                                            <tr>
                                                <th>
                                                    <p></i>CANTIDAD DE PIPS:</p>
                                                </th>
                                                <th class="col-sm-5">
                                                    <div id="CantidadPAbancay"></div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p></i>MONTO TOTAL (S/):</p>
                                                </th>

                                                <th>
                                                    <div id="MontoPipAbancay"></div>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title"><a>ANDAHUAYLAS</a></h2>
                                            <br>
                                            <table class="table table-condensed table-hover" width="100%">

                                                <tr>
                                                    <th>
                                                        <p>CANTIDAD DE PIPS:</p>
                                                    </th>
                                                    <th class="col-sm-5">
                                                        <div id="CantidadPAndahuaylas"></div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p>MONTO TOTAL (S/):</p>
                                                    </th>
                                                    <th><span><div id="MontoPipAndahuaylas"></div></span></th>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title"><a>ANTABAMBA</a></h2>
                                            <br>
                                            <table class="table table-condensed table-hover" width="100%">
                                                <tr>
                                                    <th>
                                                        <p>CANTIDAD DE PIPS:</p>
                                                    </th>
                                                    <td class="col-sm-5">
                                                        <div id="CantidadPAntabamba"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>MONTO TOTAL (S/):</p>
                                                    </td>
                                                    <td><span><div id="MontoPipAntabamba"></div></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title"><a>AYMARAES</a></h2>
                                            <br>
                                            <table class="table table-condensed table-hover" width="100%">
                                                <tr>
                                                    <th>
                                                        <p>CANTIDAD DE PIPS:</p>
                                                    </th>
                                                    <th class="col-sm-5">
                                                        <div id="CantidadPAymaraes"></div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p>MONTO TOTAL (S/):</p>
                                                    </th>
                                                    <th>
                                                        <div id="MontoPipAymaraes"></div>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title"><a>CHINCHEROS</a></h2>
                                            <br>
                                            <table class="table table-condensed table-hover" width="100%">
                                                <tr>
                                                    <th>
                                                        <p>CANTIDAD DE PIPS:</p>
                                                    </th>
                                                    <th class="col-sm-5">
                                                        <div id="CantidadPChincheros"></div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p>MONTO TOTAL (S/):</p>
                                                    </th>
                                                    <th>
                                                        <div id="MontoPipChincheros"></div>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title"><a>COTABAMBAS</a></h2>
                                            <br>
                                            <table class="table table-condensed table-hover" width="100%">
                                                <tr>
                                                    <th>
                                                        <p>CANTIDAD DE PIPS:</p>
                                                    </th>
                                                    <th class="col-sm-5">
                                                        <div id="CantidadPCotabambas"></div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p>MONTO TOTAL (S/):</p>
                                                    </th>
                                                    <th>
                                                        <div id="MontoPipCotabambas"></div>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title"><a>GRAU</a></h2>
                                            <br>
                                            <table class="table table-condensed table-hover" width="100%">
                                                <tr>
                                                    <th>
                                                        <p>CANTIDAD DE PIPS:</p>
                                                    </th>
                                                    <td>
                                                        <div id="CantidadPGrau"></div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p>MONTO TOTAL (S/):</p>
                                                    </th>
                                                    <th>
                                                        <div id="MontoPipGrau"></div>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-8 col-sm-8 col-xs-12">


                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>GEOLOCALIZACION
                                    <small>DE LOS PIPS</small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="dashboard-widget-content">
                                    <div class="col-md-4 hidden-small">
                                        <h2 class="line_30">Provincias de Apurimac</h2>

                                        <table class="countries_list">
                                            <tbody>
                                            <tr>
                                                <td>ABANCAY</td>
                                                <td class="fs15 fw700 text-right">33%</td>
                                            </tr>
                                            <tr>
                                                <td>ANDAHUAYLAS</td>
                                                <td class="fs15 fw700 text-right">27%</td>
                                            </tr>
                                            <tr>
                                                <td>ANTABAMBA</td>
                                                <td class="fs15 fw700 text-right">16%</td>
                                            </tr>
                                            <tr>
                                                <td>AYMARAES</td>
                                                <td class="fs15 fw700 text-right">11%</td>
                                            </tr>
                                            <tr>
                                                <td>CHINCHEROS</td>
                                                <td class="fs15 fw700 text-right">10%</td>
                                            </tr>
                                            <tr>
                                                <td>COTABAMBAS</td>
                                                <td class="fs15 fw700 text-right">10%</td>
                                            </tr>
                                            <tr>
                                                <td>GRAU</td>
                                                <td class="fs15 fw700 text-right">10%</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="map" style="height: 350px; width: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">


                    <!-- Start to do list -->
                    <!--<div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>LISTA
                                    <small>REPORTES</small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="">
                                    <ul class="to_do">
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Reporte del PMI </p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Reporte de formulacion</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Reporte de Evaluacion</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Reporte de expediente tecnico</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Reporte de ejecucion</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Reporte de liquidacion</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Reporte de funcionamiento</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Copy backups to offsite location
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!-- End to do list -->

                    <!-- start of weather widget -->
                    <!--<div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>DATOS DEL CLIMA
                                    <small>Apurimac</small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="temperature"><b>Monday</b>, 07:30 AM
                                            <span>F</span>
                                            <span><b>C</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="weather-icon">
                                            <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="weather-text">
                                            <h2>Apurimac <br><i>Reporte del clima</i></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="weather-text pull-right">
                                        <h3 class="degrees">23</h3>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="row weather-days">
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Lun</h2>
                                            <h3 class="degrees">25</h3>
                                            <canvas id="clear-day" width="32" height="32"></canvas>
                                            <h5>15 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Mar</h2>
                                            <h3 class="degrees">25</h3>
                                            <canvas height="32" width="32" id="rain"></canvas>
                                            <h5>12 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Mie</h2>
                                            <h3 class="degrees">27</h3>
                                            <canvas height="32" width="32" id="snow"></canvas>
                                            <h5>14 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Jue</h2>
                                            <h3 class="degrees">28</h3>
                                            <canvas height="32" width="32" id="sleet"></canvas>
                                            <h5>15 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Vie</h2>
                                            <h3 class="degrees">28</h3>
                                            <canvas height="32" width="32" id="wind"></canvas>
                                            <h5>11 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Sab</h2>
                                            <h3 class="degrees">26</h3>
                                            <canvas height="32" width="32" id="cloudy"></canvas>
                                            <h5>10 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>-->
                    <!-- end of weather widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->