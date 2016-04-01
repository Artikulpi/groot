<?php
$this->load->view('manage/tinymce_init');

if (isset($user)) {
    $id = $user['user_id'];
    $user_name = $user['user_name'];
    $user_full_name = $user['user_full_name'];
    $user_role_id = $user['user_role_id'];
    $user_email = $user['user_email'];
    $user_description = $user['user_description'];
} else {
    $user_name = set_value('user_name');
    $user_full_name = set_value('user_full_name');
    $user_role_id = set_value('user_role_id');
    $user_email = set_value('user_email');
    $user_description = set_value('user_description');
}
?>
    <?php echo validation_errors(); ?>

            <h2 class="page-header" ><?php echo $operation; ?> Pengguna</h2>

    <?php echo form_open_multipart(current_url()); ?>
    <div class="row">
        <div class="col-sm-9 col-md-9">
            <?php if (isset($user)): ?>
                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>" />
                <input type="hidden" name="user_input_date" value="<?php echo $user['user_input_date'] ?>" />
            <?php endif; ?>
            <label >Username *</label>
            <input name="user_name" type="text" <?php echo (isset($user))? 'readonly' : '' ?> placeholder="Username" class="form-control" value="<?php echo $user_name; ?>"><br>
            <label >Nama Lengkap *</label>
            <input type="text" name="user_full_name" placeholder="Nama Lengkap" class="form-control" value="<?php echo $user_full_name; ?>"><br>

            <?php if (!isset($user)): ?>
                <label >Password *</label>
                <input type="password" placeholder="Password" name="user_password" class="form-control"><br>
                <label >Konfirmasi Password *</label>
                <input type="password" placeholder="Konfirmasi Password" name="passconf" class="form-control">
                <p style="color:#9C9C9C;margin-top: 5px"><i>Password minimal 6 karakter</i></p>
            <?php endif; ?>
            <label >Status Pengguna *</label>
            <select name="user_role_id" class="form-control">
          <?php foreach ($role as $r): ?>
          <option value="<?php echo $r['role_id'] ?>"
          <?php echo (isset($user) AND $user_role_id == $r['role_id']) ? 'selected' : '' ?>>
          <?php echo $r['role_name'] ?></option>
        <?php endforeach ?>
        </select><br>

            <label >Email *</label>
            <input type="text" name="user_email" placeholder="Email Pengguna" class="form-control" value="<?php echo $user_email; ?>">
            <p style="color:#9C9C9C;margin-top: 5px"><i>Contoh : example@yahoo.com / example@example.com</i></p>
            <label> Deskripsi Pengguna </label>
            <textarea name="user_description" class="form-control" rows="10" placeholder="Deskripsi pengguna"><?php echo $user_description; ?></textarea><br>
            <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
        </div>
        <div class="col-sm-9 col-md-3">
            <div class="form-group">
                <button name="action" type="submit" value="save" class="btn btn-success"><i class="ion-checkmark"></i> Simpan</button>
                <a href="<?php echo site_url('manage/user'); ?>" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</a>
                <?php if (isset($user)): ?>
                    <?php if ($this->session->userdata('uid') != $id) {
                        ?>
                        <a style="margin-top: 3px" href="<?php echo site_url('manage/user/delete/' . $user['user_id']); ?>" class="btn btn-danger"><i class="ion-trash-a"></i> Hapus</a>
                    <?php } ?>
                    <?php if ($this->session->userdata('uid') == $id) {
                        ?>
                        <a href="<?php echo site_url('manage/profile/cpw') ?>" class="btn btn-primary" style="margin-top: 3px"> Ubah password</a>
                    <?php } elseif ($this->session->userdata('uid') != $id) { ?>
                        <a style="margin-top: 3px" class="btn btn-primary" href="<?php echo site_url('manage/user/rpw/' . $user['user_id']); ?>" > Reset Password</a>
                    <?php } ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<?php if (isset($user)): ?>
    <!-- Delete Confirmation -->
    <div class="modal fade" id="confirm-del">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><b>Konfirmasi Penghapusan</b></h4>
                </div>
                <div class="modal-body">
                    <p>Data yang dipilih akan dihapus&hellip;</p>
                </div>
                <?php echo form_open('manage/user/delete/' . $user['user_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $user['user_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $user['user_name'] ?>" />
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php if ($this->session->flashdata('delete')) { ?>
        <script type = "text/javascript">
            $(window).load(function () {
                $('#confirm-del').modal('show');
            });
        </script>
    <?php }
    ?>
<?php endif; ?>