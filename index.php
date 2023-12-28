<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inisialisasi array kosong
    $data = [];

    // Periksa dan tambahkan data nama ke dalam array
    if (isset($_POST["nama"])) {
        $data['nama'] = $_POST["nama"];
    }

    // Periksa dan tambahkan data kelas ke dalam array
    if (isset($_POST["kelas"])) {
        $data['kelas'] = $_POST["kelas"];
    }

    // Tampilkan array hasil
    var_dump($data);
    var_dump($data["nama"], 'xixixi');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nama" id="">
        <input type="text" name="kelas" id="">
        <button type="submit" name="submit">kirim</button>
    </form>
</body>
</html>