$(document).on("ready" ,function(){

                listaFuenteFinanciamiento();/*llamar a mi datatablet listar funcion*/
              //abrir el modal para registrar


//REGISTARAR NUEVA fuente financiamiento
   $("#form-AddFuenteFinanciamiento").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/pip/AddFuenteFinanciamiento",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           alert(resp);
                          $('#dynamic-table-FuenteFinanciamiento').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                             formReset();
                         }
                      });
                  });

      //limpiar campos
          function formReset()
          {
          document.getElementById("form-AddFuenteFinanciamiento").reset();
          document.getElementById("form-EditFuenteFinanciamiento").reset();
          }
       //formulario para ediotar
             $("#form-EditFuenteFinanciamiento").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/pip/UpdateFuenteFinanciamiento",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           alert(resp);
                          $('#dynamic-table-FuenteFinanciamiento').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                             formReset();
                         }
                      });
                  });


			});
			   /*listra */
                var listaFuenteFinanciamiento=function()
                {
                    var myTable=$("#dynamic-table-FuenteFinanciamiento").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/pip/get_FuenteFinanciamiento",
									"method":"POST",
									"dataSrc":""
                                    },
                                "columns":[
                                   {"defaultContent":" <label class='pos-rel'><input type='checkbox' class='ace' /><span class='lbl'></span></label>"},
                                   
                                   {"data":"IDFFTO"},
                                    {"data":"NOMBREFFTO"},
									{"data":"ACRONIMOFFTO"},
							        {"data":"DESCRIPCIONFFTO"},
                                  {"defaultContent":"<button type='button' class='ver btn btn-info btn-xs' data-toggle='modal' data-target='#ver'><span class='glyphicon glyphicon-zoom-in' aria-hidden='true'></span></button><button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaEditFuenteFinanciamiento'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>"}
                               ],

                                "language":idioma_espanol
                    }); 
$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container-FuenteFinanciamiento') );
        Fuente_FinanciamientoData("#dynamic-table-FuenteFinanciamiento",myTable);  //CARGAR LA DATA PARA MOSTRAR EN EL MODAL  
        EliminarFuente_FinanciamientoData("#dynamic-table-FuenteFinanciamiento",myTable);
                }

                var  Fuente_FinanciamientoData=function(tbody,myTable){
                    $(tbody).on("click","button.editar",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        var txt_IdFuenteFinanciamientoM=$('#txt_IdFuenteFinanciamientoM').val(data.IDFFTO);
                        var txt_NombreFuenteFinanciamientoM=$('#txt_NombreFuenteFinanciamientoM').val(data.NOMBREFFTO);
                        var txt_AcronimoFuenteFinanciamientoM=$('#txt_AcronimoFuenteFinanciamientoM').val(data.ACRONIMOFFTO);
                        var txt_DescripcionFuenteFinanciamientoM=$('#txt_DescripcionFuenteFinanciamientoM').val(data.DESCRIPCIONFFTO);

                    });
                }
var EliminarFuente_FinanciamientoData=function(tbody,table){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        //var id_sector=data.id_sector;
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
                                          url:base_url+"index.php/pip/EliminarFuenteFinanciamiento",
                                          type:"POST",
                                          data:{IDFuenteFinanciamiento:IDFuenteFinanciamiento},
                                          success:function(respuesta){
                                            //alert(respuesta);
                                            swal("Deleted!", "Se elimino corectamente .", "success");
                                            $('#dynamic-table-FuenteFinanciamiento').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

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


