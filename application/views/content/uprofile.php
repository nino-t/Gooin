<!-- <div class="container">
  <div class="row">
    <div class="col-md-3" style="border:1px solid #E7E7E7;background:#f8f8f8;">
      <center>
        <img class='img-responsive img-circle' width="200" height="200" src="<?php echo site_url($photo); ?>" alt="userphoto" />
        <p><?php echo $username; ?></p>
        <p>Jumlah Inovasi : <?php echo $user_post; ?></p>
      </center>
    </div>
    <div class="col-md-8" style="border:1px solid #E7E7E7;background:#f8f8f8;margin-left:5px;">
      <h3>Profil Saya</h3>
      <hr style="border:1px solid #E7E7E7;">
        <div>

          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="<?php echo site_url('profile/u/'.$user_id); ?>">Tentang Saya</a></li>
            <li><a href="<?php echo site_url('profile/u/'.$user_id.'/inovasi'); ?>">Inovasi</a></li>
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
            </table>
          </div>


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
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tampil-profil">
                                <div class="laman-profil">
                                    <ul class="nav nav-tabs" role="tablist">
                                      <li class="active"><a href="<?php echo site_url('profile/u/'.$user_id); ?>">Tentang Saya</a></li>
                                      <li><a href="<?php echo site_url('profile/u/'.$user_id.'/inovasi'); ?>">Inovasi</a></li>
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
