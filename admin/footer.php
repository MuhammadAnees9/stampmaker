</div>

</body>

</html>
<script type="text/javascript">
base_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/';

// update password
function UpdatePassword(ele) {
    if (event.key === 'Enter') {
        const pass = ele.value;
        const id = ele.id;
        var regularExpression = /^[a-zA-Z]$/;
        if (pass.trim() == "") {
            swal("Password Field Empty", "Password field is required", "warning");
        }
        if (pass.trim().length < 5) {
            swal("Miniumum 5 characters are required", "Password length must be 5 minimum character",
                "warning");
        } else
            $.ajax({
                url: "./checkauth.php", //the page containing php script
                type: "PUT", //request type,
                dataType: 'json',
                // contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    password: pass,
                    id: id,

                }),
                success: function(response) {

                    console.log(response);
                    if (response.status == 200) {
                        swal("Password Updated", response.message, "success");
                        window.location.reload();
                        $('.pwd').attr('disabled', false)
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // console.log(JSON.stringify(jqXHR));
                    // console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });

    }
}

$('.delete').click(function() {
    var id = $(this).attr('id');
    $.ajax({
        url: "./checkauth.php", //the page containing php script
        type: "DELETE", //request type,
        dataType: 'json',
        // contentType: "application/json; charset=utf-8",
        data: JSON.stringify({
            id: id,

        }),
        success: function(response) {
            if (response.status == 200) {
                $('.delete').attr('disabled', false)
                swal("Deleted", response.message, "success");
                window.location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // console.log(JSON.stringify(jqXHR));
            // console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });

});

function addUser() {
    var Txtemail = $("#email").val();
    var Txtpass = $("#pass").val();
    var TxtlangSource = $("#langS").val();
    var langTarget = $("#langTarget").val();
    var TxtUsername = $("#usernametext").val();
    var action = $("#action").val();
    var role = $("#role").val();
    var isActive = $("#isActive").val();
    if (Txtpass.trim().length < 5) {
        swal("Miniumum 5 characters are required", "Password length must be 5 minimum character",
            "warning");
    } else
        $.ajax({
            url: "./register.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: JSON.stringify({
                email: Txtemail,
                password: Txtpass,
                nativeLanguage: TxtlangSource,
                langTarget: langTarget,
                username: TxtUsername,
                role: role,
                isActive: isActive,
                action: action,
            }),
            success: function(response) {

                if (response.status == 201) {
                    $('#myModalLogin').modal('hide');
                    swal("Registered", response.message, "success");
                    location.reload();
                }
                if (response.status == 422) {
                    // $('#myModalLogin').modal('hide');
                    swal("Warning", response.message, "error");
                    // location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });


}

function logout() {
    $.ajax({
        url: "./logout.php", //the page containing php script
        type: "post", //request type,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            swal("Logout", "You are log out successfully.", "success").then(function() {
                window.location.href = 'login.php';
            });

        }
    });
}
window.onload = () => {

    $('#langS').select2({
        width: '100%',
        placeholder: "Select Native / Source Language",
        allowClear: true,
    });
    $('#langTarget').select2({
        width: '100%',
        placeholder: "Select Target Language",
        allowClear: true,
    });
    //datatables
    $('#table').DataTable({
        dom: 'Bfrtip',
        'autocomplete': 'off',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.dataTables_filter input').attr({
        'autocomplete': 'off'
    });
    $('#tablesession').DataTable({
        "order": [
            [0, 'desc']
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.dataTables_filter input').attr({
        'autocomplete': 'off'
    });
    $('#admintable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.dataTables_filter input').attr({
        'autocomplete': 'off'
    });

};
</script>