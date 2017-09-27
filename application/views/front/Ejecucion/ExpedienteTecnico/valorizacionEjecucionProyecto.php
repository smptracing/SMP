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
			$htmlTemp.='<tr>'.
				'<td>'.$value->numeracion.'</td>'.
				'<td style="text-align: left;">'.$value->desc_partida.'</td>'.
				'<td>'.$value->descripcion.'</td>'.
				'<td>'.$value->cantidad.'</td>'.
				'<td style="text-align: right;">S/.'.$value->precio_unitario.'</td>'.
				'<td style="text-align: right;">S/.'.number_format($value->cantidad*$value->precio_unitario, 2).'</td>';

			if($expedienteTecnico->num_meses!=null)
			{
				for($i=0; $i<$expedienteTecnico->num_meses; $i++)
				{
					$precioTotalMesValorizacionTemp=0;
					$cantidadMesValorizacionTemp=0;

					foreach($value->childDetallePartida->childMesValorizacion as $index => $item)
					{
						if($item->id_detalle_partida==$value->childDetallePartida->id_detalle_partida && $item->numero_mes==($i+1))
						{
							$precioTotalMesValorizacionTemp=$item->precio;
							$cantidadMesValorizacionTemp=$item->cantidad;

							break;
						}
					}

					$htmlTemp.='<td style="background-color: #fff1b0;"><div><input type="text" style="display: none;width: 40px;" value="'.$cantidadMesValorizacionTemp.'" onkeyup="onKeyUpCalcularPrecio('.$value->cantidad.', '.$value->precio_unitario.', '.$value->childDetallePartida->id_detalle_partida.', '.($i+1).', this);"></div><span class="spanMontoValorizacion">S/.'.number_format($precioTotalMesValorizacionTemp, 2).'</span></td>';
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
	#tableValorizacion td input[type="text"]
	{
		text-align: center;
	}

	#tableValorizacion td, #tableValorizacion th
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
									<?php if($expedienteTecnico->num_meses!=null){ ?>
										<th colspan="<?=$expedienteTecnico->num_meses?>">CRONOGRAMA VALORIZADO DE EJECUCIÓN DEL PROYECTO</th>
									<?php } ?>
								</tr>
								<tr>
									<th style="width: 70px;">ÍTEM</th>
									<th style="width: 500px;">DESCRIPCIÓN</th>
									<th style="width: 100px;">UND.</th>
									<th style="width: 100px;">CANT.</th>
									<th style="width: 100px;">P.U.</th>
									<th style="width: 100px;">TOTAL</th>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
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
										<?php if($expedienteTecnico->num_meses!=null){
											for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
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
		$('#tableValorizacion').css({ "width" : "<?=($expedienteTecnico->num_meses==null ? 0 : ($expedienteTecnico->num_meses*85)+1200)?>px" });

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

	function onKeyUpCalcularPrecio(cantidad, precioUnitario, idDetallePartida, numeroMes, element)
	{
		var cantidadTemp=$(element).val();

		if(isNaN(cantidadTemp) || cantidadTemp.trim()=='')
		{
			return;
		}

		var monto=cantidadTemp*precioUnitario;

		paginaAjaxJSON({ idDetallePartida : idDetallePartida, numeroMes : numeroMes, cantidad : cantidadTemp, precio : monto.toFixed(2) }, '<?=base_url()?>index.php/ET_Mes_Valorizacion/insertar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			if(objectJSON.proceso=='Error')
			{
				return false;
			}

			$($(element).parent().parent().find('span')[0]).text('S/.'+monto.toFixed(2));
		}, false, true);
	}
</script>