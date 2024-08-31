<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.png">
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <title>
    Sign In Account
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
</head>

<body>
  <!-- php -->
  <?php
  session_start();
  require 'config/dbConnected.php';
  // cek cookie
  if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {

    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    // ambil username berdasarkan id
    $result = mysqli_query($conek, "SELECT number_phone FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    // cek cookie dan number_phone
    if ($key === hash('sha256', $row['number_phone'])) {
      $_SESSION['login'] = true;
    }
  }
  // cek session
  if (isset($_SESSION["login"])) {
    header("Location: index.php?page=dashboard");
    exit;
  }

  // cek tombol submit
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [];

    $data["number_phone"] = $_POST["number_phone"];
    $data["nis"] = $_POST["nis"];

    $numberPhone = $data["number_phone"];
    $nis = $data["nis"];

    $result = mysqli_query($conek, "SELECT * FROM users WHERE number_phone = '$numberPhone'");

    // cek username 
    if (mysqli_num_rows($result) === 1) {

      $row = mysqli_fetch_assoc($result);
      if ($nis === $row["nis"]) {
        // cek session
        $_SESSION["login"] = true;
        $_SESSION["full_name"] = $row["full_name"];
        $_SESSION["role"] = $row["role"];
        // cek remember me
        if (isset($_POST["rememberme"])) {
          // buat cookie
          setcookie('id', $row['id'], time() + 60);
          setcookie('key', hash('sha256', $row['number_phone']), time() + 60);
        }

        header("Location: index.php?page=dashboard");
        exit;
      }
    }
    echo '
  <script>
              Swal.fire({
                title: "Authentication Failed!",
                text: "Number Phone / Password Inccoret!",
                icon: "error",
                showConfirmButton: false,
                timer: 2500,
              });
          </script> 
  ';
    $error = true;
  }
  ?>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                </div>
              </div>
              <div class="card-body">
                <form role="form" action="signin.php" method="post" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Number Phone</label>
                    <input type="text" name="number_phone" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="nis" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" name="rememberme" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="signup" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>