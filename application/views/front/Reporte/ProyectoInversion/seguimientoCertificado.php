<style>
	.table-consolidadoAvance{
		width: 100%;
	}
	.alineacionDerecha
	{
		text-align: right;
	}
</style>
<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h5><b>REPORTE GENERAL DE AVANCE FISICO Y FINANCIERO</b></h5>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					BÚSQUEDA POR AÑO:
					<div class="row">
						<div class="col-lg-5">
					    	<div class="input-group">
					      		<input type="text" id="BuscarPipAnio" value="<?=$anio?>"  class="form-control" placeholder="Ingrese Año">
					      		<span class="input-group-btn">
					        		<button id="AnioPip" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"> Buscar</span></button>
					      		</span>
					    	</div>
					  	</div>
					  	<div class="col-lg-3">
					        <a href="javascript:siafActualizadorCertificado()">
					        	<button id="BtnAcatualizar" class="btn btn-success" type="button"><i class="fa fa-spinner"></i> Actualizar Avance Financiero</button>
					        </a>
					  	</div>
					  	<div class="col-lg-4">
					    	<div class="input-group">
								<div class="pull-left tableTools-container"></div>
					    	</div>
					  	</div>
					</div>
					<div class="table-responsive">
						<table id="table-consolidadoAvance" class="table table-striped jambo_table" cellspacing="0" width="150%">
						 	<thead>
							 	<tr>
								 	<th style="c;">Snip</th>
								 	<th style="width: 5%;">Meta</th>
								 	<th style="width: 5%;">Siaf</th>
								 	<th style="width: 45%;">Proyecto</th>
								 	<th class="alineacionDerecha" style="width: 5%;">Costo</th>
								 	<th class="alineacionDerecha" style="width: 5%;">Pim Acumulado</th>
								 	<th class="alineacionDerecha" style="width: 5%;">Certificado</th>
								 	<th class="alineacionDerecha" style="width: 5%;">Avance Pim Certificado</th>
								 	<th class="alineacionDerecha" style="width: 5%;">Devengado</th>
								 	<th class="alineacionDerecha" style="width: 5%;">Avance Pim Devengado</th>
								 	<th class="alineacionDerecha" style="width: 5%;">Seguimiento</th>
								 	<th class="alineacionDerecha" style="width: 5%;">Por Gastar</th>
							 	</tr>
						 	</thead>
						 	<tbody>
								<?php foreach ($Consolidado as $item) {?>
								  	<tr>
										<td>
											<?=$item->proyecto_snip?>
								    	</td>
								    	<td>
											<?=$item->sec_func?>
								    	</td>
								    	<td>
								    		<button type="button" class="DetalleOrdenExpeSiaf btn btn-success btn-xs" ><a style="color: white;" href="<?php echo site_url('ProyectoInversion/ReporteBuscadorPorPip/' . $item->act_proy); ?>">
												<?=$item->act_proy?></a> <i class='ace-icon bigger-120'></i></button>
								    	</td>
								    	<td style="font-size: 10px;">
											<?=$item->nombre?>
								    	</td>
								    	<td class="alineacionDerecha">
											S/. <?=a_number_format($item->costo_actual, 2, '.', ",", 3)?>
								    	</td>
								    	<td class="alineacionDerecha">
											S/. <?=a_number_format($item->pim_acumulado, 2, '.', ",", 3)?>
								    	</td>
								    	<td class="alineacionDerecha">
											S/. <?=a_number_format($item->monto_certificado, 2, '.', ",", 3)?>
								    	</td>
								    	<td class="alineacionDerecha">
											<?=$item->avance_pim_cert?>%
								    	</td>
								    	<td class="alineacionDerecha">
											S/. <?=a_number_format($item->devengado, 2, '.', ",", 3)?>
								    	</td>
								    	<td class="alineacionDerecha">
											<?=$item->avance_pim_deven?>%
								    	</td>
								    	<td class="alineacionDerecha">
											S/. <?=a_number_format($item->para_seguimiento, 2, '.', ",", 3)?>
								    	</td>
								    	<td class="alineacionDerecha">
											S/. <?=a_number_format($item->saldo_por_gastar, 2, '.', ",", 3)?>
								    	</td>
								  </tr>
								<?php }?>
							</tbody>
					  	</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<script>

$(document).on("ready" ,function()
{
	$("#AnioPip").on( "click", function()
	{
		avanceFisico();
	});

	var myTable=$('#table-consolidadoAvance').DataTable(
	{
		"language":idioma_espanol
	});

	$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

	new $.fn.dataTable.Buttons( myTable, {
		buttons: [
		  {
			"extend": "excel",
			"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
			"className": "btn btn-white btn-primary btn-bold"
		  },
		  {
			"extend": "pdf",
			"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
			"className": "btn btn-white btn-primary btn-bold",
			"pageSize": 'LEGAL',
			orientation: 'landscape',
		  },
		  {
			"extend": "print",
			"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
			"className": "btn btn-white btn-primary btn-bold",
			autoPrint: false,
			message: 'This print was produced using the Print button for DataTables'
		  }
		]
	} );
	myTable.buttons().container().appendTo( $('.tableTools-container') );

});

function avanceFisico()
{
	$("#avancefisicoFinan").show(2000);

	var anio=$("#BuscarPipAnio").val();
	window.location.href=base_url+"index.php/ProyectoInversion/ReporteBuscadorPorAnio/"+anio;
}

function siafActualizadorCertificado()
{
    var anio = $("#BuscarPipAnio").val();
	var start = +new Date();
			
	$.ajax({
			url: "http://200.37.200.182:8080/Importacion/anio/"+anio,
			type: "POST",
			cache: false,
	        contentType:false,
	        processData:false,
			beforeSend: function(request) {
			    renderLoading();
			},
			success:function(data){
				$('#divModalCargaAjax').hide();
				datos=JSON.parse(data);
				var rtt = +new Date() - start;

				if(datos.actualizo)
				{
					
					//var rttSeg = rtt / 1000;
					swal(
					  'Operacion Completada',
					  datos.mensaje + ' Tiempo: ' + (rtt/1000) +'s',
					  'success'
					);
				}
				else
				{
					swal(
					  'No se pudo completar la Operacion',
					  datos.mensaje + ' Tiempo: ' + (rtt/1000) +'s',
					  'error'
					);
				}					
			},
			error: function (xhr, textStatus, errorMessage) {
		        $('#divModalCargaAjax').hide();
		        swal(
					  'ERROR!',
					  'Por favor consulte con el administrador, error 0x5642419',
					  'error'
					);			        
		    } 
		});
}

</script>

