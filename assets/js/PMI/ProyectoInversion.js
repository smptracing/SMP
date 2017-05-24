 $(document).on("ready" ,function(){

                listaProyectoInversion();/*llamar proyecto de inversion*/
                 
            //Inicio cargar combo unidad ejecutora
             $("#btn-NuevoProyectoI").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaUnidadEjecutora();//para llenar el combo de agregar division funcional
                    
                    });
             //CARGAR DATOS EN COMBOBOX DE NATURALEZA DE INVERSION
              $("#cbxUnidadEjecutora").change(function(){//para cargar en agregar division funcionañ
                    listarNaturalezaInversion();
             });
              //FIN CARGAR DATOS EN COMBOBOX DE NATURALEZA DE INVERSION
               //CARGAR DATOS EN COMBOBOX DE TIPOLOGIA INVERSION
              $("#cbxNatI").change(function(){//para cargar en agregar division funcionañ
                    listarTipologiaInversion();
             });
              //FIN CARGAR DATOS EN COMBOBOX DE TIPOLOGIA INVERSION
             //CARGAR DATOS EN COMBOBOX DE TIPO INVERSION
              $("#cbxTipologiaInv").change(function(){//para cargar en agregar division funcionañ
                    listarTipoInversion();
             });
              //FIN CARGAR DATOS EN COMBOBOX DE TIPO INVERSION
              //CARGAR DATOS EN COMBOBOX DE GRUPO FUNCIONAL
              $("#cbxTipoInv").change(function(){//para cargar en agregar division funcionañ
                    listarGrupoFuncional();
             });
              //FIN CARGAR DATOS EN COMBOBOX DE GRUPO FUNCIONAL
              //CARGAR DATOS EN COMBOBOX DE NIVEL DE GOBIERNO
              $("#cbxGrupoFunc").change(function(){//para cargar en agregar division funcionañ
                    listarNivelGobierno();
             });
              //FIN CARGAR DATOS EN COMBOBOX DE DE NIVEL DE GOBIERNO
               //CARGAR DATOS EN COMBOBOX DE META PRESUPUESTAL
              $("#cbxNivelGob").change(function(){//para cargar en agregar division funcionañ
                    listarMetaPresupuestal();
             });
              //FIN CARGAR DATOS EN COMBOBOX DE META PRESUPUESTAL
              //CARGAR DATOS EN COMBOBOX DE PROGRAMA PRESUPUESTAL
              $("#cbxMetaPresupuestal").change(function(){//para cargar en agregar division funcionañ
                    listarProgramaPresupuestal();
             });
              //FIN CARGAR DATOS EN COMBOBOX DE PROGRAMA PRESUPUESTAL
                //OBTEiNER DATOS DEL CICLO DE INVERSION
              $("#distrito").change(function(){//para cargar en agregar division funcionañ
                    listarCicloInversion();
             });
              //FIN OBTENER DATOS DEL CICLO DE INVERSION
              //OBTENER DATOS DE FUENTE DE FINANCIAMIENTO
              $("#cbxEstadoCicloInv").change(function(){//para cargar en agregar division funcionañ
                    listarFuenteFinan();
             });
              //FIN OBTENER DATOS DE FUENTE DE FINANCIAMIENTO
               //OBTENER DATOS MODALIDAD DE EJECUCION
              $("#cbxFuenteFinanc").change(function(){//para cargar en agregar division funcionañ
                    listarModalidadEjec();
             });
              //FIN OBTENER DATOS MODALIDAD DE EJECUCIONO
              //TRAER DATOS EN UN COMBO DE UNIDAD EJECUTORA
                var listaUnidadEjecutora=function()
                {
                    html="";
                    $("#cbxUnidadEjecutora").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/UnidadE/GetUnidadE",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_ue"]+"> "+ registros[i]["nombre_ue"]+" </option>";   
                            };
                            $("#cbxUnidadEjecutora").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE UNIDAD EJECUTORA
          //TRAER DATOS EN UN COMBO DE NATURALEZA DE INVERSION
          //addñadir 
           var listarNaturalezaInversion=function()
                {
                    html="";
                    $("#cbxNatI").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/TipologiaInversion/get_NaturalezaInversion",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_naturaleza_inv"]+"> "+ registros[i]["nombre_naturaleza_inv"]+" </option>";   
                            };
                            $("#cbxNatI").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE NATURALEZA DE INVERSION
          //TRAER DATOS EN UN COMBO DE TIPOLOGIA DE INVERSION
           var listarTipologiaInversion=function()
                {
                    html="";
                    $("#cbxTipologiaInv").html(html); //nombre del selectpicker Tipologia de inversion
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/TipologiaInversion/get_TipologiaInversion",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_tipologia_inv"]+"> "+ registros[i]["nombre_tipologia_inv"]+" </option>";   
                            };
                            $("#cbxTipologiaInv").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE TIPOLOGIA DE INVERSION
            //TRAER DATOS EN UN COMBO DE TIPO DE INVERSION
           var listarTipoInversion=function()
                {
                    html="";
                    $("#cbxTipoInv").html(html); //nombre del selectpicker Tipologia de inversion
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/TipologiaInversion/get_TipoInversion",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_tipo_inversion"]+"> "+ registros[i]["nombre_tipo_inversion"]+" </option>";   
                            };
                            $("#cbxTipoInv").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE TIPO DE INVERSION
           //TRAER DATOS EN GRUPO FUNCIONAL
                var listarGrupoFuncional=function()
                {
                    html="";
                    $("#cbxGrupoFunc").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/GrupoFuncional/GetGrupoFuncional",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_grup_funcional"]+"> "+ registros[i]["nombre_grup_funcional"]+" </option>";   
                            };
                            $("#cbxGrupoFunc").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN GRUPO FUNCIONAL 
           //TRAER DATOS EN NIVEL DE GOBIERNO
                var listarNivelGobierno=function()
                {
                    html="";
                    $("#cbxNivelGob").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/NivelGobierno/get_NivelGobierno",
                        type:"POST",
                        success:function(respuesta){
                            alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_nivel_gob"]+"> "+ registros[i]["nombre_nivel_gob"]+" </option>";   
                            };
                            $("#cbxNivelGob").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS NIVEL DE GOBIERNO
             //TRAER DATOS DE META PRESUPUESTAL
                var listarMetaPresupuestal=function()
                {
                    html="";
                    $("#cbxMetaPresupuestal").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/MetaPresupuestal/GetMetaP",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_meta_pres"]+"> "+ registros[i]["nombre_meta_pres"]+" </option>";   
                            };
                            $("#cbxMetaPresupuestal").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS DE META PRESUPUESTAL
             //TRAER DATOS DE PROGRAMA PRESUPUESTAL
                var listarProgramaPresupuestal=function()
                {
                    html="";
                    $("#cbxProgramaPres").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/ProgramaPresupuestal/GetProgramaP",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_programa_pres"]+"> "+ registros[i]["nombre_programa_pres"]+" </option>";   
                            };
                            $("#cbxProgramaPres").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS DE PROGRAMA PRESUPUESTAL
          //TRAER DATOS EN UN COMBO DE CICLO DE INVERSION
                var listarCicloInversion=function()
                {
                    html="";
                    $("#cbxEstadoCicloInv").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/EstadoCicloInversion/get_EstadoCicloInversion",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_estado_ciclo"]+"> "+ registros[i]["nombre_estado_ciclo"]+" </option>";   
                            };
                            $("#cbxEstadoCicloInv").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE CICLO DE INVERSION
            //TRAER DATOS EN UN COMBO DE CICLO DE INVERSION
                var listarFuenteFinan=function()
                {
                    html="";
                    $("#cbxFuenteFinanc").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/InformacionPresupuestal/get_FuenteFinanciamiento",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_fuente_finan"]+"> "+ registros[i]["nombre_fuente_finan"]+" </option>";   
                            };
                            $("#cbxFuenteFinanc").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE CICLO DE INVERSION
          
            //TRAER DATOS EN UN COMBO DE MODALIDAD DE EJECUCION
                var listarModalidadEjec=function()
                {
                    html="";
                    $("#cbxModalidadEjec").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/ModalidadEjecucion/GetModalidadE",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_modalidad_ejec"]+"> "+ registros[i]["nombre_modalidad_ejec"]+" </option>";   
                            };
                            $("#cbxModalidadEjec").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE MODALIDAD DE EJECUCION
              //AGREGAR UNA PIP
                $("#form-addProyectoInversion").submit(function(event)
                {
                //  alert('hola');
                  event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/ProyectoInversion/AddProyecto",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                          alert(resp);
                         //swal("REGISTRADO!", resp, "success");
                         //$('#table-ProyectoInversion').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN DE AGREGAR PIP           
			});
			   //listaR proyeto de inversion*/
                var listaProyectoInversion=function()
                {
                    var table=$("#table-ProyectoInversion").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/ProyectoInversion/GetProyectoInversion",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                    {"data":"id_pi"},
                                    {"data":"nombre_pi"},
                                    {"data":"codigo_unico_pi"},
                                    {"data":"costo_pi"},
                                    {"data":"devengado_ac_pi"},
                                    {"data":"fecha_registro_pi"},
                                    {"data":"fecha_viabilidad_pi"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#'><i class='ace-icon fa fa-pencil  bigger-120'></i></button><button type='button' class='VerProyecto btn btn-success btn-xs' data-toggle='modal' data-target='#VerDetalleProyectoInversion'><i class='ace-icon fa fa-eye bigger-120'></i></button>"}
                                ],

                                "language":idioma_espanol
                    });              
                 ListaProyectoInversionData("#table-ProyectoInversion",table);  //obtener data de funcion para agregar  AGREGAR                             
                }

                /*fin listar proyecto de inversion*/
                var ListaProyectoInversionData=function(tbody,table){
                       $(tbody).on("click","button.VerProyecto",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        var Id_ProyectoInver=data.id_pi;
                        MostrarDetalleProyecto(Id_ProyectoInver);
                        /*var txt_codigofuncionM=$('#txt_codigofuncionM').val(data.codigo_funcion);
                        var txt_nombrefuncionM=$('#txt_nombrefuncionM').val(data.nombre_funcion);*/

                    });
                }
                var MostrarDetalleProyecto=function(Id_ProyectoInver){
                    event.preventDefault(); 
                    html="";
                    $("table-detalleProyectoInversion").html(html);
                    $.ajax({
                        "url":base_url +"index.php/ProyectoInversion/BuscarProyectoInversion",
                        type:"POST",
                        data:{Id_ProyectoInver:Id_ProyectoInver},
                        success:function(respuesta){
                         var registros = eval(respuesta);
                            html+="<thead> <tr> <th class='active'>DATOS DEL PROYECTOS DE INVERSIÓN</th>  <th class='active' colspan='5'>DETALLE </th> </tr></thead>"
                            for (var i = 0; i <registros.length;i++) {
                              html +="<tbody> <tr><th class='success'>CÓDIGO ÚNICO</th><th  colspan='5'>"+registros[i]["codigo_unico_pi"]+"</th></tr> <tr><th class='success'>PROYECTO DE INVERSIÓN</th><th  colspan='5'>"+registros[i]["nombre_pi"]+"</th></tr>";    
                              html +="<tr><th class='success'>COSTO</th><th  colspan='5'>"+registros[i]["costo_pi"]+"</th></tr> <tr><th class='success'>DEVENGADO</th><th  colspan='5'>"+registros[i]["devengado_ac_pi"]+"</th></tr>";
                              html +="<tr><th class='success'>FECHA  DE REGISTRO</th><th  colspan='5'>"+registros[i]["fecha_registro_pi"]+"</th></tr> <tr><th class='success'>FECHA DE VIABILIDAD</th><th  colspan='5'>"+registros[i]["fecha_viabilidad_pi"]+"</th></tr>";  
                              html+="<thead> <tr> <th class='active'>UNIDAD EJECUTORA</th>  <th class='active' colspan='5'>DETALLE </th> </tr></thead>";
                              html +="<tr><th class='success'>NOMBRE UNIDAD EJECUTORA</th><th  colspan='5'>"+registros[i]["nombre_ue"]+"</th></tr> <tr><th class='success'>NOMBRE</th><th  colspan='5'>"+registros[i]["nombre_ue"]+"</th></tr>";  
                              html+="<thead> <tr> <th class='active'>NATURALEZA DE INVERSIÓN</th>  <th class='active' colspan='5'>DETALLE </th> </tr></thead>";
                              html +="<tr><th class='success'>NATURALEZA DE INVERSIÓN</th><th  colspan='5'>"+registros[i]["nombre_naturaleza_inv"]+"</th></tr> <tr><th class='success'>NOMBRE</th><th  colspan='5'>"+registros[i]["nombre_naturaleza_inv"]+"</th></tr>";  

                              html +="</tbody>";
                            };    
                            $("#table-detalleProyectoInversion").html(html);
                        }
                    });

                }
                /*fin listar proyecto de inversion*/
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

        /* function listar()
					{
						alert("hola");
            event.preventDefault();
						$.ajax({
              "url":base_url+"index.php/ProyectoInversion/GetProyectoInversion",
							type:"POST",
							success:function(respuesta){
								alert(respuesta);
                console.log(respuesta);
							}
						});
					}*/
