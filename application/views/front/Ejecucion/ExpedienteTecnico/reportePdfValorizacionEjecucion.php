<?php

$sumatoriasTotales=[];
$totalGeneral=0;
function mostrarMetaAnidada($meta, $expedienteTecnico, &$sumatoriasTotales,&$totalGeneral)
{
	$htmlTemp='';

	$htmlTemp.='<tr class="elementoBuscar">'.
		'<td><b><i>'.$meta->numeracion.'</i></b></td>'.
		'<td style="text-align: left;"><b><i>'.html_escape($meta->desc_meta).'</i></b></td>'.
		'<td>---</td>'.
		'<td>---</td>'.
		'<td>---</td>'.
		'<td>---</td>';	
		
	if($expedienteTecnico->num_meses!=null)
	{
		for($i=0; $i<$expedienteTecnico->num_meses; $i++)
		{
			$htmlTemp.='<td>---</td>';
		}
	}

	$htmlTemp.='</tr>';

	if(count($meta->childMeta)==0)
	{
		
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr class="elementoBuscar">'.
				'<td>'.$value->numeracion.'</td>'.
				'<td style="text-align: left;">'.html_escape($value->desc_partida).'</td>'.
				'<td>'.html_escape($value->descripcion).'</td>'.
				'<td>'.$value->cantidad.'</td>'.
				'<td>S/.'.$value->precio_unitario.'</td>'.
				'<td>S/.'.number_format($value->cantidad*$value->precio_unitario, 2).'</td>';

			$totalGeneral+=($value->cantidad*$value->precio_unitario);

			if($expedienteTecnico->num_meses!=null)
			{
				for($i=0; $i<$expedienteTecnico->num_meses; $i++)
				{
					if(!isset($sumatoriasTotales[$i]))
					{
						$sumatoriasTotales[]=0;
					}

					$precioTotalMesValorizacionTemp=0;
					$cantidadMesValorizacionTemp=0;

					foreach($value->childDetallePartida->childMesValorizacion as $index => $item)
					{
						if($item->id_detalle_partida==$value->childDetallePartida->id_detalle_partida && $item->numero_mes==($i+1))
						{
							$sumatoriasTotales[$i]+=$item->precio;

							$precioTotalMesValorizacionTemp=$item->precio;

							$cantidadMesValorizacionTemp=$item->cantidad;

							break;
						}
					}
					$htmlTemp.='<td '.($precioTotalMesValorizacionTemp==0 ? 'style="background-color: #f5f5f5;"' : 'style="background-color: #fff1b0;"').'><div><input type="text" style="display: none;padding: 0px;width: 40px;" value="'.$cantidadMesValorizacionTemp.'" onkeyup="onKeyUpCalcularPrecio('.$value->cantidad.', '.$value->precio_unitario.', '.$value->childDetallePartida->id_detalle_partida.', '.($i+1).', this, event);"></div><span class="spanMontoValorizacion">S/.'.number_format($precioTotalMesValorizacionTemp, 2).'</span></td>';
				}
			}

			$htmlTemp.='</tr>';
		}
		
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value, $expedienteTecnico, $sumatoriasTotales,$totalGeneral);
	}

	return $htmlTemp;
}
?>
<style>

	#tableValorizacion td, #tableValorizacion th
	{
		border: 1px solid black;
		font-size: 10px;
		padding: 4px;
		text-align: center;
		vertical-align: middle;
		
	}
	table
	{
		border-collapse: collapse;
	}
	.espacio
	{
		height: 20px;
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
				<table style="margin-top: 17px;width: 100%; padding-right: 120px; padding-left: 120px;">
					<tr>
						<td style="width: 85px;">
							<img style="width: 80px;" src="./assets/images/peru.jpg">
						</td>
						<td id="header_texto">
							<div style="text-align: center;"><b>GOBIERNO REGIONAL DE APURÍMAC</b></div>
							<div style="text-align: center; font-size: 12px;">GERENCIA REGIONAL DE PLANEAMIENTO, PRESUPUESTO Y ACONDICIONAMIENTO TERRITORIAL.</div>
							<div style="text-align: center; font-size: 12px;">Sub Gerencia Regional de Desarrollo Institucional Estadística e Informática</div>
							<div style="text-align: center; font-size: 12px;">"Año de la promoción de la industria responsable y de compromiso climático"</div>
						</td>
						<td style="width: 85px;">
							<img style="width: 80px;" src="./assets/images/logo.jpg">
						</td>
					</tr>
				</table>
				<div class="x_content">
					<div id="divContenedorGeneral" style="overflow-x: scroll;">
						<br>
						<table id="tableValorizacion">
							<thead>
								<tr>
									<th>PROY:</th>
									<th colspan="5"><?=html_escape($expedienteTecnico->nombre_pi)?></th>
									<?php if($expedienteTecnico->num_meses!=null){ ?>
										<th colspan="<?=$expedienteTecnico->num_meses?>">CRONOGRAMA VALORIZADO DE EJECUCIÓN DEL PROYECTO</th>
									<?php } ?>
								</tr>
								<tr>
									<th>ÍTEM</th>
									<th>DESCRIPCIÓN</th>
									<th>UND.</th>
									<th>CANT.</th>
									<th>P.U.</th>
									<th>TOTAL</th>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<th>M<?=($i+1)?></th>
										<?php }
									} ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
									<tr class="elementoBuscar">
										<td><b><i><?=$value->numeracion?></i></b></td>
										<td style="text-align: left;"><b><i><?=html_escape($value->descripcion)?></i></b></td>
										<td>---</td>
										<td>---</td>
										<td>---</td>
										<td>---</td>
										<?php if($expedienteTecnico->num_meses!=null){
											for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
												<td>---</td>
											<?php }
										} ?>
									</tr>
									<?php foreach($value->childMeta as $index => $item){ ?>
										<?= mostrarMetaAnidada($item, $expedienteTecnico, $sumatoriasTotales,$totalGeneral)?>
									<?php } ?>
								<?php } ?>
								<!--<tr style="height: 20px;">
									
								</tr>-->
								<tr>
									<td colspan="5" style="text-align: left"><b>COSTO DIRECTO TOTAL</b></td>
									<td><b>S/.<?=a_number_format($totalGeneral, 2, '.',",",3);?></b></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td><b>S/.<?=a_number_format($sumatoriasTotales[$i], 2, '.',",",3);?></b></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>GASTOS GENERALES (11.68% de Costo Directo)</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>GASTOS DE SUPERVISION (6.16% de Costo Directo)</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>LIQUIDACION DE OBRA (1.00% de Costo Directo)</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>MITIGACION AMBIENTAL</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>GESTION DEL PROYECTO (3.65% de Costo Directo)</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>EXPEDIENTE TECNICO</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>PRESUPUESTO TOTAL</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>PORCENTAJE DE GASTO FINANCIERO DEL PROYECTO</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>% AVANCE FISICO PROGRAMADO</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<script>
</script>