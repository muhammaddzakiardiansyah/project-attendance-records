<!-- header -->
<?php include "../components/header.php"; ?>
<!-- sidebar -->
<?php include "../components/sidebar.php"; ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Presence</h6>
      </nav>
    </div>
  </nav>
  
  <?php
    if($even !== "undefined") {
      include "../components/presence/createPresence.php";
    } else {
      include "../components/presence/tablePrsence.php";
    }
  ?>

  <?php include "../components/bottom.php"; ?>
  </div>
</main>
<!-- bottom -->
<?php include "../components/plugin.php"; ?>

<!-- footer -->
<?php include "../components/footer.php" ?>