<?php
function mostrarAnidado($meta, $expedienteTecnico,$countValorizacionDiaria)
{
	$htmlTemp='';

	$htmlTemp.='<tr class="elementoBuscar">'.
		'<td><b><i>'.$meta->numeracion.'</i></b></td>'.
		'<td style="text-align: left;"><b><i>'.html_escape($meta->desc_meta).'</i></b></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>'.
		'<td></td>';		
	$htmlTemp.='</tr>';
	if(count($meta->childMeta)==0)
	{		
		foreach($meta->childPartida as $key => $value)
		{
			$valorSuperado = false;

			foreach ($countValorizacionDiaria as $key => $item) 
			{
				if($item->id_detalle_partida == $value->childDetallePartida->id_detalle_partida)
				{
					if($item->cantidad>=$value->childDetallePartida->cantidad)
					{
						$valorSuperado = true;
						
					}
				}
			}
			
			$htmlTemp.='<tr class="elementoBuscar">'.
				'<td>'.$value->numeracion.'</td>'.
				'<td style="text-align: left;">'.html_escape($value->desc_partida).'</td>'.
				'<td>'.html_escape($value->descripcion).'</td>'.
				'<td style="text-align: right;">'.$value->cantidad.'</td>'.
				'<td style="text-align: right;">S/.'.$value->precio_unitario.'</td>'.
				'<td style="text-align: right;">S/.'.number_format($value->cantidad*$value->precio_unitario, 2).'</td>'.
				'<td style="text-align: center;"><a class= "'.($valorSuperado == true ? 'btn btn-success btn-xs' : 'btn btn-info btn-xs').'"  onclick="valorizar('.$value->childDetallePartida->id_detalle_partida.');"><i class="fa fa-plus"></i> Registrar</a></td>'.
				'</tr>';
		}		
	}
	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarAnidado($value, $expedienteTecnico,$countValorizacionDiaria);
	}
	return $htmlTemp;
}
?>
<style>
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th 
	{
		padding:6px;
	}
	.btn, .buttons, .modal-footer .btn+.btn, button 
	{
	    margin-bottom: 0px;
	    margin-right: 5px;
	}
</style>
<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>Ejecución diria de Metrados</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">

						</div>
					</div>
                </div>
                <div class="x_content">
                    
                    <div class="row">
                    	<div class="col-md-12">
                    		<label class="control-label"> Nombre del Proyecto:</label>
                    		<div>
                    			<textarea rows="2" class="form-control" readonly="readonly"><?=trim($expedienteTecnico->nombre_pi)?></textarea>
                    			<br>
                    		</div>
                    	</div>
						<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
							<table id="tableValorizacion" class="table table-striped jambo_table bulk_action  table-hover" >
							<thead>
								<tr>
									<th>ÍTEM</th>
									<th>DESCRIPCIÓN</th>
									<th>UND.</th>
									<th style="text-align: right;">CANT.</th>
									<th style="text-align: right;">P.U.</th>
									<th style="text-align: right;">TOTAL</th>
									<th style="text-align: center;"> OPCIONES</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
									<tr class="elementoBuscar">
										<td><b><i><?=$value->numeracion?></i></b></td>
										<td style="text-align: left;"><b><i><?=html_escape($value->descripcion)?></i></b></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<?php foreach($value->childMeta as $index => $item){ ?>
										<?= mostrarAnidado($item, $expedienteTecnico, $countValorizacionDiaria)?>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
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
	$(document).ready(function()
	{
		$('#tableValorizacion').DataTable(
		{
			"language":idioma_espanol,
			"pageLength": 25,
			"ordering":  false
		});

	});
	function valorizar(codigo)
	{
		paginaAjaxDialogo('otherModal', 'Valorizacion de Partida',{ id_DetallePartida: codigo }, base_url+'index.php/Expediente_Tecnico/AsignarValorizacion', 'GET', null, null, false, true);
	}
	/*$('#otherModal').on('hidden.bs.modal', function () 
	{
		alert("cerrado");

	})*/

</script>
