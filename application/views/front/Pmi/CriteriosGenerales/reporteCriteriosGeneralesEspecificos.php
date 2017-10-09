
<!DOCTYPE html>
<html>
<head>
	<title>Reporte de AU</title>
</head>
<body style="font-family: Helvetica;text-align: center;">
	<header style="font-size: 12px;margin-top: -44px;width: 100%;">
		<table style="margin-top: 17px;width: 100%;">
			<tr>
				<td style="width: 85px;">
					<img style="width: 80px;" src="./assets/images/peru.jpg">
				</td>
				<td id="header_texto">
					<div style="text-align: center;"><b>CRITERIOS GENERALES</b></div>
					<br>
					<div style="text-align: center;"> </div>
				</td>
				<td style="width: 85px;">
					<img style="width: 80px;" src="./assets/images/logo.jpg">
				</td>
			</tr>
		</table>
	</header>
	<div>
			<table style="width: 90%; font-size:8px; border-collapse: separate;border-spacing:  0px;">
				<tr>
					<th style="height: 15px;text-align: left;width: 0px;">FUNCIÓN</th>
					<th style="height: 15px;text-align: center;width: 0px;">C. GENERAL</th>
					<th style="width: 1px;position: relative;">P</th>
					<th style="width: 1px;position: relative;">%(100)</th>
					<th style="text-align: center;width: 10px;">C. ESPECIFICOS</th>
					<th style="text-align: center;width: 10px;">P</th>
					<th style="text-align: center;width: 10px;">%(100)</th>
				</tr>
				<tbody>
					<?php foreach($listarfuncionCriterioGeneral as $key => $value){  ?>
						<tr>
							<td style="width: 10px;"><b><?=$value->nombre_funcion?>.</b></td>
						</tr>
						<?php foreach($value->childCriteriGeneral  as $index => $item){  ?>
							<tr>
								<td></td>
								<td style=""><b><?=$item->nombre_criterio_gen?>.</b></td>
								<td style="text-align: right"><b><?=strtoupper(html_escape($item->peso_criterio_gen))?></b></td>
								<td style="text-align: right"><b><?=strtoupper(html_escape($item->porcentaje))?></b></td>
								<td></td>
								<th style="text-align: right;width: 10px;"></th>
								<th style="text-align: right;width: 10px;"></th>
							</tr>
								<?php foreach($item->childEspecificos  as $index => $itemp){  ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><?=strtoupper(html_escape($itemp->nombre_criterio))?></td>
									<td style="text-align: right"><?=strtoupper(html_escape($itemp->peso))?></td>
									<td style="text-align: right"><?=strtoupper(html_escape($itemp->porcentaje))?></td>
								</tr>
								<?php } ?>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
	</div>
</body>
</html>