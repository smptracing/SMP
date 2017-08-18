<select name="selectEtapaEjecucion" id="selectEtapaEjecucion" class="form-control">
	<?php foreach($listaETEtapaEjecucion as $value){ ?>
		<option value="<?=$value->id_etapa_et?>"><?=$value->desc_etapa_et?></option>
	<?php } ?>
</select>
<hr style="margin: 4px;">
<div style="text-align: right;">
	<input type="button" value="Clonar expediente técnico" class="btn btn-success" onclick="clonarExpedienteTecnico(<?=$idExpedienteTecnico?>);">
</div>
<script>
	function clonarExpedienteTecnico(idExpedienteTecnico)
	{
		paginaAjaxJSON({ idExpedienteTecnico : idExpedienteTecnico, idEtapaExpedienteTecnico : $('#selectEtapaEjecucion').val() }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function()
			{
				if(objectJSON.proceso=='Correcto')
				{

				}
			});
		}, false, true);
	}
</script>