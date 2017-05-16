 $(document).on("ready" ,function(){

                listaProyectoInversion();/*llamar proyecto de inversion*/
              
            //Inicio cargar combo unidad ejecutora
             $("#btn-NuevoProyectoI").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaProyectoInvCombo();//para llenar el combo de agregar division funcional
                    
                    });
              //TRAER DATOS EN UN COMBO DE RUBRO DE EJECUCION
                var listaProyectoInvCombo=function()
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
          //FIN TRAER DATOS EN UN COMBO DE RUBRO EJECUCION
            //fin cargar combo   unidad ejecutora
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
                         swal("REGISTRADO!", resp, "success");
                         $('#table-ProyectoInversion').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                        }
                    });
                });     
                //FIN DE AGREGAR PIP           
			});
			   //listra proyeto de inversion*/
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
                                    {"data":"nombre_ue"},
                                    {"data":"nombre_naturaleza_inv"},
                                    {"data":"nombre_tipologia_inv"},
                                    {"data":"nombre_tipo_inversion"},
                                    {"data":"codigo_grup_funcional"},
                                    {"data":"nombre_nivel_gob"},
                                    {"data":"nombre_meta_pres"},
                                    {"data":"nombre_programa_pres"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarFuncion'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>"}
                                ],

                                "language":idioma_espanol
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
