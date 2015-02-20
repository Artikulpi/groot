<div class="col-sm-3 col-md-2 sidebar-offcanvas padd-null" id="sidebar" role="navigation">

    <div class="list">
        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navdashboard">
                    <h4 class="title">Dashboard</h4>
                </a>
            </div>

            <ul id="navdashboard" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'dashboard' OR $this->uri->segment(2) == NULL) ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('g_admin/dashboard'); ?>">
                    <span class="glyphicon glyphicon-home"></span> Dashboard</a>
            </ul>
        </div><!-- Dashboard -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navuser">
                    <h4 class="title">Admin</h4>
                </a>
            </div>

            <ul id="navuser" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'user') ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('g_admin/user'); ?>">
                    <span class="glyphicon glyphicon-list"></span> Daftar Admin</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('g_admin/user/add'); ?>"> 
                    <span class="glyphicon glyphicon-plus-sign"></span> Tambah Admin</a>
            </ul>
        </div><!-- User -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navmm">
                    <h4 class="title">Media Manager</h4>
                </a>
            </div>

            <ul id="navmm" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'media_manager' OR $this->uri->segment(2) == 'media_album') ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('g_admin/media_manager'); ?>">
                    <span class="glyphicon glyphicon-list"></span> Image List</a>
                <a class="lgitem list-group-item" href="<?php echo site_url('g_admin/media_album'); ?>"> 
                    <span class="glyphicon glyphicon-list"></span> Album List</a>
            </ul>
        </div><!-- Media Manager -->

        <div class="panel panel-default pipanel">
            <div class="panel-heading">
                <a data-toggle="collapse" href="#navlog">
                    <h4 class="title">Log Aktivitas</h4>
                </a>
            </div>

            <ul id="navlog" class="list-group panel-collapse collapse <?php echo ($this->uri->segment(2) == 'activity_log') ? 'in' : NULL; ?>">
                <a class="lgitem list-group-item" href="<?php echo site_url('g_admin/activity_log'); ?>">
                    <span class="glyphicon glyphicon-dashboard"></span> Daftar Log Aktivitas</a>
            </ul>
        </div><!-- Log Aktifitas -->

    </div><!-- List -->

</div>