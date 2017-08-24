<?php
function mostrarMetaAnidada($meta)
{
	$htmlTemp='<tr>'.
		'<td>'.$meta->numeracion.'.</td>'.
		'<td style="text-align: left;">'.strtoupper(html_escape($meta->desc_meta)).'</td>'.
		'<td style="text-align: center;"></td>'.
		'<td style="text-align: center;"></td>'.
	'</tr>';

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr>'.
				'<td>'.$value->numeracion.'.</td>'.
				'<td>'.strtoupper(html_escape($value->desc_partida)).'</td>'.
				'<td style="text-align: left;">'.strtoupper(html_escape($value->descripcion)).'</td>'.
				'<td style="text-align: right;">'.$value->cantidad.'</td>'.
			'</tr>';
		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value);
	}

	return $htmlTemp;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reporte de metrado</title>
</head>
<body style="font-family: Helvetica;text-align: center;">
	<header style="width: 100%;">
		<table style="margin-top: 20px;width: 100%;">
			<tr>
				<td style="width: 85px;">
					<img style="width: 80px;" src="./assets/images/peru.jpg">
				</td>
				<td id="header_texto">
					<div style="text-align: center;">GOBIERNO REGIONAL DE APURÍMAC</div>
					<div style="text-align: center;">"Año de la promoción de la industria responsable y de compromiso climático"</div>
				</td>
				<td style="width: 85px;">
					<img style="width: 80px;" src="./assets/images/logo.jpg">
				</td>
			</tr>
		</table>
	</header>
	<div style="text-align:center;">METRADO</div>
	<div style="text-align:center;font-size: 13px; margin-top: 20px; border-color: red; margin-left: 10px;"><b>PROY: "<?=$MostraExpedienteNombre->nombre_pi;?>"</b></div>
	<br>
	<div>
		<div style="font-size: 10px;">
			<table style="width: 100%;">
				<tr>
					<th style="height: 50px;text-align: left;width: 40px;">ÍTEM</th>
					<th>DESCRIPCIÓN</th>
					<th style="width: 150px;position: relative;">
						<span style="left: -8px;top: 40px;position: absolute;transform: rotate(-90deg);">UNIDAD</span>
						<span style="left: 4px;top: 27px;position: absolute;transform: rotate(-90deg);">DE</span>
						<span style="left: 16px;top: 40px;position: absolute;transform: rotate(-90deg);">MEDIDA</span>
					</th>
					<th style="text-align: right;width: 60px;">TOTAL</th>
				</tr>
				<tbody>
					<?php foreach($MostraExpedienteTecnicoExpe->childComponente as $key => $value){  ?>
						<tr>
							<td><b><?=$value->numeracion?>.</b></td>
							<td><b><?=strtoupper(html_escape($value->descripcion))?></b></td>
							<td></td>
							<td></td>
						</tr>
						<?php foreach($value->childMeta as $index => $item){ ?>
								<?=mostrarMetaAnidada($item)?>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>