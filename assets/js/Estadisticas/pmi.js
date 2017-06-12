function EstaProyProvincia() {
    
    //dat del proyecto
    var provincias=new Array();
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/ServicioPublico/GetServicioAsociado",
                        type:"POST",
                        success:function(respuesta){
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                               provincias[i]=registros[i]["nombre_serv_pub_asoc"];
                            };
                             numero=provincias[0];
                                if ("undefined" != typeof Chart && (console.log("init_chart_doughnut"), $(".canvasDoughnut1").length)) {
                                        var a = {
                                            type: "doughnut",
                                            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                                            data: {
                                                labels: [numero, "Andahuaylas", "Antabamba", "Aymaraes", "Contabambas","Chincheros","Grau"],
                                                datasets: [{
                                                    data: [15,10, 10, 10, 20,30,10],
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