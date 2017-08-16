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
			<input type="hidden" name="hd_et" id="hd_et" value="<?=$expedienteTecnico->id_et?>">
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
			<input type="hidden"  id="hdIdClasificador" name="hdIdClasificador">
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
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<table class="table  table-condensed jambo_table bulk_action" id="table_clasificador">
				<thead>
					<tr>
						<th>Presupuesto de ejecución</th>
						<th>CLASIF.</th>
						<th>DESCRIPCIÓN</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="bodyClasificador">
					<?php foreach ($PresupuestoAnaliticoListar as $Itemp) {?>
						<tr>
							<td><?= $Itemp->desc_presupuesto_ej?></td>
							<td><?= $Itemp->num_clasificador?></td>
							<td><?= $Itemp->desc_clasificador?></td>
							<td><button onclick="Eliminar(<?=$Itemp->id_analitico?>);" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class='btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button></td>
						</tr>						
					<?php }?>
				</tbody>
			</table>		
		</div>
	</div>
	<div class="row" style="text-align: right;">
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

		$('#selectClasificador').on('change', function()
		{
			var selected=$(this).find("option:selected").val();

			if(selected.trim()!='')
			{
				$('#hdIdClasificador').val($(this).find("option:selected").data('id_clasificador'));
			}
		});

	});

		function agregarPresupuestoAnalitico()
		{
			var idClasificador=$("#hdIdClasificador").val();
			var hd_id_et=$('#hd_et').val();
			var idPresupuestoEjecucion=$("#selectPresupuestoEjecucion").val();
			$.ajax({ url:base_url+"index.php/ET_Presupuesto_Analitico/insertar",type:"POST",data:{idClasificador:idClasificador,hd_id_et:hd_id_et,idPresupuestoEjecucion:idPresupuestoEjecucion},dataType:'JSON',
                    success:function(respuesta)
                    {
                    	alert(respuesta);
                    	var html;
                    	$("#bodyClasificador").html('');
                    	$.each(respuesta,function(index,element)
                    	{
                    		html +='<tr><td>'+element.desc_presupuesto_ej+'</td><td>'+element.num_clasificador+'</td><td>'+element.desc_clasificador+'</td><td> <button onclick="Eliminar('+element.id_analitico+');" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td></tr>';
                    	});
						$("#table_clasificador > tbody").append(html);
						 swal("AGREGO!", "Se agrego correctamente.", "success");
                    }
                });
		}


</script>