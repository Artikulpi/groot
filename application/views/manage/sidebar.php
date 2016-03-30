<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="nav-side-menu">
                <div class="menu-list">
                    <div class="sidebar-block">
                        <div class="media">
                            <div class="media-left">
                                <a href="page-profile.html">
                                    <span class="status dotted dotted-primary" data-toggle="tooltip" data-container="body" title="" data-original-title="available"></span>
                                    <img class="media-object img-circle" src="<?php echo media_url('image/profil.png') ?>" alt="photo profile">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $text = ucfirst($this->session->userdata('uname')); ?></h4>
                                <p class="text-muted">
                                    <small><?php echo $this->session->userdata('uemail'); ?></small>
                                </p>
                            </div>
                        </div>
                    </div>

                    <ul id="menu-content" class="menu-content collapse out">
                        <li class="active">
                            <a href="<?php echo site_url('manage/dashboard'); ?>">
                                <i class="ion-speedometer"></i> Dashboard
                            </a>
                        </li>

                        <li  data-toggle="collapse" data-target="#posting" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Posting <span class="arrow"></span></a>
                        </li>

                        <ul class="sub-menu collapse" id="posting">
                            <li class="active"><a href="<?php echo site_url('manage/posting'); ?>">
                               Daftar Posting</a></li>
                               <li><a href="<?php echo site_url('manage/posting/add'); ?>"> 
                                 Tambah Posting</a></li>
                                 <li><a href="<?php echo site_url('manage/posting/category'); ?>">
                                     Daftar Kategori</a></li>
                                     <li><a href="<?php echo site_url('manage/posting/add_category'); ?>"> 
                                         Tambah Kategori</a></li>
                                     </ul>

                        <li  data-toggle="collapse" data-target="#halaman" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Halaman <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'page') ? 'in' : NULL; ?>" id="halaman">
                            <li class="active"><a href="<?php echo site_url('manage/page'); ?>">
                             Daftar Halaman</a></li>
                             <li><a href="<?php echo site_url('manage/page/add'); ?>">
                                 Tambah Halaman</a></li>
                                 <li><a href="<?php echo site_url('manage/page/tree'); ?>">
                                     Susunan Menu</a></li> 
                                 </ul>

                        <li  data-toggle="collapse" data-target="#contact" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Contact <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'contact') ? 'in' : NULL; ?>" id="contact">
                            <li class="active"><a href="<?php echo site_url('manage/contact'); ?>">
                             Contact</a></li>
                                 </ul>

                        <li  data-toggle="collapse" data-target="#pengguna" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Pengguna <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'user') ? 'in' : NULL; ?>" id="pengguna">
                            <li class="active"><a href="<?php echo site_url('manage/user'); ?>">
                                 Daftar penguna</a></li>
                                  <li><a href="<?php echo site_url('manage/user/add'); ?>"> 
                                 Tambah pengguna</a></li>
                                 </ul>

                        <li  data-toggle="collapse" data-target="#media" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Media Manager <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'media_manager' OR $this->uri->segment(2) == 'media_album') ? 'in' : NULL; ?>" id="media">
                            <li class="active"><a href="<?php echo site_url('manage/media_manager'); ?>">
                                Image List</a></li>
                                  <li><a href="<?php echo site_url('manage/media_album'); ?>"> 
                                 Album List</a></li>
                                 </ul>

                        <li  data-toggle="collapse" data-target="#setting" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Pengaturan <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'setting') ? 'in' : NULL; ?>" id="setting">
                            <li class="active"><a href="<?php echo site_url('manage/setting'); ?>">
                                     General</a></li>
                                  <li><a href="<?php echo site_url('manage/setting/email'); ?>">
                                     Email</a></li>
                                 </ul>

                        <li  data-toggle="collapse" data-target="#log" class="collapsed">
                            <a href="#"><i class="ion-folder"></i> Log Aktivitas <span class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse <?php echo ($this->uri->segment(2) == 'activity_log') ? 'in' : NULL; ?>" id="log">
                            <li class="active"><a href="<?php echo site_url('manage/activity_log'); ?>">
                                 Daftar Log Aktivitas</a></li>
                                 </ul>
                
                    </ul>
                    <div class="sidebar-block">
                        <div class="media">
                            <div class="media-left">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Notification</h4>
                                <p class="text-muted">
                                    <small><?php
                                    if ($this->session->flashdata('success')) {
                                        $data['message'] = $this->session->flashdata('success');
                                        $this->load->view('admin/notification_success', $data);
                                    }
                                    ?> </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                </div>
            </div>
