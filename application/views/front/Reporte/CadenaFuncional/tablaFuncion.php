<table id="dynamic-table"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<td>Función</td>
			<td>División Funcional</td>
			<td>Grupo Funcional</td>
			<td>Proyecto</td>
			<td>Número de Beneficiarios</td>
			<td>Costo</td>
			<td>Provincia</td>
			<td>Distrito</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($listaProyectos as $item ) { ?>
	  	<tr>
			<td>
				<?=$item->nombre_funcion?>
	    	</td>
	    	<td>
				<?=$item->nombre_div_funcional ?>
	    	</td>
	    	<td>
				<?=$item->nombre_grup_funcional?>
	    	</td>
	    	<td>
				<?=$item->nombre_pi?>
	    	</td>
	    	<td>
				<?=$item->num_beneficiarios?>
	    	</td>
	    	<td style="text-align:right">
				S/. <?=$item->costo_pi?>
	    	</td>
	    	<td>
				<?=$item->provincia?>
	    	</td>
	    	<td>
				<?=$item->distrito?>
	    	</td>		
	    	
	  </tr>
	<?php } ?>
	</tbody>
</table>
<script>
	$('#dynamic-table').DataTable();
</script>