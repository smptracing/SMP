 $(document).on("ready" ,function(){
                //alert("sdas");
               //lista();
            //division funcional

                listaFuncion();/*llamar a mi datatablet listar funcion*/

	$("#form-addFuncion").submit(function(event)//para añadir nueva funcion
	{
		event.preventDefault();

		$.ajax(
		{
			url : base_url+"index.php/Funcion/AddFucion",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				swal("",resp, "success");
				
				$('#table-Funcion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   

				listaFuncionCombo();

				$('#VentanaRegistraFuncion').modal('hide');
			}
		});
	});

                $("#form-ModificarFuncion").submit(function(event)//Actualizar funcion
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/Funcion/UpdateFuncion",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");
                           $('#table-Funcion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet
                           listaFuncionCombo();
                         }
                      });
                  });    
                //fin de  funcional
			});
			   /*listra funcion*/
                var listaFuncion=function()
                {
                    var table=$("#table-Funcion").DataTable({
                     "processing": true,
                      "serverSide": false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/Funcion/GetFuncion",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_funcion","visible": false},
                                    {"data":"codigo_funcion"},
                                    {"data":"nombre_funcion"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarFuncion'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });
                    FuncionData("#table-Funcion",table);  //obtener data de funcion para agregar  AGREGAR                 
                        			   	
                }

                var FuncionData=function(tbody,table){
                       $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var txt_IdfuncionM=$('#txt_IdfuncionM').val(data.id_funcion);
                        var txt_codigofuncionM=$('#txt_codigofuncionM').val(data.codigo_funcion);
                        var txt_nombrefuncionM=$('#txt_nombrefuncionM').val(data.nombre_funcion);


                    });
                }


                /*fin listar funcion*/

              
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
              "url": base_url+"index.php/MFuncion/GetGrupoFuncional",
							type:"POST",
							success:function(respuesta){
								alert(respuesta);
							

							}
						});
					}*/
