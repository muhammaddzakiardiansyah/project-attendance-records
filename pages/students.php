<!-- header -->
<?php include "../components/header.php"; ?>
<!-- sidebar -->
<?php include "../components/sidebar.php"; ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?php include "../components/navbar.php"; ?>
  <!-- End Navbar -->
  <?php

  require "../functions/student.function.php";
  require "../functions/auth.function.php";

  $id = isset($_GET["id"]) ? $_GET["id"] : "undefined";

  $lotsOfData = 5;
  $amountOfData = count(query("SELECT * FROM users WHERE role <> 'admin'"));
  $numberOfPages = ceil($amountOfData / $lotsOfData);
  $activepage = isset($_GET["p"]) ? $_GET["p"] : 1;
  $firstData = ($lotsOfData * $activepage) - $lotsOfData;

  $dataStudent = query("SELECT * FROM users WHERE role <> 'admin' ORDER BY created_at LIMIT $firstData, $lotsOfData");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [];

    $data["id"] = $id;
    $data["nis"] = $_POST["nis"];
    $data["full_name"] = $_POST["full_name"];
    $data["class"] = $_POST["class"];
    $data["number_phone"] = $_POST["number_phone"];
    $data["address"] = $_POST["address"];

    if ($data["id"] === "undefined") {
      if (createUser($data) > 0) {
        echo '
          <script>
              Swal.fire({
                title: "Good job!",
                text: "Success create student!",
                icon: "success"
              });
             setTimeout(() => {
               location.href = "students.php?page=students";
             }, 1500)
          </script> 
          ';
      } else {
        echo  mysqli_error($conek);
      }
    } else {
      if (editStudent($data) > 0) {
        echo '
        <script>
              Swal.fire({
                title: "Good job!",
                text: "Success update student!",
                icon: "success"
              });
             setTimeout(() => {
               location.href = "students.php?page=students";
             }, 1500)
          </script> 
        ';
      } else {
        echo  mysqli_error($conek);
      }
    }
  }



  $detailStudent = query("SELECT * FROM users WHERE id = '$id'");


  ?>
  <?php
  if ($event === "add-student") {
    include "../components/students/createStudents.php";
  } else if ($event === "edit-student") {
    include "../components/students/editStudent.php";
  } else {
    include "../components/students/tableStudents.php";
  }
  ?>

  <?php include "../components/bottom.php"; ?>
  </div>
</main>
<?php include "../components/plugin.php"; ?>

<!-- footer -->
<?php include "../components/footer.php"; ?>