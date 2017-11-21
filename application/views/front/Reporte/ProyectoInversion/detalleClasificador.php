<style>
	.modal-dialog
	{
		width: 90%;
	}

	.modal-content
	{
		height: auto;
		min-height: 100%;
		border-radius: 0;
	}
	#table-DetalleClasificador td
	{
	    border: 1px solid #d4cfcf;
	    padding: 3px;
	    color: #0c0d3e;
	}
	#table-DetalleClasificador th
	{
	    border: 1px solid #d4cfcf;
	    padding: 1px;
	    background-color: #D6EAF8;
	    color: #0c0d3e;
	}
	#tablaResumen td
	{
	    border: 1px solid #d4cfcf;
	    padding: 3px;
	    color: #0c0d3e;
	}
	/*#table-DetalleClasificador td, #table-DetalleClasificador th
	{
	    border: 1px solid #d4cfcf;
	    padding: 3px;
	    color: #0c0d3e;
	}
	#table-DetalleClasificador th
	{
	    border: 1px solid #d4cfcf;
	    padding: 1px;
	    background-color: #D6EAF8;
	    color: #0c0d3e;
	}*/
</style>

<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_content">
					<div id="DetalleClasificador" class="table-responsive">
						<table id="table-DetalleClasificador" border="1" cellspacing="0" width="100%"  style="font-size: 10px;">
							<thead style="font-size: 11px;">
								<tr style="text-align:center">
									<th>Clasificadores</th>
									<th>En</th>
									<th>Feb</th>
									<th>Mar</th>
									<th>Abr</th>
									<th>May</th>
									<th>Jun</th>
									<th>Jul</th>
									<th>Agost</th>
									<th>Set</th>
									<th>Oct</th>
									<th>Nov</th>
									<th>Dic</th>
									<th>D</th>
									<th>C</th>
									<th>G</th>
									<th>P</th>
									<th>Comprom Anu.</th>
									<th>Cert</th>
									<th>Ejec</th>
									<th>Anul</th>
								</tr>
							</thead>
							<tbody>
							
						<?php $sumatoriaEne = 0;$sumatoriaFeb = 0;$sumatoriaMar = 0;$sumatoriaAbr = 0;$sumatoriaMay = 0;$sumatoriaJun = 0;$sumatoriaJul = 0;$sumatoriaAgo = 0;$sumatoriaSet = 0; $sumatoriaOct = 0; $sumatoriaNov = 0;$sumatoriaDic = 0; 
						foreach ($temp as  $value) {?>
							<tr>
								<td colspan="21">
									<?= $value->cod_tt,' ', $value->tipo_transaccion; ?>
								</td>
						
							</tr>
								<?php foreach ($value->child as $key =>  $value1) {?>
								<tr>
									<td colspan="21" style="padding-left: 15px;">
									<?= $value1->generica,' ',$value1->desc_generica ; ?>
									</td>
								
								</tr>
									<?php foreach ($value1->child as $key =>  $value2) {?>
									<tr>
										<td colspan="21" style="padding-left: 30px;">
										<?=$value2->sub_generica,' ',$value2->desc_sub_generica ; ?>
										</td>
									
									</tr>

										<?php foreach ($value2->child as $key =>  $value3) {?>
										<tr>
											<td colspan="21" style="padding-left: 50px;">
											<?=$value3->sub_generica_det,' ',$value3->des_sub_generica_det ; ?>
											</td>
										
										</tr>

											<?php foreach ($value3->child as $key =>  $value4) {?>
												<tr>
													<td colspan="21" style="padding-left: 70px;">
													<?=$value4->especifica,' ',$value4->desc_especifica ; ?>
													</td>
												
												</tr>
												
												<?php foreach ($value4->child as $key =>  $value5) {?>
													<tr>
														<td style="padding-left: 90px;"> <input type="checkbox" name="vehicle" value="Bike">
														<?=$value5->especifica_det,' ',$value5->desc_especifica_det ; ?>
														</td>
														<td style="text-align:right">
														<?= number_format($value5->ene,2) ?> 
														</td>
														<?php $sumatoriaEne+= $value5->ene?>
														<td style="text-align:right">
														<?= number_format($value5->feb,2) ?> 
														</td>
														<?php $sumatoriaFeb+= $value5->feb?>
														<td style="text-align:right">
														<?= number_format($value5->mar,2) ?> 
														</td>
														<?php $sumatoriaMar+= $value5->mar?>
														<td style="text-align:right">
														<?= number_format($value5->abr,2) ?> 
														</td>
														<?php $sumatoriaAbr+= $value5->abr?>
														<td style="text-align:right">
														<?= number_format($value5->may,2) ?> 
														</td>
														<?php $sumatoriaMay+= $value5->may?>
														<td style="text-align:right">
														<?= number_format($value5->jun,2) ?> 
														</td>
														<?php $sumatoriaJun+= $value5->jun?>
														<td style="text-align:right">
														<?= number_format($value5->jul,2) ?>
														</td>
														<?php $sumatoriaJul+= $value5->jul?> 
														<td style="text-align:right">
														<?= number_format($value5->ago,2) ?> 
														</td>
														<?php $sumatoriaAgo+= $value5->ago?>
														<td style="text-align:right">
														<?= number_format($value5->sep,2) ?> 
														</td>
														<?php $sumatoriaSet+= $value5->sep?>
														<td style="text-align:right">
														<?= number_format($value5->oct,2) ?> 
														</td>
														<?php $sumatoriaOct+= $value5->oct?>
														<td style="text-align:right">
														<?= number_format($value5->nov,2) ?> 
														</td>
														<?php $sumatoriaNov+= $value5->nov?>
														<td style="text-align:right">
														<?= number_format($value5->dic,2) ?> 
														</td>
														<?php $sumatoriaDic+= $value5->dic?>
														<td style="text-align:right">
															<?= number_format($value5->devengado,2) ?>
												    	</td>
												    	<td style="text-align:right">
															<?= number_format($value5->compromiso,2) ?>
												    	</td>
												    	<td style="text-align:right">
															<?= number_format($value5->girado,2) ?>
												    	</td>
												    	<td style="text-align:right">
															<?= number_format($value5->pagado,2) ?>
												    	</td>
												    	<td style="text-align:right">
															<?= number_format($value5->comprometido_anual,2) ?>
												    	</td>
												    	<td style="text-align:right">
												    		<?= number_format($value5->certificado,2)?>
													
												    	</td>
												    	<td style="text-align:right">
															<?=number_format($value5->ejecucion,2) ?>
												    	</td>
												    	<td style="text-align:right">
															<?=number_format($value5->anulacion,2) ?>
												    	</td>
													</tr>

												<?php } ?>
												
											<?php } ?>

										<?php } ?>

									<?php } ?>

								<?php } ?>
						<?php } ?>
						

							</tbody>
						</table>
						<!--<table id ="tablaResumen">
							<tr>
								<td>Total</td>
								<td><?=a_number_format($sumatoriaEne, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaFeb, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaMar, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaAbr, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaMay, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaJun, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaJul, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaAgo, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaSet, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaOct, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaNov, 2, '.',",",0)?></td>
								<td><?=a_number_format($sumatoriaDic, 2, '.',",",0)?></td>
							</tr>
						</table>-->
						<br>
					</div>
					<div class="row" style="margin-left: 10px; margin:10px; ">
						<div class="col-md-1 col-sm-1 col-xs-12">
							<label class="control-label"> Comparar con: </label>							
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
					    	<div class="form-group">
						      	<select class="selectpicker form-control" data-live-search="true" name="selectClasificador" id="selectClasificador">
						        	<?php foreach ($temp as  $value) {?>
										<?php foreach ($value->child as $key =>  $value1) {?>
											<?php foreach ($value1->child as $key =>  $value2) {?>
												<?php foreach ($value2->child as $key =>  $value3) {?>
													<?php foreach ($value3->child as $key =>  $value4) {?>
														<?php foreach ($value4->child as $key =>  $value5) {?>
															<option value="<?=$value5->ene?>">
																<?=$value5->especifica_det,' ',$value5->desc_especifica_det?>
															</option>
														<?php } ?>
													<?php } ?>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									<?php } ?>
						      	</select>
					    	</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<button onclick="generarGrafico();" class="btn btn-info btn-sm">Generar Gráfico</button>
						</div>
				    </div>
				    <div class="row" style="margin-left: 10px; margin:10px; ">
				        <div class="panel panel-default">
							<div class="panel-heading">GRÁFICO ESTADÍSTICO DE DETALLE MENSUALIZADO</div>
				            <div id="contenedorGrafico"></div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<script>
function generarGrafico()
{
	var valor = $('#selectClasificador').val();
	<?php $valor =[];
    foreach ($temp as  $value) {
		foreach ($value->child as $key =>  $value1) {
			foreach ($value1->child as $key =>  $value2) {
				foreach ($value2->child as $key =>  $value3) {
					foreach ($value3->child as $key =>  $value4) {
						foreach ($value4->child as $key =>  $value5) {
							$valor[]=$value5->desc_especifica_det;					
						} 
					}
				} 
			} 
		}
	}
    ?>
    /*<?php foreach ($valor as $key => $value) 
    {?>
    	alert(""<?=$value?>);
    <?php }?>*/
    console.log(<?=json_encode($valor)?>);
    


	$("#contenedorGrafico").css({"height":"450"});
	var echartLine = echarts.init(document.getElementById('contenedorGrafico'));
      echartLine.setOption({
        title: {
          text: '',
          subtext: ''
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          x: 220,
          y: 40,
          data: ['TOTAL',<?php 
	        foreach ($temp as  $value) {
				foreach ($value->child as $key =>  $value1) {
					foreach ($value1->child as $key =>  $value2) {
						foreach ($value2->child as $key =>  $value3) {
							foreach ($value3->child as $key =>  $value4) {
								foreach ($value4->child as $key =>  $value5) {
									echo "'".$value5->desc_especifica_det."',";
								} 
							}
						} 
					} 
				}
			}
	        ?>]
        },
        
        toolbox: {
          show: true,
          feature: {
            magicType: {
              show: true,
              title: {
                line: 'Linea',
                bar: 'Barra',
                stack: 'Stack',
                tiled: 'Tiled'
              },
              type: ['line', 'bar', 'stack', 'tiled']
            },
            restore: {
              show: true,
              title: "Actualizar"
            },
            saveAsImage: {
              show: true,
              title: "Descargar"
            }
          }
        },
        calculable: true,
        xAxis: [{
          type: 'category',
          boundaryGap: false,
          data: ["ene","feb","mar","abr","may","jun","jul","ago","set","oct","nov","dic"]
        }], 
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'TOTAL',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data:
          [<?=a_number_format($sumatoriaEne, 2, '.',",",0)?>,<?=a_number_format($sumatoriaFeb, 2, '.',",",0)?>,<?=a_number_format($sumatoriaMar, 2, '.',",",0)?>,<?=a_number_format($sumatoriaAbr, 2, '.',",",0)?>,<?=a_number_format($sumatoriaMay, 2, '.',",",0)?>,<?=a_number_format($sumatoriaJun, 2, '.',",",0)?>,<?=a_number_format($sumatoriaJul, 2, '.',",",0)?>,<?=a_number_format($sumatoriaAgo, 2, '.',",",0)?>,<?=a_number_format($sumatoriaSet, 2, '.',",",0)?>,<?=a_number_format($sumatoriaOct, 2, '.',",",0)?>,<?=a_number_format($sumatoriaNov, 2, '.',",",0)?>,<?=a_number_format($sumatoriaDic, 2, '.',",",0)?>]
        },
        <?php 
        foreach ($temp as  $value) {
			foreach ($value->child as $key =>  $value1) {
				foreach ($value1->child as $key =>  $value2) {
					foreach ($value2->child as $key =>  $value3) {
						foreach ($value3->child as $key =>  $value4) {
							foreach ($value4->child as $key =>  $value5) {
								echo " { name: '".$value5->desc_especifica_det."',
						          type: 'line',
						          smooth: true,
						          itemStyle: {
						            normal: {
						              areaStyle: {
						                type: 'default'
						              }
						            }
						          },
						          data:  [".($value5->ene == '' ? 0 : $value5->ene).", ".($value5->feb == '' ? 0 : $value5->feb).", ".($value5->mar == '' ? 0 : $value5->mar).", ".($value5->abr == '' ? 0 : $value5->abr).",".($value5->may == '' ? 0 : $value5->may).", ".($value5->jun == '' ? 0 : $value5->jun).", ".($value5->jul == '' ? 0 : $value5->jul)." , ".($value5->ago == '' ? 0 : $value5->ago).",".($value5->sep == '' ? 0 : $value5->sep).", ".($value5->oct == '' ? 0 : $value5->oct).", ".($value5->nov == '' ? 0 : $value5->nov).",".($value5->dic == '' ? 0 : $value5->dic)."] },";
							} 
						}
					} 
				} 
			}
		}
        ?>
    	]
      });
	}
	$('.selectpicker').selectpicker({
	});
</script>

