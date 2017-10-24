<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | <?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/morris/morris.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php echo $topmenu; ?>
      <?php echo $sidebar; ?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
          </h1>
        </section>
        <section class="content">
          <?php echo $content; ?>
        </section>
      </div>
      <?php echo $footer ?>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/morris/morris.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminlte/js/app.min.js"></script>
    <script type="text/javascript">
      $(function(){
          Morris.Area({
          element: 'revenue-chart',
          resize: true,
          data: <?php echo $datagrafik; ?>,
          xkey: 'Tanggal',
          ykeys: ['Jumlah'],
          xLabels: "day",
          xLabelFormat: function(date) {
            var bulan = ["Jan", "Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"]
            return date.getDate()+'-'+bulan[(date.getMonth()+1)]+'-'+date.getFullYear();
          },
          labels: ['Jumlah'],
          lineColors: ['#3c8dbc'],
          dateFormat: function(date) {
            d = new Date(date);
            var hari = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
            return hari[d.getDay()]+', '+d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear();
          },
          hideHover: 'auto'
        });
      });
    </script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
