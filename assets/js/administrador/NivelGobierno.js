$(document).on("ready" ,function(){

                listaNivelGobierno();/*llamar a mi datatablet listar funcion*/
              //abrir el modal para registrar


//REGISTARAR NUEVA nivel de gobierno
   $("#form-AddNivelGobierno").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/InformacionPresupuestal/AddNivelGobierno",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                            if (resp=='1') {
                             swal("Se registró...","", "success");
                             formReset();
                           }
                            if (resp=='2') {
                             swal("NO se registró...","", "error");
                           }
                          $('#dynamic-table-NivelGobierno').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                             formReset();
                         }
                      });
                  });

      //limpiar campos
          function formReset()
          {
          document.getElementById("form-AddNivelGobierno").reset();
          document.getElementById("form-EditNivelGobierno").reset();
          }
       //formulario para ediotar
             $("#form-EditNivelGobierno").submit(function(event)
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/InformacionPresupuestal/UpdateNivelGobierno",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           //alert(resp);
                           swal(resp,"", "success");
                          $('#dynamic-table-NivelGobierno').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                             formReset();
                         }
                      });
                  });


      });
         /*listra */
                var listaNivelGobierno=function()
                {
                    var myTable=$("#dynamic-table-NivelGobierno").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,

                         "ajax":{
                                    "url":base_url+"index.php/InformacionPresupuestal/get_NivelGobierno",
                  "method":"POST",
                  "dataSrc":""
                                    },
                                "columns":[
                                   {"defaultContent":" <label class='pos-rel'><input type='checkbox' class='ace' /><span class='lbl'></span></label>"},
                                  {"data":"IDNIVELGOB"  },
                                   {"data":"NOMBRENIVELGOB"},
                                  {"data":"DESCRIPCIONNIVELGOB"},
                                  {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaEditNivelGobierno'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>"}
                               ],

                                "language":idioma_espanol
                    }); 
        NivelGobiernoData("#dynamic-table-NivelGobierno",myTable);  //CARGAR LA DATA PARA MOSTRAR EN EL MODAL  
        EliminarNivelGobiernoData("#dynamic-table-NivelGobierno",myTable);
                }

                var  NivelGobiernoData=function(tbody,myTable){
                    $(tbody).on("click","button.editar",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        var txt_IdNivelGobiernoM=$('#txt_IdNivelGobiernoM').val(data.IDNIVELGOB);
                        var txt_NombreNivelGobiernoM=$('#txt_NombreNivelGobiernoM').val(data.NOMBRENIVELGOB);
                        var txt_DescripcionNivelGobiernoM=$('#txt_DescripcionNivelGobiernoM').val(data.DESCRIPCIONNIVELGOB);

                    });
                }
var EliminarNivelGobiernoData=function(tbody,myTable){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=myTable.row( $(this).parents("tr")).data();
                        var IDNIVELGOB=data.IDNIVELGOB;
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
                                          url:base_url+"index.php/InformacionPresupuestal/EliminarNivelGobierno",
                                          type:"POST",
                                          data:{IDNIVELGOB:IDNIVELGOB},
                                          success:function(respuesta){
                                            //alert(respuesta);
                                            swal("Se eliminó corectamente.", "", "success");
                                            $('#dynamic-table-NivelGobierno').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet

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










