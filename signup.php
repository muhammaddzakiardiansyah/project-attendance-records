<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.png">
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <title>
    Sign Up Account
  </title>
  <!-- sweet alert -->
  <script src="assets/dist/sweetalert2.all.min.js"></script>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <!-- php -->
  <?php
  require "functions/auth.function.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [];

    $data["nis"] = $_POST["nis"];
    $data["full_name"] = $_POST["full_name"];
    $data["class"] = $_POST["class"];
    $data["number_phone"] = $_POST["number_phone"];
    $data["address"] = $_POST["address"];

    if($data["class"] === "Open this select class") {
      echo '
        <script>
              Swal.fire({
                title: "Failed!",
                text: "Class is required!",
                icon: "warning"
              });
          </script> 
        ';
    } else if (createUser($data) > 0) {
      echo '
          <script>
              Swal.fire({
                title: "Good job!",
                text: "Success create student!",
                icon: "success",
                showConfirmButton: false,
                timer: 2500,
              });
             setTimeout(() => {
               location.href = "signin";
             }, 1500)
          </script> 
         ';
    } else {
      echo  mysqli_error($conek);
    }
  }


  ?>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Fill in the form below</p>
                </div>
                <div class="card-body">
                  <form action="signup.php" method="post">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">NIS</label>
                      <input type="text" name="nis" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Full Name</label>
                      <input type="text" name="full_name" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <select class="form-control" name="class" aria-label="Default select example" required>
                        <option selected>Open this select class</option>
                        <option value="XI PPLG 1">XI PPLG 1</option>
                        <option value="XI PPLG 2">XI PPLG 2</option>
                      </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Number Phone</label>
                      <input type="text" name="number_phone" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Address</label>
                      <input type="text" name="address" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="add-account" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="signin" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>