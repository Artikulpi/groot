            <h2 class="page-header">
                <?php echo $title ?>
                <a href="<?php echo site_url('manage/profile/edit/'); ?>" ><button type="button" class="btn btn-info pull-right"><span class="glyphicon glyphicon-pencil"></span> Edit</button></a>&nbsp;&nbsp;
                <a href="<?php echo site_url('manage/profile/cpw/'); ?>" ><button type="button" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-edit"></span> Ubah Password</button></a>
            </h2>

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
                        <td><?php echo pretty_date($user['user_input_date'], 'l, d-m-Y', FALSE) ?></td>
                    </tr>
                    <tr>
                        <td>Peran</td>
                        <td>:</td>
                        <td><?php echo $user['role_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?php echo $user['user_description']; ?></td>
                    </tr>
                    <tr>
                        <td>Terakhir diubah</td>
                        <td>:</td>
                        <td><?php echo $user['user_last_update']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>