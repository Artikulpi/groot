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
        <link href="<?php echo template_media_url() ?>/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?php echo template_media_url() ?>/css/style.css" rel="stylesheet" type="text/css">

        <script src="<?php echo base_url() ?>media/js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>media/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('media/js/imgLiquid-min.js'); ?>" type="text/javascript"></script>
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

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<div class="container-fluid">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url(); ?>"><strong>GROOT</strong></a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php echo $this->template->load('menu'); ?>
       </div>
     </div>
   </nav>
 </div>