<?php
include_once("config.php");

class MySqlClass {

    function getData($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        if ($result-> num_rows > 0) {
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
        } else {
            $data = "No Data";
        }
        return $data;
    }

    function executeQuery($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        if ($result-> num_rows > 0) {
            $data = "True";
        } else {
            $data = "False";
        }
        return $data;
    }

    function fetchQuery($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        return $result;
    }

}

?>