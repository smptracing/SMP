<style>
	table 
	{
	    border-collapse: collapse;
	    font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
	    width: 100%;
	}

	#tableValorizacion td, #tableValorizacion th
	{
		border: 1px solid black;
		font-size: 10px;
		padding: 2px;
		text-transform: uppercase;
	}
	.tabla td, .tabla th
	{
		border: 1px solid black;
		font-size: 10px;
		padding: 4px;
		text-transform: uppercase;
	}	
	p{
		font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
	}
</style>
<head>
	<title>FORMATO FE-02</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/dompdf.css">
</head>
	<div class="col-md-12 col-xs-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<p style="text-align: center; font-size: 12px;"><b>FORMATO FE-02</b><br>
				<b style="font-size: 13px;">INFORME MENSUAL / FINAL DE OBRA</b><br>
				<b style="text-transform: uppercase;font-size: 12px;">MES DE <?=$mes?></b><br>
				</p>
			</div>
			<div class="x_content">
	            <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<table id="tablaInformacion" class="tabla" >
							<tr>
								<td class="col-md-3"><b>Nombre del Proyecto:</b></td>
								<td class="col-md-9"><?=trim($expedienteTecnico->nombre_pi)?></td>
							</tr>
							<tr>
								<td class="col-md-3"><b>Unidad Ejecutora:</b></td>
								<td class="col-md-9"><?=trim($expedienteTecnico->nombre_ue)?></td>
							</tr>
							<tr>
								<td class="col-md-3"><b>Residente de Obra:</b></td>
								<td class="col-md-9"></td>
							</tr>
							<tr>
								<td class="col-md-3"><b>Supervisor de Obra:</b></td>
								<td class="col-md-9"></td>
							</tr>
							<tr>
								<td class="col-md-3"><b>Asistente Administrativo:</b></td>
								<td class="col-md-9"></td>
							</tr>
							<tr>
								<td class="col-md-3"><b>Fecha:</b></td>
								<td class="col-md-9"><?=date('Y-m-d')?></td>
							</tr>
						</table>
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
						<p> 
							<b>I.- GENERALIDADES</b><br>
							<b style="padding-left: 12px;">1.1.- GENERALIDADES DEL PROYECTO</b><br>
							<b style="padding-left: 24px;">1.1.1.- Ubicación</b><br>
						</p>
						<div style="padding-left: 44px;">
							<table class="tabla" >
								<tr>
									<td style="width: 20%;"><b>Departamento:</b></td>
									<td style="width: 80%;"></td>
								</tr>
								<tr>
									<td style="width: 20%;"><b>Provincia:</b></td>
									<td style="width: 80%;"></td>
								</tr>
								<tr>
									<td style="width: 20%;"><b>Distrito:</b></td>
									<td style="width: 80%;"></td>
								</tr>
								<tr>
									<td style="width: 20%;"><b>Dirección y/o Ubicación:</b></td>
									<td style="width: 80%;"></td>
								</tr>
							</table>								
						</div>
						<p>
							<b style="padding-left: 24px;">1.1.2.- Función Prográmatica</b><br>
						</p>
						<div style="padding-left: 44px;">
							<table class="tabla" style="border: none;">
								<tr>
									<td style="width: 20%;" ><b>FUNCIÓN:</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->funcion_et?></td>
								</tr>
								<tr>
									<td style="width: 20%;" ><b>PROGRAMA:</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->programa_et?></td>
								</tr>
								<tr>
									<td style="width: 20%;" ><b>SUBPROGRAMA</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->sub_programa_et?></td>
								</tr>
								<tr>
									<td style="width: 20%;" ><b>PROYECTO:</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->proyecto_et?></td>
								</tr>
								<tr>
									<td style="width: 20%;" ><b>COMPONENTE:</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->componente_et?></td>
								</tr>
								<tr>
									<td style="width: 20%;" ><b>META:</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->meta_et?></td>
								</tr>
								<tr>
									<td style="width: 20%;" ><b>MODALIDAD:</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->modalidad_ejecucion_et?></td>
								</tr>
							</table>								
						</div>
						<p>							
							<b style="padding-left: 24px;">1.1.3.- Aspectos Financieros</b><br>
						</p>
						<div style="padding-left: 44px;">
							<table class="tabla" style="border: none;">
								<tr>
									<td style="width: 20%;"><b>MONTO APROBADO:</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->funcion_et?></td>
								</tr>
								<tr>
									<td style="width: 20%;"><b>MONTO ASIGNADO:</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->programa_et?></td>
								</tr>
								<tr>
									<td style="width: 20%;"><b>FUENTE FINANCIAMIENTO</b></td>
									<td style="width: 80%;"><?=$expedienteTecnico->sub_programa_et?></td>
								</tr>
							</table>								
						</div>
						<p> 
							<b>II.- EJECUCIÓN DE OBRA</b><br>
							<b style="padding-left: 12px;">2.1.- PLAZO DE EJECUCIÓN</b><br></p>
						<p>
						<div style="padding-left: 44px;">
							<table class="tabla" style="border: none;">
								<tr>
									<td style="width: 25%;"><b>Fecha de Entrega de terreno</b></td>
									<td style="width: 25%;"><b>Fecha de Inicio de Obra</b></td>
									<td style="width: 25%;"><b>Fecha de Termino Programada Original</b></td>
									<td style="width: 25%;"><b>Fecha de Termino Real</b></td>
								</tr>
								<tr>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
								</tr>
							</table>								
						</div>
						<p>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
						</p>
						<div style="padding-left: 44px;">
							<p style="font-size: 10px;">OBRAS PRINCIPAL EXPEDIENTE TECNICO</p>
							<table id="tablaPartidas" class="tabla" style="border: none;">
								<tr>
									<td style="width: 25%;"><b>Item</b></td>
									<td style="width: 25%;"><b>Partidas</b></td>
									<td style="width: 25%;"><b>Unidad</b></td>
									<td style="width: 25%;"><b>Metrado</b></td>
								</tr>
								<tr>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
								</tr>
							</table>
							<br>
							<table id="tabladetalle" class="tabla" style="border: none;">
								<tr>
									<td><b>Información descriptiva de metas alcanzadas</b></td>
								</tr>
								<tr>
									<td style="width: 25%; height: 50px;"></td>
								</tr>
							</table>									
						</div>
						<p>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
						</p>
						<div style="padding-left: 44px;">
							<p style="font-size: 10px;">OBRAS ADICIONALES RESOLUCIÓN Nº</p>
							<table id="tablaAdicional" class="tabla" style="border: none;">
								<tr>
									<td style="width: 25%;"><b>Item</b></td>
									<td style="width: 25%;"><b>Partidas</b></td>
									<td style="width: 25%;"><b>Unidad</b></td>
									<td style="width: 25%;"><b>Metrado</b></td>
								</tr>
								<tr>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
								</tr>
							</table>
							<br>
							<table id="tabladetalleAdicional" class="tabla" style="border: none;">
								<tr>
									<td><b>Información descriptiva de los adicionales de obra</b></td>
								</tr>
								<tr>
									<td style="width: 25%; height: 50px;"></td>
								</tr>
							</table>									
						</div>
						<p>
							<b style="padding-left: 12px;">2.3.- INFORMACIÓN FÍSICA - FINANCIERA DEL PERIODO</b><br>
						</p>
						<div style="padding-left: 44px;">
							<table id="tablaAvanceFisico" class="tabla" style="border: none;">
								<thead>
									<tr>
										<th style="width: 20%;" rowspan="2">AVANCE FÍSICO</th>
										<th rowspan="2">Presupuesto de Obra</th>
										<th colspan="2">Anterior</th>
										<th colspan="2">Actual</th>
										<th colspan="2">Acumulado</th>
										<th colspan="2">Saldo</th>
									</tr>
									<tr>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>PROGRAMADO</td>
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
									<tr>
										<td>EJECUTADO</td>
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
									<tr>
										<td>ADICIONALES</td>
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
								</tbody>							
							</table>
							<br>
							<table id="tablaAvanceFinanciero" class="tabla" style="border: none;">
								<thead>
									<tr>
										<th style="width: 20%;" rowspan="2">AVANCE FINANCIERO</th>
										<th rowspan="2">Presupuesto Asignado</th>
										<th colspan="2">Anterior</th>
										<th colspan="2">Actual</th>
										<th colspan="2">Acumulado</th>
										<th colspan="2">Saldo</th>
									</tr>
									<tr>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>PROGRAMADO</td>
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
									<tr>
										<td>EJECUTADO</td>
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
									<tr>
										<td>AMPL. PRES.</td>
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
								</tbody>							
							</table>									
						</div>

						<p>
							<b>III.- CONTROL DE MANO DE OBRA</b><br>
						</p>
						<div style="padding-left: 44px;">
							<table id="tablaAvanceFisico" class="tabla" style="border: none;">
								<thead>
									<tr>
										<th colspan="12">MES DE <?=$mes?></th>
									</tr>
									<tr>
										<th rowspan="3">Nº de semana del mes</th>
										<th colspan="2">Semana</th>
										<th colspan="3">Nº Jornales por semana</th>
										<th colspan="3">Monto por Categoria Pagado</th>		
										<th rowspan="3">Total</th>								
									</tr>
									<tr>
										<th>Del</th>
										<th>Al</th>
										<th>Peón</th>
										<th>Oficial</th>
										<th>Operario</th>
										<th>Peón</th>
										<th>Oficial</th>
										<th>Operario</th>						
									</tr>
								</thead>
								<tbody>
									<?php for ($i=0; $i <5 ; $i++) 
									{  ?>
										<tr>
											<td><?=$i+1?></td>
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
									<?php } ?>	
									<tr>
										<td colspan="3">Total de Jornales del mes </td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>						
								</tbody>							
							</table>
							<br>
							<table id="tablaManodeObra" class="tabla" style="border: none;">
								<thead>
									<tr>
										<th style="width: 20%;" rowspan="2">Control de Mano de Obra</th>
										<th rowspan="2">Presupuesto de Mano de Obra S/. </th>
										<th colspan="2">Anterior</th>
										<th colspan="2">Actual</th>
										<th colspan="2">Acumulado</th>
										<th colspan="2">Saldo</th>
									</tr>
									<tr>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>
										<th>S/.</th>
										<th>%</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>PROGRAMADO</td>
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
									<tr>
										<td>EJECUTADO</td>
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
								</tbody>							
							</table>
							<table id="tablaObservaciones" class="tabla" style="border: none;">
								<tr>
									<td><b>Observaciones y/o comentarios:</b></td>
								</tr>
								<tr>
									<td style="width: 25%; height: 50px;"></td>
								</tr>
							</table>								
						</div>
						<p>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
						</p>
						<p>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
						</p>
						<p>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
						</p>
						<p>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
						</p>
						<div>
							<table class="tabla">
								<tr>
									<td>gfgfg</td>
									<td>gfgfg</td>
									<td>gfgfg</td>
									<td>gfgfg</td>
									<td>gfgfg</td>
								</tr>
							</table>
						</div>
						<!--<div style="padding-left: 44px;">
							<table class="tabla">
								<th>
									<td style="width: 25%;"><b>Item</b></td>
									<td style="width: 25%;"><b>Partida</b></td>
									<td style="width: 25%;"><b>Unidad</b></td>
									<td style="width: 25%;"><b>Metrado</b></td>
								</th>
								<tr>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
									<td style="width: 25%;"></td>
								</tr>
							</table>
						</div>-->
						
						<!--<table class="tabla" style="border: none;">
							<tr>
								<td style="width: 100%;">Información descriptiva de metas físicas alcanzadas:</td>
							</tr>
						</table>-->

						<!--<b style="padding-left: 12px;">2.3.- INFORMACIÓN FÍSICA - FINANCIERA DEL PERIODO</b><br>
						</p>-->
						<!--<p> 
							<b>II.- EJECUCIÓN DE OBRA</b><br>
							<b style="padding-left: 12px;">2.1.- PLAZO DE EJECUCIÓN</b><br>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
							<b style="padding-left: 12px;">2.3.- INFORMACIÓN FÍSICA - FINANCIERA DEL PERIODO</b><br>
						</p>
						<p> 
							<b>II.- EJECUCIÓN DE OBRA</b><br>
							<b style="padding-left: 12px;">2.1.- PLAZO DE EJECUCIÓN</b><br>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
							<b style="padding-left: 12px;">2.3.- INFORMACIÓN FÍSICA - FINANCIERA DEL PERIODO</b><br>
						</p>
						<p> 
							<b>II.- EJECUCIÓN DE OBRA</b><br>
							<b style="padding-left: 12px;">2.1.- PLAZO DE EJECUCIÓN</b><br>
							<b style="padding-left: 12px;">2.2.- PARTIDAS EJECUTADAS DURANTE EL PERIODO</b><br>
							<b style="padding-left: 12px;">2.3.- INFORMACIÓN FÍSICA - FINANCIERA DEL PERIODO</b><br>
						</p>-->
					</div>
				</div>
	        </div>
		</div>
	</div>
</div>