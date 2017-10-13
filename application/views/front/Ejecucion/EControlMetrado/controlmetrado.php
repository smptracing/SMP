<?php
function mostrarMetaAnidada($meta, $idExpedienteTecnico)
{
	$htmlTemp='';

	$htmlTemp.='<li>'.
		'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosMeta('.$meta->id_meta.');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('.$meta->id_meta.', this);" style="width: 30px;"> <span id="nombreMeta'.$meta->id_meta.'" contenteditable>'.html_escape($meta->desc_meta).'</span>'.
		((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '<table><tbody>' : '<ul>');

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr id="rowPartida'.$value->id_partida.'" style="color: red" class="liPartida">'.
				'<td style="width: 75px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('.$value->id_partida.', this);" style="width: 30px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : '.$idExpedienteTecnico.', idPartida : '.$value->id_partida.' }, \''.base_url().'index.php/ET_Analisis_Unitario/insertar\', \'get\', null, null, false, true);" style="width: 30px;">'.
				'</td>'.
				'<td style="padding-left: 10px;"><b>&#9658;'.html_escape($value->desc_partida).'</b></td>'.
				'<td style="padding-left: 4px;">'.html_escape($value->rendimiento).'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.html_escape($value->descripcion).'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.$value->cantidad.'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.number_format($value->parcial, 2).'</td>'.
			'</tr>';
		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value, $idExpedienteTecnico);
	}

	$htmlTemp.=((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '</tbody></table>' : '</ul>').
	'</li>';

	return $htmlTemp;
}
?>
<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>EXPEDIENTE TÉCNICO</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <p>Lista de Partidas para asignar orden</p>
                    <div class="row" style="height: 300px;overflow-y: scroll;">
						<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
							<ul id="ulComponenteMetaPartida" style="background-color: #f5f5f5;list-style-type: upper-roman;">
								<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
									<li>
										<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosComponente(<?=$value->id_componente?>);" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(<?=$value->id_componente?>, $(this).parent(), '');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente(<?=$value->id_componente?>, this);" style="width: 30px;"> <b id="nombreComponente<?=$value->id_componente?>" contenteditable><?=html_escape($value->descripcion)?></b>
										<ul style="background-color: #f5f5f5;">
											<?php foreach($value->childMeta as $index => $item){ ?>
												<?=mostrarMetaAnidada($item, $expedienteTecnico->id_et);?>
											<?php } ?>
										</ul>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>
<!--
<?php
/*
function mostrarMetaAnidada($meta, $idExpedienteTecnico)
{
	$htmlTemp='';

	$htmlTemp.='<li>'.
		'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosMeta('.$meta->id_meta.');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('.$meta->id_meta.', this);" style="width: 30px;"> <span id="nombreMeta'.$meta->id_meta.'" contenteditable>'.html_escape($meta->desc_meta).'</span>'.
		((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '<table><tbody>' : '<ul>');

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr id="rowPartida'.$value->id_partida.'" style="color: red" class="liPartida">'.
				'<td style="width: 75px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('.$value->id_partida.', this);" style="width: 30px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : '.$idExpedienteTecnico.', idPartida : '.$value->id_partida.' }, \''.base_url().'index.php/ET_Analisis_Unitario/insertar\', \'get\', null, null, false, true);" style="width: 30px;">'.
				'</td>'.
				'<td style="padding-left: 10px;"><b>&#9658;'.html_escape($value->desc_partida).'</b></td>'.
				'<td style="padding-left: 4px;">'.html_escape($value->rendimiento).'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.html_escape($value->descripcion).'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.$value->cantidad.'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.number_format($value->parcial, 2).'</td>'.
			'</tr>';
		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value, $idExpedienteTecnico);
	}

	$htmlTemp.=((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '</tbody></table>' : '</ul>').
	'</li>';

	return $htmlTemp;
}*/
?>
<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>EXPEDIENTE TÉCNICO</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <p>Lista de Partidas para asignar orden</p>
                    <div class="row" style="height: 300px;overflow-y: scroll;">
						<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
							<ul id="ulComponenteMetaPartida" style="background-color: #f5f5f5;list-style-type: upper-roman;">
								<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
									<li>
										<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosComponente(<?=$value->id_componente?>);" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(<?=$value->id_componente?>, $(this).parent(), '');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente(<?=$value->id_componente?>, this);" style="width: 30px;"> <b id="nombreComponente<?=$value->id_componente?>" contenteditable><?=html_escape($value->descripcion)?></b>
										<ul style="background-color: #f5f5f5;">
											<?php foreach($value->childMeta as $index => $item){ ?>
												<?=mostrarMetaAnidada($item, $expedienteTecnico->id_et);?>
											<?php } ?>
										</ul>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>-->