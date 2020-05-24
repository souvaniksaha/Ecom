$(document).ready(function () {

    //check admin enter current password or not
    $("#current_pw").keyup(function () {

        let current_pwd = $("#current_pw").val();
        $.ajax({
            type: 'post',
            url: '/admin/check-current-pw',
            //data which will send to the server
            data: {
                current_pw: current_pwd
            },
            success: function (resp) {
                if (resp == "false") {
                    $("#checkCurrentPassword").html("<font color=red>Current password is incorrect!</font>");
                } else {
                    $("#checkCurrentPassword").html("<font color=green>Correct Password</font>");
                }
            },
            error: function (err) {
                alert(err);
            }
        });
    });

});
