function compruebaDni(dni) {
    var letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    var numerosDni = dni.substring(0, 8);
    var letraDni = dni.substring(8);

    return letras.substring(numerosDni%23, 1) == letraDni;
}

$(document).ready(function () {
    $('#remove').hide();
    $('#fechanac').on('changeDate', function (e) {
        var date = $('#fechanac').val();
        date = moment(date, 'DD-MM-YYYY');
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
            cargos = cargos + ',' + $(this).find("[id^='anyoCargo']").val();
            cargos = cargos + ',' + $(this).find("[id^='hogueraCargo']").val();
            cargos = cargos + "\n";
        });

        $('<input />').attr('type', 'hidden')
            .attr('name', "cargos")
            .attr('value', cargos)
            .appendTo('#form');

        return true;
    });

    $('#btnEnviar').on('click', function (e) {
        debugger;
        if (!compruebaDni($('#dni').val())) {
            e.preventDefault();

            return false;
        }
    });

    $('#dni').on('blur', function (e) {
        if (compruebaDni($(this).val())) {
            $(this).parent().removeClass('has-error');
        }
        else{
            $(this).parent().addClass('has-error');
        }
    });

    // $('#fechanac').datepicker({
    //   weekStart: 1,
    //   language: 'es',
    // });
});
