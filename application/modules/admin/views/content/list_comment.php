<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $subtitle; ?></h3>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <?php if($count_comment > 0){ ?>
      <?php echo $paging ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Post</th>
            <th>Isi Komentar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data_comment as $row): ?>
            <tr>
              <td><a href="<?php echo site_url('innovation/read/'.$row['post_slug']); ?>" target="new"><?php echo $row['title'] ?></a></td>
              <td><?php echo $row['comment_content'] ?></td>
              <td>
                <a href="<?php echo site_url('admin/Komentar/delete/'.$row['post_id']); ?>" class="btn btn-danger btn-xs" title="Hapus Post"><i class="fa fa-trash-o"></i></a>
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
