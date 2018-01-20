<style>
	#tableSub1 td, #tableSub1 th
	{
		border: 1px solid black;
		font-size: 10px;
		padding: 2px;
		text-align: left;
		vertical-align: middle;
	}
	#tableSub2 td, #tableSub2 th
	{
		border: 1px solid black;
		font-size: 10px;
		padding: 2px;
		text-align: left;
		vertical-align: middle;
	}
	#tableSub3 td, #tableSub3 th
	{
		border: 1px solid black;
		font-size: 10px;
		padding: 2px;
		text-align: left;
		vertical-align: middle;
	}
	table{
		border-collapse: collapse;
	}
	#tableSub3 th 
	{
	    text-align:center; 
	    vertical-align:middle;
	}
</style>
<head>
	<title>VALORIZACIÓN DE EJECUCIÓN</title>
	<meta charset="utf-8">
</head>
<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<table style="margin-top: 10px;width: 100%; padding-right: 120px; padding-left: 120px;">
					<tr>
						<td style="width: 85px;">
							<img style="width: 80px;" src="./assets/images/peru.jpg">
						</td>
						<td id="header_texto">
							<div style="text-align: center;"><b>GOBIERNO REGIONAL DE APURÍMAC</b></div>
							<div style="text-align: center; font-size: 12px;">GERENCIA REGIONAL DE PLANEAMIENTO, PRESUPUESTO Y ACONDICIONAMIENTO TERRITORIAL.</div>
							<div style="text-align: center; font-size: 12px;">Sub Gerencia de Programación Multianual de Inversiones<br> OPMI</div>
						</td>
						<td style="width: 90px;">
							<img style="width: 80px;" src="./assets/images/logo.jpg">
						</td>
					</tr>
				</table>
				<div style="text-align: center; font-size: 12px;"><b>Formato Nº 02<br>Ficha de Monitoreo de Inversiones<br></b></div>
				<div class="x_content">
					<BR>
					<table id="tableSub1" width="100%">
						<tr>
							<td style="width: 20%">FECHA DE VISITA</td>
							<td style="width: 80%"></td>
						</tr>
						<tr>
							<td style="width: 20%">MONITOR</td>
							<td></td>
						</tr>
					</table><br>
					<table id="tableSub2" width="100%">
						<tr>
							<td style="width: 20%">CODIGO</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">NOMBRE PIP</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">FECHA VIABILIDAD</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">MONTO INVERSIÓN</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">EJECUCIÓN ACUMULADA</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">PIM</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">FUENTE DE FINANCIAMIENTO</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">EJECUCIÓN ACUMULADA (DEVENGADO)</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">% AVANCE FINANCIERO TOTAL</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">% AVANCE FÍSICO TOTAL</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">UNIDAD EJECUTORA DE INVERSIONES</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">MODALIDAD DE EJECUCIÓN</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">RESIDENTE RESPONSABLE DE OBRA</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">SUPERVISOR DE OBRA</td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 20%">ASISTENTE ADMINISTRATIVO</td>
							<td></td>
						</tr>
					</table>
					<br>
					<table id="tableSub3" width="100%">
						<thead >
							<tr>
								<th rowspan="3">Descripción del producto</th>
								<th rowspan="3">Actividades</th>
								<th colspan="7">Ejecución Física</th>
								<th colspan="6">Ejecución Financiera</th>
								<th rowspan="3">Resultado de Monitoreo</th>
								<th rowspan="3">Observaciones</th>
								<th rowspan="3">Compromiso</th>
							</tr>
							<tr>
								<th rowspan="2">Unidad Med.</th>
								<th rowspan="2">Meta</th>
								<th colspan="2">Meta Programada</th>
								<th colspan="2">Meta Ejecutada</th>
								<th rowspan="2">% Avance Acum.</th>
								<th rowspan="2">Monto Total</th>
								<th colspan="2">Monto Programado</th>
								<th colspan="2">Monto Ejecutado</th>
								<th rowspan="2">% Avance Acum.</th>
							</tr>
							<tr>
								<th>Del mes</th>
								<th>Acumulado</th>
								<th>Del mes</th>
								<th>Acumulado</th>
								<th>Del mes</th>
								<th>Acumulado</th>
								<th>Del mes</th>
								<th>Acumulado</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listaProducto as $key => $value) {?>
								<tr>
									<td><?=$value->desc_producto?></td>
									<td><?=$value->desc_actividad?></td>
									<td><?=$value->uni_medida?></td>
									<td><?=$value->meta?></td>
									<td>del mes</td>
									<?php foreach ($value->ResumenAvance as $key => $item) { ?>
										<td><?=$item->AcumFisProg?></td>
										<td><?=$item->AcumFisProg?></td>
										<td><?=$item->AcumFisReal?></td>
										<td><?=($item->AcumFisProg==0) ? '' : a_number_format($item->AcumFisReal*100/$item->AcumFisProg , 2, '.',",",0). ' %'?></td>
										<td></td>
										<td>del mes</td>
										<td><?=a_number_format($item->AcumFinProg,2,'.',",",3)?></td>
										<td>del mes</td>
										<td><?=a_number_format($item->AcumFinReal,2,'.',",",3)?></td>
									<?php } ?>
									<td><?=($item->AcumFinProg==0) ? '' : a_number_format($item->AcumFinReal*100/$item->AcumFinProg , 2, '.',",",0).' %'?></td>
									<td></td>
									<td></td>
									<td></td>								
								</tr>
							<?php } ?>
							
						</tbody>						
					</table>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>