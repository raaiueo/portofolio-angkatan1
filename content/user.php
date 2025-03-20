<?php
$queryUser = mysqli_query($koneksi, "SELECT users.*,levels.level_name FROM users LEFT JOIN levels ON users.id_level=levels.id  ORDER BY users.id DESC");
$rowUser = mysqli_fetch_all($queryUser, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");
  header("Locarion:?page=user&notif=success");
}
?>


<form action="" method="POST">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3>Data User</h3>
        </div>
        <div class="card-body">
          <div class="mb-3 mt-3">
            <a href="?page=add-user" class="btn btn-primary">Create New Users</a>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Id Level</th>
                <th>Name</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($queryUser as $row) : ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['level_name'] ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td>
                    <a href="?page=add-user&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="?page=user&delete=<?php echo $row['id'] ?>" onclick="return confirm('Gueeee apushhh nichhh ngabbbss')" class="btn btn-danger btn-sm">Deleted</a>
                  </td>
                </tr>
              <?php endforeach ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>