<div class="conten-data">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="col-lg-12 judul-postingan">
                <h4><?php echo $post_title ?></h4>
                </div>
            </div>
        </div>
        <div class="row fill-postingan">
          <div class="col-lg-8">
              <div class="fill-col">
                <?php if ($youtube_id != ""){ ?>
                  <iframe src="http://www.youtube.com/embed/<?php echo $youtube_id ?>" width="100%" height="443"></iframe>
                <?php }else if($post_image != "" && $youtube_id == ""){ ?>
                  <img src="<?php echo site_url('uploads/post_image/'.$post_image); ?>"  width="100%" height="443" alt="post_image" />
                <?php }else{ ?>
                  <img src="<?php echo site_url('assets/img/no_image.jpg'); ?>"  width="100%" height="443" alt="post_image" />
                <?php } ?>
              </div>
            </div>
            <div class="col-lg-4 profil-writer">
              <div>
                  <center>
                      <img src="<?php echo site_url($photo); ?>" />
                        <h4 class="nama_user"><a href="<?php echo site_url('profile/u/'.$user_id) ?>"><?php echo $name ?></a></h4>
                        <blockquote>
                            <?php echo $user_desc ?>
                        </blockquote>
                        <div class="share">
                            <p>Di Lihat: <?php echo $viewers ?></p>
                            <a class="btn btn-primary" href="http://www.facebook.com/share.php?u=<?php echo site_url('innovation/read/'.$post_slug) ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a class="btn btn-danger" href="https://plus.google.com/share?url=<?php echo site_url('innovation/read/'.$post_slug) ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a class="btn btn-info" href="http://twitter.com/intent/tweet?url=<?php echo site_url('innovation/read/'.$post_slug) ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                            <button><a href=""></a></button>
                            <a href="<?php echo $link_website; ?>" class="btn btn-danger"><i class="fa fa-external-link"></i>&nbsp;&nbsp; Link Website </a>
                            <button><a href=""></a></button>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <div class="row fill">
          <div class="col-lg-12">
                <div class="col-lg-8">
                    <p>
                        <span><i class="fa fa-calendar"></i>&nbsp; <?php echo date("d/m/Y",strtotime($date_create)) ?></span>
                        <span><a href="" class="tag"><i class="fa fa-tags"></i>&nbsp; <?php echo $category_name ?></a></span>
                    </p>

                    <div class="isi-post" style="text-align:justify;">
                        <?php echo $post_content ?>
                    </div>
                </div>
                <div class="col-lg-4">
                  <div class="list-group">
                    <li class="list-group-item" style="background-color:#d9534f;color:#fff;">Recent Post</li>
                    <?php foreach ($recent_post as $row): ?>
                        <a class="list-group-item" href="<?php echo site_url('innovation/read/'.$row['post_slug']); ?>"><?php echo $row['title'] ?></a>
                    <?php endforeach; ?>
                  </div>
                  <div class="list-group">
                    <li class="list-group-item" style="background-color:#d9534f;color:#fff;">Top Post</li>
                    <?php foreach ($top_post as $row): ?>
                      <a class="list-group-item" href="<?php echo site_url('innovation/read/'.$row['post_slug']); ?>"><?php echo $row['title'] ?></a>
                    <?php endforeach; ?>
                  </div>
                </div>
            </div>
        </div>
            <div class="col-lg-12">
                <div class="comment">
                    <h4>Komentar</h4>
                    <?php if ($comment->num_rows()){ ?>
                      <?php $no = 1; ?>
                      <?php foreach ($comment->result_array() as $row){ ?>
                        <?php $comment_photo = $row['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$row['user_photo']; ?>
                        <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-responsive img-circle" src="<?php echo site_url($comment_photo) ?>" alt="photo" height="64" width="64">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading"><?php echo empty($row['user_id'])?$row['anonymos']:$row['username']; ?></h5>
                                        <small><?php echo $row['comment_time']; ?></small>
                                            <p><small><?php echo $row['comment_content']; ?></small></p>
                                            <p class="text-right"><a href="?reply=<?php echo $row['comment_id']; ?>" class="btn btn-danger btn-sm">Balas</a></p>
                                </div>
                        </div>
                        <?php foreach($this->post_model->get_comment_reply($row['comment_id']) as $rowrep ){ ?>
                          <?php $comment_photo2 = $rowrep['user_photo']==''?'assets/img/user_icon.png':'uploads/user_photo/'.$rowrep['user_photo']; ?>
                                <div class="row">
                                    <div class="col-md-12" style="margin-left:5%;">
                                        <hr>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-responsive img-circle" src="<?php echo site_url($comment_photo2) ?>" alt="photo" height="64" width="64">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><?php echo empty($rowrep['user_id'])?$rowrep['anonymos']:$rowrep['username']; ?></h5>
                                                        <small><?php echo $rowrep['comment_time'] ?></small>
                                                        <p><small><?php echo $rowrep['comment_content'] ?></small></p>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <hr>
                            <?php } ?>
                          <?php }else{ ?>
                            <center><h1>Tidak ada komentar</h1></center>
                          <?php } ?>

                                <hr>
                                <div class="col-md-12">
                                      <form class="form-horizontal" action="<?php echo site_url('innovation/comment') ?>" method="post">
                                        <div id="reply"></div>
                                        <?php echo form_hidden('quote_id',isset($_GET['reply'])?$_GET['reply']:0) ?>
                                        <?php echo form_hidden('post_id', $post_id); ?>
                                        <?php echo form_hidden('post_slug', $post_slug); ?>
                                        <?php if(isset($_GET['reply'])){ ?>
                                          <div class="form-group">
                                            <label for="">Membalas Komentar</label>
                                            <textarea type="text" class="form-control" name="comment_content" readonly><?php echo $comment_content ?></textarea>
                                          </div>
                                        <?php } ?>
                                        <?php if (!$this->session->userdata('user_id')){ ?>
                                          <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" class="form-control" maxlength="45" name="anonymos_name">
                                          </div>
                                        <?php } ?>
                                        <div class="form-group">
                                          <label for="">Komentar</label>
                                          <textarea type="text" class="form-control" name="comment_content" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <input type="submit" name="submit_komen" value="Kirim" class='btn btn-default'>
                                        </div>
                                    </form>
                                </div>
                </div>
            </div>
        </div>
    </div>
