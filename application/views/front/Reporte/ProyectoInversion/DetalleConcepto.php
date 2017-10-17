 <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<style>
    .modal-dialog
    {
        width: 90%;
        margin: 0;
        margin-left: 5%;
        padding: 0;
    }

    .modal-content
    {
        height: auto;
        min-height: 100%;
        border-radius: 0;
    }
</style>

  

<!--<script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<link href="<?php echo base_url(); ?>assets/vendors/datatables/jquery.dataTables.min.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>assets/vendors/datatables/responsive.dataTables.min.css" rel="stylesheet">-->


<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12" style="height:600px;overflow:scroll;overflow-x: hidden;">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>DATOS GENERALES Y DETALLE POR ORDEN DE PEDIDOS</b> </h2>
								<?php $anio=0 ?>

								<?php foreach($listaPorOrden as $item ){ ?>
													  	<tr>
															<td>

																<?php  $anio = $item->ANO_EJE ;?>
													    	</td>	    	
													  </tr>
								<?php } ?>



						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
					
							<div id="myTabContent" class="tab-content">
								<!-- /Contenido del sector -->
								<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
									<!-- /tabla de sector desde el row -->
									<label>AÑO :<?php  echo $anio ?></label>
									<div class="clearfix">
										<div class="pull-right tableTools-container"></div>
									</div>

									<br>

									<div class="row">
						                <div class="col-md-12 col-sm-12 col-xs-12" >
										<div class="table-responsive" >
                                         <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                                <th></th>
                                                <th>Exp Siaf | Nro Orden</th>
                                                <th>Concepto</th>
                                                <th>Sub total S/.</th>
                                                <th>Total Igv S/.</th>
                                                <th>Total Fact S/.</th>
                                                <th>Tipo bien</th>
                                                <th>Fecha de orden</th>
                                                <th>Doc referencia</th>
                                                 <th>Exp Siga</th>
                                              
                                                <th>Proveedor</th>
                                                <th>Dirección</th>
                                                <th>Giro General</th>
                                                <th>Nro Ruc</th>
                                                <th>Teléfonos</th>
                                                <th>CCI</th>
                                                <th>Teléfono Fax</th>
                                                <th>Año Eje</th>
                                                <th>Tipo Ppto</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php foreach($listaPorOrden as $item ){ ?>
                                                        <tr>
                                                            <td></td>
                                                            <td>    
                                                            <button type="button" class="DetalleOrdenExpeSiaf btn btn-primary btn-xs" onclick="detalleordenexpsiaf(<?= (int)$item->ANO_EJE?>,<?= (int)$item->EXP_SIAF?>);"><?=$item->EXP_SIAF?><i class='ace-icon bigger-120'></i></button>
                                                            <button type="button" class="DetalleOrdenExpeSiaf btn btn-success btn-xs" onclick="detalleporcadanumorden(<?= (int)$item->ANO_EJE?>,'<?=$item->TIPO_BIEN?>',<?=(int)$item->NRO_ORDEN?>,<?=(int)$item->TIPO_PPTO?>);"><?=$item->NRO_ORDEN?><i class='ace-icon bigger-120'></i></button>    
                                                            </td>
                                                            <td>
                                                                <?=$item->CONCEPTO?>
                                                            </td>
                                                              <td style="text-align:right">
                                                                <?=number_format($item->SUBTOTAL_SOLES,2)?>
                                                            </td>
                                                            <td style="text-align:right">
                                                                <?=number_format($item->SUBTOTAL_SOLES,2)?>
                                                            </td>
                                                            <td style="text-align:right">
                                                                <?=number_format($item->TOTAL_FACT_SOLES,2)?>
                                                            </td>
                                                            <td>
                                                                <?=$item->TIPO_BIEN?>
                                                            </td>
                                                            <td>
                                                                <?=$item->FECHA_ORDEN?>
                                                            </td>
                                                            <td>
                                                                <?=$item->DOCUM_REFERENCIA?>
                                                            </td>
                                                            <td>
                                                                <?=$item->EXP_SIGA?>
                                                            </td>
                                                          
                                                            <td>
                                                                <?=$item->NOMBRE_PROV?>
                                                            </td>
                                                            <td>
                                                                <?=$item->DIRECCION?>
                                                            </td>
                                                            <td>
                                                                <?=$item->GIRO_GENERAL?>
                                                            </td>
                                                            <td>
                                                                <?=$item->NRO_RUC?>
                                                            </td>
                                                            <td>
                                                                <?=$item->TELEFONOS?>
                                                            </td>
                                                            <td>
                                                                <?=$item->CCI?>
                                                            </td>
                                                            <td>
                                                                <?=$item->TELEFONO_FAX?>
                                                            </td>
                                                            <td>
                                                                <?=$item->ANO_EJE?>
                                                            </td>
                                                            <td>
                                                                <?=$item->TIPO_PPTO?>
                                                            </td>

                                                              </tr>
                                                    <?php } ?>
                                          </tbody>
                                        </table>

                                        </div>
                                        </div>

					                        <!--<div class="table-responsive" style|="height:300px;overflow:scroll;overflow-x: hidden; ">-->
                                             

                                                <!--<table id="dynamic-table"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="2500px">
												<thead>
												<tr>
													<td>EXP SIAF</td>
													<td>EXP SIGA</td>
									
													<td>N° ORDEN</td>
													<td>TIPO DE BIEN</td>
													<td>FECHA DE ORDEN</td>
													<td>DOC REFERENCIA</td>
													<td>CONCEPTO</td>
													<td style="text-align:right">SUB TOTAL SOLES</td>
													<td style="text-align:right">TOTAL IGV SOLES</td>
													<td style="text-align:right">TOTAL FACT SOLES</td>
													<td>PROVEEDOR</td>
													<td>DIRECCION</td>
													<td>GIRO GENERAL</td>
													<td>NRO RUC</td>
													<td>TELEFONOS</td>
													<td>CCI</td>
													<td>TELEFONO FAX</td>
													<td>ANO EJE</td>
													<td>TIPO PPTO</td>
												 </tr>
												</thead>
												<body>
                                                                <?=number_format($item->TOTAL_IGV_SOLES,2)?>
													<?php foreach($listaPorOrden as $item ){ ?>
													  	<tr>
															<td>	
															<button type="button" class="DetalleOrdenExpeSiaf btn btn-primary btn-xs" onclick="detalleordenexpsiaf(<?= (int)$item->ANO_EJE?>,<?= (int)$item->EXP_SIAF?>);"><?=$item->EXP_SIAF?><i class='ace-icon bigger-120'></i></button>
															</td>
													    	<td>
																<?=$item->EXP_SIGA?>
													    	</td>
													    	<td>
													    		<button type="button" class="DetalleOrdenExpeSiaf btn btn-success btn-xs" onclick="detalleporcadanumorden(<?= (int)$item->ANO_EJE?>,'<?=$item->TIPO_BIEN?>',<?=(int)$item->NRO_ORDEN?>,<?=(int)$item->TIPO_PPTO?>);"><?=$item->NRO_ORDEN?><i class='ace-icon bigger-120'></i></button>		
													    	</td>
													    	<td>
																<?=$item->TIPO_BIEN?>
													    	</td>
													    	<td>
																<?=$item->FECHA_ORDEN?>
													    	</td>
													    	<td>
																<?=$item->DOCUM_REFERENCIA?>
													    	</td>
													    	<td>
																<?=$item->CONCEPTO?>
													    	</td>
													    	<td style="text-align:right">
																<?=number_format($item->SUBTOTAL_SOLES,2)?>
													    	</td>
													    	<td style="text-align:right">
                                                            </td>
													    	<td style="text-align:right">
																<?=number_format($item->TOTAL_FACT_SOLES,2)?>
													    	</td>
													    	<td>
																<?=$item->NOMBRE_PROV?>
													    	</td>
													    	<td>
																<?=$item->DIRECCION?>
													    	</td>
													    	<td>
																<?=$item->GIRO_GENERAL?>
													    	</td>
													    	<td>
																<?=$item->NRO_RUC?>
													    	</td>
													    	<td>
																<?=$item->TELEFONOS?>
													    	</td>
													    	<td>
																<?=$item->CCI?>
													    	</td>
													    	<td>
																<?=$item->TELEFONO_FAX?>
													    	</td>
													    	<td>
																<?=$item->ANO_EJE?>
													    	</td>
													    	<td>
																<?=$item->TIPO_PPTO?>
													    	</td>



													  </tr>
													<?php } ?>
													
												</body>
											
											</table>-->

					                        <!--</div>-->

						        	</div>
									<br>
									
									</div>
							



								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<script>
/*$(document).ready(function() {
    $('#example').DataTable( {
        "language":idioma_espanol,
        "searching": true,
         "info":     true,
        "paging":   true,
              responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   0
        } ],
        order: [ 1, 'asc' ]
    } );
} );*/
/*$(document).ready(function()
	{
		
		var myTable=$('#dynamic-table').DataTable(
		{
			"language":idioma_espanol,
            "searching": true,
             "info":     true,
            "paging":   true,
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
						"className": "btn btn-white btn-primary btn-bold"
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
				
			
			})*/

function detalleordenexpsiaf(anio,expsiaf)
{
	paginaAjaxDialogo(1, 'Detalle de Expediente Siaf por Orden de Compra',{anio:anio,expsiaf:expsiaf}, base_url+'index.php/PrincipalReportes/detalleOrdenExpSiaf', 'GET', null, null, false, true);	
}

function detalleporcadanumorden(anio,tipobien,numorden,tipoppto)
{
	paginaAjaxDialogo(2, 'Detalle por cada N° Orden',{anio:anio,tipobien:tipobien,numorden:numorden,tipoppto:tipoppto}, base_url+'index.php/PrincipalReportes/detallePorCadaNumOrden', 'GET', null, null, false, true);	
}


</script>
  <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Datatables -->

    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script> <!--PARA EL BOTON-->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>






