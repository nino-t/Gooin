<!-- <div class="container">
  <div class="row">
    <div class="col-md-3" style="border:1px solid #E7E7E7;background:#f8f8f8;">
      <center>
        <img class='img-responsive img-circle' width="200" height="200" src="<?php echo site_url($photo); ?>" alt="userphoto" />
        <p><?php echo $username; ?></p>
        <p>Jumlah Inovasi : <?php echo $user_post; ?></p>
        <p><a href="#" class="btn btn-default">Edit Profile</a></p>
      </center>
    </div>
    <div class="col-md-8" style="border:1px solid #E7E7E7;background:#f8f8f8;margin-left:5px;">
      <h3>Profil Saya</h3>
      <hr style="border:1px solid #E7E7E7;">
        <div class="col-md-12">
          <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('profile/do_edit') ?>" method="post">
            <?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
            <div class="form-group">
              <label for="">Photo <?php echo form_error('photo'); ?></label>
              <input type="file" name="photo">
              <p class="help-block"></p>
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" class="form-control" value="<?php echo $username ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" class="form-control" value="<?php echo $email ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">Phone <?php echo form_error('phone'); ?></label>
              <input type="text" class="form-control" maxlength="12" name="phone" value="<?php echo $phone ?>">
              <p class="help-block"></p>
            </div>
            <div class="form-group">
              <label for="">Jenis Kelamin <?php echo form_error('gender'); ?> </label>
              <select class="form-control" name="gender">
                <option value="">--Pilih Jenis Kelamin--</option>
                <?php
                $jk = ['Laki-laki','Perempuan'];
                $selected = "";
                foreach($jk as $index => $value){
                if ($gender == $value) {
                  $selected = "selected";
                }else {
                  $selected = "";
                }
                ?>

                <option <?php echo $selected ?> value="<?php echo $value ?>"><?php echo $value ?></option>
                <?php } ?>
              </select>
              <p class="help-block"></p>
            </div>
            <div class="form-group">
              <label for="">Tentang Saya <?php echo form_error('user_desc'); ?></label>
              <textarea name="user_desc" class="form-control" rows="8" maxlength="100"><?php echo $user_desc ?></textarea>
              <p class="help-block">*Maksimal 100 Karakter</p>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-default col-md-12" name="edit" value="Ubah Profil">
            </div>
          </form>
        </div>
    </div>
  </div>
</div> -->
<div class="conten-data">
    <div class="container">
        <div class="profil">
          <div class="row">
                <h3>profil saya</h3>
                    <div class="profil-lengkap">
                        <div class="col-lg-3">
                            <div class="left-profil">
                                <center>
                                    <div class="foto-profil">
                                        <img class='img-responsive img-circle' width="200" height="200" src="<?php echo site_url($photo); ?>" alt="userphoto" />
                                    </div>
                                    <div class="info-user">
                                        <h5><?php echo $username; ?></h5>
                                        <h5>Jumlah Inovasi : <?php echo $user_post; ?></h5>
                                        <a href="<?php echo site_url('profile/edit'); ?>" class="btn btn-default">edit profil</a>
                                        <a href="<?php echo site_url('profile/ubah_password'); ?>" class="btn btn-default">Ubah Password</a>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tampil-profil">
                                <div class="laman-profil">
                                    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('profile/do_edit') ?>">
                                        <?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
                                        <div class="form-group">
                                            <label for="">Photo <?php echo form_error('photo'); ?></label>
                                            <input type="file" name="photo">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo $username ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $email ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone <?php echo form_error('phone'); ?></label>
                                            <input type="text" name="phone" maxlength="12" class="form-control" value="<?php echo $phone ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="gender">Jenis Kelamin <?php echo form_error('gender'); ?> </label>
                                          <select class="form-control" name="gender">
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <?php
                                            $jk = ['Laki-laki','Perempuan'];
                                            $selected = "";
                                            foreach($jk as $index => $value){
                                            if ($gender == $value) {
                                              $selected = "selected";
                                            }else {
                                              $selected = "";
                                            }
                                            ?>

                                            <option <?php echo $selected ?> value="<?php echo $value ?>"><?php echo $value ?></option>
                                            <?php } ?>
                                          </select>
                                          <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                          <label for="">Tentang Saya <?php echo form_error('user_desc'); ?></label>
                                          <textarea name="user_desc" class="form-control" rows="8" maxlength="100"><?php echo $user_desc ?></textarea>
                                          <p class="help-block">*Maksimal 100 Karakter</p>
                                        </div>
                                        <div class="form-group">
                                          <input type="submit" class="btn btn-danger" name="edit" value="Ubah Profil">
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
