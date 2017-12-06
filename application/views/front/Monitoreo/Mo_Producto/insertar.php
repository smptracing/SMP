<div class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div>
				<input type="hidden" id="id_pi" value="<?=$proyecto[0]->id_pi?>">
				<textarea name="txtNombreProyectoInversion" id="txtNombreProyectoInversion" rows="2" class="form-control" style="resize: none;resize: vertical;" readonly="readonly"><?=html_escape(trim($proyecto[0]->nombre_pi))?></textarea>
			</div>
		</div>
	</div>
	<br>
	<div id="divAgregarProducto" class="row" style="margin-top: 3px;">
		<div class="col-md-10 col-sm-6 col-xs-12">
			<input type="text" class="form-control" id="txtDescripcionProducto" name="txtDescripcionProducto" placeholder="Descripción del producto">
		</div>
		<div class="col-md-2 col-sm-4 col-xs-12">
			<input type="button" class="btn btn-info" value="Agregar producto" onclick="agregarProducto();" style="width: 100%;">
		</div>
	</div>
	<div class="row" style="height: 300px;overflow-y: scroll;">
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
			<ul id="ulProducto" style="list-style-type: upper-roman;">
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
</div>

<script>
	function agregarProducto()
	{
		paginaAjaxJSON({ "idPi" : $('#id_pi').val(), "descripcionProducto" : $('#txtDescripcionProducto').val().trim() }, base_url+'index.php/Mo_MonitoreodeProyectos/InsertarProducto', 'POST', null, function(objectJSON)
		{
			resp=JSON.parse(objectJSON);

			console.log(resp);

			((resp.proceso=='Correcto') ? swal(resp.proceso,resp.mensaje,"success") : swal(resp.proceso,resp.mensaje,"error"));
            
            if(resp.proceso=='Correcto')
            {
	            var htmlTemp='<li>'+
					'<input type="button" class="btn btn-default btn-xs" value="G" onclick="guardarCambiosComponente('+objectJSON.idProducto+');" style="width: 30px;">';
					htmlTemp+='<input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta('+objectJSON.idProducto+', $(this).parent(), \'\');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente('+objectJSON.idProducto+', this);" style="width: 30px;"> <b style="text-transform: uppercase; color: black;" id="nombreComponente'+objectJSON.idProducto+'" contenteditable>'+replaceAll(replaceAll($('#txtDescripcionProducto').val().trim(), '<', '&lt;'), '>', '&gt;')+'</b>';
					htmlTemp+='<ul style="padding-left: 40px;"></ul></li>';


				$('#ulProducto').append(htmlTemp);

				$('#txtDescripcionProducto').val('');

            }
		}, false, true);

	}
</script>