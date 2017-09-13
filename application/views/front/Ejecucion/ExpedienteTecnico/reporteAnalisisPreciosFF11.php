<?php
function obtenerPartidas($meta)
{
	$partidas=[];

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$partidas[]=$value;
		}

		return $partidas;
	}

	foreach($meta->childMeta as $key => $value)
	{
		foreach(obtenerPartidas($value) as $index => $item)
		{
			$partidas[]=$item;
		}
	}

	return $partidas;
}
?>
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
					<div style="text-align: center;"><b>FORMATO FF-11</b></div>
					<br>
					<div style="text-align: center;">ANÁLISIS DE PRECIOS UNITARIOS</div>
				</td>
				<td style="width: 85px;">
					<img style="width: 80px;" src="./assets/images/logo.jpg">
				</td>
			</tr>
		</table>
	</header>
	<div style="text-align: center;font-size: 11px;margin-top: 15px; border-color: red; margin-left: 10px;"><b>PROY: "<?=$etExpedienteTecnico->nombre_pi;?>"</b></div>
	<br>
	<div style="font-size: 14px;margin-top: -7px;text-align: center;">EXPEDIENTE GLOBAL</div>
	<br>
	<div>
		<div style="font-size: 9px;">
			<table style="width: 100%;">
				<tbody>
					<?php foreach ($etExpedienteTecnico->childComponente as $key => $value){ ?>
						<?php foreach($value->childMeta as $index => $item){ ?>
							<?php $partidas=obtenerPartidas($item); ?>
							<?php foreach($partidas as $k => $v){ ?>
								<tr>
									<td style="width: 50px;"><b><?=$v->numeracion?></b></td>
									<td><b>PARTIDA:</b></td>
									<td style="width: 550px;"><b><?=$v->desc_partida?></b></td>
								</tr>
								<tr>
									<td></td>
									<td>UNIDAD:</td>
									<td><?=$v->descripcion?></td>
								</tr>
								<tr>
									<td></td>
									<td>RENDIMIENTO:</td>
									<td><?=$v->rendimiento?></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="2">
										<table style="width: 100%;">
											<thead>
												<tr>
													<th>DESCRIPCIÓN</th>
													<th style="text-align: center;width: 100px;">Unidad</th>
													<th style="text-align: center;width: 70px;">Cantidad</th>
													<th style="text-align: center;width: 70px;">P. unitario S/.</th>
													<th style="text-align: center;width: 70px;">Parcial S/.</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($v->childDetallePartida as $keyTemp => $valueTemp){ ?>
													<?php $totalTemp=0; ?>
													<?php foreach($valueTemp->childAnalisisUnitario as $indexTemp => $itemTemp){ ?>
														<tr>
															<td><b><?=strtoupper($itemTemp->desc_recurso)?></b></td>
															<td colspan="4"></td>
														</tr>
														<?php $subTotalTemp=0; ?>
														<?php foreach($itemTemp->childDetalleAnalisisUnitario as $kTemp => $vTemp){ ?>
															<?php
																$subTotalTemp+=$vTemp->precio_parcial;
																$totalTemp+=$vTemp->precio_parcial;
															?>
															<tr>
																<td><?=$vTemp->desc_detalle_analisis?></td>
																<td style="text-align: center;"><?=$vTemp->descripcion?></td>
																<td style="text-align: center;"><?=$vTemp->cantidad?></td>
																<td style="text-align: center;"><?=$vTemp->precio_unitario?></td>
																<td style="text-align: center;"><?=$vTemp->precio_parcial?></td>
															</tr>
														<?php } ?>
														<tr>
															<td colspan="3"></td>
															<td style="text-align: center;"><b>Sub-total</b></td>
															<td style="text-align: center;"><b><?=$subTotalTemp?></b></td>
														</tr>
													<?php } ?>
													<tr>
														<td colspan="3"></td>
														<td style="text-align: center;">
															<br>
															<b>TOTAL</b>
														</td>
														<td style="text-align: center;"><b><?=$totalTemp?></b></td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="3"><div style="border: 1px solid #f5f5f5;"></div></td>
								</tr>
							<?php } ?>
						<?php }?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>