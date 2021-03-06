    <h3 class="page-header">
        Pengaturan email
    </h3><hr>

    <?php echo form_open_multipart(site_url('manage/setting/email')) ?>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
                <label>Nama Pengirim</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="from_name" value="<?php echo $from_name['setting_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Protocol</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="protocol" value="<?php echo $protocol['setting_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Smtp Host</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="smtp_host" value="<?php echo $smtp_host['setting_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Smtp Port</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="smtp_port" value="<?php echo $smtp_port['setting_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Smtp User</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="smtp_user" value="<?php echo $smtp_user['setting_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Password email</label>
            </div>
            <div class="col-md-8">
                <input type="password" name="smtp_pass" value="<?php echo $smtp_pass['setting_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Smtp Timeout</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="smtp_timeout" value="<?php echo $smtp_timeout['setting_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Simpan" class="btn btn-primary pull-right">
                <br><br>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
    <div class="col-md-4">
        <div class="alert alert-info">
            Kolom tidak boleh kosong, Jika ingin dinonaktifkan silakan beri tanda ( - ) pada kolom yang tersedia.
        </div>
    </div>


