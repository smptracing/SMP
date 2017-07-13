 $(document).on("ready" ,function(){
          listaProgramaP();
              //LLAMAR AL METODO PROGRAMA PRESUPUESTAL
                //AGREGAR UN PROGRAMA PRESUPUESTAL
                $("#form-addProgramaP").submit(function(event)
                {
                //  alert('hola');
                  event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/ProgramaPresupuestal/AddProgramaP",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         swal("REGISTRADO!", resp, "success");
                         $('#table-ProgramaPresupuestal').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN DE AGREGAR PROGRAMA PRESUPUESTAL
			});

//-------------- MANTENIMIENTO DE PROGRAMA  PRESUPUESTAL----------------------
/*LISTAR LOS RUBROS DE EJECUION EN UN DATATABLE*/
                var listaProgramaP=function() 
                {
                    var table=$("#table-ProgramaPresupuestal").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/ProgramaPresupuestal/GetProgramaP",
                                    "method":"POST",
                                     "dataSrc":""
                                    },
       //para llenado y busqueda por todo los campos
                                "columns":[
                                    {"data":"id_programa_pres"},
                                    {"data":"nombre_programa_pres"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarProgramaP'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });  
                    ProgramaPData("#table-ProgramaPresupuestal",table); //TRAER LA DATA RUBRO DE EJECUCION PARA ACTUALIZARLA
                }
/*FIN DE LISTAR LOS RUBROS DE EJECUION EN UN DATATABLE*/
  //ACTUALIZAR UN RUBRO DE EJECUCION
                 $("#form-ActualizarProgramaP").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/ProgramaPresupuestal/UpdateProgramaP",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         swal("MODIFICADO!", resp, "success");
                         $('#table-ProgramaPresupuestal').dataTable()._fnAjaxUpdate();
                        }

                    });

                });  
    //FIN ACTUALIZAR UN RUBRO DE EJECUCION

    // CAMPOS QUE SE ACTUALIZARAN EN EL RUBRO DE EJECUCION
        ProgramaPData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_programa_pres=$('#txt_IdProgramaPModif').val(data.id_programa_pres);
                        var nombre_programa_pres=$('#txt_NombreProgramaPU').val(data.nombre_programa_pres);
                    });
                }
    // FIN DE CAMPOS QUE SE ACTUALIZARAN EN EL RUBRO DE EJECUCION
//-------------- FIN MANTENIMIENTO DE PROGRAMA PRESUPUESTAL----------------------

       


