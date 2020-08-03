$(document).ready(function () {

    setTimeout(function () {
        valid();
    }, 3000);
});


function valid() {
    $('.dataTables_filter input').val('');
    $('.dataTables_filter input').attr({
        'autocomplete': 'off'
    });

    $('.pwd').val('');

    $('#pwd').val('');
    $('#email').val('');
    $('#usernametext').val('');
    $('.pwd').attr({
        'autocomplete': 'off'
    });
    $('.pwd').attr({
        'autocomplete': 'off'
    });
    $('#usernametext').attr({
        'autocomplete': 'off'
    });
    $('.password').val('');
    $('#email').attr({
        'autocomplete': 'off'
    });
    $('#pass').attr({
        'autocomplete': 'off'
    });
    $('.password').attr({
        'autocomplete': 'off'
    });
}