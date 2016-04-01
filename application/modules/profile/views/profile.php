            <h3 class="page-header">
                <?php echo $title ?>
            </h3>
        <div class="main-content">
                <!-- PROFILE TAB CONTENT -->
                <div class="profile">
                    <div class="col-md-12 col-md-offset-3">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="user-info-left">
                                <img src="<?php echo media_url('image/avatar1.png') ?>" width="100%" alt="Profile Picture">
                                <p></p>
                                <div class="contact">
                                    <a href="<?php echo site_url('manage/profile/edit/'); ?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-pencil"></i> Edit Profil</a>
                                    <a href="<?php echo site_url('manage/profile/cpw/'); ?>" class="btn btn-block btn-success"><i class="glyphicon glyphicon-edit"></i> Ubah Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-xs-12">
                            <div class="user-info-right">
                                <div class="basic-info">
                                    <h3><i class="fa fa-square"></i> Basic Information</h3>
                                    <p class="data-row">
                                        <span class="data-name">Nama Singkat</span>
                                        <span class="data-value"><?php echo $user['user_name'] ?></span>
                                    </p>
                                    <p class="data-row">
                                        <span class="data-name">Nama Lengkap</span>
                                        <span class="data-value"><?php echo $user['user_full_name'] ?></span>
                                    </p>
                                    <p class="data-row">
                                        <span class="data-name">Email</span>
                                        <span class="data-value"><?php echo $user['user_email'] ?></span>
                                    </p>
                                    <p class="data-row">
                                        <span class="data-name">Tanggal Daftar</span>
                                        <span class="data-value"><?php echo pretty_date($user['user_input_date'], 'l, d-m-Y', FALSE) ?></span>
                                    </p>
                                    <p class="data-row">
                                        <span class="data-name">Peran</span>
                                        <span class="data-value"><?php echo $user['role_name']; ?></span>
                                    </p>
                                    <p class="data-row">
                                        <span class="data-name">Terakhir di Ubah</span>
                                        <span class="data-value"><?php echo $user['user_last_update']; ?></span>
                                    </p>
                                    <p class="data-row">
                                        <span class="data-name">Deskripsi</span>
                                        <span class="data-value"><?php echo $user['user_description']; ?></span>
                                    </p>
                                </div>
                                
                            
                            </div>
                        </div>
                        </div>
                    </div>

                <!-- END PROFILE TAB CONTENT -->

        </div> 
        </div>


