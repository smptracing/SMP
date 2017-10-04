<form class="form-horizontal"  id="form-addFePresupuesto">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<label>Función</label><br/>
				<select id="cbx_funcion" name="cbx_funcion" class="selectpicker" data-live-search="true">
						<?php foreach ($function as $Itemp) {?>
								 <option value="<?=$Itemp->id_funcion.','.$Itemp->nombre_funcion?>"><?=$Itemp->nombre_funcion?></option>
						<?php  } ?>
				</select>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<label>Nombre</label>
				<input type="text" class="form-control" id="txtNombreCriterio" name="txtNombreCriterio" placeholder="Nombre Criterio" autocomplete="off">
			</div>
		</div>
		<h4 style="margin-bottom: 0px;">Detalle</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<div class="row" id="divCriterioGeneral">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>Año</label>
				<input type="text" class="form-control" id="txtAnioCriterioG" name="txtAnioCriterioG" placeholder="Año" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>Peso</label>	
				<input type="text" class="form-control" id="txtPesoCriterioG" name="txtPesoCriterioG" placeholder="Peso" autocomplete="off">
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>.</label>
				<input type="button" id="btnAgregarCriterioGeneral" class="btn btn-primary form-control" value="Agregar">
			</div>
		</div>
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
			<button type="submit" id="btnEnviarFormulario" class="btn btn-primary">Registrar Criterio General.</button>
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