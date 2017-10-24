    <header class="ip-header">
        <div class="ip-loader">
            <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/></path>
                <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/></path>
            </svg>
        </div>
    </header>
<div class="slider">
    <div class="container">
        <div class="slider-show">
            <div class="fill-show">
                <div class="pull-left col-lg-7 col-md-7 col-sm-7 col-xs-12 bagian-inti">
                    <h3>share inovasi anda</h3>
                        <p>Share inovasi-inovasi anda untuk diketahui oleh seluruh dunia</p>
                        <a href="<?php echo site_url('innovation/post') ?>">share inovasi</a><a href="<?php echo site_url('register') ?>">gabung</a>
                </div>
                <div class="pull-right col-lg-5 col-md-5 col-sm-5 col-xs-5 bagian-sub-inti">
                    <div class="slide-op">
                        <ul id="slide-fill">
                            <li>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-11 isi-home"><h4>"Saya mencari inovasi aplikasi desktop karya anak bangsa!"</h4></div>
                                        <div class="col-lg-1"><img src="<?php echo base_url() ?>assets/img/ibo.jpg"></div>
                                    </div>
                                        <img src="<?php echo base_url() ?>assets/img/laptop.png">
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-11 isi-home"><h4>"Saya mencari inovasi hardware karya anak bangsa!"</h4></div>
                                        <div class="col-lg-1"><img src="<?php echo base_url() ?>assets/img/Adrian.png"></div>
                                    </div>
                                        <img src="<?php echo base_url() ?>assets/img/Hardware.png">
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-11 isi-home"><h4>"Saya mencari inovasi internet karya anak bangsa!"</h4></div>
                                        <div class="col-lg-1"><img src="<?php echo base_url() ?>assets/img/Shane.jpg"></div>
                                    </div>
                                        <img src="<?php echo base_url() ?>assets/img/4G.png">
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-11 isi-home"><h4>"Saya mencari inovasi mobile apps karya anak bangsa!"</h4></div>
                                        <div class="col-lg-1"><img src="<?php echo base_url() ?>assets/img/Maurice.jpeg"></div>
                                    </div>
                                        <img src="<?php echo base_url() ?>assets/img/hp.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="kategori-inovasi">
    <div class="container">
        <div class="inovasi col-lg-3 col-md-3 col-sm-3 col-xs-11">
            <i class="fa fa-flask"></i>
                <h4>Inovasi</h4>
                    <p>Post inovasi anda di sini</p>
                    <div class="clearfix"></div>
        </div>
        <div class="inovasi col-lg-3 col-md-3 col-sm-3 col-xs-11">
            <i class="fa fa-share"></i>
                <h4>Share</h4>
                    <p>Share kepada dunia</p>
                    <div class="clearfix"></div>
        </div>
        <div class="inovasi col-lg-3 col-md-3 col-sm-3 col-xs-11">
            <i class="fa fa-lightbulb-o"></i>
                <h4>Inspirasi</h4>
                    <p>Buat dunia terinspirasi dengan inovasi anda</p>
                    <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="conten">
    <div class="container">
        <div class="fill-container">
            <div class="conten-kami fill-conten-all">
                <h3>inovasi-inovasi</h3>
                <?php foreach ($inovasi->result_array() as $row){ ?>
                  <?php $post_img = $row['post_image'] == 'assets/images/no-image.jpg'?:'uploads/post_image/'.$row['post_image']; ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="border:1px solid #eee;height:250px;">
                        <h4><a href="<?php echo site_url('innovation/read/'.$row['post_slug']) ?>"><?php echo $row['title'] ?></a></h4>
                            <a href="<?php echo site_url('innovation/read/'.$row['post_slug']) ?>"><img src="<?php echo site_url($post_img); ?>"></a>
                            <p>
                                <span><i class="fa fa-calendar"></i>&nbsp; <?php echo date("d/m/Y",strtotime($row['date_create'])) ?></span>
                                <span><a href="<?php echo site_url('innovation/category/'.$row['category_slug']); ?>" class="tag"><i class="fa fa-tags"></i>&nbsp; <?php echo $row['category_name'] ?></a></span>
                            </p>
                    </div>
                <?php } ?>
                    <div class="clearfix"></div>
            </div>
        </div>
    </div> <!-- end container -->
</div>
<div class="mobile-animasi">
    <div class="animasi-mobile-gerak col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="mb-atas">
            <img src="<?php echo base_url() ?>assets/img/bus1.png" id="mobil-atas-1" height="50" width="80" />
            <img src="<?php echo base_url() ?>assets/img/motor2.png" id="mobil-atas-1" height="50" width="80" />
            <img src="<?php echo base_url() ?>assets/img/van1.png" id="mobil-atas-1" height="50" width="80" />
            <img src="<?php echo base_url() ?>assets/img/car.png" id="mobil-atas-1" height="50" width="80" />
        </div>
        <div class="mb-bawah">
            <img src="<?php echo base_url() ?>assets/img/bus1.png" id="mobil-bawah-1" height="50" width="80" />
            <img src="<?php echo base_url() ?>assets/img/motor.png" id="mobil-bawah-1" height="50" width="80" />
            <img src="<?php echo base_url() ?>assets/img/van.png" id="mobil-bawah-1" height="50" width="80" />
        </div>
            <img src="<?php echo base_url() ?>assets/img/car1.png" id="mobil-bawah-1" height="50" width="80" />
    </div>
</div>
