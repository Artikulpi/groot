<div class="col-sm-9 col-md-10 main">
    <h3 class="page-header">
        Daftar Kategori Posting
        <a href="<?php echo site_url('gadmin/posts/add_category'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
    </h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th align="center" class="controls" >Nama Kategori</th>
                </tr>
            </thead>
            <?php
            if (!empty($categories)) {
                foreach ($categories as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <?php if ($row['category_id'] == 1) {
; ?>
                                <td align="center"><b><p style="float: left;" ><?php echo $row['category_name']; ?></p></b></td>
                            <?php } else { ?>
                                <td align="center"><b><a style="float: left;" href="<?php echo site_url('gadmin/posts/category/edit/' . $row['category_id']); ?>" ><?php echo $row['category_name']; ?></a></b></td>
        <?php } ?>
                        </tr>
                    </tbody>
                    <?php
                }
            } else {
                ?>
                <tbody>
                    <tr id="row">
                        <td >Data Kosong</td>
                    </tr>
                </tbody>
                <?php
            }
            ?>   
        </table>
        <div class="pagination">
<?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>

