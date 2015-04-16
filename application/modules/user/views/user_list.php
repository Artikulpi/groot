<div class="col-sm-9 col-md-10 main">
    <h3 class="page-header">
        Daftar Admin
        <a href="<?php echo site_url('gadmin/user/add'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
    </h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>USERNAME</th>
                    <th>NAMA LENGKAP</th>
                    <th>EMAIL</th>
                    <th>STATUS ADMIN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <?php
            if (!empty($user)) {
                foreach ($user as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td ><b><a style="float: left;" href="<?php echo site_url('gadmin/user/detail/' . $row['user_id']); ?>" ><?php echo $row['user_name']; ?></a></b></td>
                            <td ><?php echo $row['user_full_name']; ?></td>
                            <td ><?php echo $row['user_email']; ?></td>
                            <td ><?php echo $row['role_name']; ?></td>
                            <?php if ($this->session->userdata('user_id_admin') != $row['user_id']) { ?>
                                <td><a class="btn btn-primary" style="float: left;" href="<?php echo site_url('gadmin/user/rpw/' . $row['user_id']); ?>" ><span class="ion-refresh"></span>&nbsp; Reset Password</a></td>
                                <?php } else {
                                ?>
                                <td><a class = "btn btn-primary" style = "float: left;" href = "<?php echo site_url('gadmin/profile/cpw/'); ?>" ><span class = "ion-refresh"></span>&nbsp; Ubah Password</a></td>
                                <?php } ?>
                        </tr>
                    </tbody>
                    <?php
                }
            } else {
                ?>
                <tbody>
                    <tr id="row">
                        <td colspan="5" align="center">Data Kosong</td>
                    </tr>
                </tbody>
                <?php
            }
            ?>   
        </table>
    </div>
    <div >
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>