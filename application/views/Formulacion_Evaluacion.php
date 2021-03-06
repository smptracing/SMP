<!-- page content -->
<div class="right_col" role="main">
	<div class="">

		<div class="clearfix"></div>

		<div class="row top_tiles">
			<?php foreach($listarEtapas as $item ){ ?>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-pencil"></i></div>
					<div class="count"><?=$item->Cantidadpip?><p>Estudios</p></div>
					<div id="CantidadEstudioFormulacion"></div>
					<h3><?=$item->denom_etapas_fe?></h3>

				</div>
			</div>
			<?php } ?>


		</div>
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Avance fisico por costo de inversión</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div id="Avance" style="height:350px;"></div>
						<!-- <div id="ReporteBarras" style="height:350px;"></div> -->
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>ESTUDIO POR ETAPA</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div id="EstudioEtapa" style="height:350px;"></div>
					</div>
				</div>
			</div>


			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>ESTUDIOS POR PROVINCIA</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div id="EstudioProvinvia" style="height:350px;"></div>

					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>TIPO DE ESTUDIO</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div id="CenterFEvaluacion" style="height:350px;"></div>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>MONTOS DE TIPO DE GASTO</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div id="MontosTiposGasto" style="height:350px;"></div>
						<!--<canvas class="MontosTiposGasto" height="160" width="160" style="width: 160px; height: 160px;"></canvas>-->

					</div>
				</div>
			</div>


			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">


					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2> </h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<!-- <div id="echart_line" style="height:350px;"></div>-->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
