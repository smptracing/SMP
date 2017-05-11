 $(document).on("ready" ,function(){

                listaNaturalezaInversion();/*llamar a mi datatablet listar funcion*/
              //abrir el modal para registrar


//REGISTARAR NUEVA NATURALEZA INVERSION
   $("#form-AddNaturalezaInversion").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/TipologiaInversion/AddNaturalezaInversion",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                             if (resp=='1') {
                             swal("Se registró...","", "success");
                             formReset();
                           }
                            if (resp=='2') {
                             swal("NO se registró...","", "error");
                           }
                          $('#dynamic-table-NaturalezaInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                             
                         }
                      });
                  });



      //limpiar campos

          function formReset()
          {
          document.getElementById("form-AddNaturalezaInversion").reset();
          }
          //formulario para ediotar
             $("#form-EditNaturalezaInversion").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/TipologiaInversion/UpdateNaturalezaInversion",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                           swal(resp,"", "success");
                          $('#dynamic-table-NaturalezaInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                            // formReset();
                         }
                      });
                  });


      });
         /*listra funcion*/
                var listaNaturalezaInversion=function()
                {
                    var myTable=$("#dynamic-table-NaturalezaInversion").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/TipologiaInversion/get_NaturalezaInversion",
                                     "method":"POST",
                                      "dataSrc":""
                                    },
                                "columns":[
                                   {"defaultContent":" "},
                                   {"data":"IDNATURALEZA"  },
                                   {"data":"NOMBRENATURALEZA"},
                                   {"data":"DESCRIPCIONNATURALEZA"},
                                  {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaRegNaturalezaInversion'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
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
       myTable.buttons().container().appendTo( $('.tableTools-container') );
        NaturalezaData("#dynamic-table-NaturalezaInversion",myTable);  //CARGAR LA DATA PARA MOSTRAR EN EL MODAL  
        EliminarNaturalezaData("#dynamic-table-NaturalezaInversion",myTable);
                }

                var  NaturalezaData=function(tbody,myTable){
                    $(tbody).on("click","button.editar",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        var txt_IdNaturalezaM=$('#txt_IdNaturalezaM').val(data.IDNATURALEZA);
                        var txt_NombreNaturalezaM=$('#txt_NombreNaturalezaM').val(data.NOMBRENATURALEZA);
                        var txt_DescripcionNaturalezaM=$('#txt_DescripcionNaturalezaM').val(data.DESCRIPCIONNATURALEZA);

                    });
                }
var EliminarNaturalezaData=function(tbody,table){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var IDNATURALEZA=data.IDNATURALEZA;
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
                                          url:base_url+"index.php/TipologiaInversion/EliminarNaturalezaInversion",
                                          type:"POST",
                                          data:{IDNATURALEZA:IDNATURALEZA},
                                          success:function(respuesta){
                                            //alert(respuesta);
                                            swal("Se eliminó corectamente", ".", "success");
                                            $('#dynamic-table-NaturalezaInversion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

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

 
