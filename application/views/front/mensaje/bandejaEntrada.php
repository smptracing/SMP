<div class="row">
	<div class="col-md-12">
		 <table id="table_mensaje" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
      		<thead style="background-color:#5A738E;color:#FFFFFF;">
        		<tr>
          			<th >Procedencia</th>
          			<th >Mensaje</th>
          			<th style="width:100px;">Fecha</th>
                    <th style="width:50px;"></th>
        		</tr>
      		</thead>
        </table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<button type="button" id="bt_cerrarBandejaEntrada" class="btn btn-danger">Cerrar</button>
	</div>
</div>
<script type="text/javascript">
	function listarMensaje(){
		var table=$("#table_mensaje").DataTable({
			"processing":true,
			"serverSide":false,
			"destroy":true,
			"language":idioma_espanol,
			"bPaginate": false,
			"bFilter": false, //hide Search bar
	    	"bInfo": false, // hide showing entries
			"ajax":{
				"url":base_url+"index.php/mensaje/listarMensaje",
				"method":"POST",
				"dataSrc":""
			},
			"columns":[
				{"data":"procedencia"},
				{"data":"mensaje"},
				{"data":"fecha"},
				/*{"data":'nombre_val',render:function(data,type,row){
					    return "<button type='button'  data-toggle='tooltip'  class='editar btn btn-primary btn-xs' data-toggle='modal' onclick=paginaAjaxDialogo('m_Valorizacion','Modificar&nbsp;valorizaci&oacute;n',{id_valorizacion:"+row.id_valorizacion+"},'"+base_url+"index.php/criterio/itemValorizacion','GET',null,null,false,true);><i class='ace-icon fa fa-pencil bigger-120'></i></button>";
					}
				}*/
			],
		}); 
	}
	$(function(){
		$("body").on("click","#bt_cerrarBandejaEntrada",function(e){
			$('#dg_bandejaEntradaMensaje').modal('hide');
		});
	}); 
	$(document).ready(function(){
		listarMensaje();
	}); 
</script>