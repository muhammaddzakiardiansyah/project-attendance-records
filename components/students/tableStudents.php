<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center">
      <a href="students?page=students&event=add-student" class="btn btn-primary">Add Student</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Table Students</h6>
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number Phone</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($dataStudent as $student) : ?>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <h6 class="mb-0 text-sm"><?= $student["nis"] ?></h6>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"><?= $student["full_name"] ?></p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0"><?= $student["class"] ?></p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0"><?= $student["number_phone"] ?></p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"><?= $student["address"] ?></p>
                  </td>
                  <td>
                    <div class="ms-auto text-center">
                      <a class="btn btn-link text-dark mb-0" href="students?page=students&event=edit-student&id=<?= $student["id"]; ?>"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                      <a class="btn btn-link text-danger text-gradient mb-0" href="delete.php?id=<?= $student["id"]; ?>" onclick="confirm('You sure delete it?')"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-3 justify-content-center">
              <?php if ($activepage > 1) : ?>
               <a href="students?page=students&p=<?= $activepage - 1; ?>">&laquo;</a>
              <?php endif; ?>
              <?php for ($i = 1; $i <= $numberOfPages; $i++) : ?>
               <?php if ($i == $activepage) : ?>
                 <a href="students?page=students&p=<?= $i; ?>" class="fs-5 text-primary fw-bold"><?= $i; ?></a>
               <?php else : ?>
                 <a href="students?page=students&p=<?= $i; ?>" class="fs-5"><?= $i; ?></a>
               <?php endif; ?>
              <?php endfor; ?>
              <?php if ($activepage < $numberOfPages) : ?>
               <a href="students?page=students&p=<?= $activepage + 1; ?>">&raquo;</a>
              <?php endif; ?>
      </div>
    </div>
  </div>