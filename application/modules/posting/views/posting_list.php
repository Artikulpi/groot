    <h3 class="page-header">
        Daftar Posting
        <a href="<?php echo site_url('manage/posting/add'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
    </h3>

    <!-- Indicates a successful or positive action -->

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="controls" align="center">JUDUL</th>
                    <th class="controls" align="center">PENULIS</th>
                    <th class="controls" align="center">KATEGORI</th>
                    <th class="controls" align="center">STATUS</th>
                    <th class="controls" align="center">TANGGAL</th>
                </tr>
            </thead>
            <?php
            if (!empty($posting)) {
                foreach ($posting as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td ><b><a style="float: left;" href="<?php echo site_url('manage/posting/view/' . $row['posting_id']); ?>" ><?php echo $row['posting_title']; ?></a></b></td>
                            <td ><?php echo $row['user_name']; ?></td>
                            <td ><?php echo $row['category_name']; ?></td>
                            <td ><?php echo $row['posting_is_published'] ? 'Terbit' : 'Draft' ; ?></td>
                            <td ><?php echo pretty_date($row['posting_input_date'], 'l, d/m/Y', FALSE); ?></td>
                        </tr>
                    </tbody>
                    <?php
                }
            } else {
                ?>
                <tbody>
                    <tr id="row">
                        <td colspan="5" align="center">Data Kosong</td>
                    </tr>
                </tbody>
                <?php
            }
            ?>   
        </table>
    </div>
    <div >
        <?php echo $this->pagination->create_links(); ?>
    </div>