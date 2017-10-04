<form class="form-horizontal"  id="form-addFePresupuesto">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-xs-12">
				<label>Criterio General</label>
				<input type="text" class="form-control" id="txtNombreCriterio" name="txtNombreCriterio" autocomplete="off">
			</div>
			<div class="col-md-6 col-sm-8 col-xs-12">
				<label>Criterio Específico</label>
				<input type="text" class="form-control" id="txtNombreCriterio" name="txtNombreCriterio" placeholder="Ingrese Criterio Específico" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-8 col-xs-12">
				<label>Peso</label>
				<input type="text" class="form-control" id="txtNombreCriterio" name="txtNombreCriterio" placeholder="Ingrese Criterio Específico" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>.</label>
				<input type="button" id="btnAgregarCriterioGeneral" class="btn btn-primary form-control" value="Agregar">
			</div>
		</div>
	<hr>
		<div>
			<table id="table-GriterioGenerales" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Función</td>
						<td>Nombre</td>
						<td>Anio</td>
						<td>Peso</td>
						<td></td>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row" style="text-align: right;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-primary">Registrar Criterio Especifico</button>
			<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>
<script>
$( document ).ready(function() {
    $('#cbx_funcion').selectpicker('refresh');
	$("#btnAgregarCriterioGeneral").on('click', function(event)
	{

		var posicionSeparadorTemp=$('#cbx_funcion').val().indexOf(',');
		var idfuncion=$('#cbx_funcion').val().substring(0, posicionSeparadorTemp);
		var descripFuncion=replaceAll(replaceAll($('#cbx_funcion').val().substring(posicionSeparadorTemp+1, $('#cbx_funcion').val().length), '<', '&lt;'), '>', '&gt;');

		var txtNombreCriterio=$("#txtNombreCriterio").val();
		var txtAnioCriterioG=$("#txtAnioCriterioG").val();
		var txtPesoCriterioG=$("#txtPesoCriterioG").val();
		var htmlTemp='<tr>'+
			'<td><input type="hidden" value='+idfuncion+' name="hdIdFuncion[]"> '+descripFuncion+'</td>'+
			'<td><input type="hidden" value='+txtNombreCriterio+' name="hdIdFuncion[]"> '+txtNombreCriterio+'</td>'+
			'<td><input type="hidden" value='+txtAnioCriterioG+' name="hdIdFuncion[]"> '+txtAnioCriterioG+'</td>'+
			'<td><input type="hidden" value='+txtPesoCriterioG+' name="hdIdFuncion[]"> '+txtPesoCriterioG+'</td>'+
			'<td><a href="#" onclick="$(this).parent().parent().remove();" style="color: red;font-weight: bold;text-decoration: underline;">Eliminar</a></td>'+
		'</tr>'

		$('#table-GriterioGenerales > tbody').append(htmlTemp);

	});
});
</script>