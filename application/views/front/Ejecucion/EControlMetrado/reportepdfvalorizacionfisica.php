<?php
function mostrarAnidado($meta, $expedienteTecnico)
{
	$cantidad = 0;
	$htmlTemp='';

	$htmlTemp.='<tr class="elementoBuscar">'.
		'<td><b><i>'.$meta->numeracion.'</i></b></td>'.
		'<td style="text-align: left;"><b><i>'.html_escape($meta->desc_meta).'</i></b></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>';		
	$htmlTemp.='</tr>';
	if(count($meta->childMeta)==0)
	{		
		foreach($meta->childPartida as $key => $value)
		{
			$metradoActual = 0;
			$valorizadoActual=0;
			$metradoAnterior = 0;
			$valorizadoAnterior =0;
			$metradoAcumulado = 0;
			$valorizadoAcumulado = 0;
			$porcentajeAcumulado = 0;
			$metradoSaldo = 0;
			$valorizadoSaldo = 0;
			$porcentajeSaldo = 0;
			$htmlTemp.='<tr class="elementoBuscar">'.
				'<td>'.$value->numeracion.'</td>'.
				'<td style="text-align: left;">'.html_escape($value->desc_partida).'</td>'.
				'<td style="text-align: center;">'.html_escape($value->descripcion).'</td>'.
				'<td style="text-align: right;">'.$value->cantidad.'</td>'.
				'<td style="text-align: right;">S/.'.$value->precio_unitario.'</td>'.
				'<td style="text-align: right;">S/.'.number_format($value->cantidad*$value->precio_unitario, 2).'</td>';

				foreach($value->childDetallePartida->childDetSegValorizacion as $index => $item)
				{
					if($item->id_detalle_partida==$value->childDetallePartida->id_detalle_partida)
					{
						$metradoActual = $item->metrado;
						$valorizadoActual = $item->valorizado;
						break;
					}
				}

				foreach($value->childDetallePartida->childDetSegValorizacionAnterior as $index => $item)
				{
					if($item->id_detalle_partida==$value->childDetallePartida->id_detalle_partida)
					{
						$metradoAnterior = $item->metradoAnterior;
						$valorizadoAnterior = $item->valorizadoAnterior;
						break;
					}
				}

				$metradoAcumulado= $metradoAnterior + $metradoActual;
				$valorizadoAcumulado=$valorizadoAnterior + $valorizadoActual;
				$porcentajeAcumulado = (100 * $metradoAcumulado)/($value->cantidad);
				$metradoSaldo = $value->cantidad - $metradoAcumulado;
				$valorizadoSaldo = ($value->cantidad*$value->precio_unitario) - $valorizadoAcumulado;
				$porcentajeSaldo = 100 - $porcentajeAcumulado;

				$htmlTemp.='<td style="text-align: right;">'.number_format($metradoAnterior, 2).'</td>';
				$htmlTemp.='<td style="text-align: right;">S/.'.number_format($valorizadoAnterior, 2).'</td>';
				$htmlTemp.='<td style="text-align: right;">'.number_format($metradoActual, 2).'</td>';
				$htmlTemp.='<td style="text-align: right;">S/.'.number_format($valorizadoActual, 2).'</td>';
				$htmlTemp.='<td style="text-align: right;">'.number_format($metradoAcumulado, 2).'</td>';
				$htmlTemp.='<td style="text-align: right;">S/. '.number_format($valorizadoAcumulado, 2).'</td>';
				$htmlTemp.='<td style="text-align: right;">'.number_format($porcentajeAcumulado, 2).'% </td>';
				$htmlTemp.='<td style="text-align: right;">'.number_format($metradoSaldo, 2).'</td>';
				$htmlTemp.='<td style="text-align: right;">S/. '.number_format($valorizadoSaldo, 2).'</td>';
				$htmlTemp.='<td style="text-align: right;">'.number_format($porcentajeSaldo, 2).'% </td>';

			$htmlTemp.='</tr>';

		}		
	}
	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarAnidado($value, $expedienteTecnico);
	}
	return $htmlTemp;
}
?>

<style>
	table 
	{
	    border-collapse: collapse;
	}

	#tableValorizacion td, #tableValorizacion th
	{
		border: 1px solid black;
		font-size: 10px;
		padding: 2px;
		text-transform: uppercase;
	}
</style>
<head>
	<title>FORMATO FE-03</title>
	<meta charset="utf-8">
</head>
<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<P style="text-align: center; font-size: 12px;"><b>FORMATO FE-03</b><br>
					<b style="font-size: 13px;">VALORIZACIÓN MENSUAL / FINAL DE OBRA</b><br>
					<b style="text-transform: uppercase;font-size: 12px;">MES DE : <?=$mes?></b><br>
					</P>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
							<table >
								<tr>
									<td class="col-md-3" style="padding: 1px;"><b>PROYECTO</b></td>
									<td class="col-md-9" style="padding: 1px;"><?=trim($expedienteTecnico->nombre_pi)?></td>
								</tr>
								<tr>
									<td class="col-md-3" style="padding: 1px;"><b>FECHA</b></td>
									<td class="col-md-9" style="padding: 1px;"><?=date('Y-m-d')?></td>
								</tr>
							</table>
							<br>
						</div>
					</div>
                </div>
                <div class="x_content">                    
                    <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 10px;">
							<div class="row">
								<table id="tableValorizacion"  >
								<thead>
									<tr>
										<th>PROY:</th>
										<th><?=trim($expedienteTecnico->nombre_pi)?></th>
										<th rowspan="3">UNIDAD</th>
										<th rowspan="2" colspan="3" >PRESUPUESTO</th>
										<th colspan="7">AVANCES</th>
										<th colspan="3" rowspan="2">SALDO</th>
									</tr>
									<tr>
										<th rowspan="2">ÍTEM</th>
										<th rowspan="2">DESCRIPCIÓN</th>
										<th colspan="2">ANTERIOR</th>
										<th colspan="2">ACTUAL</th>
										<th colspan="3">ACUMULADO</th>
									</tr>
									<tr>
										<th style="padding: 6px; font-size: 9px;">Metrado</th>
										<th style="padding: 1px; font-size: 9px;">P.Unit. S/.</th>
										<th style="padding: 1px; font-size: 9px;">Pres.</th>
										<th style="padding: 6px; font-size: 9px;">Metrado</th>
										<th style="padding: 6px; font-size: 9px;">Valorizado S/.</th>
										<th style="padding: 6px; font-size: 9px;">Metrado</th>
										<th style="padding: 6px;font-size: 9px;">Valorizado S/.</th>
										<th style="padding: 6px;font-size: 9px;">Metrado</th>
										<th style="padding: 6px;font-size: 9px;">Valorizado S/.</th>
										<th style="padding: 1px;font-size: 9px;">%</th>
										<th style="padding: 6px;font-size: 9px;">Metrado</th>
										<th style="padding: 6px;font-size: 9px;">Valorizado S/.</th>
										<th style="padding: 1px;font-size: 9px;">%</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
										<tr class="elementoBuscar">
											<td><b><i><?=$value->numeracion?></i></b></td>
											<td style="text-align: left;"><b><i><?=html_escape($value->descripcion)?></i></b></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<?php foreach($value->childMeta as $index => $item){ ?>
											<?= mostrarAnidado($item, $expedienteTecnico)?>
										<?php } ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>