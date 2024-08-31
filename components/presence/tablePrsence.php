<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center">
      <a href="presence?page=presence&event=add-presence" class="btn btn-primary">Add Presence</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Table Presence</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIS</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Student Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Class</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Attendance</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Journal Collection</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Attendance</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($dataPresence as $presence) : ?>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <h6 class="mb-0 text-sm"><?= $presence["nis"]; ?></h6>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"><?= $presence["full_name"]; ?></p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0"><?= $presence["class"]; ?></p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0"><?= date("d F Y", strtotime($presence["date_attendance"])); ?></p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0"><?= $presence["journal_collection"]; ?></p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0"><?= $presence["student_attendance"]; ?></p>
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