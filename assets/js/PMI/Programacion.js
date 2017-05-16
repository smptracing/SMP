 $(document).on("ready" ,function(){

                listaProyectoInversion();/*llamar proyecto de inversion*/
              
            //Inicio cargar combo cartera de inversion
             $("#btn-ProyectoInv").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listacarterainversion();//para llenar el combo de agregar cartera de inversion
                    
                    });
              //TRAER DATOS EN UN COMBO DE RUBRO DE EJECUCION
                var listacarterainversion=function()
                {
                    html="";
                    $("#cbxCartera").html(html); //nombre del selectpicker UNIDAD EJECUTORA
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
                            $("#cbxCartera").html(html);//
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
