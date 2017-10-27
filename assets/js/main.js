function compruebaDni(dni) {
    var letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    var numerosDni = dni.substring(0, 8);
    var letraDni = dni.substring(8);

    return letras.substr(numerosDni%23, 1) == letraDni;
}

$(document).ready(function () {
    $('#remove').hide();
    $('.text-danger').hide();

    $('#fechanac').on('changeDate change blur', function (e) {
        var date = $('#fechanac').val();
        // var age = moment().diff(moment(date, 'DD/MM/YYYY'),'years');
        date = moment(date,'YYYY-MM-DD');
        var age = moment().diff(date, 'years');
        if (isNaN(age)) {
            age = 0;
        }
        $('#edad').val(age);
        $('#edad').trigger('change');
    });

    $(window).on('scroll', materialKit.checkScrollForTransparentNavbar);

    $('#add').on('click', function (e) {
        var numRows = $('.clonedDatosCargo').length;
        var newNumRows = Number(numRows + 1);
        var newRow = $('#datosCargo' + numRows).clone(true).attr('id', 'datosCargo' + newNumRows);

        newRow.find("[id^='hogueraCargo']").attr('id', 'hogueraCargo' + newNumRows).val('');
        newRow.find("[id^='anyoCargo']").attr('id', 'anyoCargo' + newNumRows).val('');
        newRow.find('#remove').show();

        $('#datosCargo' + numRows).find('#add').remove();
        $('#datosCargo' + numRows).find('#remove').remove();

        $('#datosCargo' + numRows).after(newRow);
    });

    $('#remove').on('click', function (e) {
        var numRows = $('.clonedDatosCargo').length;
        var newNumRows = Number(numRows - 1);

        var btnAdd = $('#add');
        var btnRemove = $('#remove');

        if (newNumRows == 1) {
            btnRemove.hide();
        }

        $('#datosCargo' + newNumRows).find('.rowOptions').append(btnAdd);
        $('#datosCargo' + newNumRows).find('.rowOptions').append(btnRemove);

        $('#datosCargo' + numRows).remove();
    });

    $('#form').on('submit', function (e) {
        var cargos = "";

        $('.clonedDatosCargo').each(function () {
            cargos = cargos + $(this).find("[id^='tipoCargo']").val();
            cargos = cargos + '-' + $(this).find("[id^='anyoCargo']").val();
            cargos = cargos + '-' + $(this).find("[id^='hogueraCargo']").val();
            cargos = cargos + ",";
        });

        $('<input />').attr('type', 'hidden')
            .attr('name', "cargos")
            .attr('value', cargos)
            .appendTo('#form');

        return true;
    });

    $('#btnEnviar').on('click', function (e) {
        var dni = $('#dni').val();
        if (dni.length > 0 && !compruebaDni(dni)) {
            $('#mensajeErrorDni').show().focus();
            return false;
        }
    });

    $('#dni').on('blur', function (e) {
        var dni = $(this).val();
        if (dni.length > 0) {
            if (compruebaDni(dni)) {
                $(this).parent().removeClass('has-error');
                $('#mensajeErrorDni').fadeOut();
            }
            else {
                $(this).parent().addClass('has-error');
                $('#mensajeErrorDni').fadeIn();
            }
        }
        else{
            $(this).parent().removeClass('has-error');
            $('#mensajeErrorDni').fadeOut();
        }
    });

    // $('#fechanac').datepicker({
    //   weekStart: 1,
    //   language: 'es',
    // });
});
