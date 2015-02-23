<!DOCTYPE html>
<html lang="en" ng-app>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Groot<?php echo isset($title) ? ' | ' . $title : null; ?></title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Icon Template -->
        <link rel="icon" href="<?php echo base_url('media/ico/favicon.png'); ?>" type="image/x-icon">

        <!-- CSS Plugin -->
        <link href="<?php echo base_url('/media/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('/media/css/jquery-ui.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('/media/css/jquery-ui.structure.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('/media/css/jquery-ui.theme.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('/media/css/ionicons.min.css'); ?>" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url('media/css/jquery.Jcrop.min.css'); ?>" rel="stylesheet">
        <!-- End Style Plugin-->

        <!-- CSS Costum -->
        <link href="<?php echo base_url('/media/css/styles-beckend.css'); ?>" rel="stylesheet">
        <!-- End Style Costum-->

        <!-- Java Script Plugin -->
        <script src="<?php echo base_url('/media/js/jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('/media/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('/media/js/jquery-ui.min.js'); ?>"></script>
        <script src="<?php echo base_url('/media/js/imgLiquid-min.js'); ?>"></script>
        <script src="<?php echo base_url('/media/js/angular.min.js'); ?>"></script>
        <script src="<?php echo base_url('/media/js/jquery.Jcrop.min.js'); ?>"></script>
        <script src="<?php echo base_url('/media/js/mm.js'); ?>"></script>


        <!--End Javascript-->
        <script type="text/javascript">
            var BASEURL = '<?php echo base_url() ?>';
            $(function() {
                $(".imgLiquidFill").imgLiquid({
                    fill: true,
                    horizontalAlign: "center",
                    verticalAlign: "center"
                });
            });
        </script>

        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <![endif]-->

    </head>
    <body>

        <!-- NAVBAR -->

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #2c3e50;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="background-color: white;">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('g_admin/dashboard'); ?>" style="color:white;">GROOT - Control Panel</a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"> <i class="glyphicon glyphicon-user icon-white"></i> <?php echo $text = ucfirst($this->session->userdata('user_name_admin')); ?> <b class="caret"></b>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                            <ul class="dropdown-menu">
                                &nbsp;&nbsp;<li align="center" class="well">
                                    <div class="navbar-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="<?php echo base_url('/media/image/profil.png'); ?>"><p class="text-center small">
                                            </div>
                                            <div class="col-md-7">
                                                <span><?php echo $text = ucfirst($this->session->userdata('user_name_admin')); ?></span>
                                                <p class="text-muted small"><?php echo $this->session->userdata('user_email_admin'); ?></p>
                                                <div class="divider"></div>
                                                <a href="<?php echo site_url('g_admin/profile') ?>" class="btn btn-info btn-sm">Lihat Profil</a>
                                            </div>
                                        </div>
                                    </div>
                                <li><a style="margin-top: 15px" class="btn" href="<?php echo site_url('g_admin/profile/cpw/'); ?>"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Ubah password"> Ubah Password <strong>[ <?php echo $this->session->userdata('user_name_admin') ?> ]</i></strong></a>
                                </li><hr>
                                <li><a href="<?php echo site_url('g_admin/auth/logout'); ?>" class="btn btn-sm btn-info"><i class="off glyphicon glyphicon-off" data-toggle="tooltip" data-placement="bottom" title="Keluar"> Keluar</i></a>
                                </li>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"></span><span class="label label-info"></span>
                            </a>
                            <ul class="dropdown-menu">
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            if ($this->session->flashdata('success')) {
                $data['message'] = $this->session->flashdata('success');
                $this->load->view('g_admin/notification_success', $data);
            }
            ?>
        </nav>

        <!-- OFF-NAVBAR -->

        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-left">

                <?php $this->load->view('g_admin/list') ?>
                <?php isset($main) ? $this->load->view($main) : null; ?>

            </div>
        </div><!-- OFF Container-fluid -->

        <!-- Footer -->
        <footer class="bottom" style="background-color: #2c3e50;">
            <div class="orc text-center">
                <p class="text-muted" style="color: white;">© 2014-2015 GROOT - Supported by Artikulpi</a></p>
            </div>
        </footer>
    </body>
</html>
