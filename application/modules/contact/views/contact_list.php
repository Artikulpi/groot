<div class="col-sm-9 col-md-10 main">

    <h3 class="page-header">
        Sunting Contact
    </h3><hr>

    <?php echo form_open_multipart(current_url()) ?>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
                <label>Nama Contact</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="name" value="<?php echo $name['contact_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>No. Telepon</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="phone" value="<?php echo $phone['contact_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Email</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="email" value="<?php echo $email['contact_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Alamat Contact</label>
            </div>
            <div class="col-md-8">
                <textarea name="address" rows="7" class="form-control"> <?php echo $address['contact_value'] ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Facebook</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="facebook" value="<?php echo $facebook['contact_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label>Twitter</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="twitter" value="<?php echo $twitter['contact_value'] ?>" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Simpan" class="btn btn-primary pull-right">
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
    <div class="col-md-4">
        <div class="alert alert-info">
            Kolom tidak boleh kosong, Jika ingin di nonaktifkan silakan beri tanda ( - ) pada kolom yang tersedia.
        </div>
    </div>

</div>
