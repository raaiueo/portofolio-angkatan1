<?php
if (isset($_POST['save'])) {
  $id_level = $_POST['id_level'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $insert = mysqli_query($koneksi, "INSERT INTO users (id_level,name,email,password) VALUES ('$id_level','$name','$email','$password')");
  if ($insert) {
    header('location: ?page=user&add=success');
  }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
  $id = $_GET['edit'];
  $id_level = $_POST['id_level'];
  $name = $_POST['name'];
  $email = $_POST['email'];


  $update = mysqli_query($koneksi, "UPDATE users SET id_name='$id_name', name='$name', email='$email', password='$password'  WHERE id='$id' ");
  if ($update) {
    header("Location:?page=users&update=success");
    # code...
  }
}

$selectLevel = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");
$rowLevel = mysqli_fetch_all($selectLevel, MYSQLI_ASSOC);

?>

<form action="" method="POST">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3><?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' ?>Trans Order</h3>
          <form action="" method="POST">
            <div class="card-body mt-3">
              <div class="row">
                <div class="col-sm-6">
                  <div class="mb-3 row">
                    <div class="col-sm-4">
                      <label for="">Kode Transaksi</label>
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="trans_code" readonly>
                    </div>
                  </div>


                  <div class="mb-3 row">
                    <div class="col-sm-4">
                      <label for="">Kode Transaksi</label>
                    </div>
                    <div class="col-sm-5">
                      <input type="date" class="form-control" name="order_date" readonly>
                    </div>
                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="mb-3 row">
                    <div class="col-sm-4">
                      <label for="">Customer Name</label>
                    </div>
                    <div class="col-sm-8">
                      <select name="id_customer" id="" class="form-control">
                        <option value="">Choose Customer</option>
                        <option value=""></option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <div class="col-sm-4">
                      <label for="">Pickup Date</label>
                    </div>
                    <div class="col-sm-5">
                      <input type="date" class="form-control" name="order_end_date" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <div class="row mt-5">
          <div class="col-sm-12">
            <div class="mb-3" align="right">
              <button class="btn btn-success bnt-sm add-row" type="button">Add Row</button>
            </div>
            <table class="table table-bordered table-order">
              <thead>
                <tr>
                  <th>Service</th>
                  <th>Qty</th>
                  <th>Notes</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="mb-3">
          <button class="btn btn-primary" type="submit" name="save">Save</button>
        </div>

</form>
</div>
</div>
</div>
</div>
</form>