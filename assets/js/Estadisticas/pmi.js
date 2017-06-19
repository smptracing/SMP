function EstaProyProvincia() {

    //dat del proyecto
    var provincias = new Array();
    event.preventDefault();
    $.ajax({
        "url": base_url + "index.php/PrincipalPmi/EstadisticaPipProvinc",
        type: "POST",
        success: function (respuesta) {
            var registros = eval(respuesta);
            var sum = 0;
            for (var i = 0; i < registros.length; i++) {
                provincias[i] = registros[i]["Cantidadpip"];
                sum = provincias[i] + sum;

            }
            document.getElementById("NumPip").innerHTML = sum; //OBTENER NUMERO DE PIP EN LA CABECERA
            cantidadPIPAbancay = (100 * (parseInt(provincias[0])) / sum);
            document.getElementById("CantidadPAbancay").innerHTML = provincias[0]; //LISTAR CANTIDAD DE PIP REPORTE GENERAL
            document.getElementById("porcentajeAban").innerHTML = cantidadPIPAbancay; //LISTAR PORCENTAJES EN EL GRAFICO PROYECTOS POR PRIVINCIAS EN TEXTO
            cantidadPIPAndahuaylas = (100 * (parseInt(provincias[1])) / sum);
            document.getElementById("CantidadPAndahuaylas").innerHTML = provincias[1];
            document.getElementById("porcentajeAnd").innerHTML = cantidadPIPAndahuaylas;
            cantidadPIPAntabamba = (100 * (parseInt(provincias[2])) / sum);
            document.getElementById("CantidadPAntabamba").innerHTML = provincias[2];
            document.getElementById("porcentajeAnt").innerHTML = cantidadPIPAntabamba;
            cantidadPIPAymaraes = (100 * (parseInt(provincias[3])) / sum);
            document.getElementById("CantidadPAymaraes").innerHTML = provincias[3];
            document.getElementById("porcentajeAy").innerHTML = cantidadPIPAymaraes;
            cantidadPIPChincheros = (100 * (parseInt(provincias[4])) / sum);
            document.getElementById("CantidadPCotabambas").innerHTML = provincias[4];
            cantidadPIPCotabambas = (100 * (parseInt(provincias[5])) / sum);
            document.getElementById("CantidadPChincheros").innerHTML = provincias[5];
            cantidadPIPGrau = (100 * (parseInt(provincias[6])) / sum);
            document.getElementById("CantidadPGrau").innerHTML = provincias[6];

            document.getElementById("idprogressAbanc").innerHTML = cantidadPIPAbancay;
            if ("undefined" != typeof Chart && (console.log("init_chart_doughnut"), $(".canvasDoughnut1").length)) {
                var a = {
                    type: "doughnut",
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data: {
                        labels: ["Abancay", "Andahuaylas", "Antabamba", "Aymaraes", "Contabambas", "Chincheros", "Grau"],
                        datasets: [{
                            data: [cantidadPIPAbancay, cantidadPIPAndahuaylas, cantidadPIPAntabamba, cantidadPIPAymaraes, cantidadPIPChincheros, cantidadPIPCotabambas, cantidadPIPGrau],
                            backgroundColor: ["#BDC3C7", "#9B59B6", "#E74C3C", "#26B99A", "#3498DB", "#3498DB", "#3498DB"],
                            hoverBackgroundColor: ["#CFD4D8", "#B370CF", "#E95E4F", "#36CAAB", "#49A9EA", "#49A9EA", "#3498DB"]
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

function EstadisticasPorCiclosInversion() {
    $.ajax({
        url: base_url + "index.php/PrincipalPmi/EstadisticaPipEstadoCiclo",
        type: "POST",
        success: function (respuesta) {
            var registros = eval(respuesta);
            var sql = "";
            var NumProyectos = 0;
            var total_proyectos = registros[0]["Num_Total"];

            var porcentaje = 0.00;
            for (var i = 0; i < registros.length; i++) {
                NumProyectos = registros[i]["Num_Proyectos"];
                porcentaje = (NumProyectos / total_proyectos) * 100;
                sql = "<div class=\"widget_summary\">\n"
                    + "                        <div class=\"w_left w_25\">\n"
                    + "                            <span>" + registros[i]["nombre_estado_ciclo"] + "</span>\n"
                    + "                        </div>\n"
                    + "                        <div class=\"w_center w_55\">\n"
                    + "                            <div class=\"progress\">\n"
                    + "                                <div class=\"progress-bar bg-blue\" role=\"progressbar\" aria-valuenow=\"60\"\n"
                    + "                                     aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: " + porcentaje + "%;\">\n"
                    + "                                    " + porcentaje + "%\n"
                    + "                                </div>\n"
                    + "                            </div>\n"
                    + "                        </div>\n"
                    + "                        <div class=\"w_right w_20\">\n"
                    + "                            <span>" + NumProyectos + "</span>\n"
                    + "                        </div>\n"
                    + "                        <div class=\"clearfix\"></div>\n"
                    + "                    </div>";

                $("#panel_estadistica_ciclo_inversion").append(sql);
                //html += "<option value=" + registros[i]["id_subgerencia"] + "> " + registros[i]["denom_subgerencia"] + " </option>";
            }
        }
    });
}

$(document).ready(function () {
    EstaProyProvincia();
    EstadisticasPorCiclosInversion();
});