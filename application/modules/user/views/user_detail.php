            <h3 class="page-header">
                <?php echo $title ?>
                <a href="<?php echo site_url('manage/user/edit/'.$user['user_id']); ?>" ><button type="button" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
                <a href="<?php echo site_url('manage/user'); ?>" ><button type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></a>&nbsp;&nbsp;
            </h3>

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
                                <td>Status</td>
                                <td>:</td>
                                <td><?php echo $user['role_name']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>