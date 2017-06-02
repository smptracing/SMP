 $(document).on("ready" ,function(){
              
              listaCarteraInversion(); //LLAMAR AL METODO LISTAR MODALIDAD DE EJECUCION
             //creacion de cartera //
 
                      $("#form-RegistraCarteraInv").submit(function(event)//AÑADIR NUEVA CARTERA
                       {
                            event.preventDefault();
                            var formData=new FormData($("#form-RegistraCarteraInv")[0]);
                            $.ajax({
                                type:"POST",
                                enctype: 'multipart/form-data',
                                url:base_url+"index.php/CarteraInversion/AddCartera",
                                data: formData,
                                cache: false,
                                contentType:false,
                                processData:false,
                                success:function(resp){
                                 swal("",resp, "success");
                                 $('#table-CarteraInv').dataTable()._fnAjaxUpdate();
                               }

                            });
                                   $('#form-RegistraCarteraInv')[0].reset();
                                   $("#VentanaRegistraCarteraInv").modal("hide");

                       });


            });

//-------------- MANTENIMIENTO MODALIDAD DE EJECUCION--------------------------

/*LISTAR CARTERA ACTUAL*/
         // TRAER DATOS DE LA CARTERA ACTUAL PARA SU PROGRAMACION
                /* listar y lista en tabla entidadr*/ 
                var listaCarteraInversion=function()
                {
                    var table=$("#table-CarteraInv").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/CarteraInversion/GetCarteraInversion",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_cartera"},
                                    {"data":"año_apertura_cartera"},
                                    {"data":"fecha_inicio_cartera"},
                                    {"data":"fecha_cierre_cartera"},
                                    {"data":"estado_cartera"},
                                    {"data":"numero_resolucion_cartera"},
                                    {"data":"url_resolucion_cartera"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-success btn-xs' data-toggle='modal' data-target='#VentanaVerCartera'><i class='ace-icon fa fa-eye bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol,
                                     responsive: {
                                        details: {
                                            display: $.fn.dataTable.Responsive.display.modal( {
                                                header: function ( row ) {
                                                    var data = row.data();
                                                    return 'Details for '+data[0]+' '+data[1];
                                                }
                                            } ),
                                            renderer: function ( api, rowIdx, columns ) {
                                                var data = $.map( columns, function ( col, i ) {
                                                    return '<tr>'+
                                                            '<td>'+col.title+':'+'</td> '+
                                                            '<td>'+col.data+'</td>'+
                                                        '</tr>';
                                                } ).join('');
                             
                                                return $('<table/>').append( data );
                                            }
                                        }
                                    }

                                     
                        }); 


                         $('#table-CarteraInv tbody').on('click', 'tr', function () {
                            var data = table.row( this ).data();
                            var txt_IdfuncionM=data.id_cartera;
                          
                        } );

                }
          //FIN TRAER DATOS DE LA CARTERA ACTUAL PARA SU PROGRAMACION 
/*FIN DE LISTAR MODALIDAD EJECUCION EN UN DATATABLE*/

//-------------- FIN MANTENIMIENTO MODALIDAD DE EJECUCION----------------------

