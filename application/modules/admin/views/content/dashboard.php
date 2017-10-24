<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-pencil"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Postingan</span>
        <span class="info-box-number"><?php echo $innovation ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-group"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah User</span>
        <span class="info-box-number"><?php echo $users ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pengunjung</span>
        <span class="info-box-number"><?php echo $visitor ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Kategori</span>
        <span class="info-box-number"><?php echo $categories ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Grafik Pengunjung </a></h3>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart" id="revenue-chart"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
