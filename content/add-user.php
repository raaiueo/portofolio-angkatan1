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
          <h3>Users</h3>
          <form action="" method="POST">
            <div class="card-body">

              <div class="row mb-3">
                <div class="col-sm-2">
                  <label for="">Level Name</label>
                </div>
                <div class="mb-3">
                  <select name="id_level" id="" class="form-control" require>
                    <option value="">Chooose Level</option>
                    <?php foreach ($rowLevel as $item): ?>
                      <option <?php echo isset($_GET['edit']) ? ($item['id']) == $rowEdit['id_level'] ? 'selected' : '' : '' ?> value="<?php echo $item['id'] ?>">
                        <?php echo $item['level_name'] ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class=" mb-3">
                <label for="">Name *</label>
                <input value="<?php echo isset($_GET['edit']) ? $rowEdit['name'] : '' ?>" type="text" name="name" class="form-control" require placeholder="enter nama">
              </div>

              <div class="mb-3">
                <label for="">masukan Email</label>
                <input value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" type="email" name="email" class="form-control" require placeholder="enter email">
              </div>

              <div class="mb-3">
                <label for="">masukan Password</label>
                <input type="password" name="password" class="form-control" require placeholder="enter password">
              </div>

              <button class="btn btn-primary" type="submit" name="save">Save</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>