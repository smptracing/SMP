 $(document).on("ready" ,function(){
                listaTipoNoPip();/*llamar a mi datatablet listar no tipos no pip*/

//REGISTARAR NUEVA NATURALEZA INVERSION
	$("#form_AddTipoNoPip").submit(function(event)
	{
		event.preventDefault();

		$.ajax(
		{
			url : base_url+"index.php/TipologiaInversion/AddTipoNoPip",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				if(resp=='1')
				{
					swal("Se registró...","", "success");

					formReset();
				}

				if(resp=='2')
				{
					swal("NO se registró...","", "error");
				}

				$('#table_no_pip').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
			 $('#VentanaRegTipoNoPIP').modal('hide');
      }
		});
	});
      //limpiar campos
	function formReset()
	{
		document.getElementById("form_AddTipoNoPip").reset();
	  document.getElementById("form_EditTipoNoPip").reset();
  }

	$("#form_EditTipoNoPip").submit(function(event)
	{
		event.preventDefault();
		$.ajax(
		{
			url : base_url+"index.php/TipologiaInversion/UpdateTipoNoPip",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				swal(resp,"", "success");
				$('#table_no_pip').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion
        $('#VentanaEditTipoNoPip').modal('hide');
			}
		});
	});

      });
         /*listra funcion*/
                var listaTipoNoPip=function()
                {
                    var myTable=$("#table_no_pip").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/TipologiaInversion/get_tipo_no_pip",
                                     "method":"POST",
                                      "dataSrc":""
                                    },
                                "columns":[
                                   {"data":"id_tipo_nopip","visible" : false},
                                   {"data":"desc_tipo_nopip"},
                                  {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaEditTipoNoPip'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                               ],


                                "language":idioma_espanol
                    });

        TipoNoPipData("#table_no_pip",myTable);  //CARGAR LA DATA PARA MOSTRAR EN EL MODAL
        EliminarTipoNoPip("#table_no_pip",myTable);
                }

                var  TipoNoPipData=function(tbody,myTable){
                    $(tbody).on("click","button.editar",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        $('#txt_IdTipoNoPipM').val(data.id_tipo_nopip);
                        $('#txt_DescripcionTipoNoPipM').val(data.desc_tipo_nopip);
                    });
                }
var EliminarTipoNoPip=function(tbody,table){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_tipo_nopip=data.id_tipo_nopip;
                        console.log(data);
                         swal({
                                title: "Desea eliminar ?",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes,Eliminar",
                                closeOnConfirm: false
                              },
                              function(){
                                    $.ajax({
                                          url:base_url+"index.php/TipologiaInversion/EliminarTipoNoPip",
                                          type:"POST",
                                          data:{id_tipo_nopip:id_tipo_nopip},
                                          success:function(respuesta){
                                            //alert(respuesta);
                                            swal("Se eliminó corectamente", ".", "success");
                                            $('#table_no_pip').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

                                          }
                                        });
                              });
                    });
                }




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
