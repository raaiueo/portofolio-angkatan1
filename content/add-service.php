<?php
if (isset($_POST['save'])) {
  $service_name = $_POST['service_name'];
  $service_price = $_POST['service_price'];
  $service_desc = $_POST['service_desc'];

  $insert = mysqli_query($koneksi, "INSERT INTO services ( service_name, service_price, service_desc) VALUES ('$service_name','$service_price','$service_desc')");
  if ($insert) {
    header("location:?page=service&add=success");
  }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM services WHERE id = '$id' ");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
  $id = $_GET['edit'];
  $service_name = $_POST['service_name'];
  $service_price = $_POST['service_price'];
  $service_desc = $_POST['service_desc'];

  $update = mysqli_query($koneksi, "UPDATE services SET service_name='$service_name', service_price='$service_price', service_desc='$service_desc' WHERE id='$id' ");
  if ($update) {
    header("Location:?page=service&update=success");
    # code...
  }
}
?>


<form action="" method="POST">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3><?php echo isset($_GET['edit']) ? 'Edit' :  'Create New' ?>Create Service</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="">Service name</label>
              <input value="<?php echo isset($_GET['edit']) ? $rowEdit['service_name'] : '' ?>" type="text" class="form-control" name="service_name" require placeholder="enter service">
            </div>

            <div class="mb-3">
              <label for="">Service Price*</label>
              <input value="<?php echo isset($_GET['edit']) ? $rowEdit['service_price'] : '' ?>" type="number" class="form-control" name="service_price" require placeholder="enter price">
            </div>

            <div class="mb-3">
              <label for="">Service Descrption</label>
              <input value="<?php echo isset($_GET['edit']) ? $rowEdit['service_desc'] : '' ?>" type="text" class="form-control" name="service_desc" require placeholder="enter service descrption">
            </div>

            <div class="mb-3">
              <!-- adakah sebuah parameter bernama edit? jwabannya: ada jika ada edit untuk perbarui save untuk menyimpan-->
              <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' :  'save' ?>">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>