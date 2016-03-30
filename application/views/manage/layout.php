<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Groot<?php echo isset($title) ? ' | ' . $title : null; ?></title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Icon Template -->
    <link rel="icon" href="<?php echo media_url('ico/favicon.png') ?>" type="image/x-icon">

    <!-- CSS Plugin -->
    <link href="<?php echo media_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo media_url('css/jquery-ui.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo media_url('css/jquery-ui.structure.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo media_url('css/jquery-ui.theme.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo media_url('css/ionicons.min.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo media_url('css/jquery.Jcrop.min.css'); ?>" rel="stylesheet">
    <!-- End Style Plugin-->

    <!-- CSS Costum -->
    <!-- <link href="<?php echo media_url('css/styles-beckend.css'); ?>" rel="stylesheet"> -->
    <link href="<?php echo media_url('css/styles.css'); ?>" rel="stylesheet">
    <!-- End Style Costum-->

    <!-- Java Script Plugin -->
    <script src="<?php echo media_url('js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo media_url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo media_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo media_url('js/imgLiquid-min.js'); ?>"></script>
    <script src="<?php echo media_url('js/angular.min.js'); ?>"></script>
    <script src="<?php echo media_url('js/jquery.Jcrop.min.js'); ?>"></script>
    <script src="<?php echo media_url('js/mm.js'); ?>"></script>
    <script src="<?php echo media_url('js/chart.min.js'); ?>"></script>
    <script src="<?php echo media_url('js/chart-data.js'); ?>"></script>
    <script src="<?php echo media_url('js/easypiechart.js'); ?>"></script>
    <script src="<?php echo media_url('js/easypiechart-data.js'); ?>"></script>
    <script src="<?php echo media_url('js/lumino.glyphs.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo media_url('js/tinymce/tinymce.min.js'); ?>"></script>
    <script>
      tinymce.init({
          selector: 'textarea',
          height: 150,
          plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table contextmenu paste code'
          ],
          toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      });
  </script>


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
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><span>Groot</span></a>
                            <ul class="user-menu">
                                <li class="dropdown pull-right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $text = ucfirst($this->session->userdata('uname')); ?>
                                     <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                                     <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li align="center" class="well">
                                    <div class="navbar-content">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="<?php echo media_url('/image/profil.png'); ?>"><p class="text-center small">
                                                </div>
                                                <div class="col-md-7">
                                                    <span><?php echo $text = ucfirst($this->session->userdata('uname')); ?></span>
                                                    <p class="text-muted small"><?php echo $this->session->userdata('uemail'); ?></p>
                                                    <div class="divider"></div>
                                                    <a href="<?php echo site_url('gadmin/profile') ?>" class="btn btn-warning btn-sm">Lihat Profil
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </li>
                                        <li>
                                        <a style="margin-top: -20px" class="btn" href="<?php echo site_url('gadmin/profile/cpw/'); ?>">
                                        <i class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Ubah password"> Ubah Password 
                                        <strong>[ <?php echo $this->session->userdata('uname') ?> ]</i></strong></a>
                                        </li>
                                         <li>
                                         <center>
                                            <?php echo form_open(site_url('user/auth/logout')); ?>
                                            <input type="hidden" name="location" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                                            <button type="submit" class="btn btn-sm btn-block btn-info" title="Keluar" role="button">
                                                <span class="ion-lock-combination"> Keluar</span>
                                            </button>
                                            <?php echo form_close() ?>
                                            </center>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.container-fluid -->
                    <?php
                    if ($this->session->flashdata('success')) {
                        $data['message'] = $this->session->flashdata('success');
                        $this->load->view('admin/notification_success', $data);
                    }
                    ?>
                </nav>
                <!-- NAVBAR -->


                <!-- OFF-NAVBAR -->
                <div id="wrapper">
                    <div id="sidebar-wrapper">
                        <div id="split-bar"></div>
                        <?php $this->load->view('manage/sidebar') ?>
                    </div>

                    <div id="page-content-wrapper">
                        <!-- Div semua konten -->
                        <div class="page-content inset">
                            <div class="row">
                                <ol class="breadcrumb">
                                    <a id="menu-toggle" data-toggle="collapse" data-target="#menu-content" href="#" class="btn-outline"><i class="glyphicon glyphicon-th-list"></i></a>
                                    <li><a href="#"><i class="ion-home"></i></a></li>
                                    <li class="active">Icons</li>
                                </ol>
                            </div><!--/.row-->
                            <?php isset($main) ? $this->load->view($main) : null; ?>

                        </div>
                    </div>


                </div>

            </body>

            <script>
                $('#calendar').datepicker({
                });

                !function ($) {
                    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                        $(this).find('em:first').toggleClass("glyphicon-minus");      
                    }); 
                    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
                }(window.jQuery);

                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("active");
                });
            </script>
            </html>
