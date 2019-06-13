function Ingresarprin() {
    var parametros = {};
    $.ajax({
        data: parametros,
        url: "formprincipal.php",
        type: "POST",
        beforeSend: function () {
            $("#ventana").html("Procesando...")
        },
        success: function (vista) {

            $("#ventana").html(vista)
        }
    });
}

function MformInsertar() {
    var parametros = {};
    $.ajax({
        data: parametros,
        url: "forminsertar.php",
        type: "POST",
        beforeSend: function () {
            $("#ventana").html("Procesando...")
        },
        success: function (vista) {

            $("#ventana").html(vista)
        }
    });
}
function Mdatoslistar() {
    var parametros = {};
    $.ajax({
        data: parametros,
        url: "datos_listar.php",
        type: "POST",
        beforeSend: function () {
            $("#ventana").html("Procesando...")
        },
        success: function (vista) {

            $("#ventana").html(vista)
        }
    });
}

function Insertarregistro() {

    var parametros = {
        "dn": $("#dni").val(),
        "ap": $("#apePa").val(),
        "am": $("#apeMa").val(),
        "nom": $("#nombre").val(),
        "fecN": $("#fech").val(),
        "sex": $("#s").val(),
        "cod": $("#ct").val(),
        "des": $("#descripcion").val()
    };
    $.ajax({
        data: parametros,
        url: "datos_insertar.php",
        type: "POST",
        beforeSend: function () {
            $("#ventana").html("Procesando...")
        },
        success: function (vista) {

            $("#ventana").html(vista)
        }
    });
}


function Modificar(cod) {

    var parametros = {
        "dn": cod,
    };
    $.ajax({
        data: parametros,
        url: "form_modificar.php",
        type: "POST",
        beforeSend: function () {
            $("#ventana").html("Procesando...")
        },
        success: function (vista) {

            $("#ventana").html(vista)
        }
    });
}


function Modificarregistro() {


    var parametros = {
        "dn": $("#dni").val(),
        "ap": $("#apePa").val(),
        "am": $("#apeMa").val(),
        "nom": $("#nombre").val(),
        "fecN": $("#fech").val(),
        "sex": $("#s").val(),
        "cod": $("#ct").val(),
        "des": $("#descripcion").val()

    };
    $.ajax({
        data: parametros,
        url: "datos_modificar.php",
        type: "POST",
        beforeSend: function () {
            $("#ventana").html("Procesando...")
        },
        success: function (vista) {

            $("#ventana").html(vista)
        }
    });
}
function Eliminar(cod) {


    var parametros = {
        "dn": cod,
    };
    $.ajax({
        data: parametros,
        url: "datos_eliminar.php",
        type: "POST",
        beforeSend: function () {
            $("#ventana").html("Procesando...")
        },
        success: function (vista) {

            $("#ventana").html(vista)
        }
    });
}
