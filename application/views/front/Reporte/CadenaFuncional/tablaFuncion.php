<div class="row">
	<div class="form-group">
        <label class="control-label col-md-2 col-sm-2 col-xs-12">Número de Beneficiarios:</label>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <input type="text" class="form-control" placeholder="Total" id="txtTotalBeneficiarios" readonly value=<?=$totalBeneficiarios?> >
        </div>
    </div>									                    	
</div>
<br>

<table id="dynamic-table"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<td>Codigo</td>
			<td>Proyecto</td>
			<td>Función</td>
			<td>División Funcional</td>
			<td>Grupo Funcional</td>
			<td>Número de Beneficiarios</td>
			<td>Costo</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($listaProyectos as $item ) { ?>
	  	<tr class="dato">
			<td>
				<?=$item->codigo_unico_pi?>
	    	</td>
	    	<td>
				<?=$item->nombre_pi?>
	    	</td>
	    	<td>
				<?=$item->nombre_funcion ?>
	    	</td>
	    	<td>
				<?=$item->nombre_div_funcional ?>
	    	</td>
	    	<td>
				<?=$item->nombre_grup_funcional?>
	    	</td>	    	
	    	<td>
				<?=$item->num_beneficiarios?>
	    	</td>
	    	<td style="text-align:right">
				S/. <?=$item->costo_pi?>
	    	</td>	    	
	  </tr>
	<?php } ?>
	</tbody>
</table>
<script>
	$('#dynamic-table').DataTable();
</script>