<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gooin | <?php echo $title ?></title>
    <title>Goo-in | Innovation</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/Favicon1.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/css/bootstrap.min.css" />
    <script src="<?php echo site_url() ?>assets/js/modernizr.custom.js"></script>
    <!--<link rel="stylesheet" href="<?php echo site_url() ?>assets/ckeditor/contents.css">-->
  </head>
  <body>
    <div id="wraper">
      <div class="ip-container" id="ip-container">
        <div class="ip-main paper">
          <?php echo $topmenu; ?>
          <?php echo $content; ?>
          <?php echo $footer; ?>

        </div>
      </div>
    </div>
    <script src="<?php echo base_url() ?>assets/js/classie.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pathLoader.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.innerfade.js"></script>
    <script type="text/javascript">
           $(document).ready(
                function(){
                    $("ul#slide-fill").innerfade({
                        speed: 1000,
                        timeout: 5000,
                        type: 'sequence',
                        containerheight: '220px'
                    });
            });
    </script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminlte/plugins/ckeditor/ckeditor.js"></script>
    <script type='text/javascript'>
        CKEDITOR.replace( 'post_content', {
          filebrowserUploadUrl: '<?php echo site_url('innovation/upload_from_ck')?>'
        });
    </script></td>
    <!--
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/style.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/config.js"></script>
  -->
  </body>
</html>
