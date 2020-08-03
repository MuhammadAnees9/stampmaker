$(document).ready(function () {
    setTimeout(function () {
        valid();
    }, 4000);
});

function valid() {
    $('.dataTables_filter input').val('');
    $('.dataTables_filter input').attr({
        'autocomplete': 'off'
    });
    $('.password').attr({
        'autocomplete': 'off'
    });
    $('#usernametext').attr({
        'autocomplete': 'off'
    });
    $('#email').attr({
        'autocomplete': 'off'
    });
    $('#pass').attr({
        'autocomplete': 'off'
    });
    $('.pwd').attr({
        'autocomplete': 'off'
    });
    $('.pwd').val('');
    $('#pwd').val('');
    $('.password').val('');
    $('#email').val('');
    $('#usernametext').val('');


}