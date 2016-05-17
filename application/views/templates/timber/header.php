<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GROOT <?php echo isset($title) ? ' | ' . $title : null; ?></title><!-- Bootstrap core CSS -->
  <link rel="shortcut icon" href="<?php echo media_url('ico/favicon.png') ?>">

  <link href="<?php echo base_url() ?>media/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url() ?>media/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo template_media_url() ?>/css/sidebar.css" rel="stylesheet" type="text/css">

  <script src="<?php echo base_url() ?>media/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>media/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('media/js/imgLiquid-min.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo template_media_url() ?>/js/sidebar.js" type="text/javascript"></script>
  <script src="<?php echo template_media_url() ?>/js/custom.js" type="text/javascript"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <script>
    $(function() {

      $(".imgLiquidFill").imgLiquid({
        fill: true,
        horizontalAlign: "center",
        verticalAlign: "center"
      });
    });
  </script>

  <div id="fb-root"></div>
</head>

<body>
 <div class="container-fluid">
  <div class="row">
    <div class="col-xs-8 col-sm-3 col-md-3 sidebar sidebar-left sidebar-animate sidebar-md-show">
      <div class="grey">
        <div class="user-logged-in">
          <div class="content">
            <div class="user-name"> <span class="text-muted f9">GROOT</span></div><p></p>
            <div class="user-email">Get start your next awesome project.</div>
            <div class="user-actions">
              <a href=""><i id="social-fb" class="ion-social-facebook"></i></a>
              <a href=""><i id="social-tw" class="ion-social-twitter"></i></a>
              <a href=""><i id="social-gp" class="ion-social-googleplus"></i></a>
              <a href=""><i id="social-em" class="ion-social-instagram-outline"></i></a>
            </div>
          </div>
        </div>
        <hr>

        <div class="container">
          <div class="row">
            <div class="col-sm-3">
                <!-- <ul class="nav bs-sidenav">

                  <li>
                    <a href="#glyphicons">Glyphicons</a>
                    <ul class="nav">
                      <li><a href="#glyphicons-glyphs">Available glyphs</a></li>
                      <li><a href="#glyphicons-how-to-use">How to use</a></li>
                      <li><a href="#glyphicons-examples">Examples</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#dropdowns">Dropdowns</a>
                    <ul class="nav">
                      <li><a href="#dropdowns-example">Example</a></li>
                      <li><a href="#dropdowns-alignment">Alignment options</a></li>
                    </ul>
                  </li>
                </ul> -->

                <?php echo $this->template->load('menu'); ?>
                
              </div>
            </div>
          </div>  
          <div class="margin-bottom-20"></div>
        </div>
      </div>