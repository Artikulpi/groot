<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>GROOT <?php echo isset($title) ? ' | ' . $title : null; ?></title><!-- Bootstrap core CSS -->
        <link rel="shortcut icon" href="<?php echo favicon()?>">

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

    <div id="fb-root"></div>
</head>

<body>
    <div id="page" class="container grut">
        <div class="row ows">
            <div class="col-md-4">
                <div class="col-md-6 col-sm-12 logo">
                    <div class="">
                        <CENTER><a href="<?php echo site_url() ?>"><img src="<?php echo template_media_url() ?>/image/groot.png" class="img-responsive"></a></CENTER>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="pull-left hidden-sm hidden-xs">
                        <h1>GROOT</h1>
                        <p>Artikulpi's Demo</p>
                    </div>
                    <CENTER class="hidden-md hidden-lg">
                        <h1>GROOT</h1>
                        <p>Artikulpi's Demo</p>
                    </CENTER>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-12 col-sm-12">
                    <nav class="navbar navbar-default navsu">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <CENTER>
                                    <button type="button" class="navbar-toggle togles collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </CENTER>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <?php echo $this->template->load('menu'); ?>
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>