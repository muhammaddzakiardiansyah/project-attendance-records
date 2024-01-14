<div class="row mt-4 w-100 mx-auto">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4 mx-auto w-100">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Create Presence Student</h6>
                        <p class="text-sm mb-0">
                            <span class="font-weight-bold ms-1">Fill in the form below</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body px-4 pb-2">
                <form role="form" method="post">
                    <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="nis" aria-label="Default select example" required>
                            <option selected>Open this select nis</option>
                            <?php foreach($nis as $n) : ?>
                              <option value="<?= $n["nis"]; ?>"><?= $n["nis"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Journal Collection</label>
                        <input type="text" name="journal_collection" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="student_attendance" aria-label="Default select example" required>
                            <option selected>Open this select attendance</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak hadir">Tidak hadir</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Date Attendance</label>
                        <input type="date" name="date_attendance" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>