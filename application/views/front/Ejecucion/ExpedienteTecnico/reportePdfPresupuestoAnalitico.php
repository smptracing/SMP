<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/dompdf.css">
</head>

<body>
	<header>

			<table style="margin-top: 17px;width: 100%; padding-right: 12px; padding-left: 12px;">
					<tr>
						<td style="width: 85px;">
							<img style="width: 80px;" src="./assets/images/peru.jpg">
						</td>
						<td id="header_texto">
							<div style="text-align: center;"><b>GOBIERNO REGIONAL DE APURÍMAC</b></div>
							<div style="text-align: center; font-size: 12px;">GERENCIA REGIONAL DE PLANEAMIENTO, PRESUPUESTO Y ACONDICIONAMIENTO TERRITORIAL.</div>
							<div style="text-align: center; font-size: 12px;">Sub Gerencia Regional de Desarrollo Institucional Estadística e Informática</div>
							<div style="text-align: center; font-size: 12px;">"CUADRO DE PRESUPUESTO ANALÍTICO GENERAL"</div>
							<div style="text-align: center; font-size: 16px;">-</div>
							<div style="text-align: center; font-size: 16px;">RFORMATO FF06</div>
						</td>

						

						<td style="width: 85px;">
							<img style="width: 80px;" src="./assets/images/logo.jpg">
						</td>
					</tr>
				</table>



		
	</header>
	<footer>
		<div id="footer_texto"> </div>
	</footer>

	<div>
		
			<br><br/>
			<div class="row" style="text-align:center;border:2px solid black;padding: 10px;margin-top: -40px;">
				PROYECTO : &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; " <?=$MostraExpedienteNombre->nombre_pi;?>"
			</div>
			<div style="margin-top: 10px;position: absolute;font-size: 8px;margin-left: 50px;">
				<table id="contenido_border" width="750" border=0 cellspacing=0 cellpadding=2 bordercolor="666633">
					<?php $costoTotalDirectoCabecera=0;$costoTotalIDirectoCabecera=0;$costoTotal=0; foreach ($PresupuestoEjecucionListar as  $value) {?>
	
						 	<?php  foreach ($value->ChilpresupuestoAnalitico as $Itemp) {?>
										<?php  foreach ($Itemp->ChilCostoDetallePartida as $ItempX) {if($value->desc_presupuesto_ej=='COSTOS DIRECTOS'){ ?>
										<?php  $costoTotalDirectoCabecera+=(float)$ItempX->costoDirecto;}}?>

										<?php  foreach ($Itemp->ChilCostoDetallePartida as $ItempX) {if($value->desc_presupuesto_ej!='COSTOS DIRECTOS'){ ?>
										<?php  $costoTotalIDirectoCabecera+=(float)$ItempX->costoDirecto;}}?>

										<?php  foreach ($Itemp->ChilCostoDetallePartida as $ItempX) { ?>
										<?php  $costoTotal+=(float)$ItempX->costoDirecto;}?>
									
							<?php  } ?>
						  
					<?php } ?>
					<tr>
						<td width="120"> META: </td>
						<td width="100">&nbsp;&nbsp; <?=$MostraExpedienteNombre->meta_et;?> </td>
						<td style="text-align: center;">COSTO DIRECTO :</td>
						<td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;<?=number_format($costoTotalDirectoCabecera,2, '.', '');?> </td>
					</tr>
					<tr>
						<td> INVERSIÓN </td>
						<td>&nbsp;&nbsp;<?=number_format($costoTotal,2, '.', '');?> </td> 
						<td style="text-align: center;">COSTO INDIRECTO</td>
						<td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp; <?=number_format($costoTotalIDirectoCabecera,2, '.', '');?> </td>
					</tr>
					<tr>
						<td>FUENTE DE FINANCIAMIENTO:  </td>
						<td style="text-align: left;">&nbsp;&nbsp; <?=$MostraExpedienteNombre->fuente_financiamiento_et;?> </td>
						<td style="text-align: center;">TOTAL INVERSIÓN :</td>
						<td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;  <?=number_format($costoTotal,2, '.', '');?> </td>
					</tr>
					<tr>
						<td>MODALIDAD </td>
						<td>&nbsp;&nbsp; <?=$MostraExpedienteNombre->modalidad_ejecucion_et;?> </td>
						<td style="text-align: center;"> </td>
						<td style="text-align: center;"> </td>
					</tr>
					<tr>
						<td> AÑO: </td>
						<td>&nbsp;&nbsp; <?php echo $nombre=implode('-',(array)$MostraExpedienteNombre->fecha_registro) ;?>  </td>
						<td style="text-align: center;">  </td>
						<td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;  </td>
					</tr>
				</table>    
			</div>
			<div style="margin-top: 80px;position: absolute;font-size: 8px;margin-left: -10px;">
				<table id="contenido_border" width="760" border=1 cellspacing=0 cellpadding=2  bordercolor="666633">
					<tr>
						<td rowspan="2" > DESCRIPCIÓN </td>
						<td rowspan="2" style="text-align: center;" > CLASIF. </td>
						<td colspan="10" style="text-align: center;" >&nbsp;&nbsp; EJECUCIÓN </td>
						<tr style="text-align: center;">
							<td colspan="2" > DESCRIPCIÓN </td>
							<td colspan="2" > COSTO DIRECTO </td>
							<td colspan="2" > COSTO INDIRECTO </td>
							<td colspan="2">&nbsp;&nbsp; COSTO TOTAL </td>
							<td colspan="2">&nbsp;&nbsp; OBSERVACIÓN </td>
						</tr>
					</tr>
					<?php $costoTotalDirecto=0;$costoTotalIndirecto=0; $costoTotalProyecto=0;foreach ($PresupuestoEjecucionListar as  $value) {?>
					<tr>
						<td rowspan="1" > <?= $value->desc_presupuesto_ej;?></td>
						<td rowspan="1" style="text-align: center;" >  </td>
						<td colspan="2" > </td>
						<td colspan="2"> &nbsp;&nbsp;  </td>
						<td colspan="2"> &nbsp;&nbsp;  </td>
						<td colspan="2"> &nbsp;&nbsp;  </td>
						<td colspan="2"> &nbsp;&nbsp;  </td>
						
						 	<?php  foreach ($value->ChilpresupuestoAnalitico as $Itemp) {?>
							 	<tr>
									<td rowspan="1">  </td>
									<td rowspan="1" style="text-align: center;" > <?= $Itemp->num_clasificador;?> </td>
									<td colspan="2"> <?= $Itemp->desc_clasificador;?> </td>
									
										<td colspan="2" style="text-align: right;">
										<?php  foreach ($Itemp->ChilCostoDetallePartida as $ItempX) {if($value->desc_presupuesto_ej=='COSTOS DIRECTOS'){ ?>
											S/. <?= number_format($ItempX->costoDirecto,2, '.', '');?> 
										<?php  $costoTotalDirecto+=(float)$ItempX->costoDirecto;}}?>
										</td>
										<td colspan="2" style="text-align: right;"> 
											<?php  foreach ($Itemp->ChilCostoDetallePartida as $ItempX) {if($value->desc_presupuesto_ej!='COSTOS DIRECTOS'){ ?>
												S/. <?= number_format($ItempX->costoDirecto,2, '.', '');?> 
											<?php  $costoTotalIndirecto+=(float)$ItempX->costoDirecto;}}?>
										</td>
										<td colspan="2" style="text-align: right;"> 
												<?php  foreach ($Itemp->ChilCostoDetallePartida as $ItempX) { ?>
													S/. <?=number_format($ItempX->costoDirecto,2, '.', '')?> 
												<?php  $costoTotalProyecto+=(float)$ItempX->costoDirecto;}?>
									    </td>
									<td colspan="2"> &nbsp;&nbsp;  </td>
								</tr>
							<?php } ?>
						  
					</tr>
					<?php } ?>
					<tr style="text-align:right;">
						<td rowspan="1" >  </td>
						<td rowspan="1" style="text-align:right;" > </td>
						<td colspan="2" >  </td>
						<td colspan="2" > S/.  <?= number_format($costoTotalDirecto, 2, '.', '');?></td>
						<td colspan="2" > S/.  <?= number_format($costoTotalIndirecto,2, '.', '') ;?></td>
						<td colspan="2">S/.  <?= number_format($costoTotalProyecto,2, '.', '');?> </td>
						<td colspan="2">&nbsp;&nbsp;  </td>
					</tr>
				</table>    
			</div>

		</div>

	</body>
	</html>
