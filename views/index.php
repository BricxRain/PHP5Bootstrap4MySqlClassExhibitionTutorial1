<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Document</title>

    <style>
        #tableUsers tbody tr {
            cursor: pointer;
        }
    </style>

</head>
<body>
    
    <div class="container">
        <div style="margin-top: 20px;" class="row">
            <div class="col-md-3">
                <a href="../index.php" class="btn btn-outline-secondary">Logout</a>
            </div>
            <div class="col-md-6">
                <div align="center" style="padding: 5px;" class="col-md-12">
                    <h2>Personal Information</h2>
                </div>

                <div align="center" style="padding: 5px;" class="col-md-12">
                    <button id="btnAddUser" class="btn btn-outline-primary">Add User</button>
                </div>
            </div>
            <div class="col-md-3">
            
            </div>
        </div>

        <div style="margin-top: 20px;" class="row">
            <table id="tableUsers" class="table table-hover">
                <thead>
                    <tr>
                    <th><input type="checkbox" class="form-control" id="checkAll"></th>
                    <th>Name</th>
                    <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

        <div class="row">
            <div style="margin-top: 20px;" class="col-md-12">
                <button id="deleteUser" class="btn btn-outline-danger float-right">Delete</button>
            </div>
        </div>

    </div>


    <div id="modalAddUser" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="text" class="form-control" id="txtFirstname" placeholder="Firstname">
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="text" class="form-control" id="txtLastname" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="text" class="form-control" id="txtUsername" placeholder="Username">
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="password" class="form-control" id="pasPassword" placeholder="Password">
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="password" class="form-control" id="pasConPassword" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="text" class="form-control" id="txtAddress" placeholder="Address">
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                            <select class="form-control" id="selGender">
                                <option></option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <select class="form-control" id="selProvince"></select>
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                            <select class="form-control" id="selCity"></select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnSaveUser" type="button" class="btn btn-outline-primary">Save User</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalEditUser" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="eID" hidden></p>
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="text" class="form-control" id="etxtFirstname" placeholder="Firstname">
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="text" class="form-control" id="etxtLastname" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="text" class="form-control" id="etxtUsername" placeholder="Username">
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <input type="text" class="form-control" id="etxtAddress" placeholder="Address">
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                            <select class="form-control" id="eselGender">
                                <option></option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div style="padding: 5px;" class="col-md-6">
                            <select class="form-control" id="eselProvince"></select>
                        </div>
                        <div style="padding: 5px;" class="col-md-6">
                            <select class="form-control" id="eselCity"></select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnUpdateUser" type="button" class="btn btn-outline-primary">Update User</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/index.js"></script>

</body>
</html>