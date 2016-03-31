
            <div class="nav-side-menu">
                <div class="menu-list">

                  <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                        <img alt="" src="<?php echo media_url('image/profile.png') ?>">
                    </div>
                    <div class="info">
                        <div class="title">
                            <a target="_blank" href=""><?php echo $text = ucfirst($this->session->userdata('uname')); ?></a>
                        </div>
                        <div class="desc"><?php echo $this->session->userdata('uemail'); ?></div>
                    </div>
                    <div class="bottom">
                        <a class="btn btn-circle btn-primary btn-twitter btn-sm" title="view profil" href="<?php echo site_url('gadmin/profile') ?>">
                            <i class="ion-eye"></i>
                        </a>
                        <a class="btn btn-circle btn-warning btn-sm" rel="publisher" title="edit profil" href="<?php echo site_url('gadmin/profile/cpw/'); ?>">
                        <i class="ion-edit"></i>
                    </a>

                    <a type="submit" class="btn btn-circle btn-danger btn-sm" rel="publisher" title="keluar" href="">
                        <i class="ion-locked"></i>
                    </a>
            </div>
        </div>

                    <ul id="menu-content" class="menu-content collapse out">
                        <li class="active">
                            <a href="<?php echo site_url('manage/dashboard'); ?>">
                                <i class="ion-speedometer"></i> Dashboard
                            </a>
                        </li>

                        <li  data-toggle="collapse" data-target="#posting" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Posting <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>

                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'page') ? 'in' : NULL; ?>" id="posting">
                            <li class="active"><a href="<?php echo site_url('manage/posting'); ?>">
                               Daftar Posting</a></li>
                               <li class="active"><a href="<?php echo site_url('manage/posting/add'); ?>"> 
                                 Tambah Posting</a></li>
                                 <li class="active"><a href="<?php echo site_url('manage/posting/category'); ?>">
                                     Daftar Kategori</a></li>
                                     <li class="active"><a href="<?php echo site_url('manage/posting/add_category'); ?>"> 
                                         Tambah Kategori</a></li>
                                     </ul>

                        <li  data-toggle="collapse" data-target="#halaman" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Halaman <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'page') ? 'in' : NULL; ?>" id="halaman">
                            <li class="active"><a href="<?php echo site_url('manage/page'); ?>">
                             Daftar Halaman</a></li>
                             <li class="active"><a href="<?php echo site_url('manage/page/add'); ?>">
                                 Tambah Halaman</a></li>
                                 <li class="active"><a href="<?php echo site_url('manage/page/tree'); ?>">
                                     Susunan Menu</a></li> 
                                 </ul>

                        <li  data-toggle="collapse" data-target="#contact" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Contact <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'contact') ? 'in' : NULL; ?>" id="contact">
                            <li class="active"><a href="<?php echo site_url('manage/contact'); ?>">
                             Contact</a></li>
                                 </ul>

                        <li  data-toggle="collapse" data-target="#pengguna" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Pengguna <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'user') ? 'in' : NULL; ?>" id="pengguna">
                            <li class="active"><a href="<?php echo site_url('manage/user'); ?>">
                                 Daftar penguna</a></li>
                                  <li class="active"><a href="<?php echo site_url('manage/user/add'); ?>"> 
                                 Tambah pengguna</a></li>
                                 </ul>

                        <li  data-toggle="collapse" data-target="#media" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Media Manager <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'media_manager' OR $this->uri->segment(2) == 'media_album') ? 'in' : NULL; ?>" id="media">
                            <li class="active"><a href="<?php echo site_url('manage/media_manager'); ?>">
                                Image List</a></li>
                                  <li class="active"><a href="<?php echo site_url('manage/media_album'); ?>"> 
                                 Album List</a></li>
                                 </ul>

                        <li  data-toggle="collapse" data-target="#setting" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Pengaturan <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'setting') ? 'in' : NULL; ?>" id="setting">
                            <li class="active"><a href="<?php echo site_url('manage/setting'); ?>">
                                     General</a></li>
                                  <li class="active"><a href="<?php echo site_url('manage/setting/email'); ?>">
                                     Email</a></li>
                                 </ul>

                        <li  data-toggle="collapse" data-target="#log" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Log Aktivitas <i class="ion-arrow-down-b pull-right"></i></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'activity_log') ? 'in' : NULL; ?>" id="log">
                            <li class="active"><a href="<?php echo site_url('manage/activity_log'); ?>">
                                 Daftar Log Aktivitas</a></li>
                                 </ul>
                
                    </ul>
                   
                    <br><br><br>
                </div>
            </div>
