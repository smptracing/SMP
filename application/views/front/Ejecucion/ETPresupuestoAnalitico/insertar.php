<?php
function mostrarMetaAnidada($meta, $idExpedienteTecnico)
{
	$htmlTemp='';

	$htmlTemp.='<li>'.
		$meta->desc_meta.' <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('.$meta->id_meta.', this);" style="width: 30px;">'.
		((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '<table><tbody>' : '<ul>');

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr style="color: blue;" class="liPartida">'.
				'<td style="padding-left: 10px;"><b>&#9658;'.$value->desc_partida.'</b></td>'.
				'<td style="padding-left: 4px;">'.$value->rendimiento.'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.$value->descripcion.'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.$value->cantidad.'</td>'.
				'<td style="padding-left: 4px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('.$value->id_partida.', this);" style="width: 30px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : '.$idExpedienteTecnico.', idPartida : '.$value->id_partida.' }, \''.base_url().'index.php/ET_Analisis_Unitario/insertar\', \'get\', null, null, false, true);" style="width: 30px;">'.
				'</td>'.
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
<div class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Nombre del proyecto de inversión</label>
			<div>
				<textarea name="txtNombreProyectoInversion" id="txtNombreProyectoInversion" rows="3" class="form-control" style="resize: none;resize: vertical;" readonly="readonly"><?=$expedienteTecnico->nombre_pi?></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label">Presupuesto Ejecución</label>
			<div>
				<select id="selectPresupuestoEjecucion" name="selectPresupuestoEjecucion" class="form-control">
					<?php foreach($PresupuestoEjecucionListar as $Itemp){ ?>
						<option value="<?=$Itemp->id_presupuesto_ej?>"><?=$Itemp->desc_presupuesto_ej?></option>
					<?php } ?>
				</select>
			</div>
	</div>
	<div class="col-md-5 col-sm-5 col-xs-5">
			<label class="control-label">Clasificador</label>
			<div>
				<select name="selectClasificador" id="selectClasificador" class="form-control"></select>
			</div>
	</div>
	<div id="divAgregarComponente" class="row" style="margin-top: 23px;">
		<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="button" class="btn btn-info" value="Agregar Presupuesto Analítico " onclick="agregarPresupuestoAnalitico();" style="width: 100%;">
		</div>
	</div>
	<div id="divAgregarPartida" class="row" style="display: none;margin-top: 4px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Descripción partida</label>
			<div>
				<select name="selectDescripcionPartida" id="selectDescripcionPartida" class="form-control"></select>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<label class="control-label">Rendimiento</label>
			<div>
				<input type="text" class="form-control" id="txtRendimientoPartida" name="txtRendimientoPartida">
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<label class="control-label">Unidad</label>
			<div>
				<select id="selectUnidadMedidaPartida" name="selectUnidadMedidaPartida" class="form-control">
					<?php foreach($listaUnidadMedida as $key => $value){ ?>
						<option value="<?=$value->id_unidad?>"><?=$value->descripcion?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<label class="control-label">Cantidad</label>
			<div>
				<input type="text" class="form-control" id="txtCantidadPartida" name="txtCantidadPartida">
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<label class="control-label">.</label>
			<div>
				<input type="hidden" id="hdIdListaPartida" name="hdIdListaPartida">
				<input type="button" class="btn btn-info" value="+" onclick="agregarPartida();" style="width: 100%;">
			</div>
		</div>
	</div>
	<hr style="margin-top: 4px;">

	<hr>
	<div class="row" style="text-align: right;">
		<input type="hidden" id="hdIdET" value="<?=$expedienteTecnico->id_et?>">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</div>
<script>
	$(function()
	{
		$('#selectClasificador').selectpicker({ liveSearch: true }).ajaxSelectPicker(
		{
	        ajax: {
	            url: base_url+'index.php/ET_Clasificador/BuscarDetalleClasificador',
	            data: { valueSearch : '{{{q}}}' }
	        },
	        locale:
	        {
	            emptyTitle: 'Buscar Clasificador'
	        },
	        preprocessData: function(data)
	        {
	        	var dataForSelect=[];

	        	for(var i=0; i<data.length; i++)
	        	{
	        		dataForSelect.push(
	                {
	                    "value" : data[i].desc_clasificador,
	                    "text" : data[i].desc_clasificador,
	                    "data" :
	                    {
	                    	"id_clasificador" : data[i].id_clasificador
	                    },
	                    "disabled" : false
	                });
	        	}

	            return dataForSelect;
	        },
	        preserveSelected: false
	    });


	});
</script>