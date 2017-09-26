<?php
function mostrarMetaAnidada($meta, $expedienteTecnico)
{
	$htmlTemp='';

	$htmlTemp.='<tr>'.
		'<td><b><i>'.$meta->numeracion.'</i></b></td>'.
		'<td style="text-align: left;"><b><i>'.$meta->desc_meta.'</i></b></td>'.
		'<td>---</td>'.
		'<td>---</td>'.
		'<td>---</td>'.
		'<td>---</td>';
		
	if($expedienteTecnico->propCantidadMeses!=null)
	{
		for($i=0; $i<$expedienteTecnico->propCantidadMeses; $i++)
		{
			$htmlTemp.='<td>---</td>';
		}
	}

	$htmlTemp.='</tr>';

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr>'.
				'<td>'.$value->numeracion.'</td>'.
				'<td style="text-align: left;">'.$value->desc_partida.'</td>'.
				'<td>'.$value->descripcion.'</td>'.
				'<td>'.$value->cantidad.'</td>'.
				'<td style="text-align: right;">S/.'.$value->precio_unitario.'</td>'.
				'<td style="text-align: right;">S/.'.number_format($value->cantidad*$value->precio_unitario, 2).'</td>';

			if($expedienteTecnico->propCantidadMeses!=null)
			{
				for($i=0; $i<$expedienteTecnico->propCantidadMeses; $i++)
				{
					$htmlTemp.='<td style="background-color: #fff1b0;"><div><input type="text" style="display: none;width: 40px;" onkeyup="onKeyUpCalcularPrecio('.$value->cantidad.', '.$value->precio_unitario.', this);"></div><span class="spanMontoValorizacion">S/.0.00</span></td>';
				}
			}

			$htmlTemp.='</tr>';
		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value, $expedienteTecnico);
	}

	return $htmlTemp;
}
?>
<style>
	#tableValorizacion th, #tableValorizacion td
	{
		border: 1px solid #999999;
		font-size: 10px;
		padding: 4px;
		text-align: center;
		vertical-align: middle;
	}

	.spanMontoValorizacion
	{
		cursor: pointer;
	}

	.spanMontoValorizacion:hover
	{
		text-decoration: underline;
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
									<?php if($expedienteTecnico->propCantidadMeses!=null){ ?>
										<th colspan="<?=$expedienteTecnico->propCantidadMeses?>">CRONOGRAMA VALORIZADO DE EJECUCIÓN DEL PROYECTO</th>
									<?php } ?>
								</tr>
								<tr>
									<th style="width: 70px;">ÍTEM</th>
									<th style="width: 500px;">DESCRIPCIÓN</th>
									<th style="width: 100px;">UND.</th>
									<th style="width: 100px;">CANT.</th>
									<th style="width: 100px;">P.U.</th>
									<th style="width: 100px;">TOTAL</th>
									<?php if($expedienteTecnico->propCantidadMeses!=null){
										for($i=0; $i<$expedienteTecnico->propCantidadMeses; $i++){ ?>
											<th style="width: 85px;">M<?=($i+1)?></th>
										<?php }
									} ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
									<tr>
										<td><b><i><?=$value->numeracion?></i></b></td>
										<td style="text-align: left;"><b><i><?=$value->descripcion?></i></b></td>
										<td>---</td>
										<td>---</td>
										<td>---</td>
										<td>---</td>
										<?php if($expedienteTecnico->propCantidadMeses!=null){
											for($i=0; $i<$expedienteTecnico->propCantidadMeses; $i++){ ?>
												<td>---</td>
											<?php }
										} ?>
									</tr>
									<?php foreach($value->childMeta as $index => $item){ ?>
										<?=mostrarMetaAnidada($item, $expedienteTecnico)?>
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
<script>
	$(document).on('ready', function()
	{
		$('#tableValorizacion').css({ "width" : "<?=($expedienteTecnico->propCantidadMeses==null ? 0 : ($expedienteTecnico->propCantidadMeses*85)+1200)?>px" });

		$('.spanMontoValorizacion').on('click', function()
		{
			if($(this).parent().find('input[type="text"]').is(':visible'))
			{
				$(this).parent().find('input[type="text"]').hide();
			}
			else
			{
				$('.spanMontoValorizacion').parent().find('input[type="text"]').hide();
				$(this).parent().find('input[type="text"]').show();
			}
		});
	});

	function onKeyUpCalcularPrecio(cantidad, precioUnitario, element)
	{
		var cantidadTemp=$(element).val();
		var monto=cantidadTemp*precioUnitario;

		$($(element).parent().parent().find('span')[0]).text('S/.'+monto.toFixed(2));
	}
</script>