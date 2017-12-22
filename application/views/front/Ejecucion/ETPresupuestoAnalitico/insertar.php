<style type="text/css">
.pre{
	color: red;
	background: red;
}	

</style>
<div class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<input type="hidden" name="hd_et" id="hd_et" value="<?=$expedienteTecnico->id_et?>" notValidate>
			<label class="control-label">Nombre del proyecto de inversión</label>
			<div>
				<textarea name="txtNombreProyectoInversion" id="txtNombreProyectoInversion" rows="3" class="form-control" style="resize: none;resize: vertical;" readonly="readonly"><?=$expedienteTecnico->nombre_pi?></textarea>
			</div>
		</div>
	</div>
	<div class="row">
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
		<div class="col-md-5 col-sm-5 col-xs-5" id="divPresupuestoAnalitico">
				<input type="hidden"  id="hdIdClasificador" name="hdIdClasificador" notValidate>
				<label class="control-label">Clasificador</label>
				<div>
					<select name="selectClasificador" id="selectClasificador" class="form-control selectpicker">
						<option value="">Buscar Clasificador</option>
					</select>
				</div>
				<label><b id="msgError" style="color: red; font-size: 9px; display: none;">El campo "Clasificador" es requerido.</b></label>
		</div>
	
		<div id="divAgregarComponente" style="margin-top: 23px;">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<input type="button" class="btn btn-info" value="Agregar Presupuesto Analítico " onclick="agregarPresupuestoAnalitico();" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12" style="height:300px;overflow:scroll;overflow-x: hidden; ">
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
					<?php foreach ($PresupuestoEjecucionListar as $key => $value) {?>
						<tr>
							<td colspan="4"><?=$value->desc_presupuesto_ej?></td>
								<?php foreach($value->ChilpresupuestoAnalitico as $item){ ?>
									<tr>
										<td></td>
										<td><?= $item->num_clasificador?></td>
										<td><?= $item->desc_clasificador?></td>
										<td><button onclick="EliminarPresClasiAnalitico(<?=$item->id_analitico?>,this);" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class='btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button></td>									</tr>
								<?php } ?>
						</tr>						
					<?php }?>
				</tbody>
			</table>		
		</div>
	</div>
	<div class="row" style="text-align: right;">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar
		</button>
	</div>
</div>
<script>
	function agregarPresupuestoAnalitico()
	{
		if ($('#selectClasificador').val()=="")
		{
			$( "#msgError").css( "display", "block" );
			return;
		}
		$( "#msgError").css( "display", "none" );
		var idClasificador=$("#hdIdClasificador").val();
		var hd_id_et=$('#hd_et').val();
		var idPresupuestoEjecucion=$("#selectPresupuestoEjecucion").val();
		$.ajax({ url:base_url+"index.php/ET_Presupuesto_Analitico/insertar",type:"POST",data:{idClasificador:idClasificador,hd_id_et:hd_id_et,idPresupuestoEjecucion:idPresupuestoEjecucion},dataType:'JSON',success:function(respuesta)
                {
                	if(respuesta.proceso=='Error')
                	{
                		swal('',respuesta.mensaje,'error')
                	}else
                	{
                    	var html;
                    	$("#bodyClasificador").html('');
                    	$.each(respuesta,function(index,element)
                    	{
                    	    html +='<tr>';
                    		html +='<td colspan="4">'+element.desc_presupuesto_ej+'</td>';
	                    		$.each(element.ChilpresupuestoAnalitico,function(index,element)
	                    		{
									html +='<tr><td></td>';
									html +='<td>'+element.num_clasificador+'</td>';
									html +='<td>'+element.desc_clasificador+'</td>';
									html +='<td><button onclick="EliminarPresClasiAnalitico('+element.id_analitico+',this);" data-toggle="tooltip" data-original-title="Eliminar Analitico"   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>';	
									html +='</tr>';
	                    		});
                    		html +='</tr>';
                    	});
						$("#table_clasificador > #bodyClasificador").append(html);
						swal("AGREGO", "Se agrego correctamente.", "success");
                    }
                }
            });
	}
	function EliminarPresClasiAnalitico(idClasiAnalitico, element)
    {
        swal({
            title: "Se eliminará el presupuesto analítico. ¿Realmente desea proseguir con la operación?",
            text: "",
            type: "warning",
            showCancelButton: true,
            cancelButtonText:"CANCELAR" ,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "SI,ELIMINAR",
            closeOnConfirm: false
        },
        function(){
            paginaAjaxJSON({ "idClasiAnalitico" : idClasiAnalitico}, base_url+'index.php/ET_Presupuesto_Analitico/eliminar', 'POST', null, function(objectJSON)
            {
                objectJSON=JSON.parse(objectJSON);

                swal(
                {
                    title: '',
                    text: objectJSON.mensaje,
                    type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
                },
                function(){});
                if(objectJSON.proceso=='Error')
                {
                    return false;
                }
                if(objectJSON.proceso=='Correcto')
                {
                    $(element).parent().parent().remove();
                }

            }, false, true);
        });
    }
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
	            statusInitialized : 'Escriba para buscar Clasificador',
	            statusNoResults : 'No se encontro',
	            statusSearching : 'Buscando...',
	            searchPlaceholder : 'Buscar'
	        },
	        preprocessData: function(data)
	        {
	        	var dataForSelect=[];
	        	for(var i=0; i<data.length; i++)
	        	{
	        		
	        		dataForSelect.push(
	                {
	                    "value" : data[i].num_clasificador,
	                    "text" : data[i].num_clasificador,
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

		$('#divPresupuestoAnalitico').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				selectClasificador:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Clasificador" es requerido.</b>'
						}
					}
				}
			}
		});		
	});
</script>

