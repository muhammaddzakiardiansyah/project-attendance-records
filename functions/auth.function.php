<?php 

include "../config/dbConnected.php";

function createUser($data) {

    global $conek;

    $id = uniqid();
    $nis = htmlspecialchars($data["nis"]);
    $full_name = htmlspecialchars($data["full_name"]);
    $class = htmlspecialchars($data["class"]);
    $number_phone = htmlspecialchars($data["number_phone"]);
    $address = htmlspecialchars($data["address"]);

    // cek nis alredy or not ?

    $result = mysqli_query($conek, "SELECT number_phone FROM users WHERE number_phone = '$number_phone'");

    if( mysqli_fetch_assoc($result) ) {
        echo "
        <script>
           alert('Account have alredy!');
        </script>
      ";
      return false;
    }

    // create new user to database
     mysqli_query($conek, "INSERT INTO users (id, nis, full_name, class, number_phone, address) VALUES('$id', '$nis', '$full_name', '$class', '$number_phone', '$address')");

    return mysqli_affected_rows($conek);
 } 

 