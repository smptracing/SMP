$(document).on("ready" ,function(){

                listaTipoInversion();/*llamar a mi datatablet listar funcion*/
              //abrir el modal para registrar


	//REGISTARAR NUEVA tipologia inversion
	$("#form-AddTipoInversion").submit(function(event)
	{
		event.preventDefault();

		$.ajax(
		{
			url : base_url+"index.php/TipologiaInversion/AddTipoInversion",
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

				$('#dynamic-table-TipoInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   

				formReset();

				$('#VentanaRegTipoInversion').modal('hide');				
			}
		});
	});

	//limpiar campos
	function formReset()
	{
		document.getElementById("form-AddTipoInversion").reset();
		document.getElementById("form-EditTipoInversion").reset();
	}

	//formulario para ediotar
	$("#form-EditTipoInversion").submit(function(event)
	{
		event.preventDefault();

		$.ajax(
		{
			url : base_url+"index.php/TipologiaInversion/UpdateTipoInversion",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				swal(resp,"", "success");

				$('#dynamic-table-TipoInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
				
				formReset();

				$('#VentanaEditTipoInversion').modal('hide');
			}
		});
	});

      });
         /*listra */
                var listaTipoInversion=function()
                {
                    var myTable=$("#dynamic-table-TipoInversion").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/TipologiaInversion/get_TipoInversion",
                  "method":"POST",
                  "dataSrc":""
                                    },
                                "columns":[
                                   {"data":"id_tipo_inversion","visible" : false},
                                   {"data":"nombre_tipo_inversion"},
                                   {"data":"descripcion_tipo_inversion"},
                                   {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaEditTipoInversion'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                               ],

                                "language":idioma_espanol
                    }); 
        TipoInversiongiaData("#dynamic-table-TipoInversion",myTable);  //CARGAR LA DATA PARA MOSTRAR EN EL MODAL  
        EliminarTipoInversionData("#dynamic-table-TipoInversion",myTable);
                }

                var  TipoInversiongiaData=function(tbody,myTable){
                    $(tbody).on("click","button.editar",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        var txt_IdTipoInversionM=$('#txt_IdTipoInversionM').val(data.id_tipo_inversion);
                        var txt_NombreTipoInversionM=$('#txt_NombreTipoInversionM').val(data.nombre_tipo_inversion);
                        var txt_DescripcionTipoInversionM=$('#txt_DescripcionTipoInversionM').val(data.descripcion_tipo_inversion);

                    });
                }
var EliminarTipoInversionData=function(tbody,myTable){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        var id_tipo_inversion=data.id_tipo_inversion;
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
                                          url:base_url+"index.php/TipologiaInversion/EliminarTipoInversion",
                                          type:"POST",
                                          data:{id_tipo_inversion:id_tipo_inversion},
                                          success:function(respuesta){
                                            //alert(respuesta);
                                            swal("Se eliminó corectamente", ".", "success");
                                            $('#dynamic-table-TipoInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

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

