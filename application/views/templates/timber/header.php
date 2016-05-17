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
  <link href="<?php echo template_media_url() ?>/css/style.css" rel="stylesheet" type="text/css">

  <script src="<?php echo base_url() ?>media/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>media/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('media/js/imgLiquid-min.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo template_media_url() ?>/js/template.js" type="text/javascript"></script>
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
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top tops" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav hov navbar-nav">
          <li class="active"><a href="<?php echo site_url() ?>">GROOT <span class="sr-only">(current)</span></a></li>
        </ul>
        <?php echo $this->template->load('menu'); ?>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>