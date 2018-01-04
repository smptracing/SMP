<?php
function mostrarMetaAnidada($meta)
{
	$htmlTemp='<tr>'.
		'<td>'.$meta->numeracion.'.</td>'.
		'<td style="text-align: left;">'.strtoupper(html_escape($meta->desc_meta)).'</td>'.
		'<td style="text-align: center;"></td>'.
		'<td style="text-align: center;"></td>';

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
				$htmlTemp.=''.
				'<td style="text-align: right;">'.$value->parcial.'</td>'.
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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dompdf.css">
</head>
<style>
	#presupuesto li {
		display:inline;

	}
	#presupuesto a {
		text-decoration:none;
		padding:5px;
	}
	.romanos_upper{
		list-style-type:upper-roman;
	}
	.romanos_lower{
		list-style-type:lower-roman;
	}
</style>
<body>

	<header>

<table style="margin-top: 17px;width: 100%; padding-right: 12px; padding-left: 12px;">
					<tr>
						<td style="width: 65px;">
							<img style="width: 65px;" src="./assets/images/peru.jpg">
						</td>
						<td id="header_texto">
							<div style="text-align: center;"><b>GOBIERNO REGIONAL DE APURÍMAC</b></div>
							<div style="text-align: center; font-size: 12px;">GERENCIA REGIONAL DE PLANEAMIENTO, PRESUPUESTO Y ACONDICIONAMIENTO TERRITORIAL.</div>
							<div style="text-align: center; font-size: 12px;">Sub Gerencia Regional de Desarrollo Institucional Estadística e Informática</div>
							<div style="text-align: center; font-size: 12px;">"Año de la promoción de la industria responsable y de compromiso climático"</div>
							<div style="text-align: center; font-size: 16px;">-</div>
							<div style="text-align: center; font-size: 16px;">FORMATO FF05</div>
						</td>

						

						<td style="width: 85px;">
							<img style="width: 80px;" src="./assets/images/logo.jpg">
						</td>
					</tr>
				</table>


		
	</header>
	<div style="margin-top: 30px;position: absolute;font-size: 10px;margin-left: 50px;">
		PROYECTO: &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; " <?=$MostraExpedienteNombre->nombre_pi;?>"
	</div>
	<div style="margin-top: 60px;position: absolute;font-size: 8px;margin-left: 100px;">
		<table id="contenido_border" width="790" border=0 cellspacing=0 cellpadding=2 bordercolor="666633">
			<tr>
				<td width="20">  </td>
				<td width="100">&nbsp;&nbsp; META </td>
				<td style="text-align: center;"></td>
				<td>  </td>
				<td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp; <?=$MostraExpedienteNombre->meta_et;?> </td>
			</tr>
			<tr>
				<td>  </td>
				<td>&nbsp;&nbsp; INVERSIÓN: </td> 
				<td style="text-align: center;"></td>
				<td>  </td>
				<td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;  <?=$MostraExpedienteNombre->costo_total_inv_et;?> </td>
			</tr>
			<tr>
				<td>  </td>
				<td style="text-align: left;" >&nbsp;&nbsp; FUENTE DE FINANCIAMINETO: </td>
				<td style="text-align: center;"> </td>
				<td>  </td>
				<td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp; <?=$MostraExpedienteNombre->fuente_financiamiento_et;?> </td>
			</tr>
			<tr>
				<td>  </td>
				<td>&nbsp;&nbsp; MODALIDAD: </td>
				<td style="text-align: center;">  </td>
				<td>  </td>
				<td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp; <?=$MostraExpedienteNombre->modalidad_ejecucion_et;?> </td>
			</tr>
			<tr>
				<td>  </td>
				<td>&nbsp;&nbsp; AÑO: </td>
				<td style="text-align: center;"> </td>
				<td>  </td>
				<td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;  <?=$MostraExpedienteNombre->fecha_registro;?> </td>
			</tr>

		</table>    
	</div>
	<footer>
		<div id="footer_texto"> </div>
	</footer>
	<div>
		<div style="text-align: center;margin-top: -50px;"><br/>PRESUPUESTO RESUMEN</div><br/>
	</div>
	<ul class="romanos_upper" style="margin-top: 140px;font-size:10px;position: absolute;margin-left: 80px;">
		
	</ul>
		<table style="width: 100%; font-size:8px;">
				<tr>
					<th style="height: 50px;text-align: left;width: 40px;">ÍTEM</th>
					<th>EXPEDIENTE GENERAL<br/>  GLOBAL</th>
					<th style="width: 70px;position: relative;">

					</th>
					<th style="text-align: right;width: 50px;">COSTO TOTAL</th>
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

</body>
</html>
