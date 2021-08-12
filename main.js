//this function checkmarks all the rows of the table
$(document).ready(function() {
    $("#mcheck").on('click', function() {
        $('input:checkbox').not(this).prop('checked', this.checked);

    });

});

function multi_email() {

    $('#multi-responce').html("Sending to <span id='curent-email'></span>");
    var emails = $('#emails').val();
    var subject = $('#subject').val();
    var message = $('#message').val();

    var path_uri =  "multiemails.php";

    var email = emails.split(',');



    $.ajax({
        type: "POST",
        url: path_uri,
        data: {
            emails: email_loop(email),
            subject: subject,
            message: message
        },
        success: function(data) {
            if (data == "success") {
                $('#multi-responce').html("Successfully sent");

            } else {
                $('#multi-responce').html(data);
            }
        }
    });
}

var i = 0;
function email_loop(emails) {
    var email = emails[i];
    $("#curent-email").html(email);
    if (++i < emails.length) {
        setTimeout(multi_email, 1000);
    }

    return email;
}