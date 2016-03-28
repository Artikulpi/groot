<script type="text/javascript">
    var token_name = "<?php echo $this->security->get_csrf_token_name() ?>";
    var csrf_hash = "<?php echo $this->security->get_csrf_hash() ?>";
</script>
<script src="<?php echo media_url('/js/modalpopup.js'); ?>"></script>
<link href="<?php echo media_url('/css/modalpopup.css'); ?>" rel="stylesheet">
<link href="<?php echo media_url('/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
<script src="<?php echo media_url('/js/jasny-bootstrap.min.js'); ?>"></script>

<?php $this->load->view('manage/tinymce_init'); ?>
<?php $this->load->view('manage/datepicker'); ?>
<?php $this->load->view('posting/add_js'); ?>

<?php
if (isset($posting)) {
    $posting_published_date = $posting['posting_published_date'];
    $posting_title = $posting['posting_title'];
    $posting_description = $posting['posting_description'];
    $posting_content = $posting['posting_content'];
    $posting_is_published = $posting['posting_is_published'];
    $posting_is_commentable = $posting['posting_is_commentable'];
    $posting_category_id = $posting['posting_category_id'];
} else {
    $posting_published_date = set_value('posting_published_date');
    $posting_title = set_value('posting_title');
    $posting_description = set_value('posting_description');
    $posting_content = set_value('posting_content');
    $posting_is_published = set_value('posting_is_published');
    $posting_is_commentable = set_value('posting_is_commentable');
    $posting_category_id = set_value('posting_category_id');
}
?>
<div class="col-sm-9 col-md-10 main">
    <?php if (!isset($posting)) echo validation_errors(); ?>
    <?php echo form_open_multipart(current_url()); ?>
    <div class="row page-header">
        <div class="col-sm-9 col-md-6">
            <h3 class="page-title"><?php echo $operation; ?> Posting</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-9 col-md-9">
            <?php if (isset($posting)): ?>
                <input type="hidden" name="posting_id" value="<?php echo $posting['posting_id']; ?>" />
            <?php endif; ?>
            <label >Judul Posting *</label>
            <input name="posting_title" placeholder="Judul Posting" type="text" class="form-control" value="<?php echo $posting_title; ?>"><br>
            <label >Deskripsi Posting *</label>
            <textarea name="posting_description" rows="5"><?php echo $posting_description; ?></textarea><br />
            <label >Isi Posting *</label>
            <textarea name="posting_content" rows="10"><?php echo $posting_content; ?></textarea>
            <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            <div class="form-group">
                <div class="box4">
                    <label for="image">Unggah File Gambar</label>
                    <!--<input id="image" type="file" name="inputGambar">-->
                    <a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="icon-ok icon-white"></i> Upload</a>
                    <div style="display: none;" ><a href="" id="opentiny">Open</a></div>
                    <input type="hidden" name="inputGambarExisting">
                    <input type="hidden" name="inputGambarExistingId">

                    <?php if (isset($posting) AND !empty($posting['posting_image'])): ?>
                        <div class="thumbnail mt10">
                            <img class="previewTarget" src="<?php echo $posting['posting_image']; ?>" style="width: 280px !important" >
                        </div>
                        <input type="hidden" name="inputGambarCurrent" value="<?php echo $posting['posting_image']; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-3">
            <div class="form-group">
                <label>Status Publikasi</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="posting_is_published" value="0" <?php echo ($posting_is_published == 0) ? 'checked' : ''; ?>> Draft
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="posting_is_published" value="1" <?php echo ($posting_is_published == 1) ? 'checked' : ''; ?>> Terbit
                    </label>
                </div>
                <div class="form-group">
                    <label for="inputPublish">Tanggal Publikasi </label>
                    <input id="inputPublish" placeholder="Tanggal Publikasi" name="posting_published_date" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $posting_published_date; ?>">
                </div>
            </div><hr>
            <div class="form-group">
                <label>Status Komentar</label>
                <label class="radio inline">
                    <input type="radio" name="posting_is_commentable" value="0" <?php echo ($posting_is_commentable == 0) ? 'checked' : ''; ?>> Non-aktif
                </label>
                <label class="radio inline">
                    <input type="radio" name="posting_is_commentable" value="1" <?php echo ($posting_is_commentable == 1) ? 'checked' : ''; ?>> Aktif
                </label>
            </div>
            <hr>
            <div class="form-group" ng-controller="CategoriesCtrl">
                <label>Kategori</label>
                <div class=" input-group">
                    <select name="category_id" class="form-control" id="selectCat">
                        <option ng-repeat="category in categories" ng-selected="category_data.index == posting_category.category_id" value="{{posting_category.category_id}}">{{posting_category.category_name}}</option>
                    </select>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#category" aria-expanded="false">
                            <span class="ion-plus"></span>
                        </button>
                    </div>
                </div>
                <div class="collapse" id="category">
                    <div class="input-group">
                        <input class="form-control" placeholder="Tambah Baru" id="appendedInputButton" type="text" ng-model="categoryText">
                        <div class="input-group-btn">
                            <button class="btn btn-default simpan" type="button" ng-click="addCategory()" ng-disabled="!(!!categoryText)">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <button name="action" type="submit" value="save" class="btn btn-success"><i class="ion-checkmark"></i> Simpan</button>
                <a href="<?php echo site_url('manage/posting'); ?>" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</a>
                <?php if (isset($posting)): ?>
                    <a href="<?php echo site_url('manage/posting/delete/' . $posting['posting_id']); ?>" class="btn btn-danger" ><i class="ion-trash-a"></i> Hapus</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<?php if (isset($posting)): ?>
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
                <?php echo form_open('manage/posting/delete/' . $posting['posting_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $posting['posting_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $posting['posting_title'] ?>" />
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php if ($this->session->flashdata('delete')) { ?>
        <script type="text/javascript">
            $(window).load(function() {
                $('#confirm-del').modal('show');
            });
        </script>
    <?php }
    ?>
<?php endif; ?>