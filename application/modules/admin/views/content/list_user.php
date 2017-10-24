<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $subtitle; ?></h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <?php if($count_user > 0){ ?>
      <?php echo $paging ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama User</th>
            <th>Username</th>
            <th>Tanggal Daftar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data_user as $row): ?>
            <tr>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['date_registered'] ?></td>
              <td>
                <a href="<?php echo site_url('admin/user/delete/'.$row['user_id']); ?>" class="btn btn-danger btn-xs" title="Hapus User"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php echo $paging ?>
      <?php }else{ ?>
        <center>
          <div class="box box-solid box-danger">
            <div class="box-header">
              <h3 class="box-title">Tidak Ada Data</h3>
            </div>
          </div>
        </center>

      <?php } ?>
    </div>
  </div>
</div>
