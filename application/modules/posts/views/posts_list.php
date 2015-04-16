<div class="col-sm-9 col-md-10 main">
    <h3 class="page-header">
        Daftar Posting
        <a href="<?php echo site_url('gadmin/posts/add'); ?>" ><button type="button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button></a>
    </h3>

    <!-- Indicates a successful or positive action -->

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="controls" align="center">JUDUL</th>
                    <th class="controls" align="center">PENULIS</th>
                    <th class="controls" align="center">KATEGORI</th>
                    <th class="controls" align="center">TANGGAL</th>
                    <th class="controls" align="center">STATUS</th>
                </tr>
            </thead>
            <?php
            if (!empty($posts)) {
                foreach ($posts as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td ><b><a style="float: left;" href="<?php echo site_url('gadmin/posts/view/' . $row['posts_id']); ?>" ><?php echo $row['posts_title']; ?></a></b></td>
                            <td ><?php echo $row['user_name']; ?></td>
                            <td ><?php echo $row['category_name']; ?></td>
                            <td ><?php echo pretty_date($row['posts_input_date'], 'l, d/m/Y', FALSE); ?></td>
                            <td ><?php echo ($row['posts_is_published'] == 0) ? 'Draft' : 'Terbit'; ?></td>
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
</div>