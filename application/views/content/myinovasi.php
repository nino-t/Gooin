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
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li><a href="<?php echo site_url('profile/me') ?>">Tentang Saya</a></li>
                                        <li class="active"><a href="<?php echo site_url('profile/inovasi') ?>">Inovasi</a></li>
                                        <li><a href="<?php echo site_url('profile/aktivitas') ?>">Aktivitas</a></li>
                                        <div class="clearfix"></div>
                                    </ul>
                                    <div>
                                      <table class="table table-bordered table-striped">
                                          <thead>
                                            <tr>
                                              <th>Judul</th>
                                              <th>View</th>
                                              <th>Aksi</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($post as $row){ ?>
                                              <tr>
                                                <td><?php echo $row['title']; ?></td>
                                                <td width="10%"><?php echo $row['hitung']; ?></td>
                                                <td width="30%">
                                                  <a href="<?php echo site_url('innovation/delete/'.$row['post_id']); ?>" class="btn btn-primary btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                                  <a href="<?php echo site_url('innovation/read/'.$row['post_slug']); ?>" target="new" class="btn btn-primary btn-xs" title="Lihat"><i class="fa fa-eye"></i></a>
                                                  <a href="<?php echo site_url('innovation/edit/'.$row['post_id']) ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
                                                  <?php if ($row['post_sts'] == 2){ ?>
                                                    <a href="<?php echo site_url('profile/publish/'.$row['post_id']) ?>" class="btn btn-primary btn-xs">Publikasikan</a>
                                                  <?php }else if($row['post_sts'] == 1){ ?>
                                                    <a href="<?php echo site_url('profile/unpublish/'.$row['post_id']) ?>" class="btn btn-primary btn-xs">Stop Publikasi</a>
                                                  <?php } ?>
                                                </td>
                                              </tr>
                                            <?php } ?>
                                          </tbody>
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
