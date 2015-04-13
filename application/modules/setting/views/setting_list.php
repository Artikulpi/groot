<script type="text/javascript">
    var token_name = "<?php echo $this->security->get_csrf_token_name() ?>";
    var csrf_hash = "<?php echo $this->security->get_csrf_hash() ?>";
</script>
<script src="<?php echo base_url('/media/js/modalpopup.js'); ?>"></script>
<link href="<?php echo base_url('/media/css/modalpopup.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('media/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
<script src="<?php echo base_url('media/js/jasny-bootstrap.min.js'); ?>"></script>

<div class="col-sm-9 col-md-10 main">

    <h3 class="page-header">
        Daftar Pengaturan
    </h3><hr>

    <?php echo form_open_multipart(current_url()) ?>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
                <label>Favicon</label>
            </div>
            <div class="col-md-8">
                <input type="checkbox" id="check" <?php echo $favicon['setting_value'] != '-' ? 'checked' : NULL ?> name="upload">
                <div id="icon" <?php echo $favicon['setting_value'] == '-' ? 'style="display: none;"' : NULL ?>>
                    <div class="form-group">
                        <div class="box4">
                            <label for="image">Unggah File Gambar</label>
                            <!--<input id="image" type="file" name="inputGambar">-->
                            <a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="icon-ok icon-white"></i> Upload</a>
                            <div style="display: none;" ><a href="" id="opentiny">Open</a></div>
                            <input type="hidden" name="inputGambarExisting">
                            <input type="hidden" name="inputGambarExistingId">

                            <?php if (isset($favicon) AND !empty($favicon['setting_value']) AND $favicon['setting_value'] != '-'): ?>
                                <div class="thumbnail mt10">
                                    <img class="previewTarget" src="<?php echo $favicon['setting_value']; ?>" style="width: 280px !important" >
                                </div>
                                <input type="hidden" name="inputGambarCurrent" value="<?php echo $favicon['setting_value']; ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<script>
    $('#check').change(function(checked) {
        if ($(this).is(':checked')) {
            $('#icon').show();
        } else {
            $('#icon').hide();
        }
    });
</script>