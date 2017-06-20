function EstaProyProvincia() {
    
    //dat del proyecto
    var provincias=new Array();
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/PrincipalPmi/EstadisticaPipProvinc",
                        type:"POST",
                        success:function(respuesta){
                         var registros = eval(respuesta);
                         var sum=0;
                            for (var i = 0; i <registros.length;i++) {
                               provincias[i]=registros[i]["Cantidadpip"];
                               sum=provincias[i]+sum;

                            };
                             document.getElementById("NumPip").innerHTML =sum; //OBTENER NUMERO DE PIP EN LA CABECERA
                             
                             cantidadPIPAbancay=(100*(parseInt(provincias[0]))/sum);
                              document.getElementById("CantidadPAbancay").innerHTML =provincias[0]; //LISTAR CANTIDAD DE PIP REPORTE GENERAL
                              document.getElementById("porcentajeAban").innerHTML =cantidadPIPAbancay.toFixed(2); //LISTAR PORCENTAJES EN EL GRAFICO PROYECTOS POR PROVINCIAS EN TEXTO
                             cantidadPIPAndahuaylas=(100*(parseInt(provincias[1]))/sum);
                             document.getElementById("CantidadPAndahuaylas").innerHTML =provincias[1];
                             document.getElementById("porcentajeAnd").innerHTML =cantidadPIPAndahuaylas.toFixed(2);
                             cantidadPIPAntabamba=(100*(parseInt(provincias[2]))/sum);
                             document.getElementById("CantidadPAntabamba").innerHTML =provincias[2];
                             document.getElementById("porcentajeAnt").innerHTML =cantidadPIPAntabamba.toFixed(2);
                             cantidadPIPAymaraes=(100*(parseInt(provincias[3]))/sum);
                              document.getElementById("CantidadPAymaraes").innerHTML =provincias[3];
                              document.getElementById("porcentajeAy").innerHTML =cantidadPIPAymaraes.toFixed(2);
                             cantidadPIPChincheros=(100*(parseInt(provincias[4]))/sum);
                             document.getElementById("CantidadPChincheros").innerHTML =provincias[4];
                             document.getElementById("porcentajeChinc").innerHTML =cantidadPIPChincheros.toFixed(2);
                             cantidadPIPCotabambas=(100*(parseInt(provincias[5]))/sum);
                             document.getElementById("CantidadPCotabambas").innerHTML =provincias[5];
                             document.getElementById("porcentajeCotab").innerHTML =cantidadPIPCotabambas.toFixed(2);
                             cantidadPIPGrau=(100*(parseInt(provincias[6]))/sum);
                             document.getElementById("CantidadPGrau").innerHTML =provincias[6];
                             document.getElementById("porcentajeGrau").innerHTML =cantidadPIPGrau.toFixed(2);

                 
                                if ("undefined" != typeof Chart && (console.log("init_chart_doughnut"), $(".canvasDoughnut1").length)) {
                                        var a = {
                                            type: "doughnut",
                                            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                                            data: {
                                                labels: ["Abancay", "Andahuaylas", "Antabamba", "Aymaraes", "Chincheros","Cotabambas","Grau"],
                                                datasets: [{
                                                    data: [cantidadPIPAbancay,cantidadPIPAndahuaylas, cantidadPIPAntabamba, cantidadPIPAymaraes,cantidadPIPChincheros,cantidadPIPCotabambas,cantidadPIPGrau],
                                                    backgroundColor: ["#3498DB", "#9B59B6", "#E74C3C", "#26B99A", "#C7D2C8","#6D818B","#6BC5F3"],
                                                    hoverBackgroundColor: ["#49A9EA", "#B370CF", "#E95E4F", "#36CAAB", "#D1E1D3", "#788B95","#6BC5F3"]
                                                }]
                                            },
                                            options: {legend: !1, responsive: !1}
                                        };
                                        $(".canvasDoughnut1").each(function () {
                                            var b = $(this);
                                            new Chart(b, a)
                                        })
                                    }

                        }
                    });
    //fin data del proyecto    
}


  var EstadistMontosPipProv=function()
  {
      var MontosPipProv=new Array();
    html1="";
    $.ajax({
     "url":base_url +"index.php/PrincipalPmi/EstadisticaMontoPipProvincias",
     success:function(respuesta)
                      {
                         var registros = eval(respuesta);  
                      var suma=0;
                         html1+="<thead> <tr> <th  class='active'><h6>Provincia </h6></th> <th class='active'><h6>Estadistica</h6></th><th colspan='12' class='active'><h6>Montos</h6></th> </tr></thead>"
                         for (var i = 0; i <registros.length;i++) {
                            MontosPipProv[i]=registros[i]["MontoProyecto"]; //OPCIONAL, SIRVE PARA IMPRIR LOS MONTOS  EN DATOS PIP PROYECTOS POR PROVINCIA EN LOS DIV
                               suma=MontosPipProv[i]+suma; //TOTAL MONTO PROYECTOS EN CABECERA

                          html1 +="<tbody> <tr><th>"+registros[i]["provincia"]+"</th><th><div class='progress progress_sm'> <div class='progress-bar bg-green progress_sm' role='progressbar' data-transitiongoal='45' style='width: "+registros[i]["Cantidad"]+"%;'></div> </div> </th><th>"+registros[i]["MontoProyecto"]+"</th></tr>";
                          //alert(suma);
                           };               
                             html1 +="</tbody>";
                         $("#table-estaditMontPIPProv").html(html1);

                          document.getElementById("MontoPipAbancay").innerHTML =MontosPipProv[0]; // MONTO TOTAL DE ABANCAY EN EL DIV MontoPipAbancay 
                          document.getElementById("MontoPipAndahuaylas").innerHTML =MontosPipProv[1];         
                          document.getElementById("MontoPipAntabamba").innerHTML =MontosPipProv[2];
                          document.getElementById("MontoPipAymaraes").innerHTML =MontosPipProv[3];
                          document.getElementById("MontoPipChincheros").innerHTML =MontosPipProv[4];
                          document.getElementById("MontoPipCotabambas").innerHTML =MontosPipProv[5];
                          document.getElementById("MontoPipGrau").innerHTML =MontosPipProv[6];
                          //OBTENER EL MONTO TOTAL DE PROYECTOS EN LA CABECERA
                          document.getElementById("MontoTotalPip").innerHTML =suma;
                      }   
                    });
  }
$(document).ready(function () {
  EstaProyProvincia();
  EstadistMontosPipProv();
});