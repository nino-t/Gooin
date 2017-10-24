<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $subtitle; ?></h3>
  </div>
  <div class="box-body">
    <table style="margin-bottom: 10px;">
      <tr>
        <td><div class="bg-success" style="border:1px solid #000;width:20px;height:20px"></div></td>
        <td>Sudah dipublikasikan</td>
        <td><div class="bg-warning" style="border:1px solid #000;width:20px;height:20px"></div></td>
        <td>Belum dipublikasikan</td>
      </tr>
    </table>
    <div class="table-responsive">
      <?php if($count_post > 0){ ?>
      <?php echo $paging ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Di post oleh</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data_post as $row): ?>
            <tr <?php echo $row['post_sts']==1?'class="success"':'class="warning"'; ?>>
              <td><?php echo $row['post_title'] ?></td>
              <td><?php echo $row['category_name'] ?></td>
              <td><?php echo $row['username'] ?></td>
              <td>
                <a href="<?php echo site_url('innovation/read/'.$row['post_slug']); ?>" target="new" class="btn btn-primary btn-xs" title="Lihat Post"><i class="fa fa-eye"></i></a>
                <a href="<?php echo site_url('admin/post/delete/'.$row['post_id']); ?>" class="btn btn-danger btn-xs" title="Hapus Post"><i class="fa fa-trash-o"></i></a>
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
