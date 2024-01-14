<!-- header -->
<?php include "../components/header.php"; ?>
<!-- sidebar -->
<?php include "../components/sidebar.php"; ?>

<?php 
  require "../functions/student.function.php";
  require "../functions/presence.function.php";

  $fullName = trim($_SESSION["full_name"]);

  $totalPresence = queryPresence("SELECT COUNT(*) as total FROM presences WHERE DATE(created_at) = CURDATE()");

  $dataPresence = queryPresence("SELECT * FROM presences WHERE DATE(created_at) = CURDATE()");

  $totalStudents = query("SELECT COUNT(*) as total FROM users WHERE role <> 'admin'");

  // student

  $studentTotalPresence = queryPresence("SELECT COUNT(*) as total FROM presences WHERE full_name = '$fullName' AND student_attendance = 'Hadir'");

  $studentTotalNotPresence = queryPresence("SELECT COUNT(*) as total FROM presences WHERE full_name = '$fullName' AND student_attendance != 'Hadir'");

  $studentPresence = queryPresence("SELECT * FROM presences WHERE full_name = '$fullName'");




  $startString = $_SESSION["full_name"];
  $wordArray = explode(" ", $startString);
  $arrayOne = $wordArray[0];
  $arrayTwo = $wordArray[1] ?? " ";
  $endString = $arrayOne . ' ' . $arrayTwo;

?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?php include "../components/navbar.php"; ?>
  <!-- End Navbar -->
  <?php if($_SESSION["role"] === "admin") : ?>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Students</p>
              <h4 class="mb-0"><?= $totalStudents ? $totalStudents[0]["total"] : '0' ?></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Students Present</p>
              <h4 class="mb-0"><?= $totalPresence ? $totalPresence[0]["total"] : '0' ?></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Student Not Present</p>
              <h4 class="mb-0"><?= $totalStudents[0]["total"] - $totalPresence[0]["total"] ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Students who have attended</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-check text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1"><?= $totalPresence ? $totalPresence[0]["total"] : '0' ?> students have attended</span>
                </p>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">student name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIS</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Attendance</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Attendance</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($dataPresence as $presence) : ?>
                  <tr>
                  <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= $presence["full_name"] ?> </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= $presence["nis"] ?> </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= $presence["student_attendance"] ?> </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= date("d F Y H:i", strtotime($presence["created_at"])); ?> </span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a> x <a href="https://muhammaddzakiardiansyah.github.io/codeauthentic/" class="font-weight-bold" target="_blank">Codeauthentic</a>
              for a better web.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <?php else : ?>
  <h2 class="text-center mt-5 mb-4">Good luck with your internship broww</h2>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize"><?= $endString; ?> Present</p>
              <h4 class="mb-0"><?= $studentTotalPresence ? $studentTotalPresence[0]["total"] : '0' ?></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize"><?= $endString; ?> Not Present</p>
              <h4 class="mb-0"><?= $studentTotalNotPresence[0]["total"] ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-11 col-md-6 mb-md-0 mb-4 mx-auto">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Attendance recording <?= $_SESSION["full_name"]; ?> 🎉</h6>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">student name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIS</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Class</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date of Attendance</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Attendance</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Journal collection</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($studentPresence as $presence) : ?>
                  <tr>
                  <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= $presence["full_name"] ?> </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= $presence["nis"] ?> </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= $presence["class"] ?> </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= date("d F Y", strtotime($presence["tanggal_input"])); ?> </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= $presence["student_attendance"] ?> </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> <?= $presence["journal_collection"] ?> </span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
     include "../components/bottom.php";
  endif; ?>
</main>
<?php include "../components/plugin.php"; ?>

<!-- footer -->
<?php include '../components/footer.php'; ?>