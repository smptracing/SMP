function EstaProyProvincia()
{
    var provincias=new Array();

    event.preventDefault();

    $.ajax(
    {
        "url": base_url+"index.php/PrincipalPmi/EstadisticaPipProvinc",
        type: "POST",
        success: function(respuesta)
        {
            var registros=eval(respuesta);

            var sum=0;

            for(var i=0; i<registros.length; i++)
            {
                provincias[i]=registros[i]["Cantidadpip"];
                sum=provincias[i]+sum;
            }
            
            $("#NumPip").text(sum); //OBTENER NUMERO DE PIP EN LA CABECERA

            cantidadPIPAbancay=(100*(parseInt(provincias[0]))/sum);

            $("#CantidadPAbancay").text(provincias[0]); //LISTAR CANTIDAD DE PIP REPORTE GENERAL
            $("#porcentajeAban").text(cantidadPIPAbancay.toFixed(2)); //LISTAR PORCENTAJES EN EL GRAFICO PROYECTOS POR PRIVINCIAS EN TEXTO

            cantidadPIPAndahuaylas=(100*(parseInt(provincias[1]))/sum);

            $("#CantidadPAndahuaylas").text(provincias[1]);
            $("#porcentajeAnd").text(cantidadPIPAndahuaylas.toFixed(2));

            cantidadPIPAntabamba=(100*(parseInt(provincias[2]))/sum);

            $("#CantidadPAntabamba").text(provincias[2]);
            $("#porcentajeAnt").text(cantidadPIPAntabamba.toFixed(2));

            cantidadPIPAymaraes=(100*(parseInt(provincias[3]))/sum);

            $("#CantidadPAymaraes").text(provincias[3]);
            $("#porcentajeAy").text(cantidadPIPAymaraes.toFixed(2));

            cantidadPIPChincheros=(100*(parseInt(provincias[4]))/sum);

            $("#CantidadPChincheros").text(provincias[4]);
            $("#porcentajeChinc").text(cantidadPIPChincheros.toFixed(2));

            cantidadPIPCotabambas=(100*(parseInt(provincias[5]))/sum);

            $("#CantidadPCotabambas").text(provincias[5]);
            $("#porcentajeCotab").text(cantidadPIPCotabambas.toFixed(2));

            cantidadPIPGrau=(100*(parseInt(provincias[6]))/sum);

            $("#CantidadPGrau").text(provincias[6]);
            $("#porcentajeGrau").text(cantidadPIPGrau.toFixed(2));

            if ("undefined" != typeof Chart && (console.log("init_chart_doughnut"), $(".canvasDoughnut1").length))
            {
                var a=
                {
                    type: "doughnut",
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data:
                    {
                        labels: ["Abancay", "Andahuaylas", "Antabamba", "Aymaraes", "Contabambas", "Chincheros", "Grau"],
                        datasets: [
                        {
                            data: [cantidadPIPAbancay, cantidadPIPAndahuaylas, cantidadPIPAntabamba, cantidadPIPAymaraes, cantidadPIPChincheros, cantidadPIPCotabambas, cantidadPIPGrau],
                            backgroundColor: ["#3498DB", "#9B59B6", "#E74C3C", "#26B99A", "#B6CBD6", "#708B99", "#52C5E1"],
                            hoverBackgroundColor: ["#3498DB", "#B370CF", "#E95E4F", "#36CAAB", "#BDD3DF", "#7C96A3", "#52C5E1"]
                        }]
                    },
                    options: { legend: !1, responsive: !1 }
                };

                $(".canvasDoughnut1").each(function()
                {
                    var b=$(this);

                    new Chart(b, a)
                })
            }

        }
    });
}

var EstadistMontosPipProv=function()
{
    var MontosPipProv=new Array();

    var html1='';

    $.ajax(
    {
        "url": base_url+"index.php/PrincipalPmi/EstadisticaMontoPipProvincias",
        success: function(respuesta)
        {
            var registros=eval(respuesta);

            var suma=0;

            html1+='<thead>'
				+'<tr>'
					+'<th class="active"><h6>Provincia</h6></th>'
					+'<th class="active"><h6>Estadistica</h6></th>'
					+'<th class="active" style="text-align: right;"><h6>Montos</h6></th>'
				+'</tr>'
			+'</thead>'
			+'<tbody>';

            for(var i=0; i<registros.length; i++)
            {
                MontosPipProv[i]=registros[i]["MontoProyecto"]; //OPCIONAL, SIRVE PARA IMPRIR LOS MONTOS  EN DATOS PIP PROYECTOS POR PROVINCIA EN LOS DIV

                suma=MontosPipProv[i]+suma; //TOTAL MONTO PROYECTOS EN CABECERA

                html1+='<tr>'
						+'<td>'+registros[i]['provincia']+'</td>'
						+'<td><div class="progress progress_sm"><div class="progress-bar bg-green progress_sm" role="progressbar" data-transitiongoal="45" style="width: '+registros[i]['Cantidad']+'%;"></div></div></td>'
						+'<td style="text-align: right;">'+registros[i]['MontoProyecto']+'</td>'
				+'</tr>';
            }
            
            html1+="</tbody>";

            $("#table-estaditMontPIPProv").html(html1);

            $("#MontoPipAbancay").html(MontosPipProv[0]); // MONTO TOTAL DE ABANCAY EN EL DIV MontoPipAbancay
            $("#MontoPipAndahuaylas").html(MontosPipProv[1]);
            $("#MontoPipAntabamba").html(MontosPipProv[2]);
            $("#MontoPipAymaraes").html(MontosPipProv[3]);
            $("#MontoPipChincheros").html(MontosPipProv[4]);
            $("#MontoPipCotabambas").html(MontosPipProv[5]);
            $("#MontoPipGrau").html(MontosPipProv[6]);
            $("#MontoTotalPip").html(suma); //OBTENER EL MONTO TOTAL DE PROYECTOS EN LA CABECERA
        }
    });
}


function EstadisticasPorCiclosInversion() {
    $.ajax({
        url: base_url+"index.php/PrincipalPmi/EstadisticaPipEstadoCiclo",
        type: "POST",
        success: function(respuesta)
        {
            var registros=eval(respuesta);
            var sql='';
            var NumProyectos=0;
            var total_proyectos=registros[0]["Num_Total"];
            var total_otros=registros[0]["TotalNoCiclo"];
            var panel_estadistica=$("#panel_estadistica_ciclo_inversion");

            var porcentaje=0.00;
            for (var i=0; i<registros.length; i++) 
            {
                NumProyectos=registros[i]["Num_Proyectos"];
                porcentaje=Math.round((NumProyectos / total_proyectos) * 100);
                sql='<div class="widget_summary">'
					+'<div class="w_left w_25">'
						+'<span>'+(registros[i]['nombre_estado_ciclo'].charAt(0).toUpperCase())+(registros[i]['nombre_estado_ciclo'].toLowerCase().substring(1))+'</span>'
					+'</div>'
					+'<div class="w_center w_55">'
						+'<div class="progress">'
							+'<div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="font-size: 11px;width: '+porcentaje+'%;">'
								+porcentaje+'%'
							+'</div>'
						+'</div>'
					+'</div>'
					+'<div class="w_right w_20">'
						+'<span style="font-size: 14px;">'+NumProyectos+'</span>'
					+'</div>'
				+'</div>';

                panel_estadistica.append(sql);
            }

            porcentaje=Math.round((total_otros/total_proyectos)*100);

            sql='<div class="widget_summary">'
				+'<div class="w_left w_25">'
					+'<span>Otros</span>'
				+'</div>'
				+'<div class="w_center w_55">'
					+'<div class="progress">'
						+'<div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="font-size: 11px;width: '+porcentaje+'%;">'
						+porcentaje+'%'
						+'</div>'
					+'</div>'
				+'</div>'
				+'<div class="w_right w_20">'
					+'<span style="font-size: 14px;">'+total_otros+'</span>'
				+'</div>'
			+'</div>';

            panel_estadistica.append(sql);
        }
    });
}

function initMap()
{
    //var LatLng={lat: -25.363, lng: 131.044};
    var map=new google.maps.Map($('#map'),
    {
        zoom: 8,
        center: {lat: -14, lng: -73},
        //disableDefaultUI: true
    });

    $.ajax(
    {
        url: base_url+"index.php/PrincipalPmi/GetDatosUbicacion",
        type: "POST",
        success: function(respuesta)
        {
            var registros=eval(respuesta);

            var marker;

            for(var i=0; i<registros.length; i++)
            {
                marker=new google.maps.Marker(
                {
                    position: { lat : registros[i]["latitud"], lng: registros[i]["longitud"] },
                    map : map,
                    title : registros[i]["distrito"]+": "+registros[i]["nombre_pi"]
                });
            }
        }
    });
}


$(document).on('ready', function()
{
    EstaProyProvincia();
    EstadistMontosPipProv();
    EstadisticasPorCiclosInversion();
});