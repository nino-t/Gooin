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
                                  <form action="<?php echo site_url('profile/ubah') ?>" method="post">
                                    <?php echo form_hidden('username', $username); ?>

                                    <div class="form-group">
                                      <label for="">Password Lama</label>
                                      <input type="text" class="form-control" name="old_password" placeholder="***********">
                                      <p class="help-block"><?php echo form_error('old_password'); ?></p>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Password Baru</label>
                                      <input type="password" class="form-control" name="password" placeholder="***********">
                                      <p class="help-block"><?php echo form_error('password'); ?></p>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Ulangi Password Baru</label>
                                      <input type="password" class="form-control" name="re_password" placeholder="***********">
                                      <p class="help-block"><?php echo form_error('re_password'); ?></p>
                                    </div>
                                    <div class="form-group">
                                      <input type="submit" class="btn btn-danger col-md-12" name="edit" value="Ubah Password">
                                    </div>
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
