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
            ;
            $("#NumPip").html(sum); //OBTENER NUMERO DE PIP EN LA CABECERA
            cantidadPIPAbancay = (100 * (parseInt(provincias[0])) / sum);
            $("#CantidadPAbancay").html(provincias[0]); //LISTAR CANTIDAD DE PIP REPORTE GENERAL
            $("#porcentajeAban").html(cantidadPIPAbancay.toFixed(2)); //LISTAR PORCENTAJES EN EL GRAFICO PROYECTOS POR PRIVINCIAS EN TEXTO
            cantidadPIPAndahuaylas = (100 * (parseInt(provincias[1])) / sum);
            $("#CantidadPAndahuaylas").html(provincias[1]);
            $("#porcentajeAnd").html(cantidadPIPAndahuaylas.toFixed(2));
            cantidadPIPAntabamba = (100 * (parseInt(provincias[2])) / sum);
            $("#CantidadPAntabamba").html(provincias[2]);
            $("#porcentajeAnt").html(cantidadPIPAntabamba.toFixed(2));
            cantidadPIPAymaraes = (100 * (parseInt(provincias[3])) / sum);
            $("#CantidadPAymaraes").html(provincias[3]);
            $("#porcentajeAy").html(cantidadPIPAymaraes.toFixed(2));
            cantidadPIPChincheros = (100 * (parseInt(provincias[4])) / sum);
            $("#CantidadPChincheros").html(provincias[4]);
            $("#porcentajeChinc").html(cantidadPIPChincheros.toFixed(2));
            cantidadPIPCotabambas = (100 * (parseInt(provincias[5])) / sum);
            $("#CantidadPCotabambas").html(provincias[5]);
            $("#porcentajeCotab").html(cantidadPIPCotabambas.toFixed(2));
            cantidadPIPGrau = (100 * (parseInt(provincias[6])) / sum);
            $("#CantidadPGrau").html(provincias[6]);
            $("#porcentajeGrau").html(cantidadPIPGrau.toFixed(2));
            if ("undefined" != typeof Chart && (console.log("init_chart_doughnut"), $(".canvasDoughnut1").length)) {
                var a = {
                    type: "doughnut",
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data: {
                        labels: ["Abancay", "Andahuaylas", "Antabamba", "Aymaraes", "Contabambas", "Chincheros", "Grau"],
                        datasets: [{
                            data: [cantidadPIPAbancay, cantidadPIPAndahuaylas, cantidadPIPAntabamba, cantidadPIPAymaraes, cantidadPIPChincheros, cantidadPIPCotabambas, cantidadPIPGrau],
                            backgroundColor: ["#3498DB", "#9B59B6", "#E74C3C", "#26B99A", "#B6CBD6", "#708B99", "#52C5E1"],
                            hoverBackgroundColor: ["#3498DB", "#B370CF", "#E95E4F", "#36CAAB", "#BDD3DF", "#7C96A3", "#52C5E1"]
                        }]
                    },
                    options: {legend: !1, responsive: !1}
                };
                $(".canvasDoughnut1").each(function () {
                    console.log('Access success.');
                    var b = $(this);
                    new Chart(b, a)
                })
            }

        }
    });
    //fin data del proyecto    
}

var EstadistMontosPipProv = function () {
    var MontosPipProv = new Array();
    html1 = "";
    $.ajax({
        "url": base_url + "index.php/PrincipalPmi/EstadisticaMontoPipProvincias",
        success: function (respuesta) {
            var registros = eval(respuesta);
            var suma = 0;
            html1 += "<thead> <tr> <th  class='active'><h6>Provincia </h6></th> <th class='active'><h6>Estadistica</h6></th><th colspan='12' class='active'><h6>Montos</h6></th> </tr></thead>"
            for (var i = 0; i < registros.length; i++) {
                MontosPipProv[i] = registros[i]["MontoProyecto"]; //OPCIONAL, SIRVE PARA IMPRIR LOS MONTOS  EN DATOS PIP PROYECTOS POR PROVINCIA EN LOS DIV
                suma = MontosPipProv[i] + suma; //TOTAL MONTO PROYECTOS EN CABECERA

                html1 += "<tbody> <tr><th>" + registros[i]["provincia"] + "</th><th><div class='progress progress_sm'> <div class='progress-bar bg-green progress_sm' role='progressbar' data-transitiongoal='45' style='width: " + registros[i]["Cantidad"] + "%;'></div> </div> </th><th>" + registros[i]["MontoProyecto"] + "</th></tr>";
                //alert(suma);
            }
            ;
            html1 += "</tbody>";
            $("#table-estaditMontPIPProv").html(html1);

            $("#MontoPipAbancay").html(MontosPipProv[0]); // MONTO TOTAL DE ABANCAY EN EL DIV MontoPipAbancay
            $("#MontoPipAndahuaylas").html(MontosPipProv[1]);
            $("#MontoPipAntabamba").html(MontosPipProv[2]);
            $("#MontoPipAymaraes").html(MontosPipProv[3]);
            $("#MontoPipChincheros").html(MontosPipProv[4]);
            $("#MontoPipCotabambas").html(MontosPipProv[5]);
            $("#MontoPipGrau").html(MontosPipProv[6]);
            //OBTENER EL MONTO TOTAL DE PROYECTOS EN LA CABECERA
            $("#MontoTotalPip").html(suma);
        }
    });
};


function EstadisticasPorCiclosInversion() {
    $.ajax({
        url: base_url + "index.php/PrincipalPmi/EstadisticaPipEstadoCiclo",
        type: "POST",
        success: function (respuesta) {
            var registros = eval(respuesta);
            var sql = "";
            var NumProyectos = 0;
            var total_proyectos = registros[0]["Num_Total"];
            var total_otros = registros[0]["TotalNoCiclo"];
            var panel_estadistica = $("#panel_estadistica_ciclo_inversion");

            var porcentaje = 0.00;
            for (var i = 0; i < registros.length; i++) {
                NumProyectos = registros[i]["Num_Proyectos"];
                porcentaje = Math.round((NumProyectos / total_proyectos) * 100);
                sql = "<div class=\"widget_summary\">\n"
                    + "                        <div class=\"w_left w_25\">\n"
                    + "                            <span>" + registros[i]["nombre_estado_ciclo"] + "</span>\n"
                    + "                        </div>\n"
                    + "                        <div class=\"w_center w_55\">\n"
                    + "                            <div class=\"progress\">\n"
                    + "                                <div class=\"progress-bar bg-info\" role=\"progressbar\" aria-valuenow=\"60\"\n"
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

                panel_estadistica.append(sql);
                //html += "<option value=" + registros[i]["id_subgerencia"] + "> " + registros[i]["denom_subgerencia"] + " </option>";
            }

            porcentaje = Math.round((total_otros / total_proyectos) * 100);
            sql = "<div class=\"widget_summary\">\n"
                + "                        <div class=\"w_left w_25\">\n"
                + "                            <span>Otros</span>\n"
                + "                        </div>\n"
                + "                        <div class=\"w_center w_55\">\n"
                + "                            <div class=\"progress\">\n"
                + "                                <div class=\"progress-bar bg-info\" role=\"progressbar\" aria-valuenow=\"60\"\n"
                + "                                     aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: " + porcentaje + "%;\">\n"
                + "                                    " + porcentaje + "%\n"
                + "                                </div>\n"
                + "                            </div>\n"
                + "                        </div>\n"
                + "                        <div class=\"w_right w_20\">\n"
                + "                            <span>" + total_otros + "</span>\n"
                + "                        </div>\n"
                + "                        <div class=\"clearfix\"></div>\n"
                + "                    </div>";

            panel_estadistica.append(sql);
        }
    });
}

function initMap() {

    //var LatLng = {lat: -25.363, lng: 131.044};

    var map = new google.maps.Map($('#map'), {
        zoom: 8,
        center: {lat: -14, lng: -73},
        //disableDefaultUI: true
    });

    $.ajax({
        url: base_url + "index.php/PrincipalPmi/GetDatosUbicacion",
        type: "POST",
        success: function (respuesta) {
            var registros = eval(respuesta);

            var marker;
            for (var i = 0; i < registros.length; i++) {

                marker = new google.maps.Marker({
                    position: {lat: registros[i]["latitud"], lng: registros[i]["longitud"]},
                    map: map,
                    title: registros[i]["distrito"] + ": " + registros[i]["nombre_pi"]
                })
            }
        }
    });
}


$(document).ready(function () {
    EstaProyProvincia();
    EstadistMontosPipProv();
    EstadisticasPorCiclosInversion();
});
