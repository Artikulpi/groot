<h3 class="page-header">
        Pengaturan Template
    </h3><hr>

    <?php echo form_open(current_url()) ?>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
                <label>Pilih Template</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="template" value="<?php echo $template['template_value'] ?>" class="form-control">
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