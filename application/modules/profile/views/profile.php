<h1 class="section-title text-center page-title"><?php echo $title ?></h1>
<div class="row bootstrap snippets">
   <div class="col-md-6 col-md-offset-3">
       <div class="panel widget">
        <div class="widget-header bg-purple">
        <img class="widget-bg img-responsive" src="<?php echo media_url('image/blur.jpg') ?>" alt="Image">
        </div>
        <div class="widget-body text-center">
            <img alt="Profile Picture" class="widget-img img-border-light" src="<?php echo media_url('image/profile.png') ?>">
            <h4 class="mar-no"><?php echo $text = ucfirst($this->session->userdata('uname')); ?></h4>
            <p class="text-muted mar-btm"><?php echo $this->session->userdata('uemail'); ?></p>
        </div>
    </div>
    <div class="panel">
        <div class="pad-all">
           <div class="user-info-right">
            <table class="table table-user-information table-striped">
                <tbody>
                  <tr>
                    <td>Nama Singakt</td>
                    <td>:</td>
                    <td><?php echo $user['user_name'] ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $user['user_full_name'] ?></td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>:</td>
                    <td><?php echo $user['user_email'] ?></td>
                </tr>


                <tr>
                   <td>Tanggal Daftar </td>
                   <td>:</td>
                   <td><?php echo pretty_date($user['user_input_date'], 'l, d-m-Y', FALSE) ?></td>
               </tr>
               <tr>
                <td>Peran </td>
                <td>:</td>
                <td><?php echo $user['role_name']; ?></td>
            </tr>
            <tr>
                <td>Terakhir Diubah</td>
                <td>:</td>
                <td><?php echo $user['user_last_update']; ?></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><?php echo $user['user_description']; ?></td>
            </tr>


        </tbody>
    </table>
</div>
<hr>
<div class="contact text-center">
    <a href="<?php echo site_url('manage/profile/edit/'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> Edit Profil</a>
    <a href="<?php echo site_url('manage/profile/cpw/'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ubah Password</a>
</div>
</div>
</div>
</div>
</div>

