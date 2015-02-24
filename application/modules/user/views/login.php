<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>GROOT | Login</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Icon Template -->
        <link rel="icon" href="<?php echo base_url('media/ico/favicon.png'); ?>" type="image/x-icon">

        <!-- CSS Plugin -->
        <link href="<?php echo base_url('/media/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- End Style Plugin-->

        <!-- CSS Costum -->
        <link href="<?php echo base_url('/media/css/styles-beckend.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('/media/css/style-login.css'); ?>" rel="stylesheet">
        <!-- End Style Costum-->

        <!-- Java Script Plugin -->
        <script src="<?php echo base_url('/media/js/jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('/media/js/bootstrap.min.js'); ?>"></script>

        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <![endif]-->

    </head>
    <body>
        <div class="container-fluid">
            <?php echo form_open('user/auth/process_login'); ?>

            <div class="logo">
                <!--<img src="<?php //echo base_url('/media/ico/logo-sipsi.png'); ?>">-->
            </div>
            <div class="login-usr up">
                <h3 style="font-family:Century Gothic; color: #5bc0de; margin-bottom: 30px" class="text-left">
                    Admin Login
                </h3>
                <div class="form-group" style=" color: #5bc0de;">
                    <input style="font-family:Century Gothic; border-radius: 0px;" type="text" name="username" class="form-control"  placeholder="Username" autofocus>
                </div>
                <div class="form-group">
                    <input style="font-family:Century Gothic; border-radius: 0px;" type="password" name="password" class="form-control"  placeholder="Password">
                </div>
                <button style="font-family:Century Gothic;" type="submit" class="btn btn-warning">Masuk</button>
                <div>
                    <?php echo form_close(); ?>
                    <br>
                    <?php
                    if ($this->session->flashdata('failed')) {
                        $data['message'] = $this->session->flashdata('failed');
                        $this->load->view('template/login_failed', $data);
                    }
                    ?>
                </div>    
            </div>
        </div><!-- OFF Container-fluid -->
        <footer class=" navbar-fixed-bottom" style="background-color: #2c3e50;">
                <div class="orc text-center">
                    <p class="text-muted" style="color: white;">© 2014-2015 GROOT - Supported by ARTIKULPI</a></p>
                </div>
            </footer>
    </body>
</html>
