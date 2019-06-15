$(document).ready(function () {

    $('#btnSend').click(function () {

        var errores = '';

        //validando usuario=======================
        if ($('#usuario').val() == '') {
            errores += '<p>Escriba su usuario</p>';
            $('#usuario').css("border-color", "#F14B4B")

        }
        else {
            $('$usuario').css("border-color", "#d1d1d1")
        }
        //validando pass=======================
        if ($('#pass').val() == '') {
            errores += '<p>Escriba su contraseña</p>';
            $('#pass').css("border-color", "#F14B4B")

        }
        else {
            $('$pass').css("border-color", "#d1d1d1")
        }
        //enviando mensaje
        if (errores == '' == false) {
            var mensajeModal = '<div class="modal_wrap">' +
                '<div class="mensaje_modal">' +
                '<h3>Errores encontrados</h3>' +
                errores +
                '<span id="btnClose">Cerrar</span>' +
                '</div>' +
                '</div>'
                $('body').append(mensajeModal);
        }
        //cerrrando modal ==========================
        $('#btnClose').click(function(){

            $('.modal_wrap').remove();
        })
    })
})