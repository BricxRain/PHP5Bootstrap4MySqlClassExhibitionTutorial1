$(document).ready(function() {

    getUsers();

    function getUsers() {
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?getUsers",
            dataType: "json",
            data: {

            },
            success: function(data) {
                $("#tableUsers tbody").html("");
                if (data == "No Data") {
                    var appendTable = $("<tr>").append(
                        $("<td>").text(data + " Found.")
                    );
                    appendTable.appendTo("#tableUsers tbody");
                } else {
                    $.each(data, function(i, e) {
                        var appendTable = $("<tr id='" + e[0] + "'>").append(
                            $("<td>").html("<input type='checkbox' class='form-control' id='" + e[0] + "'>"),
                            $("<td>").text(e[4]),
                            $("<td>").text(e[2]),
                        );
                        appendTable.appendTo("#tableUsers tbody");
                    });
                }
            }
        });
    }

    $("#checkAll").click(function(){
        $('#tableUsers input:checkbox').not(this).prop('checked', this.checked);
    });

    $("#deleteUser").click(function() {
        var checkboxesId = $("#tableUsers input:checkbox:checked").map(function(i, el) { 
            return $(el).not("#checkAll").attr("id"); 
        }).get();

        if(checkboxesId != '') {
            deleteUser(checkboxesId);
            alert("Users deleted.");
            getUsers();
        } else {
            alert("Choose a user first.");
        }
    });

    function deleteUser(cbID) {
        cbID.forEach(function(item) {
            $.ajax({
                type: "post",
                url: "../controller/IndexController.php?deleteUser",
                dataType: "json",
                data: {
                    UserId: item
                },
                success: function(data) {
                    
                }
            });
        });
    }

    $("#btnAddUser").click(function() {
        $("#modalAddUser").modal("show");
        $("#modalAddUser #pasConPassword").prop("disabled", true);
        getProvince();
    });

    $("#modalAddUser").on("input","#pasPassword", function() {
        var password = $("#modalAddUser #pasPassword").val();
        if (password.length > 5) {
            $("#modalAddUser #pasPassword").css("border", "2px solid green");
            $("#modalAddUser #pasConPassword").prop("disabled", false);
        } else {
            $("#modalAddUser #pasPassword").removeAttr('style');
            $("#modalAddUser #pasConPassword").removeAttr('style');
            $("#modalAddUser #pasConPassword").val("");
            $("#modalAddUser #pasConPassword").prop("disabled", true);
        }
    });

    $("#modalAddUser").on("input","#pasConPassword", function() {
        var password = $("#modalAddUser #pasPassword").val();
        var conpassword = $("#modalAddUser #pasConPassword").val();
        if (password == conpassword) {
            $("#modalAddUser #pasConPassword").css("border", "2px solid green");
        } else {
            $("#modalAddUser #pasConPassword").removeAttr('style');
        }
    });

    $("#modalAddUser").on("click", "#btnSaveUser", function() {
        var txtFirstname = $("#modalAddUser #txtFirstname").val();
        var txtLastname = $("#modalAddUser #txtLastname").val();
        var txtUsername = $("#modalAddUser #txtUsername").val();
        var pasPassword = $("#modalAddUser #pasPassword").val();
        var pasConPassword = $("#modalAddUser #pasConPassword").val();
        var txtAddress = $("#modalAddUser #txtAddress").val();
        var selGender = $("#modalAddUser #selGender").val();
        var selProvince = $("#modalAddUser #selProvince").val();
        var selCity = $("#modalAddUser #selCity").val();

        if ((txtFirstname == "") || (txtLastname == "") || (txtUsername == "") || (pasPassword == "") || (pasConPassword == "") || (txtAddress == "") || (selGender == "") || (selProvince == "") || (selCity == "")) {
            alert("Dont leave an empty field.");
        } else {
            saveUser();
            alert("User has been added.");
            $("#modalAddUser").modal("hide");
            setTimeout( function() {
                getUsers();
            }, 200);
        }
    });

    function saveUser() {
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?saveUser",
            dataType: "json",
            data: {
                txtFirstname: $("#modalAddUser #txtFirstname").val(),
                txtLastname: $("#modalAddUser #txtLastname").val(),
                txtUsername: $("#modalAddUser #txtUsername").val(),
                pasPassword: $("#modalAddUser #pasPassword").val(),
                txtAddress: $("#modalAddUser #txtAddress").val(),
                selGender: $("#modalAddUser #selGender").val(),
                selProvince: $("#modalAddUser #selProvince").val(),
                selCity: $("#modalAddUser #selCity").val()
            },
            success: function(data) {
                
            }
        });
    }

    function getProvince() {
        $("#modalAddUser #selProvince").html("");
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?getProvince",
            dataType: "json",
            data: {

            },
            success: function(data) {
                $("#modalAddUser #selProvince").html("<option></option>");
                $.each(data, function(i, e) {
                    $("#modalAddUser #selProvince").append("<option value='" + e[1] + "'>" + e[3] + "</option>");
                });
            }
        });
    }

    function getProvinceEdit() {
        $("#modalEditUser #eselProvince").html("");
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?getProvince",
            dataType: "json",
            data: {

            },
            success: function(data) {
                $("#modalEditUser #eselProvince").html("<option></option>");
                $.each(data, function(i, e) {
                    $("#modalEditUser #eselProvince").append("<option value='" + e[1] + "'>" + e[3] + "</option>");
                });
            }
        });
    }

    $("#modalAddUser").on("change", "#selProvince", function() {
        if (this.value == "") {
            alert("Empty!");
        } else {
            getCity(this.value);
        }
    });

    function getCity(ProvinceId) {
        $("#modalAddUser #selCity").html("");
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?getCity",
            dataType: "json",
            data: {
                ProvinceId: ProvinceId
            },
            success: function(data) {
                $("#modalAddUser #selCity").html("<option></option>");
                $.each(data, function(i, e) {
                    $("#modalAddUser #selCity").append("<option value='" + e[1] + "'>" + e[3] + "</option>");
                });
            }
        });
    }

    function getCityEdit(ProvinceId) {
        $("#modalEditUser #eselCity").html("");
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?getCity",
            dataType: "json",
            data: {
                ProvinceId: ProvinceId
            },
            success: function(data) {
                $("#modalEditUser #eselCity").html("<option></option>");
                $.each(data, function(i, e) {
                    $("#modalEditUser #eselCity").append("<option value='" + e[1] + "'>" + e[3] + "</option>");
                });
            }
        });
    }

    $("#tableUsers tbody").on("dblclick", "tr", function() {
        var trid = $(this).closest('tr').attr('id');
        getEditUser(trid);
    });

    function getEditUser(TRID) {
        $("#modalEditUser").modal("show");
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?getEditUser",
            dataType: "json",
            data: {
                TRID: TRID
            },
            success: function(data) {
                // console.log(data);
                $.each(data, function(i, e) {
                    $("#modalEditUser #eID").text(e['id']);
                    $("#modalEditUser #etxtFirstname").val(e['firstname']);
                    $("#modalEditUser #etxtLastname").val(e['lastname']);
                    $("#modalEditUser #etxtUsername").val(e['username']);
                    $("#modalEditUser #etxtAddress").val(e['address']);
                    $("#modalEditUser #eselGender").val(e['gender']);

                    setTimeout(function() {
                        getProvinceEdit();
                    }, 100);

                    setTimeout(function() {
                        $("#modalEditUser #eselProvince").val(e['province_id']);
                    }, 150);
                    
                    setTimeout(function() {
                        getCityEdit(e['province_id']);
                    }, 200);

                    setTimeout(function() {
                        $("#modalEditUser #eselCity").val(e['city_id']);
                    }, 250);
                });
            }
        });
    }

    $("#modalEditUser").on("click", "#btnUpdateUser", function() {
        var etxtFirstname = $("#modalEditUser #etxtFirstname").val();
        var etxtLastname = $("#modalEditUser #etxtLastname").val();
        var etxtUsername = $("#modalEditUser #etxtUsername").val();
        var etxtAddress = $("#modalEditUser #etxtAddress").val();
        var eselGender = $("#modalEditUser #eselGender").val();
        var eselProvince = $("#modalEditUser #eselProvince").val();
        var eselCity = $("#modalEditUser #eselCity").val();

        if ((etxtFirstname == "") || (etxtLastname == "") || (etxtUsername == "") || (etxtAddress == "") || (eselGender == "") || (eselProvince == "") || (eselCity == "")) {
            alert("Dont leave an empty field.");
        } else {
            updateUser();
            alert("User has been updated.");
            $("#modalEditUser").modal("hide");
            setTimeout( function() {
                getUsers();
            }, 200);
        }
        
        // alert(etxtFirstname + " " + etxtLastname + " " + etxtUsername + " " + etxtAddress + " " + eselGender + " " + eselProvince + " " + eselCity);

    });

    function updateUser() {
        $.ajax({
            type: "post",
            url: "../controller/IndexController.php?updateUser",
            dataType: "json",
            data: {
                eID: $("#modalEditUser #eID").text(),
                etxtFirstname: $("#modalEditUser #etxtFirstname").val(),
                etxtLastname: $("#modalEditUser #etxtLastname").val(),
                etxtUsername: $("#modalEditUser #etxtUsername").val(),
                etxtAddress: $("#modalEditUser #etxtAddress").val(),
                eselGender: $("#modalEditUser #eselGender").val(),
                eselProvince: $("#modalEditUser #eselProvince").val(),
                eselCity: $("#modalEditUser #eselCity").val()
            },
            success: function(data) {
                console.log(data);
            }
        });
    }

});