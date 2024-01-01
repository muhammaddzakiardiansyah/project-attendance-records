<div class="row mt-4 w-100 mx-auto">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4 mx-auto w-100">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Edit Student</h6>
                        <p class="text-sm mb-0">
                            <span class="font-weight-bold ms-1">Fill in the form below</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body px-4 pb-2">
                <form role="form" method="post">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control" autocomplete="off" value="<?= $detailStudent[0]["nis"]; ?>" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" autocomplete="off" value="<?= $detailStudent[0]["full_name"]; ?>" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="class" aria-label="Default select example" required>
                            <option selected>Open this select class</option>
                            <option value="XI PPLG 1" <?= $detailStudent[0]["class"] === "XI PPLG 1" ? "selected" : "" ?>>XI PPLG 1</option>
                            <option value="XI PPLG 2" <?= $detailStudent[0]["class"] === "XI PPLG 2" ? "selected" : "" ?>>XI PPLG 2</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Number Phone</label>
                        <input type="text" name="number_phone" class="form-control" autocomplete="off" value="<?= $detailStudent[0]["number_phone"]; ?>" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" autocomplete="off" value="<?= $detailStudent[0]["address"]; ?>" required>
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