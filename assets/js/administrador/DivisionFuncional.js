 $(document).on("ready" ,function(){
                //alert("sdas");
               //lista();
            //division funcional

               listarDivisionF();//para mostrar las divisiones funcionanes
              $("#btn_Nuevadivision").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                     listaFuncionCombo();//para llenar el combo de agregar division funcional
                });

    $("#form-AddDivisionFuncion").submit(function(event)//para añadir nuevo division funcional
    {
        event.preventDefault();

        $.ajax(
        {
            url:base_url+"index.php/DivisionFuncional/AddDivisionFucion",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp)
            {
                swal("",resp, "success");

                $('#table-DivisionF').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion

                $('#VentanaRegistraDivisionF').modal('hide');
            }
        });
    });

                 $("#form-UpdateDivisionFuncion").submit(function(event)//para modificar la  division funcional
                  {
                      event.preventDefault();
                      $.ajax({
                          url:base_url+"index.php/DivisionFuncional/UpdateDivisionFucion",
                          type:$(this).attr('method'),
                          data:$(this).serialize(),
                          success:function(resp){
                           swal("",resp, "success");
                          $('#table-DivisionF').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion   
                           //listaSectorCombo();//llamado para la recarga al añadir un nuevo secto    

                         }
                      });
                  });
			});
    /*listra funcion*/
    var listaFuncionCombo=function(valor)//COMO CON LAS FUNCIONES PARA AGREGAR DIVIVISION FUNCIONAL
    {
        event.preventDefault(); 

        var htmlTemp="";

        $("#listaFuncionC").html(htmlTemp);

        $.ajax(
        {
            "url" : base_url +"index.php/Funcion/GetFuncion",
            type : "POST",
            success : function(respuesta)
            {
                var registros=eval(respuesta);

                for(var i=0; i<registros.length; i++)
                {
                    htmlTemp+="<option value="+registros[i]["id_funcion"]+"> "+ registros[i]["codigo_funcion"]+": "+registros[i]["nombre_funcion"]+" </option>";   
                };

                $("#listaFuncionC").html(htmlTemp);//para modificar las entidades
                $("#listaFuncionCM").html(htmlTemp);//para modificar las entidades 
                $('select[name=listaFuncionCM]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                $('select[name=listaFuncionCM]').change();

                $('.selectpicker').selectpicker('refresh'); 
            }
        });
    }
    /*fin listar funcion*/
               


    /* listar y lista en tabla entidad*/ 
    var listarDivisionF=function()
    {
        var table=$("#table-DivisionF").DataTable(
        {
            "processing" : true,
            "serverSide" : false,
            "destroy" : true,
            "language" : idioma_espanol,
            "ajax" :
            {
                "url" : base_url+"index.php/DivisionFuncional/GetDivisionFuncional",
                "method" : "POST",
                "dataSrc" : ""
            },
            "columns" : [
            { "data" : "id_div_funcional","visible" : false },
            { "data" : "id_funcion","visible" : false },
            { "data" : "nombre_funcion" },
            { "data" : "codigo_div_funcional" },
            { "data" : "nombre_div_funcional" },
            { "defaultContent" : "<button type='button'  class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaUpdateDivisionF'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>" }]
        });

        DivisionFuncionData("#table-DivisionF", table);  //obtener data de la division funcional para agregar  AGREGAR                 
    }

    var  DivisionFuncionData=function(tbody, table)
    {
        $(tbody).on("click","button.editar",function()
        {
            var data=table.row( $(this).parents("tr")).data();
            var id_funcion=data.id_funcion;
            var id_DfuncionalM=$('#id_DfuncionalM').val(data.id_div_funcional);
            var txt_CodigoDfuncionalM=$('#txt_CodigoDfuncionalM').val(data.codigo_div_funcional);
            var txt_Nombre_DFuncionalM=$('#txt_Nombre_DFuncionalM').val(data.nombre_div_funcional);

            listaFuncionCombo(id_funcion);//para agregar funcion selecionada mandamos parametro
        });
    }

                /*fin crea tabla division funcional*/ 
                /*crear tabla dinamica servicio publico asociado */

              
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

        /* function lista()
					{
						event.preventDefault();
						$.ajax({
              "url": base_url+"index.php/MFuncion/GetGrupoFuncional",
							type:"POST",
							success:function(respuesta){
								alert(respuesta);
							

							}
						});
					}*/
