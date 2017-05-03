 $(document).on("ready" ,function(){
                
                listaBrecha();//  LLamar al metodo para listar las brechas
                listaIndicador();
                listaIndicadorCombo();

            //Inicio cargar combo
             $("#btn-NuevoBrechaIndicador").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaBrechaCombo();//para llenar el combo de agregar division funcional
                    
                    });

            //fin cargar combo   
                //AGREGAR UNA NUEVA BRECHA
                $("#form-addBrecha").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MantenimientoBrecha/AddBrecha",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         alert(resp);
                          $('#table-brecha').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN AGREGAR UNA NUEVA BRECHA   

                //AGREGAR UN INDICADOR
                $("#form-addIndicador").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MantenimientoBrecha/AddIndicador",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         alert(resp);
                        //  $('#table-Indicador').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN AGREGAR UN INDICADOR 
              
			});

//-------------------------MANTENIMIENTO DE BRECHAS ----------------------------
   /*listar las brechas en el datatable*/
                var listaBrecha=function() 
                {
                    var table=$("#table-brecha").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
                                    "method":"POST",
                                                                 "dataSrc":""
       },
                                "columns":[
                                    {"data":"id_brecha"},
                                    {"data":"nombre_brecha"},
                                    {"data":"desc_brecha"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarBrecha'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });  
                    BrechaData("#table-brecha",table); //TRAER LA DATA DE LAS BRECHAS PARA ACTUALIZAR
                    EliminarBrechaLista("#table-brecha",table);//TRAER LA DATA DE LAS BRECHAS PARA ELIMINAR             
                }
   /*fin de listar las brechas en el datatable*/

              //ACTUALIZAR UNA BRECHA
                 $("#form-ActualizarBrecha").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MantenimientoBrecha/UpdateBrecha",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         alert(resp);
                         $('#table-brecha').dataTable()._fnAjaxUpdate();
                        }

                    });

                });  
            //FIN ACTUALIZAR UNA BRECHA

          // CAMPOS QUE SE ACTUALIZARAN DE LAS BRECHAS
                var BrechaData=function(tbody,table){
                    $(tbody).on("click","button.editar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_brecha=$('#txt_IdBrechaModif').val(data.id_brecha);
                        var nombre_brecha=$('#txt_NombreBrechaU').val(data.nombre_brecha);
                        var desc_brecha=$('#txtArea_DescBrechaU').val(data.desc_brecha);
                    });
                }
          // FIN DE CAMPOS QUE SE ACTUALIZARAN DE LAS BRECHAS


          //TRAER DATOS EN UN COMBO DE BRECHA
                var listaBrechaCombo=function()//COMO CON LAS FUNCIONES PARA AGREGAR  EN EL FORMULARIO BRECHA INDICADOR
                {
                    html="";
                    $("#cbxNombrebrecha").html(html); //nombre del selectpicker brecha
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_brecha"]+"> "+ registros[i]["nombre_brecha"]+" </option>";   
                            };
                            $("#cbxNombrebrecha").html(html);//
                           // $("#cbxNombreIndicador").html(html);//para modificar las entidades
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE BRECHA
  //ELIMINAR UNA BRECHA 
            var EliminarBrechaLista=function(tbody,table){
                  $(tbody).on("click","button.eliminar",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var id_brecha=data.id_brecha;
                        $.ajax({
                        url:base_url+"index.php/MantenimientoBrecha/DeleteBrecha",
                        type:"POST",
                        data:{id_brecha:id_brecha},
                        success:function(respuesta)
                        {
                          alert("Se elimino la brecha");
                          $('#table-brecha').dataTable()._fnAjaxUpdate();
                        }//para actualizar mi datatablet datatablet
                    });
                  });
              }

  //FIN ELIMINAR UNA BRECHA 

/* //Manda datos en consola de la tabla brecha
        function lista()
					{
           event.preventDefault();
						$.ajax({
              "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
							type:"POST",
							success:function(respuesta)
              {
								
               console.log(respuesta);
							}
						});
					}
*///fin datos en consola de la tabla brecha

//-------------------------FIN MANTENIMIENTO DE BRECHAS ----------------------------

//-------------------------MANTENIMIENTO DE INDICADOR ------------------------------

   /*listar los indicadores en el datatable*/
                var listaIndicador=function() 
                {
                    var table=$("#table-Indicador").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/MantenimientoBrecha/GetIndicador",
                                    "method":"POST",
                                    "dataSrc":""
                                 },
                                "columns":[
                                    {"data":"id_indicador"},
                                    {"data":"nombre_indicador"},
                                    {"data":"definicion_indicador"},
                                     {"data":"unidad_medida_indicador"},
                                   {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarIndicador'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
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
                        url:base_url+"index.php/MantenimientoBrecha/UpdateIndicador",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                         alert(resp);
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


           //TRAER DATOS EN UN COMBO DE BRECHA
                var listaIndicadorCombo=function()//COMO CON LAS FUNCIONES PARA AGREGAR  EN EL FORMULARIO BRECHA INDICADOR
                {
                    html="";
                    $("#cbxNombreIndicador").html(html); //nombre del selectpicker brecha
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/MantenimientoBrecha/GetIndicador",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_indicador"]+"> "+ registros[i]["nombre_indicador"]+" </option>";   
                            };
                            $("#cbxNombreIndicador").html(html);//
                           // $("#cbxNombreIndicador").html(html);//para modificar las entidades
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE BRECHA
//-----------------------FIN MANTENIMIENTO DE INDICADOR ----------------------------