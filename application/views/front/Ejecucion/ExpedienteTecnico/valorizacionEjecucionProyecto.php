<?php
function mostrarMetaAnidada($meta)
{
	$htmlTemp='';

	$htmlTemp.='<tr>'.
		'<td style="text-align: center;"><b><i>'.$meta->numeracion.'</i></b></td>'.
		'<td><b><i>'.$meta->desc_meta.'</i></b></td>'.
		'<td style="text-align: center;"></td>'.
		'<td style="text-align: center;"></td>'.
		'<td style="text-align: center;"></td>'.
		'<td style="text-align: center;"></td>'.
		'<td></td>'.
	'</tr>';

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr>'.
				'<td style="text-align: center;">'.$value->numeracion.'</td>'.
				'<td>'.$value->desc_partida.'</td>'.
				'<td style="text-align: center;"></td>'.
				'<td style="text-align: center;"></td>'.
				'<td style="text-align: center;"></td>'.
				'<td style="text-align: center;"></td>'.
				'<td></td>'.
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
<style>
	#tableValorizacion
	{

	}

	#tableValorizacion th, #tableValorizacion td
	{
		border: 1px solid #999999;
		padding: 4px;
		vertical-align: middle;
	}
</style>
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
					<div id="divContenedorGeneral" style="overflow-x: scroll;">
						<table id="tableValorizacion">
							<thead>
								<tr>
									<th>PROY:</th>
									<th colspan="5"><?=$expedienteTecnico->nombre_pi?></th>
									<th>CRONOGRAMA VALORIZADO DE EJECUCIÓN DEL PROYECTO</th>
								</tr>
								<tr>
									<th style="text-align: center;">ÍTEM</th>
									<th>DESCRIPCIÓN</th>
									<th style="text-align: center;">UND.</th>
									<th style="text-align: center;">CANT.</th>
									<th style="text-align: center;">P.U.</th>
									<th style="text-align: center;">TOTAL</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
									<tr>
										<td style="text-align: center;"><b><i><?=$value->numeracion?></i></b></td>
										<td><b><i><?=$value->descripcion?></i></b></td>
										<td style="text-align: center;"></td>
										<td style="text-align: center;"></td>
										<td style="text-align: center;"></td>
										<td style="text-align: center;"></td>
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
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>