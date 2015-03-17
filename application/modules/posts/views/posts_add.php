<script type="text/javascript">
    var token_name = "<?php echo $this->security->get_csrf_token_name() ?>";
    var csrf_hash = "<?php echo $this->security->get_csrf_hash() ?>";
</script>
<script src="<?php echo base_url('/media/js/modalpopup.js'); ?>"></script>
<link href="<?php echo base_url('/media/css/modalpopup.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('media/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
<script src="<?php echo base_url('media/js/jasny-bootstrap.min.js'); ?>"></script>

<?php $this->load->view('admin/tinymce_init'); ?>
<?php $this->load->view('admin/datepicker'); ?>
<?php $this->load->view('posts/add_js'); ?>

<?php
if (isset($posts)) {
    $inputPublishValue = $posts['posts_published_date'];
    $inputJudulValue = $posts['posts_title'];
    $inputRingkasanValue = $posts['posts_description'];
    $inputIsiValue = $posts['posts_content'];
    $inputStatus = $posts['posts_is_published'];
    $inputComment = $posts['posts_is_commentable'];
    $inputCategory = $posts['category_id'];
} else {
    $inputPublishValue = set_value('posts_published_date');
    $inputJudulValue = set_value('posts_title');
    $inputRingkasanValue = set_value('posts_description');
    $inputIsiValue = set_value('posts_content');
    $inputStatus = set_value('posts_is_published');
    $inputComment = set_value('posts_is_commentable');
    $inputCategory = set_value('category_id');
}
?>
<div class="col-sm-9 col-md-10 main">
    <?php if (!isset($posts)) echo validation_errors(); ?>
    <?php echo form_open_multipart(current_url()); ?>
    <div class="row page-header">
        <div class="col-sm-9 col-md-6">
            <h3 class="page-title"><?php echo $operation; ?> Posting</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-9 col-md-9">
            <?php if (isset($posts)): ?>
                <input type="hidden" name="posts_id" value="<?php echo $posts['posts_id']; ?>" />
            <?php endif; ?>
            <label >Judul Posting *</label>
            <input name="posts_title" placeholder="Judul Posting" type="text" class="form-control" value="<?php echo $inputJudulValue; ?>"><br>
            <label >Deskripsi Posting *</label>
            <textarea name="posts_description" rows="10"><?php echo $inputRingkasanValue; ?></textarea><br />
            <label >Isi Posting *</label>
            <textarea name="posts_content" rows="15"><?php echo $inputIsiValue; ?></textarea>
            <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            <div class="form-group">
                <div class="box4">
                    <label for="image">Unggah File Gambar</label>
                    <!--<input id="image" type="file" name="inputGambar">-->
                    <a name="action" id="openmm"type="submit" value="save" class="btn btn-info"><i class="icon-ok icon-white"></i> Upload</a>
                    <div style="display: none;" ><a href="" id="opentiny">Open</a></div>
                    <input type="hidden" name="inputGambarExisting">
                    <input type="hidden" name="inputGambarExistingId">

                    <?php if (isset($posts) AND !empty($posts['posts_image'])): ?>
                        <div class="thumbnail mt10">
                            <img class="previewTarget" src="<?php echo $posts['posts_image']; ?>" style="width: 280px !important" >
                        </div>
                        <input type="hidden" name="inputGambarCurrent" value="<?php echo $posts['posts_image']; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-3">
            <div class="form-group">
                <label>Status Publikasi</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="posts_is_published" value="0" <?php echo ($inputStatus == 0) ? 'checked' : ''; ?>> Draft
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="posts_is_published" value="1" <?php echo ($inputStatus == 1) ? 'checked' : ''; ?>> Terbit
                    </label>
                </div>
                <div class="form-group">
                    <label for="inputPublish">Tanggal Publikasi </label>
                    <input id="inputPublish" placeholder="Tanggal Publikasi" name="posts_published_date" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $inputPublishValue; ?>">
                </div>
            </div><hr>
            <div class="form-group">
                <label>Status Komentar</label>
                <label class="radio inline">
                    <input type="radio" name="posts_is_commentable" value="0" <?php echo ($inputComment == 0) ? 'checked' : ''; ?>> Non-aktif
                </label>
                <label class="radio inline">
                    <input type="radio" name="posts_is_commentable" value="1" <?php echo ($inputComment == 1) ? 'checked' : ''; ?>> Aktif
                </label>
            </div>
            <hr>
            <div class="form-group" ng-controller="CategoriesCtrl">
                <label>Kategori</label>
                <div class=" input-group">
                    <select name="category_id" class="form-control" id="selectCat">
                        <option ng-repeat="category in categories" ng-selected="category_data.index == category.category_id" value="{{category.category_id}}">{{category.category_name}}</option>
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
                <a href="<?php echo site_url('gadmin/posts'); ?>" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</a>
                <?php if (isset($posts)): ?>
                    <a href="<?php echo site_url('gadmin/posts/delete/' . $posts['posts_id']); ?>" class="btn btn-danger" ><i class="ion-trash-a"></i> Hapus</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<?php if (isset($posts)): ?>
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
                <?php echo form_open('gadmin/posts/delete/' . $posts['posts_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $posts['posts_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $posts['posts_title'] ?>" />
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