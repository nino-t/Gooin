
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
                                        <a href="<?php echo site_url('innovation/post'); ?>" style="margin: 10px 0 10px 0;" class="btn btn-danger">Buat Inovasi</a>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tampil-profil">
                                <div class="laman-profil">
                                  <?php if (!$have_updated){ ?>
                                    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('profile/lengkapi_profile') ?>">
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
                                            <input type="text" name="phone" maxlength="12" class="form-control" value="<?php echo set_value('phone'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin <?php echo form_error('gender'); ?></label>
                                            <select name="gender" class="form-control">
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                  <option value="Laki-laki">Laki-laki</option>
                                                  <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                          <label for="">Tentang Saya <?php echo form_error('user_desc'); ?></label>
                                          <textarea name="user_desc" class="form-control" rows="8" maxlength="100"><?php echo set_value('user_desc') ?></textarea>
                                          <p class="help-block">*Maksimal 100 Karakter</p>
                                        </div>
                                        <div class="form-group">
                                          <input type="submit" class="btn btn-danger" name="edit" value="Ubah Profil">
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                  <?php }else{ ?>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="<?php echo site_url('profile/me') ?>">Tentang Saya</a></li>
                                        <li><a href="<?php echo site_url('profile/inovasi') ?>">Inovasi</a></li>
                                        <li><a href="<?php echo site_url('profile/aktivitas') ?>">Aktivitas</a></li>
                                        <div class="clearfix"></div>
                                    </ul>
                                    <div>
                                        <table class="table table-striped">
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td>:</td>
                                                <td><?php echo $name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?php echo $gender ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td><?php echo $email ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact</td>
                                                <td>:</td>
                                                <td><?php echo $phone ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                  <?php } ?>
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
