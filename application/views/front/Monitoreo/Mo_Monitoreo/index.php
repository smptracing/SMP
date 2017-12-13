<style>
    .panel-title 
    {
        font-size: 13px;
        font-weight: bold;
    }
     .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
    padding: 2px;   
	}
	button, .buttons, .btn, .modal-footer .btn+.btn {
    margin-bottom: 0px;
	}
</style>
<div class="form-horizontal">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div>
                <input type="hidden" id="id_pi" value="<?=$proyecto[0]->id_pi?>"><br>
                <textarea style="font-size: 13px;" name="txtNombreProyectoInversion" id="txtNombreProyectoInversion" rows="2" class="form-control" style="resize: none;resize: vertical;" readonly="readonly"><?=html_escape(trim($proyecto[0]->nombre_pi))?></textarea>
            </div>
        </div>
    </div>
    <div class="row" style="height: 300px;overflow-y: scroll; margin-top: 15px;">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                <?php foreach ($producto as $key => $value) { ?>                
                <div class="panel">
                    <div class="panel-heading" style="padding: 6px;">
                        <a class="panel-title" id="pheading<?=$value->id_producto?>" data-toggle="collapse" data-parent="#accordion1" href="#pcollapse<?=$value->id_producto?>" aria-expanded="false" aria-controls="pcollapse<?=$value->id_producto?>" style="text-transform: uppercase;"><?=$value->desc_producto?>
                        </a>
                    </div>
                    <?php if(count($value->childActividad)>0) { ?>
                    <div id="pcollapse<?=$value->id_producto?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="pheading<?=$value->id_producto?>">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php foreach ($value->childActividad as $key => $actividad) { ?>

                                <table class="table table-bordered mitabla" id="tablaActividad<?=$actividad->id_actividad?>">
                                    <thead>
                                        <tr style="text-align: center; background-color: #f9f9f9;">
                                            <th colspan="6" style="color: #ed5565; font-size: 12px; font-weight: bold; width: 100%; text-transform: uppercase;"> ACTIVIDAD: <?=$actividad->desc_actividad?> - <?=$actividad->meta?> (<?=$actividad->uni_medida?>)</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 10%;">Mes</th>
                                            <th style="width: 15%;">Ejec. Fis. Prog</th>
                                            <th style="width: 15%;">Ejec. Fis. Real</th>
                                            <th style="width: 20%;">Ejec. Fin. Prog</th>
                                            <th style="width: 20%;">Ejec. Fin. Real</th>
                                            <th style="width: 20%;">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyActividad<?=$actividad->id_actividad?>">
                                    <?php foreach ($actividad->childProgramacion as $key => $programacion) { ?>
                                    <tr id="trProgramacion<?=$programacion->id_ejecucion?>">
                                        <td><?=$programacion->mes_ejec?></td>
                                        <td><?=$programacion->ejec_fisic_prog?></td>
                                        <td><?=$programacion->ejec_fisic_real?></td>
                                        <td><?=a_number_format($programacion->ejec_finan_prog, 2, '.',",",3) ?></td>
                                        <td><?=a_number_format($programacion->ejec_finan_real, 2, '.',",",3)?></td>
                                        <td>
                                            <a onclick="paginaAjaxDialogo('agregarResultado', 'Resultado, Observaciones y Compromisos',{ idEjecucion: '<?=$programacion->id_ejecucion?>', nombreActividad : '<?=$actividad->desc_actividad?>' }, base_url+'index.php/Mo_Monitoreo/verresultado', 'GET', null, null, false, true);return false;" role="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Resultado de Monitoreo"><span class="fa fa-eye"></span></a>
                                        </td>
                                    </tr>
                                    <?php } ?>                                        
                                    </tbody>
                                    <tfoot style="background-color: #e7edf1;">
                                    	<tr>
                                    		<td>TOTAL</td>
                                    		<td><?=a_number_format($actividad->totalEjFisProg, 2, '.',",",0)?></td>
                                    		<td><?=a_number_format($actividad->totalEjFisReal, 2, '.',",",0)?></td>
                                    		<td><?=a_number_format($actividad->totalEjFinProg, 2, '.',",",3)?></td>
                                    		<td colspan="2"><?=a_number_format($actividad->totalEjFinReal, 2, '.',",",0)?></td>
                                    	</tr>
                                    </tfoot>
                                </table> 


                                <?php } ?>
                                                           
                            </div>                      
                        </div>
                    </div>
                    <?php }?>
                </div> 
                <?php } ?>              
            </div>
            
        </div>
    </div>
    <hr>
    <div class="row" style="text-align: right;">        
        <button class="btn btn-danger" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span>
            Cerrar ventana
        </button>
    </div>
</div>