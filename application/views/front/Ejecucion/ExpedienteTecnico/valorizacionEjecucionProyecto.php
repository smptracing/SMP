<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>EXPEDIENTE TÉCNICO (VALORIZACIÓN DE EJECUCIÓN)</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php foreach($expedienteTecnico->childComponente as $key => $value)
					{
						echo $value->descripcion;
					} ?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>