 $(document).on("ready" ,function(){
              
              listaModalidadE(); //LLAMAR AL METODO LISTAR MODALIDAD DE EJECUCION
              

                 //AGREGAR UN MODALIDAD DE EJECUCION
                $("#form-addModalidadE").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/ModalidadEjecucion/AddModalidadE",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("REGISTRADO!", resp, "success");
                         $('#table-ModalidadE').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN DE AGREGAR UNA MODALIDAD DE EJECUCION 
			});

//-------------- MANTENIMIENTO MODALIDAD DE EJECUCION--------------------------

/*LISTAR LAS MODALIDADES DE EJECUCION EN UN DATATABLE*/
                var listaModalidadE=function() 
                {
                    var table=$("#table-ModalidadE").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/ModalidadEjecucion/GetModalidadE",
                                    "method":"POST",
                                                                 "dataSrc":""
       },
       //para llenado y busqueda por todo los campos
                                "columns":[
                                    {"data":"id_modalidad_ejec"},
                                    {"data":"nombre_modalidad_ejec"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarModalidadE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });  
            ModalidadEData("#table-ModalidadE",table); //TRAER DATOS PARA ACTUALIZAR
                   
                }
/*FIN DE LISTAR MODALIDAD EJECUCION EN UN DATATABLE*/

  //ACTUALIZAR MODALIDAD DE EJECUCION
                 $("#form-ActualizarModalidadE").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/ModalidadEjecucion/UpdateModalidadE",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("MODIFICADO!", resp, "success");
                         $('#table-ModalidadE').dataTable()._fnAjaxUpdate();
                        }

                    });

                });  
     //FIN ACTUALIZAR MODALIDAD DE EJECUCION

          // CAMPOS QUE SE ACTUALIZARAN DE LA MODALIDAD DE EJECUCION
        ModalidadEData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_brecha=$('#txt_IdModalidadEModif').val(data.id_modalidad_ejec);
                        var nombre_brecha=$('#txt_NombreModalidadEU').val(data.nombre_modalidad_ejec);
                      
                    });
                }
          // FIN DE CAMPOS QUE SE ACTUALIZARAN DE LA MODALIDAD EJECUCION
//-------------- FIN MANTENIMIENTO MODALIDAD DE EJECUCION----------------------

