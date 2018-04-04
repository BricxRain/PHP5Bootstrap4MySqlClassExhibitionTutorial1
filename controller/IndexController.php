<?php
include_once("../config/MySqlClass.php");

if (isset($_REQUEST['login'])) {
    login();
} else if(isset($_REQUEST['getUsers'])) {
    getUsers();
} else if(isset($_REQUEST['deleteUser'])) {
    deleteUser();
} else if(isset($_REQUEST['getProvince'])) {
    getProvince();
} else if(isset($_REQUEST['getCity'])) {
    getCity();
} else if(isset($_REQUEST['saveUser'])) {
    saveUser();
} else if(isset($_REQUEST['getEditUser'])) {
    getEditUser();
} else if(isset($_REQUEST['updateUser'])) {
    updateUser();
}

function updateUser() {
    $eID = $_REQUEST['eID'];
    $etxtFirstname = $_REQUEST['etxtFirstname'];
    $etxtLastname = $_REQUEST['etxtLastname'];
    $etxtUsername = $_REQUEST['etxtUsername'];
    $etxtAddress = $_REQUEST['etxtAddress'];
    $eselGender = $_REQUEST['eselGender'];
    $eselProvince = $_REQUEST['eselProvince'];
    $eselCity = $_REQUEST['eselCity'];
    $db = new MySqlClass();
    $result = $db->executeQuery("UPDATE lib_users SET firstname='$etxtFirstname', lastname='$etxtLastname', username='$etxtUsername', address='$etxtAddress', gender='$eselGender', province_id='$eselProvince', city_id='$eselCity' WHERE id='$eID'");
    echo json_encode($result);
}

function saveUser() {
    $txtFirstname = $_REQUEST['txtFirstname'];
    $txtLastname = $_REQUEST['txtLastname'];
    $txtUsername = $_REQUEST['txtUsername'];
    $pasPassword = $_REQUEST['pasPassword'];
    $txtAddress = $_REQUEST['txtAddress'];
    $selGender = $_REQUEST['selGender'];
    $selProvince = $_REQUEST['selProvince'];
    $selCity = $_REQUEST['selCity'];
    // $result = array($txtUsername, $pasPassword, $txtFirstname, $txtLastname, $selGender, $txtAddress, $selProvince, $selCity);
    $db = new MySqlClass();
    $result = $db->executeQuery("INSERT INTO lib_users (username, password, firstname, lastname, gender, address, province_id, city_id) VALUES('$txtUsername','$pasPassword','$txtFirstname','$txtLastname','$selGender','$txtAddress','$selProvince','$selCity')");
    echo json_encode($result);
}

function getCity() {
    $ProvinceId = $_REQUEST['ProvinceId'];
    $db = new MySqlClass();
    $result = $db->getData("SELECT * FROM lib_city WHERE province_id='$ProvinceId' ORDER BY city_name ASC");
    echo json_encode($result);
}

function getProvince() {
    $db = new MySqlClass();
    $result = $db->getData("SELECT * FROM lib_province ORDER BY province_name ASC");
    echo json_encode($result);
}

function deleteUser() {
    $UserId = $_REQUEST['UserId'];
    $db = new MySqlClass();
    $result = $db->executeQuery("DELETE FROM lib_users WHERE id='$UserId'");
    echo json_encode($result);
}

function getUsers() {
    $db = new MySqlClass();
    $result = $db->getData("SELECT * FROM lib_users");
    echo json_encode($result);
}

function login() {
    $Username = $_REQUEST['Username'];
    $Password = $_REQUEST['Password'];
    $db = new MySqlClass();
    $result = $db->executeQuery("SELECT id FROM lib_users WHERE username='$Username' AND password='$Password'");
    echo json_encode($result);
}

function getEditUser() {
    $TRID = $_REQUEST['TRID'];
    $db = new MySqlClass();
    $result = $db->getData("SELECT * FROM lib_users WHERE id='$TRID'");
    echo json_encode($result);
}

?>