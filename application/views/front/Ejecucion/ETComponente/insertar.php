<form class="form-horizontal " id="form-addETComponente" action="<?php echo  base_url();?>index.php/ET_Componente/insertar" method="POST">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Expediente técnico</label>
			<div>
				<input type="text" id="txtNombreProyectoInversion" name="txtNombreProyectoInversion" class="form-control" autocomplete="off" readonly="readonly">
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 4px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="button" class="btn btn-info" value="Agregar componente">
		</div>
	</div>
	<hr style="margin-top: 0px;">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
			<ul>
				<li>
					<b>Componente 1</b> <input type="button" class="btn btn-default btn-xs" value="+M" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" style="width: 30px;">
					<ul>
						<li>
							Meta 1 <input type="button" class="btn btn-default btn-xs" value="+M" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" style="width: 30px;">
							<ul>
								<li>
									Submeta 1 <input type="button" class="btn btn-default btn-xs" value="+M" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" style="width: 30px;">
									<ul>
										<li>
											<span style="color: blue;">Partida 1</span> <input type="button" class="btn btn-default btn-xs" value="-" style="width: 30px;">
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<b>Componente 2</b> <input type="button" class="btn btn-default btn-xs" value="+M" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" style="width: 30px;">
					<ul>
						<li>
							Meta 1 <input type="button" class="btn btn-default btn-xs" value="+M" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" style="width: 30px;">
							<ul>
								<li>
									<span style="color: blue;">Partida 1</span> <input type="button" class="btn btn-default btn-xs" value="-" style="width: 30px;">
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<hr>
	<div class="row" style="text-align: right;">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</form>
<script>
	/*
	$(function()
	{
		$('#form-addETComponente').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtNombreProyectoInversion:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción" es requerido.</b>'
						}
					}
				}
			}
		});
	});*/
</script>