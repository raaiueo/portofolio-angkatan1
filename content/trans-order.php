<?php
$query = mysqli_query($koneksi, "SELECT trans_order.*,customers.customer_name FROM trans_order LEFT JOIN customers ON customers.id=trans_order.id_customer 
                          WHERE deleted_at = 0 ORDER BY trans_order.id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = mysqli_query($koneksi, "UPDATE trans_order SET deleted_at=1 WHERE id='$id'");
  header("Locarion:?page=trans-order&notif=success");
}
?>



<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h3>Data Transaksi Order</h3>
      </div>
      <div class="card-body">
        <div class="mb-3 mt-3">
          <a href="?page=add-trans-order" class="btn btn-primary">Create New Order</a>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Trans Code</th>
              <th>Customer Name</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($query as $row) : ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['trans_code'] ?></td>
                <td><?php echo $row['customer_name'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                  <a href="?page=add-trans-order&detail=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                  <a href="?page=trans-order&delete=<?php echo $row['id'] ?>" onclick="return confirm('Gueeee apushhh nichhh ngabbbss')" class="btn btn-danger btn-sm">Deleted</a>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>