<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $subtitle; ?></h3>
  </div>
  <div class="box-body">
    <div class="col-md-12">
    <form class="form-horizontal" action="<?php echo site_url('admin/category/save') ?>" method="post">
      <div class="form-group">
        <label for="category_name">Nama Kategori</label>
        <input type="text" class="form-control" id="" placeholder="Nama Kategori" name="category_name">
        <p class="help-block"><?php echo form_error('category_name'); ?></p>
      </div>
      <div class="form-group">
        <label for="category_desc">Deskripsi Kategori</label>
        <textarea name="category_desc" class="form-control" placeholder="Deskripsi Kategori"></textarea>
        <p class="help-block"><?php echo form_error('category_desc'); ?></p>
      </div>
      <div class="form-group">
        <input type="submit" name="add_category" value="Tambah Kategori" class="btn btn-primary">
      </div>
    </form>
    </div>
  </div>
</div>
