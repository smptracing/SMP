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
			//style = "background-color:#baf9c4;"
			$htmlTemp.='<tr class="elementoBuscar " id="fila'.$value->id_partida.'">'.
				'<td>'.$value->numeracion.'</td>'.
				'<td style="text-align: left;">'.html_escape($value->desc_partida).'</td>'.
				'<td>'.html_escape($value->descripcion).'</td>'.
				'<td>'.$value->cantidad.'</td>'.
				'<td>S/.'.$value->precio_unitario.'</td>'.
				'<td>S/.'.number_format($value->cantidad*$value->precio_unitario, 2).'</td>';

			$totalGeneral+=($value->cantidad*$value->precio_unitario);
			$ValorizacionporPartida = 0;

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

							$ValorizacionporPartida += $precioTotalMesValorizacionTemp;

							$cantidadMesValorizacionTemp=$item->cantidad;

							break;
						}
					}
					$htmlTemp.='<td '.($precioTotalMesValorizacionTemp==0 ? 'style="background-color: #f5f5f5;"' : 'style="background-color: #fff1b0;"').'><div><input type="text" style="display: none;padding: 0px;width: 40px;" value="'.$cantidadMesValorizacionTemp.'" onkeyup="onKeyUpCalcularPrecio('.$value->cantidad.', '.$value->precio_unitario.', '.$value->childDetallePartida->id_detalle_partida.', '.($i+1).', this, event);"></div><span class="spanMontoValorizacion">S/.'.number_format($precioTotalMesValorizacionTemp, 2).'</span></td>';
				}
			}
			$htmlTemp.='<td>'.$ValorizacionporPartida.'</td>';

			if($ValorizacionporPartida == $value->parcial)
			{
				//$htmlTemp.='<td>'.$ValorizacionporPartida.'</td>';
				$htmlTemp.='</tr><script>$("#fila'.$value->id_partida.'").css("background-color", "#baf9c4")</script>';
			}
			else
			{
				$htmlTemp.='</tr>';
			}
			//$htmlTemp.='</tr>';
			
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
	#tableValorizacionResumen td, #tableValorizacionResumen th
	{
		border: 1px solid #999999;
		font-size: 10px;
		padding: 4px;
		text-align: left;
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
	.espacio{
		height: 20px;
	}
</style>
<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>Cronograma Valorizado de Ejecución</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					
					<div class="row">
						<div class="col-md-10 col-xs-12">
							<input type="text" class="form-control" placeholder="Buscar partidas por su descripción" autocomplete="off" style="margin-bottom: 15px;" onkeyup="filtrarHtml('tableValorizacion', this.value, true, 0, event);">			
						</div>
						<div class="col-md-2 col-xs-12">
							<a href="<?= site_url('Expediente_Tecnico/reportePdfValorizacionEjecucion/'.$expedienteTecnico->id_et);?>" role=button class="btn btn-primary" target="_blank"><i class="fa fa-file-pdf-o"></i> Exportar a PDF</a>
						</div>	
						<br>					
					</div>
					<div id="divContenedorGeneral" style="overflow-x: scroll;">
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
									<?php if($expedienteTecnico->num_meses!=null)
									{
										for($i=0; $i<$expedienteTecnico->num_meses; $i++)
										{ ?>
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
								<tr class="espacio">
								</tr>
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
									<td colspan="5" style="text-align: left"><b>GASTOS GENERALES</b></td>
									<td>
									</td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>GASTOS DE SUPERVISION</b></td>
									<td>									
									</td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<tr>
									<td colspan="5" style="text-align: left"><b>LIQUIDACION DE OBRA</b></td>
									<td>
									</td>
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
									<td colspan="5" style="text-align: left"><b>GESTION DEL PROYECTO</b></td>
									<td>
									</td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<?php if($expedienteTecnico->id_etapa_et == 1 ) { ?>
								<tr>
									<td colspan="5" style="text-align: left"><b>EXPEDIENTE TECNICO</b></td>
									<td></td>
									<?php if($expedienteTecnico->num_meses!=null){
										for($i=0; $i<$expedienteTecnico->num_meses; $i++){ ?>
											<td></td>
										<?php }
									}?>
								</tr>
								<?php } ?>

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
	$(document).on('ready', function()
	{
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

	function onKeyUpCalcularPrecio(cantidad, precioUnitario, idDetallePartida, numeroMes, element, event)
	{
		var evt=event || window.event;

		var code=0;

		if(evt!='noEventHandle')
		{
			code=evt.charCode || evt.keyCode || evt.which;
		}

		if(code==13)
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
					swal(
					{
						title: '',
						text: objectJSON.mensaje,
						type: (objectJSON.proceso=='Correcto' ? 'success' : 'error')
					},
					function(){});

					return false;
				}


				$($(element).parent().parent().find('span')[0]).text('S/.'+monto.toFixed(2));
				$($(element).parent().parent().css('background-color', '#fff1b0'));

				if(objectJSON.proceso=='Completo')
				{
					$($(element).parent().parent().parent().css('background-color', '#baf9c4'));
				}
				else
				{
					$($(element).parent().parent().parent().css('background-color', 'white'));
				}

			}, false, true);
		}
	}
</script>