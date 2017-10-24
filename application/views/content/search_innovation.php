<div class="conten" style="margin-top:5%;">
    <div class="container">
        <div class="fill-container">
            <div class="conten-kami fill-conten-all" style="height: auto 500px;">
                <h3>inovasi-inovasi</h3>
                <?php if ($count > 0): ?>
                  Hasil Pencarian : <?php echo $count ?>
                  <div class="clearfix"></div>
                  <?php foreach ($post as $row){ ?>
                    <?php $post_img = $row['post_image'] == 'assets/images/no-image.jpg'?:'uploads/post_image/'.$row['post_image']; ?>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style=" height:250px;border:1px solid #eee;">
                          <h4><a href="<?php echo site_url('innovation/read/'.$row['post_slug']) ?>"><?php echo $row['title'] ?></a></h4>
                              <a href="<?php echo site_url('innovation/read/'.$row['post_slug']) ?>"><img src="<?php echo site_url($post_img); ?>"></a>
                              <p>
                                  <span><i class="fa fa-calendar"></i>&nbsp; <?php echo date("d/m/Y",strtotime($row['date_create'])) ?></span>
                                  <span><a href="<?php echo site_url('innovation/category/'.$row['category_slug']); ?>" class="tag"><i class="fa fa-tags"></i>&nbsp; <?php echo $row['category_name'] ?></a></span>
                              </p>
                      </div>
                  <?php } ?>
                <?php else: ?>
                  <center>Hasil Tidak ditemukan</center>
                <?php endif; ?>
                    <div class="clearfix"></div>
                    <div style="float:right;margin-right:10px">
                    </div>
            </div>
        </div>
    </div>
</div>
