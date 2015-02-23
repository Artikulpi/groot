<?php
if (isset($category)) {
    $inputNameValue = $category['category_name'];
} else {
    $inputNameValue = set_value('category_name');
}
?>

<div class="col-sm-9 col-md-10 main">
    <?php if (!isset($posts)) echo validation_errors(); ?>
    <div class="row page-header">
        <div class="col-sm-9 col-md-6">
            <h3 class="page-title"><?php echo $operation; ?> Kategori Posting</h3>
        </div>

    </div>

    <div class="row">
        <?php echo form_open(current_url()); ?>
        <div class="col-sm-9 col-md-9">
            <?php if (isset($category)): ?>
                <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>" />
                <input type="hidden" name="category_input_date" value="<?php echo $category['category_input_date']; ?>" />
            <?php endif; ?>
            <label >Nama Kategori *</label>
            <input  name="category_name" placeholder="Nama Kategori" type="text" class="form-control" value="<?php echo $inputNameValue; ?>">
            <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p><br>
        </div>
        <div class="col-sm-9 col-md-3">
            <label>Aksi</label><br>
            <button type="submit" class="btn btn-success"><i class="ion-checkmark"></i> Simpan</button>
            <a href="<?php echo site_url('gadmin/posts/category'); ?>" class="btn btn-info"><i class="ion-arrow-left-a"></i> Batal</a>
            <?php if (isset($category)): ?>
                <a href="<?php echo site_url('gadmin/posts/delete_category/' . $category['category_id']); ?>" class="btn btn-danger" style="margin-top: 3px"><i class="ion-trash-a"></i> Hapus</a>
            <?php endif; ?>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($category)): ?>
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
                <?php echo form_open('gadmin/posts/delete_category/' . $category['category_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $category['category_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $category['category_name'] ?>" />
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
                $(window).load(function () {
                    $('#confirm-del').modal('show');
                });
            </script>
        <?php
        }
    }
    ?>
<?php endif; ?>