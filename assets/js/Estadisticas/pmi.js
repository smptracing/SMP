function EstaProyProvincia() {
    
    //dat del proyecto
    var provincias=new Array();
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/PrincipalPmi/EstadisticaPipProvinc",
                        type:"POST",
                        success:function(respuesta){
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                               provincias[i]=registros[i]["Cantidadpip"];
                            };
                             cantidadPIPAbancay=provincias[0];
                             cantidadPIPAndahuaylas=provincias[1];
                             cantidadPIPAntabamba=provincias[2];
                             cantidadPIPAymaraes=provincias[3];
                             cantidadPIPChincheros=provincias[4];
                             cantidadPIPCotabambas=provincias[5];
                             cantidadPIPGrau=provincias[6];
                                if ("undefined" != typeof Chart && (console.log("init_chart_doughnut"), $(".canvasDoughnut1").length)) {
                                        var a = {
                                            type: "doughnut",
                                            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                                            data: {
                                                labels: ["Abancay", "Andahuaylas", "Antabamba", "Aymaraes", "Contabambas","Chincheros","Grau"],
                                                datasets: [{
                                                    data: [cantidadPIPAbancay,cantidadPIPAndahuaylas, cantidadPIPAntabamba, cantidadPIPAymaraes,cantidadPIPChincheros,cantidadPIPCotabambas,cantidadPIPGrau],
                                                    backgroundColor: ["#BDC3C7", "#9B59B6", "#E74C3C", "#26B99A", "#3498DB","#3498DB","#3498DB"],
                                                    hoverBackgroundColor: ["#CFD4D8", "#B370CF", "#E95E4F", "#36CAAB", "#49A9EA", "#49A9EA","#3498DB"]
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
$(document).ready(function () {
  EstaProyProvincia();
});