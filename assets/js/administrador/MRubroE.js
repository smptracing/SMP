 $(document).on("ready" ,function(){
              
              listaRubroE(); //LLAMAR AL METODO LISTAR RUBROS DE EJECUCION
              listaModalidadE(); //LLAMAR AL METODO LISTAR MODALIDAD DE EJECUCION
              listaUnidadE();//LLAMAR AL METODO LISTAR UNIDAD EJECUTORA
                //AGREGAR UN RUBRO DE EJECUCION
                $("#form-addRubroE").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MRubroEjecucion/AddRubroE",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         swal("REGISTRADO!", resp, "success");
                         $('#table-Rubro').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN DE AGREGAR UN RUBRO DE EJECUCION 

                 //AGREGAR UN MODALIDAD DE EJECUCION
                $("#form-addModalidadE").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MRubroEjecucion/AddModalidadE",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("REGISTRADO!", resp, "success");
                         $('#table-ModalidadE').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN DE AGREGAR UNA MODALIDAD DE EJECUCION 
              
               //AGREGAR UNA UNIDAD EJECUTORA
                $("#form-addUnidadE").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MRubroEjecucion/AddUnidadE",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("REGISTRADO!", resp, "success");
                        $('#table-UnidadE').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 

                        }
                    });
                });     
                //FIN DE AGREGAR UNA UNIDAD EJECUTORA
			});

//-------------- MANTENIMIENTO DE RUBRO DE  EJECUCION----------------------
/*LISTAR LOS RUBROS DE EJECUION EN UN DATATABLE*/
                var listaRubroE=function() 
                {
                    var table=$("#table-Rubro").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/MRubroEjecucion/GetRubroE",
                                    "method":"POST",
                                     "dataSrc":""
                                    },
       //para llenado y busqueda por todo los campos
                                "columns":[
                                    {"data":"id_rubro_ejecucion"},
                                    {"data":"nombre_rubro_ejec"},
                                    {"data":"descripcion_rubro_ejec"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarRubroE'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });  
                    RubroEData("#table-Rubro",table); //TRAER LA DATA RUBRO DE EJECUCION PARA ACTUALIZARLA
                }
/*FIN DE LISTAR LOS RUBROS DE EJECUION EN UN DATATABLE*/


  //ACTUALIZAR UN RUBRO DE EJECUCION
                 $("#form-ActualizarRubroE").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MRubroEjecucion/UpdateRubroE",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         swal("MODIFICADO!", resp, "success");
                         $('#table-Rubro').dataTable()._fnAjaxUpdate();
                        }

                    });

                });  
    //FIN ACTUALIZAR UN RUBRO DE EJECUCION

    // CAMPOS QUE SE ACTUALIZARAN EN EL RUBRO DE EJECUCION
        RubroEData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        console.log(data);
                        var id_brecha=$('#txt_IdRubroEModif').val(data.id_rubro_ejecucion);
                        var nombre_brecha=$('#txt_NombreRubroEU').val(data.nombre_rubro_ejec);
                        var desc_brecha=$('#txtArea_DescRubroEU').val(data.descripcion_rubro_ejec);
                   
                    });
                }
    // FIN DE CAMPOS QUE SE ACTUALIZARAN EN EL RUBRO DE EJECUCION
//-------------- FIN MANTENIMIENTO DE RUBRO DE  EJECUCION----------------------

//-------------- MANTENIMIENTO MODALIDAD DE EJECUCION--------------------------

/*LISTAR LAS MODALIDADES DE EJECUCION EN UN DATATABLE*/
                var listaModalidadE=function() 
                {
                    var table=$("#table-ModalidadE").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/MRubroEjecucion/GetModalidadE",
                                    "method":"POST",
                                                                 "dataSrc":""
       },
       //para llenado y busqueda por todo los campos
                                "columns":[
                                    {"data":"id_modalidad_ejec"},
                                    {"data":"nombre_modalidad_ejec"},
                                    {"data":"desc_modalidad_ejec"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarModalidadE'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
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
                        url:base_url+"index.php/MRubroEjecucion/UpdateModalidadE",
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
                        var desc_brecha=$('#txtArea_DescModalidadEU').val(data.desc_modalidad_ejec);
                    });
                }
          // FIN DE CAMPOS QUE SE ACTUALIZARAN DE LA MODALIDAD EJECUCION
//-------------- FIN MANTENIMIENTO MODALIDAD DE EJECUCION----------------------


//-------------- MANTENIMIENTO UNIDAD EJECUTORA----------------------
/*LISTAR UNIDAD DE EJECUCION EN UN DATATABLE*/
                var listaUnidadE=function() 
                {
                    var table=$("#table-UnidadE").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/MRubroEjecucion/GetUnidadE",
                                    "method":"POST",
                                                                 "dataSrc":""
                    },
       //para llenado y busqueda por todo los campos
                                "columns":[
                                    {"data":"id_ue"},
                                    {"data":"nombre_ue"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarUnidadE'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
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
                        url:base_url+"index.php/MRubroEjecucion/UpdateUnidadE",
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