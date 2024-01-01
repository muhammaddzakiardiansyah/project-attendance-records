<?php 
  $name = '';
  if($page === "presence" && $event === 'add-presence') {
    $name = "Add Presence";
  } else if($page === "students" && $event === 'add-student') {
    $name = "Add Student";
  }  else if($page === "dashboard") {
    $name = 'Dashboard';
  } else if($page === "students") {
    $name = 'Students';
  }  else if($page === "presence") {
    $name = "Presence";
  } 
?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0"><?= $name; ?></h6>
        <p class="fw-bold">Hii.. <?= $_SESSION["full_name"]; ?> 😺</p>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->