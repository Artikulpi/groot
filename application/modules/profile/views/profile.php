            <h3 class="page-header">
                <?php echo $title ?>
            </h3>


        <div class="main-content">
                <!-- PROFILE TAB CONTENT -->
                <div class="tab-pane profile active">
                    <div class="row">
                    <div class="col-md-12 col-md-offset-3">
                        <div class="col-md-5 col-xs-12">
                            <div class="user-info-left">
                                <img src="<?php echo media_url('image/avatar1.png') ?>" width="100%" alt="Profile Picture">
                                <div class="contact">
                                    <a href="<?php echo site_url('manage/profile/edit/'); ?>" class="btn btn-block btn-danger"><i class="glyphicon glyphicon-pencil"></i> Edit Profil</a>
                                    <a href="<?php echo site_url('manage/profile/cpw/'); ?>" class="btn btn-block btn-success"><i class="glyphicon glyphicon-edit"></i> Ubah Password</a>
                                    <ul class="list-inline social">
                                        <li><a href="#" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#" title="Google Plus"><i class="fa fa-google-plus-square"></i></a></li>
                                    </ul>
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
        
                <!-- ACTIVITY TAB CONTENT -->
              <!--   <div class="tab-pane activity" id="activity-tab">
                    <ul class="list-unstyled activity-list">
                        <li>
                            <i class="fa fa-shopping-cart activity-icon pull-left"></i>
                            <p>
                                <a href="#">Jonathan</a> commented on <a href="#">Special Deal 2013</a> <span class="timestamp">12 minutes ago</span>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-pencil activity-icon pull-left"></i>
                            <p>
                                <a href="#">Jonathan</a> posted <a href="#">a new blog post</a> <span class="timestamp">4 hours ago</span>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-user activity-icon pull-left"></i>
                            <p>
                                <a href="#">Jonathan</a> edited his profile <span class="timestamp">11 hours ago</span>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-pencil activity-icon pull-left"></i>
                            <p>
                                <a href="#">Jonathan</a> has added review on <a href="#">jQuery Complete Guide</a> book <span class="timestamp">Yesterday</span>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-thumbs-up activity-icon pull-left"></i>
                            <p>
                                <a href="#">Jonathan</a> liked <a href="#">a post</a> <span class="timestamp">December 12</span>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-tasks activity-icon pull-left"></i>
                            <p>
                                <a href="#">Jonathan</a> has completed one task <span class="timestamp">December 11</span>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-picture-o activity-icon pull-left"></i>
                            <p>
                                <a href="#">Jonathan</a> uploaded <a href="#">new photos</a> <span class="timestamp">December 5</span>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-credit-card activity-icon pull-left"></i>
                            <p>
                                <a href="#">Jonathan</a> has updated his credit card info <span class="timestamp">September 28</span>
                            </p>
                        </li>
                    </ul>
                    <p class="text-center more"><a href="#" class="btn btn-custom-primary">View more <i class="fa fa-long-arrow-right"></i></a></p>
                </div> -->
                <!-- END ACTIVITY TAB CONTENT -->
        

        </div>  