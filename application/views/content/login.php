<!-- <div class="container">
  <div class="col-md-6">
    <?php echo form_error('login'); ?>
    <form class="form-horizontal" action="<?php echo site_url('login/login') ?>" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="username">
        <p class="help-block"><?php echo form_error('username') ?></p>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="*********">
        <p class="help-block"><?php echo form_error('passowrd') ?></p>
      </div>
      <div class="form-group">
        <input type="submit" name="login" value="Login" class="btn btn-primary col-md-12">
      </div>
    </form>
  </div>
</div> -->
<div class="slider">
    <div class="container">
        <div class="slider-show">
            <div class="fill-show">
                <div class="pull-left col-lg-5 bagian-sub-inti">
                    <div class="slide-op">
                        <ul id="slide-fill">
                          <li>
                              <div>
                              <div class="row">
                                  <div class="col-lg-1"><img src="<?php echo base_url() ?>assets/img/ibo.jpg"></div>
                                  <div class="col-lg-11 isi-daftar"><h4>"Saya mencari inovasi aplikasi desktop karya anak bangsa!"</h4></div>
                              </div>
                                      <img src="<?php echo base_url() ?>assets/img/laptop.png">
                              </div>
                          </li>
                          <li>
                              <div>
                              <div class="row">
                                  <div class="col-lg-1"><img src="<?php echo base_url() ?>assets/img/Adrian.png"></div>
                                  <div class="col-lg-11 isi-daftar"><h4>"Saya mencari inovasi hardware karya anak bangsa!"</h4></div>
                              </div>
                                      <img src="<?php echo base_url() ?>assets/img/Hardware.png">
                              </div>
                          </li>
                          <li>
                              <div>
                              <div class="row">
                                  <div class="col-lg-1"><img src="<?php echo base_url() ?>assets/img/Shane.jpg"></div>
                                  <div class="col-lg-11 isi-daftar"><h4>"Saya mencari inovasi internet karya anak bangsa!"</h4></div>
                              </div>
                                      <img src="<?php echo base_url() ?>assets/img/4G.png">
                              </div>
                          </li>
                          <li>
                              <div>
                              <div class="row">
                                  <div class="col-lg-1"><img src="<?php echo base_url() ?>assets/img/Maurice.jpeg"></div>
                                  <div class="col-lg-11 isi-daftar"><h4>"Saya mencari inovasi mobile apps karya anak bangsa!"</h4></div>
                              </div>
                                      <img src="<?php echo base_url() ?>assets/img/hp.jpg">
                              </div>
                          </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="pull-right col-lg-7 bagian-inti-2">
                    <h3>gabung share inovasi anda</h3>
                        <div class="form-daftar col-lg-12 pull-left" style="padding:0">
                            <div class="row">
                                <h4>login</h4>
                            </div>
                            <div class="row">
                                    <div class="input-daftar col-lg-12">
                                      <?php echo form_error('login'); ?>
                                      <form action="<?php echo site_url('login/login') ?>" method="post">
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="username" placeholder="username">
                                          <p class="help-block"><?php echo form_error('username') ?></p>
                                        </div>
                                        <div class="form-group">
                                          <input type="password" class="form-control" name="password" placeholder="*********">
                                          <p class="help-block"><?php echo form_error('passowrd') ?></p>
                                        </div>
                                        <div class="form-group">
                                          <center>
                                            <input type="submit" name="login" value="Login" class="btn btn-danger form-control">
                                          </center>
                                        </div>
                                      </form>
                                    </div>
                            </div>
                        </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
