<?php 

require "../config/dbConnected.php";

function queryPresence($query) {
    global $conek;
    $result = mysqli_query($conek, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;

}

function createPresence($data) {

    global $conek;
    
    $id = uniqid();
    $nis = htmlspecialchars($data["nis"]);

    $dataStudent = queryPresence("SELECT * FROM users WHERE nis = '$nis'");

    $full_name = htmlspecialchars($dataStudent[0]["full_name"]);
    $class = htmlspecialchars($dataStudent[0]["class"]);
    $journalCollection = htmlspecialchars($data["journal_collection"]);
    $studentAttendance = htmlspecialchars($data["student_attendance"]);
    $dateAttendance = htmlspecialchars($data["date_attendance"]);

    $query = "INSERT INTO presences (id, nis, full_name, class, tanggal_input, journal_collection, student_attendance) VALUES ('$id', '$nis', '$full_name', '$class', '$dateAttendance', '$journalCollection', '$studentAttendance')";


    mysqli_query($conek, $query);

    return mysqli_affected_rows($conek);

}
