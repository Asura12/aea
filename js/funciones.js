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

$(document).on("click", "#btn-yola", function (e) {
    e.preventDefault();

    var txtfinal = "";
    if ($("#dni").val().trim() === "") {
        $("#dni").addClass("is-invalid");
        $("#dni").parent().append('<small id="passwordHelp" class="text-danger">Campo requerido.</small>');
    } else {
        if (isNaN($('#dni').val())) {
            $("#dni").addClass("is-invalid");
            $("#dni").parent().append('<small id="passwordHelp" class="text-danger">Debe ser numero.</small>');
            
        }else {
            if($("#dni").val().trim().length != 8){
                $("#dni").addClass("is-invalid");
                $("#dni").parent().append('<small id="passwordHelp" class="text-danger">Minimo de campos 8.</small>');
        
            } else {
                $("#dni").removeClass("is-invalid");
                $("#dni").addClass("is-valid");
                $("#dni").parent().find("small").remove();
                txtfinal +="z";


                /*
                ajx

                bd

                if(encuentra){
                         $("#dni").addClass("is-invalid");
                $("#dni").parent().append('<small id="passwordHelp" class="text-danger">ya existe.</small>');
                }else{

                      $("#dni").removeClass("is-invalid");
                $("#dni").addClass("is-valid");
                $("#dni").parent().find("small").remove();
                txtfinal +="z";
                }
                */
            }
        }
    }

    // alert("ddd");
    //$("#dni").val().trim() === "" ||   $("#dni").val().trim().length != 8 
    /******************************************** */
  /*  var txtfinal = "";
    if ($("#dni").val().trim() === "") {
        $("#dni").addClass("is-invalid");
        $("#dni").parent().append('<small id="passwordHelp" class="text-danger">Campo requerido.</small>');
    } else {
        $("#dni").removeClass("is-invalid");
        $("#dni").addClass("is-valid");
        $("#dni").parent().find("small").remove();
        txtfinal +="z";
    }
    
    if($("#dni").val().trim().length != 8){
        $("#dni").addClass("is-invalid");
        $("#dni").parent().append('<small id="passwordHelp" class="text-danger">Minimo de campos 8.</small>');

    } else {
        $("#dni").removeClass("is-invalid");
        $("#dni").addClass("is-valid");
        $("#dni").parent().find("small").remove();
        txtfinal +="z";
    }

    if (isNaN($('#dni').val())) {
        $("#dni").addClass("is-invalid");
        $("#dni").parent().append('<small id="passwordHelp" class="text-danger">Debe ser numero.</small>');
        
    }else {
        $("#dni").removeClass("is-invalid");
        $("#dni").addClass("is-valid");
        $("#dni").parent().find("small").remove();
        txtfinal +="z";
    }*/
    /******************************************* */
    if ($("#apePa").val().trim() === "") {
        $("#apePa").addClass("is-invalid");
        $("#apePa").parent().append('<small id="passwordHelp" class="text-danger">Campo requerido.</small>');
    } else {
        $("#apePa").removeClass("is-invalid");
        $("#apePa").addClass("is-valid");
        $("#apePa").parent().find("small").remove();
        txtfinal +="z";
    }
    /*************************************** */
    if ($("#apeMa").val().trim() === "") {
        $("#apeMa").addClass("is-invalid");
        $("#apeMa").parent().append('<small id="passwordHelp" class="text-danger">Campo requerido.</small>');
    } else {
        $("#apeMa").removeClass("is-invalid");
        $("#apeMa").addClass("is-valid");
        $("#apeMa").parent().find("small").remove();
        txtfinal +="z";
    }
    /***************************************** */
    if ($("#nombre").val().trim() === "") {
        $("#nombre").addClass("is-invalid");
        $("#nombre").parent().append('<small id="passwordHelp" class="text-danger">Campo requerido.</small>');
    } else {
        $("#nombre").removeClass("is-invalid");
        $("#nombre").addClass("is-valid");
        $("#nombre").parent().find("small").remove();
        txtfinal +="z";
    }
    /*************************************************** */
    if ($("#fech").val().trim() === "") {
        $("#fech").addClass("is-invalid");
        $("#fech").parent().append('<small id="passwordHelp" class="text-danger">Campo requerido.</small>');
    } else {
        $("#fech").removeClass("is-invalid");
        $("#fech").addClass("is-valid");
        $("#fech").parent().find("small").remove();
        txtfinal +="z";
    }
    /********************************************* */
    if ($("#s").val().trim() === "") {
        $("#s").addClass("is-invalid");
        $("#s").parent().append('<small id="passwordHelp" class="text-danger">Campo requerido.</small>');
    } else {
        $("#s").removeClass("is-invalid");
        $("#s").addClass("is-valid");
        $("#s").parent().find("small").remove();
        txtfinal +="z";
    }
    /*********************************************** */
    if ($("#ct").val().trim() === "") {
        $("#ct").addClass("is-invalid");
        $("#ct").parent().append('<small id="passwordHelp" class="text-danger">Campo requerido.</small>');
    } else {
        $("#ct").removeClass("is-invalid");
        $("#ct").addClass("is-valid");
        $("#ct").parent().find("small").remove();
        txtfinal +="z";
    }
    if(txtfinal == "zzzzzzz"){

        swal({
            title: "Estas seguro?",
            text: "El registor se insertara ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
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
                           // $("#ventana").html("Procesando...")
                        },
                        success: function (vista) {
                            if(vista === "0"){
                                $("#dni").removeClass("is-invalid");
                                $("#dni").addClass("is-valid");
                                $("#dni").parent().find("small").remove();
                               swal("Datos insertados correctamente!", {
                                    icon: "success",
                                });
                               $("#ventana").html(vista)
                               
                            }else{
                                $("#dni").addClass("is-invalid");
                                $("#dni").parent().append('<small id="passwordHelp" class="text-danger">Este campo existe!</small>');
                            }
                            
                        }
                    });
                } else {
                }
            });
      
    }

})


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
    swal({
        title: "Estas seguro?",
        text: "El registor se elimninara permanentemente!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var parametros = {
                    "dn": cod,
                };
                $.ajax({
                    data: parametros,
                    url: "datos_eliminar.php",
                    type: "POST",
                    beforeSend: function () {
                        // $("#ventana").html("Procesando...")
                    },
                    success: function (vista) {
                        swal("Registro eliminado correctamente!", {
                            icon: "success",
                        });
                        Mdatoslistar();
                        //     $("#ventana").html(vista) 
                    }
                });




            } else {
            }
        });



}
