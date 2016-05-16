
<div class="nav-side-menu">
    <div class="menu-list">

     <!--  <div class="card hovercard">
        <div class="cardheader">

        </div>
        <div class="avatar">
            <img alt="" src="<?php echo media_url('image/profile.png') ?>">
        </div>
        <div class="info">
            <div class="title">
                <a href="<?php echo site_url('manage/profile') ?>"><?php echo $text = ucfirst($this->session->userdata('uname')); ?></a>
            </div>
            <div class="desc"><?php echo $this->session->userdata('uemail'); ?></div>
        </div>
        <div class="bottom">
            <a class="btn btn-circle btn-primary btn-twitter btn-sm" title="view profil" href="<?php echo site_url('manage/profile') ?>">
                <i class="ion-eye"></i>
            </a>
            <a class="btn btn-circle btn-warning btn-sm" rel="publisher" title="edit profil" href="<?php echo site_url('manage/profile/cpw/'); ?>">
                <i class="ion-edit"></i>
            </a>

            <a type="submit" class="btn btn-circle btn-danger btn-sm" rel="publisher" title="keluar" href="">
                <i class="ion-locked"></i>
            </a>
        </div>
    </div> -->

    <ul id="menu-content" class="menu-content collapse out">
        <li class="">
            <a href="<?php echo site_url('manage/dashboard'); ?>">
                <i class="ion-android-folder"></i> Dashboard <i class="ion-speedometer pull-right"></i>
            </a>
        </li>

        <li  data-toggle="collapse" data-target="#posting" class="collapsed">
            <a href="#"><i class="ion-android-folder"></i> Posting <i class="ion-arrow-down-b pull-right"></i></a>
        </li>

        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'posting') ? 'in' : NULL; ?>" id="posting">
            <li class="active"><a href="<?php echo site_url('manage/posting'); ?>">
            <i class="ion-clipboard"></i> Daftar Posting</a></li>
             <li class="active"><a href="<?php echo site_url('manage/posting/add'); ?>"> 
              <i class="ion-android-add"></i>Tambah Posting</a></li>
               <li class="active"><a href="<?php echo site_url('manage/posting/category'); ?>">
                  <i class="ion-clipboard"></i> Daftar Kategori</a></li>
                   <li class="active"><a href="<?php echo site_url('manage/posting/add_category'); ?>"> 
                       <i class="ion-android-add"></i>Tambah Kategori</a></li>
                   </ul>

                   <li  data-toggle="collapse" data-target="#halaman" class="collapsed">
                    <a href="#"><i class="ion-android-folder"></i> Halaman <i class="ion-arrow-down-b pull-right"></i></a>
                </li>
                <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'page') ? 'in' : NULL; ?>" id="halaman">
                    <li class="active"><a href="<?php echo site_url('manage/page'); ?>">
                      <i class="ion-clipboard"></i> Daftar Halaman</a></li>
                       <li class="active"><a href="<?php echo site_url('manage/page/add'); ?>">
                           <i class="ion-android-add"></i>Tambah Halaman</a></li>
                           <li class="active"><a href="<?php echo site_url('manage/page/tree'); ?>">
                             <i class="ion-drag"></i>  Susunan Menu</a></li> 
                           </ul>

                           <li  data-toggle="collapse" data-target="#contact" class="collapsed">
                            <a href="#"><i class="ion-android-folder"></i> Contact <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'contact') ? 'in' : NULL; ?>" id="contact">
                            <li class="active"><a href="<?php echo site_url('manage/contact'); ?>">
                              <i class="ion-android-call"></i> Contact</a></li>
                           </ul>

                           <li  data-toggle="collapse" data-target="#pengguna" class="collapsed">
                            <a href="#"><i class="ion-android-folder"></i> Pengguna <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'user') ? 'in' : NULL; ?>" id="pengguna">
                            <li class="active"><a href="<?php echo site_url('manage/user'); ?>">
                             <i class="ion-clipboard"></i>  Daftar penguna</a></li>
                               <li class="active"><a href="<?php echo site_url('manage/user/add'); ?>"> 
                                   <i class="ion-android-add"></i>Tambah pengguna</a></li>
                               </ul>

                               <li  data-toggle="collapse" data-target="#media" class="collapsed">
                                <a href="#"><i class="ion-android-folder"></i> Media Manager <i class="ion-arrow-down-b pull-right"></i></a>
                            </li>
                            <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'media_manager' OR $this->uri->segment(2) == 'media_album') ? 'in' : NULL; ?>" id="media">
                                <li class="active"><a href="<?php echo site_url('manage/media_manager'); ?>">
                                   <i class="ion-grid"></i> Image List</a></li>
                                    <li class="active"><a href="<?php echo site_url('manage/media_album'); ?>"> 
                                      <i class="ion-android-folder"></i> Album List</a></li>
                                   </ul>

                                   <li  data-toggle="collapse" data-target="#setting" class="collapsed">
                                    <a href="#"><i class="ion-android-folder"></i> Pengaturan <i class="ion-arrow-down-b pull-right"></i></a>
                                </li>
                                <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'setting' OR $this->uri->segment(2) == 'template') ? 'in' : NULL; ?>" id="setting">
                                    <li class="active"><a href="<?php echo site_url('manage/setting'); ?>">
                                      <i class="ion-settings"></i> General</a></li>
                                       <li class="active"><a href="<?php echo site_url('manage/setting/email'); ?>">
                                          <i class="ion-email"></i> Email</a></li>
                                          <li class="active"><a href="<?php echo site_url('manage/template'); ?>">
                                          <i class="ion-email"></i> Template</a></li>
                                       </ul>

                                       <li  data-toggle="collapse" data-target="#log" class="collapsed">
                                        <a href="#"><i class="ion-android-folder"></i> Log Aktivitas <i class="ion-arrow-down-b pull-right"></i></a>
                                    </li>
                                    <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'activity_log') ? 'in' : NULL; ?>" id="log">
                                        <li class="active"><a href="<?php echo site_url('manage/activity_log'); ?>">
                                          <i class="ion-android-search"></i> Daftar Log Aktivitas</a></li>
                                       </ul>

                                       <br><br><br><br><br><br>
                                   </ul>

                               </div>
                           </div>
