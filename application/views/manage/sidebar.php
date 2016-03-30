<div class="col-sm-3 col-md-2 sidebar-offcanvas padd-null" id="sidebar" role="navigation">

    <div class="list">
        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navdashboard">
                    <h4 class="title">Dashboard</h4>
                </a>
            </div>

            <ul id="navdashboard" class="list-group panel-collapse collapse">
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/dashboard'); ?>">
                    <span class="glyphicon glyphicon-home"></span> Dashboard</a>
            </ul>
        </div><!-- Dashboard -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navpost">
                    <h4 class="title">Posting</h4>
                </a>
            </div>

            <ul id="navpost" class="list-group panel-collapse collapse">
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/posting'); ?>">
                    <span class="glyphicon glyphicon-list"></span> Daftar Posting</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/posting/add'); ?>"> 
                    <span class="glyphicon glyphicon-plus-sign"></span> Tambah Posting</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/posting/category'); ?>">
                    <span class="glyphicon glyphicon-list"></span> Daftar Kategori</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/posting/add_category'); ?>"> 
                    <span class="glyphicon glyphicon-plus-sign"></span> Tambah Kategori</a>
            </ul>
        </div><!-- posting -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navpage">
                    <h4 class="title">Halaman</h4>
                </a>
            </div>

            <ul id="navpage" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'page') ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/page'); ?>">
                    <span class="glyphicon glyphicon-list"></span> Daftar Halaman</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/page/add'); ?>">
                    <span class="glyphicon glyphicon-plus-sign"></span> Tambah Halaman</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/page/tree'); ?>">
                    <span class="glyphicon glyphicon-align-left"></span> Susunan Menu</a>
            </ul>
        </div><!-- Page -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navcont">
                    <h4 class="title">Contact</h4>
                </a>
            </div>

            <ul id="navcont" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'contact') ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/contact'); ?>">
                    <span class="glyphicon glyphicon-list"></span> Contact</a>
            </ul>
        </div><!-- User -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navuser">
                    <h4 class="title">Pengguna</h4>
                </a>
            </div>

            <ul id="navuser" class="list-group panel-collapse collapse">
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/user'); ?>">
                    <span class="glyphicon glyphicon-list"></span> Daftar penguna</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/user/add'); ?>"> 
                    <span class="glyphicon glyphicon-plus-sign"></span> Tambah pengguna</a>
            </ul>
        </div><!-- User -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navmm">
                    <h4 class="title">Media Manager</h4>
                </a>
            </div>

            <ul id="navmm" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'media_manager' OR $this->uri->segment(2) == 'media_album') ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/media_manager'); ?>">
                    <span class="ion-images"></span> Image List</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/media_album'); ?>"> 
                    <span class="ion-folder"></span> Album List</a>
            </ul>
        </div><!-- Media Manager -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navset">
                    <h4 class="title">Pengaturan</h4>
                </a>
            </div>

            <ul id="navset" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'setting') ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/setting'); ?>">
                    <span class="glyphicon glyphicon-cog"></span> General</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/setting/email'); ?>">
                    <span class="glyphicon glyphicon-cog"></span> Email</a>
            </ul>
        </div><!-- Media Manager -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navlog">
                    <h4 class="title">Log Aktivitas</h4>
                </a>
            </div>

            <ul id="navlog" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'activity_log') ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('manage/activity_log'); ?>">
                    <span class="glyphicon glyphicon-dashboard"></span> Daftar Log Aktivitas</a>
            </ul>
        </div><!-- Log Aktifitas -->

    </div><!-- List -->

</div>