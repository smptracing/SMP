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
            <span class="count_bottom"><i class="green">4%</i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> COSTO INVERSIÓN </span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4%</i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> SALDO PROGRAMADO</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4%</i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> PROGRAMACIÓN</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4%</i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> OPER Y MANT.</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4%</i> From last Week</span>
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
                    <div>
                    	<div class="col-md-12 col-sm-12 col-xs-6">
	                        <div>
	                            <p>PMI</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                                </div>
	                        </div>
	                        <div>
	                            <p>Formulacion</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                                </div>
	                        </div>
	                    </div>
	                    <div class="col-md-12 col-sm-12 col-xs-6">
	                        <div>
	                            <p>Ejecucion</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                                </div>
	                        </div>
	                        <div>
	                            <p>Funcionamiento</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                </div>
	                        </div>
	                    </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Proyectos por ciclos de inversion</h2>
                    <div class="clearfix"></div>
                </div>
                <div id="panel_estadistica_ciclo_inversion" class="x_content"></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                    <h2>% de PIP por provincia</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a></li>
                                <li><a href="#">Settings 2</a></li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
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
                    <h2>Monto por provincia</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a></li>
                                <li><a href="#">Settings 2</a></li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="table-estaditMontPIPProv" class="table table-responsive table-condensed" width="100%"></table>
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
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            	<ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">
                            <ul class="list-unstyled timeline widget">
                                <li>
                                    <div class="block">
                                        <h2 class="title">ABANCAY</h2>
                                        <br>
                                        <table class="table table-condensed table-hover" width="100%">
                                            <tbody>
                                            	<tr>
	                                                <td>CANTIDAD DE PIPS:</td>
	                                                <td class="col-sm-5"><div style="text-align: center;" id="CantidadPAbancay"></div></td>
	                                            </tr>
	                                            <tr>
	                                                <td>MONTO TOTAL (S/):</td>
	                                                <td><div style="text-align: center;" id="MontoPipAbancay"></div></td>
	                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <h2 class="title">ANDAHUAYLAS</h2>
                                        <br>
                                        <table class="table table-condensed table-hover" width="100%">
                                        	<tbody>
                                        		<tr>
                                                    <td>CANTIDAD DE PIPS:</td>
                                                    <td class="col-sm-5"><div style="text-align: center;" id="CantidadPAndahuaylas"></div></td>
                                                </tr>
                                                <tr>
                                                    <td>MONTO TOTAL (S/):</td>
                                                    <td><div style="text-align: center;" id="MontoPipAndahuaylas"></div></td>
                                                </tr>
                                        	</tbody>
                                        </table>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <h2 class="title">ANTABAMBA</h2>
                                        <br>
                                        <table class="table table-condensed table-hover" width="100%">
                                            <tr>
                                                <td>CANTIDAD DE PIPS:</td>
                                                <td class="col-sm-5"><div style="text-align: center;" id="CantidadPAntabamba"></div></td>
                                            </tr>
                                            <tr>
                                                <td>MONTO TOTAL (S/):</td>
                                                <td><div style="text-align: center;" id="MontoPipAntabamba"></div></td>
                                            </tr>
                                        </table>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <h2 class="title">AYMARAES</h2>
                                        <br>
                                        <table class="table table-condensed table-hover" width="100%">
                                            <tr>
                                                <td>CANTIDAD DE PIPS:</td>
                                                <td class="col-sm-5"><div style="text-align: center;" id="CantidadPAymaraes"></div></td>
                                            </tr>
                                            <tr>
                                                <td>MONTO TOTAL (S/):</td>
                                                <td><div style="text-align: center;" id="MontoPipAymaraes"></div></td>
                                            </tr>
                                        </table>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <h2 class="title">CHINCHEROS</h2>
                                        <br>
                                        <table class="table table-condensed table-hover" width="100%">
                                            <tr>
                                                <td>CANTIDAD DE PIPS:</td>
                                                <td class="col-sm-5">
                                                    <div style="text-align: center;" id="CantidadPChincheros"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>MONTO TOTAL (S/):</td>
                                                <td><div style="text-align: center;" id="MontoPipChincheros"></div></td>
                                            </tr>
                                        </table>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <h2 class="title">COTABAMBAS</h2>
                                        <br>
                                        <table class="table table-condensed table-hover" width="100%">
                                            <tr>
                                                <td>CANTIDAD DE PIPS:</td>
                                                <td class="col-sm-5">
                                                    <div style="text-align: center;" id="CantidadPCotabambas"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>MONTO TOTAL (S/):</td>
                                                <td><div style="text-align: center;" id="MontoPipCotabambas"></div></td>
                                            </tr>
                                        </table>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <h2 class="title">GRAU</h2>
                                        <br>
                                        <table class="table table-condensed table-hover" width="100%">
                                            <tr>
                                                <td>CANTIDAD DE PIPS:</td>
                                                <td><div style="text-align: center;" id="CantidadPGrau"></div></td>
                                            </tr>
                                            <tr>
                                                <td>MONTO TOTAL (S/):</td>
                                                <td><div style="text-align: center;" id="MontoPipGrau"></div></td>
                                            </tr>
                                        </table>
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
            </div>
        </div>
    </div>
</div>