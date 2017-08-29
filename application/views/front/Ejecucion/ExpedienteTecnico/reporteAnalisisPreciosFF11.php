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
	<div style="margin-top: -7px;text-align: center;">EXPEDIENTE GLOBAL</div>
	<br>
	<div>
		<div style="font-size: 9px;">
			<table>
				<tbody>
					<?php foreach ($etExpedienteTecnico->childComponente as $key => $value){ ?>
						<?php foreach($value->childMeta as $index => $item){ ?>
							<?php $partidas=obtenerPartidas($item); ?>
							<?php foreach($partidas as $k => $v){ ?>
								<tr>
									<td><b><?=$v->numeracion?></b></td>
									<td><b>PARTIDA:</b></td>
									<td><b><?=$v->desc_partida?></b></td>
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
							<?php } ?>
						<?php }?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>