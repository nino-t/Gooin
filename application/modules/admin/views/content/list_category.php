<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $subtitle; ?></h3>
  </div>
  <div class="box-body">
    <a href="<?php echo site_url('admin/category/add'); ?>" class="btn btn-primary" style="margin-bottom:10px;">Tambah Kategori</a>
    <div class="table-responsive">
      <?php if($count_category > 0){ ?>
      <?php echo $paging ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data_category as $row): ?>
            <tr>
              <td><?php echo $row['category_name'] ?></td>
              <td>
                <a href="<?php echo site_url('admin/category/edit/'.$row['category_id']); ?>" class="btn btn-primary btn-xs" title="Edit Kategori"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url('admin/category/delete/'.$row['category_id']); ?>" class="btn btn-danger btn-xs" title="Hapus Kategori"><i class="fa fa-trash-o"></i></a>
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
