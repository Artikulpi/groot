

<div class="bootstrap snippet">
    <section id="team" class="white-bg padding-top-bottom">
        <div class="bootstrap snippet">
            <h1 class="section-title text-center page-title"><?php echo $title ?></h1>
            <p class="section-description text-center"></p>  
            <div class="row member-content">
                <div class="col-sm-3 col-sm-offset-1 member-thumb  fade-right in">
                    <img class="img-responsive img-center img-thumbnail img-circle1" src="<?php echo media_url('image/profile.png') ?>" alt="">
                    <h4><?php echo $user['user_name'] ?></h4>
                    <p class="title"><?php echo $user['user_email'] ?></p>
                </div>
                <div class="col-sm-7">
                    <div class="details">
                     <div class="user-info-right">
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
                    <div class="contact">
                    <a href="<?php echo site_url('manage/profile/edit/'); ?>" class="btn btn-danger"><i class="glyphicon glyphicon-pencil"></i> Edit Profil</a>
                        <a href="<?php echo site_url('manage/profile/cpw/'); ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>    
</div>                    

