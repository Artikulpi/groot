<script type="text/javascript">
    var token_name = "<?php echo $this->security->get_csrf_token_name() ?>";
    var csrf_hash = "<?php echo $this->security->get_csrf_hash() ?>";
</script>
<script src="<?php echo base_url('media/js/modalpopup.js'); ?>"></script>
<link href="<?php echo base_url('media/css/modalpopup.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('media/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
<script src="<?php echo base_url('media/js/jasny-bootstrap.min.js'); ?>"></script>
<?php $this->load->view('admin/tinymce_init'); ?>
<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($page)) {
    $inputJudulValue = $page['page_name'];
    $inputTextValue = $page['page_content'];
    $inputDescription = $page['page_description'];
    $inputDateValue = $page['page_published_date'];
    $inputStatus = $page['page_is_published'];
    $inputComment = $page['page_is_commentable'];
    $inputImage = $page['page_image'];
} else {
    $inputJudulValue = set_value('page_name');
    $inputTextValue = set_value('page_content');
    $inputDescription = set_value('page_description');
    $inputDateValue = set_value('page_published_date');
    $inputStatus = set_value('page_is_published');
    $inputComment = set_value('page_is_commentable');
    $inputImage = set_value('page_image');
}
?>
<div class="col-sm-9 col-md-10 main">
    <?php if (!isset($page)) echo validation_errors(); ?>
    <?php echo form_open_multipart(current_url()); ?>
    <div class="row page-header">
        <div class="col-sm-9 col-md-6">
            <h3 class="page-title"><?php echo $operation; ?> Halaman</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-9 col-md-9">
            <?php if (isset($page)): ?>
                <input type="hidden" name="page_id" value="<?php echo $page['page_id']; ?>" />
                <input type="hidden" name="page_input_date" value="<?php echo $page['page_input_date']; ?>" />
            <?php endif; ?>
            <label >Judul Halaman *</label>
            <input name="page_name" placeholder="Judul Halaman" type="text" class="form-control" value="<?php echo $inputJudulValue; ?>"><br>
            <label >Deskrispi Halaman *</label>
            <textarea name="page_description" class="mceEditor" style="width: 100%" rows="10"><?php echo $inputDescription; ?></textarea><br />
            <label >Isi Halaman *</label>
            <textarea name="page_content" class="mceEditor" style="width: 100%" rows="15"><?php echo $inputTextValue; ?></textarea><br />
            <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            <div class="form-group">
                <div class="box4">
                    <label for="image">Unggah File Gambar</label>
                    <a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="icon-ok icon-white"></i> Upload</a>
                    <div style="display: none;" ><a href="" id="opentiny">Open</a></div>
                    <input type="hidden" name="inputGambarExisting">
                    <input type="hidden" name="inputGambarExistingId">
                    <?php if (isset($page) AND !empty($page['page_image'])): ?>
                        <div class="thumbnail mt10">
                            <img src="<?php echo $page['page_image']; ?>" style="height: 250px" >
                        </div>
                        <input type="hidden" name="inputGambarCurrent" value="<?php echo $page['page_image']; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-3">
            <div class="form-group">
                <label>Status Publikasi</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="page_is_published" value="0" <?php echo ($inputStatus == 0) ? 'checked' : ''; ?>> Draft
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="page_is_published" value="1" <?php echo ($inputStatus == 1) ? 'checked' : ''; ?>> Terbit
                    </label>
                </div>
                <label for="inputPublish">Tanggal Publikasi </label>
                <input id="inputPublish" placeholder="Tanggal Publikasi" name="page_publish_date" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $inputDateValue; ?>">
            </div><hr>
            <div class="form-group">
                <label>Status Komentar</label>
                <label class="radio inline">
                    <input type="radio" name="page_is_commentable" value="0" <?php echo ($inputComment == 0) ? 'checked' : ''; ?>> Non-aktif
                </label>
                <label class="radio inline">
                    <input type="radio" name="page_is_commentable" value="1" <?php echo ($inputComment == 1) ? 'checked' : ''; ?>> Aktif
                </label>
            </div><hr>
            <div class="form-group">
                <button name="action" type="submit" value="save" class="btn btn-success"><i class="ion-checkmark"></i> Simpan</button>
                <a href="<?php echo site_url('gadmin/page'); ?>" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</a>
                <?php if (isset($page)): ?>
                    <a href="<?php echo site_url('gadmin/page/delete/' . $page['page_id']); ?>" class="btn btn-danger" style="margin-top: 3px"><i class="ion-trash-a"></i> Hapus</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<?php if (isset($page)) { ?>
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
                <?php echo form_open('gadmin/page/delete/' . $page['page_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $page['page_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $page['page_name'] ?>" />
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php
    if ($this->session->flashdata('delete')) { {
            ?>
            <script type="text/javascript">
                $(window).load(function() {
                    $('#confirm-del').modal('show');
                });
            </script>
            <?php
        }
    }
    ?>
<?php } ?>