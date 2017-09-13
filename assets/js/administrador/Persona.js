$(document).on("ready" ,function()
{
	listarpersona();//para mostrar lista de las personas
	
	$("#btn_nuevoPersonal").click(function()//para que cargue el como una vez echo click sino repetira datos
	{
		listarOficina();
	});

	$("#form-addPersonal").submit(function(event)//para añadir nuevo division Personal
	{
		event.preventDefault();

		$.ajax(
		{
			url : base_url+"index.php/Personal/AddPersonal",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				swal("", resp, "success");
				
				$('#table-Personal').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   Persona   
				
				formReset();

				$('#VentanaRegistraPersonal').modal('hide');
			}
		});
	});

	//limpiar campos
	function formReset()
	{
		document.getElementById("form-addPersonal").reset();
		document.getElementById("form-UpdatePersonal").reset();
	}

	$("#form-UpdatePersonal").submit(function(event)//para modificar la  division Personal
	{
		event.preventDefault();

		$.ajax(
		{
			url : base_url+"index.php/Personal/UpdatePersonal",
			type : $(this).attr('method'),
			data : $(this).serialize(),
			success : function(resp)
			{
				swal("", resp, "success");
				
				$('#table-Personal').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   Persona   
				
				formReset();

				$('#VentanaModificarPersonal').modal('hide');
			}
		});
	});
});

         /*listra Persona*/
                var listaPersonaCombo=function(valor)//COMO CON LAS PersonaES PARA AGREGAR DIVIVISION Personal
                {
                    html="";
                    $("#listaPersonaC").html(html); 
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/Personal/GetPersona",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_Persona"]+"> "+ registros[i]["codigo_Persona"]+": "+registros[i]["nombre_Persona"]+" </option>";   
                            };
                            $("#listaPersonaC").html(html);//para modificar las entidades

                            $("#listaPersonaCM").html(html);//para modificar las entidades 
                            $('select[name=listaPersonaCM]').val(valor);//PARA AGREGAR UN COMBO PSELECIONADO
                            $('select[name=listaPersonaCM]').change();

                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
                /*fin listar Persona*/
               


	/* listar y lista en tabla entidad*/ 
	var listarpersona=function()
	{
		var table=$("#table-Personal").DataTable(
		{
			"processing" : true,
			"serverSide" : true,
			"destroy" : true,
      "language" : idioma_espanol,
			"ajax" :
			{
				"url" : base_url+"index.php/personal/GetPersonal",
				"method" : "POST",
				"dataSrc" : "data"
			},
			"columns" : [
				{ "data" : "dni" },
				{ "data" : "apellido_p" },
				{ "data" : "apellido_m" },
				{ "data" : "nombres" },
				{ "data" : "direccion" },
				{ "data" : "grado_academico" },
				{ "data" : "especialidad" },
				{ "defaultContent" : "<button type='button'  class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarPersonal'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>" }]
		});

		$('#table-Personal_filter input').unbind();

		$('#table-Personal_filter input').bind('keyup', function(e)
		{
			if(e.keyCode==13)
			{
				table.search(this.value).draw();
			}
		});

		personalData("#table-Personal", table);  //obtener data de la division Personal para agregar  AGREGAR                 
	}

	var  personalData=function(tbody,table)
	{
		$(tbody).on("click", "button.editar", function()
		{
			var data=table.row( $(this).parents("tr")).data();
			var id_oficina=data.id_oficina;
			var txt_idpersonam=$('#txt_idpersonam').val(data.id_persona);
			var txt_nombrepersonalm=$('#txt_nombrepersonalm').val(data.nombres);
			var txt_apellidopaternom=$('#txt_apellidopaternom').val(data.apellido_p);
			var txt_apellidomaternom=$('#txt_apellidomaternom').val(data.apellido_m);
			var txt_dnim=$('#txt_dnim').val(data.dni);
			var txt_direccionm=$('#txt_direccionm').val(data.direccion);
			var txt_telefonom=$('#txt_telefonom').val(data.telefonos);
			var txt_correom=$('#txt_correom').val(data.correo);
			var txt_gradoacademicom=$('#txt_gradoacademicom').val(data.grado_academico);
			var txt_especialidadm=$('#txt_especialidadm').val(data.especialidad);
			var date_fechanacm=$('#date_fechanacm').val(data.date_fechanacm);

			listarOficina(id_oficina);
		});

	}

	var listarOficina=function(id_oficina)
	{
		event.preventDefault(); 

		html="";

		$("#Cbx_Oficina").html(html); 

		$.ajax(
		{
			"url" : base_url+"index.php/Oficina/GetOficina",
			"type" : "POST",
			success : function(respuesta3)
			{
				var registros = eval(respuesta3);

				for(var i=0; i<registros.length; i++)
				{
					html +="<option  value="+registros[i]["id_oficina"]+"> "+registros[i]["denom_oficina"]+" </option>";   
				}

				$("#Cbx_Oficina").html(html);
				$("#Cbx_Oficinas").html(html);
				$('select[name=Cbx_Oficinas]').val(id_oficina);//PARA AGREGAR UN COMBO PSELECIONADO
				$('select[name=Cbx_Oficinas]').change();
				$('.selectpicker').selectpicker('refresh'); 
			}
		});
	}





                /*fin crea tabla division Personal*/ 
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
              "url": base_url+"index.php/MPersona/GetGrupoPersonal",
              type:"POST",
              success:function(respuesta){
                alert(respuesta);
              

              }
            });
          }*/
