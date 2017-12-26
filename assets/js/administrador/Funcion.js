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

		$.ajax(
		{
			url : base_url+"index.php/Funcion/UpdateFuncion",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				swal("",resp, "success");
				
				$('#table-Funcion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet
				
				listaFuncionCombo();

				$('#VentanaModificarFuncion').modal('hide');
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
                       "order": [[1,'asc']],
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
                    EliminarFuncion("#table-Funcion",table);    			   	
                }

                var FuncionData=function(tbody,table){
                       $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var txt_IdfuncionM=$('#txt_IdfuncionM').val(data.id_funcion);
                        var txt_codigofuncionM=$('#txt_codigofuncionM').val(data.codigo_funcion);
                        var txt_nombrefuncionM=$('#txt_nombrefuncionM').val(data.nombre_funcion);


                    });
                }

                var EliminarFuncion=function(tbody,table){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_funcion=data.id_funcion;
                         swal({
                                title: "Desea eliminar el Registro ?",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes,Eliminar",
                                closeOnConfirm: false
                              },
                              function(){
                                    $.ajax({
                                          url:base_url+"index.php/Funcion/EliminarFuncion",
                                          type:"POST",
                                          data:{id_funcion:id_funcion},
                                          success:function(respuesta){
                                           var registros=jQuery.parseJSON(respuesta);
                                           if(registros.flag==0){
                                            swal("Elimando.",registros.msg, "success");
                                            $('#table-Funcion').dataTable()._fnAjaxUpdate();
                                           }
                                           else{
                                            swal("Error.",registros.msg, "error");
                                            $('#table-Funcion').dataTable()._fnAjaxUpdate();
                                           }
                                           }
                                        });
                              });
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
 $(function() {
     $("tbody").on("click", "#send", function(e) {
         $('#form-addFuncion').data('formValidation').validate();
         if ($('#form-addFuncion').data('formValidation').isValid() == true) {
             $('#form-addFuncion').submit();
             $('#form-addFuncion').each(function() {
                 this.reset();
             });
             $('#form-addFuncion').data('formValidation').resetForm();
         }
     });
          $("tbody").on("click", "#sendM", function(e) {
         $('#form-ModificarFuncion').data('formValidation').validate();
         if ($('#form-ModificarFuncion').data('formValidation').isValid() == true) {
             $('#form-ModificarFuncion').submit();
             $('#form-ModificarFuncion').each(function() {
                 this.reset();
             });
             $('#form-ModificarFuncion').data('formValidation').resetForm();
         }
     });
     $('#form-addFuncion').formValidation({
         framework: 'bootstrap',
         excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
         live: 'enabled',
         message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
         trigger: null,
         fields: {
             txt_codigofuncion: {
                 validators: {
                     notEmpty: {
                         message: '<b style="color: red;">El campo "Código" es requerido.</b>'
                     },
                     stringLength: {
                         max: 2,
                         message: '<b style="color: red;">El campo "Código" debe tener como máximo 02 caracteres.</b>'
                     },
                     regexp: {
                          regexp: /^[0-9]+$/,
                         message: '<b style="color: red;">El campo "Código" debe contener solamente números.</b>'
                     }
                 }
             },
        txt_nombrefuncion: {
                 validators: {
                     notEmpty: {
                         message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                     },
                     stringLength: {
                         max: 199,
                         message: '<b style="color: red;">El campo "Nombre" debe tener como máximo 199 caracteres.</b>'
                     },
                     regexp: {
                         regexp: /^[a-z\s]+$/i,
                         message: '<b style="color: red;">El campo "Nombre" debe contener solamante caracteres alfabéticos y espacios.</b>'
                     }
                 }
             }
         }
     });
     $('#form-ModificarFuncion').formValidation({
         framework: 'bootstrap',
         excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
         live: 'enabled',
         message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
         trigger: null,
         fields: {
          txt_codigofuncionM: {
                 validators: {
                     notEmpty: {
                         message: '<b style="color: red;">El campo "Código" es requerido.</b>'
                     },
                     stringLength: {
                         max: 2,
                         message: '<b style="color: red;">El campo "Código" debe tener como máximo 02 caracteres.</b>'
                     },
                     regexp: {
                          regexp: /^[0-9]+$/,
                         message: '<b style="color: red;">El campo "Código" debe contener solamente números.</b>'
                     }
                 }
             },
        txt_nombrefuncionM: {
                 validators: {
                     notEmpty: {
                         message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                     },
                     stringLength: {
                         max: 199,
                         message: '<b style="color: red;">El campo "Nombre" debe tener como máximo 199 caracteres.</b>'
                     },
                     regexp: {
                         regexp: /^[a-z\s]+$/i,
                         message: '<b style="color: red;">El campo "Nombre" debe contener solamante caracteres alfabéticos y espacios.</b>'
                     }
                 }
             }
         }
     });
 });
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
