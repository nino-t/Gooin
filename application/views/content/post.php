<!-- <div class="container">

  <h2><?php echo $subtitle ?></h2>
  <div class="col-md-12">
    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('innovation/do_post'); ?>" method="post">
      <div class="form-group">
        <label for="">Kategori Inovasi</label>
        <select class="form-control" name="category">
          <option value="">--Pilih Kategori--</option>
          <?php foreach ($category as $row): ?>
            <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
          <?php endforeach; ?>
        </select>
        <p class="help-block"><?php echo form_error('category'); ?></p>
      </div>
      <div class="form-group">
        <label for="">Judul Inovasi</label>
        <input type="text" class="form-control" name="post_title" placeholder="Judul Inovasi" value="<?php echo set_value('post_title'); ?>">
        <p class="help-block"><?php echo form_error('post_title'); ?></p>
      </div>
      <div class="form-group">
        <label for="">Deskripsi Inovasi</label>
        <textarea class="form-control" name="post_content" rows="20" value="<?php echo set_value('post_content'); ?>" ></textarea>
        <p class="help-block"><?php echo form_error('post_content'); ?></p>
      </div>
      <div class="form-group">
        <label for="">Youtube id http://www.youtube.com/watch?v= </label>
        <p class="help-block">*Gunakan video untuk memperkenalkan siapa anda dan inovasi anda</p>
        <input type="text" class="form-control" name="youtube_id" placeholder="Contoh 6qAWAuINO0E" value="<?php echo set_value('youtube_id'); ?>">
        <p class="help-block"><?php echo form_error('youtube_id'); ?></p>
      </div>
      <div class="form-group">
        <label for="">Gambar</label>
        <p class="help-block">*Gambar di gunakan untuk cover</p>
        <input type="file" name="gambar">
        <p class="help-block">*<?php echo form_error('gambar'); ?></p>
      </div>
      <div class="form-group">
        <label for="">Link Website</label>
        <p class="help-block">*Link website di gunakan untuk informasi selengkap-lengkapnya inovasi anda</p>
        <input type="text" class="form-control" name="link_website" placeholder="Link Website" value="<?php echo set_value('link_website'); ?>">
        <p class="help-block"><?php echo form_error('link_website'); ?></p>
      </div>
      <div class="form-group">
        <input type="submit" name="save" value="Save" class="btn btn-primary">
      </div>
    </form>
  </div>
</div> -->
<div class="conten-data">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Share Inovasi</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="bagian-inti-1">
                    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('innovation/do_post'); ?>">
                        <div class="form-group">
                            <label for="category">kategori inovasi:</label>
                            <select name="category" class="form-control">
                                <option value="">--Pilih Kategori--</option>
                                <?php foreach ($category as $row): ?>
                                  <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="help-block"><?php echo form_error('category'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="post_title">judul inovasi:</label>
                            <input type="text" class="form-control" name="post_title" placeholder="Judul Inovasi">
                            <p class="help-block"><?php echo form_error('post_title'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Inovasi</label>
                            <textarea class="form-control" name="post_content" rows="50"></textarea>
                            <p class="help-block"><?php echo form_error('post_content'); ?></p>
                      </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="bagian-inti-2">
                  <div class="form-group">
                    <label for="">Youtube id http://www.youtube.com/watch?v= </label>
                    <p class="help-block">*Gunakan video untuk memperkenalkan siapa anda dan inovasi anda(opsional)</p>
                    <input type="text" class="form-control" name="youtube_id" placeholder="Contoh 6qAWAuINO0E">
                    <p class="help-block"><?php echo form_error('youtube_id'); ?></p>
                  </div>
                  <div class="form-group">
                    <label for="">Gambar</label>
                    <p class="help-block">*Gambar di gunakan untuk cover</p>
                    <input type="file" name="gambar">
                    <p class="help-block"><?php echo form_error('gambar'); ?></p>
                  </div>
                  <div class="form-group">
                    <label for="">Link Website</label>
                    <p class="help-block">*Link website di gunakan untuk informasi selengkap-lengkapnya inovasi anda</p>
                    <input type="text" class="form-control" name="link_website" placeholder="Link Website">
                    <p class="help-block"><?php echo form_error('link_website'); ?></p>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="save" value="Save" class="btn btn-danger">
                  </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
