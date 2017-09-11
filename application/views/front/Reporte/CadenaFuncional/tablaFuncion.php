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
	  	<tr>
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