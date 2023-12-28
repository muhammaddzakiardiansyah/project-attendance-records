<?php 

require "../config/dbConnected.php";

function query($query) {
    global $conek;
    $result = mysqli_query($conek, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function deleteStudent($id) {

    global $conek;
    mysqli_query($conek, "DELETE FROM users WHERE id = '$id'");
    return mysqli_affected_rows($conek);

}

function editStudent($data) {

    global $conek;

    $id = $data["id"];
    $nis = htmlspecialchars($data["nis"]);
    $full_name = htmlspecialchars($data["full_name"]);
    $class = htmlspecialchars($data["class"]);
    $number_phone = htmlspecialchars($data["number_phone"]);
    $address = htmlspecialchars($data["address"]);

    $query = "UPDATE users SET  nis = '$nis', full_name = '$full_name', class = '$class', number_phone = '$number_phone', address = '$address' WHERE id = '$id'";


    mysqli_query($conek, $query);

    return mysqli_affected_rows($conek);

}