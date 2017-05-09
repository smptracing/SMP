 $(document).on("ready" ,function(){

                listaBrecha();//  LLamar al metodo para listar las brechas
                listaIndicador(); //  LLamar al metodo para listar indicadores
                listaBrechaIndicador(); //  LLamar al metodo para listar las brechas-indicadores

             //Inicio cargar combo servicio public
            $("#btn-NuevaBrecha").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaSerPubAsocCombo();//para llenar el combo de servicio publico asociado
                    
                    });
             
            //fin cargar combo  servicio public                
            //Inicio cargar combo brecha

             $("#btn-NuevoBrechaIndicador").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaBrechaCombo();//para llenar el combo de brecha 
                    
                    });
             
            //fin cargar combo  brecha
            // cargar combo   de indicador en brecha-indicador
             $("#cbxNombrebrecha").change(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaIndicadorCombo();//para llenar el combo de agregar indicador
                    
                    });
             //Fin cargar combo   de indicador en brecha-indicador
                //AGREGAR UNA NUEVA BRECHA
                $("#form-addBrecha").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MantenimientoBrecha/AddBrecha",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("REGISTRADO!", resp, "success");
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
                         swal("REGISTRADO!", resp, "success");
                          $('#table-Indicador').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN AGREGAR UN INDICADOR 
                  //AGREGAR UNA NUEVA BRECHA-INDICADOR
                $("#form-addBrechaIndicador").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/MantenimientoBrecha/AddBrechaIndicador",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("REGISTRADO!", resp, "success");
                        //  $('#table-brechaindicador').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN AGREGAR UNA NUEVA BRECHA-INDICADOR 
			});

//-------------------------MANTENIMIENTO DE BRECHAS ----------------------------
   
//TRAER DATOS EN UN COMBO DE SERVICIOS PUBLICO ASOCIADO
                var listaSerPubAsocCombo=function(id_serv_pub_asoc) //PARA RECIR  PARAMETRO PARA MANTENER VALOR DEL CAMBO
                {
                    html="";
                    $("#cbxServPubAsoc").html(html); //nombre del selectpicker RUBRO DE EJECUCION
                    $("#cbxSerPubAsocModificar").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/MSectorEntidadSpu/GetServicioAsociado",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_serv_pub_asoc"]+"> "+ registros[i]["nombre_serv_pub_asoc"]+" </option>";   
                            };
                            $("#cbxServPubAsoc").html(html);//
                            //MODIFICAR 
                            $("#cbxSerPubAsocModificar").html(html);
                            $('select[name=cbxSerPubAsocModificar]').val(id_serv_pub_asoc) // VALOR DEL COMBO SELECCIONADO
                             $('select[name=cbxSerPubAsocModificar]').change();
                             //FIN MODIFICAR
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE RUBRO EJECUCION
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
                                    {"data":"id_serv_pub_asoc"},
                                    {"data":"nombre_serv_pub_asoc"}, //DATO DEL SERVICIO PUB ASOCIADO PARA ENVIAR DATO AL COMBO ACTUALIZAR Y SE MANTENGA EL VALOR
                                    {"data":"nombre_brecha"},
                                    {"data":"desc_brecha"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarBrecha'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
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
                         swal("ACTUALIZADO!", resp, "success");
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
                        var id_serv_pub_asoc=data.id_serv_pub_asoc;
                        var nombre_brecha=$('#txt_NombreBrechaU').val(data.nombre_brecha);
                        var desc_brecha=$('#txtArea_DescBrechaU').val(data.desc_brecha);
                        listaSerPubAsocCombo(id_serv_pub_asoc);//llamar al evento de combo box para actualizar 
               
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
                        swal({
                                title: "Esta seguro que desea eliminar la brecha?",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "SI,ELIMINAR",
                                closeOnConfirm: false
                              },
                              function(){
                        $.ajax({
                        url:base_url+"index.php/MantenimientoBrecha/DeleteBrecha",
                        type:"POST",
                        data:{id_brecha:id_brecha},
                        success:function(respuesta)
                        {
                           swal("ELIMINADO!", "Se elimino correctamente la brecha.", "success");
                          $('#table-brecha').dataTable()._fnAjaxUpdate();
                        }//para actualizar mi datatablet datatablet
                    });
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
                        url:base_url+"index.php/MantenimientoBrecha/UpdateIndicador",
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

           /*listar las brechas-indicador en el datatable*/
                var listaBrechaIndicador=function() 
                {
                    var table=$("#table-brechaindicador").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url +"index.php/MantenimientoBrecha/GetBrechaIndicador",
                                    "method":"POST",
                                                                 "dataSrc":""
       },
                                "columns":[
                                    {"data":"nombre_brecha"},
                                    {"data":"nombre_indicador"},
                                    {"data":"fecha_indicador"}, 
                                    {"data":"valor_indicador"},
                                    {"data":"linea_base_indicador"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarBrechaIndicador'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });  
                       
                }
   /*fin de listar las brechas-indicador en el datatable*/
//-----------------------FIN MANTENIMIENTO DE INDICADOR ----------------------------