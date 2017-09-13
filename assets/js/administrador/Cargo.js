$(document).on("ready" ,function()
{
	listarcargo();//para mostrar lista de las cargos

	$("#btn_Nuevadivision").click(function()//para que cargue el como una vez echo click sino repetira datos
	{
		listacargoCombo();//para llenar el combo de agregar division cargo
	});

	$("#form-addcargo").submit(function(event)
	{
		event.preventDefault();

		$.ajax(
		{
			url : base_url+"index.php/Personal/addcargo",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				if(resp=='1')
				{
					swal("REGISTRADO","Se regristró correctamente", "success");
					
					formReset();

					$('#VentanaRegistracargo').modal('hide');
				}

				if(resp=='2')
				{
					swal("NO SE REGISTRÓ","NO se regristró ", "error");
				}

				$('#table-cargo').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
				
				formReset();
			}
		});
	});

	//limpiar campos
	function formReset()
	{
		document.getElementById("form-addcargo").reset();
		document.getElementById("form-updatecargo").reset();
	}

	$("#form-updatecargo").submit(function(event)
	{
		event.preventDefault();

		$.ajax(
		{
			url : base_url+"index.php/Personal/updatecargo",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				if(resp=='1')
				{
					swal("MODIFICADO","Se Modificó correctamente", "success");
				
					formReset();

					$('#Ventanaupdatecargo').modal('hide');
				}
				
				if(resp=='2')
				{
					swal("NO SE MODIFICÓ","NO se Modificó ", "error");
				}

				$('#table-cargo').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
				
				formReset();
			}
		});
	});
});

                  /* listar y lista en tabla entidad*/ 
                var listarcargo=function()
                {
                    var table=$("#table-cargo").DataTable({

                     "processing":true,
                     "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/Personal/getcargo",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_cargo"},
                                    {"data":"Desc_cargo"},
                                    {"defaultContent":"<button type='button'  class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#Ventanaupdatecargo'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });
                    cargoData("#table-cargo",table);  //obtener data de la division cargo para agregar  AGREGAR                 
                }

                  var  cargoData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var txt_idcargo_m=$('#txt_idcargo_m').val(data.id_cargo);
                        var txt_nombrecargo_m=$('#txt_nombrecargo_m').val(data.Desc_cargo);
                    });

                }

                /*fin crea tabla division cargo*/ 
                /*crear tabla dinamica servicio publico asociado */

              
        /*Idioma de datatablet table-sector */
            var idioma_espanol=
                {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }

        /* function lista()
          {
            event.preventDefault();
            $.ajax({
              "url": base_url+"index.php/Mcargo/GetGrupocargo",
              type:"POST",
              success:function(respuesta){
                alert(respuesta);
              

              }
            });
          }*/
