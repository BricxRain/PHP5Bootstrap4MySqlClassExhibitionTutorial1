$(document).ready(function() {
    $("#btnLogin").click(function() {
        login();
    });

    function login() {
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?login",
            dataType: "json",
            data: {
                Username: $("#txtUsername").val(),
                Password: $("#txtPassword").val()
            },
            success: function(data) {
                if (data == "True") {
                    alert("Access Granted!");
                    window.location.href = "../views/index.php";
                } else {
                    alert("Invalid account!");
                    $("#txtUsername").val("");
                    $("#txtPassword").val("");
                }
            }
        });
    }

});