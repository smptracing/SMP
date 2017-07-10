 $(document).on("ready" ,function(){

              listaUnidadE();//LLAMAR AL METODO LISTAR UNIDAD EJECUTORA
              
               //AGREGAR UNA UNIDAD EJECUTORA
                $("#form-addUnidadE").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/UnidadE/AddUnidadE",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                            var registros = eval(resp);
                            for (var i = 0; i < registros.length; i++) {
                               if(registros[i]["VALOR"]==1){
                                    swal("",registros[i]["MENSAJE"], "success");
                                   $('#form-addUnidadE')[0].reset();
                                   $("#VentanaRegistraUnidadEjecutora").modal("hide");
                               }else{
                                      swal('',registros[i]["MENSAJE"],'error' )
                               }
                                /*swal("",  registros[i]["MENSAJE"], "success");*/
                            };
                        
                        $('#table-UnidadE').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 

                        }
                    });
                });     
                //FIN DE AGREGAR UNA UNIDAD EJECUTORA
			});

//-------------- MANTENIMIENTO UNIDAD EJECUTORA----------------------
/*LISTAR UNIDAD DE EJECUCION EN UN DATATABLE*/
                var listaUnidadE=function() 
                {
                    var table=$("#table-UnidadE").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/UnidadE/GetUnidadE",
                                    "method":"POST",
                                     "dataSrc":""
                               },
       //para llenado y busqueda por todo los campos
                                "columns":[
                                    {"data":"id_ue"},
                                    {"data":"nombre_ue"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarUnidadE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });  
                    UnidadEData("#table-UnidadE",table);//TRAER LA DATA DE UA UNIDAD EJECUTORA PARA ACTUALIZARLA
                }
/*FIN DE LISTAR UNIDAD DE EJECUCION EN UN DATATABLE*/

//ACTUALIZAR UNA UNIDAD EJECUTORA
                 $("#form-ActualizarUnidadE").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/UnidadE/UpdateUnidadE",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("MODIFICADO!", resp, "success");
                         $('#table-UnidadE').dataTable()._fnAjaxUpdate();
                        }

                    });

                });  
    //FIN ACTUALIZAR UNIDAD EJECUTORA

    // CAMPOS QUE SE ACTUALIZARAN DE LA UNIDAD EJECUTORA
        UnidadEData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_ue=$('#txt_IdUnidadEModif').val(data.id_ue);
                        var nombre_ue=$('#txt_NombreUnidadEU').val(data.nombre_ue);
                    });
                }
    // FIN DE CAMPOS QUE SE ACTUALIZARAN DE LA UNIDAD EJECUTORA

//-------------- FIN MANTENIMIENTO UNIDAD EJECUTORA---------------------