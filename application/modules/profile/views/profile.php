<div class="col-sm-9 col-md-10 main">
    <div class="row">
        <div class="col-md-8">
            <h3 class="page-header">
                Profil Pengguna
            </h3>
        </div>
        <div class="col-md-4">
            <span class=" pull-right">
        <a href="<?php echo site_url('gadmin/profile/cpw/');?>" class="btn btn-primary"><i class="ion-refresh"></i> Ubah Password</a>
        <a href="<?php echo site_url('gadmin/profile/edit/');?>" class="btn btn-warning"><i class="ion-edit"></i> Edit</a>
            </span>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Nama Singkat</td>
                        <td>:</td>
                        <td><?php echo $user['user_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?php echo $user['user_full_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $user['user_email'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal daftar</td>
                        <td>:</td>
                        <td><?php echo pretty_date($user['user_input_date']) ?></td>
                    </tr>
                    <tr>
                        <td>Peran</td>
                        <td>:</td>
                        <td><?php echo $user['role_name']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
