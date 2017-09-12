$(document).on("ready" ,function()
{
    FuncionCombo();
    listaProvinciaCombo();
    
    $("#btn_Nuevadivision").click(function()
    {
         listaFuncionCombo();
    });

    $('#listaFuncion').on('change', function() 
    {
        listaDivisionFuncionalCombo(null); 
    })
    $('#listaDivisionFuncional').on('change', function() 
    {
        listaGrupoFuncionalCombo(null);
    })
    $('#listaProvincia').on('change', function() 
    {
        listaDistritoCombo(null);
    })

    $("#btnBuscar").click(function()
    {
        listaProyectos();
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

        $.ajax(
        {
            url : base_url+"index.php/DivisionFuncional/UpdateDivisionFucion",
            type : $(this).attr('method'),
            data : $(this).serialize(),
            success : function(resp)
            {
                swal("",resp, "success");

                $('#table-DivisionF').dataTable()._fnAjaxUpdate();
                
                $('#VentanaUpdateDivisionF').modal('hide');
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

    /*Mostrar division funcional en base a la funcion*/
    var FuncionCombo=function()
    {
        var htmlTemp='';
        $("#listaFuncion").html(htmlTemp);
        paginaAjaxJSON(null, base_url +"index.php/Funcion/GetListaFuncion", "POST", null, function(objectJSON)
        {
            objectJSON=JSON.parse(objectJSON);
            var registros=eval(objectJSON);
            for(var i=0; i<registros.length; i++)
            {
                htmlTemp+='<option value="'+registros[i]['id_funcion']+'">'+registros[i]['codigo_funcion']+':'+registros[i]['nombre_funcion']+ '</option>';    
            };

            $("#listaFuncion").html(htmlTemp);
            $('.selectpicker').selectpicker('refresh'); 
        }, false, true);
    }


    /*Mostrar division funcional en base a la funcion*/
    var listaDivisionFuncionalCombo=function(valor)
    {
        var htmlTemp='';
        $("#listaDivisionFuncional").html(htmlTemp);
        var idFuncion = $("#listaFuncion").val(); 
        paginaAjaxJSON({ idFuncion : idFuncion }, base_url +"index.php/Funcion/GetDivisionFuncional", "POST", null, function(objectJSON)
        {
            objectJSON=JSON.parse(objectJSON);
            var registros=eval(objectJSON);
            for(var i=0; i<registros.length; i++)
            {
                htmlTemp+='<option value="'+registros[i]['id_div_funcional']+'">'+ registros[i]['codigo_div_funcional']+':'+registros[i]['nombre_div_funcional']+'</option>';   
            };

            $("#listaDivisionFuncional").html(htmlTemp);
            $('.selectpicker').selectpicker('refresh'); 
        }, false, true);
    }

    /*Mostrar grupo funcional en base a la division funcional*/
    var listaGrupoFuncionalCombo=function(valor)
    {
        var htmlTemp='';
        $("#listaGrupoFuncional").html(htmlTemp);
        var idDivisionFuncional = $("#listaDivisionFuncional").val(); 
        paginaAjaxJSON({ idDivisionFuncional : idDivisionFuncional }, base_url +"index.php/Funcion/GetGrupoFuncional", "POST", null, function(objectJSON)
        {
            objectJSON=JSON.parse(objectJSON);
            var registros=eval(objectJSON);
            for(var i=0; i<registros.length; i++)
            {
                htmlTemp+='<option value="'+registros[i]['id_grup_funcional']+'">'+ registros[i]['codigo_grup_funcional']+':'+registros[i]['nombre_grup_funcional']+'</option>';   
            };

            $("#listaGrupoFuncional").html(htmlTemp);
            $('.selectpicker').selectpicker('refresh'); 
        }, false, true);
    }

    /*Mostrar listado de provincias en un combobox*/
    var listaProvinciaCombo=function(valor)
    {
        var htmlTemp='<option value = "">Seleccionar Provincia</option>';
        $("#listaProvincia").html(htmlTemp);
        paginaAjaxJSON(null, base_url +"index.php/Funcion/GetProvincia", "POST", null, function(objectJSON)
        {
            objectJSON=JSON.parse(objectJSON);
            var registros=eval(objectJSON);
            for(var i=0; i<registros.length; i++)
            {
                htmlTemp+='<option value="'+registros[i]['provincia']+'">'+registros[i]['provincia']+'</option>';   
            };

            $("#listaProvincia").html(htmlTemp);
            $('.selectpicker').selectpicker('refresh'); 
        }, false, true);
    }

    /*Mostrar listado de distritos en base a la Provincia*/
    var listaDistritoCombo=function(valor)
    {
        var htmlTemp="<option value = ''>Seleccionar Distrito</option>";
        $("#listaDistrito").html(htmlTemp);
        var provincia = $("#listaProvincia").val(); 
        paginaAjaxJSON({ provincia : provincia }, base_url +"index.php/Funcion/GetDistrito", "POST", null, function(objectJSON)
        {
            objectJSON=JSON.parse(objectJSON);
            var registros=eval(objectJSON);
            for(var i=0; i<registros.length; i++)
            {
                htmlTemp+='<option value="'+registros[i]['distrito']+'">'+registros[i]['distrito']+' </option>';   
            };

            $("#listaDistrito").html(htmlTemp);
            $('.selectpicker').selectpicker('refresh'); 
        }, false, true);
    }

    /*Listar proyectos por distintos parametros*/
    var listaProyectos=function()
    {
        var idFuncion = $("#listaFuncion").val(); 
        var idDivisionFuncional = $("#listaDivisionFuncional").val();
        var idGrupoFuncional = $("#listaGrupoFuncional").val();
        var idProvincia = $("#listaProvincia").val();
        var idDistrito = $("#listaDistrito").val();
        var deFecha = $('#deFecha').val();
        var aFecha = $("#aFecha").val(); 
        //alert(deFecha);
        $.ajax({
            url: base_url +"index.php/Funcion/ProyectosPorCadenaFuncional",
            type: 'POST',
            cache: false,
            data:
            {
                idFuncion: idFuncion,
                idDivisionFuncional : idDivisionFuncional,
                idGrupoFuncional: idGrupoFuncional,
                idProvincia:idProvincia,
                idDistrito:idDistrito,
                deFecha:deFecha,
                aFecha:aFecha
            },
            beforeSend: function(xhr)
            {
                renderLoading();
            },
            success: function (data)
            {
                $('#divModalCargaAjax').hide();

                $('#dataTableFuncion').html(data);
            },
            error: function ()
            {
                $('#divModalCargaAjax').hide();

                alert("Ocurrio un error!");
            }
        });

    }


    var ValidarFechas=function()
    {
        var deFecha = $('#deFecha').val();
        var aFecha = $("#aFecha").val(); 
        if(deFecha!=null)
        {
            alert("Ingrese Fecha 2");

        }
        if(aFecha!=null)
        {
            alert("Ingrese Fecha 1")
        }
        //alert(deFecha);
    }