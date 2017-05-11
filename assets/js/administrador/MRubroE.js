 $(document).on("ready" ,function(){
              
              listaRubroE(); //LLAMAR AL METODO LISTAR RUBROS DE EJECUCION
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
                                    {"data":"id_rubro_ejec"},
                                    {"data":"nombre_rubro_ejec"},
                                    {"data":"descripcion_rubro_ejec"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarRubroE'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
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



       


