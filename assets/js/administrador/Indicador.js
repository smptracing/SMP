 $(document).on("ready" ,function(){

              
                listaIndicador(); //  LLamar al metodo para listar indicadores
                //AGREGAR UN INDICADOR
                $("#form-addIndicador").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/Indicador/AddIndicador",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         swal("REGISTRADO!", resp, "success");
                          $('#table-Indicador').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN AGREGAR UN INDICADOR 
			});
//-------------------------MANTENIMIENTO DE INDICADOR ------------------------------

   /*listar los indicadores en el datatable*/
                var listaIndicador=function() 
                {
                    var table=$("#table-Indicador").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/Indicador/GetIndicador",
                                    "method":"POST",
                                    "dataSrc":""
                                 },
                                "columns":[
                                    {"data":"id_indicador"},
                                    {"data":"nombre_indicador"},
                                    {"data":"definicion_indicador"},
                                     {"data":"unidad_medida_indicador"},
                                   {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarIndicador'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });  
                    IndicadorData("#table-Indicador",table); //TRAER LA DATA DEL INDICADOR PARA ACTUALIZARLA                           
                }
   /*fin de listar indicadores en el datatable*/

   //ACTUALIZAR UN INDICADOR
                 $("#form-ActualizarIndicador").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/Indicador/UpdateIndicador",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         swal("ACTUALIZADO!", resp, "success");
                         $('#table-Indicador').dataTable()._fnAjaxUpdate();
                        }

                    });

                });  
            //FIN ACTUALIZAR UN INDICADOR

          // CAMPOS QUE SE ACTUALIZARAN DE INDICADOR
                var IndicadorData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_indicador=$('#txt_IdIndicadorModif').val(data.id_indicador);
                        var nombre_indicador=$('#txt_NombreIndicadorU').val(data.nombre_indicador);
                        var definicion_indicador=$('#txtArea_DefIndicadorU').val(data.definicion_indicador);
                        var unidad_medida_indicador=$('#txt_UnidadMedidaU').val(data.unidad_medida_indicador);
                    });
                }
          // FIN DE CAMPOS QUE SE ACTUALIZARAN DEL INDICADOR
        
//-----------------------FIN MANTENIMIENTO DE INDICADOR ----------------------------