<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <!-- sweet alert -->
    <script src="assets/dist/sweetalert2.all.min.js"></script>
</head>
<body>

<?php 

require "functions/student.function.php";

$id = $_GET["id"];

if(deleteStudent($id) > 0) {
    echo '
        <script>
              Swal.fire({
                title: "Good job!",
                text: "Success delete student!",
                icon: "success",
                showConfirmButton: false,
                timer: 2500,
              });
             setTimeout(() => {
               location.href = "students?page=students";
             }, 1500)
          </script> 
        ';
}

?>
    
</body>
</html>
