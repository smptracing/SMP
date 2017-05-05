 $(document).on("ready" ,function(){
                
            //Inicio cargar combo ede rubro de ejecucion
             $("#btn-NuevoProyectoI").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaProyectoInvCombo();//para llenar el combo de agregar division funcional
                    
                    });

            //fin cargar combo   de rubro de ejecucion

            // cargar combo   de unidad ejecutora
             $("#cbxRubroEjecucion").change(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaUnidadECombo();//para llenar el combo de agregar division funcional
                    
                    });
             //Fin cargar unidad ejecutora

                  // cargar combo  naturaleza de inversion
             $("#cbxUnidadEjecutora").change(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaNaturalezaInvcombo();//para llenar el combo de agregar division funcional
                    
                    });
             //Fin cargar naturaleza de inversion

                   // cargar combo  tipologia de inversion
             $("#cbxNaturalezaInv").change(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                        //alert('hola');
                     listaTipologiaInv();
                    
                    });
             //Fin cargar tipologia de inversion
              
			});

          //TRAER DATOS EN UN COMBO DE RUBRO DE EJECUCION
                var listaProyectoInvCombo=function()
                {
                    html="";
                    $("#cbxRubroEjecucion").html(html); //nombre del selectpicker RUBRO DE EJECUCION
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/MRubroEjecucion/GetRubroE",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_rubro_ejecucion"]+"> "+ registros[i]["nombre_rubro_ejec"]+" </option>";   
                            };
                            $("#cbxRubroEjecucion").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE RUBRO EJECUCION

          //TRAER DATOS EN UN COMBO DE UNIDAD EJECUTORA
                var listaUnidadECombo=function()
                {
                    html="";
                    $("#cbxUnidadEjecutora").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/MRubroEjecucion/GetUnidadE",
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
                var  listaNaturalezaInvcombo=function()
                {
                    html="";
                    $("#cbxNaturalezaInv").html(html); //nombre del selectpicker RUBRO DE EJECUCION
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/pip/get_NaturalezaInversion",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["IDNATURALEZA"]+"> "+ registros[i]["NOMBRENATURALEZA"]+" </option>";   
                            };
                            $("#cbxNaturalezaInv").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATOS EN UN COMBO DE NATURALEZA DE INVERSION


          