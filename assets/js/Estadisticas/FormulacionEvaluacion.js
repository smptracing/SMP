function getNumProyectosNuevosEvaluacion() {
    //mensajes de aviso

    //$.growl({ title: "Aviso", message: "Usted Tiene Proyectos Nuevos en Formulacion" });
    //   $.growl.error({ message: "The kitten is attacking!" });
    //$.growl.notice({ message: "The kitten is cute!" });
    //   $.growl.warning({ message: "The kitten is ugly!" });

    $.ajax({
        url: base_url + "index.php/PrincipalFyE/getNumProyectosNuevosEvaluacion",
        type: "POST",
        success: function (respuesta) {
            var registros = eval(respuesta);
            var panel_notificacion = $("#panel_notificacion_fe");

            var num = registros[0]["EvaluacionNuevos"];

            if (num >= 1) {
                var numProyEnEvaluacionNuevos = "<span class=\"badge bg-green\">" + num + "</span>";
                panel_notificacion.append(numProyEnEvaluacionNuevos);
            }
        }
    });
}

$(document).ready(function () {
    getNumProyectosNuevosEvaluacion();
});